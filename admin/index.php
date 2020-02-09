<?php
include_once("../includes/sessionCheck.php");
include_once('../includes/protected.php');
include_once('../lib/templateClass.php');
include_once('../includes/connection.php');
include_once('../includes/userClass.php');
include_once('../includes/articleClass.php');

$template= new Template("Admin",__DIR__);

$template->showHeader();
?>
<h1>Admin Dashboard</h1>
<?php 
if($_SESSION['logged_in']){
$users=new User;
$articles=new Article;
$users=$users->fetch_all();
$articles=$articles->fetch_all();
  //display index
?>


<h3>Users: <?php echo count($users) ?></h3>

<div class="userList">
  <?php
  // print_r($users);
  foreach($users as $user){
      ?>
  <div> <?php echo "ID:".$user["id"];?>
    Username: <a href="http://localhost/reddpress/user.php?id=<?php echo $user['id'];?>"><?php echo $user["username"];?>
    </a> <?php echo "Email:".$user["email"]." Role:".$user['role'];?>
  </div>
  <?php };?>
</div>
<h3>Articles: <?php echo count($articles) ?></h3>

<div class=" userList">
  <?php
  // print_r($users);
  foreach($articles as $article){
    $time=date_create($article['article_timestamp']);
    $time=date_format($time, 'm/d/Y');
      ?>
  <div> <?php echo "ID:".$article["id"];?>
    Author: <?php echo $article["author"];?>
    <?php echo "Title:";?><a
      href="http://localhost/reddpress/article.php?id=<?php echo $article['id'];?>"><?php echo $article["title"];?></a>
    <?php echo "Posted:".$time;?>
  </div>
  <?php };?>
</div>

<?php  
}
 $template->showFooter();
?>