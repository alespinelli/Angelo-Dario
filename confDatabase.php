<?php
class Database {
	private $_connection;
	private static $_instance; //The single instance
	private $_host = "localhost";
	private $_username = "root";
	private $_password = "root";
	private $_port;
	private $_database = "Prog";
	public static function getInstance() {
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	// Costruttore
	private function __construct() {

		if(isset($_ENV['VCAP_SERVICES'])){ //Se sono in ambiente bluemix, impiega di dati di accesso al db bluemix
			$vcap_services = json_decode($_ENV["VCAP_SERVICES"]);
			$db = $vcap_services->{'mysql-5.5'}[0]->credentials;
			$this->_host = $db->hostname;
			$this->_username = $db->username;
			$this->_password = $db->password;
			$this->_port = $db->port;
			$this->_database = $db->name;
				
			$this->_connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database, $this->_port);
				
		}
		else{ //Altrimenti usa i dati di accesso al database in locale
			$this->_connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
				
		}




		// Gestione errori
		if(mysqli_connect_error()) {
			trigger_error("Impossiblie connettersi al Database: " . mysqli_connect_error(),
				 E_USER_ERROR);
		}
	}
	// Metodo di clonazone nullo per evitare la duplicazione della connessione
	private function __clone() {
	}


	// getConnection ritorna la connessione al DB
	public function getConnection() {
		return $this->_connection;
	}
}
?>
