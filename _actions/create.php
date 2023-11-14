<?php

include ('../vendor/autoload.php');

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;



    $name = $_FILES['photo']['name']; 
    $tmp = $_FILES['photo']['tmp_name'];
    $type = $_FILES['photo']['type'];
    $error = $_FILES['photo']['error'];

    if($error) {

        HTTP::redirect('/profile.php', 'error=file');
    }

    if($type === "image/jpg" || $type === "image/jpeg" || $type === "image/png"){

$data = [
    "name" => $_POST['name'] ?? 'Unknown',
    "email" => $_POST['email'] ?? 'Unknown',
    "password" => md5($_POST['password']),
    "phone" => $_POST['phone'] ?? 'Unknown',
    "address" => $_POST['address'] ?? 'Unknown',
    "photo" =>  $_FILES['photo']['name'] ?? 'Unknown',
    "role_id" => 1,
];

    move_uploaded_file($tmp, "photos/$name");

    


$table = new UsersTable( new MySQL());

if ($table){
    $table->insert($data);
    HTTP::redirect("/index.php", "registered=true");
} else {
    HTTP::redirect("/register.php", "error=true");
}
    
} else {

    HTTP::redirect('/register.php','Regerror=type');
}
