<?php

function zip_file($photoZip,$photoItemCode,$photoColorCode){

    $rootPath = realpath("$photoZip/$photoColorCode");

    $zip = new ZipArchive();
    $zip->open("$photoZip$photoItemCode-$photoColorCode.zip", ZipArchive::CREATE | ZipArchive::OVERWRITE);

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

function save_photos($photoItemCode,$photoColorCode){

    extract($_POST);
    $error=array();
    $extension=array("jpeg","JPEG","JPG","PNG","jpg","png");

    foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
        $file_name=$_FILES["files"]["name"][$key];
        $file_tmp=$_FILES["files"]["tmp_name"][$key];
        $ext=pathinfo($file_name,PATHINFO_EXTENSION);
        $randomName = uniqid('img_');
        $file_name= $randomName.".".$ext;
        $txtGalleryName = "../Static/photos/$photoItemCode/studio/$photoColorCode";
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



function zip_file_r($photoZip,$photoItemCode,$photoColorCode){

    $rootPath = realpath("$photoZip/$photoColorCode");

    $zip = new ZipArchive();
    $zip->open("$photoZip$photoItemCode-$photoColorCode-Retouched.zip", ZipArchive::CREATE | ZipArchive::OVERWRITE);

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

function save_photos_r($photoItemCode,$photoColorCode){

    extract($_POST);
    $error=array();
    $extension=array("jpeg","JPEG","JPG","PNG","jpg","png");

    foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
        $file_name=$_FILES["files"]["name"][$key];
        $file_tmp=$_FILES["files"]["tmp_name"][$key];
        $ext=pathinfo($file_name,PATHINFO_EXTENSION);
        $randomName = uniqid('img_');
        $file_name= $randomName.".".$ext;
        $txtGalleryName = "../Static/photos/$photoItemCode/ColorPhotos/$photoColorCode";
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


if(isset($_GET["send"])){
    if($_GET["send"]=="data"){

        $photoItemCode = $_POST['photoItemCode'];
        $photoColorCode = $_POST['photoColorCode'];
        $photoZip = $_POST['photoPath'];
        $barcode = $_POST['barcode'];
        $photoName = $_POST['deletePhoto'];

        if($_POST['deletePhoto']){
            
            unlink($photoName);
            zip_file($photoZip,$photoItemCode,$photoColorCode);
            
            header("location:../Views/studio/product_edit_2.php?data&barcode=$barcode"); 
        }

        elseif($_POST['add']){

            save_photos($photoItemCode,$photoColorCode);
            zip_file($photoZip,$photoItemCode,$photoColorCode);

            header("location:../Views/studio/product_edit_2.php?data&barcode=$barcode"); 
        }
       
    }

    if($_GET["send"]=="dataR"){

        $photoItemCode = $_POST['photoItemCode'];
        $photoColorCode = $_POST['photoColorCode'];
        $photoZip = $_POST['photoPath'];
        $barcode = $_POST['barcode'];
        $photoName = $_POST['deletePhoto'];

        if($_POST['deletePhoto']){

            unlink($photoName);
            zip_file_r($photoZip,$photoItemCode,$photoColorCode);

            header("location:../Views/retouch/retouch_edit_2.php?data&barcode=$barcode"); 
        }

        elseif($_POST['add']){

            save_photos_r($photoItemCode,$photoColorCode);
            zip_file_r($photoZip,$photoItemCode,$photoColorCode);

            header("location:../Views/retouch/retouch_edit_2.php?data&barcode=$barcode"); 
        }
       
    }

}


