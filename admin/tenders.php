<div>
  <h3>All Tenders <small>Table</small></h3>

  <div class="margin-top-50">
    <table class="table table-sm table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Company</th>
          <th scope="col">Tender Number</th>
          <th scope="col">Category</th>
          <th scope="col">Type</th>
          <th scope="col">Security</th>
          <th scope="col">Expired</th>
          <th scope="col">Closing</th>
          <th scope="col">Approve</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $t_sql = mysqli_query($db, "SELECT * FROM tenders");
          if (mysqli_num_rows($t_sql) < 1) {
            echo "
              <tr>
                <th colspan='7' class='text-center'>THERE ARE NO TENDERS YET!!</th>
              </tr>
            ";
          }

          $rowNo = 0;
          while ($row = mysqli_fetch_assoc($t_sql)) {
            $t_id = $row['_id'];
            $c_name = $row['company_name'];
            $t_num = $row['tender_number'];
            $t_cat = $row['tender_cat'];
            $t_type = $row['tender_type'];
            $t_security = $row['tender_security'];
            $t_desc = $row['tender_desc'];
            $t_addBy = $row['added_by'];
            $t_approved = $row['approved'];
            $t_expired = $row['expired'];
            $t_closing = date('M d Y', strtotime($row['tender_closing']));
            $t_date = date('M d Y', strtotime($row['dateadded']));
            $rowNo ++;

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

            // approved
            switch ($t_approved) {
              case '1':
                $approved = true;
                break;
              
              default:
                $approved = false;
                break;
            }

            // expired
            switch ($t_expired) {
              case '1':
                $expired = 'Yes';
                break;
              
              default:
                $expired = 'No';
                break;
            }

            echo "
              <tr>
                <td>$rowNo</td>
                <td>$c_name</td>
                <td>$t_num</td>
                <td>$category</td>
                <td>$t_type</td>
                <td>$t_security</td>
                <td>$expired</td>
                <td>$t_closing</td>
                <td>";
                if ($t_approved) {
                  echo "Yes";
                }else {
                  echo "<a href='actions/tender.approve.php?id=$t_id' class='badge badge-success'>Approve</a>";
                }
                "</td>
              </tr>
            ";
          }
        ?>
      </tbody>
    </table>  
  </div>

</div>