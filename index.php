<?php
  include 'include/head.php';

  // echo $_SERVER['REQUEST_URI'];
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
      </tr>
    </thead>
    <tbody>
      <?php
        // get the approved tenders
        $sql = "SELECT * FROM tenders WHERE approved = '1' AND expired = '0'";
        $query = mysqli_query($db, $sql);

        if (mysqli_num_rows($query) < 1) {
          echo "<tr>
                  <th colspan='6'>There are not tenders to display!!</th>
                </tr>";
        }

        $count = 0;
        while ($row = mysqli_fetch_assoc($query)) {
          $_id = $row['_id'];
          $c_name = $row['company_name'];
          $t_num = $row['tender_number'];
          $t_cat = $row['tender_cat'];
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

              default:
                $category = "N/A";
                break;
            }

            $url = 'bid.php?id='.$_id;

          echo "
            <tr class='t-row' data-url=$url>
              <th scope='row'>$count</th>
              <td>$t_num</td>
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
