<?php 
$q = $_SESSION["quizclass"];
$a = $q->getAnswers($_GET["pagenum"]);

 ?>
	<form action="?quiz=clicked&pagenum=<?php echo $_GET["pagenum"]+1?>" method="post">
		<?php 

		for ($i=0; $i < count($a); $i++) { 
			
			echo "<input type=\"radio\" name=\"answer\" value=\"$a[$i]\"> $a[$i] <br>";

		}

		 ?>
		
<!-- 		<input type="radio" name="answer" value="2"> Svar 2 <br>
		<input type="radio" name="answer" value="3"> Svar 3 <br>
		<input type="radio" name="answer" value="4"> Svar 4 <br> -->
		<input type="submit" value="Svara"> <br>
		<input type="hidden" name="form" value="questionform">
		
	</form>