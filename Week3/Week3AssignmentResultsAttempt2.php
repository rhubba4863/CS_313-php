<?php
session_start();
/*
if($_SESSION["voted"] == "completed")
{
	echo "hi man";
	//http://ccm.net/faq/9296-php-redirect-to-another-page-redirect-header
	header('Location: Week3AssignmentQuestionaire.php'); 
}*/
//unset($_SESSION["voted"]);
//COMMENT AND UNCOMMENT THE NEXT LINE TO ALLOW ACCESS ONCE SURVEY IS COMPLETED
$_SESSION["voted"] = "notcompleted";
?>

<!DOCTYPE html>
<html>
<head>
	<style>
	 body {
		background-image: url("Star-trek-backgrounds.jpeg");
		opacity: 0.8;
		filter: alpha(opacity=40);
		<!-- set how transparent the image is in the next 2 lines-->
	 } 
	  
	</style>
</head>
<body>
	<div id=mainBox; style="background-color: white; margin: 8%; padding: 1%">
		<!-- main title position -->
		<div></div>
		<div style="background-color: red; margin:1%; text-align: center; padding: 0.1%">
			<h1>Final Survey Results</h1>
		</div>
		<div style="background-color: pink; margin:1%; text-align: center;"
			<form action="Week3AssignmentResults.php" method="post">
				<div style="margin:0%; padding:1%;">
					<h1>Final Survey Results</h1>
				</div>
		
				<?php 	
				//http://stackoverflow.com/questions/1372147/check-whether-a-request-is-get-or-post
				//just completed a survey, so stop user from going back
				if ($_SERVER['REQUEST_METHOD'] === 'POST') 
				{	
					//Now set the value stopping the other page from being used
					$_SESSION["voted"] = "completed";
					//METHOD 5  http://www.dyn-web.com/tutorials/php-js/json/decode.php
				//STEP 1: GET FILE
					$fileBeenRead2 = file_get_contents("fileHold.json");
				//STEP 2: DECODE FILE
					$obj5 = json_decode($fileBeenRead2);
					//echo "help me..." . $obj5[0];
					
					//display the results before change
					echo "display1 " . $obj5[1]->choice2 . "<br>";
				//STEP 3: CHANGE VALUES
					//determine if all questions were filled out
					/*$_POST["calendar"];
					if(('undefined' == $_POST["calendar"]) or ($_POST["alertS"] === 'undefined') or ($_POST["grading"] === "undefined") or ($_POST["finalChoice"] === 'undefined'))
					{*/
						/*$_SESSION["errorMessage"] = "Here are the current survey results. Go back and fill in all questions to add your survey.";
						echo $_SESSION["errorMessage"];
						
					/*}
					//change question values if all were filled out
					else
					{*/ 
						/*THE CURRENT LIST OF ALL VALUES
						$_SESSION["CalPercent"];
						$_SESSION["AlertPercent"];
						$_SESSION["CalPercent"];
						$_SESSION["gradingPercent"];
						$_SESSION["CalPercent"];
						*/
						
						//NEED TO ADD THE OTHER 3 AS WELL "other strengths"
						
						$currentAdder = ($obj5[0]->totalVotes) + 1;
						$obj5[0]->totalVotes = $currentAdder;
						//Q1
						If($_POST["calendar"] == "I-Learn 2.0")
						{
							$currentAdder1 = ($obj5[1]->choice2) + 1;
							$obj5[1]->choice2 = $currentAdder1;
							$_SESSION["CalPercent"] = $currentAdder1;
						}
						else
						{
							$currentAdder1 = ($obj5[1]->choice3) + 1;
							$obj5[1]->choice3 = $currentAdder1;
						}
						//Q2
						If($_POST["alertS"] == "I-Learn 2.0")
						{
							$currentAdder2 = ($obj5[2]->choice2) + 1;
							$obj5[2]->choice2 = $currentAdder2;
						}
						else
						{
							$currentAdder2 = ($obj5[2]->choice3) + 1;
							$obj5[2]->choice3 = $currentAdder2;
						}
						//Q3
						If($_POST["grading"] == "I-Learn 2.0")
						{
							$currentAdder3 = ($obj5[3]->choice2) + 1;
							$obj5[3]->choice2 = $currentAdder3;
						}
						else
						{
							$currentAdder3 = ($obj5[3]->choice3) + 1;
							$obj5[3]->choice3 = $currentAdder3;
						}
						//Q4
						$parkersList = $_POST['otherStrengths'];
						foreach ($parkersList as $stinkinvalue4)
						{
							If($stinkinvalue4 == "Comment Board")
							{
								$currentAdder4 = ($obj5[4]->choice1) + 1;
								$obj5[4]->choice1 = $currentAdder4;
							}
							if ($stinkinvalue4 == "Quizs")
							{
								$currentAdder4 = ($obj5[4]->choice2) + 1;
								$obj5[4]->choice2 = $currentAdder4;
							}
							if ($stinkinvalue4 == "Submissions")
							{
								$currentAdder4 = ($obj5[4]->choice3) + 1;
								$obj5[4]->choice3 = $currentAdder4;
							}
						}
						//Q5
						If($_POST["finalChoice"] == "I-Learn 2.0")
						{
							$currentAdder5 = ($obj5[5]->choice2) + 1;
							$obj5[5]->choice2 = $currentAdder5;
						}
						else
						{
							$currentAdder5 = ($obj5[5]->choice3) + 1;
							$obj5[5]->choice3 = $currentAdder5;
						}
						
						//NOW DETERMINE THE VARIABLES
						if (($obj5[5]->choice2) >= ($obj5[5]->choice3))
						{
							echo "I learn 2.0 is rooted most popular and has the following results of the survey: <br>";
							$_SESSION["finalPopular"] = "choice2";
						}
						else
						{
							echo "I learn 3.0 is rooted most popular and has the following results of the survey: <br>";
							$_SESSION["finalPopular"] = "choice3";
						}	
						echo $obj5[0]->totalVotes . " people have taken the survey <br>" . "% have rooted " . $_SESSION["calendar"] . " to have the better calendar<br>";
						
					//}	
						
						echo "<br> display2 " . json_encode($obj5) . "<br>";
						//STEP 4: ENCODE FILE
						$rphObjEncoded = json_encode($obj5);
						//STEP 5: OPEN AND OVERWRITE FILE
						$parkersfile = fopen("fileHold.JSON", "w");
						fwrite($parkersfile, $rphObjEncoded);
						fclose($parkersfile);
						echo "<br><br><br>";
					
				}
				//not taking survey, just showing results
				else if ($_SERVER['REQUEST_METHOD'] === 'GET') 
				{
					echo "Here are the current survey results. Go back and fill in all questions to add your survey.";
					//$_SESSION["voted"] = "notCompleted";
				}	
				?>
				
				<a 
					href="Week3AssignmentQuestionaire.php"> <button type="button">Return to Poll</button> </a>
			</form>
		</div>
	</div>
	
	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
</body>
</html>