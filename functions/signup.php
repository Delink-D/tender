<?php
// signup file
include '../env/db.php';
include '../env/server.php';

// gather all the user inputs
$company = $_POST['cName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$cat = $_POST['cat'];
$kra = $_POST['kra'];
$reg = $_POST['reg'];
$supid = $_POST['sup_id'];
$level = $_POST['level'];
$password = $_POST['password'];

if ($_POST['supplier-up']) {
  // if all is good

  // check if user exist
  $check = "SELECT * FROM suppliers WHERE company_name = '$company'";
  $checkQ = mysqli_query($db, $check) or die(header('location: ../index.php?msg=error-fetching'));

  if (mysqli_num_rows($checkQ) > 0) {
    header('location: ../index.php?msg=exist');
    exit();
  } else {
    // insert user
    $sql = "INSERT INTO suppliers (company_reg, company_pin, company_name, company_phone, company_email, company_cat, supplier_id, level, password)
          VALUES('$reg','$kra','$company','$phone','$email', '$cat', '$supid','$level','$password')";
    $query = mysqli_query($db, $sql) or die(header('location: ../index.php?msg=error-saving'));

    if ($query) {
      // get saved user
      $id = mysqli_insert_id($db);
      $getUser = "SELECT * FROM suppliers WHERE _id = '$id'";
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
