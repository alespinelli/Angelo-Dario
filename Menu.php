<?php
session_start();
define("INCLUDING", 'TRUE');
include('config.php');
//include_once 'configurazioneDB.php';		
include_once 'confDatabase.php';

$db = Database::getInstance();
$mysqli = $db->getConnection();

// controllo se ¬è stato impostato l id per evitare che accedano direttamente senza fare il login
if( !isset($_SESSION['id']) )
	header("Location: index.php");
	
// Ricavo tutte le informazioni sull azienda che mi interessa tramite l id
$sql = "SELECT * FROM UTENTI JOIN AZIENDE ON ID_UTENTE=ID WHERE ID='".$_SESSION['id']."'";
$result=$mysqli->query($sql);
$dati=$result->fetch_assoc();
// tutti i dati son messi nelll array dati

//prendo tutte le informazioni riguradanti i contatti
$SQLcont="SELECT * FROM CONTATTI JOIN AZIENDE ON ID_UTENTE=PROPRIETARIO WHERE PROPRIETARIO='".$_SESSION['id']."'";
$result_cont=$mysqli->query($SQLcont);
// tutti i valori saranno memorizzati nell array dati_cont
$dati_cont=$result_cont->fetch_assoc();

//per sapere le province
$SQLprov="SELECT * FROM PROVINCE WHERE CODICE='".$dati['PROVINCIA']."'";
$result_prov=$mysqli->query($SQLprov);
// tutti i valori saranno memorizzati nell array dati_prov
$dati_prov=$result_prov->fetch_assoc();

// per conoscere le persone che lavorano nell azienda
$SQLpers="SELECT NOME,COGNOME,INFO,FOTO FROM PERSONE JOIN AZIENDE A ON A.ID_UTENTE=AZIENDA WHERE AZIENDA='".$_SESSION['id']."'";
$result_pers=$mysqli->query($SQLpers);
//per le idee sviluppate dagli utenti dell azienda
$SQLidee="SELECT TITOLO,P.ID_UTENTE FROM IDEE JOIN PERSONE P ON CREATORE=P.ID_UTENTE JOIN AZIENDE A ON AZIENDA=A.ID_UTENTE WHERE A.ID_UTENTE='".$_SESSION['id']."'";
$result_idee=$mysqli->query($SQLidee);
?>

<!DOCTYPE html>
<html>
<head>
  <title> <?php echo  $data['RAGIONE_SOCIALE']?> | Borsa delle Idee</title>
  <?php include(TEMPLATES_PATH.'/head.php'); ?>
</head>

<body>

<div class="container">

<?php include (TEMPLATES_PATH.'/navbar.php');?>	
<div class="col-md-3">
		<div class="user-data well panel panel-default">
		<img class="profile-user-img img-responsive center-block" src="immagini\nala.jpg">
			<?php/*
			if($data['FOTO'])
				echo "img/profile/". $data['FOTO'];
			else
				echo 'img/profile/default.png';*/
			?>
			' alt='Foto profilo'>
			<h5 class="text-capitalize"><?php echo $dati['RAGIONE_SOCIALE']?></h5>
			
			<h6><?php if($dati['NAZIONE']){
        	echo $dati['NAZIONE'];
			if($dati['CITTA'])
					echo " presso ".$dati['CITTA'];}
        	else echo "\r\n";?></h6>
          	<hr>
	       		<p> <b><i class='fa fa-lightbulb-o margin-r-5'></i>Idee</b>
	<?php	echo "<br>";
	 while ($row1=mysqli_fetch_assoc($result_idee)){
        echo $row1['TITOLO']."<br>";
        
	 }
  					     ?>
  					     </p>
  					</a>
  					<hr>
            <p>
            	<b><i class='fa fa-envelope margin-r-5'></i>Email</b> 
            	<?php 
            			echo "<br>";
                      echo $dati['EMAIL'];?></a>
</p>
<hr>
        <?php 
        if(isset($_SESSION['ID'])){
        	
        			echo '<a href="#" class="btn btn-primary btn-block"><b>Contatta</b></a>';
        }
	    
	    ?>	
	    <!-- AddToAny BEGIN -->
		<a class="a2a_dd btn btn-primary btn-block" href="https://www.addtoany.com/share">Condividi</a>
		<script async src="https://static.addtoany.com/menu/page.js"></script>
		<!-- AddToAny END -->
		</div>
			<div class="user-info well panel panel-default">
			 <?php 
                     	if( !($dati_cont['TELEFONO']==0) ) // gli if mi permettono di non mostrare nulla nel caso questi campi non siano presnti nel db
                echo "<strong><i class='fa fa-phone margin-r-5'></i> Telefono</strong>
                  <p>".$dati_cont['TELEFONO']."
                  </p><hr>";	?>

			 <?php 
                     	if( !($dati_cont['CELLULARE']==0) ) // gli if mi permettono di non mostrare nulla nel caso questi campi non siano presnti nel db
                echo "<strong><i class='fa fa-mobile margin-r-5'></i> Cellulare</strong>
                  <p>".$dati_cont['CELLULARE']."
                  </p><hr>";	?>

			 <?php 
                     	if( !($dati_cont['FAX']==NULL) ) // gli if mi permettono di non mostrare nulla nel caso questi campi non siano presnti nel db
                echo "<strong><i class='fa fa-fax margin-r-5'></i> Fax</strong>
                  <p>".$dati_cont['FAX']."
                  </p><hr>";	?>

			 <?php 
                     	if( !($dati_cont['FACEBOOK']==NULL) ) // gli if mi permettono di non mostrare nulla nel caso questi campi non siano presnti nel db
                echo "<strong><i class='fa fa-facebook margin-r-5'></i> Facebook</strong>
                  <p>".$dati_cont['FACEBOOK']."
                  </p><hr>";	?>

			 <?php 
                     	if( !($dati_cont['LINKEDIN']==NULL) ) // gli if mi permettono di non mostrare nulla nel caso questi campi non siano presnti nel db
                echo "<strong><i class='fa fa-linkedin margin-r-5'></i> Linkedin</strong>
                  <p>".$dati_cont['LINKEDIN']."
                  </p><hr>";	?>

			 <?php 
                     	if( !($dati_cont['TWITTER']==NULL) ) // gli if mi permettono di non mostrare nulla nel caso questi campi non siano presnti nel db
                echo "<strong><i class='fa fa-twitter margin-r-5'></i> Twitter</strong>
                  <p>".$dati_cont['TWITTER']."
                  </p><hr>";	?>
                  
 			 <?php 
                     	if( !($dati_cont['SITO_WEB']==NULL) ) // gli if mi permettono di non mostrare nulla nel caso questi campi non siano presnti nel db
                echo "<strong><i class='fa fa-link margin-r-5'></i> Sito</strong>
                  <p>".$dati_cont['SITO_WEB']."
                  </p>";	?>                         	                 	
				</div>
				  <div class="container"> 
     		<a href="modificaAz.php" class="btn btn-info" role="button">Modifica</a>
     		</div>
		</div>

		<div class="col-md-9">
		<div class="panel panel-default">
			<ul class="nav nav-tabs">
				<li role="presentation" class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class='fa fa-lightbulb-o margin-r-5'></i>
						Idee <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#IdeeAzienda" data-toggle='tab'>dell'Azienda</a></li>
						<li><a href="#IdeeUtenti" data-toggle='tab'>degli Utenti</a></li>		
				  	</ul>
				  	</li>
				  	<li><a href="#Sede" data-toggle='tab'><i class='fa fa-home margin-r-5'></i> Sede</a></li>	
				  	<li><a href="#Utenti" data-toggle='tab'><i class='fa fa-user margin-r-5'></i> Utenti</a></li>	
				  	</ul>
				  	
<!--  Quello che si visualizza se clicchiamo su SEDE -->
		<div class="panel-body main-panel">	
		<div class="tab-content">			  	
		        <div class="tab-pane" id="Sede">
		        <?php 
		         echo "L'azienda:<b> ".$dati['RAGIONE_SOCIALE']."</b> ha sede in ".$dati['NAZIONE'].".";
		       echo "<br>";
		       echo "La sede è a ".$dati['CITTA']." che è in provincia di ".$dati_prov['NOME'].". La regione è :".$dati['REGIONE'];
		        echo "<br>";
		        echo "L'indirizzo è: <b>".$dati['INDIRIZZO']."</b><br>";
		        echo "cap:".$dati['CAP']."partita iva: ".$dati['PARTITA_IVA'];
		       ?>
		       </div>
		     <!-- Quello che si visualizza cliccando su UTENTI -->  
	        <div class="tab-pane" id="Utenti">		       
				<div class="col-sm-12">
					   <?php while($row=mysqli_fetch_assoc($result_pers)){
   							   echo ' <div class="row">
     							   <div class="col-sm-3">
      								    <div class="well">
     								      <p>'.$row["NOME"].$row["COGNOME"].'</p>
     								      <img src="img/profile/'; 
   							   				if($row[FOTO]==NULL) 
   							   					echo 'default.png';
   							   					else echo $row[FOTO];
   							   					echo '" class="img-circle" height="55" width="55" alt="Avatar">
    								     </div>
    							    </div>
     								   <div class="col-sm-9">
          								<div class="well">
          								<p>';
   							   				if($row["INFO"]==NUll)
   							   				echo "Nesuna descrizione";
   							   				else echo $row["INFO"];
   							   				
   							   echo '</p>
         								   
    							    	  </div>
      								  </div>
   							   </div>
   							   ';
   							   }
   							   ?>			   
  				</div>
  	</div>
  	
  		<!-- panello su Idee PUBBLICATE -->
		        <div class="tab-pane " id="IdeeAzienda">
			        <?php  /*ZONA IDEE PUBBLICATE */
			        foreach($ideep as $array => $idea){
			        	
			        	ideaprint(1,$idea['TITOLO'],$idea['DESCRIZIONE'],"http://placehold.it/1024x1280");
	
			        }
			        if(!$ideep)
			        	echo "Nessuna idea pubblicata dall'azienda.";
			        
			        ?>
			        </div>
	
		<!-- pannello sulle ide SEGUITE -->
				<div class="tab-pane fade" id="IdeeUtente">
			        <?php /*ZONA IDEE SEGUITE */
			        foreach($idees as $array => $idea){
				        
			        	ideaprint(1,$idea['TITOLO'],$idea['DESCRIZIONE'],"http://placehold.it/370x150");
			        	
			        }
			        if(!$idees)
			        	echo "Nessuna idea pubblicata dagli utenti.";
			        ?>
			    </div>
			    
		</div>
        	</div>
        </div>	



<?php include (TEMPLATES_PATH.'/footer.php');
	?>
</body>

</html>
