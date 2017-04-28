
    
<?php
include_once("db.php");
session_start();
error_reporting(E_ERROR | E_PARSE |E_WARNING);
?>

<?php
$oid=$_SESSION['ood'];
 //$sqr=mysql_query("SELECT * FROM build_order WHERE oid='$oid'");
$sqr=mysql_query("CALL get_data($oid)");
  /* for($i=0; $roat[$i]=mysql_fetch_array($sqr,MYSQL_NUM); $i++);
    $c = mysql_num_rows($sqr);
   $ppid= $roat[0];*/
    ?>
<html>
<head>
    <title>DOMINOS</title>
        <link rel="shortcut icon" href="thumb.png">
        <link rel="stylesheet" type="text/css" href="home.css"/>
        <script type="text/javascript" src="home.js" ></script>
        
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>
</head>
<body>
     <div id="header">
                            <div  >
                                <a href="home.php"> <img src="images/logo.jpg" id="logo"/></a>
                            </div>
                            <div  >
                               <a href="boss.php"> <img src="images/home/cart.png" id="cart" onmouseover="changetoblack();" onmouseout="changetogrey();" /></a>
                            </div>
                        <a href="logout.php">   
                            <div id="logout">
                               Logout  
                            </div>
                         </a>  
                    </div>
     <div id="table">
                <table   >
                  <thead>
                    <tr>
                      <th>Order_Id</th>
                      <th>Pizza_Id</th>
                      <th>Type</th>
                      <th>Topping</th>
                      <th>Quantity</th>
                      <th>Size</th>
                        <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>


                       <?php
                      while( $row = mysql_fetch_assoc( $sqr ) ){
                        echo
                        "<tr>
                          <td>{$row['oid']}</td>
                          <td>{$row['pid']}</td>
                          <td>{$row['type']}</td>
                          <td>{$row['tname']}</td>
                          <td>{$row['quantity']}</td>
                          <td>{$row['size']}</td> 
                          <td>{$row['subamount']}</td> 
                        </tr>\n";
                      }
                    ?>
                  </tbody>
                </table>




            <!--echo "<table >
              <tr>
                <td >Order_Id </td>
                <td >Pizza_Id</td>
                <td >Type</td>
                <td >Topping</td>
                <td >Quantity</td>
                <td >Size</td>
                <td >Price</td>

              </tr>";
              /*  for($i=0;$i<$c;$i++){
                    $count=0;
               foreach($roat[$i] as $element)
                {     echo "<tr>";

                    if($count==0)
                         {    echo "<td>".$element['Order_Id']."</td>"; $count++;
                         }
                         else if($count==1)
                         {
                                  echo "<td>".$element['Pizza_Id']."</td>";
                                  $count++;
                         }
                         else if($count==2)
                         {
                                  echo "<td>".$element['Type']."</td>";
                                  $count++;
                         }
                         else if($count==3)
                         {
                                  echo "<td>".$element['Topping']."</td>";
                                  $count++;
                         }
                         else if($count==4)
                         {
                                  echo "<td>".$element['Quantity']."</td>";
                                  $count++;
                         }
                         else if($count==5)
                         {
                                  echo "<td>".$element['Size']."</td>";
                                  $count++;
                         }
                         else if($count==6)
                         {
                                  echo "<td>".$element['Price']."</td>";
                         }


                    echo $element.'<br>';
                }  */
                   /* echo "<tr>";
                     echo "<td>".$roat[$i]['Order_Id']."</td>";
                     echo "<td>".$roat[$i]['Pizza_Id']."</td>";
                     echo "<td>".$roat[$i]['Type']."</td>";
                     echo "<td>".$roat[$i]['Topping']."</td>";
                     echo "<td>".$roat[$i]['Quantity']."</td>";
                     echo "<td>".$roat[$i]['Size']."</td>";
                     echo "<td>".$roat[$i]['Price']."</td>";


              echo "</tr>";
                }*/
            ?>   -->
           
               <form action="check.php" method="post"><input type="submit" value="submit" name="hell"/> 
           </form>
            
     </div>
   
</body>
</html>