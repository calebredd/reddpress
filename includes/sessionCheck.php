<?php
session_start();
if(!isset($_SESSION['logged_in'])){
  $_SESSION['logged_in']=false;
};
if(!isset($_SESSION['role'])){
  $_SESSION['role']='guest';
}
if(!isset($_SESSION['user'])){
  $_SESSION['user']='Guest';
}
// print_r($_SESSION);

?>