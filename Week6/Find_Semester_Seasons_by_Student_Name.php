<?php
//PAGE WITH THE QUESTIONS

// http://www.w3schools.com/php/php_sessions.asp
error_reporting (E_ALL ^ E_NOTICE);
session_start();
//header('Location: Week3AssignmentResultsAttempt2.php');

/*if($_SESSION["voted"] == "completed")
{
	echo "hi man";
	//http://ccm.net/faq/9296-php-redirect-to-another-page-redirect-header
	header('Location: Week3AssignmentResultsAttempt2.php'); 
	$_SESSION["titlerph"] = "Sorry, the question page is restricted after submission";
}
else
{
	$_SESSION["titlerph"] = "Feel free to return and complete a survey";
}*/
?>


<!DOCTYPE html>
<html>
<head>
	<!-- JQUERY LIBRARY-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	
	<style>
	 body {
		background-image: url("Star-trek-backgrounds.jpeg");
		opacity: 0.8;
		filter: alpha(opacity=40);
		background-size:cover;
				<!-- set how transparent the image is in the next 2 lines-->
	 } 
	 php {
		 font-size: 30px;
	 }
	  
	</style>
</head>
<body background="sign.jpeg"> 
	<div id="mainBox"; style="background-color: white; margin: 8%; padding: 1%">
		<!-- main title position -->
		<div></div> 
		<div style="background-color: red; margin:1%; text-align: center; padding: 0.1%"> 
			<h1>Question</h1>
		</div>
		<div style="background-color: grey; margin:1%; text-align: center">
			<!-- Post data -->
			<!-- http://www.w3schools.com/php/php_forms.asp -->
			<form action="Display_Semester_Seasons_by_Student_Name.php" method="post">
			
			
				<div style="margin:0%; padding:1%;"> 
					<h1>"Logic is the beginning of wisdom, not the end." Spock</h1>
				</div>
				<div style="text-align: left; margin-left: 2%"> 
					<?php 
						//$_SESSION["calendar"] = "notSet";	
					?>
					<p  style='font-size: 20px'> Classes of a student</p>

					
					
					
					
					<?php 
						// a php program file
				// BRING UP THE FILE USING HOST AND DATABASE
						try
						{
						   $user = 'phubbs';
						   $password = 'mormon64';
						   $db = new PDO('mysql:host=localhost;dbname=cs313_survey', $user, $password);
						}
						catch (PDOException $ex)
						{
						   echo 'Error parker again!: ' . $ex->getMessage();
						   die();
						}
					 
		
				//BEGIN DISPLAY OF INFORMATION	 -- WHICH OBSERVATION THE USER WANTS
						echo "<p  style='font-size: 20px'> Which student do you wish to view?....</p>";
						
						//3) ACTUAL PIECE YOU WANT COMPARED (EX: Parker)
						echo "<select id='IDnarrowQuestion1', name='Q1'>";
							foreach( $db->query('SELECT Name FROM Student') as $row)					
							{
								echo "<option value='".$row['Name']."'>".$row['Name']."</option>";
								echo '<br/>';
								$saveplan->$row['Name'];
								echo $saveplan . "another go" . '<br/>';
							}
						echo "</select>";
					?>
					
					
					
					<!-- Name: <input type="text" name="name"><br>
					E-mail: <input type="text" name="email"><br> -->
			<!--SUBMIT RESULTS AND GO TO NEXT PAGE-->
					<input type="submit">
					
				</div>
			
			<script>
			//alert ("give it another go: = " + document.getElementById('IDsubQuestion1').value);
			</script>
			
			<br><br><br>
		
			<div style="padding-bottom: 2%">
				<!-- To return to Refrence Page-->
				<a href="Week3AssignmentResultsAttempt2.php"> <button type="button">Return to Homework Links</button> </a> 
				<a href="Week6ProjectQuestionaire.php"> <button type="button">Intro Page</button> </a>
				<a href="Week6userResultsPage.php"> <button type="button">View Other Survey Results</button> </a>
			</div>
			
			
			
			</form>
		</div>
	</div>
	


</body>
</html>