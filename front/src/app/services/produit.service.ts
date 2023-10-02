import { Injectable } from '@angular/core';
import { ParentService } from './parent.service';
import { environment } from 'src/environments/environment.development';
import { ValueForSearchProduct } from '../interfaces/value-for-search-product';
import { Observable } from 'rxjs';
import { ResponseData } from '../interfaces/response-data';
import { SuccursaleProduit } from '../interfaces/succursale-produit';

@Injectable({
  providedIn: 'root'
})
export class ProduitService extends ParentService {

  // constructor() { }
  uri: string = "produit";
  searchProduct(objet: ValueForSearchProduct, succursale_id: number): Observable<ResponseData<SuccursaleProduit>> {
    return this.HTTP.get<ResponseData<SuccursaleProduit>>(environment.api.url + this.uri + "/critere/" + objet.critere + "/libelle/" + objet.libelle + "/succursale/" + succursale_id);
  }



}
