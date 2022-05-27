<?php 
	//Count how many correct answers the user got
	$q = $_SESSION["quizclass"];
	$total = $q->getLength();
	$result = 0;

	foreach ($_SESSION["results"] as $key => $value) {
		if ($value == "1") {
			$result++;
		}
	}
?>
<!-- Container for endscreen -->
<div class="container" style="display: flex; color: white; position: relative; aspect-ratio: 1/1;">

	<!-- Canvas shown behind content if user did well -->
	<div id="overlapper" style="position: absolute; z-index: -100">
		<?php if ($result > $total / 2): ?>
			<canvas style="height: 100%; width: 100%;" id="canvas" width="800" height="800"></canvas>
		<?php endif ?>
	</div>

	<!-- Content of endscreen -->
	<div style="align-items: center; align-self: center; justify-content: center; width: 100%">
		
		<?php //Different outcomes depending how well the user did
		if ($result > $total / 2) {
			echo "<h1>Well played, " . $_SESSION["namn"] . "!</h1><br><br>";
		} else {
			echo "<h1>Good try, " . $_SESSION["namn"] . ".</h1><br><br>";
		}
		//Give user feedback on their result
		echo "<h3>You got " . $result . " out of " . $total . " correct!</h3>";
		?>

		<!-- Link back to homepage -->
		<br><br><a class="btn btn-primary btn-lg" href="?quiz=notstart" style="color: white">Back to Quiz Selection</a>
	</div>
	<!-- include the javascript for the funny balls -->
	<script src="frontend/boll.js"></script>
</div>