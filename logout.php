<?php
session_start();
session_unset();
$redirect_url = "/";
if (isset($_GET["redirect_url"])) {
    $redirect_url = $_GET["redirect_url"];
}
header('Location: '.$redirect_url);
?>