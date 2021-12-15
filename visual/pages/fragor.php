<?php 


$questions = file_get_contents("questions.json");

$fragorArr = json_decode($questions);

foreach ($fragorArr as $fragaObj) {
	echo "<hr>" . $fragaObj->questionStr;

	foreach ($fragaObj->choicesArr as $svarStr) {
		echo "<br>" . $svarStr;
	}
}