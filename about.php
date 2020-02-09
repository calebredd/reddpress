<?php
include("./includes/sessionCheck.php");
include("./lib/templateClass.php");
$template=new Template("About",__DIR__);

  $template->showHeader();
  ?>
<h1>Who We Are</h1>
<?php
  $template->showFooter();
  ?>