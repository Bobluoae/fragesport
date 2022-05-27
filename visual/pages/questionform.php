<?php //Logic from class object
$q = $_SESSION["quizclass"];
$a = $q->getAnswers($_GET["pagenum"]);
?>

<div id="questionform">

    <!-- print greeting on first page -->
    <?php echo (isset($greeting)?$greeting:"");

    // print the question string
     echo $q->getQuestion($_GET["pagenum"]) . "<br><br>";?>

    <!-- start of questionform -->
    <form action="?pagenum=<?php echo $_GET["pagenum"]?>" method="POST">
    	
        <!-- make as many answer togglable radiobuttons as the quiz needs -->
    	<?php for ($i=0; $i < count($a); $i++) { ?>
            
            <div style="margin-bottom: 6px;">
                <input type="radio" class="btn-check" name="answer" id="option<?=$i?>" value="<?=$i?>">
                <label class="btn btn-secondary" for="option<?=$i?>"><?=$a[$i]?></label><br>
            </div>
            
        <?php } ?>
        <br><br>
        <!-- Submission of questionform -->
    	<input type="submit" name="submit" value="Submit answer" class="btn btn-primary btn-lg">
    	<br>
    	<input type="hidden" name="form" value="questionform">
    </form>
</div>