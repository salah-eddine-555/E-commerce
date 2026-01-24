<?php
namespace App\Models;
use App\Core\Database;
use App\Models\Categorie;
use PDO;

class Produit {
    private int $id;
    private string $name;
    private string $description;
    private string $prix;
    private ?string $image;

    private ?Categorie $categorie = null;
    private int $id_categorie;
    

    public function getId():int {return $this->id;}
    public function getName():string {return $this->name;}
    public function getDescription():string {return $this->description;}
    public function getPrix():string {return $this->prix; }
    public function getImage():?string {return $this->image; }
    public function getCategorie() {return $this->categorie;}

    public function setId(int $id){$this->id = $id; }
    public function setName(string $name) {$this->name = $name;}
    public function setDescription(string $description) {$this->description = $description;}
    public function setPrix(string $prix) {$this->prix = $prix;}
    public function setImage(?string $image) {$this->image = $image;}
    public function setCategorie(Categorie $categorie){$this->categorie = $categorie;}

    public function create(){
        $sql = "INSERT INTO produits(name,description,prix,image,id_categorie) values(:name,:description,:prix,:image,:id_categorie)";
        $stmt = Database::connect()->prepare($sql);
        $stmt->execute([
            ':name'=> $this->name,
            ':description' => $this->description,
            ':prix' => $this->prix,
            ':image' => $this->image,
            ':id_categorie' => $this->categorie->getId()
        ]);
    }

    public function getProduitById():?Produit{
        $sql = "SELECT * FROM produits WHERE id = :id";
        $stmt = Database::connect()->prepare($sql);
        $stmt->execute([
            ':id'=>$this->id
        ]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $stmt->fetch();
    }

    public static function getAllProduits():array {
        $sql = "SELECT * FROM produits";
        $stmt = Database::connect()->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

        return $stmt->fetchAll();
    }

    public function supprimerProduit():bool {
        $sql = "DELETE FROM produits where id = :id";
        $stmt = Database::connect()->prepare($sql);

        return $stmt->execute([
            ':id'=>$this->id
        ]);
    }
    
    public function updateProduit(){
        $sql = "UPDATE produits SET name =:name, description = :description,
        prix =:prix,image=:image, id_categorie=:id_categorie WHERE id = :id";
        $stmt = Database::connect()->prepare($sql);

        return $stmt->execute([
            ':name'=>$this->name,
            ':description'=>$this->description,
            ':prix' => $this->prix,
            ':image' => $this->image,
            ':id_categorie' => $this->categorie->getId(),
            ':id'=>$this->id
        ]); 
    }

    
    public static function getProduitsByCategorie(int $idCategorie): array
    {
        $sql = "SELECT * FROM produits WHERE id_categorie = :id";
        $stmt = Database::connect()->prepare($sql);
        $stmt->execute([':id' => $idCategorie]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $stmt->fetchAll();
    }
    
}