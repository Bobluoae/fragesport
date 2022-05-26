<?php 
include "fragor/fragesport.php";
include "visual/header.php";

include "logic/logic.php";

if ((isset($_SESSION["quiz_select"]) && isset($_POST["form"])) || $_SESSION["quiz"] == "start") {

	if ($_GET["pagenum"] > ($_SESSION["quizclass"]->getLength() - 1) && $_SESSION["quiz"] == "start") {
		$_GET["pagenum"] = $_SESSION["quizclass"]->getLength();

		include "visual/navbar.php";
		include "visual/pages/endscreen.php";

	} else if ($_SESSION["quiz"]=="start") {

		include "visual/navbar.php";

		if ($_GET["pagenum"] < "1") {
			$greeting = "<br>Hej, " . $_SESSION["namn"] . "!<br><br>";
		}
		
		include "visual/pages/questionform.php";
		echo $message;
	} 
} else {
	include "visual/pages/nameform.php";
}


include "visual/footer.php";



$_POST["question"] = 0;

if ($_POST["question"] == "0") {
	$_POST["question"] = 0;
}
if ($_POST["question"] == "1") {
	$_POST["question"] = 1;
}


