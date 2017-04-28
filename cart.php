<html>
<head>
     <link rel="shortcut icon" href="thumb.png">
    </head>
</html>
<?php 
 
  include_once("db.php"); 
  session_start();
if(empty($_SESSION['ood']))
$_SESSION['ood']=rand(100,999);
$_SESSION['try']=0;
 
?>
<?php
//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
if(!isset($_POST['checkout']))
{
if(isset($_POST['submit1']))
{
$pid=151;
}
else if(isset($_POST['submit2']))
{
$pid=152;
}
else if(isset($_POST['submit3']))
{
$pid=153;
}
else if(isset($_POST['submit4']))
{
$pid=154;
}
else if(isset($_POST['submit5']))
{
$pid=155;
}
else if(isset($_POST['submit6']))
{
$pid=156;
}
else if(isset($_POST['submit7']))
{
$pid=157;
}
else if(isset($_POST['submit8']))
{
$pid=158;
}
else if(isset($_POST['submit9']))
{
$pid=159;
}
else if(isset($_POST['submit10']))
{
$pid=160;
}
else if(isset($_POST['submit11']))
{
$pid=161;
}
else if(isset($_POST['submit12']))
{
$pid=162;
}
else if(isset($_POST['submit13']))
{
$pid=163;
}
else if(isset($_POST['submit14']))
{
$pid=164;
}
else if(isset($_POST['submit15']))
{
$pid=165;
}



 $username=$_SESSION['userName'];
echo $username;

$radio=$_POST['check'];
$crust=mysql_query("select price from crust where base='$radio' ");
$roat=mysql_fetch_array($crust,MYSQL_NUM);
 $crust=$roat[0];
$sum_price=0;
$tarr="";
if(isset($_POST['hardik']))
{
$count=count($_POST['hardik']);

$sum_price=0;

for($i=0;$i<$count;$i++)
{
 $topping[$i]=$_POST['hardik'][$i];
$var=$topping[$i];
    $tname=mysql_query("SELECT tname FROM topping where tid='$var'");
    $rol=mysql_fetch_array($tname,MYSQL_NUM);
    $tname=$rol[0];
$tarr=$tarr.','.$tname;
$var=mysql_query("SELECT price FROM topping where tid='$var'");
$roam=mysql_fetch_array($var,MYSQL_NUM);
$var=$roam[0];
$sum_price+=$var;
}
if($tarr!="")
echo'the value is'.$tarr.'only';

}
 $quantity=$_POST['quantity'];

 $size=$_POST['size'];

if($pid==151)
$type="simply veg";
else if($pid>151 && $pid<=155)
$type="veg treat";
else if($pid>155 && $pid<=160)
$type="veg special";
else if($pid>160 && $pid<=163)
$type="feast pizza";
else
$type="exotic italian veg";



$p_type=mysql_query("SELECT type FROM pizza where pid='$pid'");
$roat=mysql_fetch_array($p_type,MYSQL_NUM);
 $p_type=$roat[0];
 $oid=$_SESSION['ood'];

 if($size=="small")
$pprice=mysql_query("SELECT s FROM size where type='$p_type'");
else if($size=="medium")
$pprice=mysql_query("SELECT m FROM size where type='$p_type'");
else
$pprice=mysql_query("SELECT l FROM size where type='$p_type'");
$roam=mysql_fetch_array($pprice,MYSQL_NUM);
$pprice=$roam[0];
echo $final_price=($crust+$pprice+$sum_price)*$quantity;
if(empty($_SESSION['fp']))
{
$_SESSION['fp']=$final_price;
}
else
$_SESSION['fp']+=$final_price;

echo'final price'.$_SESSION['fp'];
$coupon="";
//echo $pid;
    
    $swl="INSERT INTO `build_order`(`oid`, `pid`, `type`, `tname`, `quantity`, `size`, `subamount`) VALUES ('$oid','$pid','$type','$tarr','$quantity','$size','$final_price')";
     $qury = mysql_query($swl);
         if(!$qury)
        {
                 // echo "Failed ".mysql_error();
         
        }

}
?>
<form action="home.php" method="post">
BACK:
<input type="submit" value="BACK">
</form>
<br/>
FINAL CHECKOUT:
<form action ="cart.php" method=post>
<input type="submit" value="CHECKOUT" name="checkout">


</form>


<?php
error_reporting(E_ERROR | E_PARSE |E_WARNING);
if(isset($_POST['checkout']))
{
echo '<script>alert( "lol");</script>';
    $username=$_SESSION['userName'];
    $oid=$_SESSION['ood'];
    $coupon="";
$sqqll="INSERT INTO `order`(`username`, `oid`, `ccode`) VALUES ('$username','$oid','$coupon') ";
    if($_SESSION['try']==0)
    {
        $sqqll="INSERT INTO `order`(`username`, `oid`, `ccode`) VALUES ('$username','$oid','$coupon') ";
 $qury = mysql_query($sqqll);
if(!$qury)
        {
               //   echo "Failed ".mysql_error();
         
        }
        $_SESSION['try']=1;
    }

    $sqr=mysql_query("SELECT * FROM build_order WHERE oid='$oid'");
   for($i=0; $roat[$i]=mysql_fetch_array($sqr,MYSQL_NUM); $i++);
    $c = mysql_num_rows($sqr);
   $ppid= $roat[0];
    for($i=0;$i<$c;$i++){
    foreach($roat[$i] as $element)
    {
        echo $element.'<br>';
    }
    }
    
    

}
?>
