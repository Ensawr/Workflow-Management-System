<?php
include "connect_controllers/connection.php";
require "../Controllers/feeders/get_datetime.php";

$datetime = get_datetime();

function zip_file($p_code,$p_colorcode){

    $rootPath = realpath("../Static/photos/$p_code/ColorPhotos/$p_colorcode");

    $zip = new ZipArchive();
    $zip->open("../Static/photos/$p_code/ColorPhotos/$p_code-$p_colorcode-Retouched.zip", ZipArchive::CREATE | ZipArchive::OVERWRITE);

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
        $txtGalleryName = "../Static/photos/$p_code/ColorPhotos/$p_colorcode";
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

    zip_file($p_code,$p_colorcode);
}



// Data route

if(isset($_GET["send"])){
	if($_GET["send"]=="data"){

        $currentID = $_POST['hiddenID'][0];  
        $currentPC = $_POST['product_code'];
        $currentPCC = $_POST['product_color_code'];
        
            
        if($_POST['retouch']){

            $query = "update routes_product set retouch='false', control='true', time_retouch='$datetime' where id='$currentID'";
            $result = $conn->query($query);

            save_photos($currentPC,$currentPCC,$currentID);

            header("location:../Views/retouch/retouch_upload.php"); 
        }
    }
}