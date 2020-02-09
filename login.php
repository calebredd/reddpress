<?php
include("./includes/sessionCheck.php");
include_once("./lib/templateClass.php");
include_once("./includes/connection.php");
if($_SESSION['logged_in']){
  header('Location:index.php');
}else{
  if(isset($_POST['email'],$_POST['password'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    // echo "Email: $email <br> Password: $password";
    if(empty($email)or empty($password)){
      $error="All fields are required";
    }else{
      $query=$pdo->prepare("SELECT * FROM users WHERE email=? AND password=?");
      $query->bindValue(1,$email);
      $query->bindValue(2,$password);
      $query->execute();
      $num=$query->rowCount();
      if($num==1){
        $data=$query->fetch(PDO::FETCH_ASSOC);
        // print_r($data);
        $_SESSION['logged_in']=true;
        $_SESSION['user']=$data['username'];
        $_SESSION['email']=$data['email'];
        $_SESSION['role']=$data['role'];
        $_SESSION['user_id']=$data['id'];
        header('Location:dashboard.php');
        exit();
      }else{
        $error='Incorrect details';
      }
    }
  }
$template=new Template("Login",__DIR__);
$template->showHeader();
?>
<h1>Login</h1>

<form action="login.php" method="POST">
  <input type="email" name="email" placeholder="Email"><br><br>
  <input type="password" name="password" placeholder="Password"><br><br>
  <input type="submit" value="Login">
  <p style="color:red;"><?php if(isset($error)){echo $error;}?></p>
</form>

<?php
$template->showFooter();
}?>