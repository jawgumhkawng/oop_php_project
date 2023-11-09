<?php
 session_start();
 
 if(!isset($_SESSION['user'])) {

 header('location: index.php');

 exit();

 }
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
<div class="loading">
    <div class="spinner"></div>
  </div>
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
        <?php if(file_exists('./_action/photos/profile.jpg')): ?>
            <img 
            class="img-thumbnail mb-3"
            src="./_action/photos/profile.jpg"
            alt="Profile Photo" width="200" height="230px">
        <?php else : ?>
            <p class="alert alert-info">upload your profile photo</p>
            <img 
            class="img-thumbnail mb-3"
            src="./_action/photos/fake_profile.jpg"
            alt="Profile Photo" width="200" height="230px">
            
        <?php endif ?>
          
         <h4 class="mb-2 mt-2  text-light">John Doe (<span class="text-danger">Manager</span>)</h4><hr class="text-secondary ">
         <form action="./_action/file_upload.php" method="post" 
            enctype="multipart/form-data">
            <div class="input-group mb-3">
            <input type="file" name="photo" class="form-control">
            <button class="btn btn-secondary">Upload</button>
            </div>
        </form>
            <ul class="list-group border-secondary mt-3">
                
                <li class="list-group-item bg-dark text-light">
                <b>Email:</b> john.doe@gmail.com
                </li>
                <li class="list-group-item bg-dark text-light">
                <b>Phone:</b> (09) 243 867 645
                </li>
                <li class="list-group-item bg-dark text-light">
                <b>Address:</b> No. 321, Main Street, West City
                </li>
            </ul>
            <br>
            <a href="_action/logout.php">Logout</a>
        </div>
        </div>
    </div>
    <script>
        
// loading

window.addEventListener('load', () => {
  document.querySelector(".loading").style.display = "none";
})
    </script>
</body>
</html>
