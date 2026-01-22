<?php
namespace App\Core;

use PDO;
use PDOException;

class Database {
    private static ?PDO $conn = null;
    
    public static function connect(){

        if(self::$conn == null){
             try{
            self::$conn = new PDO('mysql:host=mysql;dbname=EcommerceTech', 'root', 'root');
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo"succe";
            
    
                
            }catch(PDOException $e){
                die("Erreur de connexion au base de donnee " .$e->getMessage());
            }
        
        }
        return self::$conn;

       
    }


}

   
        
