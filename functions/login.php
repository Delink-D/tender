<?php
// login function
include '../env/server.php';
include '../env/db.php';

// gather user inputs
$userId = $_POST['userName'];
$pass = $_POST['password'];

if ($_POST['login']) {
  // get user details
  $sql = "SELECT * FROM users WHERE username = '$userId'";
  $query = mysqli_query($db, $sql);

  if (mysqli_num_rows($query) !== 1) {
    // userId error
    header("location: " . $server ."?msg=user");
  }

  $uRow = mysqli_fetch_assoc($query);
  $user = $uRow;
} else {
  header("location: " . $server ."?msg=required");
}
