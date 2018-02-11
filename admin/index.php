<?php
  error_reporting(0);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>E-Tender | Admin</title>
    <!-- styles -->
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.materialdesignicons.com/2.1.19/css/materialdesignicons.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <!-- scripts -->
    <script type="text/javascript" src="js/main.js"></script>
  </head>
  <body>
    <div class="container-fluid padding-0 group">
      <div class="top-nav">
        <div class="col-5 float-left">
          <h3 class="padding-0 margin-0 admin-heading">E-Tender </h3>
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
            <a class="nav-link" href="?page=addcompany">Add Company</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Add List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Add Place</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">View Places</a>
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
            $page = $_GET['page'];

            if ($page === 'dashboard') {
              include 'dashboard.php';
            }
            if ($page === 'addcompany') {
              include 'addcompany.php';
            }else {
              include 'dashboard.php';
            }
          ?>
        </div>
      </div>
      
    </div>
  </body>
</html>