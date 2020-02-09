<?php
include("../includes/sessionCheck.php");
session_destroy();
  header('Location:http://localhost/reddpress/');
?>