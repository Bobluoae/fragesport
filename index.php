<?php 
include "fragor/fragesport.php";
session_start();

$quiz = new Quiz("questions.json");



if (isset($_POST["form"])) {
	if ($_POST["form"] == "nameform") {
		//Ett namn har angetts
		if (is_string($_POST["name"])){ 
			//Spara i session
			$_SESSION["namn"] = $_POST["name"];

		}
	}
	if ($_POST["form"] == "questionform") {
		//En svara har besvarats

	}	
}


include "visual/header.php";

if (!isset($_GET["quiz"])) {
	$_GET["quiz"] = "";
}
if (!isset($_GET["page"])) {
    $_GET["page"] = "";
}
if (!isset($_GET["pagenum"])) {
	$_GET["pagenum"] = "0";
}
if ($_GET["quiz"]=="clicked") {

	include "visual/navbar.php";

	echo $quiz->getQuestion($_GET["pagenum"]);
	include "visual/questionform.php";


} else {

	include "visual/nameform.php";
}



include "visual/footer.php";