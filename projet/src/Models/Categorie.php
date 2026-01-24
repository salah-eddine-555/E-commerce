<?php
namespace App\Models;

use App\Core\Database;
use App\Models\Produit;
use PDO;

class Categorie {
    private int $id;
    private string $name;

    private array $produits;

    public function getId():int {return $this->id;}
    public function setId(int $id):void {$this->id = $id;}

    public function getName():string {return $this->name;}
    public function setName(string $name):void {$this->name = $name;}


    public function create(){
        $sql = "INSERT INTO categories (name) values(:name)";
        $stmt = Database::connect()->prepare($sql);
        return $stmt->execute([":name" => $this->name]);
    }

    public function getCategorieId(){
        $sql = "SELECT * FROM categories where id = :id";
        $stmt = Database::connect()->prepare($sql);
        $stmt->execute([":id"=>$this->id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $stmt->fetch();
    }

    public static function getAllCategories():array {
        $sql = "SELECT * FROM categories";
        $stmt = Database::connect()->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

        return $stmt->fetchAll();
    }

    public function update():bool{
        $sql = "UPDATE categories SET name = :name WHERE id = :id";
        $stmt = Database::connect()->prepare($sql);
        return $stmt->execute([
            ':name'=> $this->name,
            ':id' => $this->id
        ]);
    }

    public function delete(){
        $sql = "DELETE from categories where id = :id";
        $stmt= Database::connect()->prepare($sql);
        return $stmt->execute([':id'=>$this->id]); 
    }

    public function getTotalProduits():int{
        $sql = "SELECT COUNT(*) FROM produits where id_categorie = :id_categorie";
        $stmt = Database::connect()->prepare($sql);

        $stmt->execute([':id_categorie' => $this->id]);

        return (int) $stmt->fetchColumn();
    }
}