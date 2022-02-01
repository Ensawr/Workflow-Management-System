<?php

function get_user_infos(){

    include '../../Controllers/connect_controllers/connection.php';

    $sql = "select * from users";
    $result= $conn->query($sql);

    $all_users = []; 

    foreach($result as $data=>$value){

        $username = $value['username'];
        $name = $value['name'];
        $password = $value['password'];
        $auth = $value['auth'];

        $temp_array = [];
        array_push($temp_array,$username,$name,$password,$auth);
        array_push($all_users , $temp_array);
        unset($temp_array);
    }
    return $all_users;
}

?>