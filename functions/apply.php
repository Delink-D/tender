<?php
// get data from form
session_start();

$compliance = $_FILES ['compliance']['tmp_name'];
$kracert = $_FILES ['krapin']['tmp_name'];
$compcert = $_FILES ['compcert']['tmp_name'];
$company = $_SESSION['user']['_id'];
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
    echo mysqli_error($db);
    // header('location: ../apply.php?id='.$tender.'&&msg=error-saving');
  }

} else {
  header('location: ../apply.php?id='.$tender);
}
