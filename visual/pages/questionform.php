<?php 
$q = $_SESSION["quizclass"];
$a = $q->getAnswers($_GET["pagenum"]);

?>
<div id="questionform">
<?php echo (isset($greeting)?$greeting:"");
 echo $quiz->getQuestion($_GET["pagenum"]) . "<br><br>";?>

<form action="?pagenum=<?php echo $_GET["pagenum"]?>" method="POST">
	<?php 

	for ($i=0; $i < count($a); $i++) { 
        ?>
        <div style="margin-bottom: 6px;">
            <input type="radio" class="btn-check" name="answer" id="option<?=$i?>" value="<?=$i?>" autocomplete="off">
            <label class="btn btn-secondary" for="option<?=$i?>"><?=$a[$i]?></label><br>

        </div>

        <?php 
		//echo "<input type=\"radio\" name=\"answer\" value=\"$i\"> $a[$i] <br>";
        
		
	}?>
    <br><br>
	<input type="submit" name="submit" value="Svara" class="btn btn-primary btn-lg">
	<br>
	<input type="hidden" name="form" value="questionform">
	
</form>
<br>

</div>

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