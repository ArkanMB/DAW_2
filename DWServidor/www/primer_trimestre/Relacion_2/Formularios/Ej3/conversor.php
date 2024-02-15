<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Conversor</title>
</head>
<body>
  <?php

    echo "<h2>La conversion es:</h2>";

    define("EUROS",0.95);
    $conversion = $_GET['dolares'] * EUROS;

    echo "<h3>" . $_GET['dolares'] . " dolares son " . $conversion . " euros</h3>"

  ?>
</body>
</html>