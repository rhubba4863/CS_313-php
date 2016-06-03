<?php
//PAGE WITH THE QUESTIONS

// http://www.w3schools.com/php/php_sessions.asp
error_reporting (E_ALL ^ E_NOTICE);
session_start();
//header('Location: Week3AssignmentResultsAttempt2.php');

if($_SESSION["voted"] == "completed")
{
	echo "hi man";
	//http://ccm.net/faq/9296-php-redirect-to-another-page-redirect-header
	header('Location: Week3AssignmentResultsAttempt2.php'); 
	$_SESSION["titlerph"] = "Sorry, the question page is restricted after submission";
}
else
{
	$_SESSION["titlerph"] = "Feel free to return and complete a survey";
}


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
				<!-- set how transparent the image is in the next 2 lines -->
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
			<form action="NarrowSearch1.php" method="post">
				<div style="margin:0%; padding:1%;"> 
					<h1>"Logic is the beginning of wisdom, not the end." Spock</h1>
				</div>
				<div style="text-align: left; margin-left: 2%"> 
					<?php 
						//$_SESSION["calendar"] = "notSet";	
					?>
					<p  style='font-size: 20px'> Congratulations for viewing this site. Enter data below to discover semesters, classes, students,
					and how they relate with each other.</p>

					
					<?php 
						// a php program file
				// BRING UP THE FILE USING HOST AND DATABASE
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
					 
		
				//BEGIN DISPLAY OF INFORMATION	 -- WHICH OBSERVATION THE USER WANTS
						echo 'Which topic do you wish to find more data on?' . '<br/>';
						echo '<div style="margin-left: 2%">';
						echo '<input type="radio" name="MainTopic1" value="class"> Classes <br>';
						echo '<input type="radio" name="MainTopic1" value="semester"> Semesters <br>';
						echo '<input type="radio" name="MainTopic1" value="student"> Students <br>';
					echo '</div>';
					?>
					<input type="submit">
				</div>
			
			<br><br><br>
		
			<div style="padding-bottom: 2%">
				<!-- <button>Go to others results </button> -->
				<!-- To return to Refrence Page-->
				<a href="../homeworkLinkPage.html"> <button type="button">Return to Homework Links</button> </a> 
				<a href="Week6ProjectQuestionaire.php"> <button type="button">Intro Page</button> </a>
				
			</div>
			
			<!-- Sound Option-->
			
			
			</form>
		</div>
	</div>
	


</body>
</html>