<?php
/**
 * Created by IntelliJ IDEA.
 * User: wangchao
 * Date: 3/7/17
 * Time: 4:40 PM
 */


if ($_SERVER['REQUEST_METHOD'] == "GET") {


    echo file_get_contents(__DIR__."/view/upload.html");

}

if ($_SERVER['REQUEST_METHOD'] == "POST") {


    var_dump($_POST);
    var_dump($_FILES);



    if (isset($_FILES["custom_zip"])) {
        $path = $_FILES["custom_zip"]["tmp_name"];
        $zipPath =  __DIR__."/workspace/custom.zip";
        move_uploaded_file($path, $zipPath);

        $unzipPath = __DIR__."/workspace";
        $zip = new ZipArchive() ;
        if ($zip->open($zipPath) !== TRUE) {
            die ("Could not open custom archive");
        }
        $zip->extractTo($unzipPath);
        $zip->close();
    }
    if (isset($_FILES["scaffold_zip"])) {
        $path = $_FILES["scaffold_zip"]["tmp_name"];
        $zipPath =  __DIR__."/workspace/scaffold.zip";
        move_uploaded_file($path, $zipPath);

        $unzipPath = __DIR__."/workspace";
        $zip = new ZipArchive() ;
        if ($zip->open($zipPath) !== TRUE) {
            die ("Could not open scaffold archive");
        }
        $zip->extractTo($unzipPath);
        $zip->close();
    }

}