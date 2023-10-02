import { Component, EventEmitter, Input, Output } from '@angular/core';
import { Link } from 'src/app/interfaces/link';
import { Produit } from 'src/app/interfaces/produit';
import { SuccursaleProduit } from 'src/app/interfaces/succursale-produit';

@Component({
  selector: 'app-list-produit',
  templateUrl: './list-produit.component.html',
  styleUrls: ['./list-produit.component.css']
})
export class ListProduitComponent {

  @Input() links : Link[] = [];
  @Input() produits : SuccursaleProduit[] = [];
  @Output() page = new EventEmitter<string>();
  @Output() perPageTosend = new EventEmitter<string>();
  otherPage(event : string)
  {
    this.page.emit(event);
  }

  perPage(event : Event)
  {
    let select = event.target as HTMLSelectElement;
    this.perPageTosend.emit(select.value);

  }

}
