  <?php include_once("./includes/sessionCheck.php");
  include_once("./lib/templateClass.php");
  include_once('./includes/userClass.php');
  include_once('./includes/connection.php');
  $user=new User;
  $template=new Template('Dashboard', __DIR__);
  $template->showHeader();
  if($_SESSION['user']=='Guest'){
  header('Location:login.php');
}
$articles=$user->fetch_all_user_articles($_SESSION['user']);
$postCount=count($articles);
// print_r($_SESSION);
  ?><h1><?php echo $_SESSION['user'];
  ?></h1>
  <div class="buttons">
    <button><a style="text-decoration:none" href="add.php">Add Article</a></button><button><a
        style="text-decoration:none" href="delete.php">Delete Article</a></button></div>

  <?php 
if($postCount>0){?>
  <h2>Your Latest Blog Posts:</h2>
  <?php
  forEach($articles as $article){
    $time=$article['article_timestamp'];
    // echo $time;
    $time=(date_format(date_create("$time"), "m/d/Y"));
    
  ?>
  <a href="http://localhost/reddpress/article.php?id=<?php echo $article['id']?>">
    <h3><?php echo $article['title']."</a> Posted on ".$time;?></h3>
    <?php }
}else{?>
    <h2>You have not posted any content yet.</h2>
    <button><a style="text-decoration:none" href="add.php">Add Article</a></button>
    <?php }
 $template->showFooter();
  ?>