<?php 
include "fragor/fragesport.php";
session_start();

if (!isset($_GET["quiz"])) {
	$_GET["quiz"] = "";
}

if (!isset($_SESSION["quiz"]) || $_GET["quiz"] == "notstart") {
	$_SESSION["quiz"] = "notstart";
}


$quiz = new Quiz("questions.json");
$_SESSION["quizclass"] = $quiz;

if (isset($_POST["form"])) {
	
	if ($_POST["form"] == "nameform") {





		if ($_POST["name"] == "") {
		
			echo "<a href='/''>Skriv ditt namn för fan</a>";
		} else if (is_string($_POST["name"])){ 
			//Spara i session
			$_SESSION["namn"] = $_POST["name"];

			$_SESSION["quiz"] = "start";
		}
	} 
	if ($_POST["form"] == "questionform") {
		//En svara har besvarats

	}	
}

echo "<br>";
var_dump($_POST); echo "<br>";

include "visual/header.php";

if (!isset($_POST["quiz"])) {
	$_POST["quiz"] = "";
}
if (!isset($_GET["page"])) {
    $_GET["page"] = "";
}
if (!isset($_GET["pagenum"])) {
	$_GET["pagenum"] = "0";
}
if ($_SESSION["quiz"]=="start") {

	include "visual/navbar.php";

	echo $quiz->getQuestion($_GET["pagenum"]);
	include "visual/questionform.php";


} else {

	include "visual/nameform.php";
}



include "visual/footer.php";