import { Component, OnInit } from '@angular/core';
import { Link } from 'src/app/interfaces/link';
import { Produit } from 'src/app/interfaces/produit';
import { SuccursaleProduit } from 'src/app/interfaces/succursale-produit';
import { ValueForSearchProduct } from 'src/app/interfaces/value-for-search-product';
import { ProduitService } from 'src/app/services/produit.service';

@Component({
  selector: 'app-produit',
  templateUrl: './produit.component.html',
  styleUrls: ['./produit.component.css']
})
export class ProduitComponent implements OnInit {

  links: Link[] = [];
  produits: SuccursaleProduit[] = [];
  page: number = 1;
  perPageCurrent: number = 4;
  loader : boolean = false;

  constructor(private produitservice: ProduitService) { }

  ngOnInit(): void {
    this.getData();
  }

  getData(page: number = this.page, perPage: number = this.perPageCurrent) {
    this.produitservice.getAll<SuccursaleProduit>("produit/1?page=" + page + "&item=" + perPage).subscribe({
      next: (value) => {
       
        // console.log(value);
        this.links = value.links!;
        this.produits = value.data
        console.log(this.produits);


      },
      error: (value) => {
        console.log(value);
        this.loader = false;

      },
      complete: () => {
        console.log("completed");
        this.loader = true;

      }
    });

  }

  otherPage(event: string) {
    this.getData(+event);
    this.page = +event;
    console.log(this.produits);

  }

  perPage(perPageChoice: string) {
    this.getData(this.page, +perPageChoice)
    this.perPageCurrent = +perPageChoice;

  }
  searchProducts(event: ValueForSearchProduct) {
    // console.log(event);
    if (event.critere == "") {
      this.getData(this.page, this.perPageCurrent);
    }
    else {
      this.produitservice.searchProduct(event, 1).subscribe({
        next: (value) => {
          console.log(value);
          this.produits = value.data;
          this.links = [];


        },
        error: (value) => {
          console.log(value);
          this.loader = false;

        },
        complete: () => {
          console.log("completed");
          this.loader = true; 


        }
      });
    }


  }
}
