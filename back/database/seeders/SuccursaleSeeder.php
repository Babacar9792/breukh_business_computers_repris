<?php

namespace Database\Seeders;

use App\Models\Amis;
use App\Models\Caracteristique;
use App\Models\Categorie;
use App\Models\Marque;
use App\Models\Produit;
use App\Models\ProduitCaracteristique;
use App\Models\Succursale;
use App\Models\SuccursaleProduit;
use App\Models\Unite;
use App\Models\Utilisateur;
use Database\Factories\ProduitFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuccursaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $couleurs = ["VERT", "JAUNE", "ROUGE", "BLEU", "ORANGE"];
        //
        Categorie::insert([
            ["libelle" => "LAPTOP"],
            ["libelle" => "SOURIS"],
            ["libelle" => "CLAVIER"]
        ]);
        Marque::insert([
            ["libelle" => "HP"],
            ["libelle" => "LENOVO"],
            ["libelle" => "ACCER"]
        ]);
        Caracteristique::insert([
            [
                "libelle" => "couleur",
                "valeurs_possible" => "VERT-JAUNE-ROUGE-BLEU-ORANGE"
            ],
            [
                "libelle" => "disque",
                "valeurs_possible" => null
            ],
        ]);
        Unite::insert([
            ["libelle" => "Go"],
            ["libelle" => "Mo"],
        ]);
        Succursale::factory(10)->create();
        Produit::factory(100)->create();
        SuccursaleProduit::factory(200)->create();
        Amis::factory(20)->create();
        for ($i = 0; $i < 200; $i++) {
            ProduitCaracteristique::insert([
                [
                    "valeur" => $couleurs[rand(0, 4)],
                    "caracteristique_id" => 1,
                    "unite_id" => null,
                    "produit_id" => rand(1, 100)
                ],
                [
                    "valeur" => rand(100, 250),
                    "caracteristique_id" => 2,
                    "unite_id" => rand(1, 2),
                    "produit_id" => rand(1, 100)
                ],
            ]);

            # code...
        }
        Utilisateur::insert([
            "prenom" => "Babacar",
            "nom" => "Sy",
            "telephone" => "771234567",
            "email" => "babacar@gmail.com",
            "password" => bcrypt(123),
            "succursale_id" => 1
        ]);
        Utilisateur::factory(30)->create();
    }
}
