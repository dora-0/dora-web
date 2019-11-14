<?php
$host = "azure.mandora.xyz";
$user = "dora-web";
$password = "GSGMFGWHOjrvQwZa";
$dbname = "dora-web";
$port = 33060;

$link = mysqli_connect($host, $user, $password, $dbname, $port);
unset($host, $user, $password, $dbname, $port);
?>