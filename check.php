<html>
<head>
    <title>
    DOMINOS</title>
      <link rel="shortcut icon" href="thumb.png">
    
    
    
    </head>
    <form action="logout.php" method="post">
        
    <input type="submit" value="LOGOUT" >
         </form>
  


</html>
<?php
session_start();
error_reporting(E_ERROR | E_PARSE |E_WARNING);
include_once("db.php");
?>
<?php
if(isset($_POST['hell']))
{

    echo "<h2> THANKS </h2>".$_SESSION['userName']."<h2>FOR ORDERING YOU'LL GET UR PIZZA IN LESS THAN 30 MINUTES</h2> ";
    echo "<br/> ";
    echo "<h1>YOUR FINAL PRICE IS</h1> ".$_SESSION['fp'];
    session_destroy();
}
?>
<?php


?>