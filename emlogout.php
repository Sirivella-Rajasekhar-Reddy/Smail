<?php
session_start();
if(!empty($_SESSION["user"])){
    unset($_SESSION["user"]);
}
header("Location: emlogin.php");
?>