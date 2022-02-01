<?php
session_start();

require "../../Controllers/feeders/product_upload_feeder.php";

if(!isset($_SESSION["isLogin"])){
    header('location:../../user_login.php?i=1');
}

if($_SESSION["auth"]!="studio1"){
    if($_SESSION["auth"]!="studio2"){
        if($_SESSION["auth"]!="studio3"){
            if($_SESSION["auth"]!="studio4"){
                if($_SESSION["auth"]!="admin"){
                    header('location:../others/index.php?i=1');
                } 
            }
        }
    }
}

$userAuth = $_SESSION['auth'];

include "../others/master_page.php";

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    
<!-- CSS -->
    <link rel="stylesheet" href="../../Static/styles/product_upload.css" type="text/css">
    <title>Product Photo Upload</title>
  </head>
  <body>
    <div class="container">

        <div class="table-title">
            <h2 class="text-center pt-4">Product List</h2>
        </div>

        <div class="search mb-2">
            <input class="form-control mr-sm-2 search_in" id="search" onkeyup="search()" type="search" placeholder="Product Code Search" aria-label="Search">
            <input class="form-control mr-sm-2 search_in" id="searchBarcode" onkeyup="searchBarcode()" type="search" placeholder="Barcode Search" aria-label="Search">
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
                                <th>Content</th>
                                <th>Route</th>
                                
                            </tr>
                        </thead>

            <?php   
                    $products = get_product_data($userAuth);
                    foreach($products as $product){       
            ?>
                <tbody>
                    <form action="../../Controllers/upload_product.php?send=data" method="POST" enctype="multipart/form-data">

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
                                <td class="product_browse"><input type="file" name="files[]" class="form-control-file" id="exampleFormControlFile1" multiple></td>
                                <td style="display:none"><input type="text" name="hiddenID[]" value="<?php echo $product[0] ?>"></td>

                            <?php if(strlen($product[5])=="0"){ ?>
                                <td class="product_buttons">
                                    <div>
                                        <button type="submit" name="studio1" value="studio1" class="btn btn-dark">Studio 1</button>
                                        <button type="submit" name="studio2" value="studio2" class="btn btn-dark">Studio 2</button>
                                        <button type="submit" name="studio3" value="studio3" class="btn btn-dark">Studio 3</button>
                                        <button type="submit" name="studio4" value="studio4" class="btn btn-dark">Studio 4</button>
                                    </div>
                                </td>
                            <?php } else{ ?>

                                <td class="product_buttons">
                                    <div>
                                        <button type="submit" name="retouch" value="retouch" class="btn btn-dark">Retouch</button>
                                    </div>
                                </td>

                            <?php } ?>

                            </tr>
                    </form>
                </tbody>
          
            <?php
        
            }      
            ?>

            </table>   
            </div>
        </div>
    </div>

   

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
<!-- CUSTOM JS -->

    <script src="../../Static/javascripts/product_upload.js"></script>

  </body>
</html>
