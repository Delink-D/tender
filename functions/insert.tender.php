<?php
// gather the user's input
session_start();
include '../env/db.php';
include '../env/server.php';

$added_by = $_POST['addedBy'];
$t_number = 'TNT-' . $_POST['t_number'];
$t_category = $_POST['t_category'];
$t_type = $_POST['t_type'];
$t_security = $_POST['t_security'];
$t_closing = $_POST['t_closing'];
$t_desc = $_POST['t_desc'];

if ($_POST['insertTender']) {
	// check if tender exist
	$cSql = "SELECT * FROM tenders WHERE tender_number = '$t_number'";
	$cQuery = mysqli_query($db, $cSql);

	if (mysqli_num_rows($cQuery) > 1) {
		header('location: ../tenderadd.php?msg=exist');
	}

	$t_awarded = '';
	$t_bids = 0;
	$bid_amount = 0;

	// save tender
	$sql = "INSERT INTO tenders (tender_number, tender_cat, tender_type, tender_security, tender_closing, tender_desc, tender_bids, tender_awarded, bid_amount, added_by)
			VALUES('$t_number','$t_category','$t_type','$t_security','$t_closing','$t_desc','$t_bids','$t_awarded','$bid_amount','$added_by')";
	$query = mysqli_query($db, $sql);

	if ($query) {
		header('location: ../tenderadd.php?msg=saved');
	} else {
		header('location: ../tenderadd.php?msg=error-saving');
	}

} else {
	header('location: ../tenderadd.php');
}
