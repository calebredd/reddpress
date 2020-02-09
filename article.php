<?php
include("./includes/sessionCheck.php");
include("./lib/templateClass.php");
include_once("./includes/connection.php");
include_once("./includes/articleClass.php");
include_once('./includes/userClass.php');
$template=new Template("Article",__DIR__);
$article=new Article;
$user=new User;
$articles=$article->fetch_all();
// print_r(array_keys($articles[0]));
// $userInfo=(object) $users[$_GET['id']];
// print_r($user);
// echo $user->username;
// echo "<br><br><pre>".$users[$_GET['id']]['username']."</pre>";

if(isset($_GET['id'])){
  $id=$_GET['id'];
  $data=(Object) $article->fetch_data($id);
  // print_r($data);
}else{
  header('Location:index.php');
  exit();
}
$user=$user->fetch_by_name($data->author);
// print_r($user);

  $template->showHeader();
  $time=$data->article_timestamp;
  // echo $time;
  $time=(date_format(date_create("$time"), "m/d/Y"));
  ?>
<h1><?php echo $data->title;?></h1>
<a href="http://localhost/reddpress/user.php?id=<?php echo $user["id"]?>">
  <h2><?php echo $data->author;?></h2>
</a>
<!-- <p><?php echo "Posted on ".$time;?></p> -->
<p><?php echo $data->content;?></p>
<p style="color:lightgray;"><em><?php echo "-Posted on $time"?></em></p>
<a href="blog.php">&larr; Back</a>
<?php
  $template->showFooter();
  ?>