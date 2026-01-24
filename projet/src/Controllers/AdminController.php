<?php
namespace App\Controllers;
use App\Controllers\CategorieController;
use App\Controllers\ProduitController;

class AdminController {


    public function categorie() {

    $categorieController = new CategorieController();

    return $categorieController->index();
    }

    public function produit(){
        $produitController = new ProduitController();
        return $produitController->index();
    }

}