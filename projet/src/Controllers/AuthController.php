<?php
 namespace App\Controllers;
use App\Core\Controller;
use App\Models\User;
use App\Models\Categorie;
use App\Models\Produit;

use App\Middleware\AuthMiddleware;

class AuthController extends Controller {


        public function index(){
            $produits =  Produit::getAllProduits();
            $categories = Categorie::getAllCategories();

             $this->view('index', ['produit'=>$produits, 'categorie'=>$categories]);
        }
        public function register(){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $user = new User();

            $user->setFirstName($_POST['firstname']);
            $user->setLastName($_POST['lastname']);
            $user->setPhone($_POST['phone']);
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            $user->setRole($_POST['role']);
            

            try {
                $user->save();
                $this->view('auth/connexion');
                // header('location: /auth/connexion');
                exit;
            }catch(PDOException $e){
                $erreur = "Erreur lorsuqe l'inscription : ". $e->getMessage();
                $this->view('auth/inscription', ['erreur' => $erreur]);
                return;
            }
        }

        $this->view('auth/inscription');
        }


        public function login(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $email = $_POST['email'];
                $password = $_POST['password'];
            

                if(empty($email) || empty($password)){
                    $this->view('auth/connexion', [
                        'erreur' => 'les champs oblegatoire a remplie'
                    ]);
                    return;
                }

                // var_dump($email);
                $userAuth = new User();
                $userAuth->setEmail($email);

                $user = $userAuth->geUserByEmail();
                
                if(!$user){
                
                    $this->view('auth/connexion', ['erreur'=>'acune utilisateur pour ce email']); 
                    // echo"tetst";
                    return;
                }
                
                if(!password_verify($password, $user->getPassword())){
                    $this->view('auth/connexion', ['erreur' => 'password ou email incorrect']);
                    return;
                };

                // if(session_status() === PHP_SESSION_NONE){
                //     session_start();
                // }
                $_SESSION['id'] = $user->getId();
                header('location: /index.php/auth/dashboard');
                exit;
            }
        }
        public function dashboard(){
            AuthMiddleware::handle();
            $userModal = new User();
            $userModal->setId($_SESSION['id']);

            $user =$userModal->getUserById();

            if($user->getRole() === 'admin'){
                    $this->view('home/admin', ['user'=>$user]);
                    exit;
                }else{
                    $this->view('home/user', ['user'=>$user]);
                }
        }

        public function logout(){
            session_unset();
            session_destroy();
            header('location: /index.php/auth/index');
            exit;
        }

    
    }