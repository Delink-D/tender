<?php
// login function
include '../env/server.php';
include '../env/db.php';

// gather user inputs
$userId = $_POST['userName'];
$pass = $_POST['password'];

if ($_POST['loginO']) {
  // get user details
  $sql = "SELECT * FROM users WHERE username = '$userId'";
  $query = mysqli_query($db, $sql);

  if (mysqli_num_rows($query) !== 1) {
    // userId error
    header("location: ../index.php?msg=user");
  }

  $uRow = mysqli_fetch_assoc($query);
  $user = $uRow;

  if ($user['password'] === $pass) {
    // success login plus set sessions
    session_start();
    $_SESSION['_login'] = true;
    $_SESSION['_user'] = $user;

    header("location: ../index.php?msg=suclogin");

  } else {
    // password error
    header("location: ../index.php?msg=user");
  }

} else if ($_POST['loginS']) {
  // get user details
  $sql = "SELECT * FROM suppliers WHERE supplier_id = '$userId'";
  $query = mysqli_query($db, $sql);

  if (mysqli_num_rows($query) !== 1) {
    // userId error
    header("location: ../index.php?msg=user");
  }

  $uRow = mysqli_fetch_assoc($query);
  $user = $uRow;

  if ($user['password'] === $pass) {
    // success login plus set sessions
    session_start();
    $_SESSION['_login'] = true;
    $_SESSION['_user'] = $user;
    $_SESSION['_company'] = $user;

    header("location: ../index.php?msg=suclogin");

  } else {
    // password error
    header("location: ../index.php?msg=user");
  }
} else {
  header("location: ../index.php?msg=required");
}
