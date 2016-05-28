<?php
///INTRO PAGE

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
	<style>
	 body {
		background-image: url("Hyperspace.jpg");
		opacity: 0.8;
		filter: alpha(opacity=40);
		background-size:cover;
				<!-- set how transparent the image is in the next 2 lines-->
	 } 
	  
	</style>
</head>
<body background="sign.jpeg"> 
	<div id="mainBox"; style="background-color: white; margin: 8%; padding: 1%">
		<!-- main title position -->
		<div></div> 
		<div style="background-color: red; margin:1%; text-align: center; padding: 0.1%"> 
			<h1>Semester Introduction</h1>
		</div>
		<div style="background-color: grey; margin:1%; text-align: center">
			<form action="Week3AssignmentResultsAttempt2.php" method="post">
				<div style="margin:0%; padding:1%;"> 
					<h1>BYU!!!</h1>
				</div>
				<div style="text-align: left; margin-left: 2%"> 
					<?php 
						//$_SESSION["calendar"] = "notSet";	
					?>
					<p> This website will allow you to sign up for upcoming semesters, check details of what classes
					are most popular, and view schedules of students.
					</p>
					
					
					<!-- Grabbing the options from the table "answerboard"-->
					<!-- 1) first set proper connection -->
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
					<!-- Now display each row of the table "answerboard"-->
					<?php
						//foreach( $db->query('SELECT book, chapter, verse, content FROM answerboard') as $row)
						/*foreach( $db->query('SELECT answer FROM answerboard2') as $row)					
						{
							echo '* ' . $row['answer'] . ' ';
							echo '<br/>';
						}*/
						/*////another 
							$stmt = $db->prepare('SELECT * FROM table WHERE id=:id AND name=:name');
							$stmt->bindValue(':id', $id, PDO::PARAM_INT);
							$stmt->bindValue(':name', $name, PDO::PARAM_STR);
							$stmt->execute();
							$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
						*/

					?>
					
					<?php
					/*
						
					*/
					?>
					
					<p> Select the links below to take the survey, or return back to home page.</p>
					
					
				</div>
			
			<!-- <br><br><br> -->
		
			<div style="padding-bottom: 2%">
				<!-- <button>Go to others results </button> -->
				<a href="homeworkLinkPage.html"> <button type="button">Return to Homework Links</button> </a>
				<a href="Week6ProjectQuestionPage.php"> <button type="button">Take Survey</button> </a>
				<a href="Week6userResultsPage.php"> <button type="button">View Survey Results</button> </a>
				<!-- <input type="submit" value="Submit Your Current Survey"> -->
			</div>
			
			<!-- Sound Option-->
			<audio controls autoplay>
			<source src="MainTitle - Rebel Blockade Runner.mp3" type="audio/mpeg">
			Sorry, Your browser does not support the current audio element.
			</audio>
			
			<!--<embed name="GoodEnough" src="/music/Yeah.mp3" loop="false" hidden="true" autostart="true">-->
			<!-- check boxs, have []-->
			</form>
		</div>
		<!--</div>-->
	</div>
	


</body>
</html>