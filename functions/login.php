<?php
// login function
include '../env/server.php';
include '../env/db.php';

// gather user inputs
$userId = $_POST['userName'];
$pass = $_POST['password'];

if ($_POST['login']) {
  // get user details

} else {
  header("location: " . $server ."?msg=required");
}
