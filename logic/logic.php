<?php  session_start();
//Error meddelande variabel
$message = "";

//Definitioner
if (!isset($_SESSION["results"])) {
	$_SESSION["results"] = [];
}
if (!isset($_GET["quiz"])) {
	$_GET["quiz"] = "";
}

//Om quizzen inte är startad
if (!isset($_SESSION["quiz"]) || $_GET["quiz"] == "notstart") {
	$_SESSION["quiz"] = "notstart";
	$_SESSION["results"] = [];
}

//Quiz selection
$arr = ["Overwatch.json", "Minecraft.json"];

//namn formulär som startar quiz
if (isset($_POST["form"])) {
	
	if ($_POST["form"] == "nameform") {

		if ($_POST["name"] == "") {
			
			$_POST["error"] = '<br><strong style = "color: red";> You need to write a name!</strong>';

			unset($_SESSION["quiz_select"]);

		} else if (is_string($_POST["name"])){ 
			//Spara i session
			$_SESSION["namn"] = $_POST["name"];

			$_SESSION["quiz_select"] = $_POST["quiz_select"];
			$_SESSION["quiz"] = "start";
		}
	} 
	//Variableriawdoiawdainh
	if (isset($_SESSION["quiz_select"])) {

		if (is_numeric($_SESSION["quiz_select"])) {

			$var = $arr[$_SESSION["quiz_select"]];
			$quiz = new Quiz($var);

			$_SESSION["quizclass"] = $quiz;
		}
	}
	if ($_POST["form"] == "questionform") {
		//En svara har besvarats
		$c = $quiz->getCorrect($_GET["pagenum"]);
	    
        if(isset($_POST['answer'])) {

            if ($_POST['answer'] == $c) {

                // $message = " Correct!";
                $_SESSION["results"][$_GET["pagenum"]] = 1;
        	    
        	} else if ($_POST['answer'] != $c) {

                // $message = " Incorrect!";
                $_SESSION["results"][$_GET["pagenum"]] = 0;
            
            }
            $_GET["pagenum"] = strval($_GET["pagenum"] + "1");
        } else {
            $message = 'Please select something.';
        }
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



//=============================================================================================0