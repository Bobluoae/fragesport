<?php 
include "fragor/fragesport.php";
include "visual/header.php";
session_start();

$message = "";

if (!isset($_SESSION["results"])) {
	$_SESSION["results"] = [];
}

if (!isset($_GET["quiz"])) {
	$_GET["quiz"] = "";
}

if (!isset($_SESSION["quiz"]) || $_GET["quiz"] == "notstart") {
	$_SESSION["quiz"] = "notstart";
	$_SESSION["results"] = [];
}


$quiz = new Quiz("questions.json");
$_SESSION["quizclass"] = $quiz;



if (isset($_POST["form"])) {
	
	if ($_POST["form"] == "nameform") {

		if ($_POST["name"] == "") {
		
			$_POST["error"] = '<strong style = "color: red";> Du måste skriva ett namn!</strong>';

		} else if (is_string($_POST["name"])){ 
			//Spara i session
			$_SESSION["namn"] = $_POST["name"];

			$_SESSION["quiz"] = "start";
		}
	} 
	if ($_POST["form"] == "questionform") {
		//En svara har besvarats
		//TODO =============================================================================================
		$c = $quiz->getCorrect($_GET["pagenum"]);
	    


	    //if(isset($_POST['submit'])){
	        if(isset($_POST['answer'])) {

	        	// var_dump($_POST['answer']); echo "<br>";
	        	// var_dump($c); echo "<br>";
	        	// die();

	            if ($_POST['answer'] == $c) {

	                $message = " Correct!";
	                $_SESSION["results"][$_GET["pagenum"]] = 1;
	        	    
            	} else if ($_POST['answer'] != $c) {

	                $message = " Incorrect!";
	                $_SESSION["results"][$_GET["pagenum"]] = 0;
                
	            }
	            $_GET["pagenum"] = strval($_GET["pagenum"] + "1");
	        } else {
	            $message = 'Please select something';
	        }
	    //}
	}	
}


if (!isset($_POST["error"])) {
	$_POST["error"] = "";
}
if (!isset($_POST["quiz"])) {
	$_POST["quiz"] = "";
}
if (!isset($_GET["page"])) {
    $_GET["page"] = "";
}
if (!isset($_GET["pagenum"])) {
	$_GET["pagenum"] = "0";
}

// keep pagenum to the number of json file questions
if ($_GET["pagenum"] < "0") {
	$_GET["pagenum"] = "0";
}

if ($_GET["pagenum"] > ($quiz->getLength() - 1) && $_SESSION["quiz"]=="start") {
	$_GET["pagenum"] = $quiz->getLength();

	include "visual/navbar.php";

	include "visual/pages/endscreen.php";

} else if ($_SESSION["quiz"]=="start") {

	include "visual/navbar.php";

	if ($_GET["pagenum"] < "1") {
	echo "<br>Hej, " . $_SESSION["namn"] . "!<br><br>";
	}

	echo $quiz->getQuestion($_GET["pagenum"]);
	include "visual/pages/questionform.php";
	echo $message; 

    

} else {

	include "visual/pages/nameform.php";
}



include "visual/footer.php";