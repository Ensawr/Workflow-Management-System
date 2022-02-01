<?php

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['nebim_products'])){

    nebim_products();
}

function nebim_products(){

        include '../Controllers/connect_controllers/connection.php';
        $lastDate;
        $fgconnect = file_get_contents('http://<--IPMustBeHere-->/integratorservice/Connect');
        $session = json_decode($fgconnect,true);
            $sessionID = $session['SessionID']; 

        $fgc = file_get_contents("http://<--IPMustBeHere-->/(S($sessionID))/integratorservice/RunProc?{'ProcName':'<--ProcNameMustBeHere-->'}");
        $json = json_decode($fgc,true);

        foreach($json as $key =>$value){
            $barcode = $value['UsedBarcode'];
            $itemCode = $value['ItemCode'];
            $color = $value['ColorDescription'];
            $colorCode = $value['ColorCode'];

            $isNull = "select barcode from products where barcode='$barcode'";
            $qry = mysqli_num_rows(mysqli_query($conn,$isNull));

            if($qry>0){
                continue;
            }
            else{
                $sql = "insert into products set barcode='$barcode', itemCode='$itemCode' , color='$color', colorCode='$colorCode'";
                $result= $conn->query($sql);
            }
        }
        header("location:../Views/storage/update_nebim.php?i=1");   
}

// Sending data to studio table from nebim 

function get_studio_datas(){

    include '../../Controllers/connect_controllers/connection.php';

    $sql = "select * from products";
    $result= $conn->query($sql);

    $all_products = []; 

    foreach($result as $data=>$value){

        $itemCode = $value['itemCode'];
        $color = $value['color'];
        $colorCode = $value['colorCode'];
        $barcode = $value['barcode'];

        $temp_array = [];
        array_push($temp_array,$itemCode,$color,$colorCode,$barcode);
        array_push($all_products , $temp_array);
        unset($temp_array);
    }
    
    return $all_products;
}

?>