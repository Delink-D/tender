<form action="functions/login.php" method="post" id="signInForm">
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
      echo '<p>Username or Passsword Is incorrect pls try again!</p>';
    }
  ?>
</form>
