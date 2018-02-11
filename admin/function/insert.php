<?php
include 'includes/database.php';

if ($_POST['saveCompany']) {
  $regNo = $_POST['regNo'];
  $kra = $_POST['kra'];
  $cname = $_POST['cname'];
  $cemail = $_POST['cemail'];
  $cphone = $_POST['cphone'];
  $ccategory = $_POST['ccategory'];

  // call function
  saveCompany($db)
}

function saveCompany($)
{
  
}