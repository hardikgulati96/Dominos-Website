<?php include_once("db.php"); ?>
 
<?php
           $user = $_POST['n'];
           $pass = $_POST['p'];
           $name=  $_POST['name'];
            $phone = $_POST['phone'];
		 $hno = $_POST['hno'];
		 $sno = $_POST['sno'];
		 $city = $_POST['city'];
		 $pin = $_POST['pin'];

    
          $sql = "INSERT into loginmaster values('$user','$pass')";
$sql1="INSERT into customer values('$name','$phone','$hno','$sno','$city','$pin','$user')";
           $qury =  (mysql_query($sql) && mysql_query($sql1));
 
    
 
        if(!$qury)
        {
                  echo "Failed ".mysql_error();
                  echo "<br /><a href='Frontpage.php'>SignUp</a>";
                  echo "<br /><a href='Frontpage.php'>SignIn</a>";
        }
        else
        {
                  echo "Successful";
                  echo "<br /><a href='Frontpage.php'>SignUp</a>";
                  echo "<br /><a href='Frontpage.php'>SignIn</a>";

        }
?>