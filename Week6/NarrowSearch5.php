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
			<form action="NarrowSearch6.php" method="post">
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

						echo '<div style="margin-left: 2%">';
						
					//set values of previous Questions
						$_SESSION["SearchTopic2"] = $_POST["SearchTopic2"];
						$Search1 = $_SESSION["SearchTopic1"];
						$Search2 = $_SESSION["SearchTopic2"];
						
						
						
						
						$stmt = $db->prepare ("SELECT * FROM students cl");
						
						$stmt->bindValue(':table', $Search1, PDO::PARAM_STR);
						$stmt->bindValue(':topic', $Search2, PDO::PARAM_STR);
						$stmt->execute();
						
						//WORKING WITH SESSIONS
						/*echo 'I now display session variable MainTopic1 ' . $_SESSION["MainTopic1"] . '<br/>';
						echo 'I now display session variable MainTopic2 ' . $_SESSION["MainTopic2"] . '<br/>';
						echo 'I now display session variable MainTopic3' . $_SESSION["MainTopic3"] . '<br/>';	
						echo 'I now display session variable SearchTopic1 ' . $_SESSION["SearchTopic1"] . '<br/>';
						echo 'I now display session variable SearchTopic2 ' . $_SESSION["SearchTopic2"] . '<br/>';*/
						
						echo '<br/>Now according to that ' . $_SESSION["MainTopic1"] . ' of ' . $_SESSION["MainTopic3"] . ', the following '
						. $_SESSION["SearchTopic2"] .'(\'s) that relate to it include...<br/>';
						
						
				//ATTEMPT to view values of table according to multitable
						//semesterclass
						//SemesterStudent
						//studentclass
					//DETERMINE WHICH MULTI TABLE TO USE
						$multiUSED;
						$ID_Topic; //Ex: semesterID
						$ID_SearchTopic; //Ex: semesterID
						if ($_SESSION["MainTopic1"] == 'semester' AND $_SESSION["SearchTopic1"] == 'class')
						{
							$multiUSED = 'semesterclass';
							$ID_Topic = 'semesterID';
							$ID_SearchTopic = 'classID';
						}
						else if ($_SESSION["MainTopic1"] == 'class' AND $_SESSION["SearchTopic1"] == 'semester')
						{
							$multiUSED = 'semesterclass';
							$ID_Topic = 'classID';
							$ID_SearchTopic = 'semesterID';
						}
						else if ($_SESSION["MainTopic1"] == 'semester' AND $_SESSION["SearchTopic1"] == 'student')
						{
							$multiUSED = 'SemesterStudent';
							$ID_Topic = 'semesterID';
							$ID_SearchTopic = 'studentID';
						}
						else if ($_SESSION["MainTopic1"] == 'student' AND $_SESSION["SearchTopic1"] == 'semester')
						{
							$multiUSED = 'SemesterStudent';
							$ID_Topic = 'studentID';
							$ID_SearchTopic = 'semesterID';
						}
						else if ($_SESSION["MainTopic1"] == 'student' AND $_SESSION["SearchTopic1"] == 'class')
						{
							$multiUSED = 'studentclass';
							$ID_Topic = 'studentID';
							$ID_SearchTopic = 'classID';
						}
						else if ($_SESSION["MainTopic1"] == 'class' AND $_SESSION["SearchTopic1"] == 'student')
						{
							$multiUSED = 'studentclass';
							$ID_Topic = 'classID';
							$ID_SearchTopic = 'studentID';
						}
						//echo 'multi i will use = ' . $multiUSED . '<br/>';
						
						

						
					//NOW DETERMINE WHICH DATA TO GRAB
						$stmt4 = $db->prepare ("SELECT id FROM class WHERE (teacher = 'Mr. Burton')");
						//get id (EX: WHERE classID = 16")
					//GET ALL ID'S OF MAIN TOPIC
					//$cheese = "SELECT id FROM ". $_SESSION["MainTopic1"] ." WHERE (". 
					//		$_SESSION["MainTopic2"] . " = ". $_SESSION["MainTopic3"] . ")";
					//	echo "echoing cheese " . $cheese;
							
						$stmt4 = $db->prepare ("SELECT id FROM ". $_SESSION["MainTopic1"] ." WHERE (". 
							$_SESSION["MainTopic2"] . " = '". $_SESSION["MainTopic3"] . "')");
						$stmt4->execute();
						$stmt4->setFetchMode(PDO::FETCH_ASSOC);
						$IDsgained = $stmt4->fetchAll(PDO::FETCH_ASSOC); //All ID's where that value exists
						
						//var_dump($IDsgained);
					//WITH ALL VARIABLES
					
						/*$stmt999 = $db->prepare ("select SemesterSeason from semester s 
						inner join semesterclass sc
						ON s.id = sc.semesterID
						inner join class c
						ON c.id = sc.classID
						where c.teacher = 'Mr. Burton'"); */
						
						$statement_text = "select " .$_SESSION["SearchTopic2"] . " from " . $_SESSION["SearchTopic1"] . " s 
						inner join " . $multiUSED . " sc
						ON s.id = sc." . $ID_SearchTopic . "
						inner join class c
						ON c.id = sc.".$ID_Topic."
						where c.".$_SESSION["MainTopic2"] . " = '".$_SESSION["MainTopic3"] . "'";
						//echo $statement_text;
						
						$stmt999 = $db->prepare ("select " .$_SESSION["SearchTopic2"] . " from " . $_SESSION["SearchTopic1"] . " s 
						inner join " . $multiUSED . " sc
						ON s.id = sc." . $ID_SearchTopic . "
						inner join ".$_SESSION["MainTopic1"] . " c
						ON c.id = sc.".$ID_Topic."
						where c.".$_SESSION["MainTopic2"] . " = '".$_SESSION["MainTopic3"] . "'");
						$stmt999->execute();
						$stmt999->setFetchMode(PDO::FETCH_ASSOC); 
							//echo $stmt1->fetch_assoc();
						
						$result = $stmt999->fetchAll(PDO::FETCH_ASSOC);
							
							//var_dump($result);
						$code = $_SESSION["SearchTopic2"];
						foreach($result as $row21)
						{
							//echo $row21['SemesterSeason'] . 'i place it';
							//echo '**' . $row21[$code] . ' ** ';
							echo ' * '.$row21[$code] . ' <br/>';
						}
						
						
						
						
						
						

						/*foreach($IDsgained as $row295)
						{
							$stmt1 = $db->prepare ("SELECT " .$_SESSION["SearchTopic2"] . " FROM " . $_SESSION["SearchTopic1"] . " se
							JOIN " . $multiUSED . " st ON se.id = st." . $ID_SearchTopic . "
							WHERE ".$ID_Topic." = ". $row295);		
							
							//$stmt1->bindValue(':myMULTI', $multiUSED, PDO::PARAM_STR);
							$stmt1->execute();
							$stmt1->setFetchMode(PDO::FETCH_ASSOC); 
								//echo $stmt1->fetch_assoc();
							
							$result = $stmt1->fetchAll(PDO::FETCH_ASSOC);
								//echo $result['SemesterSeason'];
								//var_dump($result);
							//
							$code = $_SESSION["SearchTopic2"];
							foreach($result as $row21)
							{
								//echo $row21['SemesterSeason'] . 'i place it';
								echo $row21[$code] . 'i place it';
							}
						}*/
					
					//SOME VARIABLES
						/*$stmt1 = $db->prepare ("SELECT " .$_SESSION["SearchTopic2"] . " FROM " . $_SESSION["SearchTopic1"] . " se
						JOIN " . $multiUSED . " st ON se.id = st." . $ID_SearchTopic . "
						WHERE classID = 16");		
							
							//$stmt1->bindValue(':myMULTI', $multiUSED, PDO::PARAM_STR);
						$stmt1->execute();
						$stmt1->setFetchMode(PDO::FETCH_ASSOC); 
							//echo $stmt1->fetch_assoc();
						
						$result = $stmt1->fetchAll(PDO::FETCH_ASSOC);
							//echo $result['SemesterSeason'];
							//var_dump($result);
						//
						$code = $_SESSION["SearchTopic2"];
						foreach($result as $row21)
						{
							//echo $row21['SemesterSeason'] . 'i place it';
							echo $row21[$code] . 'i place it';
						}*/
						
						
					//NO VARIABLES
						/*$stmt1 = $db->prepare ("SELECT SemesterSeason FROM semester se
						JOIN semesterclass st ON se.id = st.semesterID
						WHERE classID = 16");
						
						//$stmt1->bindValue(':myMULTI', $multiUSED, PDO::PARAM_STR);
						$stmt1->execute();
						$stmt1->setFetchMode(PDO::FETCH_ASSOC); 
						//echo $stmt1->fetch_assoc();
						foreach($result as $row21)
						{
							echo $row21['SemesterSeason'] . 'i place it';
						}
						
						*/
						
						
												
				//ATTEMPT
						
						
						
						
						
						
						
						
						
						
						//$sql = 'SELECT '. $_SESSION["SearchTopic2"] . ' FROM ' . $_SESSION["SearchTopic1"];
						/*foreach( $db->query($sql) as $row)
						{
							echo "<input type='radio' name='SearchTopic3' value='".$row[$_SESSION["SearchTopic2"]]."'>".$row[$_SESSION["SearchTopic2"]]."<br>";
						}*/
						
					echo '</div>';
					?>
					<!-- <input type="submit"> -->
				</div>
			
			<br><br><br>
		
			<div style="padding-bottom: 2%">
				<!-- <button>Go to others results </button> -->
				<!-- To return to Refrence Page-->
				<a href="../homeworkLinkPage.html"> <button type="button">Return to Homework Links</button> </a> 
				<a href="Week6ProjectQuestionaire.php"> <button type="button">Intro Page</button> </a>
				<a href="Week6userResultsPage.php"> <button type="button">Data Search</button> </a>
				
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