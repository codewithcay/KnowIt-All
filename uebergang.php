<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylesheets/uebergangspage.css">
</head>
<body>
    <?php
    session_start();
    if(isset($_POST['submit'])) {
        $mysqli = new mysqli("localhost","hr4you","hr4you","hr4you_praktikum");
        $sql = "SELECT id FROM questions
                WHERE id = " . (int)$_POST['questions_id'] ."
                AND antwort_id = " . (int)$_POST['submit'];
        $result = $mysqli->query($sql);
        $data = $result->fetch_assoc();

        if($_SESSION['question_count'] >= 15){
            echo "<h2 class = 'title'>Quiz over!</h2>";
            echo "<h3 class = 'title'>Your final score is: " . $_SESSION['score'] . "</h3>";

            $sql = "INSERT INTO highscore (score) VALUES (" . (int)$_SESSION['score'] . ")";
            $result = $mysqli->query($sql);
            session_destroy();
            echo "<button class='button' onclick=\"location.href='index.php'\">Restart Quiz</button>";
            exit();
        }
        else if ( empty($data) ) {
            echo "<h2 class = 'title'>Wrong answer</h2>";
            $_SESSION['score'] -= 10;
            echo "<h3 class = 'title'>Your current score is: " . $_SESSION['score'] . "</h3>";
        }
        else {
            echo "<h2 class = 'title'>Correct answer!</h2>";
            $_SESSION['score'] += 10;
            echo "<h3 class = 'title'>Your current score is: " . $_SESSION['score'] . "</h3>";
        }
        $_SESSION['question_count'] += 1;
    }
    ?>
<form action ="/quiz.php" method="post">
    <input type="hidden" value="<?= (int)$_POST['submitCategory']; ?>" name="submitCategory"></input>
    <button class="button">Next Question</button>
</form>

</body>
</html>
