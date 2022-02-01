<?php

function get_retouch_data(){

    include '../../Controllers/connect_controllers/connection.php';

    $sql = "select * from routes_product where retouch='true'";
    $results = $conn->query($sql);

    $barcodes = [];
    $products = [];

    foreach($results as $result=>$data){

        $temp_arr = [];
        $secretID = $data['id'];
        $productBarcode = $data['barcode'];
        array_push($temp_arr, $secretID, $productBarcode);
        array_push($barcodes, $temp_arr);
        unset($temp_arr);

    }

    foreach($barcodes as $barcode){

        $query = "select * from products where barcode='".$barcode[1]."'";
        $datas = $conn->query($query);

        foreach($datas as $data=>$result){

            $temp_arr = [];

            $productID = $barcode[0];
            $productBarcode = $result['barcode'];
            $productItemCode = $result['itemCode'];
            $productColor = $result['color'];
            $productColorCode = $result['colorCode'];

            array_push($temp_arr,$productID, $productBarcode,$productItemCode,$productColor,$productColorCode);
            array_push($products, $temp_arr);
            unset($temp_arr);

        }

    }
    return $products;
}
