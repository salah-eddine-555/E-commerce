<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Models\Categorie;


class CategorieController extends Controller {


    public function index(){
        $categories = Categorie::getAllCategories();
         $this->view('home/categories', [
            'categories' => $categories
        ]);
    }

    public function create(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
           
            if(empty($_POST['name'])){
                 $this->view('home/categories', [
                'erreur'=>'les champs sont oblegatoire a remplit'
            ]);
            exit;
            }
            $categorie = new Categorie();
            $categorie->setName($_POST['name']);

            $categorie->create();
            header('location: /index.php/categorie/index');
            exit;  
        }
    }

    public function update(){
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            if(empty($_POST['name']) || empty($_POST['id'])){
                return;
            }

            $categorie =new Categorie();
            $categorie->setId($_POST['id']);
            $categorie->setName($_POST['name']);

            $categorie->update();

            header("location: /index.php/categorie/index");
            exit;
        }
    }

    public function delete(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $categorie = new Categorie();
            $categorie->setId($_POST['id']);
            $categorie->delete();

            header('location: /index.php/categorie/index');
            exit;
        }
    }
}