<div>
  <h3>Add Comapy <small>Form</small></h3>
  <form action="insert/insert.company.php" method="post" id="vld">
    <div class="row">
      <div class="form-group col">
        <label>Company Reg No</label>
        <input type="text" name="regNo" class="form-control" placeholder="Comapy Reg Number">
      </div>

      <div class="form-group col">
        <label>KRA Pin</label>
        <input type="text" name="kra" class="form-control" placeholder="Comapy KRA Pin">
      </div>
    </div>

    <div class="row">
      <div class="form-group col">
        <label>Company Name</label>
        <input type="text" name="cname" class="form-control" placeholder="Comapy Name">
      </div>

      <div class="form-group col">
        <label>Company E-Mail</label>
        <input type="text" name="cemail" class="form-control" placeholder="Comapy E-Mail">
      </div>
    </div>

    <div class="row">
      <div class="form-group col">
        <label>Company Phone</label>
        <input type="text" name="cphone" class="form-control" placeholder="Comapy Phone Number">
      </div>

      <div class="form-group col">
         <label>Company Category</label>
        <select name="ccategory" class="form-control">
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
</div>

<!-- view all companies -->
<div class="margin-top-50">
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
        $c_sql = mysqli_query($db, "SELECT * FROM companies");
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
