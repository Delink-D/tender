<?php
// insert company
include '../../env/db.php';
include '../../env/server.php';

$regNo = $_POST['regNo'];
$kra = $_POST['kra'];
$cname = $_POST['cname'];
$cemail = $_POST['cemail'];
$cphone = $_POST['cphone'];
$ccategory = $_POST['ccategory'];

if ($_POST['saveCompany']) {
  // confirm if company exist
  $checkC = "SELECT * FROM companies WHERE company_reg = '$regNo' OR company_pin = '$kra' OR company_name = '$cname'";
  $checkQ = mysqli_query($db, $checkC) or die(header('location: ' . $server . 'admin/?page=addcompany&msg=error-fetching'));

  if (mysqli_num_rows($checkQ) > 0) {
    // return error if company exist
    header('location: ' . $server . 'admin/?page=addcompany&msg=exist');
  }
  // insert company
  $sql = "INSERT INTO companies (company_reg, company_pin, company_name, comany_phone, company_email, company_cat)
          VALUES('$regNo','$kra','$cname','$cphone','$cemail','$ccategory')";
  $query = mysqli_query($db, $sql) or die(header('location: ' . $server . 'admin/?page=addcompany&msg=error-saving'));

  if ($query) {
    // success of saving
    header('location: ' . $server . 'admin/?page=addcompany&msg=saved');
  }

} else {
  // return with an error
  header('location: ' . $server . 'admin/?page=addcompany&msg=required');
}
