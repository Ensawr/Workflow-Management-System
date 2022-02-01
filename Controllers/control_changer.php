<?php

function zip_file_r($photoZipPath,$itemcode,$colorcode){

    $rootPath = realpath("$photoZipPath/$colorcode");

    $zip = new ZipArchive();
    $zip->open("$photoZipPath$itemcode-$colorcode-Retouched.zip", ZipArchive::CREATE | ZipArchive::OVERWRITE);

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

if(isset($_GET["send"])){
	if($_GET["send"]=="data"){

        $itemcode = $_POST['itemcode'];
        $colorcode = $_POST['colorcode'];
        $numbers = $_POST['numbers'];

        $photopath = "../Static/photos/$itemcode/ColorPhotos/$colorcode";
        $photoZipPath = "../Static/photos/$itemcode/ColorPhotos/";
        $temppath = "../Static/temp_photos";

        $photos = scandir($photopath);
        array_shift($photos);
        array_shift($photos);

        for($i=0; $i<count($photos); $i++){
            
            $newName = substr_replace($photos[$i],$numbers[$i],-5,1); 
            rename($photopath."/".$photos[$i], $temppath."/".$newName);

        }

        $tempPhotos = scandir($temppath);
        array_shift($tempPhotos);
        array_shift($tempPhotos);

        for($i=0; $i<count($tempPhotos); $i++){
            
            rename($temppath."/".$tempPhotos[$i], $photopath."/".$tempPhotos[$i]);

        }

        zip_file_r($photoZipPath,$itemcode,$colorcode);

    }
    header("location:../Views/product/completed_products.php");
}
