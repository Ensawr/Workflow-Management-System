<?php

function get_distribution(){

    include '../../Controllers/connect_controllers/connection.php';

    $sql = "select first_location, second_location from routes_product";
    $results = $conn->query($sql);

    $count1 = 0;
    $count2 = 0;
    $count3 = 0;
    $count4 = 0;

    foreach($results as $result){
        $first = $result['first_location'];
        $second = $result['second_location'];
        
        if($first=="1" || $second=="1"){
            $count1++;
        }
        if($first=="2" || $second=="2"){
            $count2++;
        }
        if($first=="3" || $second=="3"){
            $count3++;
        }
        if($first=="4" || $second=="4"){
            $count4++;
        }
    }

    $datas = [];
    if($count1=="0"){
        $count1 = 1;
    }
    if($count2=="0"){
        $count2 = 1;
    }
    if($count3=="0"){
        $count3 = 1;
    }
    if($count4=="0"){
        $count4 = 1;
    }
    array_push($datas, $count1, $count2, $count3, $count4);

    return $datas;
}

?>