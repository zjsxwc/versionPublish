<?php
/**
 * Created by IntelliJ IDEA.
 * User: wangchao
 * Date: 3/7/17
 * Time: 4:41 PM
 */

ini_set('max_execution_time', '0');
ini_set('memory_limit','0');

require "config.php";

$time = time();


$backupPath = __DIR__ . "/backup/" . $time;
$workspacePath = __DIR__ . "/files";

mkdir($backupPath, 0755, true);

if (file_exists($workspacePath . "/custom.zip")) {

    $zipPath = $workspacePath . "/custom.zip";
    $unzipPath = $workspacePath;
    $zip = new ZipArchive();
    if ($zip->open($zipPath) !== TRUE) {
        die ("Could not open custom archive");
    }
    $oldDir = scandir($unzipPath);
    $zip->extractTo($unzipPath);
    $zip->close();
    $newDir = scandir($unzipPath);
    $addDir = "custom";
    foreach($newDir as $nd) {
        if ((!in_array($nd,$oldDir))&&(strpos($nd, 'custom') !== false)) {
            $addDir = $nd;
            break;
        }
    }

    rename($bbcPath . "/custom", $backupPath . "/custom");
    rename($workspacePath . "/".$addDir, $bbcPath . "/custom");

    echo $workspacePath . "/".$addDir."<br>";

    echo "custom Finished!<br>" . PHP_EOL;

}

sleep(2);

if (file_exists($workspacePath . "/scaffold.zip")) {

    $zipPath = $workspacePath . "/scaffold.zip";
    $unzipPath = $workspacePath;
    $zip = new ZipArchive();
    if ($zip->open($zipPath) !== TRUE) {
        die ("Could not open scaffold archive");
    }
    $oldDir = scandir($unzipPath);
    $zip->extractTo($unzipPath);
    $zip->close();
    $newDir = scandir($unzipPath);
    $addDir = "scaffold";
    foreach($newDir as $nd) {
        if ((!in_array($nd,$oldDir))&&(strpos($nd, 'scaffold') !== false)) {
            $addDir = $nd;
            break;
        }
    }


    rename($bbcPath . "/scaffold", $backupPath . "/scaffold");
    rename($workspacePath . "/".$addDir, $bbcPath . "/scaffold");

    echo $workspacePath . "/".$addDir."<br>";

    echo "scaffold Finished!<br>" . PHP_EOL;
}





