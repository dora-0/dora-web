<?php
$host = "azure-legacy.mandora.xyz";
$user = "dora-web";
$password = "GSGMFGWHOjrvQwZa";
$dbname = "dora-web";
$port = 39148;

$link = mysqli_connect($host, $user, $password, $dbname, $port);

if (!$link) {
    echo "Error: DB 서버에 접속하는 데 실패했습니다.";
}
unset($host, $user, $password, $dbname, $port);
?>