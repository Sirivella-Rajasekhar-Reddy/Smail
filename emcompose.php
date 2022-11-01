<?php
session_start();
$k=$_SESSION["user"];
$x="";
if(!empty($_POST["submitbtn"]) && $_POST["submitbtn"]=="Sent"){
if(!empty($_POST["rmail"]) && !empty($_POST["text1"])){
    require_once("emlogin.class.php");
    $obj=new Login();
    $x=$obj->sent($k,$_POST["rmail"],$_POST["text1"]);
}
}
if(!empty($_POST["submitbtn"]) && $_POST["submitbtn"]=="Save"){
    if(!empty($_POST["rmail"]) && !empty($_POST["text1"])){
        require_once("emlogin.class.php");
        $obj=new Login();
        $x=$obj->save($k,$_POST["rmail"],$_POST["text1"]);
    }
    }
if(!empty($_SESSION["user"])){
    require_once("emhead.php");
    require_once("emhome.php");
?>
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <h2 class="text-center">Compose Mail</h2>
        <form action="emcompose.php" method="post">
            <input class="form-control" type="email" name="rmail" placeholder="Enter Receiver Email" /><br/>
            <input class="form-control" type="text" name="text1" placeholder="Enter text" /><br/>
            <input type="submit" value="Sent" name="submitbtn",class="btn btn-outlinr-success" />
            <input type="submit" Value="Save" name="submitbtn",class="btn btn-outlinr-success" />
        </form>
        <?php
        if(!empty($x)){
            echo '<div class="alert alert-success">'.$x.'</div>';
        }
        ?>
    </div>
    <div class="col-sm-3"></div>
</div>
<?php
require_once("emfooter.php");
}
else{
    header("Location: emlogin.php");
}
?>
