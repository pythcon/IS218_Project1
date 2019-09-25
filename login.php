<?php
//error reporting code
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors' , 1);

$email = $_POST ['email'];
$pass = $_POST ['pass'];

//Check Email for requirements
$contains_symbol = strpos($email, '@') !== false;
if (!$contains_symbol){
    
}

?>