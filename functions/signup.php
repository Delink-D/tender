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
$company = $_POST['company'];
$password = $_POST['password'];

if ($_POST['signup']) {
  // if all is good

  // check if user exist
  $check = "SELECT * FROM users WHERE username = '$userName'";
  $checkQ = mysqli_query($db, $check) or die(header('location: ' . $server . '?msg=error-fetching'));

  if (mysqli_num_rows($checkQ) > 0) {
    header('location: ' . $server . '?msg=exist');
    exit();
  } else {
    // insert user
    $sql = "INSERT INTO users (firstname, lastname, username, email, nationalId, company, password)
          VALUES('$firstName','$lastName','$userName','$email','$natId','$company','$password')";
    $query = mysqli_query($db, $sql) or die(header('location: ' . $server . '?msg=error-saving'));

    if ($query) {
      // get saved user
      $id = mysqli_insert_id($db);
      $getUser = "SELECT * FROM users WHERE _id = '$id'";
      $qUser = mysqli_query($db, $getUser) or die(header('location: ' . $server . '?msg=error-fetching'));

      // get company details
      $getCompany = "SELECT * FROM companies WHERE _id = '$company'";
      $qCompany = mysqli_query($db, $getCompany) or die(header('location: ' . $server . '?msg=error-fetching'));

      if (mysqli_num_rows($qUser) === 1 && mysqli_num_rows($qCompany) === 1) {
        $rowU = mysqli_fetch_assoc($qUser);
        $user = $rowU;

        $rowC = mysqli_fetch_assoc($qCompany);
        $userCompany = $rowC;

        /* 
          success saving 
          set session as a login user
        */

        session_start();
        $_SESSION['_login'] = true;
        $_SESSION['_user'] = $user;
        $_SESSION['_company'] = $userCompany;

        // redirect with success
        header('location: ' . $server . '?msg=suclogin');

      } else {
        // return to home page
        header('location: ' . $server . '?msg=error-login');
      }
    }
  }

} else {
  // return to home page
  header('location: ' . $server . '?msg=required');
}
