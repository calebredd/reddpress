  <?php 
  include("./includes/sessionCheck.php");
  include("./lib/templateClass.php");
  include_once("./includes/connection.php");
  include_once("./includes/userClass.php");
  $user=new User;
  $users=$user->fetch_all();
  $template=new Template('Home',__DIR__); 
  $template->showHeader();
  ?>
  <h1>Welcome to
    ReddPress<?php if(isset($_SESSION['user'])and $_SESSION['user']!="Guest"){echo " ".$_SESSION['user'];} ?>!</h1>

  <?php $template->showFooter();
?>