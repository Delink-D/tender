<?php 
  error_reporting(0);
  session_start();

  if ($_SESSION['userIn']) {
    $username = $_SESSION['username'];
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <!-- <meta http-equiv="refresh" content="10">  -->
    <title>E-Tender</title>

    <!-- fonts / bootstrap styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
          <div id="logo" class="col-7 float-left">
            <a href="index.php">
              <img src="https://e-tender.ie/_images/design/logo.png" alt="E-Tender">
            </a>
          </div>

          <div class="col-5 float-right">
            <div class="text-right">
              <?php if (!$_SESSION['userIn']) {?>
              <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#signinModal">
                SignUp
              </button>
              <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#loginModal">
                SignIn
              </button>

              <?php } if ($_SESSION['userIn']) {?>
              <div class="dropdown">
                <a class="btn dropdown-toggle" href="#" role="button" id="profile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Your User Name <i class="material-icons">account_circle</i>
                </a>

                <div class="dropdown-menu" aria-labelledby="profile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Active Bids</a>
                  <a class="dropdown-item" href="#">Add Tenders</a>
                  <a class="dropdown-item" href="#">Past Tenders</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Sign Out</a>
                </div>
              </div>
              <?php } ?>
            </div>

            <!-- include modal file -->
            <?php include 'include/modal.php'; ?>
          </div>
        </div>
      </div>
