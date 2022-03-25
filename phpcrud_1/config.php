<?php
/* Database connexion */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'moina1706');
define('DB_PASSWORD', 'moina1706');
define('DB_NAME', 'phpcrud');
 
/* Connexion à la base de données */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// verifier connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>