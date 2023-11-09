<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>index</title>
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
                <?php if ( isset($_GET['incorrect']) ) : ?>
                <div class="alert alert-danger">
                Incorrect Email or Password
                </div>
                <?php endif ?>
                    <div class="h3 text-danger mb-2">Login <span class="text-white">Page</span></div><hr class="text-white mb-2">
                    <form class="form-floating mt-3 " action="_actions/login.php" method="post">
                    <div class="form-floating mb-3 ">
                        <input type="email" class="form-control " id="floatingInput" name="email" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control " id="floatingPassword" name="password" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <span class="text-white ">Don't have an account?<a href="register.php" class="text-decoration-none">Register first</a></span>
                    <button type="submit" class="btn btn-success float-end px-3">Sgin In</button>
                    </form>
                </div>
           </div>
        
        </div>
    
</body>
</html>