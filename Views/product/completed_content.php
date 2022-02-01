<?php
session_start();

if(!isset($_SESSION["isLogin"])){
    header('location:../../user_login.php?i=1');
}

if($_SESSION["auth"]!="product"){
    if( $_SESSION["auth"]!="admin"){
        header('location:../others/index.php?i=1');
    }
}

include '../../Controllers/connect_controllers/connection.php';

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
    <link rel="stylesheet" href="../../Static/styles/prodcut_edit_2.css">
    <title><?php echo $itemCode ?></title>
</head>
<body>
    

    <div class="card" id="card_container">
        <div class="card-header text-center">
            <?php echo $itemCode." ___ ".$colorCode." ___ ".$color ?>
        </div>

        <?php 
            $path = "../../Static/photos/$itemCode/ColorPhotos/$colorCode";
            $photos = scandir($path);
            array_shift($photos);
            array_shift($photos);
            foreach($photos as $photo){
            $photoNumber = substr($photo, -5,1);
            $txtbox = 0;
        ?>    

        <form action="../../Controllers/control_changer.php?send=data" method="POST" class="was-validated" enctype="multipart/form-data">


                <ul class="list-group list-group-flush">
                    <li class="list-group-item photo">
                        <div class="card">
                            <div class="card-body">
                                <input type="text" style="display:none" name="itemcode" value="<?php echo $itemCode; ?>">
                                <input type="text" style="display:none" name="colorcode" value="<?php echo $colorCode; ?>">
                                <img src="<?php echo $path."/".$photo ?>">   
                                <input type="number" class="form-control" style="width:150px; float:right;" name="numbers[]" onchange="valid_numbers()" id="<?php echo "textbox-".$txtbox ?>" value="<?php echo $photoNumber ?>" required>
                            </div>
                        </div>
                    </li>
                </ul>

                <?php $txtbox++; } ?>
                <button type="submit" id="changer">Change</button>
        </form>

    </div>

    <?php
        }    
    } 
    ?>

</body>

</html>



