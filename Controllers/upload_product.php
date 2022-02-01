<?php
include "connect_controllers/connection.php";
require "../Controllers/feeders/get_datetime.php";

$datetime = get_datetime();

// Save photos and create folders

function save_photos($p_code,$p_colorcode,$p_id){

    extract($_POST);
    $error=array();
    $extension=array("jpeg","JPEG","JPG","PNG","jpg","png");

    foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
        $file_name=$_FILES["files"]["name"][$key];
        $file_tmp=$_FILES["files"]["tmp_name"][$key];
        $ext=pathinfo($file_name,PATHINFO_EXTENSION);
        $randomName = uniqid('img_');
        $file_name= $randomName.".".$ext;
        $txtGalleryName = "../Static/photos/$p_code/studio/$p_colorcode";
        if(in_array($ext,$extension)) {
            if(!file_exists($txtGalleryName."/".$file_name)) {
                move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],$txtGalleryName."/".$file_name);
            }
            else {
                move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],$txtGalleryName."/".$file_name);
            }
        }
        else {
            array_push($error,"$file_name, ");
        }
    }
}

function crt_folder($p_code,$p_colorcode,$p_id){

    $date = get_date();

    $stdName = "../Static/photos/$p_code/studio/$p_colorcode";
    $cpName = "../Static/photos/$p_code/ColorPhotos/$p_colorcode";

    if(file_exists($stdName)){
        rename($stdName,$stdName."_".$date);
        mkdir("../Static/photos/$p_code/studio/$p_colorcode");
        save_photos($p_code,$p_colorcode,$p_id);
    }
    else{
        mkdir("../Static/photos/$p_code/studio/$p_colorcode");
        save_photos($p_code,$p_colorcode,$p_id);
    }

    if(file_exists($cpName)){
        rename($cpName,$cpName."_".$date);
        mkdir("../Static/photos/$p_code/ColorPhotos/$p_colorcode");
        save_photos($p_code,$p_colorcode,$p_id);
    }
    else{
        mkdir("../Static/photos/$p_code/ColorPhotos/$p_colorcode");
        save_photos($p_code,$p_colorcode,$p_id);
    }
}

function zip_file($p_code,$p_colorcode){

    $rootPath = realpath("../Static/photos/$p_code/studio/$p_colorcode");

    $zip = new ZipArchive();
    $zip->open("../Static/photos/$p_code/studio/$p_code-$p_colorcode.zip", ZipArchive::CREATE | ZipArchive::OVERWRITE);

    /** @var SplFileInfo[] $files */
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($rootPath),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($files as $name => $file)
    {
        if (!$file->isDir())
        {
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($rootPath) + 1);

            $zip->addFile($filePath, $relativePath);
        }
    }

    $zip->close();

}

// Data route

if(isset($_GET["send"])){
	if($_GET["send"]=="data"){

        $currentID = $_POST['hiddenID'][0];  
        $currentPC = $_POST['product_code'];
        $currentPCC = $_POST['product_color_code'];
        
            
        if($_POST['studio1']){

            $query = "update routes_product set first_location='', second_location='1', time_first_studio='$datetime' where id='$currentID'";
            $result = $conn->query($query);

            crt_folder($currentPC,$currentPCC,$currentID);

            header("location:../Views/studio/product_upload.php"); 
        }

        elseif($_POST['studio2']){

            $query = "update routes_product set first_location='', second_location='2', time_first_studio='$datetime' where id='$currentID'";
            $result = $conn->query($query);

            crt_folder($currentPC,$currentPCC,$currentID);

            header("location:../Views/studio/product_upload.php"); 
    
        }

        elseif($_POST['studio3']){

            $query = "update routes_product set first_location='', second_location='3', time_first_studio='$datetime' where id='$currentID'";
            $result = $conn->query($query);

            crt_folder($currentPC,$currentPCC,$currentID);

        header("location:../Views/studio/product_upload.php"); 
    
        }

        elseif($_POST['studio4']){

            $query = "update routes_product set first_location='', second_location='4', time_first_studio='$datetime' where id='$currentID'";
            $result = $conn->query($query);

            crt_folder($currentPC,$currentPCC,$currentID);

        header("location:../Views/studio/product_upload.php"); 
    
        }

        elseif($_POST['retouch']){

            $query = "update routes_product set second_location='', retouch='true', time_second_studio='$datetime' where id='$currentID'";
            $result = $conn->query($query);

            save_photos($currentPC,$currentPCC,$currentID);
            zip_file($currentPC,$currentPCC);

            header("location:../Views/studio/product_upload.php"); 
        }
    }
}

