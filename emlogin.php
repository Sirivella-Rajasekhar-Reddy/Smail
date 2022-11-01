<?php
session_start();
$err="";
if(!empty($_POST["email"]) && !empty($_POST["pwd"])){
    require_once("emlogin.class.php");
    $obj=new Login();
    $res=$obj->checklogin($_POST["email"],$_POST["pwd"]);
    if($res==1){
        $_SESSION["user"]=$_POST["email"];
        header("Location: emhome.php");
    }
    else{
        $err="Invalid Credentials";
    }
}
require_once("emhead.php");
?>
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <form action="emlogin.php" method="post">
            <input class="form-control" type="email" name="email" placeholder="Enter Email" /><br/>
            <input class="form-control" type="password" name="pwd" placeholder="Enter Password" /><br/>
            <input type="submit" value="Login",class="btn btn-outlinr-success" />
        </form>
        <?php
        if(!empty($err)){
            echo '<div class="alert alert-danger">'.$err.'</div>';
        }
        ?>
    </div>
    <div class="col-sm-3"></div>
</div>
<?php
require_once("emfooter.php");
?>