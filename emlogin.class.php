<?php
require_once("emdbcredentials.class.php");

class Login extends emdbcredentials{
    private $obj="";
    private $exception=0;
    public function __construct(){
        try{
            $this->obj=new mysqli($this->gethost(),$this->getuser(),$this->getpassword(),$this->getdbname());
        }
        catch(exception $e){
            $this->exception=1;
        }
    }
    public function checklogin($email,$pwd){
        $return_val=0;
        try{
            if($this->exception==0){    
            $obj=new mysqli("localhost","root","","emaildb");
            $qry=$obj->prepare("select email from emdb1 where email=? and pwd=?");
            $qry->bind_param("ss",$email,$pwd);
            if($qry->execute()){
                $qry->bind_result($emails);
                while($qry->fetch()){
                    $return_val=1;
                }
            }
        }
        }catch(exception $e){}
        return $return_val;
    }
    public function sent($k,$rmail,$text1){
        $succ="Your data has been sent.";
        $err="Please try again..!";
        try{
            if($this->exception==0){   
            $obj=new mysqli("localhost","root","","emaildb");
            $qry=$obj->prepare("insert into emdb2(smail,rmail,text1) values(?,?,?)");
            $qry->bind_param("sss",$k,$rmail,$text1);
            if($qry->execute()){
                return $succ;
            }
            else{
                return $err;
            }
        }
        }catch(exception $e){
            return $err;
        }
    }
    public function save($k,$rmail,$text1){
        $succ="Your data has been save.";
        $err="Please try again..!";
        try{
            if($this->exception==0){   
            $obj=new mysqli("localhost","root","","emaildb");
            $qry=$obj->prepare("insert into emdb3(smail,rmail,text1) values(?,?,?)");
            $qry->bind_param("sss",$k,$rmail,$text1);
            if($qry->execute()){
                return $succ;
            }
            else{
                return $err;
            }
        }
        }catch(exception $e){
            return $err;
        }
    }
    public function emsent($k){
        try{
            if($this->exception==0){   
            $obj=new mysqli("localhost","root","","emaildb");
            $qry=$obj->prepare("SELECT*FROM emdb2 where smail=\"$k\" ");
            if($qry->execute()){
                $qry->bind_result($smail,$rmail,$text1);
                echo "<br/><br/>";
                echo "<table border='2'><tr><th>To<th>Data</th></tr>";
                while($qry->fetch()){
                    echo "<tr><td>".$rmail."</td><td>".$text1."</td></tr>";
                }
                echo "</table>";
            }
            else{
                echo "please try again after some time";
            }
        }
        }catch(exception $e){}
    }
    public function emdraft($k){
        try{
            if($this->exception==0){   
            $obj=new mysqli("localhost","root","","emaildb");
            $qry=$obj->prepare("SELECT*FROM emdb3 where smail=\"$k\" ");
            if($qry->execute()){
                $qry->bind_result($smail,$rmail,$text1);
                echo "<br/><br/>";
                echo "<table border='2'><tr><th>To<th>Data</th></tr>";
                while($qry->fetch()){
                    echo "<tr><td>".$rmail."</td><td>".$text1."</td></tr>";
                }
                echo "</table>";
            }
            else{
                echo "please try again after some time";
            }
        }
        }catch(exception $e){}
    }
    public function eminbox($k){
        try{
            if($this->exception==0){   
            $obj=new mysqli("localhost","root","","emaildb");
            $qry=$obj->prepare("SELECT*FROM emdb2 where rmail=\"$k\" ");
            if($qry->execute()){
                $qry->bind_result($smail,$rmail,$text1);
                echo "<br/><br/>";
                echo "<table border='2'><tr><th>To<th>Data</th></tr>";
                while($qry->fetch()){
                    echo "<tr><td>".$smail."</td><td>".$text1."</td></tr>";
                }
                echo "</table>";
            }
            else{
                echo "please try again after some time";
            }
        }
        }catch(exception $e){}
    }
}
?>