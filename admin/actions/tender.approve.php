<?php
// tender approve file
include '../../env/db.php';
include '../../env/server.php';

// get id
if ($_GET['id']) {
  $_id = $_GET['id'];

  $sql = "UPDATE tenders SET approved='1' WHERE _id='$_id'";
  $query = mysqli_query($db, $sql);

  if ($query) {
    header('location: ' . $server . '/admin/?page=tenders&msg=updated');
  } else {
    header('location: ' . $server . '/admin/?page=tenders&msg=not-updated');
  }
}
