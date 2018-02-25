<?php
// gather the user's input
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
	

} else {
	header('location: ' . $server . 'tenderadd.php');
}