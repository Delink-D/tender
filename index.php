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
        <th scope="col">Security</th>
        <th scope="col">Apply Tender</th>
      </tr>
    </thead>
    <tbody>
      <?php
        // get the approved tenders
        $sql = "SELECT * FROM tenders WHERE approved = '1' AND expired = '0'";
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

          $url = 'bid.php?id='.$_id;

          echo "
            <tr class='t-row'>
              <th scope='row'>$count</th>
              <td><span data-container='body' data-toggle='popover' title='$t_num' data-placement='bottom' data-content='$t_desc'>$t_num</span></td>
              <td>$category</td>
              <td>$t_closing</td>
              <td>Ksh. $t_security</td>
              <td><a href='$url' class='badge badge-info'>Bid Now</a></td>
            </tr>
          ";
        }
      ?>
    </tbody>
  </table>

<?php
  include 'include/footer.php';
?>
