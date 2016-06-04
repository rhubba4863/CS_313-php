<?php
//PAGE WITH THE QUESTIONS

// http://www.w3schools.com/php/php_sessions.asp
error_reporting (E_ALL ^ E_NOTICE);
session_start();


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
			<form action="NarrowSearch2.php" method="post">
				<div style="margin:0%; padding:1%;"> 
					<h1>"Logic is the beginning of wisdom, not the end." Spock</h1>
				</div>
				<div style="text-align: left; margin-left: 2%"> 
					<?php 
						//$_SESSION["calendar"] = "notSet";	
					?>
					<!--<p  style='font-size: 20px'> Congratulations for viewing this site. Enter data below to discover semesters, classes, students,
					and how they relate with each other.</p> -->

					
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

						//get data by students name
						/*function getSemesterID($season, $db){
						
						$stmt = $db->prepare ("SELECT ID FROM semester se
						WHERE (se.SemesterSeason = :studseason)");
						
						$stmt->bindValue(':studseason', $season, PDO::PARAM_STR);
						$stmt->execute();
						$stmt->setFetchMode(PDO::FETCH_ASSOC);
						//return if row was found
						return $stmt->fetch(PDO::FETCH_ASSOC);
						}*/

						echo 'Which which subcategory do you wish to search under? (Ex: the name of the semester, teachers of the class... Ect.' . '<br/>';
						echo '<div style="margin-left: 2%">';
						
						$_SESSION["MainTopic1"] = $_POST["MainTopic1"];
						$Search1 = $_SESSION["MainTopic1"];
						
						//WORKING WITH SESSIONS
						/*echo 'I now display session variable MainTopic1 ' . $_SESSION["MainTopic1"] . '<br/>';
						echo 'I now display session variable MainTopic2 ' . $_SESSION["MainTopic2"] . '<br/>';
						echo 'I now display session variable MainTopic3' . $_SESSION["MainTopic3"] . '<br/>';	
						echo 'I now display session variable SearchTopic1 ' . $_SESSION["SearchTopic1"] . '<br/>';
						echo 'I now display session variable SearchTopic2 ' . $_SESSION["SearchTopic2"] . '<br/>';
						echo 'I now display session variable SearchTopic3 ' . $_SESSION["SearchTopic3"] . '<br/>';*/
						
						

						//echo 'Main Topic 1: ' . $Search1 . '<br/>';;
						//echo $_SESSION["MainTopic1"];
						if ($Search1 == "student")
						{
							echo '<div style="margin-left: 2%">';
							echo '<input type="radio" name="MainTopic2" value="Name"> Name <br>';
							echo '</div>';
							
							
							/*foreach( $db->query('SELECT id FROM student') as $row)
							{
								echo "<option value='".$row['id']."'>".$row['id']."</option>";
								echo '<br/>';
								$saveplan->$row['id'];
								echo $saveplan . "another go" . '<br/>';
							}*/
						}
						else if ($Search1 == "class")
						{
							echo '<div style="margin-left: 2%">';
							echo '<input type="radio" name="MainTopic2" value="major"> major <br>';
							echo '<input type="radio" name="MainTopic2" value="teacher"> teacher <br>';
							echo '<input type="radio" name="MainTopic2" value="location"> location <br>';
							echo '</div>';
						}
						if ($Search1 == "semester")
						{
							//echo '<input type="radio" name="MainTopic2" value="Year"> Year <br>';
							echo '<input type="radio" name="MainTopic2" value="SemesterSeason"> Season <br>';
						}
						
						echo '<br>';
						
						
				//ATTEMPT to view values of class according to multiclass 
						$stmt1 = $db->prepare ("SELECT SemesterSeason FROM semester se
						JOIN semesterclass st ON se.id = st.semesterID
						WHERE classID = 16");
						
						//$stmt1->bindValue(':studseason', $season, PDO::PARAM_STR);
						$stmt1->execute();
						$stmt1->setFetchMode(PDO::FETCH_ASSOC); 
						//echo $stmt1->fetch_assoc();
						
						$result = $stmt1->fetchAll(PDO::FETCH_ASSOC);
					///XXX echo $result['SemesterSeason'];
					///XXX var_dump($result);
						
						foreach($result as $row21)
						{
						//XXX echo $row21['SemesterSeason'] . 'i place it';
						}						
				//ATTEMPT
						

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
			
			
			
			</form>
		</div>
	</div>
	


</body>
</html>