<?php
include("./includes/sessionCheck.php");
include("./lib/templateClass.php");
$template=new Template("Contact",__DIR__);
$template->showHeader();
?>
<h1>Connect With Us</h1>
<?php
$template->showFooter();
?>