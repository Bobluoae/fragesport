<?php  
session_start();

//Error message variable definition
$message = "";

//Definitions
if (!isset($_SESSION["results"])) {
	$_SESSION["results"] = [];
}
if (!isset($_GET["quiz"])) {
	$_GET["quiz"] = "";
}

//Definitions for unset variables
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

//If quiz is not started, reset results
if (!isset($_SESSION["quiz"]) || $_GET["quiz"] == "notstart") {
	$_SESSION["quiz"] = "notstart";
	$_SESSION["results"] = [];
}

//Quiz selection where 0 is the first quiz and 1 is the second and so on...
$arr = ["Overwatch.json", "Minecraft.json"];

//Nameform on homepage
if (isset($_POST["form"])) {
	
	//Form is submitted
	if ($_POST["form"] == "nameform") {

		//Throw error if user hasn't submitted a name
		if ($_POST["name"] == "") {
			
			$_POST["error"] = '<br><strong style = "color: red";> You need to write a name!</strong>';

			unset($_SESSION["quiz_select"]);

		} else if (is_string($_POST["name"])){  //If user sent a name start the quiz

			//Save variables to session
			$_SESSION["namn"] = $_POST["name"];

			$_SESSION["quiz_select"] = $_POST["quiz_select"];
			//Start the quiz
			$_SESSION["quiz"] = "start";
		}
	} 

	//Select the specified quiz user gave from option form and initialize the quiz class and save to session
	if (isset($_SESSION["quiz_select"])) {

		if (is_numeric($_SESSION["quiz_select"])) {

			$var = $arr[$_SESSION["quiz_select"]];
			$quiz = new Quiz($var);

			$_SESSION["quizclass"] = $quiz;
		}
	}

	//If the questionform is submitted
	if ($_POST["form"] == "questionform") {

		//Get the correct answer dependant on the page the user is on
		$c = $quiz->getCorrect($_GET["pagenum"]);
	    
        if(isset($_POST['answer'])) {

        	//Check if answer number corresponds with the correct number from json
            if ($_POST['answer'] == $c) {

                // $message = " Correct!";
                $_SESSION["results"][$_GET["pagenum"]] = 1; //Add 1 for correct answer to results array where user is in the quiz
        	    
        	} else if ($_POST['answer'] != $c) {

                // $message = " Incorrect!";
                $_SESSION["results"][$_GET["pagenum"]] = 0; //Add 0 for incorrect answer to results array where user is in the quiz
            
            }
            $_GET["pagenum"] = strval($_GET["pagenum"] + "1"); //Add one to users page (goes to next page)
        } else {
            $message = 'Please select something.'; //Error message
        }
	}	
}

//Make sure user cant go under the value of 0 in pages
if ($_GET["pagenum"] < "0") {
	$_GET["pagenum"] = "0";
}