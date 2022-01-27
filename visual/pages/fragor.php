<?php 

// Jag vill så att när man klickar på Nästa får man + 1 värde på en global variabel som sedan bestämmer beroende på nummer, vilken fråga/sida som ska visas
// TODO
// Nästa = + 1 varje gång förutom när det blir över det maximala
// Bakåt = - 1 varje gång förutom när det blir 0

$questions = file_get_contents("questions.json");

$fragorArr = json_decode($questions);



foreach ($fragorArr as $fragaObj) {

	echo "<hr>" . $fragaObj->questionStr . " " . $_GET["pagenum"];

	foreach ($fragaObj->choicesArr as $svarStr) {
		echo "<br>" . $svarStr;

	}
}