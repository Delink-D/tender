<?php
// signup file
include '../env/db.php';
include '../env/server.php';

// gather all the user inputs
$userName = $_POST['userName'];
$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$natId = $_POST['natId'];
$level = $_POST['level'];
$password = $_POST['password'];

if ($_POST['signup']) {
  // if all is good

  // check if user exist
  $check = "SELECT * FROM users WHERE username = '$userName'";
  $checkQ = mysqli_query($db, $check) or die(header('location: ../index.php?msg=error-fetching'));

  if (mysqli_num_rows($checkQ) > 0) {
    header('location: ../index.php?msg=exist');
    exit();
  } else {
    // insert user
    $sql = "INSERT INTO users (firstname, lastname, username, category, email, nationalId, password)
          VALUES('$firstName','$lastName','$userName', '$level', '$email','$natId','$password')";
    $query = mysqli_query($db, $sql) or die(header('location: ../index.php?msg=error-saving'));

    if ($query) {
      // get saved user
      $id = mysqli_insert_id($db);
      $getUser = "SELECT * FROM users WHERE _id = '$id'";
      $qUser = mysqli_query($db, $getUser) or die(header('location: ../index.php?msg=error-fetching'));

      if (mysqli_num_rows($qUser) === 1) {
        $row = mysqli_fetch_assoc($qUser);
        $user = $row;

        /**
          * success saving
          * set session as a login user
        */

        session_start();
        $_SESSION['_login'] = true;
        $_SESSION['_user'] = $user;

        // redirect with success
        header('location: ../index.php?msg=suclogin');

      } else {
        // return to home page
        header('location: ../index.php?msg=error-login');
      }
    }
  }

} else {
  // return to home page
  header('location: ../index.php?msg=required');
}
