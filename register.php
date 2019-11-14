<html>
	<head>
		<title>IS218 Project 1 Register</title>
        <link rel="stylesheet" href="css/style.css">
	</head>
    <body>
        <div class="mainContainer">
            <h2>IS218 Project 1 Register</h2>
        	<div>
                <div class="formContainer">
                    <?php
                            //error reporting code
                            error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
                            ini_set('display_errors' , 1);
                            include("account.php");

                            $firstName = $_POST ['firstName'];
                            $lastName = $_POST ['lastName'];
                            $birthday = $_POST ['birthday'];
                            $email = $_POST ['email'];
                            $pass = $_POST ['pass'];
                            $out = "";
                            $valid = true;
                            
                            //Check First Name for requirements
                            if (empty($firstName)){
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
                            if (strlen($pass) < 8){
                                $out .= "Password must be at least 8 characters!<br>";
                                $valid = false;
                            }

                            //if they made it past the checks
                            if ($valid){
                                $out = "Congrats. You made it! Here is your data: <br>";
                                $out .= "First Name: ".$firstName."<br>";
                                $out .= "Last Name: ".$lastName."<br>";
                                $out .= "Birthday: ".$birthday."<br>";
                                $out .= "Email: ".$email."<br>";
                                $out .= "Password: ".$pass."<br>";
                                
                                $db = mysqli_connect($hostname, $username, $password, $project);

                                if (mysqli_connect_errno()){	  
                                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                    exit();
                                }
                                print "Successfully connected to MySQL.<br>";
                                mysqli_select_db($db,$project);
                                
                                $s = "SELECT * FROM accounts";
                                $t = mysqli_query($db, $s) or die("Error Querying Database.");
                                
                                $num_rows = mysqli_num_rows($t);
                                
                                $s = "INSERT INTO accounts VALUES($num_rows+1, '$email', '$firstName', '$lastName', '$birthday', '$pass')";

                                $t = mysqli_query($db, $s) or die("Error Querying Database.");

                            }
                            
                            //print out
                            print "<span>$out</span>";
                        ?>
                </div>
        	</div>
        </div>
	</body>
</html>
