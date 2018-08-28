<?php
// gather the user's input
session_start();
include '../env/db.php';
include '../env/server.php';

$t_company = $_POST['t_company'];
$t_number = $_POST['t_number'];
$t_category = $_POST['t_category'];
$t_type = $_POST['t_type'];
$t_security = $_POST['t_security'];
$t_closing = $_POST['t_closing'];
$t_desc = $_POST['t_desc'];

$added_by = $_SESSION['_user']['username'];

if ($_POST['insertTender']) {
	// check if tender exist
	$cSql = "SELECT * FROM tenders WHERE tender_number = '$t_number'";
	$cQuery = mysqli_query($db, $cSql);

	if (mysqli_num_rows($cQuery) > 1) {
		header('location: ' . $server . 'tenderadd.php?msg=exist');
	}

	// save tender
	$sql = "INSERT INTO tenders (tender_number, company_name, tender_cat, tender_type, tender_security, tender_closing, tender_desc, added_by)
			VALUES('$t_number','$t_company','$t_category','$t_type','$t_security','$t_closing','$t_desc','$added_by')";
	$query = mysqli_query($db, $sql);

	if ($query) {
		header('location: ' . $server . 'tenderadd.php?msg=saved');
	} else {
		header('location: ' . $server . 'tenderadd.php?msg=error-saving');
	}

} else {
	header('location: ' . $server . 'tenderadd.php');
}