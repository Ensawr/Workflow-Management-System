<?php
include "connect_controllers/connection.php";

if(isset($_GET["data"])){
	if($_GET["data"]=="first_studio_datas"){

        $barcodes =$_POST['hiddenBarcode'];
        $Pnames =$_POST['hiddenPName'];
        $datetime =$_POST['datetime'];

        // Creating folder

        function crt_folder($foldername){

                mkdir("../Static/photos/".$foldername);
                mkdir("../Static/photos/".$foldername."/studio");
                mkdir("../Static/photos/".$foldername."/ColorPhotos");

        }

        if($_POST['studio1']){
            
            foreach($barcodes as $barcode){
                $query = "insert into routes_product set barcode='$barcode', first_location='1', time_first_action='$datetime'";
                $result = $conn->query($query);
            }

            foreach($Pnames as $Pname){
                crt_folder($Pname);
            }

            header("location:../Views/studio/route_studio.php?i=1");  
           
        }

        elseif($_POST['studio2']){

            foreach($barcodes as $barcode){
                $query = "insert into routes_product set barcode='$barcode', first_location='2', time_first_action='$datetime'";
                $result = $conn->query($query);
            }
            
            foreach($Pnames as $Pname){
                crt_folder($Pname);
            }
            
            header("location:../Views/studio/route_studio.php?i=1");  
           
        }

        elseif($_POST['studio3']){

            foreach($barcodes as $barcode){
                $query = "insert into routes_product set barcode='$barcode', first_location='3', time_first_action='$datetime'";
                $result = $conn->query($query);
            }

            foreach($Pnames as $Pname){
                crt_folder($Pname);
            }
            
            header("location:../Views/studio/route_studio.php?i=1");  
           
        }

        elseif($_POST['studio4']){

            foreach($barcodes as $barcode){
                $query = "insert into routes_product set barcode='$barcode', first_location='4', time_first_action='$datetime'";
                $result = $conn->query($query);
            }
            
            foreach($Pnames as $Pname){
                crt_folder($Pname);
            }
            
            header("location:../Views/studio/route_studio.php?i=1");  
           
        }

            
    }
}