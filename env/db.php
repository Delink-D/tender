<!-- connecting to the database -->
<?php

  // set values
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'tenders';

  $db = mysqli_connect($host, $user, $password, $database);

  // check if connected
  if (!$db) {
    echo "<h2>DATABASE CONNECTION ERROR</h2>";
  }
