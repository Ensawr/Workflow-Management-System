<?php
session_start();

if(!isset($_SESSION["isLogin"])){
    header('location:../../user_login.php?i=1');
}

if($_SESSION["auth"]!="product"){
    if($_SESSION["auth"]!="admin"){
        header('location:../others/index.php?i=1');
    }
}

include "../others/master_page.php";
require "../../Controllers/feeders/control_feeder.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Control</title>
</head>
<body>
    
    <div class="container">

    <div class="table-title">
        <h2 class="text-center pt-4">Product List</h2>
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
                    <th>Content</th>
                    <th>Process</th>
                    
                </tr>
            </thead>

        <?php   
                $products = get_control_data();
                foreach($products as $product){   
                    $p_code = $product[2];
                    $p_colorcode = $product[4];    
        ?>
        <tbody>
            <form action="../../Controllers/control_page.php?send=data" method="POST" enctype="multipart/form-data">

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
                    <td style="display:none"><input type="text" name="hiddenID[]" value="<?php echo $product[0] ?>"></td>
                    <td>
                    <?php 
                        $path = "../../Static/photos/$p_code/ColorPhotos/$p_colorcode";
                        $photos = scandir($path);
                        foreach($photos as $photo){
                            if($photo=="." || $photo==".."){
                                continue;
                            }
                    ?> 
                    <a href="<?php echo $path.'/'.$photo; ?>" target="_blank"><img src="<?php echo $path.'/'.$photo; ?>" style="width:20%"></a>
                    <?php } ?>
                    </td>
                    <td>
                        <button type="submit" name="completed" value="completed" class="btn btn-dark">Complete</button>
                    </td>

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