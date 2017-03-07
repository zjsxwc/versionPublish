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
