<?php

$link = mysqli_connect(
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name']
);

$sql = "DELETE from author
WHERE id > 4";
$result = mysqli_query($link, $sql);
if ($result === false) {
    $content .= mysqli_error($link);
} else {
    $content .= "<p> Records deleted </p>";
}

?>