<?php
require_once 'dbConfig.php';
define("VERSION","5.3.5 - 6.0.0-alpha-1");

if(empty($page)) {
    $page = "";
}

// folders with CSS, JS, ...
switch($page){
    case ("home"):
        $stylesheet = ".lib/";
        break;
    default:
        $stylesheet = "../.lib/";
        break;
}
