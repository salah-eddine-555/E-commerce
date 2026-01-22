<?php
namespace App\Models;

use App\Models\Client;
use App\Core\Database;

class Commande {
    private int $id;
    private Datetime $date_creation;
    private string $status;

    private Client $client;
    private CommandeItem $commandeitems;


    public function create(){
        $sql = "INSERT INTO commandes(date_creation,status,user_id)VALUES (:date_creation,:status,:user_id);";
        $stmt = Databse::connect()->prepare($sql);

        $stmt->execute([
            ':date_creation'=>$this->date_creation,
            ':status' => $this->status,
            ':user_id'=> $this->client->getId()
        ]);
    }

    public function getAll():array{
        $sql = "SELECT * FFROM commandes";
        $stmt= Database::connect()->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $commandes = $stmt->fetchAll();

        return $commandes;
    }

    public function supprimerCommande():bool {
        $sql = "DELETE FROM commandes where id = :id";
        $stmt = Database::connect()->prepare($sql);
        $stmt->execute();
    }
  


}