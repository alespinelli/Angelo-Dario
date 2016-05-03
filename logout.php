<?php
session_start();

//$_SESSION['loggeduser']->logout();
unset($_SESSION['loggeduser']);

session_destroy();

Header("Location: home.php");
$diag = "Hai effettuato il logout con successo."


?>