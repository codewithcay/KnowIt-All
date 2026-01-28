<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>KnowIt All - Quiz</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylesheets/quizpage.css">
  </head>
  <body>
    <h1 class="title">Quiz Time!</h1>

    <?php
        $mysqli = new mysqli("localhost","hr4you","hr4you","hr4you_praktikum");

        $randomInt = rand(1, 10);
        $sql = "SELECT * FROM questions WHERE id = $randomInt";
        $result = $mysqli->query($sql);
        if ( !$result ) {
            echo "Error: " . $mysqli->error;
            exit();
        }
        $rowQ = $result->fetch_assoc();

        $sql = "SELECT * FROM answers WHERE frage_id = $randomInt";
        $result = $mysqli->query($sql);
        if ( !$result ) {
            echo "Error: " . $mysqli->error;
            exit();
        }
        $rowsA = $result->fetch_all(MYSQLI_ASSOC);
    ?>

    <div class="row">
      <h2 class = "question"><?php echo $rowQ['frage']; ?></h2>
    </div>

    <div class="buttons-wrapper">
      <form action ="/uebergang.php" method="post">
        <input type="hidden" name="questions_id" value="<?php echo $rowQ['id']; ?>">
    <?php
    shuffle($rowsA);
    foreach ($rowsA as $answer){
      echo '<button type="submit" class="button" name="submit" value="'.$answer['id'].'">'.$answer['antwort'].'</button>';
    }
    ?>
      </form>
    </div>

  </body>