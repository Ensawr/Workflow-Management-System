<?php
session_start();
require "../../Controllers/feeders/user_info_feeder.php";

if(!isset($_SESSION["isLogin"])){
    header('location:../../user_login.php?i=1');
}
if($_SESSION["auth"]!="admin"){
    header('location:index.php?i=1');
}

include "master_page.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../Static/styles/admin.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Admin Panel</title>
</head>
<body>
    
    <?php
        if(isset($_GET["i"])){
            if($_GET['i']==1){
                echo '<center><div class="alert alert-danger">This username already exists!</div></center>';
            }
            if($_GET['i']==2){
                echo '<center><div class="alert alert-success">Account created.</div></center>';
            }
            if($_GET['i']==3){
                echo '<center><div class="alert alert-success">Account deleted.</div></center>';
            }
        }
    ?>

<div class="container">
    <h2>Admin Panel</h2>

    <div id="accordion">

    <!-- Create User -->

    <div class="card">
        
        <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapseOne">
                Create Account
            </a>
        </div>

        <div id="collapseOne" class="collapse" data-parent="#accordion">
            <div class="card-body">

            <form action="../../Controllers/user_settings.php?data=createUser" method="post" class="was-validated">
                <div class="form-group">
                    <label for="uname">Username:</label>
                    <input type="text" class="form-control" id="uname" placeholder="Username" name="uname" required>
                    <div class="invalid-feedback">Must be filled.</div>
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
                    <div class="invalid-feedback">Must be filled.</div>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Password" name="pswd" required>
                    <div class="invalid-feedback">Must be filled.</div>
                </div>
                <div class="form-group">
                    <label for="auth">Auth:</label>
                    <select class="custom-select mr-sm-2" name="auth" id="inlineFormCustomSelect">
                        <option value="storage">Storage User</option>
                        <option value="studio_manager">Studio Manager</option>
                        <option value="studio1">Studio 1 User</option>
                        <option value="studio2">Studio 2 User</option>
                        <option value="studio3">Studio 3 User</option>
                        <option value="studio4">Studio 4 User</option>
                        <option value="retouch">Retoucher</option>
                        <option value="product">Product Manager</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-info placer">Create</button>
            </form>

            </div>
        </div>
    </div>

    <!-- User List -->

    <div class="card">
        <div class="card-header">
            <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                User List
            </a>
        </div>
        <div id="collapseTwo" class="collapse" data-parent="#accordion">
            <div class="card-body">
                <table class="table align-middle" id="table">
                    <thead style="background-color:#E0BBE4;">
                        <tr>
                        <th scope="col">Username</th>
                        <th scope="col">Name</th>
                        <th scope="col">Password</th>
                        <th scope="col">Auth</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $datas = get_user_infos();
                            foreach($datas as $data){       
                        ?>
                            <tr>
                                <td><?php echo $data[0] ?></td>
                                <td><?php echo $data[1] ?></td>
                                <td><?php echo $data[2] ?></td>
                                <td><?php echo $data[3] ?></td>
                                <td>
                                    <a style="color:red;" href="../../Controllers/user_settings.php?data=deleteUser&uname=<?php echo $data[0]; ?>">Delete User</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

</body>
</html>