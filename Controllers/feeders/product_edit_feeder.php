<?php

function get_edit_data(){

    include '../../Controllers/connect_controllers/connection.php';

    $sql = "select * from routes_product";
    $result= $conn->query($sql);

    $all_products = [];
    $return_data = [];

    foreach($result as $data=>$value){

        $barcode = $value['barcode'];
        $firstLoc = $value['first_location'];
        $secondLoc = $value['second_location'];
        $retouch = $value['retouch'];

        $temp_array = [];
        array_push($temp_array,$barcode,$firstLoc,$secondLoc,$retouch);
        array_push($all_products , $temp_array);
        unset($temp_array);
    }


    foreach($all_products as $product){
        if($product[1]>0 || $product[2]>0 || $product[3]=="true"){
            $datasql = "select * from products where barcode='".$product[0]."'";
            $results = $conn->query($datasql);

            foreach($results as $data=>$value){
                $itemCode = $value['itemCode'];
                $color = $value['color'];
                $colorCode = $value['colorCode'];
                $barcode = $value['barcode'];

                $temp_array = [];
                array_push($temp_array,$itemCode,$color,$colorCode,$barcode);
                array_push($return_data , $temp_array);
                unset($temp_array);
            }
        }
    }

    return $return_data;

}
