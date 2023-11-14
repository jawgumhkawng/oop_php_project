<?php
session_start();

include ('../vendor/autoload.php');

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

$email = $_POST['email'];
$password = md5($_POST['password']);

$table = new UsersTable(new MySQL());

$user = $table->FindByEmailAndPassword($email, $password);

if($user) {

  if ($user->suspended){
    HTTP::redirect("/index.php", "suspended=1");
  }

  $_SESSION['user'] = $user;
  HTTP::redirect("/admin.php");
}else {
  HTTP::redirect("/index.php", "incorrect=1");

}

