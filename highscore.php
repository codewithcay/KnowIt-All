<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylesheets/highscore.css">
</head>
<body>
    <div class="container">
    <h1 class="title">KnowIt All - Highscores</h1>
    <?php
    $mysqli = new mysqli("localhost","hr4you","hr4you","hr4you_praktikum");
    $sql = "SELECT * FROM highscore ORDER BY score DESC LIMIT 10";
    $result = $mysqli->query($sql);
    if ( !$result ) {
        echo "Error: " . $mysqli->error;
        exit();
    }
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    foreach ($rows as $row) {
        echo "<p class='paragraph'>" . htmlspecialchars($row['score'], ENT_QUOTES, 'UTF-8') . "</p>";
    }
    ?>
    <button class="button" onclick="location.href='index.php'">Back to Home</button>
    </div>
</body>
</html>
