<?php
  include 'include/head.php';
?>

<!-- body -->
<div class="container body padding0">
  <form action="functions/insert.company.php" method="post" id="vld" class="margin-20">
    <h3 class="text-center">Add Your Company Details</h3>
    <div class="row">
      <div class="form-group col">
        <label>Company Reg No</label>
        <input type="text" name="regNo" class="form-control" placeholder="Company Reg Number">
      </div>

      <div class="form-group col">
        <label>KRA Pin</label>
        <input type="text" name="kra" class="form-control" placeholder="Company KRA Pin">
      </div>
    </div>

    <div class="row">
      <div class="form-group col">
        <label>Company Name</label>
        <input type="text" name="cname" class="form-control" placeholder="Company Name">
      </div>

      <div class="form-group col">
        <label>Company E-Mail</label>
        <input type="text" name="cemail" class="form-control" placeholder="Company E-Mail">
      </div>
    </div>

    <div class="row">
      <div class="form-group col">
        <label>Company Phone</label>
        <input type="text" name="cphone" class="form-control" placeholder="Company Phone Number">
      </div>

      <div class="form-group col">
         <label>Company Category</label>
        <select name="ccategory" class="form-control">
          <option value="">------ Select Company Category ------</option>
          <option value="y">Youth</option>
          <option value="yw">Youth and Women</option>
          <option value="m">Minorities</option>
          <option value="g">General</option>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <input type="submit" name="saveCompany" value="Save Company" class="btn btn-success">
      </div>
    </div>
  </form>

<?php
  include 'include/footer.php';
?>
