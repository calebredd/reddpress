<?php
include_once("./includes/sessionCheck.php");
// include_once('./includes/protected.php');
if($_SESSION['user']=='Guest'){
  header('Location:login.php');
}
include_once('./lib/templateClass.php');
include_once('./includes/connection.php');
$template=new Template('add',__dir__);
if(isset($_SESSION['logged_in'])){
  //display add page
  if(isset($_POST['title'],$_POST['content'])){
    $title=$_POST['title'];
    $content=nl2br($_POST['content']);
    if(empty($title)or empty($content)){
      $error= 'All fields are required';
    }else{
      $query=$pdo->prepare('INSERT INTO articles (title, content, article_timestamp, author)VALUES (?,?,?,?)');
      $query->bindValue(1, $title);
      $query->bindValue(2, $content);
      $query->bindValue(3, time());
      $query->bindValue(4, $_SESSION['user']);
      $query->execute();
      header('Location:http://localhost/reddpress/blog.php');
    }
  }
$template->showHeader();
?>
<h1>Admin Dashboard</h1>
<?php 
if(isset($_SESSION['logged_in'])){
  //display index ?>
<h4>Add Article</h4>
<form action="add.php" method="post">
  <input type="text" name="title" placeholder="Title"><br><br>
  <textarea name="content" rows="15" cols="50" placeholder="Content"></textarea><br><br>
  <input style="background:primary;" type="submit" value="Publish">
</form>
<a href="dashboard.php"><button style="background:red; color:white;">Cancel</button></a>
<p style="color:red;"><?php if(isset($error)){echo $error;}?></p>
<?php  
}else{
  //display login
  
        header('Location:index.php');
        exit();
      }
    $template->showFooter();
}else{
header('Location:index.php');
}
?>