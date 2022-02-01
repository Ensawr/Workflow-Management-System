<?php
session_start();

if(!isset($_SESSION["isLogin"])){
    header('location:../../user_login.php?i=1');
}

if($_SESSION["auth"]!="retouch"){
    if($_SESSION["auth"]!="admin"){
        header('location:../others/index.php?i=1');
    }
}

require "../../Controllers/feeders/retouch_feeder.php";
include "../others/master_page.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retouch Download</title>
 <!-- Bootstrap CSS -->
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!-- CSS -->
<link rel="stylesheet" href="../../Static/styles/product_upload.css" type="text/css">

</head>
<body>
<div class="container">

<div class="table-title">
    <h2 class="text-center pt-4">Retouch Download</h2>
</div>

<div class="search mb-2">
    <input class="form-control mr-sm-2 search_in" id="search" onkeyup="search()" type="search" placeholder="Search" aria-label="Search">
</div>
        

<div class="row">
    <div class="col-md-12" id="table-board">

    <table id="datatable" class="table table-striped table-bordered table-md" cellpadding="0" style="width=100;">
        <thead style="background-color:#E0BBE4;">
            <tr>
                <th>Product Code</th>
                <th>Color</th>
                <th>Color Code</th>
                <th>Barcode</th>
                <th>Download</th>
                
                
            </tr>
        </thead>
    <?php   
            $products = get_retouch_data();
            foreach($products as $product){       
    ?>
    <tbody>
        <tr>
            <td class="product_code">
                <input type="text" style="display:none" name="product_code" value="<?php echo $product[2] ?>">
                <?php echo $product[2] ?>
            </td>
            <td class="product_color"><?php echo $product[3] ?></td>
            <td class="product_color_code">
                <input type="text" style="display:none" name="product_color_code" value="<?php echo $product[4] ?>">
                <?php echo $product[4] ?>
            </td>
            <td class="product_barcode"><?php echo $product[1] ?></td>
            <td><a href="../../Static/photos/<?php echo $product[2]?>/studio/<?php echo $product[2]."-".$product[4]?>.zip" download>Download</a></td>
        </tr>
    </tbody>

    <?php
        }      
    ?>

</body>
</html>