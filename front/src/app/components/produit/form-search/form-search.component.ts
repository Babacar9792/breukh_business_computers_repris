import { Component, EventEmitter, Output } from '@angular/core';
import { ValueForSearchProduct } from 'src/app/interfaces/value-for-search-product';


@Component({
  selector: 'app-form-search',
  templateUrl: './form-search.component.html',
  styleUrls: ['./form-search.component.css']
})
export class FormSearchComponent {


  critererechere: string[] = ["marque", "categorie", "produit"];
  @Output() valueSearch = new EventEmitter<ValueForSearchProduct>()

  submite(form : ValueForSearchProduct)
  {
    // console.log(form);
    if(form.critere === "" || form.libelle == "")
    {
      form = {
        critere : "",
        libelle : ""
      }
    }
    this.valueSearch.emit(form);
    
  }

}
