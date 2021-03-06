<?php
  include 'include/head.php';
?>
<!-- body -->
<div class="container body padding0">
  <?php // include navigation
    include 'include/navigation.php';
  ?>

  <table class="table table-sm table-hover table-tenders">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tender No</th>
        <th scope="col">Target Group</th>
        <th scope="col">Closing</th>
        <th scope="col">Cost Estimate</th>
        <th scope="col">Apply Tender</th>
      </tr>
    </thead>
    <tbody>
      <?php
        // get the approved tenders
        $sql = "SELECT * FROM tenders WHERE expired = '0' AND awarded = '0'";
        $query = mysqli_query($db, $sql);

        if (mysqli_num_rows($query) < 1) {
          echo "<tr>
                  <th colspan='6' class='text-center'>There are not tenders to display!!</th>
                </tr>";
        }

        $count = 0;
        while ($row = mysqli_fetch_assoc($query)) {
          $_id = $row['_id'];
          $t_num = $row['tender_number'];
          $t_cat = $row['tender_cat'];
          $t_desc = $row['tender_desc'];
          $t_closing = $row['tender_closing'];
          $t_security = $row['tender_security'];
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

          if (mysqli_num_rows($query_c) > 0) {
            $url = 'bid.php?id='.$_id; // url to biding page
            $btn = "<a href='$url' class='badge badge-info'>Bid Now</a>";
          } else {
              $url = 'apply.php?id='.$_id; // url to biding page
              $btn = "<a href='$url' class='badge badge-info'>Apply Now</a>";
          }

          // check if user is an official
          if ($_SESSION['_user']['level'] === 'officer') {
            $url = 'bid.php?id='.$_id; // url to biding page
            $btn = "<a href='$url' class='badge badge-info'>All Bids</a>";
          }

          echo "
            <tr class='t-row'>
              <th scope='row'>$count</th>
              <td><span data-container='body' data-toggle='popover' title='$t_num' data-placement='bottom' data-content='$t_desc'>$t_num</span></td>
              <td>$category</td>
              <td>$t_closing</td>
              <td>Ksh. $t_security</td>
              <td>$btn</td>
            </tr>
          ";
        }
      ?>
    </tbody>
  </table>

<?php
  include 'include/footer.php';
?>
