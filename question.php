<html>
	<head>
		<title>IS218 Project 1 Question</title>
        <link rel="stylesheet" href="css/style.css">
	</head>
    <body>
        <div class="mainContainer">
            <h2>IS218 Project 1 Question</h2>
        	<div>
                <div class="formContainer">
                    <?php
                            //error reporting code
                            error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
                            ini_set('display_errors' , 1);
                    
                            if (!$_SESSION['logged']){
                                echo"
                                <script>
                                    alert(\"Not logged in...\");
                                    window.location.replace(\"login.html\");
                                </script>";
                                exit();
                            }
                    
                            $email = $_SESSION['email'];
                            $id = $_SESSION['id'];
                            $date = date();

                            $questionName = $_POST ['questionName'];
                            $questionBody = $_POST ['questionBody'];
                            $questionSkills = $_POST ['questionSkills'];
                            $out = "";
                            $valid = true;
                            
                            
                            //Parse array
                            $containsComma = strpos($questionSkills, ',') !== false;
                            if ($containsComma){
                               $skills = explode(",", $questionSkills);
                            }else{
                                $out .= "Two Skills must be entered!<br>";
                                $valid = false;
                            }
                            
                            //Check Question Name for requirements
                            if (empty($questionName)){
                                $out .= "Question Name cannot be empty!<br>";
                                $valid = false;
                                
                            }
                            
                            if (strlen($questionName) <= 3){
                                $out .= "Question Name must be at least 3 characters!<br>";
                                $valid = false;
                            }
                            
                            //Check Question Body for requirements
                            if (empty($questionBody)){
                                $out .= "Question Body cannot be empty!<br>";
                                $valid = false;
                            }
                            
                            if (strlen($questionBody) <= 500){
                                $out .= "Question Body must be at least 500 characters!<br>";
                                $valid = false;
                            }

                            //if they made it past the checks
                            if ($valid){
                                $out .= "Congrats. You made it! Here is your data:<br>";
                                $out .= "<table>";
                                $out .= "<tr><td>Name: </td><td>".$questionName."</td></tr>";
                                $out .= "<tr><td>Body: </td><td><span style='font-size: 10px;'>".$questionBody."</span></td></tr>";
                                $out .= "<tr><td>Skills:</td>";
                                $out .= "<td><table>";
                                for($x = 0; $x < count($skills); $x++){
                                    $out .= "<tr><td>-</td><td>" .$skills[$x] ."</td></tr>";
                                }
                                $out .= "</table></td></tr></tabel>";
                                
                                $dsn = "mysql:host=$db_hostname;dbname=$db_username";
                                try {
                                    $db = new PDO($dsn, $db_username, $db_password);
                                    echo "Connected successfully<br>";
                                    $sql = "SELECT * FROM accounts questions";
                                    $q = $db->prepare($sql);
                                    $q->execute();
                                    $results = $q->fetchAll();
                                    
                                    $num_rows = $q->rowCount();
                                    $sql = "INSERT INTO questions VALUES ('$num_rows', '$email', '$id', '$date', '$questionName', '$questionBody', '$questionSkills')";
                                    $q = $db->prepare($sql);
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
