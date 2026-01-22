<?php
namespace App\Models;
use App\Core\Database;
use PDO;

class User{
    private int $id;
    private string $firstname;
    private string $lastname;
    private string $phone;
    private string $email;
    private string $password;
    private ?string $role;
    private PDO $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getId():int {return $this->id; }

    public function setId($id) { $this->id = $id;}

    public function getFirstname():string { return $this->firstname;}
    public function getLastname():string { return $this->lastname;}
    public function getPhone():string { return $this->phone;}
    public function getEmail():string { return $this->email;}
    public function getPassword():string { return $this->password;}
    public function getRole():string { return $this->role;}

    public function setFirstName(string $firstname) { $this->firstname = $firstname; }
    public function setLastName(string $lastname){ $this->lastname = $lastname; }
    public function setPhone(string $phone){ $this->phone = $phone; }
    public function setEmail(string $email){ $this->email = $email; }
    public function setPassword(string $password){ $this->password = $password; }
    public function setRole(string $role){ $this->role = $role; }

    public function save(){
        $sql = "INSERT INTO users (firstname,lastname,phone,email,password,role)
        VALUES (:firstname,:lastname,:phone,:email,:password,:role)";


        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ":firstname" => $this->firstname,
            ":lastname" => $this->lastname,
            ":phone"  => $this->phone,
            ":email"  => $this->email,
            ":password" => password_hash($this->password, PASSWORD_DEFAULT),
            ":role" => $this->role
        ]);
    }

    public function geUserByEmail(){
        $sql = "SELECT * FROM users where email = :email";
        $stmt = $this->db->prepare($sql);

        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, self::class);
        $stmt->execute([
            ':email'=> $this->email
        ]);
        return $stmt->fetch();
    }

    public function getUserById() {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, self::class);
        $stmt->execute([
            ':id' => $this->id
        ]);
        return $stmt->fetch();
    }

    
}