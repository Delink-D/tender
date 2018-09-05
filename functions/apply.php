<?php
// get data from form

// $company = $_SESSION['_company']['_id'];
$compliance = $_FILES ['compliance']['tmp_name'];
$kracert = $_FILES ['krapin']['tmp_name'];
$compcert = $_FILES ['compcert']['tmp_name'];
$company = 1;
$tender = $_POST['tender'];

if ($_POST['apply']) {
  // when everything is cool...
  include '../env/db.php';

  $query = "INSERT INTO tenders_applications(company, compliance_cert, kra_cert, company_cert, tender) VALUES('$company', '$compliance', '$kracert', '$compcert', '$tender')";
  $push = mysqli_query($db, $query);

  if ($push) {
    // success saved
    header('location: ../apply.php?id='.$tender.'&&msg=saved');
  } else {
    // error saving
    header('location: ../apply.php?id='.$tender.'&&msg=error-saving');
  }

} else {
  header('location: ../apply.php?id='.$tender);
}
