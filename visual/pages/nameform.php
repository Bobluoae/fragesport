<header class="mb-auto">&nbsp;</header>
<main class="px-3">
	<!-- Homepage screen with quiz selection and name form-->
	<h1>Quiz</h1>
	<p class="lead">Select your name and choose a quiz!</p>

	<!-- Print error if the variable contains an error message -->
	<?=$_POST["error"];?>

	<!-- Start of the name part of the form -->
	<form class="size" action="?quiz=start" method="post">
		<p class="lead">
			<input type="text" name="name" placeholder="Your name" autocomplete="off">
			<input type="hidden" name="form" value="nameform">
		</p>

		<!-- Start of the quiz selection part of the form -->
		<p class="lead">
		<select name="quiz_select"> 
			
			<!-- Loop through every entry in the array containing quiz names and positions -->
			<?php foreach ($arr as $num => $quizname) { ?>
				
				<!-- For every loop print out a number and the name and save array key to value and delete .json file extention -->
				<option value="<?=$num?>">
					<?php echo $num + 1 . " | " . substr($quizname, 0, -5);?>
				</option>
				
			<?php } ?>

		</select>
		<br><br>

		<!-- Submit form button -->
		<input type="submit" value="Begin Quiz!" class="btn btn-info">
		</p>
	</form>
</main>