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
                                
                                //PDO
                                //PDO
                                $dsn = "mysql:host=$db_hostname;dbname=$db_username";
                                try {
                                    $db = new PDO($dsn, $db_username, $db_password);
                                    echo "Connected successfully<br>";
                                    $sql = "SELECT * FROM accounts";
                                    $q = $conn->prepare($sql);
                                    $q->execute();
                                    $results = $q->fetchAll();
                                    $num_rows = $q->rowCount()
                                    
                                    $sql = "INSERT INTO accounts VALUES($num_rows+1, '$email', '$firstName', '$lastName', '$birthday', '$pass')";
                                    $q = $conn->prepare($sql);
                                    $q->execute();
                                    $results = $q->fetchAll();
                                    
                                    $q->closeCursor();
                                    
                                    
                                } catch(PDOException $e) {
                                    echo "Connection failed: " . $e->getMessage();
                                }
                            }
                            
                            //print out
                            print "<span>$out</span>";
                        ?>
                </div>
        	</div>
        </div>
	</body>
</html>
