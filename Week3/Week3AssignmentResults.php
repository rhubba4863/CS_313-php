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
//$_SESSION["voted"] = "notcompleted";
?>

<!DOCTYPE html>
<html>

<body>
	<!-- write to the file using append -->
	
	<?php 
			//Method 6 ////////////////////////////////////////
		/*
		$json = '[
			{
				"title": "Professional JavaScript",
				"author": "Nicholas C. Zakas"
			},
			{
				"title": "JavaScript: The Definitive Guide",
				"author": "David Flanagan"
			},
			{
				"title": "High Performance JavaScript",
				"author": "Nicholas C. Zakas"
			}
		]';
		$json = file_get_contents("testjson.json");
		//$fileBeenRead2 = file_get_contents("fileHold.json");
		$books = json_decode($json);
		// access property of object in array
		echo $books[1]->title; // JavaScript: The Definitive Guide
		*/
		
		
		//http://stackoverflow.com/questions/1372147/check-whether-a-request-is-get-or-post
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
			$currentAdder = ($obj5[0]->totalVotes) + 1;
			$obj5[0]->totalVotes = $currentAdder;
			//Q1
			If($_POST["calendar"] == "I-Learn 2.0")
			{
				$currentAdder1 = ($obj5[1]->choice2) + 1;
				$obj5[1]->choice2 = $currentAdder1;
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
			
			
			
			
			echo "display2 " . json_encode($obj5) . "<br>";
		//STEP 4: ENCODE FILE
			$rphObjEncoded = json_encode($obj5);
		//STEP 5: OPEN AND OVERWRITE FILE
			$parkersfile = fopen("fileHold.JSON", "w");
			fwrite($parkersfile, $rphObjEncoded);
			fclose($parkersfile);
			echo "<br><br><br>";
		}
		//not taking servey, just showing results
		else if ($_SERVER['REQUEST_METHOD'] === 'GET') 
		{
			echo "i need you";
			//$_SESSION["voted"] = "notCompleted";
		}
		
		
		
		
		echo "<br>";
		//var_dump($obj);
		echo "<br>";
		
		//echo $obj->overallVotes; // 12345
		
		//fclose($myfile);
	?>
	
	<?php
		//echo "The Following are results of the classes survey" 
	?>
	The Following are results of the classes survey <br>
	1) Better Calendar:
	<?php 
		//echo $_POST["calendar"]
	?><br>
	
	2) Better Alert System ... 
	<?php 
		//echo $_POST["alertS"] 
	?><br>

	3) Better Grading System ...
	<?php 
		//$selected_radio = $_POST['grading'];
		//print $selected_radio;
	?><br>
	
	4) Strongest in other fields <br>
	<?php
		/*$parkersList = $_POST['otherStrengths'];
		foreach ($parkersList as $stinkinvalue)
		{
			//echo "<p style='font-size: 450px;'>" . $stinkinvalue . "</p><br>";
			echo $stinkinvalue . "<br>";
		}
		//echo $parkersList;
		//print_r($_POST['vacations']);*/
	?>
	5) Overall, the most popular system is
	
	<a href="Week3AssignmentQuestionaire.php"> <button type="button">Return to Poll</button> </a>
	<!--<button>Return to Poll </button>-->
	
	
	
	
	
	
	
	
	
	
	
	
	
	
</body>
</html>