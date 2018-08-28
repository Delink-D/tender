<?php
  include 'include/head.php';
?>

<!-- body -->
<div class="container body padding0">
  <form action="functions/insert.tender.php" method="post" class="margin-20" id="validate">
    <h3 class="text-center">Add Tender</h3>
    <div class="row">
      <div class="form-group col">
        <label for="t-company">Company Name</label>
        <input type="text" name="t_company" class="form-control" value="<?php echo $_SESSION['_company']['company_name']; ?>" id="t-company" readonly>
      </div>

      <div class="form-group col">
        <label for="t-number">Tender Number</label>
        <input type="text" name="t_number" class="form-control" placeholder="Tender Number" id="t-number">
      </div>
    </div>

    <div class="row">
      <div class="form-group col">
        <label for="t-cat">Tender Category</label>
        <select name="t_category" class="form-control" id="t-cat">
          <option value="y">Youth</option>
          <option value="yw">Youth & Women</option>
          <option value="w">Women</option>
          <option value="m">Minorities</option>
          <option value="oa">Open to All</option>
        </select>
      </div>

      <div class="form-group col">
        <label for="t-type">Tender Type</label>
        <input type="text" name="t_type" class="form-control" placeholder="Tender Type" id="t-type">
      </div>
    </div>

    <div class="row">
      <div class="form-group col">
        <label for="t-security">Tender Security</label>
        <input type="text" name="t_security" class="form-control" placeholder="Tender Security" id="t-security">
      </div>

      <div class="form-group col">
        <label for="t-closing">Tender Closing</label>
        <input type="date" name="t_closing" class="form-control" placeholder="Tender Closing Date" id="t-closing">
      </div>
    </div>

    <div class="row">
      <div class="form-group col">
        <label for="t-desc">Tender Descrition</label>
        <textarea cols="5" name="t_desc" class="form-control" placeholder="Tender Descrition" id="t-desc"></textarea>
      </div>
    </div>

    <div class="row">
      <div class="form-group col">
        <input type="submit" name="insertTender" class="btn btn-primary" value="Add Tender">
      </div>
    </div>
  </form>

<?php
  include 'include/footer.php';
?>