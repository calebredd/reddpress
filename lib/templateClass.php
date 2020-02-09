<?php
class Template{
  function __construct($filename,$dir){
    $this->filename=$filename;
    $this->root=$_SERVER['DOCUMENT_ROOT'];
    $this->dir=$dir;
  }
  function show(){
    // echo"<pre>"; print_r($_SERVER); echo "</pre>";
    include("$this->root/reddpress/includes/header.php");
    include("$this->root/reddpress/includes/footer.php");
    die;
  }
    function showHeader(){
      // echo"<pre>"; print_r($_SERVER); echo "</pre>";
      include("$this->root/reddpress/includes/header.php");
      // include("$this->root/reddpress/lib/footer.php");
    }
    function showFooter(){
      // include("$this->root/reddpress/lib/header.php");
      include("$this->root/reddpress/includes/footer.php");
    }
}
?>