<?php
	define("INCLUDING", 'TRUE');
	include('config.php');
	include_once(METHODS_PATH . '/settings.profile.php');
	
	if(!isset($_SESSION['loggeduser']))
		if(!$_SESSION['loggeduser']->isLoggedIn())
		Header("Location: index.php");
?>


<!DOCTYPE HTML>
<head>
  <title> Impostazioni | Borsa delle Idee </title>
  <?php include(TEMPLATES_PATH.'/head.php'); ?>
</head>

<body>
<div class="container">
	  <?php include(TEMPLATES_PATH.'/navbar.php');
	  ?>
	  <div class="row">
	    <div class="col-md-12">
		    	<div class="well panel panel-default">
	  				<ul class="nav nav-tabs ">
		    			<li class="active"><a data-toggle="pill" href="#home">Dati di Accesso</a></li>
		    			<li><a data-toggle="pill" href="#menu1">Dati utente</a></li>
	 				 </ul>
  
 					<div class="tab-content">
		    			<div id="home" class="tab-pane fade in active">
		      				<h6>MODIFICA I TUOI DATI DI ACCESSO:</h6>
		      				<form class="form" role="form" method="post" accept-charset="UTF-8" id="mailChange">
		  						<fieldset class="form-group">
		<div class="col-md-6">
									<label>Nuova email</label>
									<input type="email" class="form-control" name="nuovaemail" class="txtField" placeholder="<?php echo $_SESSION['loggeduser']->getEmail(); ?>" required>
		</div>
		<div class="col-md-6">
									<label>Conferma email</label>
									<input type="email" class="form-control" name="confermaemail" class="txtField" required>
		 </div>
		  						</fieldset>
		  						<button name="setmail" type="submit" class="btn btn-primary">Cambia email</button>
							</form>
		  					<form id="pwdChange" method="post">
		  						<fieldset class="form-group">
			<div class="col-md-6">
									<label>Nuova Password</label>
									<input type="password" class="form-control" name="newPassword" class="txtField" required>
			</div>
			<div class="col-md-6">							
									<label>Conferma Password</label>
									<input type="password" class="form-control" name="confirmPassword" class="txtField" required>
			</div>					
								</fieldset>
								<button name="setpassword" class="btn btn-primary" type="submit">Cambia password</button>
							</form>
		    			</div>
	   					<div id="menu1" class="tab-pane fade">
	      					<h6>MODIFICA I TUOI DATI UTENTE:</h6>
	      					
			      			<form id="nameChange" role="form" action="#" method="post">
			      			<div class="row">
	    					<div class="col-md-6">
			  					<fieldset class="form-group">
			    					<label>Cambia nome</label>
			    					<input name="nome" class="form-control" placeholder="<?php echo $_SESSION['loggeduser']->getDati()['NOME']; ?>" class="txtField" required>
			  					</fieldset>
			  					</div>
			  					<div class="col-md-6">
			  					<fieldset class="form-group">
			    					<label>Cambia cognome</label>
			    					<input name="cognome" class="form-control" placeholder="<?php echo $_SESSION['loggeduser']->getDati()['COGNOME']; ?>" class="txtField" required>
			  					</fieldset>
			  					</div>
			  					</div>
			  					<button name="cambianome" class="btn btn-primary" type="submit">Cambia dati</button> 
			  					</form>
			  					
			  					<form id="adChange" role="form" action="#" method="post">
			  					<div class="row">
			  					<div class="col-md-6">
			    					<fieldset class="form-group">
			  					<label>Cambia Nazione</label>
			    					<input name="nazione" class="form-control" placeholder="<?php echo $_SESSION['loggeduser']->getDati()['NAZIONE']; ?>" class="txtField">
			  					</fieldset>
			  					</div>
								<div class="col-md-6">
			  					<fieldset class="form-group">
			  					<label>Cambia Regione</label>
			    					<input name="regione" class="form-control" placeholder="<?php echo $_SESSION['loggeduser']->getDati()['REGIONE']; ?>" class="txtField">
			  					</fieldset>
			  					</div>
			  					</div>
			  					<div class="row">
			  					<div class="col-md-2">
			  					<fieldset class="form-group">
			  					<label>Cambia Provincia</label>
			    				<input name="provincia" class="form-control" placeholder="<?php echo $_SESSION['loggeduser']->getDati()['PROVINCIA']; ?>" class="txtField">
			  					</fieldset>
			  					</div>
			  					<div class="col-md-4">
			  					<fieldset class="form-group">
			  					<label>Cambia Citt&agrave;</label>
			    					<input name="citta" class="form-control" placeholder="<?php echo $_SESSION['loggeduser']->getDati()['CITTA']; ?>" class="txtField">
			  					</fieldset>
			  					</div>
			  					<div class="col-md-2">
			  					<fieldset class="form-group">
			  						<label>Cambia CAP</label>
			    					<input name="cap" class="form-control" placeholder="<?php echo $_SESSION['loggeduser']->getDati()['CAP']; ?>" class="txtField">
			  				</fieldset>
			  					</div>
			  					<div class="col-md-4">
			  					<fieldset class="form-group">
			  					<label>Cambia Indirizzo</label>
			    					<input name="indirizzo" class="form-control" placeholder="<?php echo $_SESSION['loggeduser']->getDati()['INDIRIZZO']; ?>" class="txtField">
			  					</fieldset>
			  					
			  					</div>
			  					</div>
			  					
			  			<button name="cambiaindirizzo" class="btn btn-primary" type="submit">Cambia Indirizzo</button> 
							</form>
	    				</div>
					</div>
				</div>
		</div>
	</div>
	    	
</div>

<?php include (TEMPLATES_PATH.'/footer.php');
	?>
</body>
