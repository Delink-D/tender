<?php
  include 'includes/head.php';
?>

<a href="../" id="back-home">Back to front site</a>

<form action="functions/login.php" method="post" class="form-login">
  <h4 class="text-center">E-Tender Admin Login</h4>
  <div class="form-group">
    <label for="username">User Name</label>
    <input type="text" name="username" class="form-control" placeholder="User Name" id="username">
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password" id="password">
  </div>

  <div class="form-group">
    <input type="submit" name="adminlogin" class="btn btn-primary" value="SignIn">
  </div>

  <?php
    $msg = $_GET['msg'];

    if ($msg === 'user') {
      echo "<p class='text-danger'>Username or Passsword Is incorrect pls try again!</p>";
    }
  ?>
</form>

<?php
  include 'includes/footer.php';
?>
