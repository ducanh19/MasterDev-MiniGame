<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funny quiz</title>
    <link rel="stylesheet" href="css/quiz.css">
</head>
<body onload="ajax_getQues(-1); countDown()">
    <div class="container">
        <div class="header">
            <div class="highest-score">
                Highest: <?= $_SESSION['highest'] ?>
            </div>
            <div class="name">
                Hi <?= (strlen($_SESSION['name']) > 8) ? substr($_SESSION['name'],0,8) . "..." : $_SESSION['name'] ?>!
            </div>
            <div class="score">
                Your score: <?= $_SESSION['score'] ?>
            </div>
        </div>

        <div class="question">
            <p id="question"></p>
        </div>

        <div class="instruction">
            Click on the correct answer!
        </div>

        <div class="answer">
            <button class="ans" name="answer" value="0" onclick="ajax_getQues(event.target.value)"></button>
            <button class="ans" name="answer" value="1" onclick="ajax_getQues(event.target.value)"></button>
            <button class="ans" name="answer" value="2" onclick="ajax_getQues(event.target.value)"></button>
            <button class="ans" name="answer" value="3" onclick="ajax_getQues(event.target.value)"></button>
        </div>

        <div class="bottom">
            <form action="controller/control.php" method="post">
                <button class="control-game" name="control" value="Reset">Reset Game</button>
            </form>

            <div class="time" id="time"></div>
        </div>

        <input type="text" id="timelimit" value="<?= $_SESSION['time'] ?>" hidden>
    </div>

    <script src="js/quiz.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>