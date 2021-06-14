<?php
session_start();

function startGame() {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['highest'] = getHighestScore();
    $_SESSION['time'] = getTime();
    $_SESSION['score'] = 0;

    $GLOBALS['conn']->close();  //Close database connection.
}

// User click on control button ('Start Game' or 'Reset Game')
if (isset($_POST['control'])) {
    if ($_POST['control'] == 'Play Game') { //When user click 'Play Game'
        include_once $_SERVER["DOCUMENT_ROOT"] . '/quiz/db/getQuizInfo.php';
        startGame();
        header("Location: http://localhost/quiz/takeQuiz.php");

    } else if ($_POST['control'] == 'Reset') {  //When user click 'Reset'
        header("Location: http://localhost/quiz");
    }
} else { //Time out or Click wrong answer.

    $_SESSION['result'] = "Game over!<br>Your score: " . $_SESSION['score'];
    include_once $_SERVER["DOCUMENT_ROOT"] . '/quiz/db/addUser.php';
    header("Location: http://localhost/quiz");
}

?>