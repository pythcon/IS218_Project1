<html>
	<head>
		<title>IS218 Project 1 Login</title>
	</head>
	<body>
	<style>
		//body{
		//	background-color: #cfb53b;
		//}
	</style>
		<div align=center>
			<h2>IS218 Project 1 Login</h2>
        
        	<br>
        	<br>
        	<br>
        	<br>
        	<br>
        
        	<div align = center style="background-color:#663399;width:19%;border-radius:15px;margain:0 auto;">
                	<br>
	    		<div style="max-width:90%;">
	    		<form action = "login.php" method=post>
                		<fieldset id="field"><legend>Login</legend>
                    
                        <?php
                            //error reporting code
                            error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
                            ini_set('display_errors' , 1);

                            $firstName = $_POST ['firstName'];
                            $lastName = $_POST ['lastName'];
                            $birthday = $_POST ['birthday'];
                            $email = $_POST ['email'];
                            $pass = $_POST ['pass'];
                            $valid = false;
                            
                            //Check First Name for requirements
                            if (empty($firstName) || $valid){
                                $out .= "First Name cannot be empty!<br>";
                                $valid = false;
                            }
                            
                            //Check Last Name for requirements
                            if (empty($lastName)){
                                $out .= "Last Name cannot be empty!<br>";
                                $valid = false;
                            }
                            
                            //Check Birthday for requirements
                            if (empty($birthday)){
                                $out .= "Birthday cannot be empty!<br>";
                                $valid = false;
                            }

                            //Check Email for requirements
                            $contains_symbol = strpos($email, '@') !== false;

                            if (empty($email)){
                                $out .= "Email cannot be empty!<br>";
                                $valid = false;
                            }

                            if (!$contains_symbol){
                                $out .= "Email does not contain @ symbol!<br>";
                                $valid = false;
                            }

                            //Check Password for requirements
                            if (empty($pass)){
                                $out .= "Password cannot be empty!<br>";
                                $valid = false;
                            }
                            if (strlen($pass) <= 8){
                                $out .= "Password must be at least 8 characters!<br>";
                                $valid = false;
                            }

                            //if they made it past the checks
                            if ($valid){
                                $out = "Congrats. You made it!";
                            }
                            
                            //print out
                            print "<span>$out</span>";
                        ?>


                		</fieldset>

            		</form>
	    		<br>
	     		</div>
        	</div>
        	</div>
	</body>
</html>