<?php
session_start();
if(!empty($_SESSION["user"])){
    require_once("emhead.php");
    require_once("emhome.php");
    $k=$_SESSION["user"];
    require_once("emlogin.class.php");
    $obj=new Login();
    $obj->emdraft($k);
    require_once("emfooter.php");
}
else{
    header("Location: emlogin.php");
}
?>