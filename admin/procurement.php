<div>
  <h3>Add Procurement <small>Officer</small></h3>

  <div>
    <form action="functions/procurement-add.php" method="post" id="signUpForm">
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
          <label for="level">User Level</label>
          <select name="level" class="form-control" id="level">
            <option value="officer">Procurement Officer</option>
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
        <input type="submit" name="addofficer" class="btn btn-primary w-50" value="SignUp">
      </div>
    </form>
  </div>
</div>
