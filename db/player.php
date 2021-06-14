<?php
require_once($_SERVER["DOCUMENT_ROOT"] . '/quiz/db/connectDB.php');

function getList() {
    $sql = "SELECT * FROM `player` ORDER BY `Score` DESC";
    $result = $GLOBALS['conn']->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>