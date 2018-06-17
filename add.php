<?php include 'database.php';

if (isset($_POST['submit'])) {
  $question_number = $_POST['question_number'];
  $question_text = $_POST['question_text'];
  $correct_choice = $_POST['correct_choice'];

  $choices = [];
  $choices[1] = $_POST['choice1'];
  $choices[2] = $_POST['choice2'];
  $choices[3] = $_POST['choice3'];
  $choices[4] = $_POST['choice4'];
  $choices[5] = $_POST['choice5'];

  $query = "INSERT INTO questions (question_number, text) VALUES ('$question_number', '$question_text')";

  $insert_row = $mysqli->query($query);

  if ($insert_row) {
    foreach ($choices as $choice => $value) {
      if ($value != "") {
        if ($correct_choice == $choice) {
          $is_correct = 1;
        } else {
          $is_correct = 0;
        }
        $query = "INSERT INTO choices (question_number, is_correct, text) VALUES ('$question_number', '$is_correct', '$value')";

        $insert_row = $mysqli->query($query);

        if ($insert_row) {
          continue;
        }else {
          die('Error! ');
        }
      }
    }
    $msg = "Question has been added";
  }
}


  $query = "SELECT * FROM questions";
  $questions = $mysqli->query($query);
  $total = $questions->num_rows;
  $next = $total +1;
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
        <h2>Add a Question</h2>
        <?php if (isset($msg)) {
          echo "<p>". $msg ."</p>";
        } ?>
        <form action="add.php" method="post">
          <p>
            <label>Question Number</label>
            <input type="number" value="<?php echo $next; ?>" name="question_number">
          </p>

          <p>
            <label>Question Text</label>
            <input type="text" name="question_text">
          </p>

          <p>
            <label>Choice 1</label>
            <input type="text" name="choice1">
          </p>

          <p>
            <label>Choice 2</label>
            <input type="text" name="choice2">
          </p>

          <p>
            <label>Choice 3</label>
            <input type="text" name="choice3">
          </p>

          <p>
            <label>Choice 4</label>
            <input type="text" name="choice4">
          </p>

          <p>
            <label>Choice 5</label>
            <input type="text" name="choice5">
          </p>

          <p>
            <label>Correct Choice Number</label>
            <input type="number" name="correct_choice">
          </p>

          <p>
            <input type="submit" name="submit" value="submit">
          </p>

        </form>
      </div>
      <div class="container">
        <p>Do you want to do this Quiz Again?</p>
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
