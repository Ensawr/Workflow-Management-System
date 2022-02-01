<?php

include "connect_controllers/connection.php";
require "../Controllers/feeders/get_datetime.php";

function fix_photo_names($p_code,$p_colorcode){

    $folder = scandir("../Static/photos/$p_code/ColorPhotos/$p_colorcode");
    $path = "../Static/photos/$p_code/ColorPhotos/$p_colorcode";
    $count = 1;

    foreach($folder as $img){

        if($img=="." || $img==".."){
            continue;
        }
        else{
            $ext = substr($img, -4,4);
            rename($path."/".$img,$path."/".$p_code."_".$p_colorcode."-".$count.$ext);
            $count++;
        }
        
    }

}


if(isset($_GET["send"])){
	if($_GET["send"]=="data"){

        $productID =$_POST['hiddenID'];
        $p_code = $_POST['product_code'];
        $p_colorcode = $_POST['product_color_code'];
        
        $datetime = get_datetime();

        if($_POST['completed']){

            fix_photo_names($p_code,$p_colorcode);
            
            foreach($productID as $id){
                $query = "update routes_product set control='false', retouch='', time_completed='$datetime' where id='$id'";
                $result = $conn->query($query);
            }
            header("location:../Views/product/product_control.php");  
           
        }
    }
}