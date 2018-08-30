<?php
  include 'include/head.php';
?>

<!-- body -->
<div class="container body padding0">
  <?php // include navigation
    include 'include/navigation.php';
  ?>

  <table class="table table-sm table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tender No</th>
        <th scope="col">Target Group</th>
        <th scope="col">Awarded Company</th>
        <th scope="col">Closed</th>
        <th scope="col">Bid Amount</th>
        <th scope="col">Bidds</th>
      </tr>
    </thead>
    <tbody>
    <?php
        // get the approved tenders
        $sql = "SELECT * FROM tenders WHERE awarded = '1'";
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
          $t_awarded = $row['tender_awarded'];
          $t_bids = $row['tender_bids'];
          $t_amount = $row['bid_amount'];
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
              <td>$t_awarded</td>
              <td>$t_closing</td>
              <td>Ksh. $t_amount</td>
              <td>$t_bids</td>
            </tr>
          ";
        }
      ?>
      <!-- <tr>
        <th scope="row">1</th>
        <td>DLNK/T/04-02-2018</td>
        <td>Open to All</td>
        <td>Delink Inc</td>
        <td>04-03-2018 12:00 PM</td>
        <td>Ksh.1500000</td>
        <td>304 Bidders</td>
      </tr> -->
    </tbody>
  </table>

<?php
  include 'include/footer.php';
?>
