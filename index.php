<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>KnowIt All - Home</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheets/landingpage.css">
</head>
  <body>
    <?php
    session_start();
    $_SESSION['score'] = 0;
    $_SESSION['question_count'] = 0;
    ?>

    <div class="container">
    <h1 class="title">KnowIt All</h1>
    <p class="paragraph">A Quiz website for basic knowledge.</p>
    <button class="button" onclick="location.href='quiz.php'">Start Quiz</button>
    <?php
    $mysqli = new mysqli("localhost","hr4you","hr4you","hr4you_praktikum");
    $sql = "SELECT * FROM categories ";
    $result = $mysqli->query($sql);
    if (!$result) {
        echo "Error: " . $mysqli->error;
        exit();
    }
    $rows = $result->fetch_all(MYSQLI_ASSOC);
  ?>
    <div class="buttons-wrapper">
      <form action="/quiz.php" method="post">
        <?php
          foreach ($rows as $category){
              echo '<button type="submit" class="button" name="submitCategory" value="'.$category['id'].'">'.$category['name'].'</button>';
          }
        ?>
      </form>
    </div>
</div>
  </body>
</html>
