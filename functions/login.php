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
    header("location: ../index.php?msg=user");
  }

  $uRow = mysqli_fetch_assoc($query);
  $user = $uRow;
  $comId = $uRow['company'];

  // get the company details
  $cSql = "SELECT * FROM companies WHERE _id = '$comId'";
  $cQuery = mysqli_query($db, $cSql);

  if (mysqli_num_rows($cQuery) < 1) {
    // no comapny fetched
    header("location: ../index.php?msg=company");
  }

  if ($user['password'] === $pass) {
    // success login plus set sessions
    session_start();
    $_SESSION['_login'] = true;
    $_SESSION['_user'] = $user;
    $_SESSION['_company'] = mysqli_fetch_assoc($cQuery);

    header("location: ../index.php?msg=suclogin");

  } else {
    // password error
    header("location: ../index.php?msg=user");
  }

} else {
  header("location: ../index.php?msg=required");
}
