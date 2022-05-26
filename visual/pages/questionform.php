<?php 
$q = $_SESSION["quizclass"];
$a = $q->getAnswers($_GET["pagenum"]);

?>
<div id="questionform">
<?php echo (isset($greeting)?$greeting:"");
 echo $q->getQuestion($_GET["pagenum"]) . "<br><br>";?>

<form action="?pagenum=<?php echo $_GET["pagenum"]?>" method="POST">
	

	<?php for ($i=0; $i < count($a); $i++) { ?>
        
        <div style="margin-bottom: 6px;">
            <input type="radio" class="btn-check" name="answer" id="option<?=$i?>" value="<?=$i?>">
            <label class="btn btn-secondary" for="option<?=$i?>"><?=$a[$i]?></label><br>
        </div>
        
    <?php } ?>
    <br><br>
	<input type="submit" name="submit" value="Submit answer" class="btn btn-primary btn-lg">
	<br>
	<input type="hidden" name="form" value="questionform">
	
</form>
<br>

</div>