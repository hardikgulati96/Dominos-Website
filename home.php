

<?php 
 session_start();
  include_once("db.php");
error_reporting(E_ERROR | E_PARSE |E_WARNING);

 if($_SESSION['login']==1|| $_SESSION['count1']==1){
//echo"<br><br><br>";
        echo "<br />Welcome ".$_SESSION['userName']."!";
//        echo "<br /><a href='Frontpage.php'>SignUp</a>";
//        echo "<br /><a href='Frontpage.php'>SignIn</a>";
//        echo "<br /><a href='logout.php'>LogOut</a>";
//        echo "<br /><a href='asd.php'>process</a>";
//     echo' <link rel="shortcut icon" href="thumb.png">';
}

?>














<?php 
 
  include_once("db.php"); 
 // session_start();
if(empty($_SESSION['ood']))
$_SESSION['ood']=rand(100,999);
$_SESSION['try']=0;
 
?>
<?php
//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
if(isset($_POST['submit1'])||isset($_POST['submit2'])||isset($_POST['submit3'])||isset($_POST['submit4'])||isset($_POST['submit5'])||isset($_POST['submit6'])||isset($_POST['submit7'])||isset($_POST['submit8'])||isset($_POST['submit9'])||isset($_POST['submit10'])||isset($_POST['submit11'])||isset($_POST['submit12'])||isset($_POST['submit13'])||isset($_POST['submit14'])||isset($_POST['submit15']))
{
//if(!isset($_POST['checkout']))
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
 $final_price=($crust+$pprice+$sum_price)*$quantity;
if(empty($_SESSION['fp']))
{
$_SESSION['fp']=$final_price;
}
else
$_SESSION['fp']+=$final_price;

//echo'final price'.$_SESSION['fp'];
$coupon="";
//echo $pid;
    
    $swl="INSERT INTO `build_order`(`oid`, `pid`, `type`, `tname`, `quantity`, `size`, `subamount`) VALUES ('$oid','$pid','$type','$tarr','$quantity','$size','$final_price')";
     $qury = mysql_query($swl);
         if(!$qury)
        {
                  echo "Failed ".mysql_error();
         
        }

}
?>




<form action ="boss.php" method=post>
<input type="submit" value="CHECKOUT" name="checkout">



</form>



<?php
if(isset($_POST['submit1'])||isset($_POST['submit2'])||isset($_POST['submit3'])||isset($_POST['submit4'])||isset($_POST['submit5'])||isset($_POST['submit6'])||isset($_POST['submit7'])||isset($_POST['submit8'])||isset($_POST['submit9'])||isset($_POST['submit10'])||isset($_POST['submit11'])||isset($_POST['submit12'])||isset($_POST['submit13'])||isset($_POST['submit14'])||isset($_POST['submit15']))
{

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
                 /// echo "Failed ".mysql_error();
         
        }
        $_SESSION['try']=1;
    }

  /*  $sqr=mysql_query("SELECT * FROM build_order WHERE oid='$oid'");
   for($i=0; $roat[$i]=mysql_fetch_array($sqr,MYSQL_NUM); $i++);
    $c = mysql_num_rows($sqr);
   $ppid= $roat[0];
    for($i=0;$i<$c;$i++){
    foreach($roat[$i] as $element)
    {
        echo $element.'<br>';
    }
    }*/
    
    

}
}
?>




































<!DOCTYPE html>

<html>
    <head>
         <link rel="shortcut icon" href="thumb.png">
        <title>DOMINOS</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" type="text/css" href="home.css"/>
        <script type="text/javascript" src="home.js" ></script>
        <SCRIPT type="text/javascript">
    window.history.forward();
    function noBack() { window.history.forward(); }
</SCRIPT>
</HEAD>
<BODY onload="noBack();"
    onpageshow="if (event.persisted) noBack();" onunload="">
     <link rel="shortcut icon" href="thumb.png">
    </head>
    <body >
                    <div id="header">
                            <div  >
                              <a href="home.php"> <img src="images/logo.jpg" id="logo"/></a>
                            </div>
                            <div  >
                               <a href="boss.php"> <img src="images/home/cart.png" id="cart" onmouseover="changetoblack();" onmouseout="changetogrey();" /></a>
                            </div>
                         
                            <div id="logout">
                              <a href="logout.php">   Logout</a>    
                            </div>
                         
                    </div>
        
                    <div id="mainbody">
                        
                           <div id="simplyveg">
                               <div id="titlesv" class="titlecss">
                                   S I M P L Y  &nbsp;  V E G
                               </div>
                              
                               <div id="sv1">
                                   <img id="sv1pic" src="images/home/margherita.png"/>
                                   <span id="pizzadesc">
                                       Margherita<br/>
                                       S:₹85 M:₹220 L:₹395 <br/>
                                       Single Cheese Topping

                                   </span>
                                   <div id="verticalline">
                               
                                   </div>
                                   <form action="home.php" method="post">
                                   <div class="svcrust" id="svcrust1">
                                               <span class ="crust " id="svspan">
                                                   Choose Your Crust 
                                               </span>
                                               <div id="crustmenu">
                                                  

                                                       <div id="cht">
                                                           <input type="radio"  id="r1" name ="check"  value="Classic Hand Tossed" class="inputrad" checked="true"  />                                                
                                                                       <img src="images/home/classic-hand-tossed.png" class="ptype"/>
                                                                       <span class="ptypedesc">Classic Hand Tossed</span>
                                                       </div>

                                                       <div id="cb">               
                                                               <input type="radio" id="r2" name ="check" value="Cheese Burst" class="inputrad"/>                                                
                                                                       <img src="images/home/cheese-burst.png" class="ptype"/>
                                                                       <span class="ptypedesc">Cheese Burst</span>
                                                       </div>               

                                                       <div id="ic">               
                                                               <input type="radio"  id="r3" name ="check" value="Italian Crust" class="inputrad" />                                                
                                                                       <img src="images/home/italian-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Italian Crust</span>
                                                       </div>

                                                       <div id="fpp">
                                                               <input type="radio" id="r4" value="Fresh Pan Pizza" name ="check" class="inputrad" />                                                
                                                                       <img src="images/home/fresh-pan-pizza.png" class="ptype"/>
                                                                       <span class="ptypedesc">Fresh Pan Pizza</span>
                                                       </div> 

                                                       <div id="wtc">
                                                               <input type="radio" id="r5" name ="check" value="Wheat Thin Crust" class="inputrad"  />                                                
                                                                       <img src="images/home/wheat-thin-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Wheat Thin Crust</span>
                                                       </div>      

                                                   

                                                  
                                                   <div id="next" onclick="loadnext('svtopping1','svcrust1');">
                                                          Next >>
                                                      </div>
                                                  
                                               </div>
                                               
                                   </div>
                                   <div class="svtopping" id="svtopping1">
                                           <span class ="crust " id="svspan">
                                                   Choose Extra Toppings 
                                               </span>
                                               <div id="toppingsmenu">
                                                   

                                                       <div id="tomato">
                                                           <input type="checkbox"  id="r1" name ="hardik[]" value="910" class="inputrad"  />                                                
                                                           <img src="images/home/toppingsTomato.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Tomato</span>
                                                       </div>

                                                       <div id="corn">               
                                                               <input type="checkbox" id="r2" name ="hardik[]" value="911" class="inputrad" />                                                
                                                               <img src="images/home/toppingsGoldenCorn.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Golden Corn</span>
                                                       </div>               

                                                       <div id="capsi">               
                                                               <input type="checkbox"  id="r3" name ="hardik[]" value="912" class="inputrad" />                                                
                                                               <img src="images/home/toppingsCapsicum.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Capsicum</span>
                                                       </div>

                                                       <div id="mushroom">
                                                               <input type="checkbox" id="r4" name ="hardik[]" value="913" class="inputrad" />                                                
                                                               <img src="images/home/toppingsMushroom.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Mushroom</span>
                                                       </div> 

                                                       <div id="olive">
                                                               <input type="checkbox" id="r5" name ="hardik[]" value="914" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOlives.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Olives</span>
                                                       </div>      

                                                       <div id="onion">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="915" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOnion.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Onion</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paneer">
                                                               <input type="checkbox" id="r7" name ="hardik[]" value="916" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaneer.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paneer</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paparika">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="917" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaparika.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paparika</span>
                                                       </div>      
                                                 

                                                   
                                                   <div id="prev" onclick="loadprev('svcrust1','svtopping1');">
                                                       << Previous
                                                   </div>
                                           
                                                    <div id="next" onclick="loadnext('svqty1','svtopping1');">
                                                          Next >>
                                                      </div>
                                                   
                                               </div>
                                                        
                                   </div>
                                   <div class="svqty" id="svqty1">
                                        <span class ="crust " id="svspan">
                                                   Choose Quantity & Size 
                                        </span>
                                       <label for="quantity">Quantity : </label>
                                       <select name="quantity" >
                                            <option value="1">&nbsp;&nbsp;&nbsp; 1</option>
                                            <option value="2">&nbsp;&nbsp;&nbsp; 2</option>
                                            <option value="3">&nbsp;&nbsp;&nbsp; 3</option>
                                            <option value="4">&nbsp;&nbsp;&nbsp; 4</option>
                                            <option value="5">&nbsp;&nbsp;&nbsp; 5</option>
                                            <option value="6">&nbsp;&nbsp;&nbsp; 6</option>
                                            <option value="7">&nbsp;&nbsp;&nbsp; 7</option>
                                            <option value="8">&nbsp;&nbsp;&nbsp; 8</option>
                                            <option value="9">&nbsp;&nbsp;&nbsp; 9</option>
                                            <option value="10">&nbsp;&nbsp;&nbsp; 10</option>
                                       </select>
                                       <span id="size">Size : </span>
                                       
                                       <span class="size" id="small"  > <input type="radio" name="size" value="small" checked="true" /> Small</span>
                                       
                                       <span class="size" id="medium"> <input type="radio" name="size" value="medium"/> Medium</span>
                                       
                                       <span class="size" id="large"> <input type="radio" name="size" value="large"/> Large</span>


                                       <div id="prev" onclick="loadprev('svtopping1','svqty1');" >
                                            << Previous
                                        </div>
                                        <input type="submit" id="addcart" value="Add to Cart" name="submit1" />
                                       
                                   </div>
                                 </form>
                               </div>
                               
                           </div>
                           
                        
                            <div id="vegtreat1">
                               <div class="titlecss" id="titlevt">
                                   V E G  &nbsp;  T R E A T
                               </div>
                              
                               <div id="sv1">
                                   <img id="sv1pic" src="images/home/dcmargherita.png"/>
                                   <span id="pizzadesc">
                                       Double Cheese Margherita<br/>
                                       S:₹155 M:₹310 L:₹495 <br/>
                                        Loaded With Extra Cheese  

                                   </span>
                                   <div id="verticalline">
                               
                                   </div>
                                   <form action="home.php" method="post">
                                   <div class="svcrust" id="vtcrust1">
                                               <span class ="crust " id="svspan">
                                                   Choose Your Crust 
                                               </span>
                                               <div id="crustmenu">
                                                  

                                                       <div id="cht">
                                                           <input type="radio"  id="r1" name ="check" value="Classic Hand Tossed" class="inputrad" checked="true"  />                                                
                                                                       <img src="images/home/classic-hand-tossed.png" class="ptype"/>
                                                                       <span class="ptypedesc">Classic Hand Tossed</span>
                                                       </div>

                                                       <div id="cb">               
                                                               <input type="radio" id="r2" name ="check" value="Cheese Burst" class="inputrad"/>                                                
                                                                       <img src="images/home/cheese-burst.png" class="ptype"/>
                                                                       <span class="ptypedesc">Cheese Burst</span>
                                                       </div>               

                                                       <div id="ic">               
                                                               <input type="radio"  id="r3" name ="check" value="Italian Crust" class="inputrad" />                                                
                                                                       <img src="images/home/italian-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Italian Crust</span>
                                                       </div>

                                                       <div id="fpp">
                                                               <input type="radio" id="r4" name ="check" value="Fresh Pan Pizza" class="inputrad" />                                                
                                                                       <img src="images/home/fresh-pan-pizza.png" class="ptype"/>
                                                                       <span class="ptypedesc">Fresh Pan Pizza</span>
                                                       </div> 

                                                       <div id="wtc">
                                                               <input type="radio" id="r5" name ="check" value="Wheat Thin Crust" class="inputrad"  />                                                
                                                                       <img src="images/home/wheat-thin-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Wheat Thin Crust</span>
                                                       </div>      

                                                   

                                                  
                                                   <div id="next" onclick="loadnext('vttopping1','vtcrust1');">
                                                          Next >>
                                                      </div>
                                                  
                                               </div>
                                               
                                   </div>
                                   <div class="svtopping" id="vttopping1">
                                           <span class ="crust " id="svspan">
                                                   Choose Extra Toppings 
                                               </span>
                                               <div id="toppingsmenu">
                                                   

                                                       <div id="tomato">
                                                           <input type="checkbox"  id="r1" name ="hardik[]" value="910" class="inputrad"  />                                                
                                                           <img src="images/home/toppingsTomato.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Tomato</span>
                                                       </div>

                                                       <div id="corn">               
                                                               <input type="checkbox" id="r2" name ="hardik[]" value="911" class="inputrad" />                                                
                                                               <img src="images/home/toppingsGoldenCorn.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Golden Corn</span>
                                                       </div>               

                                                       <div id="capsi">               
                                                               <input type="checkbox"  id="r3" name ="hardik[]" value="912" class="inputrad" />                                                
                                                               <img src="images/home/toppingsCapsicum.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Capsicum</span>
                                                       </div>

                                                       <div id="mushroom">
                                                               <input type="checkbox" id="r4" name ="hardik[]" value="913" class="inputrad" />                                                
                                                               <img src="images/home/toppingsMushroom.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Mushroom</span>
                                                       </div> 

                                                       <div id="olive">
                                                               <input type="checkbox" id="r5" name ="hardik[]" value="914" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOlives.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Olives</span>
                                                       </div>      

                                                       <div id="onion">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="915" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOnion.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Onion</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paneer">
                                                               <input type="checkbox" id="r7" name ="hardik[]" value="916" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaneer.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paneer</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paparika">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="917" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaparika.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paparika</span>
                                                       </div>      
                                                 

                                                   
                                                   <div id="prev" onclick="loadprev('vtcrust1','vttopping1');">
                                                       << Previous
                                                   </div>
                                           
                                                    <div id="next" onclick="loadnext('vtqty1','vttopping1');">
                                                          Next >>
                                                      </div>
                                                   
                                               </div>
                                                        
                                   </div>
                                   <div class="svqty" id="vtqty1">
                                        <span class ="crust " id="svspan">
                                                    Choose Quantity & Size
                                        </span>
                                       <label for="quantity">Quantity : </label>
                                       <select name="quantity" >
                                            <option value="1">&nbsp;&nbsp;&nbsp; 1</option>
                                            <option value="2">&nbsp;&nbsp;&nbsp; 2</option>
                                            <option value="3">&nbsp;&nbsp;&nbsp; 3</option>
                                            <option value="4">&nbsp;&nbsp;&nbsp; 4</option>
                                            <option value="5">&nbsp;&nbsp;&nbsp; 5</option>
                                            <option value="6">&nbsp;&nbsp;&nbsp; 6</option>
                                            <option value="7">&nbsp;&nbsp;&nbsp; 7</option>
                                            <option value="8">&nbsp;&nbsp;&nbsp; 8</option>
                                            <option value="9">&nbsp;&nbsp;&nbsp; 9</option>
                                            <option value="10">&nbsp;&nbsp;&nbsp; 10</option>
                                       </select>
                                       <span id="size">Size : </span>
                                       
                                       <span class="size" id="small"  > <input type="radio" name="size" value="small" checked="true" /> Small</span>
                                       
                                       <span class="size" id="medium"> <input type="radio" name="size" value="medium"/> Medium</span>
                                       
                                       <span class="size" id="large"> <input type="radio" name="size" value="large"/> Large</span>
                                       <div id="prev" onclick="loadprev('vttopping1','vtqty1');" >
                                            << Previous
                                        </div>
                                        <input type="submit" id="addcart" value="Add to Cart" name="submit2" />
                                       
                                   </div>
                                 </form>
                               </div>
                               
                           </div>  
                        
                             <div id="vegtreat2">
                               <div class="titlecss" id="titlevt">
                                   V E G  &nbsp;  T R E A T
                               </div>
                              
                               <div id="sv1">
                                   <img id="sv1pic" src="images/home/countryspecial.jpg"/>
                                   <span id="pizzadesc">
                                       Country Special<br/>
                                       S:₹155 M:₹310 L:₹495 <br/>
                                       Onion|Crisp Capsicum |Fresh Tomato  

                                   </span>
                                   <div id="verticalline">
                               
                                   </div>
                                   <form action="home.php" method="post">
                                   <div class="svcrust" id="vtcrust2">
                                               <span class ="crust " id="svspan">
                                                   Choose Your Crust 
                                               </span>
                                               <div id="crustmenu">
                                                  

                                                       <div id="cht">
                                                           <input type="radio"  id="r1" name ="check" value="Classic Hand Tossed" class="inputrad" checked="true"  />                                                
                                                                       <img src="images/home/classic-hand-tossed.png" class="ptype"/>
                                                                       <span class="ptypedesc">Classic Hand Tossed</span>
                                                       </div>

                                                       <div id="cb">               
                                                               <input type="radio" id="r2" name ="check" value="Cheese Burst" class="inputrad"/>                                                
                                                                       <img src="images/home/cheese-burst.png" class="ptype"/>
                                                                       <span class="ptypedesc">Cheese Burst</span>
                                                       </div>               

                                                       <div id="ic">               
                                                               <input type="radio"  id="r3" name ="check" value="Italian Crust" class="inputrad" />                                                
                                                                       <img src="images/home/italian-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Italian Crust</span>
                                                       </div>

                                                       <div id="fpp">
                                                               <input type="radio" id="r4" name ="check" value="Fresh Pan Pizza" class="inputrad" />                                                
                                                                       <img src="images/home/fresh-pan-pizza.png" class="ptype"/>
                                                                       <span class="ptypedesc">Fresh Pan Pizza</span>
                                                       </div> 

                                                       <div id="wtc">
                                                               <input type="radio" id="r5" name ="check" value="Wheat Thin Crust" class="inputrad"  />                                                
                                                                       <img src="images/home/wheat-thin-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Wheat Thin Crust</span>
                                                       </div>      

                                                   

                                                  
                                                   <div id="next" onclick="loadnext('vttopping2','vtcrust2');">
                                                          Next >>
                                                      </div>
                                                  
                                               </div>
                                               
                                   </div>
                                   <div class="svtopping" id="vttopping2">
                                           <span class ="crust " id="svspan">
                                                   Choose Extra Toppings 
                                               </span>
                                               <div id="toppingsmenu">
                                                   

                                                       <div id="tomato">
                                                           <input type="checkbox"  id="r1" name ="hardik[]" value="910" class="inputrad"  />                                                
                                                           <img src="images/home/toppingsTomato.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Tomato</span>
                                                       </div>

                                                       <div id="corn">               
                                                               <input type="checkbox" id="r2" name ="hardik[]" value="911" class="inputrad" />                                                
                                                               <img src="images/home/toppingsGoldenCorn.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Golden Corn</span>
                                                       </div>               

                                                       <div id="capsi">               
                                                               <input type="checkbox"  id="r3" name ="hardik[]" value="912" class="inputrad" />                                                
                                                               <img src="images/home/toppingsCapsicum.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Capsicum</span>
                                                       </div>

                                                       <div id="mushroom">
                                                               <input type="checkbox" id="r4" name ="hardik[]" value="913" class="inputrad" />                                                
                                                               <img src="images/home/toppingsMushroom.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Mushroom</span>
                                                       </div> 

                                                       <div id="olive">
                                                               <input type="checkbox" id="r5" name ="hardik[]" value="914" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOlives.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Olives</span>
                                                       </div>      

                                                       <div id="onion">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="915" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOnion.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Onion</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paneer">
                                                               <input type="checkbox" id="r7" name ="hardik[]" value="916" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaneer.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paneer</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paparika">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="917" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaparika.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paparika</span>
                                                       </div>      
                                                 

                                                   
                                                   <div id="prev" onclick="loadprev('vtcrust2','vttopping2');">
                                                       << Previous
                                                   </div>
                                           
                                                    <div id="next" onclick="loadnext('vtqty2','vttopping2');">
                                                          Next >>
                                                      </div>
                                                   
                                               </div>
                                                        
                                   </div>
                                   <div class="svqty" id="vtqty2">
                                        <span class ="crust " id="svspan">
                                                    Choose Quantity & Size
                                        </span>
                                        
                                       <label for="quantity">Quantity : </label>
                                       <select name="quantity" >
                                            <option value="1">&nbsp;&nbsp;&nbsp; 1</option>
                                            <option value="2">&nbsp;&nbsp;&nbsp; 2</option>
                                            <option value="3">&nbsp;&nbsp;&nbsp; 3</option>
                                            <option value="4">&nbsp;&nbsp;&nbsp; 4</option>
                                            <option value="5">&nbsp;&nbsp;&nbsp; 5</option>
                                            <option value="6">&nbsp;&nbsp;&nbsp; 6</option>
                                            <option value="7">&nbsp;&nbsp;&nbsp; 7</option>
                                            <option value="8">&nbsp;&nbsp;&nbsp; 8</option>
                                            <option value="9">&nbsp;&nbsp;&nbsp; 9</option>
                                            <option value="10">&nbsp;&nbsp;&nbsp; 10</option>
                                       </select>
                                       <span id="size">Size : </span>
                                       
                                       <span class="size" id="small"  > <input type="radio" name="size" value="small" checked="true" /> Small</span>
                                       
                                       <span class="size" id="medium"> <input type="radio" name="size" value="medium"/> Medium</span>
                                       
                                       <span class="size" id="large"> <input type="radio" name="size" value="large"/> Large</span>

                                       <div id="prev" onclick="loadprev('vttopping2','vtqty2');" >
                                            << Previous
                                        </div>
                                        <input type="submit" id="addcart" value="Add to Cart" name="submit3" />
                                       
                                   </div>
                                 </form>
                               </div>
                               
                           </div>
                          
                          <div id="vegtreat3">
                               <div class="titlecss" id="titlevt">
                                   V E G  &nbsp;  T R E A T
                               </div>
                              
                               <div id="sv1">
                                   <img id="sv1pic" src="images/home/farmhouse.jpg"/>
                                   <span id="pizzadesc">
                                     Farmhouse<br/>
                                     S:₹155 M:₹310 L:₹495 <br/>
                                     Onion|Crisp Capsicum |Fresh Tomato  

                                   </span>
                                   <div id="verticalline">
                               
                                   </div>
                                   <form action="home.php" method="post">
                                   <div class="svcrust" id="vtcrust3">
                                               <span class ="crust " id="svspan">
                                                   Choose Your Crust 
                                               </span>
                                               <div id="crustmenu">
                                                  

                                                       <div id="cht">
                                                           <input type="radio"  id="r1" name ="check" value="Classic Hand Tossed" class="inputrad" checked="true"  />                                                
                                                                       <img src="images/home/classic-hand-tossed.png" class="ptype"/>
                                                                       <span class="ptypedesc">Classic Hand Tossed</span>
                                                       </div>

                                                       <div id="cb">               
                                                               <input type="radio" id="r2" name ="check" value="Cheese Burst" class="inputrad"/>                                                
                                                                       <img src="images/home/cheese-burst.png" class="ptype"/>
                                                                       <span class="ptypedesc">Cheese Burst</span>
                                                       </div>               

                                                       <div id="ic">               
                                                               <input type="radio"  id="r3" name ="check" value="Italian Crust" class="inputrad" />                                                
                                                                       <img src="images/home/italian-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Italian Crust</span>
                                                       </div>

                                                       <div id="fpp">
                                                               <input type="radio" id="r4" name ="check" value="Fresh Pan Pizza" class="inputrad" />                                                
                                                                       <img src="images/home/fresh-pan-pizza.png" class="ptype"/>
                                                                       <span class="ptypedesc">Fresh Pan Pizza</span>
                                                       </div> 

                                                       <div id="wtc">
                                                               <input type="radio" id="r5" name ="check" value="Wheat Thin Crust" class="inputrad"  />                                                
                                                                       <img src="images/home/wheat-thin-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Wheat Thin Crust</span>
                                                       </div>      

                                                   

                                                  
                                                   <div id="next" onclick="loadnext('vttopping3','vtcrust3');">
                                                          Next >>
                                                      </div>
                                                  
                                               </div>
                                               
                                   </div>
                                   <div class="svtopping" id="vttopping3">
                                           <span class ="crust " id="svspan">
                                                   Choose Extra Toppings 
                                               </span>
                                               <div id="toppingsmenu">
                                                   

                                                       <div id="tomato">
                                                           <input type="checkbox"  id="r1" name ="hardik[]" value="910" class="inputrad"  />                                                
                                                           <img src="images/home/toppingsTomato.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Tomato</span>
                                                       </div>

                                                       <div id="corn">               
                                                               <input type="checkbox" id="r2" name ="hardik[]" value="911" class="inputrad" />                                                
                                                               <img src="images/home/toppingsGoldenCorn.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Golden Corn</span>
                                                       </div>               

                                                       <div id="capsi">               
                                                               <input type="checkbox"  id="r3" name ="hardik[]" value="912" class="inputrad" />                                                
                                                               <img src="images/home/toppingsCapsicum.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Capsicum</span>
                                                       </div>

                                                       <div id="mushroom">
                                                               <input type="checkbox" id="r4" name ="hardik[]" value="913" class="inputrad" />                                                
                                                               <img src="images/home/toppingsMushroom.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Mushroom</span>
                                                       </div> 

                                                       <div id="olive">
                                                               <input type="checkbox" id="r5" name ="hardik[]" value="914" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOlives.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Olives</span>
                                                       </div>      

                                                       <div id="onion">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="915" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOnion.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Onion</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paneer">
                                                               <input type="checkbox" id="r7" name ="hardik[]" value="916" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaneer.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paneer</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paparika">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="917" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaparika.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paparika</span>
                                                       </div>      
                                                 

                                                   
                                                   <div id="prev" onclick="loadprev('vtcrust3','vttopping3');">
                                                       << Previous
                                                   </div>
                                           
                                                    <div id="next" onclick="loadnext('vtqty3','vttopping3');">
                                                          Next >>
                                                      </div>
                                                   
                                               </div>
                                                        
                                   </div>
                                   <div class="svqty" id="vtqty3">
                                        <span class ="crust " id="svspan">
                                                    Choose Quantity & Size
                                        </span>
                                       <label for="quantity">Quantity : </label>
                                       <select name="quantity" >
                                            <option value="1">&nbsp;&nbsp;&nbsp; 1</option>
                                            <option value="2">&nbsp;&nbsp;&nbsp; 2</option>
                                            <option value="3">&nbsp;&nbsp;&nbsp; 3</option>
                                            <option value="4">&nbsp;&nbsp;&nbsp; 4</option>
                                            <option value="5">&nbsp;&nbsp;&nbsp; 5</option>
                                            <option value="6">&nbsp;&nbsp;&nbsp; 6</option>
                                            <option value="7">&nbsp;&nbsp;&nbsp; 7</option>
                                            <option value="8">&nbsp;&nbsp;&nbsp; 8</option>
                                            <option value="9">&nbsp;&nbsp;&nbsp; 9</option>
                                            <option value="10">&nbsp;&nbsp;&nbsp; 10</option>
                                       </select>
                                       <span id="size">Size : </span>
                                       
                                       <span class="size" id="small"  > <input type="radio" name="size" value="small" checked="true" /> Small</span>
                                       
                                       <span class="size" id="medium"> <input type="radio" name="size" value="medium"/> Medium</span>
                                       
                                       <span class="size" id="large"> <input type="radio" name="size" value="large"/> Large</span>
                                       <div id="prev" onclick="loadprev('vttopping3','vtqty3');" >
                                            << Previous
                                        </div>
                                        <input type="submit" id="addcart" value="Add to Cart" name="submit4" />
                                       
                                   </div>
                                 </form>
                               </div>
                               
                           </div>
                        
                          <div id="vegtreat4">
                               <div class="titlecss" id="titlevt">
                                   V E G  &nbsp;  T R E A T
                               </div>
                              
                               <div id="sv1">
                                   <img id="sv1pic" src="images/home/spicytripletangoMainMenu5.jpg"/>
                                   <span id="pizzadesc">
                                     Spicy Triple Tango<br/>
                                     S:₹155 M:₹310 L:₹495 <br/>
                                     Golden Corn| Jalapeno| Red Paprika

                                   </span>
                                   <div id="verticalline">
                               
                                   </div>
                                   <form action="home.php" method="post">
                                   <div class="svcrust" id="vtcrust4">
                                               <span class ="crust " id="svspan">
                                                   Choose Your Crust 
                                               </span>
                                               <div id="crustmenu">
                                                  

                                                       <div id="cht">
                                                           <input type="radio"  id="r1" name ="check" value="Classic Hand Tossed" class="inputrad" checked="true"  />                                                
                                                                       <img src="images/home/classic-hand-tossed.png" class="ptype"/>
                                                                       <span class="ptypedesc">Classic Hand Tossed</span>
                                                       </div>

                                                       <div id="cb">               
                                                               <input type="radio" id="r2" name ="check" value="Cheese Burst" class="inputrad"/>                                                
                                                                       <img src="images/home/cheese-burst.png" class="ptype"/>
                                                                       <span class="ptypedesc">Cheese Burst</span>
                                                       </div>               

                                                       <div id="ic">               
                                                               <input type="radio"  id="r3" name ="check" value="Italian Crust" class="inputrad" />                                                
                                                                       <img src="images/home/italian-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Italian Crust</span>
                                                       </div>

                                                       <div id="fpp">
                                                               <input type="radio" id="r4" name ="check" value="Fresh Pan Pizza" class="inputrad" />                                                
                                                                       <img src="images/home/fresh-pan-pizza.png" class="ptype"/>
                                                                       <span class="ptypedesc">Fresh Pan Pizza</span>
                                                       </div> 

                                                       <div id="wtc">
                                                               <input type="radio" id="r5" name ="check" value="Wheat Thin Crust" class="inputrad"  />                                                
                                                                       <img src="images/home/wheat-thin-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Wheat Thin Crust</span>
                                                       </div>      

                                                   

                                                  
                                                   <div id="next" onclick="loadnext('vttopping4','vtcrust4');">
                                                          Next >>
                                                      </div>
                                                  
                                               </div>
                                               
                                   </div>
                                   <div class="svtopping" id="vttopping4">
                                           <span class ="crust " id="svspan">
                                                   Choose Extra Toppings 
                                               </span>
                                               <div id="toppingsmenu">
                                                   

                                                       <div id="tomato">
                                                           <input type="checkbox"  id="r1" name ="hardik[]" value="910" class="inputrad"  />                                                
                                                           <img src="images/home/toppingsTomato.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Tomato</span>
                                                       </div>

                                                       <div id="corn">               
                                                               <input type="checkbox" id="r2" name ="hardik[]" value="911" class="inputrad" />                                                
                                                               <img src="images/home/toppingsGoldenCorn.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Golden Corn</span>
                                                       </div>               

                                                       <div id="capsi">               
                                                               <input type="checkbox"  id="r3" name ="hardik[]" value="912" class="inputrad" />                                                
                                                               <img src="images/home/toppingsCapsicum.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Capsicum</span>
                                                       </div>

                                                       <div id="mushroom">
                                                               <input type="checkbox" id="r4" name ="hardik[]" value="913" class="inputrad" />                                                
                                                               <img src="images/home/toppingsMushroom.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Mushroom</span>
                                                       </div> 

                                                       <div id="olive">
                                                               <input type="checkbox" id="r5" name ="hardik[]" value="914" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOlives.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Olives</span>
                                                       </div>      

                                                       <div id="onion">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="915" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOnion.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Onion</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paneer">
                                                               <input type="checkbox" id="r7" name ="hardik[]" value="916" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaneer.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paneer</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paparika">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="917" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaparika.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paparika</span>
                                                       </div>      
                                                 

                                                   
                                                   <div id="prev" onclick="loadprev('vtcrust4','vttopping4');">
                                                       << Previous
                                                   </div>
                                           
                                                    <div id="next" onclick="loadnext('vtqty4','vttopping4');">
                                                          Next >>
                                                      </div>
                                                   
                                               </div>
                                                        
                                   </div>
                                   <div class="svqty" id="vtqty4">
                                        <span class ="crust " id="svspan">
                                       Choose Quantity & Size
                                        </span>
                                       <label for="quantity">Quantity : </label>
                                       <select name="quantity" >
                                            <option value="1">&nbsp;&nbsp;&nbsp; 1</option>
                                            <option value="2">&nbsp;&nbsp;&nbsp; 2</option>
                                            <option value="3">&nbsp;&nbsp;&nbsp; 3</option>
                                            <option value="4">&nbsp;&nbsp;&nbsp; 4</option>
                                            <option value="5">&nbsp;&nbsp;&nbsp; 5</option>
                                            <option value="6">&nbsp;&nbsp;&nbsp; 6</option>
                                            <option value="7">&nbsp;&nbsp;&nbsp; 7</option>
                                            <option value="8">&nbsp;&nbsp;&nbsp; 8</option>
                                            <option value="9">&nbsp;&nbsp;&nbsp; 9</option>
                                            <option value="10">&nbsp;&nbsp;&nbsp; 10</option>
                                       </select>
                                       <span id="size">Size : </span>
                                       
                                       <span class="size" id="small"  > <input type="radio" name="size" value="small" checked="true" /> Small</span>
                                       
                                       <span class="size" id="medium"> <input type="radio" name="size" value="medium"/> Medium</span>
                                       
                                       <span class="size" id="large"> <input type="radio" name="size" value="large"/> Large</span>

                                       <div id="prev" onclick="loadprev('vttopping4','vtqty4');" >
                                            << Previous
                                        </div>
                                        <input type="submit" id="addcart" value="Add to Cart" name="submit5" />
                                       
                                   </div>
                                 </form>
                               </div>
                               
                           </div>
                        
                        <div id="vegspcl1">
                               <div class="titlecss" id="titlevs">
                                   V E G  &nbsp;  S P E C I A L
                               </div>
                              
                               <div id="sv1">
                                   <img id="sv1pic" src="images/home/peppypaneer.png"/>
                                   <span id="pizzadesc">
                                     Peppy Paneer <br/>
                                     S:₹200 M:₹380 L:₹565 <br/>
                                     Paneer| Crisp Capsicum| Red Pepper

                                   </span>
                                   <div id="verticalline">
                               
                                   </div>
                                   <form action="home.php" method="post">
                                   <div class="svcrust" id="vscrust1">
                                               <span class ="crust " id="svspan">
                                                   Choose Your Crust 
                                               </span>
                                               <div id="crustmenu">
                                                  

                                                       <div id="cht">
                                                           <input type="radio"  id="r1" name ="check" value="Classic Hand Tossed" class="inputrad" checked="true"  />                                                
                                                                       <img src="images/home/classic-hand-tossed.png" class="ptype"/>
                                                                       <span class="ptypedesc">Classic Hand Tossed</span>
                                                       </div>

                                                       <div id="cb">               
                                                               <input type="radio" id="r2" name ="check" value="Cheese Burst" class="inputrad"/>                                                
                                                                       <img src="images/home/cheese-burst.png" class="ptype"/>
                                                                       <span class="ptypedesc">Cheese Burst</span>
                                                       </div>               

                                                       <div id="ic">               
                                                               <input type="radio"  id="r3" name ="check" value="Italian Crust" class="inputrad" />                                                
                                                                       <img src="images/home/italian-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Italian Crust</span>
                                                       </div>

                                                       <div id="fpp">
                                                               <input type="radio" id="r4" name ="check" value="Fresh Pan Pizza" class="inputrad" />                                                
                                                                       <img src="images/home/fresh-pan-pizza.png" class="ptype"/>
                                                                       <span class="ptypedesc">Fresh Pan Pizza</span>
                                                       </div> 

                                                       <div id="wtc">
                                                               <input type="radio" id="r5" name ="check" value="Wheat Thin Crust" class="inputrad"  />                                                
                                                                       <img src="images/home/wheat-thin-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Wheat Thin Crust</span>
                                                       </div>      

                                                   

                                                  
                                                   <div id="next" onclick="loadnext('vstopping1','vscrust1');">
                                                          Next >>
                                                      </div>
                                                  
                                               </div>
                                               
                                   </div>
                                   <div class="svtopping" id="vstopping1">
                                           <span class ="crust " id="svspan">
                                                   Choose Extra Toppings 
                                               </span>
                                               <div id="toppingsmenu">
                                                   

                                                       <div id="tomato">
                                                           <input type="checkbox"  id="r1" name ="hardik[]" value="910" class="inputrad"  />                                                
                                                           <img src="images/home/toppingsTomato.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Tomato</span>
                                                       </div>

                                                       <div id="corn">               
                                                               <input type="checkbox" id="r2" name ="hardik[]" value="911" class="inputrad" />                                                
                                                               <img src="images/home/toppingsGoldenCorn.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Golden Corn</span>
                                                       </div>               

                                                       <div id="capsi">               
                                                               <input type="checkbox"  id="r3" name ="hardik[]" value="912" class="inputrad" />                                                
                                                               <img src="images/home/toppingsCapsicum.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Capsicum</span>
                                                       </div>

                                                       <div id="mushroom">
                                                               <input type="checkbox" id="r4" name ="hardik[]" value="913" class="inputrad" />                                                
                                                               <img src="images/home/toppingsMushroom.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Mushroom</span>
                                                       </div> 

                                                       <div id="olive">
                                                               <input type="checkbox" id="r5" name ="hardik[]" value="914" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOlives.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Olives</span>
                                                       </div>      

                                                       <div id="onion">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="915" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOnion.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Onion</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paneer">
                                                               <input type="checkbox" id="r7" name ="hardik[]" value="916" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaneer.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paneer</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paparika">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="917" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaparika.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paparika</span>
                                                       </div>      
                                                 

                                                   
                                                   <div id="prev" onclick="loadprev('vscrust1','vstopping1');">
                                                       << Previous
                                                   </div>
                                           
                                                    <div id="next" onclick="loadnext('vsqty1','vstopping1');">
                                                          Next >>
                                                      </div>
                                                   
                                               </div>
                                                        
                                   </div>
                                   <div class="svqty" id="vsqty1">
                                        <span class ="crust " id="svspan">
                                                    Choose Quantity & Size
                                        </span>
                                       <label for="quantity">Quantity : </label>
                                       <select name="quantity" >
                                            <option value="1">&nbsp;&nbsp;&nbsp; 1</option>
                                            <option value="2">&nbsp;&nbsp;&nbsp; 2</option>
                                            <option value="3">&nbsp;&nbsp;&nbsp; 3</option>
                                            <option value="4">&nbsp;&nbsp;&nbsp; 4</option>
                                            <option value="5">&nbsp;&nbsp;&nbsp; 5</option>
                                            <option value="6">&nbsp;&nbsp;&nbsp; 6</option>
                                            <option value="7">&nbsp;&nbsp;&nbsp; 7</option>
                                            <option value="8">&nbsp;&nbsp;&nbsp; 8</option>
                                            <option value="9">&nbsp;&nbsp;&nbsp; 9</option>
                                            <option value="10">&nbsp;&nbsp;&nbsp; 10</option>
                                       </select>
                                       <span id="size">Size : </span>
                                       
                                       <span class="size" id="small"  > <input type="radio" name="size" value="small" checked="true" /> Small</span>
                                       
                                       <span class="size" id="medium"> <input type="radio" name="size" value="medium"/> Medium</span>
                                       
                                       <span class="size" id="large"> <input type="radio" name="size" value="large"/> Large</span>

                                       <div id="prev" onclick="loadprev('vstopping1','vsqty1');" >
                                            << Previous
                                        </div>
                                        <input type="submit" id="addcart" value="Add to Cart" name="submit6" />
                                       
                                   </div>
                                 </form>
                               </div>
                               
                           </div>
                        
                        <div id="vegspcl2">
                               <div class="titlecss" id="titlevs">
                                   V E G  &nbsp;  S P E C I A L
                               </div>
                              
                               <div id="sv1">
                                   <img id="sv1pic" src="images/home/mexgreen.jpg"/>
                                   <span id="pizzadesc">
                                     Mexican Green Wave <br/>
                                     S:₹200 M:₹380 L:₹565 <br/>
                                     Onion | Crisp Capsicum | Fresh Tomato | Jalepeno Sprinkled With Exotic Mexican Herb

                                   </span>
                                   <div id="verticalline">
                               
                                   </div>
                                   <form action="home.php" method="post">
                                   <div class="svcrust" id="vscrust2">
                                               <span class ="crust " id="svspan">
                                                   Choose Your Crust 
                                               </span>
                                               <div id="crustmenu">
                                                  

                                                       <div id="cht">
                                                           <input type="radio"  id="r1" name ="check" value="Classic Hand Tossed" class="inputrad" checked="true"  />                                                
                                                                       <img src="images/home/classic-hand-tossed.png" class="ptype"/>
                                                                       <span class="ptypedesc">Classic Hand Tossed</span>
                                                       </div>

                                                       <div id="cb">               
                                                               <input type="radio" id="r2" name ="check" value="Cheese Burst" class="inputrad"/>                                                
                                                                       <img src="images/home/cheese-burst.png" class="ptype"/>
                                                                       <span class="ptypedesc">Cheese Burst</span>
                                                       </div>               

                                                       <div id="ic">               
                                                               <input type="radio"  id="r3" name ="check" value="Italian Crust" class="inputrad" />                                                
                                                                       <img src="images/home/italian-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Italian Crust</span>
                                                       </div>

                                                       <div id="fpp">
                                                               <input type="radio" id="r4" name ="check" value="Fresh Pan Pizza" class="inputrad" />                                                
                                                                       <img src="images/home/fresh-pan-pizza.png" class="ptype"/>
                                                                       <span class="ptypedesc">Fresh Pan Pizza</span>
                                                       </div> 

                                                       <div id="wtc">
                                                               <input type="radio" id="r5" name ="check" value="Wheat Thin Crust" class="inputrad"  />                                                
                                                                       <img src="images/home/wheat-thin-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Wheat Thin Crust</span>
                                                       </div>      

                                                   

                                                  
                                                   <div id="next" onclick="loadnext('vstopping2','vscrust2');">
                                                          Next >>
                                                      </div>
                                                  
                                               </div>
                                               
                                   </div>
                                   <div class="svtopping" id="vstopping2">
                                           <span class ="crust " id="svspan">
                                                   Choose Extra Toppings 
                                               </span>
                                               <div id="toppingsmenu">
                                                   

                                                       <div id="tomato">
                                                           <input type="checkbox"  id="r1" name ="hardik[]" value="910" class="inputrad"  />                                                
                                                           <img src="images/home/toppingsTomato.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Tomato</span>
                                                       </div>

                                                       <div id="corn">               
                                                               <input type="checkbox" id="r2" name ="hardik[]" value="911" class="inputrad" />                                                
                                                               <img src="images/home/toppingsGoldenCorn.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Golden Corn</span>
                                                       </div>               

                                                       <div id="capsi">               
                                                               <input type="checkbox"  id="r3" name ="hardik[]" value="912" class="inputrad" />                                                
                                                               <img src="images/home/toppingsCapsicum.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Capsicum</span>
                                                       </div>

                                                       <div id="mushroom">
                                                               <input type="checkbox" id="r4" name ="hardik[]" value="913" class="inputrad" />                                                
                                                               <img src="images/home/toppingsMushroom.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Mushroom</span>
                                                       </div> 

                                                       <div id="olive">
                                                               <input type="checkbox" id="r5" name ="hardik[]" value="914" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOlives.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Olives</span>
                                                       </div>      

                                                       <div id="onion">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="915" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOnion.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Onion</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paneer">
                                                               <input type="checkbox" id="r7" name ="hardik[]" value="916" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaneer.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paneer</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paparika">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="917" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaparika.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paparika</span>
                                                       </div>      
                                                 

                                                   
                                                   <div id="prev" onclick="loadprev('vscrust2','vstopping2');">
                                                       << Previous
                                                   </div>
                                           
                                                    <div id="next" onclick="loadnext('vsqty2','vstopping2');">
                                                          Next >>
                                                      </div>
                                                   
                                               </div>
                                                        
                                   </div>
                                   <div class="svqty" id="vsqty2">
                                        <span class ="crust " id="svspan">
                                        Choose Quantity & Size
                                        </span>
                                       <label for="quantity">Quantity : </label>
                                       <select name="quantity" >
                                            <option value="1">&nbsp;&nbsp;&nbsp; 1</option>
                                            <option value="2">&nbsp;&nbsp;&nbsp; 2</option>
                                            <option value="3">&nbsp;&nbsp;&nbsp; 3</option>
                                            <option value="4">&nbsp;&nbsp;&nbsp; 4</option>
                                            <option value="5">&nbsp;&nbsp;&nbsp; 5</option>
                                            <option value="6">&nbsp;&nbsp;&nbsp; 6</option>
                                            <option value="7">&nbsp;&nbsp;&nbsp; 7</option>
                                            <option value="8">&nbsp;&nbsp;&nbsp; 8</option>
                                            <option value="9">&nbsp;&nbsp;&nbsp; 9</option>
                                            <option value="10">&nbsp;&nbsp;&nbsp; 10</option>
                                       </select>
                                       <span id="size">Size : </span>
                                       
                                       <span class="size" id="small"  > <input type="radio" name="size" value="small" checked="true" /> Small</span>
                                       
                                       <span class="size" id="medium"> <input type="radio" name="size" value="medium"/> Medium</span>
                                       
                                       <span class="size" id="large"> <input type="radio" name="size" value="large"/> Large</span>

                                       <div id="prev" onclick="loadprev('vstopping2','vsqty2');" >
                                            << Previous
                                        </div>
                                        <input type="submit" id="addcart" value="Add to Cart" name="submit7" />
                                       
                                   </div>
                                 </form>
                               </div>
                               
                           </div>
                        
                        <div id="vegspcl3">
                               <div class="titlecss" id="titlevs">
                                   V E G  &nbsp;  S P E C I A L
                               </div>
                              
                               <div id="sv1">
                                   <img id="sv1pic" src="images/home/deluxeveg.jpg"/>
                                   <span id="pizzadesc">
                                     Deluxe Veggie <br/>
                                     S:₹200 M:₹380 L:₹565 <br/>
                                     Onion | Crisp Capsicum | Golden Corn | Paneer

                                   </span>
                                   <div id="verticalline">
                               
                                   </div>
                                   <form action="home.php" method="post">
                                   <div class="svcrust" id="vscrust3">
                                               <span class ="crust " id="svspan">
                                                   Choose Your Crust 
                                               </span>
                                               <div id="crustmenu">
                                                  

                                                       <div id="cht">
                                                           <input type="radio"  id="r1" name ="check" value="Classic Hand Tossed" class="inputrad" checked="true"  />                                                
                                                                       <img src="images/home/classic-hand-tossed.png" class="ptype"/>
                                                                       <span class="ptypedesc">Classic Hand Tossed</span>
                                                       </div>

                                                       <div id="cb">               
                                                               <input type="radio" id="r2" name ="check" value="Cheese Burst" class="inputrad"/>                                                
                                                                       <img src="images/home/cheese-burst.png" class="ptype"/>
                                                                       <span class="ptypedesc">Cheese Burst</span>
                                                       </div>               

                                                       <div id="ic">               
                                                               <input type="radio"  id="r3" name ="check" value="Italian Crust" class="inputrad" />                                                
                                                                       <img src="images/home/italian-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Italian Crust</span>
                                                       </div>

                                                       <div id="fpp">
                                                               <input type="radio" id="r4" name ="check" value="Fresh Pan Pizza" class="inputrad" />                                                
                                                                       <img src="images/home/fresh-pan-pizza.png" class="ptype"/>
                                                                       <span class="ptypedesc">Fresh Pan Pizza</span>
                                                       </div> 

                                                       <div id="wtc">
                                                               <input type="radio" id="r5" name ="check" value="Wheat Thin Crust" class="inputrad"  />                                                
                                                                       <img src="images/home/wheat-thin-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Wheat Thin Crust</span>
                                                       </div>      

                                                   

                                                  
                                                   <div id="next" onclick="loadnext('vstopping3','vscrust3');">
                                                          Next >>
                                                      </div>
                                                  
                                               </div>
                                               
                                   </div>
                                   <div class="svtopping" id="vstopping3">
                                           <span class ="crust " id="svspan">
                                                   Choose Extra Toppings 
                                               </span>
                                               <div id="toppingsmenu">
                                                   

                                                       <div id="tomato">
                                                           <input type="checkbox"  id="r1" name ="hardik[]" value="910" class="inputrad"  />                                                
                                                           <img src="images/home/toppingsTomato.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Tomato</span>
                                                       </div>

                                                       <div id="corn">               
                                                               <input type="checkbox" id="r2" name ="hardik[]" value="911" class="inputrad" />                                                
                                                               <img src="images/home/toppingsGoldenCorn.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Golden Corn</span>
                                                       </div>               

                                                       <div id="capsi">               
                                                               <input type="checkbox"  id="r3" name ="hardik[]" value="912" class="inputrad" />                                                
                                                               <img src="images/home/toppingsCapsicum.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Capsicum</span>
                                                       </div>

                                                       <div id="mushroom">
                                                               <input type="checkbox" id="r4" name ="hardik[]" value="913" class="inputrad" />                                                
                                                               <img src="images/home/toppingsMushroom.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Mushroom</span>
                                                       </div> 

                                                       <div id="olive">
                                                               <input type="checkbox" id="r5" name ="hardik[]" value="914" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOlives.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Olives</span>
                                                       </div>      

                                                       <div id="onion">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="915" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOnion.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Onion</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paneer">
                                                               <input type="checkbox" id="r7" name ="hardik[]" value="916" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaneer.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paneer</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paparika">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="917" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaparika.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paparika</span>
                                                       </div>      
                                                 

                                                   
                                                   <div id="prev" onclick="loadprev('vscrust3','vstopping3');">
                                                       << Previous
                                                   </div>
                                           
                                                    <div id="next" onclick="loadnext('vsqty3','vstopping3');">
                                                          Next >>
                                                      </div>
                                                   
                                               </div>
                                                        
                                   </div>
                                   <div class="svqty" id="vsqty3">
                                        <span class ="crust " id="svspan">
                                                   Choose Quantity & Size 
                                        </span>
                                        
                                        <label for="quantity">Quantity : </label>
                                       <select name="quantity" >
                                            <option value="1">&nbsp;&nbsp;&nbsp; 1</option>
                                            <option value="2">&nbsp;&nbsp;&nbsp; 2</option>
                                            <option value="3">&nbsp;&nbsp;&nbsp; 3</option>
                                            <option value="4">&nbsp;&nbsp;&nbsp; 4</option>
                                            <option value="5">&nbsp;&nbsp;&nbsp; 5</option>
                                            <option value="6">&nbsp;&nbsp;&nbsp; 6</option>
                                            <option value="7">&nbsp;&nbsp;&nbsp; 7</option>
                                            <option value="8">&nbsp;&nbsp;&nbsp; 8</option>
                                            <option value="9">&nbsp;&nbsp;&nbsp; 9</option>
                                            <option value="10">&nbsp;&nbsp;&nbsp; 10</option>
                                       </select>
                                       <span id="size">Size : </span>
                                       
                                       <span class="size" id="small"  > <input type="radio" name="size" value="small" checked="true" /> Small</span>
                                       
                                       <span class="size" id="medium"> <input type="radio" name="size" value="medium"/> Medium</span>
                                       
                                       <span class="size" id="large"> <input type="radio" name="size" value="large"/> Large</span>

                                       <div id="prev" onclick="loadprev('vstopping3','vsqty3');" >
                                            << Previous
                                        </div>
                                        <input type="submit" id="addcart" value="Add to Cart" name="submit8" />
                                       
                                   </div>
                                 </form>
                               </div>
                               
                           </div>
                        
                         <div id="vegspcl4">
                               <div class="titlecss" id="titlevs">
                                   V E G  &nbsp;  S P E C I A L
                               </div>
                              
                               <div id="sv1">
                                   <img id="sv1pic" src="images/home/five-peppers.png"/>
                                   <span id="pizzadesc">
                                     5 Pepper <br/>
                                     S:₹200 M:₹380 L:₹565 <br/>
                                     Capsicum | Red And Yellow Bell Pepper | Red Paprika

                                   </span>
                                   <div id="verticalline">
                               
                                   </div>
                                   <form action="home.php" method="post">
                                   <div class="svcrust" id="vscrust4">
                                               <span class ="crust " id="svspan">
                                                   Choose Your Crust 
                                               </span>
                                               <div id="crustmenu">
                                                  

                                                       <div id="cht">
                                                           <input type="radio"  id="r1" name ="check" value="Classic Hand Tossed" class="inputrad" checked="true"  />                                                
                                                                       <img src="images/home/classic-hand-tossed.png" class="ptype"/>
                                                                       <span class="ptypedesc">Classic Hand Tossed</span>
                                                       </div>

                                                       <div id="cb">               
                                                               <input type="radio" id="r2" name ="check" value="Cheese Burst" class="inputrad"/>                                                
                                                                       <img src="images/home/cheese-burst.png" class="ptype"/>
                                                                       <span class="ptypedesc">Cheese Burst</span>
                                                       </div>               

                                                       <div id="ic">               
                                                               <input type="radio"  id="r3" name ="check" value="Italian Crust" class="inputrad" />                                                
                                                                       <img src="images/home/italian-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Italian Crust</span>
                                                       </div>

                                                       <div id="fpp">
                                                               <input type="radio" id="r4" name ="check" value="Fresh Pan Pizza" class="inputrad" />                                                
                                                                       <img src="images/home/fresh-pan-pizza.png" class="ptype"/>
                                                                       <span class="ptypedesc">Fresh Pan Pizza</span>
                                                       </div> 

                                                       <div id="wtc">
                                                               <input type="radio" id="r5" name ="check" value="Wheat Thin Crust" class="inputrad"  />                                                
                                                                       <img src="images/home/wheat-thin-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Wheat Thin Crust</span>
                                                       </div>      

                                                   

                                                  
                                                   <div id="next" onclick="loadnext('vstopping4','vscrust4');">
                                                          Next >>
                                                      </div>
                                                  
                                               </div>
                                               
                                   </div>
                                   <div class="svtopping"id="vstopping4">
                                           <span class ="crust " id="svspan">
                                                   Choose Extra Toppings 
                                               </span>
                                               <div id="toppingsmenu">
                                                   

                                                       <div id="tomato">
                                                           <input type="checkbox"  id="r1" name ="hardik[]" value="910" class="inputrad"  />                                                
                                                           <img src="images/home/toppingsTomato.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Tomato</span>
                                                       </div>

                                                       <div id="corn">               
                                                               <input type="checkbox" id="r2" name ="hardik[]" value="911" class="inputrad" />                                                
                                                               <img src="images/home/toppingsGoldenCorn.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Golden Corn</span>
                                                       </div>               

                                                       <div id="capsi">               
                                                               <input type="checkbox"  id="r3" name ="hardik[]" value="912" class="inputrad" />                                                
                                                               <img src="images/home/toppingsCapsicum.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Capsicum</span>
                                                       </div>

                                                       <div id="mushroom">
                                                               <input type="checkbox" id="r4" name ="hardik[]" value="913" class="inputrad" />                                                
                                                               <img src="images/home/toppingsMushroom.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Mushroom</span>
                                                       </div> 

                                                       <div id="olive">
                                                               <input type="checkbox" id="r5" name ="hardik[]" value="914" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOlives.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Olives</span>
                                                       </div>      

                                                       <div id="onion">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="915" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOnion.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Onion</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paneer">
                                                               <input type="checkbox" id="r7" name ="hardik[]" value="916" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaneer.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paneer</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paparika">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="917" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaparika.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paparika</span>
                                                       </div>      
                                                 

                                                   
                                                   <div id="prev" onclick="loadprev('vscrust4','vstopping4');">
                                                       << Previous
                                                   </div>
                                           
                                                    <div id="next" onclick="loadnext('vsqty4','vstopping4');">
                                                          Next >>
                                                      </div>
                                                   
                                               </div>
                                                        
                                   </div>
                                   <div class="svqty" id="vsqty4">
                                        <span class ="crust " id="svspan">
                                                  Choose Quantity & Size
                                        </span>
                                       <label for="quantity">Quantity : </label>
                                       <select name="quantity" >
                                            <option value="1">&nbsp;&nbsp;&nbsp; 1</option>
                                            <option value="2">&nbsp;&nbsp;&nbsp; 2</option>
                                            <option value="3">&nbsp;&nbsp;&nbsp; 3</option>
                                            <option value="4">&nbsp;&nbsp;&nbsp; 4</option>
                                            <option value="5">&nbsp;&nbsp;&nbsp; 5</option>
                                            <option value="6">&nbsp;&nbsp;&nbsp; 6</option>
                                            <option value="7">&nbsp;&nbsp;&nbsp; 7</option>
                                            <option value="8">&nbsp;&nbsp;&nbsp; 8</option>
                                            <option value="9">&nbsp;&nbsp;&nbsp; 9</option>
                                            <option value="10">&nbsp;&nbsp;&nbsp; 10</option>
                                       </select>
                                       <span id="size">Size : </span>
                                       
                                       <span class="size" id="small"  > <input type="radio" name="size" value="small" checked="true" /> Small</span>
                                       
                                       <span class="size" id="medium"> <input type="radio" name="size" value="medium"/> Medium</span>
                                       
                                       <span class="size" id="large"> <input type="radio" name="size" value="large"/> Large</span>

                                       <div id="prev" onclick="loadprev('vstopping4','vsqty4');" >
                                            << Previous
                                        </div>
                                        <input type="submit" id="addcart" value="Add to Cart" name="submit9" />
                                       
                                   </div>
                                 </form>
                               </div>
                               
                           </div>
                        
                          <div id="vegspcl5">
                               <div class="titlecss" id="titlevs">
                                   V E G  &nbsp;  S P E C I A L
                               </div>
                              
                               <div id="sv1">
                                   <img id="sv1pic" src="images/home/VeggieParadise.jpg"/>
                                   <span id="pizzadesc">
                                     Veggie Paradise <br/>
                                     S:₹200 M:₹380 L:₹565 <br/>
                                     Babycorn | Black Olives | Crisp Capsicum | Red Paprika

                                   </span>
                                   <div id="verticalline">
                               
                                   </div>
                                   <form action="home.php" method="post">
                                   <div class="svcrust" id="vscrust5">
                                               <span class ="crust " id="svspan">
                                                   Choose Your Crust 
                                               </span>
                                               <div id="crustmenu">
                                                  

                                                       <div id="cht">
                                                           <input type="radio"  id="r1" name ="check" value="Classic Hand Tossed" class="inputrad" checked="true"  />                                                
                                                                       <img src="images/home/classic-hand-tossed.png" class="ptype"/>
                                                                       <span class="ptypedesc">Classic Hand Tossed</span>
                                                       </div>

                                                       <div id="cb">               
                                                               <input type="radio" id="r2" name ="check" value="Cheese Burst" class="inputrad"/>                                                
                                                                       <img src="images/home/cheese-burst.png" class="ptype"/>
                                                                       <span class="ptypedesc">Cheese Burst</span>
                                                       </div>               

                                                       <div id="ic">               
                                                               <input type="radio"  id="r3" name ="check" value="Italian Crust" class="inputrad" />                                                
                                                                       <img src="images/home/italian-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Italian Crust</span>
                                                       </div>

                                                       <div id="fpp">
                                                               <input type="radio" id="r4" name ="check" value="Fresh Pan Pizza" class="inputrad" />                                                
                                                                       <img src="images/home/fresh-pan-pizza.png" class="ptype"/>
                                                                       <span class="ptypedesc">Fresh Pan Pizza</span>
                                                       </div> 

                                                       <div id="wtc">
                                                               <input type="radio" id="r5" name ="check" value="Wheat Thin Crust" class="inputrad"  />                                                
                                                                       <img src="images/home/wheat-thin-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Wheat Thin Crust</span>
                                                       </div>      

                                                   

                                                  
                                                   <div id="next" onclick="loadnext('vstopping5','vscrust5');">
                                                          Next >>
                                                      </div>
                                                  
                                               </div>
                                               
                                   </div>
                                   <div class="svtopping" id="vstopping5">
                                           <span class ="crust " id="svspan">
                                                   Choose Extra Toppings 
                                               </span>
                                               <div id="toppingsmenu">
                                                   

                                                       <div id="tomato">
                                                           <input type="checkbox"  id="r1" name ="hardik[]" value="910" class="inputrad"  />                                                
                                                           <img src="images/home/toppingsTomato.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Tomato</span>
                                                       </div>

                                                       <div id="corn">               
                                                               <input type="checkbox" id="r2" name ="hardik[]" value="911" class="inputrad" />                                                
                                                               <img src="images/home/toppingsGoldenCorn.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Golden Corn</span>
                                                       </div>               

                                                       <div id="capsi">               
                                                               <input type="checkbox"  id="r3" name ="hardik[]" value="912" class="inputrad" />                                                
                                                               <img src="images/home/toppingsCapsicum.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Capsicum</span>
                                                       </div>

                                                       <div id="mushroom">
                                                               <input type="checkbox" id="r4" name ="hardik[]" value="913" class="inputrad" />                                                
                                                               <img src="images/home/toppingsMushroom.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Mushroom</span>
                                                       </div> 

                                                       <div id="olive">
                                                               <input type="checkbox" id="r5" name ="hardik[]" value="914" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOlives.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Olives</span>
                                                       </div>      

                                                       <div id="onion">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="915" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOnion.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Onion</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paneer">
                                                               <input type="checkbox" id="r7" name ="hardik[]" value="916" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaneer.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paneer</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paparika">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="917" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaparika.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paparika</span>
                                                       </div>      
                                                 

                                                   
                                                   <div id="prev" onclick="loadprev('vscrust5','vstopping5');">
                                                       << Previous
                                                   </div>
                                           
                                                    <div id="next" onclick="loadnext('vsqty5','vstopping5');">
                                                          Next >>
                                                      </div>
                                                   
                                               </div>
                                                        
                                   </div>
                                   <div class="svqty" id="vsqty5">
                                        <span class ="crust " id="svspan">
                                                  Choose Quantity & Size
                                        </span>
                                       <label for="quantity">Quantity : </label>
                                       <select name="quantity" >
                                            <option value="1">&nbsp;&nbsp;&nbsp; 1</option>
                                            <option value="2">&nbsp;&nbsp;&nbsp; 2</option>
                                            <option value="3">&nbsp;&nbsp;&nbsp; 3</option>
                                            <option value="4">&nbsp;&nbsp;&nbsp; 4</option>
                                            <option value="5">&nbsp;&nbsp;&nbsp; 5</option>
                                            <option value="6">&nbsp;&nbsp;&nbsp; 6</option>
                                            <option value="7">&nbsp;&nbsp;&nbsp; 7</option>
                                            <option value="8">&nbsp;&nbsp;&nbsp; 8</option>
                                            <option value="9">&nbsp;&nbsp;&nbsp; 9</option>
                                            <option value="10">&nbsp;&nbsp;&nbsp; 10</option>
                                       </select>
                                       <span id="size">Size : </span>
                                       
                                       <span class="size" id="small"  > <input type="radio" name="size" value="small" checked="true" /> Small</span>
                                       
                                       <span class="size" id="medium"> <input type="radio" name="size" value="medium"/> Medium</span>
                                       
                                       <span class="size" id="large"> <input type="radio" name="size" value="large"/> Large</span>

                                       <div id="prev" onclick="loadprev('vstopping5','vsqty5');" >
                                            << Previous
                                        </div>
                                        <input type="submit" id="addcart" value="Add to Cart" name="submit10" />
                                       
                                   </div>
                                 </form>
                               </div>
                               
                           </div>
                        
                        <div id="exotic1">
                               <div class="titlecss" id="titleex">
                                    EXOTIC &nbsp; ITALIAN &nbsp; VEG
                                   
                               </div>
                              
                               <div id="sv1">
                                   <img id="sv1pic" src="images/home/MilanVeg1.jpg"/>
                                   <span id="pizzadesc">
                                     Milan Veg Fantasy<br/>
                                     S:₹220 M:₹370 L:₹595 <br/>
                                     Green  | Yellow Zucchini | Jalapeno  

                                   </span>
                                   <div id="verticalline">
                               
                                   </div>
                                   <form action="home.php" method="post">
                                   <div class="svcrust" id="excrust1">
                                               <span class ="crust " id="svspan">
                                                   Choose Your Crust 
                                               </span>
                                               <div id="crustmenu">
                                                  

                                                       <div id="cht">
                                                           <input type="radio"  id="r1" name ="check" value="Classic Hand Tossed" class="inputrad" checked="true"  />                                                
                                                                       <img src="images/home/classic-hand-tossed.png" class="ptype"/>
                                                                       <span class="ptypedesc">Classic Hand Tossed</span>
                                                       </div>

                                                       <div id="cb">               
                                                               <input type="radio" id="r2" name ="check" value="Cheese Burst" class="inputrad"/>                                                
                                                                       <img src="images/home/cheese-burst.png" class="ptype"/>
                                                                       <span class="ptypedesc">Cheese Burst</span>
                                                       </div>               

                                                       <div id="ic">               
                                                               <input type="radio"  id="r3" name ="check" value="Italian Crust" class="inputrad" />                                                
                                                                       <img src="images/home/italian-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Italian Crust</span>
                                                       </div>

                                                       <div id="fpp">
                                                               <input type="radio" id="r4" name ="check" value="Fresh Pan Pizza" class="inputrad" />                                                
                                                                       <img src="images/home/fresh-pan-pizza.png" class="ptype"/>
                                                                       <span class="ptypedesc">Fresh Pan Pizza</span>
                                                       </div> 

                                                       <div id="wtc">
                                                               <input type="radio" id="r5" name ="check" value="Wheat Thin Crust" class="inputrad"  />                                                
                                                                       <img src="images/home/wheat-thin-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Wheat Thin Crust</span>
                                                       </div>      

                                                   

                                                  
                                                   <div id="next" onclick="loadnext('extopping1','excrust1');">
                                                          Next >>
                                                      </div>
                                                  
                                               </div>
                                               
                                   </div>
                                   <div class="svtopping" id="extopping1">
                                           <span class ="crust " id="svspan">
                                                   Choose Extra Toppings 
                                               </span>
                                               <div id="toppingsmenu">
                                                   

                                                       <div id="tomato">
                                                           <input type="checkbox"  id="r1" name ="hardik[]" value="910" class="inputrad"  />                                                
                                                           <img src="images/home/toppingsTomato.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Tomato</span>
                                                       </div>

                                                       <div id="corn">               
                                                               <input type="checkbox" id="r2" name ="hardik[]" value="911" class="inputrad" />                                                
                                                               <img src="images/home/toppingsGoldenCorn.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Golden Corn</span>
                                                       </div>               

                                                       <div id="capsi">               
                                                               <input type="checkbox"  id="r3" name ="hardik[]" value="912" class="inputrad" />                                                
                                                               <img src="images/home/toppingsCapsicum.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Capsicum</span>
                                                       </div>

                                                       <div id="mushroom">
                                                               <input type="checkbox" id="r4" name ="hardik[]" value="913" class="inputrad" />                                                
                                                               <img src="images/home/toppingsMushroom.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Mushroom</span>
                                                       </div> 

                                                       <div id="olive">
                                                               <input type="checkbox" id="r5" name ="hardik[]" value="914" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOlives.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Olives</span>
                                                       </div>      

                                                       <div id="onion">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="915" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOnion.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Onion</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paneer">
                                                               <input type="checkbox" id="r7" name ="hardik[]" value="916" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaneer.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paneer</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paparika">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="917" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaparika.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paparika</span>
                                                       </div>      
                                                 

                                                   
                                                   <div id="prev" onclick="loadprev('excrust1','extopping1');">
                                                       << Previous
                                                   </div>
                                           
                                                    <div id="next" onclick="loadnext('exqty1','extopping1');">
                                                          Next >>
                                                      </div>
                                                   
                                               </div>
                                                        
                                   </div>
                                   <div class="svqty" id="exqty1">
                                        <span class ="crust " id="svspan">
                                                  Choose Quantity & Size
                                        </span>
                                       <label for="quantity">Quantity : </label>
                                       <select name="quantity" >
                                            <option value="1">&nbsp;&nbsp;&nbsp; 1</option>
                                            <option value="2">&nbsp;&nbsp;&nbsp; 2</option>
                                            <option value="3">&nbsp;&nbsp;&nbsp; 3</option>
                                            <option value="4">&nbsp;&nbsp;&nbsp; 4</option>
                                            <option value="5">&nbsp;&nbsp;&nbsp; 5</option>
                                            <option value="6">&nbsp;&nbsp;&nbsp; 6</option>
                                            <option value="7">&nbsp;&nbsp;&nbsp; 7</option>
                                            <option value="8">&nbsp;&nbsp;&nbsp; 8</option>
                                            <option value="9">&nbsp;&nbsp;&nbsp; 9</option>
                                            <option value="10">&nbsp;&nbsp;&nbsp; 10</option>
                                       </select>
                                       <span id="size">Size : </span>
                                       
                                       <span class="size" id="small"  > <input type="radio" name="size" value="small" checked="true" /> Small</span>
                                       
                                       <span class="size" id="medium"> <input type="radio" name="size" value="medium"/> Medium</span>
                                       
                                       <span class="size" id="large"> <input type="radio" name="size" value="large"/> Large</span>

                                       <div id="prev" onclick="loadprev('extopping1','exqty1');" >
                                            << Previous
                                        </div>
                                        <input type="submit" id="addcart" value="Add to Cart" name="submit11" />
                                       
                                   </div>
                                 </form>
                               </div>
                               
                           </div>
                        
                        <div id="exotic2">
                               <div class="titlecss" id="titleex">
                                    EXOTIC &nbsp; ITALIAN &nbsp; VEG
                               </div>
                              
                               <div id="sv1">
                                   <img id="sv1pic" src="images/home/ExoticMain.jpg"/>
                                   <span id="pizzadesc">
                                     Roman Veg Supreme<br/>
                                     S:₹220 M:₹370 L:₹595 <br/>
                                     Babycorn | Black Olives| Red Paprika | Broccoli 

                                   </span>
                                   <div id="verticalline">
                               
                                   </div>
                                   <form action="home.php" method="post">
                                   <div class="svcrust" id="excrust2">
                                               <span class ="crust " id="svspan">
                                                   Choose Your Crust 
                                               </span>
                                               <div id="crustmenu">
                                                  

                                                       <div id="cht">
                                                           <input type="radio"  id="r1" name ="check" value="Classic Hand Tossed" class="inputrad" checked="true"  />                                                
                                                                       <img src="images/home/classic-hand-tossed.png" class="ptype"/>
                                                                       <span class="ptypedesc">Classic Hand Tossed</span>
                                                       </div>

                                                       <div id="cb">               
                                                               <input type="radio" id="r2" name ="check" value="Cheese Burst" class="inputrad"/>                                                
                                                                       <img src="images/home/cheese-burst.png" class="ptype"/>
                                                                       <span class="ptypedesc">Cheese Burst</span>
                                                       </div>               

                                                       <div id="ic">               
                                                               <input type="radio"  id="r3" name ="check" value="Italian Crust" class="inputrad" />                                                
                                                                       <img src="images/home/italian-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Italian Crust</span>
                                                       </div>

                                                       <div id="fpp">
                                                               <input type="radio" id="r4" name ="check" value="Fresh Pan Pizza" class="inputrad" />                                                
                                                                       <img src="images/home/fresh-pan-pizza.png" class="ptype"/>
                                                                       <span class="ptypedesc">Fresh Pan Pizza</span>
                                                       </div> 

                                                       <div id="wtc">
                                                               <input type="radio" id="r5" name ="check" value="Wheat Thin Crust" class="inputrad"  />                                                
                                                                       <img src="images/home/wheat-thin-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Wheat Thin Crust</span>
                                                       </div>      

                                                   

                                                  
                                                   <div id="next" onclick="loadnext('extopping2','excrust2');">
                                                          Next >>
                                                      </div>
                                                  
                                               </div>
                                               
                                   </div>
                                   <div class="svtopping" id="extopping2">
                                           <span class ="crust " id="svspan">
                                                   Choose Extra Toppings 
                                               </span>
                                               <div id="toppingsmenu">
                                                   

                                                       <div id="tomato">
                                                           <input type="checkbox"  id="r1" name ="hardik[]" value="910" class="inputrad"  />                                                
                                                           <img src="images/home/toppingsTomato.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Tomato</span>
                                                       </div>

                                                       <div id="corn">               
                                                               <input type="checkbox" id="r2" name ="hardik[]" value="911" class="inputrad" />                                                
                                                               <img src="images/home/toppingsGoldenCorn.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Golden Corn</span>
                                                       </div>               

                                                       <div id="capsi">               
                                                               <input type="checkbox"  id="r3" name ="hardik[]" value="912" class="inputrad" />                                                
                                                               <img src="images/home/toppingsCapsicum.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Capsicum</span>
                                                       </div>

                                                       <div id="mushroom">
                                                               <input type="checkbox" id="r4" name ="hardik[]" value="913" class="inputrad" />                                                
                                                               <img src="images/home/toppingsMushroom.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Mushroom</span>
                                                       </div> 

                                                       <div id="olive">
                                                               <input type="checkbox" id="r5" name ="hardik[]" value="914" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOlives.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Olives</span>
                                                       </div>      

                                                       <div id="onion">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="915" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOnion.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Onion</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paneer">
                                                               <input type="checkbox" id="r7" name ="hardik[]" value="916" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaneer.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paneer</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paparika">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="917" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaparika.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paparika</span>
                                                       </div>      
                                                 

                                                   
                                                   <div id="prev" onclick="loadprev('excrust2','extopping2');">
                                                       << Previous
                                                   </div>
                                           
                                                    <div id="next" onclick="loadnext('exqty2','extopping2');">
                                                          Next >>
                                                      </div>
                                                   
                                               </div>
                                                        
                                   </div>
                                   <div class="svqty" id="exqty2">
                                        <span class ="crust " id="svspan">
                                                   Choose Quantity & Size
                                        </span>
                                       <label for="quantity">Quantity : </label>
                                       <select name="quantity" >
                                            <option value="1">&nbsp;&nbsp;&nbsp; 1</option>
                                            <option value="2">&nbsp;&nbsp;&nbsp; 2</option>
                                            <option value="3">&nbsp;&nbsp;&nbsp; 3</option>
                                            <option value="4">&nbsp;&nbsp;&nbsp; 4</option>
                                            <option value="5">&nbsp;&nbsp;&nbsp; 5</option>
                                            <option value="6">&nbsp;&nbsp;&nbsp; 6</option>
                                            <option value="7">&nbsp;&nbsp;&nbsp; 7</option>
                                            <option value="8">&nbsp;&nbsp;&nbsp; 8</option>
                                            <option value="9">&nbsp;&nbsp;&nbsp; 9</option>
                                            <option value="10">&nbsp;&nbsp;&nbsp; 10</option>
                                       </select>
                                       <span id="size">Size : </span>
                                       
                                       <span class="size" id="small"  > <input type="radio" name="size" value="small" checked="true" /> Small</span>
                                       
                                       <span class="size" id="medium"> <input type="radio" name="size" value="medium"/> Medium</span>
                                       
                                       <span class="size" id="large"> <input type="radio" name="size" value="large"/> Large</span>

                                       <div id="prev" onclick="loadprev('extopping2','exqty2');" >
                                            << Previous
                                        </div>
                                        <input type="submit" id="addcart" value="Add to Cart" name="submit12" />
                                       
                                   </div>
                                 </form>
                               </div>
                               
                           </div>
                        
                        <div id="feastpizza1">
                               <div class="titlecss" id="titlefp">
                                   F E A S T  &nbsp;  P I Z Z A
                               </div>
                              
                               <div id="sv1">
                                   <img id="sv1pic" src="images/home/vegextra.jpg"/>
                                   <span id="pizzadesc">
                                     Veg Extravaganza<br/>
                                     S:₹240 M:₹435 L:₹635 <br/>
                                     Black Olives| Onion | Crisp Capsicum | Mushroom | Fresh Tomato | Golden Corn | Jalepeno

                                   </span>
                                   <div id="verticalline">
                               
                                   </div>
                                   <form action="home.php" method="post">
                                   <div class="svcrust"  id="fpcrust1">
                                               <span class ="crust " id="svspan">
                                                   Choose Your Crust 
                                               </span>
                                               <div id="crustmenu">
                                                  

                                                       <div id="cht">
                                                           <input type="radio"  id="r1" name ="check" value="Classic Hand Tossed" class="inputrad" checked="true"  />                                                
                                                                       <img src="images/home/classic-hand-tossed.png" class="ptype"/>
                                                                       <span class="ptypedesc">Classic Hand Tossed</span>
                                                       </div>

                                                       <div id="cb">               
                                                               <input type="radio" id="r2" name ="check" value="Cheese Burst" class="inputrad"/>                                                
                                                                       <img src="images/home/cheese-burst.png" class="ptype"/>
                                                                       <span class="ptypedesc">Cheese Burst</span>
                                                       </div>               

                                                       <div id="ic">               
                                                               <input type="radio"  id="r3" name ="check" value="Italian Crust" class="inputrad" />                                                
                                                                       <img src="images/home/italian-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Italian Crust</span>
                                                       </div>

                                                       <div id="fpp">
                                                               <input type="radio" id="r4" name ="check" value="Fresh Pan Pizza" class="inputrad" />                                                
                                                                       <img src="images/home/fresh-pan-pizza.png" class="ptype"/>
                                                                       <span class="ptypedesc">Fresh Pan Pizza</span>
                                                       </div> 

                                                       <div id="wtc">
                                                               <input type="radio" id="r5" name ="check" value="Wheat Thin Crust" class="inputrad"  />                                                
                                                                       <img src="images/home/wheat-thin-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Wheat Thin Crust</span>
                                                       </div>      

                                                   

                                                  
                                                   <div id="next" onclick="loadnext('fptopping1','fpcrust1');">
                                                          Next >>
                                                      </div>
                                                  
                                               </div>
                                               
                                   </div>
                                   <div class="svtopping" id="fptopping1">
                                           <span class ="crust " id="svspan">
                                                   Choose Extra Toppings 
                                               </span>
                                               <div id="toppingsmenu">
                                                   

                                                       <div id="tomato">
                                                           <input type="checkbox"  id="r1" name ="hardik[]" value="910" class="inputrad"  />                                                
                                                           <img src="images/home/toppingsTomato.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Tomato</span>
                                                       </div>

                                                       <div id="corn">               
                                                               <input type="checkbox" id="r2" name ="hardik[]" value="911" class="inputrad" />                                                
                                                               <img src="images/home/toppingsGoldenCorn.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Golden Corn</span>
                                                       </div>               

                                                       <div id="capsi">               
                                                               <input type="checkbox"  id="r3" name ="hardik[]" value="912" class="inputrad" />                                                
                                                               <img src="images/home/toppingsCapsicum.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Capsicum</span>
                                                       </div>

                                                       <div id="mushroom">
                                                               <input type="checkbox" id="r4" name ="hardik[]" value="913" class="inputrad" />                                                
                                                               <img src="images/home/toppingsMushroom.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Mushroom</span>
                                                       </div> 

                                                       <div id="olive">
                                                               <input type="checkbox" id="r5" name ="hardik[]" value="914" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOlives.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Olives</span>
                                                       </div>      

                                                       <div id="onion">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="915" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOnion.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Onion</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paneer">
                                                               <input type="checkbox" id="r7" name ="hardik[]" value="916" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaneer.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paneer</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paparika">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="917" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaparika.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paparika</span>
                                                       </div>      
                                                 

                                                   
                                                   <div id="prev" onclick="loadprev('fpcrust1','fptopping1');">
                                                       << Previous
                                                   </div>
                                           
                                                    <div id="next" onclick="loadnext('fpqty1','fptopping1');">
                                                          Next >>
                                                      </div>
                                                   
                                               </div>
                                                        
                                   </div>
                                   <div class="svqty" id="fpqty1">
                                        <span class ="crust " id="svspan">
                                                  Choose Quantity & Size
                                        </span>
                                       <label for="quantity">Quantity : </label>
                                       <select name="quantity" >
                                            <option value="1">&nbsp;&nbsp;&nbsp; 1</option>
                                            <option value="2">&nbsp;&nbsp;&nbsp; 2</option>
                                            <option value="3">&nbsp;&nbsp;&nbsp; 3</option>
                                            <option value="4">&nbsp;&nbsp;&nbsp; 4</option>
                                            <option value="5">&nbsp;&nbsp;&nbsp; 5</option>
                                            <option value="6">&nbsp;&nbsp;&nbsp; 6</option>
                                            <option value="7">&nbsp;&nbsp;&nbsp; 7</option>
                                            <option value="8">&nbsp;&nbsp;&nbsp; 8</option>
                                            <option value="9">&nbsp;&nbsp;&nbsp; 9</option>
                                            <option value="10">&nbsp;&nbsp;&nbsp; 10</option>
                                       </select>
                                       <span id="size">Size : </span>
                                       
                                       <span class="size" id="small"  > <input type="radio" name="size" value="small" checked="true" /> Small</span>
                                       
                                       <span class="size" id="medium"> <input type="radio" name="size" value="medium"/> Medium</span>
                                       
                                       <span class="size" id="large"> <input type="radio" name="size" value="large"/> Large</span>

                                       <div id="prev" onclick="loadprev('fptopping1','fpqty1');" >
                                            << Previous
                                        </div>
                                        <input type="submit" id="addcart" value="Add to Cart" name="submit13" />
                                       
                                   </div>
                                 </form>
                               </div>
                               
                           </div>
                        
                        <div id="feastpizza2">
                               <div class="titlecss" id="titlefp">
                                   F E A S T  &nbsp;  P I Z Z A
                               </div>
                              
                               <div id="sv1">
                                   <img id="sv1pic" src="images/home/Cloud9.jpg"/>
                                   <span id="pizzadesc">
                                     Cloud 9<br/>
                                     S:₹240 M:₹435 L:₹635 <br/>
                                     Onion | Tomato | Babycorn | Paneer | Crisp Capsicum | Jalepeno

                                   </span>
                                   <div id="verticalline">
                               
                                   </div>
                                   <form action="home.php" method="post">
                                   <div class="svcrust" id="fpcrust2">
                                               <span class ="crust " id="svspan">
                                                   Choose Your Crust 
                                               </span>
                                               <div id="crustmenu">
                                                  

                                                       <div id="cht">
                                                           <input type="radio"  id="r1" name ="check" value="Classic Hand Tossed" class="inputrad" checked="true"  />                                                
                                                                       <img src="images/home/classic-hand-tossed.png" class="ptype"/>
                                                                       <span class="ptypedesc">Classic Hand Tossed</span>
                                                       </div>

                                                       <div id="cb">               
                                                               <input type="radio" id="r2" name ="check" value="Cheese Burst" class="inputrad"/>                                                
                                                                       <img src="images/home/cheese-burst.png" class="ptype"/>
                                                                       <span class="ptypedesc">Cheese Burst</span>
                                                       </div>               

                                                       <div id="ic">               
                                                               <input type="radio"  id="r3" name ="check" value="Italian Crust" class="inputrad" />                                                
                                                                       <img src="images/home/italian-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Italian Crust</span>
                                                       </div>

                                                       <div id="fpp">
                                                               <input type="radio" id="r4" name ="check" value="Fresh Pan Pizza" class="inputrad" />                                                
                                                                       <img src="images/home/fresh-pan-pizza.png" class="ptype"/>
                                                                       <span class="ptypedesc">Fresh Pan Pizza</span>
                                                       </div> 

                                                       <div id="wtc">
                                                               <input type="radio" id="r5" name ="check" value="Wheat Thin Crust" class="inputrad"  />                                                
                                                                       <img src="images/home/wheat-thin-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Wheat Thin Crust</span>
                                                       </div>      

                                                   

                                                  
                                                   <div id="next" onclick="loadnext('fptopping2','fpcrust2');">
                                                          Next >>
                                                      </div>
                                                  
                                               </div>
                                               
                                   </div>
                                   <div class="svtopping" id="fptopping2">
                                           <span class ="crust " id="svspan">
                                                   Choose Extra Toppings 
                                               </span>
                                               <div id="toppingsmenu">
                                                   

                                                       <div id="tomato">
                                                           <input type="checkbox"  id="r1" name ="hardik[]" value="910" class="inputrad"  />                                                
                                                           <img src="images/home/toppingsTomato.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Tomato</span>
                                                       </div>

                                                       <div id="corn">               
                                                               <input type="checkbox" id="r2" name ="hardik[]" value="911" class="inputrad" />                                                
                                                               <img src="images/home/toppingsGoldenCorn.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Golden Corn</span>
                                                       </div>               

                                                       <div id="capsi">               
                                                               <input type="checkbox"  id="r3" name ="hardik[]" value="912" class="inputrad" />                                                
                                                               <img src="images/home/toppingsCapsicum.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Capsicum</span>
                                                       </div>

                                                       <div id="mushroom">
                                                               <input type="checkbox" id="r4" name ="hardik[]" value="913" class="inputrad" />                                                
                                                               <img src="images/home/toppingsMushroom.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Mushroom</span>
                                                       </div> 

                                                       <div id="olive">
                                                               <input type="checkbox" id="r5" name ="hardik[]" value="914" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOlives.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Olives</span>
                                                       </div>      

                                                       <div id="onion">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="915" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOnion.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Onion</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paneer">
                                                               <input type="checkbox" id="r7" name ="hardik[]" value="916" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaneer.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paneer</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paparika">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="917" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaparika.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paparika</span>
                                                       </div>      
                                                 

                                                   
                                                   <div id="prev" onclick="loadprev('fpcrust2','fptopping2');">
                                                       << Previous
                                                   </div>
                                           
                                                    <div id="next" onclick="loadnext('fpqty2','fptopping2');">
                                                          Next >>
                                                      </div>
                                                   
                                               </div>
                                                        
                                   </div>
                                   <div class="svqty" id="fpqty2">
                                        <span class ="crust " id="svspan">
                                                  Choose Quantity & Size
                                        </span>
                                       <label for="quantity">Quantity : </label>
                                       <select name="quantity" >
                                            <option value="1">&nbsp;&nbsp;&nbsp; 1</option>
                                            <option value="2">&nbsp;&nbsp;&nbsp; 2</option>
                                            <option value="3">&nbsp;&nbsp;&nbsp; 3</option>
                                            <option value="4">&nbsp;&nbsp;&nbsp; 4</option>
                                            <option value="5">&nbsp;&nbsp;&nbsp; 5</option>
                                            <option value="6">&nbsp;&nbsp;&nbsp; 6</option>
                                            <option value="7">&nbsp;&nbsp;&nbsp; 7</option>
                                            <option value="8">&nbsp;&nbsp;&nbsp; 8</option>
                                            <option value="9">&nbsp;&nbsp;&nbsp; 9</option>
                                            <option value="10">&nbsp;&nbsp;&nbsp; 10</option>
                                       </select>
                                       <span id="size">Size : </span>
                                       
                                       <span class="size" id="small"  > <input type="radio" name="size" value="small" checked="true" /> Small</span>
                                       
                                       <span class="size" id="medium"> <input type="radio" name="size" value="medium"/> Medium</span>
                                       
                                       <span class="size" id="large"> <input type="radio" name="size" value="large"/> Large</span>

                                       <div id="prev" onclick="loadprev('fptopping2','fpqty2');" >
                                            << Previous
                                        </div>
                                        <input type="submit" id="addcart" value="Add to Cart" name="submit14" />
                                       
                                   </div>
                                 </form>
                               </div>
                               
                           </div>
                        
                        <div id="feastpizza3">
                               <div class="titlecss" id="titlefp">
                                  F E A S T  &nbsp;  P I Z Z A
                               </div>
                              
                               <div id="sv1">
                                   <img id="sv1pic" src="images/home/ChefsVegWonderMain9.jpg"/>
                                   <span id="pizzadesc">
                                     Chef’s Veg Wonder<br/>
                                     S:₹240 M:₹435 L:₹635 <br/>
                                     Mushroom | Jalepeno | Babycorn | Crisp Capsicum | Paneer | Red Paprika  

                                   </span>
                                   <div id="verticalline">
                               
                                   </div>
                                   <form action="home.php" method="post">
                                   <div class="svcrust" id="fpcrust3">
                                               <span class ="crust " id="svspan">
                                                   Choose Your Crust 
                                               </span>
                                               <div id="crustmenu">
                                                  

                                                       <div id="cht">
                                                           <input type="radio"  id="r1" name ="check" value="Classic Hand Tossed" class="inputrad" checked="true"  />                                                
                                                                       <img src="images/home/classic-hand-tossed.png" class="ptype"/>
                                                                       <span class="ptypedesc">Classic Hand Tossed</span>
                                                       </div>

                                                       <div id="cb">               
                                                               <input type="radio" id="r2" name ="check" value="Cheese Burst" class="inputrad"/>                                                
                                                                       <img src="images/home/cheese-burst.png" class="ptype"/>
                                                                       <span class="ptypedesc">Cheese Burst</span>
                                                       </div>               

                                                       <div id="ic">               
                                                               <input type="radio"  id="r3" name ="check" value="Italian Crust" class="inputrad" />                                                
                                                                       <img src="images/home/italian-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Italian Crust</span>
                                                       </div>

                                                       <div id="fpp">
                                                               <input type="radio" id="r4" name ="check" value="Fresh Pan Pizza" class="inputrad" />                                                
                                                                       <img src="images/home/fresh-pan-pizza.png" class="ptype"/>
                                                                       <span class="ptypedesc">Fresh Pan Pizza</span>
                                                       </div> 

                                                       <div id="wtc">
                                                               <input type="radio" id="r5" name ="check" value="Wheat Thin Crust" class="inputrad"  />                                                
                                                                       <img src="images/home/wheat-thin-crust.png" class="ptype"/>
                                                                       <span class="ptypedesc">Wheat Thin Crust</span>
                                                       </div>      

                                                   

                                                  
                                                   <div id="next" onclick="loadnext('fptopping3','fpcrust3');">
                                                          Next >>
                                                      </div>
                                                  
                                               </div>
                                               
                                   </div>
                                   <div class="svtopping" id="fptopping3">
                                           <span class ="crust " id="svspan">
                                                   Choose Extra Toppings 
                                               </span>
                                               <div id="toppingsmenu">
                                                   

                                                       <div id="tomato">
                                                           <input type="checkbox"  id="r1" name ="hardik[]" value="910" class="inputrad"  />                                                
                                                           <img src="images/home/toppingsTomato.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Tomato</span>
                                                       </div>

                                                       <div id="corn">               
                                                               <input type="checkbox" id="r2" name ="hardik[]" value="911" class="inputrad" />                                                
                                                               <img src="images/home/toppingsGoldenCorn.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Golden Corn</span>
                                                       </div>               

                                                       <div id="capsi">               
                                                               <input type="checkbox"  id="r3" name ="hardik[]" value="912" class="inputrad" />                                                
                                                               <img src="images/home/toppingsCapsicum.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Capsicum</span>
                                                       </div>

                                                       <div id="mushroom">
                                                               <input type="checkbox" id="r4" name ="hardik[]" value="913" class="inputrad" />                                                
                                                               <img src="images/home/toppingsMushroom.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Mushroom</span>
                                                       </div> 

                                                       <div id="olive">
                                                               <input type="checkbox" id="r5" name ="hardik[]" value="914" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOlives.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Olives</span>
                                                       </div>      

                                                       <div id="onion">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="915" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsOnion.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Onion</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paneer">
                                                               <input type="checkbox" id="r7" name ="hardik[]" value="916" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaneer.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paneer</span>
                                                       </div>      
                                                       
                                                       
                                                       <div id="paparika">
                                                               <input type="checkbox" id="r6" name ="hardik[]" value="917" class="inputrad"  />                                                
                                                               <img src="images/home/toppingsPaparika.jpg" class="ptype"/>
                                                                       <span class="ptypedesc">Paparika</span>
                                                       </div>      
                                                 

                                                   
                                                   <div id="prev" onclick="loadprev('fpcrust3','fptopping3');">
                                                       << Previous
                                                   </div>
                                           
                                                    <div id="next" onclick="loadnext('fpqty3','fptopping3');">
                                                          Next >>
                                                      </div>
                                                   
                                               </div>
                                                        
                                   </div>
                                   <div class="svqty" id="fpqty3">
                                        <span class ="crust " id="svspan">
                                                   Choose Quantity & Size
                                        </span>
                                       
                                       <label for="quantity">Quantity : </label>
                                       <select name="quantity" >
                                            <option value="1">&nbsp;&nbsp;&nbsp; 1</option>
                                            <option value="2">&nbsp;&nbsp;&nbsp; 2</option>
                                            <option value="3">&nbsp;&nbsp;&nbsp; 3</option>
                                            <option value="4">&nbsp;&nbsp;&nbsp; 4</option>
                                            <option value="5">&nbsp;&nbsp;&nbsp; 5</option>
                                            <option value="6">&nbsp;&nbsp;&nbsp; 6</option>
                                            <option value="7">&nbsp;&nbsp;&nbsp; 7</option>
                                            <option value="8">&nbsp;&nbsp;&nbsp; 8</option>
                                            <option value="9">&nbsp;&nbsp;&nbsp; 9</option>
                                            <option value="10">&nbsp;&nbsp;&nbsp; 10</option>
                                       </select>
                                       <span id="size">Size : </span>
                                       
                                       <span class="size" id="small"  > <input type="radio" name="size" value="small" checked="true" /> Small</span>
                                       
                                       <span class="size" id="medium"> <input type="radio" name="size" value="medium"/> Medium</span>
                                       
                                       <span class="size" id="large"> <input type="radio" name="size" value="large"/> Large</span>

                                       <div id="prev" onclick="loadprev('fptopping3','fpqty3');" >
                                            << Previous
                                        </div>
                                        <input type="submit" id="addcart" value="Add to Cart" name="submit15" />
                                       
                                   </div>
                                 </form>
                               </div>
                               
                           </div>
                        
                        
                    </div>
        <div id='footer'>

                    </div>
        
    </body>
</html>

