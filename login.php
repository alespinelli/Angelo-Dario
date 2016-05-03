<?php 
/* PAGINA DI LOGIN */

define("INCLUDING", 'TRUE');
include 'config.php';
include (METHODS_PATH. "/confermamail.php");

if(isset($_SESSION['loggeduser']))
	if($_SESSION['loggeduser']->getid()!=0)
		Header("Location: home.php");

?>


<!DOCTYPE html>

<head>
  <title> Login | Borsa delle Idee</title>
  <?php include(TEMPLATES_PATH.'/head.php'); //con questo include evito di riscrivere in ogni pagina le linee di codice necessarie per usare le classi bootstrap  ?>
</head>

<body>
<div class="container">
	<?php include (TEMPLATES_PATH.'/navbar.php'); //Navbar del sito, cambia automaticamente se l'utente ha effettuato il login
	?>	
	<div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
        	<div class="well panel panel-default">
            	<h4 class="text-center">Login</h4>
            	<hr>
                <form class="form" role="form" method="post" accept-charset="UTF-8" id="login">
					<div class="form-group has-feedback">
						<label class="sr-only" for="Email">Indirizzo Email</label>
						<input type="email" class="form-control" name="email" placeholder="Indirizzo Email" required>				 
					</div>
					<div class="form-group">
						<label class="sr-only" for="Password">Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password" required>
                        
					</div>
					<div class="form-group">
						<button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox"> Ricordami
						</label>
					</div>
					<div ><a href="">Hai dimenticato la password?</a></div>
				</form>
            	<hr>
            	<div>Non sei iscritto? <a href="register.php">Registrati!</a></div>
            </div>
        </div>
    </div>
	
	
	
	
	
	
</div>

</body>
