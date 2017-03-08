<?php
/**
 * Created by IntelliJ IDEA.
 * User: wangchao
 * Date: 3/7/17
 * Time: 4:41 PM
 */
ini_set('max_execution_time', '0');
ini_set('memory_limit','80m');

include_once __DIR__.'/vender/ShellExecuter.php';



require "config.php";

$cmd = "/bin/sh ".$bbcPath."/scaffold/run_upgrade.sh";

$se = new ShellExecuter($cmd, 60);
$result = "";
try{
    $result = $se->execute();
} catch (\Exception $e) {
    var_dump($e->getMessage());
}
$se = null;

echo "<pre>".$result."</pre>";

$cmd = "/bin/sh ".$bbcPath."/scaffold/run_update_app.sh";
$se = new ShellExecuter($cmd, 60);
$result = "";
try{
    $result = $se->execute();
} catch (\Exception $e) {
    var_dump($e->getMessage());
}
$se = null;

echo "<pre>".$result."</pre>";