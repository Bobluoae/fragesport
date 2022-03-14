<?php 
 


 ?>

<div>
	<div>
		<div class="container" style="color: white;">
			
			<h1>
				<?php echo "<br>You completed the quiz! <br><br> Well played, " . $_SESSION["namn"] . ".<br><br>";
				$q = $_SESSION["quizclass"];
				$total = $q->getLength();
				$result = 0;

				foreach ($_SESSION["results"] as $key => $value) {
					if ($value == "1") {
						$result++;
					}
				}
				
				echo "You got " . $result . " out of " . $total . " correct!";
				?>
				<br><br><a href="?quiz=notstart" style="color: white">Quiz Selection</a>
			</h1>

		</div>
	</div>
</div>