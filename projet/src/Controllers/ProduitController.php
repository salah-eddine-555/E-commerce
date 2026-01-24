<?php
namespace App\Controllers;
use App\Models\Produit;
use App\Core\Controller;
use App\Models\Categorie;

class ProduitController extends Controller {

    public function index(){
        $produits =  Produit::getAllProduits();
        $categories = Categorie::getAllCategories();
    

        $this->view('home/admin', ['produits' => $produits, 'categories' => $categories]);
    }

    public function create(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
              if(empty($_POST['name'])|| empty($_POST['description']) || empty($_POST['prix'])){
                 $this->view('home/categories', [
                'erreur'=>'les champs sont oblegatoire a remplit'
            ]);
            exit;
            }
        $produit = new Produit();
        $produit->setName($_POST['name']);
        $produit->setDescription($_POST['description']);
        $produit->setPrix($_POST['prix']);

        $categorie = new Categorie();
        $categorie->setId((int) $_POST['categorie_id']);
      
        $produit->setCategorie($categorie);

       

        $imagepath = null;
        if(isset($_FILES['image']) && $_FILES['image']['error']=== 0){

            $uploadfile = __DIR__.'/../../public/images/uploads/';
            if(!is_dir($uploadfile)){
                mkdir($uploadfile , 0755, true);
            }
            $filename = time().'_'.basename($_FILES['image']['name']);
            $targetPath = $uploadfile . $filename;

            if(move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)){
                $imagepath = '/public/images/uploads/'. $filename;
            }

        }
        $produit->setImage($imagepath);
        $produit->create();

        header("location: /index.php/produit/index");
        exit;

        }
    }
}