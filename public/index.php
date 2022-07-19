<?php 
//Logic
include "fragor/fragesport.php";
include "logic/logic.php";

//Start on HTML
include "visual/header.php";

//Page handling when in quiz
if ((isset($_SESSION["quiz_select"]) && isset($_POST["form"])) || $_SESSION["quiz"] == "start") {

	//Fetch the length of the quiz to determine what to do with the pages
	//Check if the user is at the end of a quiz 
	if ($_GET["pagenum"] > ($_SESSION["quizclass"]->getLength() - 1) && $_SESSION["quiz"] == "start") {
		$_GET["pagenum"] = $_SESSION["quizclass"]->getLength();

		include "visual/navbar.php";
		include "visual/pages/endscreen.php";

	} else if ($_SESSION["quiz"]=="start") { //User is in the middle of doing a quiz

		include "visual/navbar.php";

		if ($_GET["pagenum"] < "1") { //Print hello [name] on first page
			$greeting = "<br>Hej, " . $_SESSION["namn"] . "!<br><br>";
		}
		//Show the question form
		include "visual/pages/questionform.php";
		echo $message; // error message
	} 
} else { //If you're not in a quiz, show homepage
	include "visual/pages/nameform.php";
}

//Footer with credits to bootstrap cover
include "visual/footer.php";