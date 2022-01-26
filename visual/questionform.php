	<form action="?quiz=clicked&pagenum=<?php echo $_GET["pagenum"]+1?>" method="post">
		
		<input type="radio" name="question" value="1"> Svar 1 <br>
		<input type="radio" name="question" value="2"> Svar 2 <br>
		<input type="radio" name="question" value="3"> Svar 3 <br>
		<input type="radio" name="question" value="4"> Svar 4 <br>
		<input type="submit" value="Svara"> <br>
		<input type="hidden" name="form" value="questionform">
		
	</form>