<?php
		session_start();
		//include_once 'configurazioneDB.php';	
		include_once 'confDatabase.php';
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
 <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
 <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
 <script src="http://code.jquery.com/jquery-2.1.0.js"></script>
  
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <link href="css/stileLOG2.css" rel="stylesheet" type="text/css">
  <style>
	
	@keyframes illuminati
					{
						from {color: #8080ff;background-color: #8080ff;border-color: #8080ff;}
						to { }
					}
			
	@keyframes illumina
					{
						from {color: #8080ff;font-size: 40px;}
						to { color: yellow;font-size: 60px;}
					}
	@keyframes nascondi
					{
						from {color: #8080ff;font-size: 40px;}
						to { color: white;font-size: 40px;}
					}
	@keyframes muovi
			{
				from { left:2000px; top:800px;}
				to { left:0px; top:0px;}
	
			}
	@keyframes errore
				{
					from{color:#8080ff;font-size: medium;}
					to{color: #fb0000;font-size: large; letter-spacing: 2px;}
				}
  </style>
  
</head>
<body>

<div class="container">
 	<div style='position: relative;'>
 		<h2 id='Titolo'>Borsa delle <span id='idea' >idee</span></h2>
 		<button type="button" class="btn btn-info btn-lg" id="myBtn">Login</button>
 	</div>
    
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
      
          <h4 style='letter-spacing: 2px;'><span class="glyphicon glyphicon-lock"></span> Login - Borsa delle <span id='idea' >idee</span></h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" name='login' action='elogin.php' method='POST' id="login">
          
          
 


  <div class="row">
    <div class="col-xs-12">
      <br>
      <div class="btn-group" data-toggle="buttons">
        <label class="btn active">
          <input type="radio" name='tipoLog' value='azienda'  REQUIRED checked><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-check-circle-o fa-2x"></i><span> Login azienda</span>
        </label>
        <label class="btn">
          <input type="radio" name='tipoLog' value='utente' REQUIRED checked><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-check-circle-o fa-2x"></i><span> Login utente</span>
        </label>
      </div>
	 </div>
	</div>
<br/><br/>
            <div class="form-group">           
              <label for="Indirizzo_email"><span class="glyphicon glyphicon-user"></span> email</label>
              <input type="email"  name='email' class="form-control" id="mail" placeholder="Enter email" required>
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password"  class="form-control" name="psw" placeholder="Enter password" required>
            </div>
              <button type="submit"  name='accesso' class="btn btn-primary btn-block"><span class="glyphicon glyphicon-off"></span> Accedi</button>
          	<?php
			 if( isset($_GET['err']) )
			 {
			    echo "<br/><span id='box_errore'>";
			         
			    switch ($_GET['err'])
			    {
			        		case 1:
					 			echo "Indirizzo email o password errata.";
					 			break;
			        		case 2:
			        			echo "Non hai effettuato la conferma mail.";
								break;
			        		case 3:
			        			echo "Seleziona se sei un utente o un'azienda.";
			        			break;
			    }
			    
			    echo "</span>";
			    
			 }
	 	?>
          
          </form>
        </div>
        <div class="modal-footer">
        
          	<div class="btn-group pull-left">
				  <button type="button" class="btn btn-info">Registrati</button>
				  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
				    <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu" role="menu">
				    <li><a href="REGISTRAZIONE2.php">Registrati come azienda</a></li>
				    <li><a href="registrazioneutente.php">Registrati come utente</a></li>
				  </ul>
			</div>
          
          <p>Hai dimenticato <a href="forgot.php">i tuoi dati ?</a></p>
        </div>
      </div>
      
    </div>
  </div> 
</div>
	 <?php 
	 if( isset($_GET['id']) )
	 { 
	 	$slq= "SELECT EMAIL,CODICE_ATTIVAZIONE FROM utenti WHERE CODICE_ATTIVAZIONE='".$_GET['id']."';";
	 	$result = $mysqli->query($slq);
	 	$RIGA = $result->fetch_assoc();
	 	switch ($_GET['id'])
	 	{
	 	
	 		
	 		case $RIGA['CODICE_ATTIVAZIONE']:
	 			$comandoSQL="update utenti set ATTIVO='1' where EMAIL='".$RIGA['EMAIL']."';";
	 			$q = $mysqli->query($comandoSQL);
	 			$mysqli->close();
	 			//$result=mysqli_query($conn,$comandoSQL);
	 			break;
	 	
	 	}
	 }
	 ?>
 
<script>
$(window).load(function(){
    $('#myModal').modal('show');
});
</script>
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>

</body>
</html>