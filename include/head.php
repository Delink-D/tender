<?php
  error_reporting(0);
  session_start();

  include 'env/db.php';

  if ($_SESSION['_login']) {
    $username = $_SESSION['_user']['username'];
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <!-- <meta http-equiv="refresh" content="10">  -->
    <title>E-Tender</title>

    <!-- fonts / bootstrap styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Teko" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- jquery validation -->
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">

    <!-- custom style -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
  </head>
  <body>
    <div class="container-fluid padding0">
      <!-- header -->
      <div id="header">
        <div class="container">

          <nav class="navbar ">
            <a class="navbar-brand" id="brand">E-TENDER MANAGEMENT SYSTEM</a>

            <?php if (!$_SESSION['_login']) { ?>
            <ul class="nav justify-content-end">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">Home</a>
              </li>
              <?php if (!$_SESSION['_loginA']) { ?> <!-- display the login if not an admin session -->
              <li class="nav-item">
                <a class="nav-link" id="top-nav-link" data-toggle="modal" data-target="#loginModalOfficer">Procurement Officer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="top-nav-link" data-toggle="modal" data-target="#loginModal">Supplier</a>
              </li>
              <?php } ?>
              <li class="nav-item">
                <a class="nav-link" href="admin">Admin</a>
              </li>
            </ul>
            <?php } if ($_SESSION['_login']) { ?>
              <ul class="nav ">
                <li class="nav-item">
                  <a class="nav-link active" href="index.php">Home</a>
                </li>
              </ul>
            <div class="dropdown">
              <a class="btn dropdown-toggle" style="font-size: 22px;" href="#" role="button" id="profile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $username; ?> <i class="material-icons" style="font-size: 22px;">account_circle</i>
              </a>
              <div class="dropdown-menu" aria-labelledby="profile">
                <a class="dropdown-item" href="#">Profile</a>

                <?php if ($_SESSION['_user']['category'] == 'supplier') { ?>

                  <a class="dropdown-item" href="activebids.php">Active Bids</a>
                  <a class="dropdown-item" href="pastbids.php">Past Tenders</a>
                  <a class="dropdown-item" href="company.php">Company Details</a>

                <?php } if ($_SESSION['_user']['category'] === 'officer') { ?>

                  <a class="dropdown-item" href="tenderadd.php">Add Tender</a>
                  <a class="dropdown-item" href="tenderverify.php">Verify Applications</a>
                  <a class="dropdown-item" href="activebids.php">Companies</a>
                  <a class="dropdown-item" href="activebids.php">Verify Bids</a>

                <?php } ?>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="functions/logout.php">Sign Out</a>
              </div>
            </div>
            <?php } ?>
          </nav>

          <!-- include the error file -->
          <?php include 'include/errors.php'; ?>

          <!-- include modal file -->
          <?php include 'include/modal.php'; ?>
        </div>
      </div>
