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
	<style>
	 body {
		background-image: url("Universe.jpg");
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
			<h1>Semester Sign-up</h1>
		</div>
		<div style="background-color: grey; margin:1%; text-align: center">
		
			<form action="Week6_Insert_Database_Page.php" method="post">
				<div style="margin:0%; padding:1%;"> 
					<h1>Hey Guys!!!</h1>
				</div>
				<div style="text-align: left; margin-left: 2%"> 
					<?php 
					
					echo '<p> For the upcoming year of 2016....</p>';
					echo '<p> 1) Which semester do you wish to sign-up for?</p>';
					echo '<div style="margin-left: 2%">';
						echo '<input type="radio" name="SemesterSeason" value="Spring"> Spring <br>';
						echo '<input type="radio" name="SemesterSeason" value="Summer"> Summer <br>';
						echo '<input type="radio" name="SemesterSeason" value="Fall"> Fall <br>';
						echo '<input type="radio" name="SemesterSeason" value="Winter"> Winter <br>';
					echo '</div>';

					/*EXAMPLE TO RELATE TO 
					echo '<div>';
					echo '1) ' . '<a href="Week3AssignmentResultsAttempt2.php"> <button type="button">Classes of a Student</button> </a>' . '<br/>';
					echo '2) ' . '<a href="Week6ProjectQuestionaire.php"> <button type="button">Classes of a Semester</button> </a>' . '<br/>';
					echo '3) ' . '<a href="Week3AssignmentResultsAttempt2.php"> <button type="button">Students of a Class</button> </a>' . '<br/>';
					echo '4) ' . '<a href="Week6ProjectQuestionaire.php"> <button type="button">Students of a Semester</button> </a>' . '<br/>';
					echo '5) ' . '<a href="Week3AssignmentResultsAttempt2.php"> <button type="button">Semesters of a Student</button> </a>' . '<br/>';
					echo '6) ' . '<a href=""> <button type="button">Semesters of a Class</button> </a>' . '<br/>';
					echo '<br/>';*/
					
					
					echo '<p> 2) What class would you like to take? Enter in the following format "CS 313" 
					with the major followed by the class number.</p>';
					echo '<div style="margin-left: 2%"> ';
						echo '<input type="text" name="classMajor" value="">  <br>';
					echo '</div>';

					echo '<p> 3) What teacher would you like for this class? Enter in the following format "Mr. Burton"</p>';
					echo '<div style="margin-left: 2%">';
						echo '<input type="text" name="classTeacher" value="">  <br>';
					echo '</div>';

					echo '<p> 4) How will you take this class? On campus or online on I-Learn,</p>';
					echo '<div style="margin-left: 2%">';
						echo '<input type="radio" name="classmethod" value="on campus"> On Campus <br>';
						echo '<input type="radio" name="classmethod" value="online"> Online <br>';
					echo '</div>';
					
					echo '<p> 5) Enter your name (in format "Parker Hubbard") and password for the final application
					of this class.</p>';
					echo '<div style="margin-left: 2%">';
						echo '<input type="text" name="studentName" value="">  Name<br> <br>';
						echo '<input type="text" name="studentPassword" value="">  Password<br> <br>';
					echo '</div>';
					?>
					
					<!-- SUBMIT RESULTS OF PAGE -->
					<input type="submit">
				</div>
			
			<br><br><br>
		
			<div style="padding-bottom: 2%">
				<!-- <button>Go to others results </button> -->
				<a href="../homeworkLinkPage.html"> <button type="button">Return to Homework Links</button> </a>
				<a href="Week6ProjectQuestionaire.php"> <button type="button">Intro Page</button> </a>
				<a href="Week6userResultsPage.php"> <button type="button">View Survey Results</button> </a>
				<!-- USE METHOD BELOW WHEN GETTING ACTUAL RESULTS OF QUIZ -->
				<!-- <input type="submit" value="Submit Your Current Survey"> -->
			</div>
			
			<!-- Sound Option-->
			<audio controls autoplay>
			<source src="Also Sprach Zarathustra.mp3" type="audio/mpeg">
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