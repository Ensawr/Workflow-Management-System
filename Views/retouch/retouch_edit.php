<?php
session_start();
require "../../Controllers/feeders/retouch_edit_feeder.php";
require "../../Controllers/feeders/get_datetime.php";
if(!isset($_SESSION["isLogin"])){
    header('location:../../user_login.php?i=1');
}

if($_SESSION["auth"]!="retouch"){
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel='stylesheet' href="../../Static/Styles/studio_tables.css" style="text/css"/>
    <script src="../../Static/javascripts/studio_dynamic_table.js" type="text/javascript"></script>
    <script src="../../Static/javascripts/edit_product.js" type="text/javascript"></script>


    <title>Retouch Photo Edit</title>
</head>
<body>

  
 
    <div class="product_edit_search">
        <input type="text" class="form-control" name="productC" id="productC"  onkeyup="Search_edit()" placeholder="Product Code Search">
        <input type="text" class="form-control" name="productB" id="productB"  onkeyup="Search_edit_barcode()" placeholder="Barcode Search">   
    </div>
    <div class="product_edits table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table align-middle" id="product_edit">
            <thead style="background-color:#E0BBE4;">
                <tr>
                <th scope="col">Product Code</th>
                <th scope="col">Product Color</th>
                <th scope="col">Color Code</th>
                <th scope="col">Barcode</th>
                <th scope="col">Process</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $datas = get_retouch_edit_data();
                    foreach($datas as $data){       
                ?>
                    <tr>
                        <td><?php echo $data[0] ?></td>
                        <td><?php echo $data[1] ?></td>
                        <td><?php echo $data[2] ?></td>
                        <td><?php echo $data[3] ?></td>
                        
                      <td>
                        <a href="retouch_edit_2.php?data&barcode=<?php echo $data[3] ?>" target="_blank">View</a>
                      </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
   
</body>
</html>