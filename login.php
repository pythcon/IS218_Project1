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

                            $email = $_POST ['email'];
                            $pass = $_POST ['pass'];

                            //Check Email for requirements
                            $contains_symbol = strpos($email, '@') !== false;

                            if (empty($email)){
                                $out = "Email cannot be empty!";
                                exit();
                            }

                            if (!$contains_symbol){
                                $out = "Email does not contain @ symbol!";
                                exit();
                            }


                            //Check Password for requirements
                            if (empty($pass)){
                                $out = "Password cannot be empty!";
                                exit();
                            }
                            if (strlen($pass) <= 8){
                                $out = "Password must be at least 8 characters!";
                                exit();
                            }

                            //if they made it past the checks
                            $out = "Congrats. You made it!";
                            
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
