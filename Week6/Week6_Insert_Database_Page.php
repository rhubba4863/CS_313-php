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


//USED THIS FUNCTION FOR CONNECTION DETAILS
require("dbConnector.php");
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
			<h1>Survey Results</h1>
		</div>
		<div style="background-color: grey; margin:1%; text-align: center">
			<!-- Post data -->
			<!-- http://www.w3schools.com/php/php_forms.asp -->
			<form action="Week6_Insert_Database_ResultsPage.php" method="post">
			
			
				<div style="margin:0%; padding:1%;"> 
					<h1>Semester Confirmation</h1>
				</div>
				<div style="text-align: left; margin-left: 2%"> 
					<?php 
						//$_SESSION["calendar"] = "notSet";	
					?>
					<p  style='font-size: 20px'> To confirm, <?php echo $_POST["studentName"]; ?> wishes to sign up for an 
					<?php echo $_POST["SemesterSeason"]; ?>, 2016 <?php echo $_POST["classmethod"]; ?> class of 
					<?php echo $_POST["classMajor"]; ?>	taught by <?php echo $_POST["classTeacher"]; ?>. Please submit below to apply.
					</p>
					
					<!-- Welcome <?php //echo $_POST["classMajor"]; ?><br> -->

					
					<?php 
						// a php program file
						try
						{
							//METHOD TO RUN ON MY PC
							//$user = 'phubbs';
							//$password = 'mormon64';
							//$db = new PDO('mysql:host=localhost;dbname=cs313_survey', $user, $password);
						   
							//METHOD TO USE ON PC OR OPENSHIFT
							
							$db = loadDatabase();
							//echo 'I connected' . '<br/>';
						}
						catch (PDOException $ex)
						{
						   echo 'Error parker again!: ' . $ex->getMessage();
						   die();
						}
					?>
					
					<?php
					//WORKING WITH SESSIONS
					$_SESSION["studentName"] = $_POST["studentName"];
					$_SESSION["SemesterSeason"] = $_POST["SemesterSeason"];
					$_SESSION["classmethod"] = $_POST["classmethod"];
					$_SESSION["classMajor"] = $_POST["classMajor"];
					$_SESSION["classTeacher"] = $_POST["classTeacher"];
					$_SESSION["studentPassword"] = $_POST["studentPassword"];
					
					//echo 'I now display session variable ' . $_SESSION["studentName"];
					
					
					//echo INSERT INTO student (Name, password)
					//echo VALUES ($_SESSION["studentName"], $_POST["studentPassword"]);
				

					?>

					
					
				<input type="submit">	
				</div>
				
			
			<br><br><br>
		
			<div style="padding-bottom: 2%">
				<!-- <button>Go to others results </button> -->
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