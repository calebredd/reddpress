<?php
include("./includes/sessionCheck.php");
include_once('./lib/templateClass.php');
include_once('./includes/connection.php');
$template=new Template('Register',__dir__);

  if(isset($_POST['username'],$_POST['email'],$_POST['password'])){
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$role='user';
if(empty($username)or empty($email) or empty($password)){
  $error="All fields are required";
}else{
   $query=$pdo->prepare('INSERT INTO users (username, email, password, role) VALUES (?,?,?,?)');
   $query->bindValue(1,$username); 
   $query->bindValue(2,$email); 
   $query->bindValue(3,$password);
   $query->bindValue(4,$role);
   $query->execute();
   $confirm=$pdo->prepare('SELECT * FROM users WHERE email=?');
   $confirm->bindValue(1,$email);
   $confirm->execute();
   $data=$confirm->fetch(PDO::FETCH_ASSOC);
  //  print_r($data);
   if($data['username']!=$username and $data['password']!=$password){
     $error='That email is already registered with another account';
   }
   $_SESSION['logged_in']=true;
   $_SESSION['user']=$data['username'];
   $_SESSION['email']=$data['email'];
   $_SESSION['role']=$data['role'];
   $_SESSION['user_id']=$data['id'];
// header('Location:http://localhost/reddpress/dashboard.php');
  }
}
  //Register Form
  ?>
<?php
$template->showHeader();
?>
<h1>Become a ReddPresser</h1>

<form action="register.php" method="post">
  <input type="text" name="username" placeholder="Your Name"><br><br>
  <input type="email" name="email" placeholder="Email"><br><br>
  <input type="password" name="password" placeholder="Password"><br><br>
  <input type="password" name="confirmPassword" placeholder="Re-type Password"><br><br>
  <input type="submit" value="Create Account"><br><br>
  <p style="color:red;"><?php if(isset($error)){echo $error;}?></p>
</form>
<?php $template->showFooter();
 ?>