<?php
    /**
    *Header content
    *Title : markquiz.php
    *Description : markquiz page for assignment 3
    *Author : Chamath Vindula
    *Date : 21/05/2018
    */
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset ="utf-8" />
		<meta name="description" content="PHP Marking script for quiz.php" />
		<meta name="keywords" content="mark,marks,php" />
		<title>Quiz Results</title>	
		<link href="styles/style.css" rel="stylesheet" />
	</head>

	<body>
			<?php
				require('header.inc');
				
				$fname = "";
				$lname = "";
				$stuID = "";
				$question1 = "";
				$question5[0] = "";
				$question8 = "";

				function sanitise_data($data){       // Function to remove uneccessary characters from text user input
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
				}

				// function to calculate the total mark for the quiz
				function Calculate_Score($question1,$question2,$question3,$question4,$question5,$question6,$question7,$question8){
					$score = 0;
					$count;
					$tempScore = 0;
					$temp = 0;
					if(strtolower($question1) == 'single page application'){$score += 2;}
					if(strtolower($question2) == 'dynamically'){$score += 2;}
					if(strtolower($question3) == 'ajax'){$score += 2;}
					if($question4 == 'CIF'){$score += 2;}


					for ($count = 0; $count < count($question5); $count++){
						if ($question5[$count] == 'Ember' || $question5[$count] == 'Angular' || $question5[$count] == 'React')
							$tempScore += 1;
					}
					if ($tempScore == 3 && $count == 3){$score += 3;}
					
					$tempScore = 0;
					
					for ($count = 0; $count < count($question6); $count++){
						if ($question6[$count] == 'HTML' || $question6[$count] == 'CSS' || $question6[$count] ==  'XML' || $question6[$count] ==  'XMLHttpRequest' || $question6[$count] ==  'JavaScript'){$tempScore += 1;}
					}	
					if ($tempScore == 5){$score += $tempScore;}	
					if($question7 == '5'){$score += 2;}
					if($question8 == '2010'){$score += 2;}	
					return $score;
				}

				// Function to check if the table exists in the database, create the database if it does not, check if user exits in the table,
				// insert the user if he does not, check the number of attempts of the user	
				function check_attempt($fname,$lname,$stuID,$score){
					$connect = ""; $result1 = ""; $result2 = "";
					$result3 = "";	$query1 = ""; $query2 = "";
					$query3 = ""; $valid = false;
					require('settings.php');
					$connect = @mysqli_connect($host, $user, $pwd, $sql_db);
					if ($connect){
						$query1 = "SHOW TABLES FROM s101887796_db";			// retrive all tables from the database
						$result1 = mysqli_query($connect,$query1);
						if(!$result1){
							echo "<p>Cannot retrieve attempts table from database.</p>";
						}
						else{
							while($row1 = mysqli_fetch_row($result1)){		
								if(!($row1[0] == 'attempts')){				// check if the table 'attempts' exits in the database
									$query2 = "CREATE TABLE attempts(Attempt_id INT AUTO_INCREMENT PRIMARY KEY, Date_Of_Attempt DATE NOT NULL,
											  Time_Of_Attempt TIME NOT NULL, First_Name VARCHAR(20) NOT NULL, Last_Name VARCHAR(20) NOT NULL, 
											  Student_ID INT NOT NULL, Number_Of_The_Attempt INT, Score INT)";
									$result2 = mysqli_query($connect, $query2);
								}
							}
							mysqli_free_result($result1);	
						}	
					}
					else{ 
						echo "<p>Cannot connect to the server!</p>";
					}

					$attempt = 0; 
					$date = date("Y-m-d");
					$time = date("h:i:s");
					if ($result2){
						echo "<p>Table created you are new here</p>";
						$saveUser = "INSERT INTO attempts VALUES(null,'$date','$time','$fname','$lname',$stuID,1,$score)"; // insert user to table if table
						$tempResult = mysqli_query($connect,$saveUser);													   // was created now
						$attempt += 0;
						$valid = true;
					}
					else{		
						$query3 = "SELECT Number_Of_The_Attempt FROM attempts WHERE Student_ID = $stuID";
						$result3 = mysqli_query($connect, $query3);
						if ($result3){
							While($row2 =  mysqli_fetch_assoc($result3)){
								if ($row2['Number_Of_The_Attempt'] > $attempt){		// check the maximum number of the current user's attempt
									$attempt = $row2['Number_Of_The_Attempt'];
								} 
							}	
						}
						//assigns an outcome query to the table depending on the user attempt
						if ($attempt == 0){
							$saveUser = "INSERT INTO attempts VALUES(NULL,'$date','$time','$fname','$lname',$stuID,1,$score)";
							$tempResult = mysqli_query($connect,$saveUser);
							$valid = true;
						}

						if ($attempt == 1){
							$saveUser = "INSERT INTO attempts VALUES(null,'$date','$time','$fname','$lname',$stuID,2,$score)";
							$tempResult = mysqli_query($connect,$saveUser);
							$valid = true;
						}

						if ($attempt == 2){
							$saveUser = "INSERT INTO attempts VALUES(null,'$date','$time','$fname','$lname',$stuID,3,$score)";
							$tempResult = mysqli_query($connect,$saveUser);
							$valid = true;
						}

						if ($attempt == 3){
							echo "<p>U have reached your maximum number of attempts!</p>";
						}
					}
					// if no. of attempts is less than or equal to 3 then the attempt details are displayed
					if ($valid){
						echo "<p>Student name : ",$fname," ",$lname,"</p>";
						echo "<p>Student ID - ",$stuID,"</p>";
						echo "<p>Attempt number - ",$attempt+1,"</p>";
						echo "<p>Score - ",$score,"</p>";
						echo "<p><a href= 'quiz.php' class='enhancement_link1'>Try again</a></p>";
					}	
				}	

				// getting all user input from the form into php and assigning them to variables
				if (isset($_POST["first_Name"])){
					$fname = $_POST["first_Name"];
					$fname = sanitise_data($fname);
				}else{
					header("location: quiz.php");
				}
				if (isset($_POST["Last_Name"])){
					$lname = $_POST["Last_Name"];
					$lname = sanitise_data($lname);
				}else{
					header("location : quiz.html");
				}
				if (isset($_POST["Student_Number"])){
					$stuID = $_POST["Student_Number"];
					$stuID = sanitise_data($stuID);
				}else{
					header("location : quiz.html");
				}

				//if the user has entered invalid use details or anwsers then error text is generated here
				$errMsg = "";

				if($fname == ""){
					$errMsg .= "<p>You must enter your first name.</p>";
				}
				else if (!preg_match("/^[a-zA-Z -]*$/", $fname)){
					$errMsg .= "<p>Only alpha letters, hyphen and space are allowed in your first name.</p>";
				}
				else if (strlen($fname) > 20){
					$errMsg .= "<p>Your first name must be less than 20 characters.</p>";
				}
				
				if($lname == ""){
					$errMsg .= "<p>You must enter your last name.</p>";
				}
				else if (!preg_match("/^[a-zA -]*$/", $lname)){
					$errMsg .= "<p>Only alpha letters, hyphen and space are allowed in your last name.</p>";
				}
				else if (strlen($lname) > 20){
					$errMsg .= "<p>Your last name must be less than 20 characters.</p>";
				}
		
				if($stuID == ""){
					$errMsg .= "<p>You must enter your student ID.</p>";
				}
				else if (!preg_match("/^([0-9]{7}|[0-9]{10})$/", $stuID)){
					$errMsg .= "<p>Your student ID must consist of 7 or 10 numeric characters.</p>";
				}
				// if the user has not given anwsers to questions, error messages are generated here
				if (isset($_POST["SPA_Definition"])){
					$question1 = $_POST["SPA_Definition"];
					if ($question1 == ""){
						$errMsg .= "<p>Please anwser the first SPA question!</p>";
					}
					else{
						$question1 = sanitise_data($question1);
					}
				}
				else{
					header("location: quiz.php");
				}

				if (isset($_POST["Fill_Blank1"])){
					$question2 = $_POST["Fill_Blank1"];
					if ($question2 == ""){
						$errMsg .= "<p>Please anwser the second SPA question!</p>";
					}
					else{
						$question2 = sanitise_data($question2); 
					}
				}
				else{
					header("location: quiz.php");
				}

				if (isset($_POST["Fill_Blank2"])){
					$question3 = $_POST["Fill_Blank2"];
					if ($question3 == ""){
						$errMsg .= "<p>Please anwser the third SPA question!</p>";
					}
					else{
						$question3 = sanitise_data($question3);
					}
				}
				else{
					header("location: quiz.php");
				}

				if (isset($_POST["Data_Interchange_Format"])){
					$question4 = $_POST["Data_Interchange_Format"];
				}
				else {
					$errMsg .= "<p>Please select an anwser for the 'data interchange format' question</p>";
				}

				if (isset($_POST["JS_frameworks"])){
					$question5 = $_POST["JS_frameworks"];
				}
				else {
					$errMsg .= "<p>Please select an anwser for the 'JavaScript frameworks' question</p>";
				}

				if (isset($_POST["AJAX_Units"])){
					$question6 = $_POST["AJAX_Units"];
				}
				else {
					$errMsg .= "<p>Please select an anwser for the 'AJAX' question</p>";
				}

				if (isset($_POST["Best_Anwser"])){
					$question7 = $_POST["Best_Anwser"];
					if ($question7 == ""){
						$errMsg .= "<p>Please anwser the 'select the correct anwser' question!</p>";
					}
				}

				if (isset($_POST["Year_google_deprecated_hashback"])){
					$question8 = $_POST["Year_google_deprecated_hashback"];
				}

				// the score is calculated here
				$score = 0;
				$tempCondition1 = false;
				$tempCondition2 = true;
				if($errMsg == ""){  // if there are no error messages generated then the score is calculated
					$score = Calculate_Score($question1,$question2,$question3,$question4,$question5,$question6,$question7,$question8);  // all anwser varaibles 
					if ($score > 0){$tempCondition1 = true; $tempCondition2 = false;}													// passed into a 
				}																														// function here
				else{
					echo $errMsg;
					$tempCondition2 = false;
					echo "<p><a href= 'quiz.php' class='enhancement_link1'>Try again</a></p>";
				}
		
				if ($tempCondition1){  // if the score is greater than zero then the users attempt number is checked
					check_attempt($fname,$lname,$stuID,$score);
				}
				if($tempCondition2){	// is score is zero then error messages and retry link to quiz are generated
					echo "<p>You have scored zero try again!</p>";
					echo "<p><a href= 'quiz.php' class='enhancement_link1'>Try again</a></p>";
				}
			
			?>

	</body>

</html>