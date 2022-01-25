<?php 
session_start();
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

	if ($_GET["pagenum"]== "1") {
		include "visual/pages/fragor.php";
	}
}

include "visual/main.php";
include "visual/footer.php";