<?php
include "connect_controllers/connection.php";

if(isset($_GET["data"])){
	if($_GET["data"]=="route_first_step"){

        $barcodeIDs =$_POST['hiddenID'];
        $datetime =$_POST['datetime'];

        if($_POST['studio1']){
            
            foreach($barcodeIDs as $id){
                $query = "update routes_product set first_location='1' where id='$id'";
                $result = $conn->query($query);
            }
            header("location:../Views/studio/route_edit.php?i=1");  
           
        }

        elseif($_POST['studio2']){

            foreach($barcodeIDs as $id){
                $query = "update routes_product set first_location='2' where id='$id'";
                $result = $conn->query($query);
            }
            header("location:../Views/studio/route_edit.php?i=1");  
           
        }

        elseif($_POST['studio3']){

            foreach($barcodeIDs as $id){
                $query = "update routes_product set first_location='3' where id='$id'";
                $result = $conn->query($query);
            }
            header("location:../Views/studio/route_edit.php?i=1");  
           
        }

        elseif($_POST['studio4']){

            foreach($barcodeIDs as $id){
                $query = "update routes_product set first_location='4' where id='$id'";
                $result = $conn->query($query);
            }
            header("location:../Views/studio/route_edit.php?i=1");  
           
        }

            
    }

    if($_GET["data"]=="route_second_step"){

        $barcodeIDs =$_POST['hiddenID'];
        $datetime =$_POST['datetime'];

        if($_POST['studio1']){
            
            foreach($barcodeIDs as $id){
                $query = "update routes_product set first_location='', second_location='1' where id='$id'";
                $result = $conn->query($query);
            }
            header("location:../Views/studio/route_edit_2.php?i=1");  
           
        }

        elseif($_POST['studio2']){

            foreach($barcodeIDs as $id){
                $query = "update routes_product set first_location='', second_location='2' where id='$id'";
                $result = $conn->query($query);
            }
            header("location:../Views/studio/route_edit_2.php?i=1");  
           
        }

        elseif($_POST['studio3']){

            foreach($barcodeIDs as $id){
                $query = "update routes_product set first_location='', second_location='3' where id='$id'";
                $result = $conn->query($query);
            }
            header("location:../Views/studio/route_edit_2.php?i=1");  
           
        }

        elseif($_POST['studio4']){

            foreach($barcodeIDs as $id){
                $query = "update routes_product set first_location='', second_location='4' where id='$id'";
                $result = $conn->query($query);
            }
            header("location:../Views/studio/route_edit_2.php?i=1");  
           
        }

            
    }
}