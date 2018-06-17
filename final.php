<?php session_start(); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>PHP Quiz</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
  </head>
  <body>
    <header>
      <div class="container">
        <h1>PHP Quiz</h1>
      </div>
    </header>
    <main>
      <div class="container">
        <h2>You're done!</h2>
        <p>Congratulations! You have completed the quiz!</p>
        <p>Final score: <?php echo $_SESSION['score']; ?></p>
        <a href="question.php?n=1" class="start">Retake quiz?</a>
        <a href="add.php" class="add">Or Add Question?</a>
        <a href="index.php" class="start">Go to the Start</a>
      </div>
    </main>
    <footer>
      <div class="container">
        Copyright &copy 2017, MK
      </div>
    </footer>
  </body>
</html>
