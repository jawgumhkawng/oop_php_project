<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>register</title>
    <style>
 .wrap {
 width: 100%;
 max-width: 400px;
 margin: 120px auto;
 }
 </style>
</head>
<body class="bg-dark">
        <div class="text-center">
            <div class="wrap">
                <div class="card p-4 bg-dark border border-secondary shadow-lg">
                    <?php if(isset($_GET['error'])) : ?>
                        <div class="alert alert-warning">
                            <h4>Cannot create account.Please try again!</h4>
                        </div>
                    <?php endif ?>
                    <?php if(isset($_GET['Regerror'])) : ?>
                        <div class="alert alert-warning">
                            <h4>image must be png!!</h4>
                        </div>
                    <?php endif ?>
                    <div class="h3 text-danger mb-2">Register <span class="text-white">Page</span></div><hr class="text-white mb-2">
                    <form class="form-floating mt-3 " action="_actions/create.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input class="form-control" type="file" id="formFile" name="photo" required>
                    </div>
                    <div class="form-floating mb-3 bg-dark">
                        <input type="text" class="form-control " name="name" id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput">Name</label>
                    </div>
                    <div class="form-floating mb-3 ">
                        <input type="email" class="form-control " name="email" id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput">Email address</label>
                    </div>
                
                    <div class="form-floating mb-3 ">
                        <input type="password" class="form-control " name="password" id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput">Password</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="number" class="form-control " name="phone" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Phone</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control " name="address" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Address</label>
                    </div>
                    <span class="text-white">Have an account? <a href="index.php" class="text-decoration-none">Login here</a></span>
                    <button type="submit" class="btn btn-success float-end px-4">SginUp</button>
                    </form>
                </div>
           </div>
        
        </div>
    
</body>
</html>