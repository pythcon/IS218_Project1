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
                            $position = 0;
                            $counter = 0;
                            $skills = array();
                            
                            //Parse array
                            $containsComma = strpos($questionSkills, ',') !== false;
                            
                            if ($containsComma){
                                while (strpos($questionSkills, ',', $position) !== false){
                                    $commaAt = strpos($questionSkills, ',', $position);
                                    $position = $commaAt;
                                    $skills[$counter] = substr($questionSkills, $position, $commaAt);
                                    $counter++;
                                }
                                
                            }else{
                                $out .= "Two Skills must be entered!";
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
                            
                            //Check Question Skills for requirements
                            if ($questionSkills.length <= 2){
                                $out .= "There must be at least 2 skills!<br>";
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
