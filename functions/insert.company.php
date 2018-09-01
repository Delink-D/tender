<?php
// insert company
session_start();
include '../env/db.php';

$regNo = $_POST['regNo'];
$kra = $_POST['kra'];
$cname = $_POST['cname'];
$cemail = $_POST['cemail'];
$cphone = $_POST['cphone'];
$ccategory = $_POST['ccategory'];

if ($_POST['saveCompany']) {
  // confirm if company exist
  $checkC = "SELECT * FROM companies WHERE company_reg = '$regNo' OR company_pin = '$kra' OR company_name = '$cname'";
  $checkQ = mysqli_query($db, $checkC) or die(header('location: ../company.php?page=addcompany&msg=error-fetching'));

  if (mysqli_num_rows($checkQ) > 0) {
    // return error if company exist
    header('location: ../company.php?page=addcompany&msg=exist');
  }
  // insert company
  $sql = "INSERT INTO companies (company_reg, company_pin, company_name, comany_phone, company_email, company_cat)
          VALUES('$regNo','$kra','$cname','$cphone','$cemail','$ccategory')";
  $query = mysqli_query($db, $sql) or die(header('location: ../company.php?page=addcompany&msg=error-saving'));

  if ($query) {
    // success of saving

    // update user record to this company
    $id = mysqli_insert_id($db);
    $u_id = $_SESSION['_user']['_id'];
    $update = "UPDATE users SET company = '$id' WHERE _id = '$u_id'";
    mysqli_query($db, $update);

    header('location: ../company.php?page=addcompany&msg=saved');
  }

} else {
  // return with an error
  header('location: ../company.php?page=addcompany&msg=required');
}
