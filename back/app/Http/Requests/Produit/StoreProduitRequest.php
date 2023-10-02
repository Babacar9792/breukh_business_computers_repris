<?php

namespace App\Http\Requests\Produit;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "libelle" => "required|string|min:3",
            "description" => "sometimes|required",
            "photo" =>  "sometimes|required",
            "marque_id" => "required|numeric|exists:marques:id",
            "categorie_id" => "required|numeric|exists:categorie:id",
            "prix" => "required|numeric|min:0",
            "stock" => "required|numeric|min:0",
            "succursale_id" => "required|numeric|exists:succursales,id",
            "caracteristiques" => "required|array",
            "caracteristiques.*.caracteristique_id" => "required|numeric|exists:caracteristiques,id",
            "caracteristiques.*.unite_id" => "sometimes|required|numeric|exists:unites,id",
            "caracteristiques.*.valeur" => "required|numeric"
            //
        ];
    }

    public function messages(): array
    {
        return [
            "libelle.required" => "Le champ libelle est obligatoire",
            "prix.required" => "Le champ prix est obligatoire",
            "stock.required" => "Le champ stock est obligatoire",
            "succursale_id.required" => "Le champ succursale est obligatoire",
            "marque_id.required" => "Le champ marque est obligatoire",
            "categorie_id.required" => "Le champ categorie est obligatoire"
        ];
    }
}
