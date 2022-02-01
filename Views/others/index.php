<?php
session_start();


if(!isset($_SESSION["isLogin"])){
    header('location:../../user_login.php?i=1');
}

if(isset($_GET["i"])){
    if($_GET['i']==1){
        echo '<div class="alert alert-danger"><center>You do not have permission for this page.</center></div>';
    }
}

include "master_page.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <style>
        .logo{
            display: table;
            position: relative;
            overflow: hidden;
            text-align:center;
            margin:0 auto;
            width: 30%;
            margin-top:10%;
        }
        .welcome{
            font-size:28px;
            text-align:center;
            margin-left:25px;
            padding-top:80px;
            font-weight:bold;
        }
        .color{
            color: #957DAD;
            font-size:28px;
            text-align:center;
            margin-left:25px;
            font-weight:bold;
        }
    </style>
    <title>WMS - Main Page</title>
</head>
<body>
    <div><p class="welcome">Welcome</p> <p class="color"><?php echo $_SESSION["who"] ?></p></div>
    <img class="logo" src="../../Static/img/logo.png" alt="WMS">
</body>
</html>