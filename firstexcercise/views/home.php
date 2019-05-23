<?php
$content .= '<h1>Welcome to the home page</h1>';
$result = formatMoney(68.1);
$content .= '<p>' . htmlentities($result) . '</p>';
?>
