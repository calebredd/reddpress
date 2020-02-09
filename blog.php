  <?php 
include("./includes/sessionCheck.php");
  include("./lib/templateClass.php");
  include_once("./includes/connection.php");
  include_once("./includes/articleClass.php");
  include_once("./includes/userClass.php");
  $article=new Article;
  $user=new User;
  $articles=$article->fetch_all();
  $template=new Template('Blog',__DIR__); 
  $template->showHeader();
  ?>
  <h1>The Blog Stop</h1>
  <div class="buttons">
    <button><a style="text-decoration:none" href="add.php">Add Article</a></button></div><br>
  <?php 
        // print_r($users);
      foreach($articles as $article){
        $id=$user->fetch_by_name($article["author"]);
        // echo "<p>".$id['id']."</p>";
        $time=$article['article_timestamp'];
  // echo $time;
  $time=(date_format(date_create("$time"), "m/d/Y"));
      ?>
  <a href="article.php?id=<?php echo $article['id'];?>">
    <h3><?php echo $article["title"];?></h3>
  </a>
  <h4>Posted by <a class="nameLink"
      href="http://localhost/reddpress/user.php?id=<?php echo $id['id'];?>"><?php echo $article["author"];?></a> on:
    <?php echo $time?></h4>
  <p><?php echo substr($article["content"],0,200); ?>. . .</p><a href="article.php?id=<?php echo $article['id'];?>">
    <button>Continue Reading</button></a>
  <?php };?>
  <?php $template->showFooter();
      ?>