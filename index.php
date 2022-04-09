<?php 
include "fragor/fragesport.php";
include "visual/header.php";

include "logic/logic.php";

if ($_GET["pagenum"] > ($quiz->getLength() - 1) && $_SESSION["quiz"]=="start") {
	$_GET["pagenum"] = $quiz->getLength();

	include "visual/navbar.php";
	include "visual/pages/endscreen.php";

} else if ($_SESSION["quiz"]=="start") {

	include "visual/navbar.php";

	if ($_GET["pagenum"] < "1") {
		$greeting = "<br>Hej, " . $_SESSION["namn"] . "!<br><br>";
	}
	
	include "visual/pages/questionform.php";
	echo $message; 
} else {
	include "visual/pages/nameform.php";
}



include "visual/footer.php";