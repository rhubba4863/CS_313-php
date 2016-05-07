<?php
// http://www.w3schools.com/php/php_sessions.asp
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
				<!-- set how transparent the image is in the next 2 lines-->
	 } 
	  
	</style>
</head>
<body background="sign.jpeg"> 
	<div id="mainBox"; style="background-color: white; margin: 8%; padding: 1%">
		<!-- main title position -->
		<div></div> 
		<div style="background-color: red; margin:1%; text-align: center; padding: 0.1%"> 
			<h1>My first PHP page</h1>
		</div>
		<div style="background-color: pink; margin:1%; text-align: center">
			<form action="Week3AssignmentResultsAttempt2.php" method="post">
				<div style="margin:0%; padding:1%;"> 
					<h1>Hey Guys!!!</h1>
				</div>
				<div style="text-align: left; margin-left: 2%"> 
					<?php 
						//$_SESSION["calendar"] = "notSet";	
					?>
					<p> You have been choosen to complete the following survey on BYUI's Ilearn system</p>
					<p> 1) Which system has the better calender? I-Learn 2.0 or I-Learn 3.0?</p>
					<div style="margin-left: 2%">
						<input type="radio" name="calendar" value="I-Learn 2.0"> Cal-I-Learn 2.0 <br>
						<input type="radio" name="calendar" value="I-Learn 3.0"> CAl-I-Learn 3.0 <br>
					</div>

					<p> 2) Which system has the better alert system? I-Learn 2.0 or I-Learn 3.0?</p>
					<div style="margin-left: 2%"> 
						<input type="radio" name="alertS" value="I-Learn 2.0"> Alert-I-Learn 2.0 <br>
						<input type="radio" name="alertS" value="I-Learn 3.0"> Alert-I-Learn 3.0 <br>
					</div>

					<p> 3) Which system has the better grading system? I-Learn 2.0 or I-Learn 3.0?</p>
					<div style="margin-left: 2%">
						<input type="radio" name="grading" value="I-Learn 2.0"> I-Learn 2.0 <br>
						<input type="radio" name="grading" value="I-Learn 3.0"> I-Learn 3.0 <br>
					</div>

					<p> 4) I-Learn 3.0 is better in what other fields? </p> 
					<div style="margin-left: 2%">
						<input type="checkbox" name="otherStrengths[]" value="Comment Board"> Comment Board<br>
						<input type="checkbox" name="otherStrengths[]" value="Quizs">  Quizs <br>
						<input type="checkbox" name="otherStrengths[]" value="Submissions">  Submissions <br>
					</div>	
						
					<p> 5) In conclusion, which system should BYUI use? I-Learn 2.0 or I-Learn 3.0?</p>
					<div style="margin-left: 2%"> 
						<input type="radio" name="finalChoice" value="I-Learn 2.0"> I-Learn 2.0 <br>
						<input type="radio" name="finalChoice" value="I-Learn 3.0"> I-Learn 3.0 <br>
					</div> 
					
				</div>
			
			<br><br><br>
		
			<div style="padding-bottom: 2%">
				<!-- <button>Go to others results </button> -->
				<a href="Week3AssignmentResultsAttempt2.php"> <button type="button">Check Previous Poll Results</button> </a>
				<input type="submit" value="Submit Your Current Survey">
			</div>

			<!-- check boxs, have []-->
			</form>
		</div>
		<!--</div>-->
	</div>
	


</body>
</html>