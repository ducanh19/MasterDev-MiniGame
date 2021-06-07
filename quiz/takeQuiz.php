<?php
require_once ("manageQuiz.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funny quiz</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body onload="countDown()">
    <div class="container">
        <form action="takeQuiz.php" method="post" id="myForm">
            <div class="header">
                <div class="status-answer">
                    Correct!
                </div>
                <div class="score">
                    Score: <?= $_SESSION['score'] ?>
                </div>
            </div>

            <div class="question">
                <p><?= $firstNum ?></p>
                <p><?= $operator ?></p>
                <p><?= $secondNum ?></p>
            </div>

            <div class="instruction">
                Click on the correct answer!
            </div>

            <div class="answer">
                <button class="ans" name="answer" value="1"><?= $ans[0] ?></button>
                <button class="ans" name="answer" value="2"><?= $ans[1] ?></button>
                <button class="ans" name="answer" value="3"><?= $ans[2] ?></button>
                <button class="ans" name="answer" value="4"><?= $ans[3] ?></button>
            </div>

            <div class="bottom">
                <button class="control-game" name="control" value="reset">Reset Game</button>
                <div class="time" id="time">
                    
                </div>
            </div>

            <input type="text" id="min" name="min" value="<?= $_SESSION['min'] ?>" hidden>
            <input type="text" id="sec" name="sec" value="<?= $_SESSION['sec'] ?>" hidden>
            <input type="text" id="correct" value="<?= $_SESSION['correctAnsIndex'] ?>" hidden>
        </form>
    </div>

    <script src="js/script.js"></script>
</body>
</html>