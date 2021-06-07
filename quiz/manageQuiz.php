<?php
session_start();
$firstNum;
$secondNum;
$operator;
$ans = array();
$correctAnsIndex;
$min;
$sec;

/**
 * Generate number element.
 */
function genNum() {
    return rand(3, 99);
}

/**
 * '0' is plus operator.
 * '1' is substract operator.
 * '2' is mutilple operator.
 */
function genOperator() {
    $x = rand(0, 2);
    switch ($x) {
        case '0':
            return '+';
        case '1':
            return '-';
        case '2':
            return 'x';
    }
}

/**
 * Generate wrong answer.
 */
function genWrongAns() {
    while (true) {
        $newNum1 = (rand(1,2) % 2 == 0) ? $GLOBALS['firstNum'] - 10 * rand(1, 3) : $GLOBALS['firstNum'] + 10 * rand(1,3);
        $newNum2 = (rand(1,2) % 2 == 0) ? $GLOBALS['secondNum'] - 10 * rand(1, 3) : $GLOBALS['secondNum'] + 10 * rand(1,3);
        $result = getResult($newNum1, $newNum2, $GLOBALS['operator']);

        if (!isExisted($result)) {
            return $result;
        }
    }
}

/**
 * Check exist result when generating WRONG answer.
 */
function isExisted($result) {
    foreach ($GLOBALS['ans'] as $key) {
        if ($key == $result) {
            return true;
        }
    }
    return false;
}

/**
 * Generate answer list.
 */
function genAnsList() {
    global $ans;

    $ans[$GLOBALS['correctAnsIndex']] = getResult($GLOBALS['firstNum'], $GLOBALS['secondNum'], $GLOBALS['operator']);
    for ($i=0; $i < 4; $i++) { 
        if ($i == $GLOBALS['correctAnsIndex']) {
            continue;
        }

        $ans[$i] = genWrongAns();
    }
}

/**
 * Get correct answer.
 */
function getResult($firstNum, $secondNum, $operator) {
    switch ($operator) {
        case '+':
            return $firstNum + $secondNum;
        case '-':
            return $firstNum - $secondNum;
        case 'x':
            return $firstNum * $secondNum;
    }
}

/**
 * Generate new element.
 */
function genElement() {
    $GLOBALS['firstNum'] = genNum();
    $GLOBALS['secondNum'] = genNum();
    $GLOBALS['operator'] = genOperator();

    global $correctAnsIndex;
    $correctAnsIndex = rand(0,3);
    $_SESSION['correctAnsIndex'] = $correctAnsIndex + 1;
    genAnsList();
}

/**
 * Update the score and save to the session. If user start new game, set score = 0.
 */
function updateScore() {
    if (empty($_POST['control'])) {
        $_SESSION['score'] += 1;
    } else {
        $_SESSION['score'] = 0;
    }
}

/**
 * Create new question.
 */
function createQues() {
    genElement();
    updateScore();
}

//When user start game or reset game.
if (!empty($_POST['control'])) {
    $_SESSION['min'] = 1;
    $_SESSION['sec'] = 30;
} else {
    $_SESSION['min'] = $_POST['min'];
    $_SESSION['sec'] = $_POST['sec'];
}


if (!empty($_POST['control']) || 
(!empty($_POST['answer']) && $_POST['answer'] == $_SESSION['correctAnsIndex'] )) {
    createQues();
} else {
    if ($_SESSION['min'] == 0 && $_SESSION['sec'] == 0) {
        $_SESSION['result'] = "Time out, game over!<br>Your score:  ".$_SESSION['score'];
    } else {
        $_SESSION['result'] = "Game over!<br>Your score:  ".$_SESSION['score'];
    }
    header("Location: http://localhost//quiz");
}

?>