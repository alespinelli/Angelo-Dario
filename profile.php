<?php 
define("INCLUDING", 'TRUE');
require_once('config.php');
require_once(METHODS_PATH . '/profile.query.php');
require_once (METHODS_PATH . '/idea.card.php');
?>

<!DOCTYPE html>
<html>

<head>
  <title> <?php echo  $data['NOME']." ".$data['COGNOME'];?> | Borsa delle Idee</title>
  <?php include(TEMPLATES_PATH.'/head.php'); ?>
</head>

<body>

<div class="container">
	
	<?php include (TEMPLATES_PATH.'/navbar.php');?>	
		<div class="col-md-3">
		<div class="user-data well panel panel-default">
		<img class="profile-user-img img-responsive center-block" src=' 
			<?php
			if($data['FOTO'])
				echo "img/profile/". $data['FOTO'];
			else
				echo 'img/profile/default.png';
			?>
			' alt='Foto profilo'>
		<h5 class="text-capitalize"><?php echo  $data['NOME']." ".$data['COGNOME'];?></h5>
		
		<h6><?php if($data['LAVORO']){
        	echo $data['LAVORO'];
			if($data['AZIENDA'])
					echo " presso ".$data['AZIENDA'];}
        	else echo "\r\n";?></h6>
		<ul class="list-group">
        	<li class="list-group-item">
        		<b>Idee pubblicate</b> <a class="pull-right"><?php echo $nideepub;?></a>
            </li>
            <li class="list-group-item">
            	<b>Idee seguite</b> <a class="pull-right"><?php echo $nfollowed;?></a>
            </li>
            <li class="list-group-item">
            	<b>Reputazione</b> <a class="pull-right">
            	<?php 
                      echo $rep;?></a>
            </li>
        </ul>

        <?php 
		if(isset($_SESSION['loggeduser']) && $_SESSION['loggeduser']->isLoggedIn()){
        	if ($_SESSION["loggeduser"]->getid() !== $id){?>
        		
        		<a href="#" class="btn btn-primary btn-block"><b>Contatta</b></a>
        		
	    	<?php }
        }
	    
	    ?>
		<!-- AddToAny BEGIN -->
		<a class="a2a_dd btn btn-primary btn-block" href="https://www.addtoany.com/share">Condividi</a>
		<script async src="https://static.addtoany.com/menu/page.js"></script>
		<!-- AddToAny END -->
		</div>
		
		<div class="user-info well panel panel-default">
                  <strong><i class="fa fa-book margin-r-5"></i>  Educazione</strong>
                  <p>
                    <?php 
                      if($data["EDUCAZIONE"])
                      	echo $data["EDUCAZIONE"];
                      else echo "-";?>
                  </p>

                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i> Località</strong>
                  <p>
                  <?php
                  	if($data['CITTA'] OR $data['NAZIONE'])
                  		echo $data['CITTA'].", ".$data['NAZIONE'];
                  	else echo "-";?></p>

                  <hr>

                  <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
                  <p>
                  <?php
               	  foreach ($skills as  $skill => $tag){                  		 
                  	echo "<span class='label label-primary'>". $tag['COMPETENZA'].  '</span>';
                  }
                  ?>
                  </p>

                  <hr>

                  <strong><i class="fa fa-file-text-o margin-r-5"></i> Informazioni aggiuntive</strong>
                  <p>
                  <?php
                  if($data['INFO'])
                  	echo $data['INFO'];
                  else echo "-";?>
                  </p>
				
				</div>
		</div>
	
		<div class="col-md-9">
		<div class="panel panel-default">
			<ul class="nav nav-tabs">
				<li role="presentation" class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
						Idee <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#IdeePubblicate" data-toggle='tab'>Pubblicate</a></li>
						<li><a href="#IdeeSeguite" data-toggle='tab'>Seguite</a></li>						
				  	</ul>
			  </li>
			  <li><a href="#Feedback" data-toggle='tab'>Feedback</a></li>
			</ul>
		<div class="panel-body main-panel">
	        <div class="tab-content">
		        <div class="tab-pane fade in active" id="IdeePubblicate">
			        <?php  /*ZONA IDEE PUBBLICATE */
			        foreach($ideep as $array => $idea){
			        	
			        	ideaprint(1,$idea['TITOLO'],$idea['DESCRIZIONE'],"http://placehold.it/1024x1280");
	
			        }
			        if(!$ideep)
			        	echo "Nessuna idea pubblicata.";
			        
			        ?>
			        </div>
			    
				<div class="tab-pane fade" id="IdeeSeguite">
			        <?php /*ZONA IDEE SEGUITE */
			        foreach($idees as $array => $idea){
				        
			        	ideaprint(1,$idea['TITOLO'],$idea['DESCRIZIONE'],"http://placehold.it/370x150");
			        	
			        }
			        if(!$idees)
			        	echo "Nessuna idea seguita.";
			        ?>
			    </div>
			    
		        <div class="tab-pane fade" id="Feedback">
		        <?php /* FEEDBACK UTENTE */
		        if($feedback){
		        foreach ($feedback as  $list=>$feed){
			        //Set del colore
			        if($feed['VOTO']>3)
			        	$fcolor= "feedback-positive";
			        else if($feed['VOTO']==3)
			        	$fcolor= "feedback-neutral";
			        else
			        	$fcolor= "feedback-negative";
			        //Stampa riga 
	                echo "<div class='row'>
	  						<div class='alert " .$fcolor ." feedback-box'>
							<div class='row feedback-description'>".$feed['DESCR']."</div>
								<div class='row feedback-giver text-right'>".$feed['VOTO']."/5 - <a href='profile.php?id=".$feed['REFERENTE']."'>".$feed['NOME']." ".$feed['COGNOME']."</a> su <a href='idea.php?id=".$feed['IDEA']."'>".$feed['TITOLO']."</a></div>
							</div>							
							</div>";
			        }
		        }
		        //In assenza di feedback:
                else
                	echo "<p>Nessun Feedback ricevuto.</p>"
		        
		        ?>
		        </div>
		        
        	</div>
        </div>	
			
		</div>
		</div>
		
	
	
		

</div>

</body>
<?php include (TEMPLATES_PATH.'/footer.php');
	?>
</html>
