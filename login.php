<html>
	<head>
		<title>IS218 Project 1 Login</title>
        <link rel="stylesheet" href="css/style.css">
	</head>
    <body>
        <div class="mainContainer">
            <h2>IS218 Project 1 Login</h2>
        	<div>
                <div class="formContainer">
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
                                
                                //PDO
                                $dsn = "mysql:host=$db_hostname;dbname=$db_username";
                                try {
                                    $db = new PDO($dsn, $db_username, $db_password);
                                    echo "Connected successfully<br>";
                                    $sql = "SELECT * FROM accounts WHERE email = '$email'";
                                    $q = $conn->prepare($sql);
                                    $q->execute();
                                    $results = $q->fetchAll();
                                    if($q->rowCount() > 0){
                                        $out = "Congrats. You made it! Here is your data:<br>";
                                        $out .= "Email: ".$email."<br>";
                                        $out .= "Password: ".$pass;
                                        
                                        $sql = "SELECT * FROM questions where owneremail='$email'";
                                        $q = $conn->prepare($sql);
                                        $q->execute();
                                        $results = $q->fetchAll();
                                        
                                        echo "<table border='2px;'>";
                                        echo "<tr><td>Title</td><td>Body</td><td>Skills</td></tr>";
                                        for ($results as $row){
                                            echo "<tr>";
                                            echo "<td>."$row["title"]."</td><td>."$row["body"]".</td><td>.$row["skills"].</td>";
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                        
                                    }else{
                                        die ("Account not found.");
                                    } 
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
