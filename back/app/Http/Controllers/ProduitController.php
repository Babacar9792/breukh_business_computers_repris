<?php

namespace App\Http\Controllers;

use App\Http\Resources\SuccusaleProduit\ProduitBySuccursaleCollection;
use App\Http\Resources\SuccusaleProduit\ProduitBySuccursaleResource;
use App\Http\Resources\SuccusaleProduit\SuccursaleProduitResource;
use App\Models\Produit;
use App\Models\SuccursaleProduit;
use App\Trait\Shared;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduitController extends Controller
{
    //

    use Shared;

    public function index($succursale)
    {
        // $succursale = request()->input("succursale", )
        $succursaleProduit = SuccursaleProduit::where("succursale_id", $succursale)->get();
        return $succursaleProduit;
    }

    public function addProduit(Request $request)
    {

        return  DB::transaction(function () use ($request) {
            $code = $this->genereCode($request);
            $produitWithCode = Produit::where("code", $code)->first();
            if ($produitWithCode) {
                $succurssaleWithThisProduct = SuccursaleProduit::where(["produit_id" => $produitWithCode->id, "succursale_id" => $request->succursale_id])->first();
                if (!$succurssaleWithThisProduct) {
                    return SuccursaleProduitResource::make(SuccursaleProduit::create([
                        "prix" => $request->prix,
                        "stock" => $request->stock,
                        "produit_id" => $produitWithCode->id,
                        "succursale_id" => $request->succursale_id,
                    ]));
                }
                return "produit deja enregistré";
            }
            $produit = Produit::create([
                "libelle" => $request->libelle,
                "photo" => $request->photo,
                "description" => $request->description,
                "code" => $code,
                "marque_id" => $request->marque_id,
                "categorie_id" => $request->categorie_id
            ]);
            $produit->caracteristiques()->attach($request->caracteristiques);
            return  SuccursaleProduitResource::make(SuccursaleProduit::create([
                "prix" => $request->prix,
                "stock" => $request->stock,
                "produit_id" => $produit->id,
                "succursale_id" => $request->succursale_id
            ]));
        });
    }

    public function genereCode($request)
    {
        $libelle = str_replace(' ', '',  strtoupper($request->libelle));
        $carateristiqueUnite = "";
        foreach ($request->caracteristiques as  $value) {
            $value["unite_id"] = $value["unite_id"] ? 0 : $value["unite_id"];
            $carateristiqueUnite = $carateristiqueUnite . $value["caracteristique_id"] . $value["unite_id"] . $value["valeur"];
        }
        return $libelle . '-' . $request->categorie_id . '-' . $request->marque_id . '-' . $carateristiqueUnite;
    }

    public function getProduitByCodeInSuccursale(Request $request)
    {
        $produit = Produit::where("code", $request->code)->first();
        if (!$produit) {
            return $this->responseData("Ce produit n'est pas encore enregistrer ou a été supprimé");
        }
        /* Recuperation de toutes succursales qui  */
        $succursaleProduit =  SuccursaleProduit::where("produit_id", $produit->id)->orderByDesc("prix")->get();

        $amis = DB::select("SELECT * FROM `amis` WHERE accepted = 1 and (amis.from = $request->succursale OR amis.to = $request->succursale)");
        $amis_id = array_map(function ($q)  use ($request) {
            return $q->from == $request->succursale ? $q->to : $q->from;
        }, $amis);
        $friendSuccursaleHaveProduct = array_filter([...$succursaleProduit], function ($q) use ($request, $amis_id) {
            return $q->succursale_id != $request->succursale  && $q->stock != 0 && in_array($q->succursale_id, $amis_id);
        });

        $otherSuccursaleProduct = array_filter([...$succursaleProduit], function ($q) use ($request, $amis_id) {
            return $q->succursale_id != $request->succursale  && $q->stock != 0 && !in_array($q->succursale_id, $amis_id);
        });

        $succursaleSearchedProduct = array_filter([...$succursaleProduit], function ($q) use ($request) {
            return $q->succursale_id == $request->succursale;
        });

        if (count($succursaleSearchedProduct) == 0) {

            return $this->responseData("code incorrecte");
        }
        if (count($friendSuccursaleHaveProduct) == 0) {
            return $this->responseData("",  [
                'succursaleDemandeur' => SuccursaleProduitResource::collection($succursaleSearchedProduct),
                'friend' => [],
                'other' => SuccursaleProduitResource::collection($otherSuccursaleProduct)
            ], true);
        }
        return $this->responseData("", [
            "succursaleDemandeur" => SuccursaleProduitResource::collection($succursaleSearchedProduct),
            "friend" => SuccursaleProduitResource::collection($friendSuccursaleHaveProduct),
            "other" => []
        ], true);
    }

    public function getProduitBySuccursale($succursale)
    {
        $item = request()->input("item", 4);
        $produits = SuccursaleProduit::where("succursale_id", $succursale)->paginate($item);

        return new ProduitBySuccursaleCollection($produits);
    }

    public function searchProductBy($critereRecherche, $libelle, $succursale)
    {
        // $item = request()->input("item", 4);
        // $produit = DB::select("select id from " . strtolower($critereRecherche) . " where libelle LIKE '%" . $libelle . "%'");
        $produit = [];
        if ($critereRecherche == "produit") {
       
            $produit = Produit::where("libelle", "LIKE", "%" . $libelle . "%")->pluck("id");
        }
        if ($critereRecherche == "marque" || $critereRecherche == "categorie") {

            $idsSearched = DB::select("select id from " . strtolower($critereRecherche) . "s where libelle LIKE '%" . strtoupper($libelle) . "%'");
            $ids = array_map(function ($q) {
                return  $q->id;
            }, $idsSearched);
            $produit =  Produit::whereIn($critereRecherche . "_id", $ids)->pluck("id");
        }
        // return  SuccursaleWithProduct::collection(SuccursaleProduit::whereIn("produit_id", $produit)->where("succursale_id", $succursale)->get());
        // $product = SuccursaleProduit::whereIn("produit_id", $produit)->where("succursale_id", $succursale)->paginate($item);
        $product = SuccursaleProduit::whereIn("produit_id", $produit)->where("succursale_id", $succursale)->get();
        // return new SuccursaleWithProductCollection($product);
        // return  new ProduitBySuccursaleCollection($product);
        return ProduitBySuccursaleResource::collection($product);
    }
}
