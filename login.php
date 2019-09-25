<?php
//error reporting code
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors' , 1);

$email = $_POST ['email'];
$pass = $_POST ['pass'];

//Check Email for requirements
$contains_symbol = strpos($email, '@') !== false;

if (empty($email)){
    print "Email cannot be empty!";
    exit();
}

if (!$contains_symbol){
    print "Email does not contain @ symbol!";
    exit();
}


//Check Password for requirements
if (empty($pass)){
    print "Password cannot be empty!";
    exit();
}
if (strlen($pass) <= 8){
    print "Password must be at least 8 characters!";
    exit();
}
?>