<?php
// gather the user's input
session_start();
include '../env/db.php';
include '../env/server.php';

// get user's input
$bid_comp = $_POST['bid_comp'];
$kra = $_POST['kra'];
$amount = $_POST['amount'];
$bid_user = $_SESSION['_user']['_id'];
$t_id= $_POST['tender'];

if ($_POST['bid']) {
	// check if tender exist
  $sql = "SELECT * FROM bids WHERE tender_id = '$t_id' AND bid_company = '$bid_comp'";
  $sql_t = "SELECT * FROM tenders WHERE _id = '$t_id'";
  $query = mysqli_query($db, $sql);
  $query_t = mysqli_query($db, $sql_t);

	if (mysqli_num_rows($query) !== 0) {
    header('location: ../bid.php?id=' . $t_id . '&&msg=exist');
    exit();
  }

	// save tender
	$sql = "INSERT INTO bids (tender_id, bid_company, bid_kra, bid_amount, bid_by)
			VALUES('$t_id','$bid_comp','$kra','$amount','$bid_user')";
	$query = mysqli_query($db, $sql);

	if ($query) {
    $row_t = mysqli_fetch_assoc($query_t);
    $bids = ++$row_t['tender_bids'];

    // update the tender by incrementing bids by 1
    $update = "UPDATE tenders SET tender_bids = '$bids' WHERE _id = '$t_id'";
    mysqli_query($db, $update);

		header('location: ../bid.php?id=' . $t_id . 'msg=saved');
	} else {
		header('location: ../bid.php?id=' . $t_id . 'msg=error-saving');
	}

} else {
	header('location: ../index.php');
}
