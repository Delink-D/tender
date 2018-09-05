<?php
  include 'include/head.php';
?>

<!-- body -->
<div class="container body padding0">
  <table class="table table-sm table-hover table-tenders">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tender No</th>
        <th scope="col">Target Group</th>
        <th scope="col">Closing</th>
        <th scope="col">Company</th>
        <th scope="col">Kra Pin</th>
        <th scope="col">Compliance Cert</th>
        <th scope="col">Company Cert</th>
        <th scope="col">Approve Tender</th>
      </tr>
    </thead>
    <tbody>
      <?php
        // get the approved tenders
        $sql = "SELECT * FROM tenders_applications";
        $query = mysqli_query($db, $sql);

        if (mysqli_num_rows($query) < 1) {
          echo "<tr>
                  <th colspan='6' class='text-center'>There are not tenders to display!!</th>
                </tr>";
        }

        $count = 0;
        while ($row = mysqli_fetch_assoc($query)) {
          $_id = $row['_id'];
          $t_id = $row['tender'];
          $c_id = $row['company'];
          $t_approved = $row['approved'];
          $t_krapin = $row['kra_cert'];
          $t_cpmpliance = $row['compliance_cert'];
          $t_compcert = $row['company_cert'];

          // get company
          $comp = mysqli_query($db, "SELECT * FROM companies WHERE _id='$c_id'");
          $company = mysqli_fetch_assoc($comp);

          $c_name = $company['company_name'];

          // get tender
          $tend = mysqli_query($db, "SELECT * FROM tenders WHERE _id='$t_id'");
          $tender = mysqli_fetch_assoc($tend);

          $t_num = $tender['tender_number'];
          $t_cat = $tender['tender_cat'];
          $t_closing = $tender['tender_closing'];
          $count++;

          // category
          switch ($t_cat) {
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

          // get applications to tenders
          $u_company = $_SESSION['_user']['company'];
          $sql_c = "SELECT * FROM tenders_applications WHERE tender = '$_id' AND company = '$u_company'";
          $query_c = mysqli_query($db, $sql_c);

          if ($t_approved == 1) {
            $btn = "<span class='text-success'>Approved</span>";
          } else if($t_approved > 1) {
            $btn = "<span class='text-danger'>Denied</span>";
          } else {
            $btn = "<a data-toggle='modal' data-target='#approveModal' class='badge badge-info'>Approve</a>";
          }

          echo "
            <tr class='t-row'>
              <th scope='row'>$count</th>
              <td>$t_num</td>
              <td>$category</td>
              <td>$t_closing</td>
              <td>$c_name</td>
              <td>$t_krapin</td>
              <td>$t_cpmpliance</td>
              <td>$t_compcert</td>
              <td>$btn</td>
            </tr>
          ";
        }
      ?>
    </tbody>
  </table>

<!-- Login Modal Officer -->
<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Approve this application </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="signInForm">
          <div class="form-group col">
            <label for="message">Write short message to supplier</label>
            <textarea class="form-control" id="message" name="message" rows="2"></textarea>
          </div>

          <div class="form-group">
            <input type="submit" name="approve" class="btn btn-success w-45" value="Approve">
            <input type="submit" name="denny" class="btn btn-danger w-45 margin-l-30" value="Denny">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
  // approve code save changes
  // get the data from form
  $message = $_POST['message'];

  if ($_POST['approve']) {
    $approve = 1;
  } else if ($_POST['denny']) {
    $approve = 2;
  }

  if ($approve) {
    // update record
    $query = "UPDATE tenders_applications SET approved = '$approve', message = '$message' WHERE _id = '$_id'";

    if (mysqli_query($db, $query)) {
      header('location: tenderverify.php?msg=saved');
    }else {
      header('location: tenderverify.php?msg=error-saving');
    }

  } else {
    // echo "Get out of here!! now!!";
  }

  include 'include/footer.php';
?>
