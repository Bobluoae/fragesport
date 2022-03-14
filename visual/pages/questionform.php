<?php 
$q = $_SESSION["quizclass"];
$a = $q->getAnswers($_GET["pagenum"]);

?>
<form action="?pagenum=<?php echo $_GET["pagenum"]?>" method="POST">
	<?php 

	for ($i=0; $i < count($a); $i++) { 

		echo "<input type=\"radio\" name=\"answer\" value=\"$i\"> $a[$i] <br>";

		
	}?>

	<input type="submit" name="submit" value="Svara">
	<br>
	<input type="hidden" name="form" value="questionform">
	
</form>

<!-- <p id="output"></p>
<script>
        // add an event listener for the change event
    const radioButtons = document.querySelectorAll('input[name="answer"]');
    for(const radioButton of radioButtons){
        radioButton.addEventListener('change', showSelected);
    }        
    
    function showSelected(e) {
    	console.log(e);

		if (this.checked) {
   			document.querySelector('#output').innerText = `You selected ${this.value}`;
		}
	}
	
     
</script> -->