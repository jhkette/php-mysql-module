<?php


require_once './includes/config.php';
require_once './includes/database.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
   <?php 

   $books = new displayData;
   $books -> displayHtml();
   
   ?>
</body>
</html>