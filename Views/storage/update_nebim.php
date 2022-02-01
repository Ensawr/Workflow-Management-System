<?php
session_start();

if(!isset($_SESSION["isLogin"])){
    header('location:../../user_login.php?i=1');
}

if($_SESSION["auth"]!="storage"){
    if($_SESSION["auth"]!="admin"){
    header('location:../others/index.php?i=1');
    }
}

include "../others/master_page.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <title>Nebim Update</title>
</head>
<body>

    <?php
        if(isset($_GET["i"])){
            if($_GET['i']==1){
                echo '<div class="alert alert-success"><center>Data Updated.</center></div>';
            }
        }
    ?>

    <form action="../../Controllers/nebim_updater.php" method="post">
        <center>
            <button type="submit" name="nebim_products" value="Nebim" onclick="nebim_products()" class="btn btn-dark btn-lg col-md-3" style="margin-top:20%">UPDATE PRODUCTS</button>
        </center>
    </form>
</body>
</html>