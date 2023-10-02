import { Caracteristique } from "./caracteristique";
import { LibelleId } from "./libelle-id";

export interface Produit {
    caracteristiques : Caracteristique[],
    categorie : LibelleId,
    marque : LibelleId,
    code : string,
    description : string,
    id : number,
    photo : string,
    libelle : string
  
}
