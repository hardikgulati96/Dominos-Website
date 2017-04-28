<?php
session_start();
$_SESSION['login']=0;
$_SESSION['fp']=0;
session_destroy();

header('Location: Frontpage.php');

?>