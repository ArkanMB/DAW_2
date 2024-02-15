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

    define("DOLARES",1.05);
    $conversion = $_GET['euros'] * DOLARES;

    echo "<h3>" . $_GET['euros'] . " euros son " . $conversion . " dolares</h3>"

  ?>
</body>
</html>