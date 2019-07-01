<?php
    /**
    *Header content
    *Title : authenticateUser.php
    *Description : enhancement page for assignment 3
    *Author : Chamath Vindula
    *Date : 21/05/2018
    */
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset ="utf-8" />
		<meta name="description" content="PHP script to authenticate a supervisor" />
		<meta name="keywords" content="authenticate,supervisor,php" />
		<title>Supervisor Authenticate</title>	
		<link href="styles/style.css" rel="stylesheet" />
	</head>

	<body>

		<?php
			require('header.inc');
			require('settings.php');

			$errMsg = "";
			$id = $_GET['superID'];

			$pass = $_GET['superPASS'];
			
			if ($id == ""){   // if userId is empty then generate an error message
				$errMsg .= "<p>Please enter your ID</p>";
			}

			if ($pass == ""){  // if password is empty then generate an error message	
				$errMsg .= "<p>Please enter password</p>";
			}
			
			if (!($errMsg == "")){  // if there are error messages then echo them
				echo $errMsg;
			}
			else{
				$conn = mysqli_connect($host, $user, $pwd, $sql_db);
				$query = "SELECT * FROM supervisor";  
				$result = mysqli_query($conn,$query);
				if (!$result){						  
					echo "<p>Something went wrong</p>";
				}
				else{
					$cond = true;	
					while ($row = mysqli_fetch_row($result)){
						if ($row[0] == $id && $row[1] == $pass){ // check if the supervisor id and password is valid
							header("location: manage.php"); // if valid it takes you to mange.php page
							$cond = false;
						}
					}
					if ($cond){ // if id and password are not valid then echo error message
						echo "<p>Authentication failure</p>";
						echo "<p><a href = 'authenticate.php' class='enhancement_link1'>GO BACK</a></p>";
					}
				}		
			}	
			
		?>

		<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		<?php
			require ('footer.inc');
		?>

	</body>
	
	</html>		