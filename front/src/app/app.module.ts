import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HTTP_INTERCEPTORS, HttpClientModule } from '@angular/common/http';

import { FormsModule } from '@angular/forms';
// import { NgModule } from '@angular/core';


import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ComponentsComponent } from './components/components.component';
import { ProduitComponent } from './components/produit/produit.component';
import { NavbarComponent } from './components/navbar/navbar.component';
import { FormSearchComponent } from './components/produit/form-search/form-search.component';
import { ListProduitComponent } from './components/produit/list-produit/list-produit.component';
import { PaginationComponent } from './components/pagination/pagination.component';
import { LoaderComponent } from './components/loader/loader.component';

@NgModule({
  declarations: [
    AppComponent,
    ComponentsComponent,
    ProduitComponent,
    NavbarComponent,
    FormSearchComponent,
    ListProduitComponent,
    PaginationComponent,
    LoaderComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
