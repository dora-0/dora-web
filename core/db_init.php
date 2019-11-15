<?php
session_start();
$host = "localhost";
$user = "dora-web";
$password = "GSGMFGWHOjrvQwZa";
$dbname = "dora-web";
$port = 3306;

$_SESSION['link'] = mysqli_connect($host, $user, $password, $dbname, $port);

if (!$_SESSION['link']) {
    echo "Error: DB 서버에 접속하는 데 실패했습니다.";
}
unset($host, $user, $password, $dbname, $port);
?>