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
                            
                            include("account.php");

                            $email = $_POST ['email'];
                            $pass = $_POST ['pass'];
                            $out = "";
                            $valid = true;

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
                            /*if (strlen($pass) < 8){
                                $out .= "Password must be at least 8 characters!<br>";
                                $valid = false;
                            }*/

                            //if they made it past the checks
                            if ($valid){
                                
                                $db = mysqli_connect($hostname, $username, $password, $project);

                                if (mysqli_connect_errno()){	  
                                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                    exit();
                                }
                                print "Successfully connected to MySQL.<br>";
                                mysqli_select_db($db,$project);
                                
                                $s = "SELECT * FROM accounts WHERE email = '$email'";
                                $t = mysqli_query($db, $s) or die("Error Querying Database.");
                                $num_rows = mysqli_num_rows($t);
                                
                                if ($num_rows>0){
                                    $out = "Congrats. You made it! Here is your data:<br>";
                                    $out .= "Email: ".$email."<br>";
                                    $out .= "Password: ".$pass;
                                    
                                    $s = "SELECT * FROM questions where owneremail='$email'";
                                    
                                    $t = mysqli_query($db, $s) or die("Error Querying Database.");
                                    
                                    echo "<table border='2px;'>";
                                    echo "<tr><td>Title</td><td>Body</td><td>Skills</td></tr>";
                                    while ( $r = mysqli_fetch_array($t,MYSQLI_ASSOC) ) {
                                        $title 				= $r[ "title" ];
                                        $body     	        = $r[ "body" ];
                                        $skills             = $r[ "skills" ];
                                        
                                        echo "<tr>";
                                        echo "<td>$title</td><td>$body</td><td>$skills</td>";
                                        echo "</tr>";
                                    }
                                    echo "</table>";
                                    
                                }
                                else{
                                    die();
                                }
                                
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
