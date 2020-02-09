<?php
include("./includes/sessionCheck.php");
include("./lib/templateClass.php");
include_once("./includes/connection.php");
include_once("./includes/userClass.php");
$user=new User;
// $users=$user->fetch_all();
// $userInfo=(object) $users[$_GET['id']];
// print_r($user);
// echo $user->username;
// echo "<br><br><pre>".$users[$_GET['id']]['username']."</pre>";

if(isset($_GET['id'])){
  $id=$_GET['id'];
  $body=$user->fetch_data($id);
  $data=(Object) $user->fetch_data($id);
  $articles=$user->fetch_all_user_articles($data->username);
  $postCount=count($articles);
  // print_r($data);
  }else{
  header('Location:index.php');
  exit();
}
$template=new Template("$data->username",__DIR__);
$template->showHeader();
  ?>
<h1><?php echo $data->username;?></h1>
<p>Email: <a href="mailto:<?php echo $data->email;?>"><?php echo $data->email;?></a></p>
<?php 
if($postCount>0){?>
<h2>Latest Blog Posts:</h2>
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
  <h2>This blogger has not posted any content yet.</h2>
  <?php }
?>
  <a href="http://localhost/reddpress/bloggers.php">&larr; Back</a>
  <?php
  $template->showFooter();

  ?>