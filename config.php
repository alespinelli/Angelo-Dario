<?php
/*Simula sessione utente*/
//$_SESSION['loggeduserid']=1;


$config = array(
    "paths" => array(
         "images" => array(
         	"content" => $_SERVER["DOCUMENT_ROOT"] . "/img/content",
         	"layout" => $_SERVER["DOCUMENT_ROOT"] . "/img/layout",
         	"profile" => $_SERVER["DOCUMENT_ROOT"] . "/img/profile"
        )
    )
);

/*
    Creazione di costanti per percorsi notevoli, usati di frequente (se spostiamo la cartella basta cambiare l'indirizzo qui):
    
    ex. include(TEMPLATES_PATH . "/navbar.php")
    per inserire la navbar
*/
defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", 'templates');

defined("METHODS_PATH")
    or define("METHODS_PATH", 'methods');
    

/*Funzione di stampa dialoghi di errore*/
if(!function_exists('print_diag')) {
	function print_diag($d){
		
		return "<div class='alert alert-warning'>
	      	<span class='glyphicon glyphicon-info-sign'></span> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					&nbsp;". $d ."</div>";
	}
}

/*Funzione di stampa dialoghi di errore*/
if(!function_exists('print_successdiag')) {
	function print_successdiag($d){

		return "<div class='alert alert-success'>
	      	<span class='glyphicon glyphicon-ok'></span> <a href='#' class='close' data-dismiss='success' aria-label='close'>&times;</a>
					&nbsp;". $d ."</div>";
	}
}

/*Funzione di conversione date per l'inserimento nel database*/
if(!function_exists('convertiData')){
	function convertiData($dataEur){
		$rsl = explode ('/',$dataEur);
		$rsl = array_reverse($rsl);
		return implode($rsl,'-');
	}
}


/*
    Report degli errori in fase di debug:
*/
//ini_set("error_reporting", "true");
//error_reporting(E_ALL|E_STRCT);

/*
 * IN FASE DI DEPLOY DISATTIVO L'ERROR REPORTING
 *  
 * ini_set("error_reporting", "true");
 * error_reporting(E_ALL|E_STRCT);
*/
?>
