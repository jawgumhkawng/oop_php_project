
<?php
include("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;

$table = new UsersTable(new MySQL());
$all = $table->getAll();

$auth = Auth::check();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .head{
            position: relative;
        }
        .head.badge{
            position: absolute;
            right: 0;
            bottom: 70%;
        }
    </style>
</head>
<body class="bg-dark">
    <div class="container">
        
     
       <div class="mt-5 mb-3">
       <h3 class="h2 btn btn-primary position-relative d-inline">
                  All Users
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger px-2">
                 <?= count($all) ?>
            </span>
        </h3>
       
       <div class="d-inline">
       <img src="./_actions/photos/<?= $auth->photo ?>" width="50px" class="rounded-circle shadow-lg float-end d-inline position-relative ms-3" style="border: 2px solid gray; bottom:10px">
        <h4 class="text-info float-end d-inline"><?= $auth->name ?></h4>
       </div>
        
   
        <div class="ms-5 d-inline position-relative" style="right: -250px;">
            <a href="profile.php" class="btn btn-primary">View Profile</a> <a href="./_actions/logout.php" class="btn btn-danger">Logout</a>
        </div>

       </div>
        <!-- <div class="head mb-5 mt-5 text-white btn btn-primary">User Manage <span class="badge bg-danger text-white"> <?= count($all) ?></span> </div> -->

        <table class="table table-hover  table-dark">
            <tr>
                <th>ID</th>
                <th>PHOTO</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th>Address</th>
                <th>Role</th>
                <th>ACTION</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($all as $user) :  ?>
            <tr>
                <?php if($user->suspended) : ?>
                    <td class="text-danger"><?= $i ?></td>
                    <td><img src="./_actions/photos/<?= $user->photo ?>" width="35px" class="rounded-circle shadow-lg " style="border: 2px solid red; bottom:10px"></td>
                    <td class="text-danger"><?= $user->name ?></td>
                    <td class="text-danger"><?= $user->email ?></td>
                    <td class="text-danger"><?= $user->phone ?></td>
                    <td class="text-danger"><?= substr($user->address,0,20) ?></td>
                <?php else : ?>
                    <td><?= $i ?></td>
                    <td><img src="./_actions/photos/<?= $user->photo ?>" width="35px" class="rounded-circle shadow-lg " style="border: 2px solid gray; bottom:10px"></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->phone ?></td>
                    <td><?= substr($user->address,0,20) ?></td>
                <?php endif ?>
                <td>
                <?php if($user->value == '1'): ?>

                    <?php if($user->id == $auth->id) : ?>
                        <span class="badge bg-secondary position-relative"><?= $user->role ?>
                       <span class="position-absolute top-0 start-100 translate-middle p-1 bg-info border border-light rounded-circle"></span></span>
                    <?php else : ?>
                        <span class="badge bg-secondary position-relative"><?= $user->role ?></span>
                    <?php endif ?>

                <?php elseif($user->value == '2') : ?>

                    <?php if($user->id == $auth->id) : ?>
                        <span class="badge bg-warning position-relative"><?= $user->role ?>
                       <span class="position-absolute top-0 start-100 translate-middle p-1 bg-info border border-light rounded-circle"></span></span>
                    <?php else : ?>
                        <span class="badge bg-warning position-relative"><?= $user->role ?></span>
                    <?php endif ?>

                <?php else : ?>

                    <?php if($user->id == $auth->id) : ?>
                        <span class="badge bg-success position-relative"><?= $user->role ?>
                       <span class="position-absolute top-0 start-100 translate-middle p-1 bg-info border border-light rounded-circle"></span></span>
                    <?php else : ?>
                        <span class="badge bg-success position-relative"><?= $user->role ?></span>
                    <?php endif ?>

                <?php endif ?>

                </td>
                <td>
                    <?php if($auth->value > 1) : ?>

                        <div class="btn-group dropdown">
                            <?php if($auth->value == 3) : ?>
                                    <?php if($user->id !== $auth->id ) : ?>
                                        <a href="" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle = "dropdown">
                                        Change Role
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-dark">
                                        <a href="./_actions/role.php?id=<?= $user->id ?>&role_id=1"  class="dropdown-item">User</a>
                                        <a href="./_actions/role.php?id=<?= $user->id ?>&role_id=2"  class="dropdown-item">Manager</a>
                                        <a href="./_actions/role.php?id=<?= $user->id ?>&role_id=3"  class="dropdown-item">Admin</a>
                                    </div>
                                <?php endif ?>
                           <?php endif ?>

                           <?php if($user->value != 3 ) : ?>
                            <?php if($user->id !== $auth->id) : ?>
                            
                            <?php if($user->suspended) : ?>
                                <a href="./_actions/unsuspend.php?id=<?= $user->id ?>" class="btn btn-sm btn-info">Unban</a>

                            <?php else : ?>
                                <a href="./_actions/suspend.php?id=<?= $user->id ?>" class="btn btn-sm btn-warning">Ban</a>

                            <?php endif ?>

                        <?php else : ?>

                         <p class="h6 ms-5">#</p>

                        <?php endif ?>
                        

                        <?php if($user->id !== $auth->id) : ?>
                            <a href="./_actions/delete.php?id=<?= $user->id ?>" class="btn btn-sm btn-danger" onClick="return confirm('Are you sure?')">Delete</a>
                     <?php endif ?>
                            <?php else : ?>

                            <p class="h6 ms-5">#</p>
                           <?php endif ?>
                            
                        </div>


                    <?php else : ?>
                       
                        <p class="h6 ms-5">no action</p>
                        
                    <?php endif ?>

                </td>
            </tr>
            <?php
           $i++;
            endforeach ?>
        </table>
    </div>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>