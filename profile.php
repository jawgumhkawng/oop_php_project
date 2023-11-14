<?php
include ('vendor/autoload.php');

use Helpers\Auth;

$auth = Auth::check();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/cus.css">
    <style>
 .wrap {
        width: 100%;
        max-width: 400px;
        margin: 120px auto;
        }
 </style>
</head>
<body class="bg-dark">
    <div class="container mt-5">
        <div class="wrap">
        <div class="card bg-dark p-3 border-secondary shadow-lg">
        <?php if(isset($_GET['error'])) : ?>
            <div class="alert alert-danger">
                File cannot upload
            </div>
        <?php endif ?>
        <?php if(isset($_GET['type'])) : ?>
            <div class="alert alert-warning">
                Image must be jpg,jpeg and png!
            </div>
        <?php endif ?>
        
        <?php if(isset($auth->photo)) : ?>
            <img 
            class="img-thumbnail mb-3 ms-5 position-relative"
            src="./_actions/photos/<?= $auth->photo ?>"
            alt="Profile Photo" width="200" height="230px" style="right: -30px;">
        <?php else : ?>
            <p class="alert alert-info">upload your profile photo</p>
            <img 
            class="img-thumbnail mb-3"
            src="./_actions/photos/fake_profile.jpg"
            alt="Profile Photo" width="200" height="230px">
            
        <?php endif ?>
          
         <h4 class="mb-2 mt-2  text-light"><?= $auth->name ?> (<span class="text-danger"><?= $auth->role ?></span>)</h4><hr class="text-secondary ">
     
        <form action="./_actions/file_upload.php" method="post" 
            enctype="multipart/form-data">
            <div class="input-group mb-3">
            <input type="file" name="photo" class="form-control">
            <button class="btn btn-secondary">Update Photo</button>
            </div>
        </form>
       
            <ul class="list-group border-secondary mt-3">
                
                <li class="list-group-item bg-dark text-light">
                <b>Email:</b> <?= $auth->email ?>
                </li>
                <li class="list-group-item bg-dark text-light">
                <b>Phone:</b> <?= $auth->phone ?>
                </li>
                <li class="list-group-item bg-dark text-light">
                <b>Address:</b> <?= $auth->address ?>
                </li>
            </ul>
            <br>
            <div class=""><a href="admin.php" class="btn btn-primary">Users Manage</a>
            <a href="_actions/logout.php" class="btn btn-danger float-end">Logout</a></div>
        </div>
        </div>
    </div>
    <!-- <script>
        
// loading

window.addEventListener('load', () => {
  document.querySelector(".loading").style.display = "none";
})
    </script> -->
</body>
</html>
