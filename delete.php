<?php
include_once("./includes/sessionCheck.php");
// include_once('./includes/protected.php');
include_once('./lib/templateClass.php');
include_once('./includes/connection.php');
include_once('./includes/articleClass.php');
if($_SESSION['user']=='Guest'){
  header('Location:login.php');
}
$template=new Template('delete',__DIR__);
$article=new Article;

if(isset($_SESSION['logged_in'])){
  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query=$pdo->prepare('DELETE FROM articles where id=?');
    $query->bindValue(1,$id);
    $query->execute();
    header('Location:index.php');
  }  //display delete page
  $articles=$article->fetch_all();
  
$template->showHeader();
?>
<h1>Select an Article to Delete</h1>

<form action="delete.php" method="get">
  <select onchange="this.form.submit();">
    <?php foreach($articles as $article){
  ?>
    <option name="id" value="<?php echo $article['id'];?>"> <?php echo $article['title']; ?></option> <?php }?>
  </select>
</form>
<a href="dashboard.php"><button style="background:red; color:white;">Cancel</button></a>

<?php $template->showFooter();
   
}else{
  header('Location:index.php');
}
?>