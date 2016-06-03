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
			<form action="NarrowSearch3.php" method="post">
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


						echo 'Which one do you wish to view details for?' . '<br/>';
						echo '<div style="margin-left: 2%">';
						
						//$_SESSION["MainTopic1"] = $_POST["MainTopic1"];
						$Search1 = $_SESSION["MainTopic1"];
						$_SESSION["MainTopic2"] = $_POST["MainTopic2"];
						$Search2 = $_SESSION["MainTopic2"];
						
						
						
						$stmt = $db->prepare ("SELECT * FROM students cl");
						
						$stmt->bindValue(':table', $Search1, PDO::PARAM_STR);
						$stmt->bindValue(':topic', $Search2, PDO::PARAM_STR);
						$stmt->execute();
						
						//WORKING WITH SESSIONS
						/*echo 'I now display session variable MainTopic1 ' . $_SESSION["MainTopic1"] . '<br/>';
						echo 'I now display session variable MainTopic2 ' . $_SESSION["MainTopic2"] . '<br/>';
						echo 'I now display session variable MainTopic3' . $_SESSION["MainTopic3"] . '<br/>';	
						echo 'I now display session variable SearchTopic1 ' . $_SESSION["SearchTopic1"] . '<br/>';
						echo 'I now display session variable SearchTopic2 ' . $_SESSION["SearchTopic2"] . '<br/>';
						echo 'I now display session variable SearchTopic3 ' . $_SESSION["SearchTopic3"] . '<br/>';*/
						
						$sql = 'SELECT '. $_SESSION["MainTopic2"] . ' FROM ' . $_SESSION["MainTopic1"];
						foreach( $db->query($sql) as $row)
						{
							//echo "<option value='".$row[$_SESSION["MainTopic2"]]."'>".$row[$_SESSION["MainTopic2"]]."</option>";
							//echo '<br/>';
							
							echo "<input type='radio' name='MainTopic3' value='".$row[$_SESSION["MainTopic2"]]."'>".$row[$_SESSION["MainTopic2"]]."<br>";
							//echo '<input type="radio" name="MainTopic3" value="SemesterSeason"> Season <br>';
						}
							
						/*1) foreach( $db->query('SELECT id FROM student') as $row)
						{
							echo "<option value='".$row['id']."'>".$row['id']."</option>";
							echo '<br/>';
							$saveplan->$row['id'];
							echo $saveplan . "another go" . '<br/>';
						}*/
						
						/*2) $sql = "SELECT id, firstname, lastname FROM MyGuests";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
							}
						} else {
							echo "0 results";
						}*/

						/*3) $stmt = $db->prepare ("SELECT * FROM class cl
						WHERE (cl.major = :studCName) AND (cl.teacher = :studTeach) AND (cl.location = :studSpot)");
						
						$stmt->bindValue(':studCName', $className, PDO::PARAM_STR);
						$stmt->bindValue(':studTeach', $classTeacher, PDO::PARAM_STR);
						$stmt->bindValue(':studSpot', $classSpot, PDO::PARAM_STR);
						$stmt->execute();*/
						

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
			<audio controls autoplay>
			<source src="Also Sprach Zarathustra.mp3" type="audio/mpeg">
			Sorry, Your browser does not support the current audio element.
			</audio>
			
			</form>
		</div>
	</div>
	


</body>
</html>