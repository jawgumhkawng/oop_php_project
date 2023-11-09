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

            $query = "INSERT INTO users(name,email,password,phone,address,role_id,created_at) VALUES(:name, :email, :password, :phone, :address, :role_id, NOW())";
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
        try{

            $query = ("SELECT users.*,roles.name,roles.value AS roles FROM users LEFT JOIN roles ON users.role_id = roles.id");
            $stmt= $this->db->prepare($query);
            $stmt->execute();
            
            return $stmt->fetchAll();

        } catch(PDOException $e )
        {
            return $e->getMessage();
        }
    }
}