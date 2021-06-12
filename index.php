<?php
    $mes;
    session_start();
    if (empty($_SESSION['result'])) {
        $mes = "Welcome to funny quiz! <br>-----ahihi-----";
    } else {
        $mes = $_SESSION['result'];
    }
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funny quiz</title>
    <link rel="stylesheet" href="css/quiz.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="container">
        <div class="showMes">
            <?= $mes ?>
        </div>

        <div class="bottom">
            <button class="control-game" id="start">Start Game</button>
            <button class="control-rank" id="btRank">
                <img src="img/rank.png" alt="Ranking" height="42px" width="42px">
            </button>
        </div>
        
        <!-- Name dialog -->
        <div id="name" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <form name="myForm" action="controller/control.php" onsubmit="return validateName();" method="post">
                    <h1 class="title">Enter your name first!</h1>
                    <input type="text" class="input-name" name="name" placeholder="Your name" maxlength="50" required>
                    <div class="button-submit">
                        <input type="submit" class="bt" name="control" value="Play Game">
                    </div>
                </form>
            </div>
        </div>

        <!-- Table-ranking dialog -->
        <div id="rank" class="modal">
            <!-- Table-ranking content -->
            <div class="modal-table-content">
                <table class="ranking">
                    <thead>
                        <th>Name</th>
                        <th>Score</th>
                        <th>Trying times</th>
                        <th>Last playing</th>
                    </thead>
                    <span id="rankElement"></span>
                    <?php
                        include_once "controller/getPlayer.php";
                    ?>
                </table>
            </div>
        </div>
    </div>

    <script src="js/index.js"></script>
</body>
</html>