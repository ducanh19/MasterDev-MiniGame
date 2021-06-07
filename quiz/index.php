<?php
    $mes;
    session_start();
    if (empty($_SESSION['result'])) {
        $mes = "Welcome to funny quiz! <br>-----ahihi-----";
    } else {
        $mes = $_SESSION['result'];
        session_destroy();
    }
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
<body>
    <div class="container">
        <div class="showMes">
            <?= $mes ?>
        </div>

        <form action="takeQuiz.php" method="post">
            <div class="bottom">
                <button class="control-game" name="control" value="start">Start Game</button>
            </div>
        </form>
    </div>
</body>
</html>