<?php

  include '../database/db.php';

  // function to get all data from table x
  function GetFrom($db, $value='')
  {
    // print_r($db);
    $query = "SELECT * FROM `$value`";
    $result = mysqli_query($db, $query );

    foreach ($row = mysqli_fetch_assoc($result)) {
      $_id = $row['id'];
    }

    return $_id;
  }

  GetFrom($db, 'users');
?>
