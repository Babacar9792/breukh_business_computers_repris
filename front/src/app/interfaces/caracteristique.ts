import { LibelleId } from "./libelle-id"

export interface Caracteristique {

    id : number
    libelle : string
    unite : LibelleId | null
    valeur : string
    valeurs_possible : string | null
}
