<?php

function get_product_data($userAuth){

    include '../../Controllers/connect_controllers/connection.php';

    $sql = "select * from routes_product where length(first_location)>0 or length(second_location)>0";
    $results = $conn->query($sql);

    $data1x1 = [];
    $data1x2 = [];
    $data1x3 = [];
    $data1x4 = [];

    $data2x1 = [];
    $data2x2 = [];
    $data2x3 = [];
    $data2x4 = [];

    foreach($results as $result){

        $findBarcode = $result['barcode'];
        $findLocation = $result['second_location'];
        $query = "select * from products where barcode='$findBarcode'";
        $newResults = $conn->query($query);
        

        foreach($newResults as $data){

            $tempArr = [];

            $id = $result['id'];
            $barcode = $data['barcode'];
            $itemCode = $data['itemCode'];
            $color = $data['color'];
            $colorCode = $data['colorCode'];
            $location = $findLocation;
    
            array_push($tempArr,$id,$barcode,$itemCode,$color,$colorCode,$location);

            if($result['first_location']=="1"){
                array_push($data1x1, $tempArr);
                unset($tempArr);
            }
            else if($result['first_location']=="2"){
                array_push($data1x2, $tempArr);
                unset($tempArr);
            }
            else if($result['first_location']=="3"){
                array_push($data1x3, $tempArr);
                unset($tempArr);
            }
            else if($result['first_location']=="4"){
                array_push($data1x4, $tempArr);
                unset($tempArr);
            }
            else if($result['second_location']=="1"){
                array_push($data2x1, $tempArr);
                unset($tempArr);
            }
            else if($result['second_location']=="2"){
                array_push($data2x2, $tempArr);
                unset($tempArr);
            }
            else if($result['second_location']=="3"){
                array_push($data2x3, $tempArr);
                unset($tempArr);
            }
            else if($result['second_location']=="4"){
                array_push($data2x4, $tempArr);
                unset($tempArr);
            }

 
        }
    }

    $datastd1 = array_merge($data1x1,$data2x1);
    $datastd2 = array_merge($data1x2,$data2x2);
    $datastd3 = array_merge($data1x3,$data2x3);
    $datastd4 = array_merge($data1x4,$data2x4);
    $dataAdmin = array_merge($data1x1,$data2x1,$data1x2,$data2x2,$data1x3,$data2x3,$data1x4,$data2x4);

    if($userAuth=="studio1"){
        return $datastd1;
    }
    else if($userAuth=="studio2"){
        return $datastd2;
    }
    else if($userAuth=="studio3"){
        return $datastd3;
    }
    else if($userAuth=="studio4"){
        return $datastd4;
    }
    else if($userAuth=="admin"){
        return $dataAdmin;
    }

}
