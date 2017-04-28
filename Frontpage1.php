<?php 
session_start();
error_reporting(E_ERROR | E_PARSE |E_WARNING);
if(!empty($_SESSION['login']))
{
if($_SESSION['login']==1)
{
$_SESSION['count1']=0;
header("Location: home.php");
//die('AAA');
}
}
?>

<!DOCTYPE html>

<html>
    <head>
       
        
        <link rel="shortcut icon" href="thumb.png">

        <style>
        #lol
        {
            top:1044px;
        width:100%;
            position:absolute;
        }
            
            #lol1 
            {
                top:1000px;
                left: 50%;
                //text-align: center;
                position:absolute;
            }
           
            #lol3
            {
                top:1600px;
                position:absolute;
                width: 100%;
               // left:50%;
                background-color: white;
            }
            #lol2
            {
                left:50%;
            }
            .back-to-top {
    position: fixed;
    bottom: 2em;
    right: 0px;
    text-decoration: none;
    color: #000000;
    background-color: rgba(235, 235, 235, 0.80);
    font-size: 12px;
    padding: 1em;
    display: none;
}

.back-to-top:hover {    
    background-color: rgba(135, 135, 135, 0.50);
}
            
    </style>
        <title>DOMINOS</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="frontpage.css"/>
        <script type="text/javascript" src="frontpage.js" ></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
        <script>
        jQuery(document).ready(function() {
    var offset = 220;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });
    
    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    })
});
            
        </script>
    </head>
    <body id="page">
        
                    <div id="header">
                        <div  >
                            <img src="images/logo.jpg" id="logo"/>
                        </div>
                        <div id="loginform">
                            <form id="login">
                                <div><input id="signup" type="button" value="Sign Up" onclick="openOverlay('up');" onscroll ="setOverlayHW()" /></div>
                                <div><input id="signin" type="button" value="Sign In" onclick="openOverlay('in');" onscroll="setOverlayHW()" /> </div>
                            </form>
                        </div>
                    </div>

                    <div id="mainbody">
                        <div id="sidebar">
                            <div id="simplyveg">
                                Simply Veg
                            </div>
                            <div id="simplyvegmenu">
                                <span id = "margherita"  onmouseover="changeDescPic('margherita');">Margherita</span>
                            </div> 

                            <div id="vegtreat">
                                Veg Treat
                            </div>
                            <div id="vegtreatmenu">
                                <span id="dcmargherita" onmouseover="changeDescPic('dcmargherita');"> Double Cheese Margherita</span><br/><br/>
                                <span id="country-special" onmouseover="changeDescPic('country-special');">Country Special</span><br/><br/>
                                <span id="farmhouse" onmouseover="changeDescPic('farmhouse');">Farmhouse</span><br/><br/>
                                <span id = "spicy-triple-tango" onmouseover="changeDescPic('spicy-triple-tango');">Spicy Triple Tango</span><br/><br/>
                            </div>  

                            <div id="vegspecial">
                                Veg Special
                            </div>
                            <div id="vegspecialmenu">
                                <span id="peppy-paneer" onmouseover="changeDescPic('peppy-paneer');">Peppy Paneer</span><br/><br/>
                                <span id="mexican-green-wave" onmouseover="changeDescPic('mexican-green-wave');">Mexican Green Wave</span><br/><br/>
                                <span id="deluxe-veggie" onmouseover="changeDescPic('deluxe-veggie');">Deluxe Veggie</span><br/><br/>
                                <span id="5-pepper" onmouseover="changeDescPic('5-pepper');">5 Pepper</span><br/><br/>
                                <span id="veg-paradise" onmouseover="changeDescPic('veg-paradise');">Veggie Paradise</span><br/><br/>
                            </div>  

                            <div id="feastpizza">
                                Feast Pizza
                            </div>
                            <div id="feastpizzamenu">
                                <span id="veg-extravaganza" onmouseover="changeDescPic('veg-extravaganza');">Veg Extravaganza</span><br/><br/>
                                <span id="cloud-9" onmouseover="changeDescPic('cloud-9');">Cloud 9</span><br/><br/>
                                <span id="chefs-veg-wonder" onmouseover="changeDescPic('chefs-veg-wonder');">Chef's Veg Wonder</span><br/><br/>
                            </div>  

                            <div id="exoticitalianveg">
                                Exotic Italian Veg
                            </div>
                            <div id="exoticitalianvegmenu">
                                <span id="roman-veg" onmouseover="changeDescPic('roman-veg');">Roman Veg Supreme</span><br/><br/>
                                <span id="milan-veg" onmouseover="changeDescPic('milan-veg');">Milan Veg Fantasy</span><br/><br/>
                            </div> 
                        </div>

                        <div id="description">

                            <div id="pizzapic">
                                <img id="pic" src="images/margherita.jpg"/>
                            </div>

                            <div id="pizzadesc">

                                <span id="name">MARGHERITA
                                </span>
                                <br/><br/>
                                <span id="desc">      A hugely popular margherita, with a deliciously tangy single cheese topping.
                                </span>

                            </div>
                        </div>
                    </div>

                    <div id='footer'>

                    </div>
        <div id="overlay">
                   
                   <div id="overlayWindow">
                      

                             <div id="overlaySignup">
                                 <div class="heading" id="headingUp">
                                     Sign Up
                                    
                                 </div> 
                                 
                                 <div id="formUp">
                                     <form action="Frontpage.php" method="post">
                                         <input  class ="textInput" type="text" name="name" placeholder="Name">
                                         <br/><br/>
                                         <input  class ="textInput" type="text" name="n" placeholder="Username">
                                         <br/><br/>
                                         <input  class ="textInput" type="password" name="p" placeholder="Password">
                                         <br/><br/>
                                         <input  class ="textInput" type="password" name="pd" placeholder="Confirm Password" onchange="javascript:validatepw()">
                                         <br/><br/>
                                         <input class ="textInput" type="text" name="phone" placeholder="Phone">
                                         <br/><br/>
                                         <input class ="textInput" type="text" name="hno" placeholder="House Number">
                                         <br/><br/>
                                         <input class ="textInput" type="text" name="sno" placeholder="Street Name">
                                         <br/><br/>
                                         <input class ="textInput" type="text" name="city" placeholder="City">
                                         <br/><br/>
                                         <input class ="textInput" type="text" name="pin" placeholder="Pincode">
                                         <br/><br/>
                                          <input class="submit" type="submit" value="Sign Up" name="submit1">
                                         <input class="close" type="button" value="Close" onclick="closeOverlay();">
                                     </form>
                                 </div>
                                 
                             </div>

                             <div id="overlaySignin">
                                 <div class="heading" id="headingIn">
                                     Sign In
                                 </div>
                                 
                                 <div id="formIn">
                                  <form action="Frontpage.php" method="post">
                                         <input class ="textInput" type="text" name="name" placeholder="Username">
                                         <br/><br/><br/>
                                         <input class ="textInput" type="password" name="pwd" placeholder="Password">
                                         <br/><br/><br/><br/>
                                         <input class="submit" type="submit" name="submit" value="Sign In">
                                         <input class="close" type="button" value="Close" onclick="closeOverlay();">
                                     </form>
                                 </div>
                                 
                             </div>
                   </div>
        </div>
        <div id="lol1">
        <h3 left="350" position: absolute>
            Reach Us
            </h3></div>
         <div id="lol">
<iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d7003.973761020868!2d77.37301910000002!3d28.630155299999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e2!4m5!1s0x390ce5513b192a73%3A0x9ba3cae4ad924567!2sJaypee+Institute+of+Information+Technology%2C+A-10%2C+Sector-62%2C+Noida%2C+Uttar+Pradesh+201307%2C+India!3m2!1d28.6303974!2d77.3721108!4m5!1s0x390ce5579da82edb%3A0x372bb18525f50286!2sDomino&#39;s+Pizza%2C+Plot+No.+19%2C+Ground+Floor%2C+Block+H1A%2C+Sector+63%2C+Near+HDFC+Bank%2C+Noida%2C+Uttar+Pradesh+201301%2C+India!3m2!1d28.6280306!2d77.3756757!5e0!3m2!1sen!2sin!4v1449081721464" width="100%" height="550" frameborder="10" style="border:10" allowfullscreen></iframe>
    </div>
       
        <div id="lol3">
        <h3 >CONTACT US: 1800-000-000(Toll free)</h3> <a href="about.html"><h3>ABOUT US</h3></a></div>
        <a href="#" class="back-to-top">Back to Top</a>
        
    </body>
</html>


<?php 
include_once("db.php");  

?>
 
<?php


         if(isset($_POST['submit1']))
{
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
                 $_SESSION['login']=1;
                  echo "<br /><a href='Frontpage.php'>SignUp</a>";
                  echo "<br /><a href='Frontpage.php'>SignIn</a>";

        }
}

?>
 
<?php

 if(isset($_POST['submit'])){
     $uname = $_POST['name'];
     $pass = $_POST['pwd'];

 
     $sql = "SELECT count(*) FROM loginmaster WHERE(
     username='".$uname."' and  password='".$pass."')";
 

 
      $qury = mysql_query($sql);
 
      $result = mysql_fetch_array($qury);
 
      if($result[0]>0)
      {
        echo "<script>alert('Successful Login!')</script>";

        $_SESSION['userName'] = $uname;
        $_SESSION['login']=1;
		header("Location: home.php");
          echo"<script>window.location.reload();</script>";

}
		




     
    else
      {
        echo "Login Failed";
        echo "<br /><a href='signupform.php'>SignUp</a>";
        echo "<br /><a href='signinform.php'>SignIn</a>";
        echo '<script> alert(" NOT LOGGED IN");</script>';
      }


}
?>



