<?php
session_start();
require "../../Controllers/feeders/get_datetime.php";
include '../../Controllers/connect_controllers/connection.php';

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

// include "../others/master_page.php";

if(isset($_GET["data"])){
    $sql = "select * from products where barcode='".$_GET["barcode"]."'";
    $result= $conn->query($sql);

    

    foreach($result as $data=>$value){

        $itemCode = $value['itemCode'];
        $color = $value['color'];
        $colorCode = $value['colorCode'];
        $barcode = $value['barcode'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../Static/styles/product_edit_2.css">
    <title><?php echo $itemCode ?></title>
</head>
<body>
    

    <div class="card" id="card_container">
        <div class="card-header text-center">
            <?php echo $itemCode ?>
        </div>

        <?php 
            $path = "../../Static/photos/$itemCode/studio/$colorCode";
            $sendpath = "../Static/photos/$itemCode/studio/$colorCode";
            $pathXcc = "../Static/photos/$itemCode/studio/";
            $photos = scandir($path);
            if($photos<1){
                echo "<p style='font-size:30px; color:red'>Product photos do not uploaded yet !</p>";
            }
            else{
            array_shift($photos);
            array_shift($photos);
            foreach($photos as $photo){
        ?>    
<form action="../../Controllers/product_edit_change.php?send=data" method="POST" enctype="multipart/form-data">

<table>
            <tr>
                <td><img src="<?php echo $path."/".$photo ?>">  </td>
                <input type="text" style="display:none" name="photoName" value="">
                <input type="text" style="display:none" name="photoPath" value="<?php echo $pathXcc; ?>">
                <input type="text" style="display:none" name="photoItemCode" value="<?php echo $itemCode; ?>">
                <input type="text" style="display:none" name="photoColorCode" value="<?php echo $colorCode; ?>">
                <input type="text" style="display:none" name="barcode" value="<?php echo $barcode; ?>">
        
                
                <td><button type="submit" name="deletePhoto" value="<?php echo $sendpath."/".$photo; ?>" class="btn btn-outline-danger delete">Delete</button></td>
            </tr>
        </table>
        


    <?php } ?> 
            <td><input type="file" name="files[]" class="choose_file"></td>
            <td><button type="submit" name="add" value="add" class="btn btn-outline-info add">Add</button></td>
    <?php } ?>
    
    </form>
    </div>

<?php
    }    
} 
?>

</body>
</html>



