import { Produit } from "./produit";

export interface SuccursaleProduit {
    id : number,
    prix : number,
    produit : Produit,
    stock : number
}
