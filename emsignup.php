<?php
$succ="";
$err="";
if(!empty($_POST["email"]) && !empty($_POST["pwd"])){
    try{
        $obj=new mysqli("localhost","root","","emaildb");
        $qry=$obj->prepare("insert into emdb1(fullname,email,pwd,confpwd) values(?,?,?,?)");
        $qry->bind_param("ssss",$_POST["fullname"],$_POST["email"],$_POST["pwd"],$_POST["confpwd"]);
        if($qry->execute()){
            $succ="Your Account Has Been Created.<a href='emlogin.php' class='btn btn-primary'>Login</a>";
        }
        else{
            $err="Please try again";
        }
    }
    catch(exception $e){
        $err="Please try again..!";
    }
}
require_once("emhead.php");
?>
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <form action="emsignup.php" method="post">
            <input class="form-control" type="text" name="fullname" placeholder="Enter FullName" /><br/>
            <input class="form-control" type="email" name="email" placeholder="Enter Email" /><br/>
            <input class="form-control" type="password" name="pwd" placeholder="Enter Password" /><br/>
            <input class="form-control" type="password" name="confpwd" placeholder="Enter Confirm Password" /><br/>
            <input type="submit" value="Register",class="btn btn-outlinr-success" />
        </form>
        <?php
        if(!empty($err)){
            echo '<div class="alert alert-danger">'.$err.'</div>';
        }
        if(!empty($succ)){
            echo '<div class="alert alert-success">'.$succ.'</div>';
        }
        ?>
    </div>
    <div class="col-sm-3"></div>
</div>
<?php
require_once("emfooter.php");
?>