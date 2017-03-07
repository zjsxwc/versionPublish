<?php
/**
 * Created by IntelliJ IDEA.
 * User: wangchao
 * Date: 3/7/17
 * Time: 5:05 PM
 */

function deleteAll($path) {
    $op = dir($path);
    while(false != ($item = $op->read())) {
        if($item == '.' || $item == '..') {
            continue;
        }
        if(is_dir($op->path.'/'.$item)) {
            deleteAll($op->path.'/'.$item);
            rmdir($op->path.'/'.$item);
        } else {
            unlink($op->path.'/'.$item);
        }

    }
}
$path = __DIR__."/files";
deleteAll($path);

$path = __DIR__."/files/tmp";
mkdir($path,0755,true);


