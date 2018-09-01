<?php
  session_start();
  include '../env/db.php';

  $user = $_SESSION['_user'];
  if ($user['category'] !== 'admin') {
    // redirect to login page
    header('location: login.php');
  }

  include 'includes/head.php';
?>

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
        <a class="nav-link" href="?page=officer">Add Procurement Officer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="functions/logout.php">SignOut</a>
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
        }
        if ($page === 'officer') {
          include 'procurement.php';
        }else {
          include 'dashboard.php';
        }
      ?>
    </div>
  </div>

</div>

<?php
  include 'includes/footer.php';
?>
