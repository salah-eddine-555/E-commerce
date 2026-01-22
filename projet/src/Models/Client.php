<?php
namespace App\Models;

use App\Models\User;
use App\Models\Commande;

class Client extends User{
    private int $id;

    private Commande $listcommande;

}