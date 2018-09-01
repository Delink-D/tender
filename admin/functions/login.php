<?php
// get user inputs
$userId = $_POST['username'];
$pass = $_POST['password'];

if ($_POST['adminlogin']) {
  // include database
  include '../../env/db.php';

  // get user details
  $sql = "SELECT * FROM users WHERE username = '$userId' AND category = 'admin'";
  $query = mysqli_query($db, $sql);

  if (mysqli_num_rows($query) !== 1) {
    // userId error
    // header("location: ../login.php?msg=user");
  }

  $uRow = mysqli_fetch_assoc($query);
  $user = $uRow;

  if ($user['password'] === $pass) {
    // success login plus set sessions
    session_start();
    $_SESSION['_loginA'] = true;
    $_SESSION['_user'] = $user;

    header("location: ../index.php");

  } else {
    // password error
    header("location: ../login.php?msg=user");
  }

} else {
  // redirect to login page
  header('location: ../login.php');
}
