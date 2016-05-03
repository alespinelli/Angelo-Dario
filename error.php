<?php 
/* PAGINA DI ERRORE */
define("INCLUDING", 'TRUE');
include 'config.php';

?>


<!DOCTYPE html>
<html>

<head>
  <title> Errore | Borsa delle Idee</title>
  <?php include(TEMPLATES_PATH.'/head.php'); ?>
</head>

<body>

<div class="container">
	<?php include (TEMPLATES_PATH.'/navbar.php');?>	
	<div class="col-md-3"></div>
	<div class="col-md-6 well well-lg text-center">
		<img src="http://www.zwentner.com/wordpress/wp-content/uploads/2015/11/John-Travolta.gif" class="img-responsive  center-block">
		<h3>OPS!</h3>
		<h5>Qualcosa è andato storto...</h5>
	</div>
	<div class="col-md-3"></div>

</body>