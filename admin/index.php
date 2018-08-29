<?php
  error_reporting(0);
  include '../env/db.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>E-Tender Management System | Admin</title>
    <!-- styles -->
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.materialdesignicons.com/2.1.19/css/materialdesignicons.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
  </head>
  <body>
    <div class="container-fluid padding-0 group">
      <div class="top-nav">
        <div class="col-5 float-left">
          <h3 class="padding-0 margin-0 admin-heading">E-Tender Management System</h3>
        </div>
        <div class="col-7 float-right">
          <h3 class="padding-0 margin-0 admin-heading">WELCOME TO ADMIN PANEL </h3>
        </div>
      </div>
      <div class="side-bar">
        <ul class="nav my-nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="?page=dashboard">DashBoard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=addcompany">Companies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=tenders">Tenders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Active Tenders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Bids</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/add-admin">Add Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">SignOut</a>
          </li>
        </ul>
      </div>

      <!-- main body -->
      <div class="body-main">
        <div class="box">
          <?php
            // include error file
            include '../include/errors.php';

            $page = $_GET['page'];

            if ($page === 'dashboard') {
              include 'dashboard.php';
            }
            if ($page === 'addcompany') {
              include 'addcompany.php';
            }
            if ($page === 'tenders') {
              include 'tenders.php';
            }else {
              include 'dashboard.php';
            }
          ?>
        </div>
      </div>

    </div>
  </body>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- jquery validation -->
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  <script type="text/javascript">
    $("form").validate();
  </script>

  <!-- scripts -->
  <script type="text/javascript" src="js/main.js"></script>
</html>
