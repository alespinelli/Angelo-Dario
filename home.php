<?php
define("INCLUDING", 'TRUE');
include('config.php');
include_once(METHODS_PATH . '/persona.class.php');


?>


<!DOCTYPE HTML>

<head>
  <title> Home | Borsa delle Idee </title>
   <?php include(TEMPLATES_PATH.'/head.php'); ?>
</head>

<body class="container">
  <?php include(TEMPLATES_PATH.'/navbar.php'); ?>
  
  <div class="jumbotron bid-jumbotron">
  	<h1 id="title-jumbo"><?php if (isset($_SESSION['loggeduser'])){
 	 		if ($_SESSION['loggeduser']->isLoggedIn()){
 	 			echo "Ciao, ". $_SESSION['loggeduser']->who()."";
  			}}
 	 		else echo "Benvenuto";
 	 	?>!</h1>
  <p class="p-jumbo">Sei pronto per iniziare?</p>

  <p> <?php if (isset($_SESSION['loggeduser'])){
 	 		if ($_SESSION['loggeduser']->isLoggedIn())
 	 			echo 'Condividi ';}
		else echo "Registrati per condividere ";?>
		con il mondo le tue idee, o partecipa a quelle di altri utenti!</p>
  <p>
  	<a class="btn btn-primary btn-lg" href="#" role="button">Esplora</a>
  		<?php if (isset($_SESSION['loggeduser'])){
 	 		if ($_SESSION['loggeduser']->isLoggedIn()){
 	 			echo '<a class="btn btn-primary btn-lg" href="#" role="button">Pubblica</a>';}}
 	 		else
 	 			echo '<a class="btn btn-primary btn-lg" href="register.php" role="button">Registrati</a>';
 	 	?>
  </p>
</div>	
 	
 	
 	
</body>
<?php include (TEMPLATES_PATH.'/footer.php');
	?>
<!>
