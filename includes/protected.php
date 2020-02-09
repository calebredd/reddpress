<?php
if($_SESSION['role']!='admin'){
  header('Location:http://localhost/reddpress/login.php');
}?>