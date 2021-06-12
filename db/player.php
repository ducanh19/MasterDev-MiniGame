<?php
require_once('connectDB.php');

function getList() {
    $sql = "SELECT * FROM `player`";
    $result = $GLOBALS['conn']->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>