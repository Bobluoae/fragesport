<div id="nav">
  
    <ul>
      <li><a href="?pagenum=<?php echo $_GET["pagenum"]-1?>">Tillbaka</a></li>
      <li><a href="?quiz=notstart">Go to root</a></li>
      <li><a href="?pagenum=<?php echo $_GET["pagenum"]+1?>">Nästa</a></li>
    </ul>
  
</div>
<?php echo "<br>Hej, " . $_SESSION["namn"] . "!<br><br>";  ?>