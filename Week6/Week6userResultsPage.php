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
			<form action="Week3AssignmentResultsAttempt2.php" method="post">
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
						
						echo '<div>';
						echo '1) ' . '<a href=""> <button type="button">Classes of a Student</button> </a>' . '<br/>';
						echo '2) ' . '<a href=""> <button type="button">Classes of a Semester</button> </a>' . '<br/>';
						echo '3) ' . '<a href=""> <button type="button">Students of a Class</button> </a>' . '<br/>';
						echo '4) ' . '<a href=""> <button type="button">Students of a Semester</button> </a>' . '<br/>';
						echo '5) ' . '<a href=""> <button type="button">Semesters of a Student</button> </a>' . '<br/>';
						echo '6) ' . '<a href=""> <button type="button">Semesters of a Class</button> </a>' . '<br/>';
						echo '<br/>';
						//get data by students name
						echo 'Using Students Name:' . '<br/>'; 
						echo '1) ' . '<a href="Find_Semester_Seasons_by_Student_Name.php"> <button type="button">Find Seasons of Semester taken by a Student by Students name</button> </a>' . '<br/>';
				//NOT SET UP YET!!!!!!!!!!!!
						echo '2) ' . '<a href=""> <button type="button">Find majors taken by a Student by Students name</button> </a>' . '<br/>';
						echo '3) ' . '<a href=""> <button type="button">Find teachers taken by a Student by Students name</button> </a>' . '<br/>';
						echo '4) ' . '<a href=""> <button type="button">Find class locations taken by a Student by Students name</button> </a>' . '<br/>';
						//get data by semester season
						echo 'Using Students Name:' . '<br/>'; 
						echo '5) ' . '<a href=""> <button type="button">Find students signed up during Semester Season</button> </a>' . '<br/>';
						echo '6) ' . '<a href=""> <button type="button">Find majors available during Semester Season</button> </a>' . '<br/>';
						echo '7) ' . '<a href=""> <button type="button">Find teachers working during Semester Season</button> </a>' . '<br/>';
						echo '8) ' . '<a href=""> <button type="button">Find locations of classes during Semester Season</button> </a>' . '<br/>';
						//get data by class major
						echo 'Using Class Major:' . '<br/>'; 
						echo '9) ' . '<a href=""> <button type="button">Find students signed up for a Class</button> </a>' . '<br/>';
						echo '10) ' . '<a href=""> <button type="button">Find Semester Seasons a major is being held</button> </a>' . '<br/>';
						echo '11) ' . '<a href=""> <button type="button">Find teachers teaching a certain major</button> </a>' . '<br/>';
						echo '12) ' . '<a href=""> <button type="button">Find locations of classes for a certain major</button> </a>' . '<br/>';
						//get data by teacher
						echo 'Using Class Teacher:' . '<br/>'; 
						echo '13) ' . '<a href=""> <button type="button">Find students signed up for a Teacher</button> </a>' . '<br/>';
						echo '14) ' . '<a href=""> <button type="button">Find Semester Seasons a Teacher teaches</button> </a>' . '<br/>';
						echo '15) ' . '<a href=""> <button type="button">Find Majors a teacher covers</button> </a>' . '<br/>';
						echo '16) ' . '<a href=""> <button type="button">Find locations where a teacher teaches</button> </a>' . '<br/>';
						//get data by location of class
						echo 'Using Location of Class:' . '<br/>'; 
						echo '17) ' . '<a href=""> <button type="button">Find students signed up for campus/online classes</button> </a>' . '<br/>';
						echo '18) ' . '<a href=""> <button type="button">Find Semester Seasons covered on campus/online</button> </a>' . '<br/>';
						echo '19) ' . '<a href=""> <button type="button">Find Majors covered on campus/online</button> </a>' . '<br/>';
						echo '20) ' . '<a href=""> <button type="button">Find Teachers that teach covered on campus/online</button> </a>' . '<br/>';
						echo '</div>';
					?>
					
				</div>
			
			<br><br><br>
		
			<div style="padding-bottom: 2%">
				<!-- <button>Go to others results </button> -->
				<!-- To return to Refrence Page-->
				<a href="../homeworkLinkPage.html"> <button type="button">Return to Homework Links</button> </a> 
				<a href="Week6ProjectQuestionaire.php"> <button type="button">Intro Page</button> </a>
				
			</div>
			
			<!-- Sound Option-->
			<audio controls autoplay>
			<source src="Also Sprach Zarathustra.mp3" type="audio/mpeg">
			Sorry, Your browser does not support the current audio element.
			</audio>
			
			</form>
		</div>
	</div>
	


</body>
</html>