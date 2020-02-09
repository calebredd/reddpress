  <?php 
  include("./includes/sessionCheck.php");
  include("./lib/templateClass.php");
  include_once("./includes/connection.php");
  include_once("./includes/userClass.php");
  $user=new User;
  $users=$user->fetch_all();
  $template=new Template('Bloggers',__DIR__); 
  $template->showHeader();
  ?>
  <h1>Meet The Authors
  </h1>
  <?php 
  forEach($users as $user){
    ?>
  <p>
    <a href='http://localhost/reddpress/user.php/?id=<?php echo $user['id'];?>'>
      <?php echo $user['username']?>
    </a>
  </p>
  <?php
    }  
  $template->showFooter();
?>