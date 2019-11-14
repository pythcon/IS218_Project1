<html>
	<head>
		<title>IS218 Project 1 Account Page</title>
        <link rel="stylesheet" href="css/style.css">
	</head>
    <body>
        <div class="mainContainer">
            <h2>IS218 Project 1 Account Page</h2>
        	<div>
                <div class="formContainer">
                    <?php
                            session_start();
                            //error reporting code
                            error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
                            ini_set('display_errors' , 1);
                            
                            include("account.php");
                            
                            if (!$_SESSION['logged']){
                                echo"
                                <script>
                                    alert(\"Not logged in...\");
                                    window.location.replace(\"login.html\");
                                </script>";
                                exit();
                            }
                    
                            $email = $_SESSION['email'];
                    
                            $out = "Welcome, <b>".$_SESSION['firstName']. " " .$_SESSION['lastName']. "</b>, Here is your question data:<br>";
                    
                            //PDO
                            $dsn = "mysql:host=$db_hostname;dbname=$db_username";
                            try {
                                $db = new PDO($dsn, $db_username, $db_password);
                                echo "Connected successfully<br>";
                                $sql = "SELECT * FROM questions WHERE owneremail='$email'";
                                $q = $db->prepare($sql);
                                $q->execute();
                                $results = $q->fetchAll();

                                $out .= "<table border='2px'>";
                                $out .= "<tr><td>Name</td><td>Body</td><td>Skills</td></tr>";
                                foreach ($results as $row){
                                    $out .= "<tr><td>".$row['title']."</td><td>".$row['body']."</td><td>".$row['skills']."</td></tr>";
                                }
                                $out .= "</table>";
                                $out .= "<br><button onclick='questionForm()'>Question Form</button>";

                                $q->closeCursor();


                            } catch(PDOException $e) {
                                echo "Connection failed: " . $e->getMessage();
                                exit();
                            }
                               
                            //print out
                            print "<span>$out</span>";
                        ?>
                </div>
        	</div>
        </div>
	</body>
    <script src='js/buttonScript.js'></script>
</html>
