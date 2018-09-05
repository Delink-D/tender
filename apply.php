<?php
  session_start();

  // check if user is logged in before accessing this page
  if ($_SESSION['_login'] && ($_SESSION['_user']['level'] === 'supplier')) {
    include 'include/head.php';

    // get the tender id
    $_id = $_GET['id'];

    // get the tender by id
    $select = "SELECT * FROM tenders WHERE _id = '$_id'";
    $query =  mysqli_query($db, $select);

    if (mysqli_num_rows($query) !== 1) {
      header('location: index.php');
    }

    // tender record
    $row = mysqli_fetch_assoc($query);

    // tender category
    switch ($row['tender_cat']) {
      case 'y':
        $category = "Youth";
        break;

      case 'yw':
        $category = "Youth & Women";
        break;

      case 'm':
        $category = "Minorities";
        break;

      case 'oa':
        $category = "Open to All";
        break;

      case 'w':
        $category = "Women";
        break;

      default:
        $category = "N/A";
        break;
    }

    $company = $_SESSION['_user']['company_name'];
?>

<!-- tender intro -->
<div class="container tender-body padding0">
  <div id="tender-header" style="position: relative;">
    <h3>Tender No. <strong><?php echo $row['tender_number']; ?></strong></h3>
    <button class="btn btn-sm btn-success" style="position: absolute; top: 10px; right: 10px;" data-toggle="modal" data-target="#applyModal">Apply Now</button>
  </div>
  <div class="padding-10 group" style="position: relative;">
    <div class="col-5 float-left">
      <p class="c-text-bold tender-text-detail">Tender Category: <?php echo $category; ?></p>
      <p class="c-text-bold tender-text-detail">Tender Notice Type: <?php echo $row['tender_type']; ?></p>
    </div>
    <div class="col-5 float-right">
      <p class="c-text-bold tender-text-detail">Tender Closing Day: <span class="text-danger"><?php echo $row['tender_closing']; ?></span></p>
      <p class="c-text-bold tender-text-detail">Tender Security: <?php echo $row['tender_security']; ?></p>
    </div>
  </div>
</div>

<!-- // apply for tenders modal form -->
<div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apply tender E-Tender System</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="functions/apply.php" method="post" id="signInForm" enctype="multipart/form-data">
          <div class="row">
            <div class="form-group col">
              <label for="compname">Company name</label>
              <input type="text" readonly name="compname" class="form-control" value="<?php echo $company; ?>" placeholder="Company Name" id="compname">
              <input type="text" hidden readonly name="tender" value="<?php echo $_id; ?>">
            </div>
          </div>

          <div class="row">
            <div class="form-group col">
              <label for="compliance">Compliance Cert</label>
              <input type="file" class="form-control-file" name="compliance" id="compliance" accept="application/pdf">
            </div>

            <div class="form-group col">
              <label for="krapin">KRA Cert Pin</label>
              <input type="file" class="form-control-file" name="krapin" id="krapin" accept="application/pdf">
            </div>
          </div>

          <div class="row">
            <div class="form-group col">
              <label for="compcert">Company Cert</label>
              <input type="file" class="form-control-file" name="compcert" id="compcert" accept="application/pdf">
            </div>
          </div>

          <div class="form-group">
            <input type="submit" name="apply" class="btn btn-primary w-50" value="Apply Tender">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- body -->
<div class="container body padding-10">
  <h3 class="text-center c-text-bold tender-text-detail">Tender detailed details</h3>
  <p class="text-center">
    <?php echo $row['tender_desc']; ?>
  </p>

<?php
  include 'include/footer.php';
  }else {
    // redirect to home page
    header("location: index.php?msg=sup-login");
    exit();
  }
?>
