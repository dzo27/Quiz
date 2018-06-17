<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php


  //Questions
  $number = (int)$_GET['n'];

  $query = "SELECT * FROM questions";
  $results = $mysqli->query($query);
  $total = $results->num_rows;

  $query = "SELECT * FROM questions
            WHERE question_number = $number";

  $result = $mysqli->query($query);

  $question = $result->fetch_assoc();

  //Choices
  $query = "SELECT * FROM choices
            WHERE question_number = $number";

  $choices = $mysqli->query($query);

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
        <div class="current">
          Question <?php echo $question['question_number']; ?> of <?php echo $total; ?>
        </div>
        <p class="question">
          <?php echo $question['text']; ?>
        </p>
        <form action="process.php" method="post">
          <ul class="choices">
            <?php while($row = $choices->fetch_assoc()): ?>
                <li><input type="radio" name="choice" value=<?php echo $row['id']; ?>><?php echo $row['text']; ?></li>
            <?php endwhile; ?>
          </ul>
          <input type="submit" name="submit" value="submit">
          <input type="hidden" name="number" value=<?php echo $number ?> >
        </form>
      </div>
    </main>
    <footer>
      <div class="container">
        Copyright &copy 2017, MK
      </div>
    </footer>
  </body>
</html>
