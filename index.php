<?php 
include "visual/header.php";
include "visual/navbar.php";
include "visual/main.php";
include "visual/footer.php";
//include "visual/pages/fragor.php";

$questions = file_get_contents("questions.json");

$fragorArr = json_decode($questions);

foreach ($fragorArr as $fragaObj) {
	echo "<hr>" . $fragaObj->questionStr;

	foreach ($fragaObj->choicesArr as $svarStr) {
		echo "<br>" . $svarStr;
	}
}