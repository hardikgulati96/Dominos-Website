<?php
if(isset($_POST['checkout']))
{
echo "<script>alert( $_SESSION['fp']);</script>";
$sqqll="INSERT INTO `order`(`username`, `oid`, `ccode`) VALUES ('$username','$oid','$coupon') ";
 $qury = mysql_query($sqqll);
if(!$qury)
        {
                  echo "Failed ".mysql_error();
         
        }
header("Location: Frontpage.php");

}
?>
