<?php

namespace App\Http\Controllers;

use App\Http\Requests\Amis\AddAskRelationRequest;
use App\Http\Resources\Amis\Amisresource;
use App\Http\Resources\Produit\ProduitResource;
use App\Models\Amis;
use App\Models\Succursale;
use App\Trait\Shared;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Amiscontroller extends Controller
{
    //

    use Shared;

    public function getAmis($succusaleId)
    {
        $data =  DB::select("SELECT * FROM `amis` WHERE accepted = 1 and (amis.from = $succusaleId OR amis.to = $succusaleId)");
        $amis = array_map(function ($q) use ($succusaleId) {
            return $q->from == $succusaleId ? ["id" => $q->id,"succursale_id" => $q->to] : ["id" => $q->id,"succursale_id" => $q->from];
        }, $data);
        // return $succusaleId;x    
        return $this->responseData("Liste des succursales amis de la succursale : ", Amisresource::collection($data), true);
    }

    public function getDemandeRelation(Request $request)
    {
        return Amis::where(['accepted' => 0, "from" => $request->succursale_id])->orWhere(['accepted' => 1, "from" => $request->succursale_id])->get();
    }
    public function getOtherMember(Request $request)
    {
        // $amis = $this->getAmis($request);
        // $amis_id = array_map(function ($q) use ($request) {

        //     return $q->from;
        // }, $amis);
        // return $amis_id;
    }

    public function askFriend(AddAskRelationRequest $request)
    {
        try {
            $ami = Amis::where(['from' => $request->from, 'to' => $request->to])->get();
            if ($ami) {
                Amis::where('id', $ami->id)->update(['accepted' => true]);
                return $this->responseData("Demande acceptée", ProduitResource::collection([Succursale::find($request->to)]), true);
            }
            Amis::create([
                "from" => $request->from,
                "to" => $request->to
            ]);
            return $this->responseData("demande envoyée", [], true);
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage());
        }
    }
}
