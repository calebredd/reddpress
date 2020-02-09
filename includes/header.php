<html>

<head>
  <title>ReddPress-<?php echo $this->filename ?></title>
  <link rel="stylesheet" href="http://localhost/reddpress/assets/style.css" />
</head>

<body>
  <div class="container">

    <div class="navbar">
      <a href="http://localhost/reddpress/index.php">
        <span id="logo">
          ReddPress
        </span>
      </a>
      <a href="http://localhost/reddpress/dashboard.php">
        <span>Profile</span>
      </a>
      <a href="http://localhost/reddpress/blog.php">
        <span>Blog</span>
      </a>
      <a href="http://localhost/reddpress/bloggers.php">
        <span>Bloggers</span>
      </a>
      <a href="http://localhost/reddpress/about.php">
        <span>About</span>
      </a>
      <a href="http://localhost/reddpress/contact.php">
        <span>Contact</span>
      </a>
      <span class="session">
        <?php
      if($_SESSION['logged_in']){
        ?>
        <a href="http://localhost/reddpress/admin/logout.php">
          <span>LogOut</span>
        </a>
        <?php
      }else{?>
        <a href="http://localhost/reddpress/login.php">
          <span>Login</span>
        </a>/
        <a href="http://localhost/reddpress/register.php">
          <span>Sign Up</span>
        </a>
        <?php };
      ?>
      </span>
      <?php
if($_SESSION['role']=='admin'){
  ?>
      <a href="http://localhost/reddpress/admin"><span>Admin</span></a>
      <?php
}
?>

    </div>