<?php
// signup file
include '../env/db.php';
include '../env/server.php';

// gather all the user inputs
$userName = $_POST['userName'];
$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$natId = $_POST['natId'];
$company = $_POST['company'];
$password = $_POST['password'];

if ($_POST['signup']) {
  // if all is good

} else {
  // return to home page
  header('location: ' . $server . '?msg=required');
}
