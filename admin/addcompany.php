<h3>All Comapanies <small>List</small></h3>

<!-- view all companies -->
<div>
  <table class="table table-sm table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Company</th>
        <th scope="col">Reg Number</th>
        <th scope="col">Category</th>
        <th scope="col">Email</th>
        <th scope="col">Added Date</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $c_sql = mysqli_query($db, "SELECT * FROM suppliers");
        if (mysqli_num_rows($c_sql) < 1) {
          echo "
            <tr>
              <th colspan='7' class='text-center'>THERE ARE NO COMPANIES YET!!</th>
            </tr>
          ";
        }

        $rowNo = 0;
        while ($row = mysqli_fetch_assoc($c_sql)) {
          $c_id = $row['_id'];
          $c_name = $row['company_name'];
          $c_reg = $row['company_reg'];
          $c_cat = $row['company_cat'];
          $c_email = $row['company_email'];
          $c_date = date('M d Y', strtotime($row['dateadded']));
          $rowNo ++;

          switch ($c_cat) {
            case 'y':
              $category = "Youth";
              break;

            case 'yw':
              $category = "Youth & Women";
              break;

            case 'm':
              $category = "Minorities";
              break;

            case 'g':
              $category = "General";
              break;

            default:
              $category = "N/A";
              break;
          }

          echo "
            <tr>
              <td>$rowNo</td>
              <td>$c_name</td>
              <td>$c_reg</td>
              <td>$category</td>
              <td>$c_email</td>
              <td>$c_date</td>
              <td>
                <a href='$c_id' class='badge badge-primary'>Edit</a>
                <a href='$c_id' class='badge badge-danger'>Delete</a>
              </td>
            </tr>
          ";
        }
      ?>
    </tbody>
  </table>
</div>
