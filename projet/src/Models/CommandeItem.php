<?php
namespace App\Models;


class CommandeItem {
    private int $id;
    private int $quantite;

    private Commande $commande;
    private Produit $produit;

}