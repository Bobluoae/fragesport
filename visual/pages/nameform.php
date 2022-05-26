  <header class="mb-auto">&nbsp;</header>
  
  <main class="px-3">
    <h1>Quiz</h1>
    <p class="lead">Select your name and choose a quiz!</p>
    <?=$_POST["error"];?>
  	

    <form class="size" action="?quiz=start" method="post">
    	<p class="lead">
			<input type="text" name="name" placeholder="Ditt namn" autocomplete="off">
			<input type="hidden" name="form" value="nameform">
		</p>
		<p class="lead">
		<select name="quiz_select"> 
			
			<!-- Loop through every entry in the array containing quiz names and positions -->
			<?php foreach ($arr as $num => $quizname) { ?>
				
				<!-- For every loop print out a number and the name and save array key to value -->
				<option value="<?=$num?>">
					<?php echo $num + 1 . " | " . substr($quizname, 0, -5);?>
				</option>
				
			<?php } ?>

		</select>
		<br><br>
		<input type="submit" value="Börja Quiz" class="btn btn-info">
		</p>
	</form>
  </main>