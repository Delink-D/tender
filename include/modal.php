<!-- Login Modal Supplier -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Supplier signIn Form</h5>
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

            or <a data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#signupModal" id="signup">Sign Up</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Login Modal Officer -->
<div class="modal fade" id="loginModalOfficer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Procurement Officer SignIn </h5>
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
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">SignUp to E-Tender System</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="functions/signup.php" method="post" id="signUpForm">
          <div class="row">
            <div class="form-group col">
              <label for="up-cname">Company Name</label>
              <input type="text" name="cName" class="form-control" placeholder="Company Name" id="up-cname">
            </div>

            <div class="form-group col">
              <label for="email">E-Mail</label>
              <input type="text" name="email" class="form-control" placeholder="E-Mail" id="email">
            </div>
          </div>

          <div class="row">
            <div class="form-group col">
              <label for="phone">Phone</label>
              <input type="number" name="phone" class="form-control" placeholder="Company Phone" id="phone">
            </div>

            <div class="form-group col">
              <label>Company Category</label>
              <select name="cat" class="form-control">
                <option value="">Select Company Category</option>
                <option value="y">Youth</option>
                <option value="yw">Youth and Women</option>
                <option value="m">Minorities</option>
                <option value="g">General</option>
              </select>
            </div>
          </div>


          <div class="row">
            <div class="form-group col">
              <label for="kra">KRA Pin</label>
              <input type="text" name="kra" class="form-control" placeholder="KRA Pin" id="kra">
            </div>

            <div class="form-group col">
              <label for="reg">Company Reg Cert</label>
              <input type="text" name="reg" class="form-control" placeholder="Company Registration Certificate" id="reg">
            </div>
          </div>

          <div class="row">
            <div class="form-group col">
              <label for="up-supid">Supplier Id</label>
              <input type="text" name="sup_id" class="form-control" placeholder="Supplier Id" id="up-supid">
            </div>

            <div class="form-group col">
              <label for="level">Level</label>
              <select name="level" class="form-control" id="level">
                <option value="supplier">Supplier</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col">
              <label for="up-password">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Password" id="up-password">
            </div>

            <div class="form-group col">
              <label for="up-re-password">Re-Enter Password</label>
              <input type="password" name="passwordReEnter" class="form-control" placeholder="Re-Enter Password" id="up-re-password">
            </div>
          </div>

          <div class="form-group">
            <input type="submit" name="supplier-up" class="btn btn-primary w-50" value="SignUp">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
