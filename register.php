<?php 
/* PAGINA DI LOGIN */

define("INCLUDING", 'TRUE');
include 'config.php';
include (METHODS_PATH . "/register.method.php");

if(isset($_SESSION['loggeduser']))
	if($_SESSION['loggeduser']->getid()!=0)
		Header("Location: home.php");

?>


<!DOCTYPE html>

<head>
  <title> Registrazione | Borsa delle Idee</title>
  <?php include(TEMPLATES_PATH.'/head.php'); ?>
  
  <!-- Script per il selettore date -->
  <script src="components/bootstrap-datepicker/bootstrap-datepicker-built.js"></script>
  <link rel="stylesheet" href="components/bootstrap-datepicker/bootstrap-datepicker-built.css">
</head>

<body>
<div class="container">
	<?php include (TEMPLATES_PATH.'/navbar.php');
	?>	
	<div class="row">
        <div class=" col-md-8 col-md-offset-2">
        	<div class="well panel panel-default">
            	<h4 class="text-center">Registrazione utente</h4>
            	<hr>
            	<h6>Dati personali</h6>
                <form class="form" role="form" method="post" accept-charset="UTF-8" id="register">
                	<div class="row">
                		<div class="col-md-6">
	                		<div class="form-group">
								<label class="sr-only" for="Nome">Nome</label>
								<input type="text" class="form-control" name="nome" placeholder="Nome*" required>
							</div>
						</div>
						<div class="col-md-6">
	                		<div class="form-group">
								<label class="sr-only" for="Cognome">Cognome</label>
								<input type="text" class="form-control" name="cognome" placeholder="Cognome*" required>
							</div>
                		</div>
                	</div>
                	<div class="row" style="padding-bottom:10px">
                		<div class="col-md-10 col-sm-9 col-xs-9">
		                	<div class="input-group date" data-provide="datepicker" data-date-end-date="0d" data-date-language="it" data-date-format="dd/mm/yyyy">
							    <input type="text" name="datanascita" placeholder="Data di Nascita*" class="form-control" required>
							    <div class="input-group-addon" >
							        <span class="glyphicon glyphicon-th"></span>
							    </div>
							</div>
						</div>
						<div class="col-md-2 col-sm-3 col-xs-3">
							<select class="form-control" name="sex" required>
							  <option>M</option>
							  <option>F</option>
							</select>
						</div>
                	</div>
                	<h6>Dati di accesso</h6>
					<div class="form-group has-feedback">
						<label class="sr-only" for="Email">Indirizzo Email</label>
						<input type="email" class="form-control" name="email" placeholder="Indirizzo Email *" required>				 
					</div>
					<div class="form-group">
						<label class="sr-only" for="Password">Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password *" required>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" required> Accetto i termini e le condizioni*
						</label>
					</div>
					<h8>I campi contrassegnati con * sono obbligatori.</h8>
					<div class="form-group">
						<button type="submit" name="register" class="btn btn-primary btn-block">Registrati</button>
					</div>
					
				</form>
            	<hr>
            	<div>Rappresenti un'azienda? Vai alla <a href="#">Registrazione aziendale</a></div>
            </div>
        </div>
   </div>
</div>

<?php include (TEMPLATES_PATH.'/footer.php');
	?>

</body>
