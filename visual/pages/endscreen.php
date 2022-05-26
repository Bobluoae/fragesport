<?php 

				$q = $_SESSION["quizclass"];
				$total = $q->getLength();
				$result = 0;

				foreach ($_SESSION["results"] as $key => $value) {
					if ($value == "1") {
						$result++;
					}
				}

 ?>

<div>
	<div>
		<div class="container" style="display: flex; color: white; position: relative; aspect-ratio: 1/1;">
			<div id="overlapper" style="position: absolute; z-index: -100">
				<?php if ($result > $total / 2): ?>
					<canvas style="/*border:1px solid black;*/ height: 100%; width: 100%;" id="canvas" width="800" height="800"></canvas>
				<?php endif ?>
				
			</div>
			<div style="align-items: center; align-self: center; justify-content: center; width: 100%">
				
				<?php 
				if ($result > $total / 2) {
					echo "<h1>Well played, " . $_SESSION["namn"] . "!</h1><br><br>";
				} else {
					echo "<h1>Good try, " . $_SESSION["namn"] . ".</h1><br><br>";
				}


				
				echo "<h3>You got " . $result . " out of " . $total . " correct!</h3>";
				?>
				<br><br><a class="btn btn-primary btn-lg" href="?quiz=notstart" style="color: white">Back to Quiz Selection</a>
				</div>



<script src="frontend/boll.js"></script>


		</div>
	</div>
</div>