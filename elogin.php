<?php
	session_start();
  //include_once 'configurazioneDB.php';
  include_once 'confDatabase.php';
  $db = Database::getInstance();
  $mysqli = $db->getConnection();
  
  //Controllo che i dati siano arrivati tramite POST
  if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
	  	//ok la pagina è stata davvero richiamata dalla form
	  
	  	//recupero il contenuto della textbox email
	  	$email = $_POST['email'];
	  
	  	//... e quello della textbox password
	  	$psw = $_POST['psw'];
	  	
	  	
	  	
	  	//=====================DA QUESTO PUNTO IN POI C'E' LA COMUNICAZIONE CON IL DB============================
	  	if($_POST['tipoLog']==='azienda'){
		  	//RICERCO LA MAIL NELLA TABELLA AZIENDA
		  	$comandoSQL =
		  	//"SELECT ID,EMAIL,PWD,ATTIVO FROM aziende JOIN utenti on ID_UTENTE=ID where EMAIL ='" . $email ."' AND PWD=PASSWORD('".$psw."')";
		  	"SELECT ID,EMAIL,PWD,ATTIVO FROM aziende JOIN utenti on ID_UTENTE=ID where EMAIL ='" . $email ."' AND PWD='".$psw."'";
		//  	echo $comandoSQL;
		  	$q = $mysqli->query($comandoSQL);
		  	//$risultatoRicercaEmail = @mysqli_query($conn, $comandoSQL);
		  	if(	$riga = $q->fetch_assoc())//la query ha avuto successo	
		  		$autenticato=true;
		  	else
		  		$autenticato=false;
		  			  	  	
		  			//redirect
		  			if($autenticato)
		  			{		if($riga['ATTIVO']){
			  				$_SESSION['id']=$riga['ID'];
			  				header("Location: Menu.php");
		  				}
		  				else{

		  					header("Location: index.php?err=2");
		  					$mysqli->close();
		  				}
		  				
		  			}
		  			else{
		  				header("Location: index.php?err=1");
		  			 	exit; 
		  				}
			  	}
		else if($_POST['tipoLog']==='utente')
		{
			//RICERCO LA MAIL NELLA TABELLA UTENTI
			$comandoSQL =
			"SELECT ID,EMAIL,PWD,ATTIVO FROM persone JOIN utenti on ID_UTENTE=ID where EMAIL ='" . $email ."' AND PWD=PASSWORD('".$psw."')";
			//"SELECT ID,EMAIL,PWD,ATTIVO FROM persone JOIN utenti on ID_UTENTE=ID where EMAIL ='" .$email ."' AND PWD='".$psw."'";
			echo $comandoSQL;
			$q = $mysqli->query($comandoSQL);
		  	//$risultatoRicercaEmail = @mysqli_query($conn, $comandoSQL);
		  	if(	$riga = $q->fetch_assoc())//la query ha avuto successo	
		  		$autenticato=true;
		  	else
		  		$autenticato=false;
		  		
		  	
		  			//redirect
		  			if($autenticato)
		  			{
		  				if($riga['ATTIVO']){
			  				$_SESSION['id']=$riga['ID'];
			  				header("Location: Menu.php");
		  				}
		  				else{
		  					header("Location: index.php?err=2");
		  					$mysqli->close();
		  				}
		  				
		  			}
		  			else{
		  				header("Location: index.php?err=1");
		  			 	exit; 
		  				}
			  	
			
		
		}
		else{
			header("Location: index.php?err=3");
			exit;
			}
	}
	else
	{
		header("Location: index.php"); 
		exit;
	}
 ?>