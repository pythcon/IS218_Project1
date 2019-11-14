<html>
	<head>
		<title>IS218 Project 1 New Question Form</title>
	</head>
	<body>
	<style>
		//body{
		//	background-color: #cfb53b;
		//}
	</style>
		<div align=center>
			<h2>IS218 Project 1 New Question Form</h2>
        
        	<br>
        	<br>
        	<br>
        	<br>
        	<br>
        
        	<div align = center style="background-color:#663399;width:19%;border-radius:15px;margain:0 auto;">
                	<br>
	    		<div style="max-width:90%;">
	    		<form action = "login.php" method=post>
                		<fieldset id="field"><legend>New Question Form</legend>
                    
                        <?php
                            //error reporting code
                            error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
                            ini_set('display_errors' , 1);

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
