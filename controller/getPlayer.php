<?php
include 'db/player.php';
$list = getList();

$GLOBALS['conn']->close();

foreach ($list as $key) {
    echo "<tr><td>" . $key['Name'] . "</td>";
    echo "<td>" . $key['Score'] . "</td>";
    echo "<td>" . $key['TimesPlaying'] . "</td>";
    echo "<td>" . $key['LastDate'] . "</td></tr>";
}