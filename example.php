<?php 
/* ESEMPIO DI PAGINA VUOTA*/

define("INCLUDING", 'TRUE');
include 'config.php';
include(METHODS_PATH . "/avatarupload.php");

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

?>


<!DOCTYPE html>

<head>
  <title> Titolo Pagina | Borsa delle Idee</title>
  <?php include(TEMPLATES_PATH.'/head.php'); //classi bootstrap  ?>
</head>

<body>
<div class="container">
	<?php include (TEMPLATES_PATH.'/navbar.php'); //Navbar ?>

	<div class="row">
    	<div class="col-lg-12">
        	<form class="well" action="#" method="post" enctype="multipart/form-data">
            	<div class="form-group">
                	<label for="file">Select a file to upload</label>
                    <input type="file" name="file">
                    <p class="help-block">Only jpg,jpeg,png and gif file with maximum size of 1 MB is allowed.</p>
            	</div>
            	<input type="submit" class="btn btn-lg btn-primary" value="Upload">
        	</form>
    	</div>
	</div>	
	
	
</div>	
<?php include (TEMPLATES_PATH.'/footer.php'); //Footer ?>
</body>
