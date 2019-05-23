<?php


require_once './includes/config.php';
require_once './includes/database.php';






$db = new db(DB_HOST,
DB_USER, DB_PASS, DB_NAME);





$sql = "SELECT firstname, lastname FROM author";
$result = $db->query($sql);
// query() returns a result object if successful $result = $db->query($sql);
if($result === false) {
  echo $db->error;
} else {
// result object has methods, e.g. fetch_assoc // and properties, e.g. num_rows
while($row = $result->fetch_assoc()) {
echo $row['firstname'].' is '.$row['lastname'].' yrs old'; }
  // result object method to free result set
$result->free(); }


?>