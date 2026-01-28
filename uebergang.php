<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    if(isset($_POST['submit'])) {
        $mysqli = new mysqli("localhost","hr4you","hr4you","hr4you_praktikum");
        $sql = "SELECT id FROM questions
                WHERE id = " . (int)$_POST['questions_id'] ."
                AND antwort_id = " . (int)$_POST['submit'];
        $result = $mysqli->query($sql);
        $data = $result->fetch_assoc();
        if ( empty($data) ) {
            echo "Wrong answer" . $mysqli->error;
            exit();
        }
        else {
            echo "Correct answer!";
        }
    }
    ?>

</body>
</html>