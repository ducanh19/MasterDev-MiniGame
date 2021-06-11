<?php
require_once('connectDB.php');

$sql = "SELECT * FROM player WHERE `Name` = '" . $_SESSION['name'] . "'";
$result = $GLOBALS['conn']->query($sql);

// This person has existed in DB.
if ($result->num_rows > 0) {
    $result = $result->fetch_assoc();
    $times = $result['TimesPlaying'] + 1;

    $stmt = $GLOBALS['conn']->prepare("UPDATE `player` SET`Score`=?,`TimesPlaying`=?,`LastDate`=CURRENT_DATE() WHERE `Name`=?");
    $stmt->bind_param("iis", $_SESSION['score'], $times, $_SESSION['name']);
}
// This person has NOT existed in DB.
else {
    $stmt = $GLOBALS['conn']->prepare("INSERT INTO `player`(`Name`, `Score`, `TimesPlaying`, `LastDate`) VALUES (?, ?, 1, CURRENT_DATE())");
    $stmt->bind_param("si", $_SESSION['name'], $_SESSION['score']);
}

//Update data.
$stmt->execute();

// Close all connection.
$stmt->close();
$GLOBALS['conn']->close();