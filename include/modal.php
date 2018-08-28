<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">SignIn to E-Tender</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="functions/login.php" method="post" id="signInForm">
          <div class="form-group">
            <label for="username">User Name</label>
            <input type="text" name="userName" class="form-control" placeholder="User Name" id="username">
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" id="password">
          </div>

          <div class="form-group">
            <input type="submit" name="login" class="btn btn-primary" value="SignIn">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- SignUp Modal -->
<div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">SignUp to E-Tender</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="functions/signup.php" method="post" id="signUpForm">
          <div class="row">
            <div class="form-group col">
              <label for="up-username">User Name</label>
              <input type="text" name="userName" class="form-control" placeholder="User Name" id="up-username">
            </div>

            <div class="form-group col">
              <label for="email">E-Mail</label>
              <input type="text" name="email" class="form-control" placeholder="E-Mail" id="email">
            </div>
          </div>

          <div class="row">
            <div class="form-group col">
              <label for="fname">First Name</label>
              <input type="text" name="firstName" class="form-control" placeholder="First Name" id="fname">
            </div>

            <div class="form-group col">
              <label for="lname">Last Name</label>
              <input type="text" name="lastName" class="form-control" placeholder="Last Name" id="lname">
            </div>
          </div>

          <div class="row">
            <div class="form-group col">
              <label for="natid">National Id</label>
              <input type="text" name="natId" class="form-control" placeholder="National Id" id="natid">
            </div>
          </div>

          <div class="row">
            <div class="form-group col">
              <label for="company">Company</label>
              <select name="company" class="form-control" id="company">
                <option value="">Select Company</option>
                <?php
                  $sql = "SELECT * FROM companies";
                  $query = mysqli_query($db, $sql);

                  if (mysqli_num_rows($query) < 1) {
                    echo "<option value=''>NO COMPANIES YET!!</option>";
                  }

                  while ($row = mysqli_fetch_assoc($query)) {
                    $company_id = $row['_id'];
                    $company_name = $row['company_name'];
                    echo "<option value='$company_id'>$company_name</option>";
                  }
                ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col">
              <label for="up-password">Password</label>
              <input type="text" name="password" class="form-control" placeholder="Password" id="up-password">
            </div>

            <div class="form-group col">
              <label for="up-re-password">Re-Enter Password</label>
              <input type="text" name="passwordReEnter" class="form-control" placeholder="Re-Enter Password" id="up-re-password">
            </div>
          </div>

          <div class="form-group">
            <input type="submit" name="signup" class="btn btn-primary w-50" value="SignUp">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- tender details -->
<div class="modal fade" id="tenderDescModal" tabindex="-1" role="dialog" aria-labelledby="descModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="descModalLabel">Tender <strong>DLNK/T/04-02-2018</strong> Description</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
      </div>
    </div>
  </div>
</div>