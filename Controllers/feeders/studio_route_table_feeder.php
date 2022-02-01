<?php 

// First studio data

function get_first_step_data(){

    include '../../Controllers/connect_controllers/connection.php';

    $sql = "select id, barcode, first_location, second_location from routes_product";
    $results= $conn->query($sql);

    $first_datas = []; 

    foreach($results as $data=>$value){

        if(strlen($value['first_location'])=="1" && strlen($value['second_location'])=="0"){

            $barcode = $value['barcode'];
            $firstLoc = $value['first_location'];
            $id = $value['id'];
            
            $temp_array = [];
            array_push($temp_array,$barcode,$firstLoc,$id);
            array_push($first_datas , $temp_array);
            unset($temp_array);
        }
    }

    return $first_datas;
}

function get_first_studio_data(){

    include '../../Controllers/connect_controllers/connection.php';

    $first_datas = get_first_step_data();
    $firstArr = [];

    foreach($first_datas as $data1){

        $barcode = $data1[0];
        $studio = $data1[1];
        $id = $data1[2];
        $studio1 = studio_name_fixer($studio);

        $sql = "select * from products where barcode='$barcode'";
        $result = $conn->query($sql);
        $resultstring = $result->fetch_row();
        array_push($resultstring, $studio1, $id);
        array_push($firstArr, $resultstring);
        unset($resultstring);

    }
    return $firstArr;
}

// Second studio data

function get_second_step_data(){

    include '../../Controllers/connect_controllers/connection.php';

    $sql = "select id, barcode, second_location from routes_product";
    $results= $conn->query($sql);

    $second_datas = []; 

    foreach($results as $data=>$value){

        if(strlen($value['second_location'])=="1"){

            $barcode = $value['barcode'];
            $secondLoc = $value['second_location'];
            $id = $value['id'];
            
            $temp_array2 = [];
            array_push($temp_array2,$barcode,$secondLoc,$id);
            array_push($second_datas , $temp_array2);
            unset($temp_array2);

        }
    }

    return $second_datas;
}

function get_second_studio_data(){

    include '../../Controllers/connect_controllers/connection.php';

    $second_datas = get_second_step_data();
    $secondArr = [];

    foreach($second_datas as $data2){
        $barcode = $data2[0];
        $studio = $data2[1];
        $id = $data2[2];

        $studio2 = studio_name_fixer($studio);

        $sql = "select * from products where barcode='$barcode'";
        $result = $conn->query($sql);
        $resultstring = $result->fetch_row();
        array_push($resultstring, $studio2, $id);
        array_push($secondArr, $resultstring);
        unset($resultstring);
    }
    return $secondArr;
}


function studio_name_fixer($studio){
    if($studio=="1"){
        return "Studio 1";
    }
    elseif($studio=="2"){
        return "Studio 2";
    }
    elseif($studio=="3"){
        return "Studio 3";
    }
    elseif($studio=="4"){
        return "Studio 4";
    }
}