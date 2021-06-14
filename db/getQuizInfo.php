<?php
require_once($_SERVER["DOCUMENT_ROOT"] . '/quiz/db/connectDB.php');

/**
 * Get highest score.
 */
function getHighestScore() {
    $sql = "SELECT `Score` FROM `player` WHERE Score = (SELECT MAX(`Score`) FROM player)";
    $result = $GLOBALS['conn']->query($sql);
    return ($result->fetch_assoc())['Score'];
}

/**
 * Get limited time of quiz.
 * Return time by second.
 */
function getTime() {
    $sql = "SELECT * FROM `info`";
    $result = $GLOBALS['conn']->query($sql);
    return ($result->fetch_assoc())['value'];
}
?>