<?php
include_once("db.php");
echo"into the process"; 

session_start();

 $username=$_SESSION['userName'];
echo $username;
$pizza=$_POST['pizza'];
$topping=$_POST['topping'];
$qty=$_POST['qty'];
$coupon=$_POST['coupon'];
$a=mysql_query("SELECT pid from pizza where pname='$pizza'");

if(empty($a) )
echo'entry is empty1';
$roam=mysql_fetch_array($a,MYSQL_NUM);
$a=$roam[0];
echo $a;


$b=mysql_query("SELECT tid from topping where tname='$topping'");
if(empty($b) )
echo'entry is empty 2';
$roat=mysql_fetch_array($b,MYSQL_NUM);
$b=$roat[0];
echo $b;
$pprice=mysql_query("SELECT price FROM pizza where pname='$pizza'");
$roat=mysql_fetch_array($pprice,MYSQL_NUM);
$pprice=$roat[0];
$tprice=mysql_query("SELECT price FROM topping where tname='$topping'");
$roat=mysql_fetch_array($tprice,MYSQL_NUM);
$tprice=$roat[0];
$price=$tprice+$pprice;

$i=mysql_query("SELECT count(*) FROM `order` WHERE 1");
$roam=mysql_fetch_array($i,MYSQL_NUM);
$oid=$roam[0]+1;
    $sqqll="INSERT INTO `order`(`username`, `oid`, `ccode`) VALUES ('$username','$oid','$coupon') ";
$sqqlr="INSERT into order_build values('$oid','$a','$b','$qty','$price') ";
$sqqlw="INSERT into discount values('$coupon','$oid')"; 








 $qury = (mysql_query($sqqll) && mysql_query($sqqlr) && mysql_query($sqqlw));
 
    
 
        if(!$qury)
        {
                  echo "Failed ".mysql_error();
         
        }
        else
        {
                  echo "Successful";
                  $result=mysql_query("SELECT price FROM order_build ");
$id=mysql_fetch_array($result,MYSQL_NUM);
$result=$id[0];
                  echo $result;
   
        }


?>