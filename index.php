<?php include 'database.php' ?>
<?php

  //total number of Questions
  $query = "SELECT * FROM questions";
  $results = $mysqli->query($query);
  $total = $results->num_rows;
 ?>
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
        <h2>Test Your PHP Knowledge</h2>
        <p>This is a multiple choice quiz to test your knowledge of PHP</p>
        <ul>
          <li><strong>Number of Questions:  </strong><?php echo $total; ?></li>
          <li><strong>Type:</strong>Multiple Choice</li>
          <li><strong>Estimated time: </strong><?php echo $total * 0.5 . " Minutes"; ?></li>
        </ul>
        <a href="question.php?n=1" class="start">Start Quiz</a>
      </div>
    </main>
    <footer>
      <div class="container">
        Copyright &copy 2017, MK
      </div>
    </footer>
  </body>
</html>
