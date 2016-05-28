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
			<form action="Week6ProjectQuestionaire.php" method="post">
			
			
				<div style="margin:0%; padding:1%;"> 
					<h1>Semester Confirmation</h1>
				</div>
				<div style="text-align: left; margin-left: 2%"> 
					<?php 
						//$_SESSION["calendar"] = "notSet";	
					?>

					
					
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
					
					<p  style='font-size: 20px'> Well done <?php echo $_SESSION["studentName"]; ?>, this  
					<?php echo $_SESSION["SemesterSeason"]; ?> semester of 2016 you will be taking an <?php echo $_SESSION["classmethod"]; ?> class of 
					<?php echo $_SESSION["classMajor"]; ?>	taught by <?php echo $_SESSION["classTeacher"]; ?>. Feel free to contact if you have any questions.
					</p>
					
					<?php
					
					
					//WORKING WITH SESSIONS
					/*$_SESSION["studentName"];
					echo 'I now display session variable studentName ' . $_SESSION["studentName"] . '<br/>';
					echo 'I now display session variable SemesterSeason ' . $_SESSION["SemesterSeason"] . '<br/>';
					echo 'I now display session variable classmethod' . $_SESSION["classmethod"] . '<br/>';
					echo 'I now display session variable classMajor ' . $_SESSION["classMajor"] . '<br/>';
					echo 'I now display session variable classTeacher ' . $_SESSION["classTeacher"] . '<br/>';*/
					?>
					
					<?php
					$className = $_SESSION["classMajor"];
					$classTeacher = $_SESSION["classTeacher"];
					$classSpot = $_SESSION["classmethod"];
					$season = $_SESSION["SemesterSeason"];
					$stud = $_SESSION["studentName"];
		//FUNCTIONS
			//GET ID'S
					//FUNCTION TO GET THE ID OF THE SEMESTER WHERE THAT SEASON EXISTS/EQUALS
					function getSemesterID($season, $db){
						
						$stmt = $db->prepare ("SELECT ID FROM semester se
						WHERE (se.SemesterSeason = :studseason)");
						
						$stmt->bindValue(':studseason', $season, PDO::PARAM_STR);
						$stmt->execute();
						$stmt->setFetchMode(PDO::FETCH_ASSOC);
						//return if row was found
						return $stmt->fetch(PDO::FETCH_ASSOC);
					}
					//FUNCTION TO GET ID OF STUDENT
					function getStudentID($stud, $db){
						
						$stmt = $db->prepare ("SELECT ID FROM student st
						WHERE (st.Name = :studentG)");
						
						$stmt->bindValue(':studentG', $stud, PDO::PARAM_STR);
						$stmt->execute();
						$stmt->setFetchMode(PDO::FETCH_ASSOC);
						//return if row was found
						return $stmt->fetch(PDO::FETCH_ASSOC);
					}
					//FUNCTION TO GET ID OF CLASS
					function getClassID($className, $classTeacher, $classSpot, $db){
						
						$stmt = $db->prepare ("SELECT ID FROM class cl
						WHERE (cl.major = :theName) AND (cl.teacher = :teacher) AND (cl.location = :spot)");
						
						$stmt->bindValue(':theName', $className, PDO::PARAM_STR);
						$stmt->bindValue(':teacher', $classTeacher, PDO::PARAM_STR);
						$stmt->bindValue(':spot', $classSpot, PDO::PARAM_STR);
						$stmt->execute();
						$stmt->setFetchMode(PDO::FETCH_ASSOC);
						//return if row was found
						return $stmt->fetch(PDO::FETCH_ASSOC);
					}
					
					
			//FIND ROWS WILL ALL VARIABLES		
					//FUNCTION TO DETERMINE IS A VERSION OF THAT CLASS ROW EXISTS FOR VALUES: A, B, C
					function classRowExists($className, $classTeacher, $classSpot, $db)
					{	
						$stmt = $db->prepare ("SELECT * FROM class cl
						WHERE (cl.major = :studCName) AND (cl.teacher = :studTeach) AND (cl.location = :studSpot)");
						
						$stmt->bindValue(':studCName', $className, PDO::PARAM_STR);
						$stmt->bindValue(':studTeach', $classTeacher, PDO::PARAM_STR);
						$stmt->bindValue(':studSpot', $classSpot, PDO::PARAM_STR);
						$stmt->execute();
						
						//return if row was found
						return $stmt->fetchAll(PDO::FETCH_ASSOC);
					}
					
					//FUNCTION TO DETERMINE IS A VERSION OF THAT CLASS ROW EXISTS FOR VALUES: A, B, C
					function semesterStudentRowExists($IDsemester, $IDstudent, $db){
						
						$stmt = $db->prepare ("SELECT * FROM semesterstudent ss
						WHERE (ss.semesterID = :ID1) AND (ss.studentID = :ID2)");
						
						$stmt->bindValue(':ID1', $IDsemester['ID'], PDO::PARAM_STR);
						$stmt->bindValue(':ID2', $IDstudent['ID'], PDO::PARAM_STR);
						$stmt->execute();
						
						//return if row was found
						return $stmt->fetchAll(PDO::FETCH_ASSOC);
					}
				//YET TO ADD
								//FUNCTION TO DETERMINE IS A VERSION OF THAT CLASS ROW EXISTS FOR VALUES: A, B, C
					function studentClassRowExists($IDstudent, $IDclass, $db){
						
						$stmt = $db->prepare ("SELECT * FROM studentclass sc
						WHERE (sc.classID = :ID1) AND (sc.studentID = :ID2)");
						
						$stmt->bindValue(':ID1', $IDclass['ID'], PDO::PARAM_STR);
						$stmt->bindValue(':ID2', $IDstudent['ID'], PDO::PARAM_STR);
						$stmt->execute();
						
						//return if row was found
						return $stmt->fetchAll(PDO::FETCH_ASSOC);
					}
								//FUNCTION TO DETERMINE IS A VERSION OF THAT CLASS ROW EXISTS FOR VALUES: A, B, C
					function semesterClassRowExists($IDsemester, $IDclass, $db){
						$stmt = $db->prepare ("SELECT * FROM semesterclass scl
						WHERE (scl.semesterID = :ID1) AND (scl.classID = :ID2)");
						
						$stmt->bindValue(':ID1', $IDsemester['ID'], PDO::PARAM_STR);
						$stmt->bindValue(':ID2', $IDclass['ID'], PDO::PARAM_STR);
						$stmt->execute();
						
						//return if row was found
						return $stmt->fetchAll(PDO::FETCH_ASSOC);
					}
					

				//COMMANDS 
					//CREATE A NEW CLASS
					$className = $_SESSION["classMajor"];
					$classTeacher = $_SESSION["classTeacher"];
					$classSpot = $_SESSION["classmethod"];
					$season = $_SESSION["SemesterSeason"];
					
					//CALLING FUNCTION TO CREATE NEW CLASS 
					//create if row doesnt exist
					if (!classRowExists($className, $classTeacher, $classSpot, $db))
					{
						$stmt = $db->prepare ("INSERT INTO class (major, teacher, location)
						VALUES (:studCName, :studTeach, :studSpot)");

						$stmt->bindValue(':studCName', $className, PDO::PARAM_STR);
						$stmt->bindValue(':studTeach', $classTeacher, PDO::PARAM_STR);
						$stmt->bindValue(':studSpot', $classSpot, PDO::PARAM_STR);
						$stmt->execute();
						//$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
						//1)echo $className . "was given to a student" . "<br/>";
					}
					else 
					{
						//1)echo $className . "was already given to that student" . "<br/>";
					}

					//CREATE A NEW STUDENT
					$saved = $_SESSION["studentName"];
					$psaved = $_SESSION["studentPassword"];
					
					$stmt = $db->prepare ("INSERT INTO student (Name, password)
					VALUES (:studName, :studPass)");
					
					$stmt->bindValue(':studName', $saved, PDO::PARAM_STR);
					$stmt->bindValue(':studPass', $psaved, PDO::PARAM_STR);
					$stmt->execute();
					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
	//NOW CREATE MULTI-TABLE INSERTS						
					//INSERT SEMESTER STUDENT
					
					$IDsemester = getSemesterID($season, $db);
					$IDstudent = getStudentID($stud, $db);
					$IDclass = getClassID($className, $classTeacher, $classSpot, $db);
					
					
					//1)echo "I now try to display semester and student " . $IDsemester['ID'] . " " .  $IDstudent['ID'] . "<br/>";

					
					if (!semesterStudentRowExists($IDsemester, $IDstudent, $db))
					{
						$stmt = $db->prepare ("INSERT INTO semesterstudent (semesterID, studentID)
						VALUES (:semester, :student)");

						$stmt->bindValue(':semester', $IDsemester['ID'], PDO::PARAM_STR);
						$stmt->bindValue(':student', $IDstudent['ID'], PDO::PARAM_STR);
						$stmt->execute();
						//$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
						//1)echo $IDsemester . " I made a semesterstudent " . $IDstudent  . "<br>";
					}
					else
					{
						//1)echo "that semester student already exists"  . "<br>";
					}
					//INSERT STUDENT CLASS					
					if (!studentClassRowExists($IDstudent, $IDclass, $db))
					{
						$stmt = $db->prepare ("INSERT INTO studentclass (studentID, classID)
						VALUES (:student, :class)");
						$stmt->bindValue(':class', $IDclass['ID'], PDO::PARAM_STR);
						$stmt->bindValue(':student', $IDstudent['ID'], PDO::PARAM_STR);
						$stmt->execute();
						//$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
						//1)echo $IDclass . " I made a studentclass " . $IDstudent  . "<br/>";
					}
					else
					{
						//1)echo "that studentclass already exists"  . "<br>";
					}
					//INSERT SEMESTER CLASS
					if (!semesterClassRowExists($IDsemester, $IDclass, $db))
					{
						$stmt = $db->prepare ("INSERT INTO semesterclass (semesterID, classID)
						VALUES (:semester, :class)");
						$stmt->bindValue(':semester', $IDsemester['ID'], PDO::PARAM_STR);
						$stmt->bindValue(':class', $IDclass['ID'], PDO::PARAM_STR);
						$stmt->execute();
						//$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
						//1)echo " I made a semesterclass "   . "<br/>";
					}
					else
					{
						//1)echo "that semesterclass already exists"  . "<br>";
					}
					
					//GET THE ID
					$mysemesterID = getSemesterID($season, $db);
					//1)var_dump($mysemesterID);	
					echo "<br>";
					//1)echo "I display the season ID = " . $mysemesterID['ID'] . " good<br>";
					//1)echo "I display the season ID = " . $IDsemester['ID'] . " good<br>";
					//1)echo "I display the class ID = " . $IDclass['ID'] . " good<br>";
					//1)echo "I display the student ID = " . $IDstudent['ID'] . " good<br>";
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