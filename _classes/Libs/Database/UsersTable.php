<?php

namespace Libs\Database;

use PDOException;

class UsersTable {
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }

    public function insert($data) 
    {
        try {

            $query = "INSERT INTO users(name,email,password,phone,address,role_id,photo,created_at) VALUES(:name, :email, :password, :phone, :address, :role_id,:photo, NOW())";
            $stmt = $this->db->prepare($query);
            $stmt->execute($data);
            return $this->db->lastInsertId();

        } catch(PDOException $e)
         {
            return $e->getMessage();
        }
    }

    public function getAll() 
    {
        try {

        $stmt= $this->db->query("SELECT users.*, roles.name AS role, roles.value FROM users LEFT JOIN roles ON users.role_id = roles.id ORDER BY id DESC");
               
        return $stmt->fetchAll();

    } 
    catch(PDOException $e)
    {
       return $e->getMessage();
   }
      
    }

    public function FindByEmailAndPassword($email, $password){
        $stmt = $this->db->prepare("SELECT users.*, roles.name AS role, roles.value FROM users LEFT JOIN roles ON users.role_id = roles.id WHERE users.email = :email AND users.password = :password");
        $stmt->execute(['email' => $email,'password' => $password ]);
        $row = $stmt->fetch();

        return $row ?? false;
    }

    public function UpdatePhoto($photo, $id){
        $stmt = $this->db->prepare("UPDATE users SET photo=:photo WHERE id=:id");
        $stmt->execute(['photo'=>$photo , 'id'=>$id]);
        return $stmt->rowCount();
    }

    public function Suspend($id){
        $stmt = $this->db->prepare("UPDATE users SET suspended=1 WHERE id=:id");
        $stmt->execute(['id'=>$id]);
        return $stmt->rowCount();
    }

    public function Unsuspend($id){
        $stmt = $this->db->prepare("UPDATE users SET suspended=0 WHERE id=:id");
        $stmt->execute([ 'id'=>$id]);
        return $stmt->rowCount();
    }

    public function ChangeRole($role, $id){
        $stmt = $this->db->prepare("UPDATE users SET role_id=:role WHERE id=:id");
        $stmt->execute(['role'=>$role , 'id'=>$id]);
        return $stmt->rowCount();
    }

    public function Delete($id){
        $stmt = $this->db->prepare("DELETE FROM users  WHERE id=:id");
        $stmt->execute([ 'id'=>$id]);
        return $stmt->rowCount();
    }
    
}