<!-- navbar for when user is in a quiz -->
<header class="mb-auto">
  <div>
    <!-- link back to homepage -->
    <h3 class="mb-0"><a class="nav-link" href="?quiz=notstart" style="color: white;">Quiz Selection</a></h3>
    <nav class="nav nav-masthead justify-content-center">

      <!-- logic for when the back button can be pressed  -->
      <?php if ($_GET["pagenum"] == 0): ?>
       <!-- do nothing lol -->
      <?php else: ?>
        <a class="nav-link" aria-current="page" href="?pagenum=<?=$_GET["pagenum"]-1?>">Go back</a>
      <?php endif ?>

      <!-- logic for when the next button can be pressed  -->
      <?php if ($_SESSION["quizclass"]->getLength() == $_GET["pagenum"]): ?>
       <!-- do nothing lol -->
      <?php else: ?>
        <a class="nav-link" href="?pagenum=<?=$_GET["pagenum"]+1?>">Next</a>
      <?php endif ?>
      
    </nav>
  </div>
</header>