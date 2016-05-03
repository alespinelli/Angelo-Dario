<?php
session_start();
define("INCLUDING", 'TRUE');
include('config.php');
//include_once 'configurazioneDB.php';		
include_once 'confDatabase.php';
$db = Database::getInstance();
$mysqli = $db->getConnection();

 // tutti i valori modificati presi dal form di modificaW.php
//recupero tutti vi valori da inserire nella tabella AZIENDE
$rag_soc= $_REQUEST["nome"];
$cap = $_REQUEST["cap"];
$indirizzo =$_REQUEST["indirizzo"];
$citta = $_REQUEST["citta"];
$nazione = $_REQUEST["nazione"];
$provincia = $_REQUEST["provincia"];
$regione = $_REQUEST["regione"];
$p_iva=$_REQUEST["partita_iva"];

//recupero valori relativi all'immagine che serviranno anche per i controlli relativi ad essa
$img_name = $_FILES['immagine']['name'];
$img_new_name = $_SESSION['id'].'jpg';
$img_temp_name = $_FILES['immagine']['tmp_name'];
$img_dir = 'img/' . $img_new_name;
$img_err = $_FILES['immagine']['error'];
$img_size = $_FILES['immagine']['size'];
$img_ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));

//aggiorno la tabella AZIENDE
$upd_azienda="UPDATE AZIENDE SET RAGIONE_SOCIALE='$rag_soc',CAP='$cap', INDIRIZZO='$indirizzo', CITTA='$citta', NAZIONE='$nazione', REGIONE='$regione', PARTITA_IVA='$p_iva' where ID_UTENTE='$_SESSION[id]'";
$risultato_az= $mysqli->query($upd_azienda);

//Sposto immagine nella cartella del database
	//Controllo immagine
if($img_err!=UPLOAD_ERR_OK)
{
	switch ($img_err) 
	{	
		case UPLOAD_ERR_INI_SIZE:
			header("Location:modificaAz.php?errore=2");
			break;
		case UPLOAD_ERR_FORM_SIZE:
			header("Location:modificaAz.php?errore=2");
			break;
		case UPLOAD_ERR_PARTIAL:
			header("Location:modificaAz.php?errore=3");
			break;
		case UPLOAD_ERR_NO_FILE:
			header("Location:modificaAz.php?errore=3");
			break;
		case UPLOAD_ERR_NO_TMP_DIR:
			header("Location:modificaAz.php?errore=3");
			break;
		case UPLOAD_ERR_CANT_WRITE:
			header("Location:modificaAz.php?errore=3");
			break;
		case UPLOAD_ERR_EXTENSION:
			header("Location:modificaAz.php?errore=1");
			break;
		default:
			header("Location:modificaAz.php?errore=3");
			break;
	}
	exit;
}
else 
{ //nessun errore di compatibilità con il sistema
	
	/*Controllo estensione  (da decidere)
	if ( !in_array($img_ext, array('jpg','jpeg','png','gif')) ) {
			header("Location:modificaW.php?errore=1");
			exit;
		}
	//Controllo dimensione (da decidere)
	if ( $size/1024/1024 > 2 ) {
			header("Location:modificaW.php?errore=2");
			exit;
		}*/

	//Spostamento effettivo
	move_uploaded_file($img_temp_name,$img_dir);
}

//recupero i valori della tabella CONTATTI
$cellulare= $_REQUEST["cellulare"];
$face=$_REQUEST["facebook"];
$fax=$_REQUEST["fax"];
$linkedin=$_REQUEST["linkedin"];
$sito=$_REQUEST["sito_web"];
$tel=$_REQUEST["telefono"];
$twit=$_REQUEST["twitter"];
//aggiorno la tabella CONTATTI
$upd_contatti="UPDATE CONTATTI SET CELLULARE='$cellulare', FACEBOOK='$face',FAX='$fax',LINKEDIN='$linkedin', SITO_WEB='$sito',TELEFONO='$tel',TWITTER='$twit' where PROPRIETARIO='$_SESSION[id]'";
$risultato_cont= $mysqli->query($upd_contatti);
//echo $upd_contatti;
//recupero la mail e aggiorno la tabella UTENTI
$email=$_REQUEST["email"];
$upd_utenti="UPDATE UTENTI SET EMAIL='$email' where ID='$_SESSION[id]'";
$risultato_utenti= $mysqli->query($upd_utenti);

	header("location: Menu.php?");


/*
//recupero l id di telefono usando l id e facendo una query per cercare tutti i dati
$sql = "SELECT * FROM azienda where id='".$_SESSION['id']."'";
$result = $conn->query($sql);
$dati = $result->fetch_assoc();
//AGGIORNO I CONTATTI 
update contatti  where proprietario=session id 
// l id del telefonolo metto in una variabile 
$idTelefono=$dati[idTel];
	// aggiorno la tabella telefoni usando l id trovato 
	$comandoSQL="update telefoni set  fax='$fax',numero='$numero', numero2='$numero2',cellulare='$cellulare'".
		" where id='$idTelefono' ";
	//inserisco i valori nella tabella azienda
	$risultato= mysqli_query($conn,$comandoSQL);
	

// racchiudo nella variabile comando, l istruzione sql per modificare i valori della tabella azienda
$comando="update azienda set email='$email', sito_web='$sito_web',cap='$cap',p_ivaOcf='$p_ivaOcf',citta='$citta',indirizzo='$indirizzo',idCat='$dati[idCat]',parlaci='$parlaci' ".
		"where id='$_SESSION[id]' ";
//eseguo l 'istruzione sql, se mi ridˆ falso do l'errore modifica 1,errore di modifica, altirmenti 2,aggiornato il db con successo.
if(!$conn->query($comando) ){
	header("location: Menu.php?modifica=1");
	}
	else {
	header("location: Menu.php?modifica=2");
	}
	$conn->close();*/
?>
