<?php
  session_start();

  // check if user is logged in before accessing this page
  if ($_SESSION['_login'] && ($_SESSION['_user']['category'] === 'supplier')) {
    include 'include/head.php';
    include 'include/modal.php';

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

?>
<style>
  body {
    background: #000;
  }
</style>
<!-- tender intro -->
<div class="container tender-body padding0">
  <div id="tender-header" style="position: relative;">
    <h3>Tender No. <strong><?php echo $row['tender_number']; ?></strong></h3>
    <button class="btn btn-sm btn-success" style="position: absolute; top: 10px; right: 10px;" data-toggle="tooltip" data-placement="bottom" title="Place Your Bid">Bid Now <span class="badge badge-light"><?php echo $row['tender_bids']; ?></span>
</button>
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
    <a href="" data-toggle="modal" data-target="#tenderDescModal" style="position: absolute;right: 10px; bottom: 10px;">Tender Description</a>
  </div>
</div>

<!-- body -->
<div class="container body padding0">
  <table class="table table-sm table-hover table-striped table-dark">
    <thead>
      <tr>
        <th colspan="7" class="text-center h4" style="background: #0B1726;">TOP BIDDERS ON THIS TENDER</th>
      </tr>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Bidding Company</th>
        <th scope="col">Bid By</th>
        <th scope="col">Company Category</th>
        <th scope="col">Bid Date</th>
        <th scope="col">Amount</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // display message is there are no biders for now
      if (mysqli_num_rows($b_query) < 1) {
        echo "<tr>
                <th colspan='6' class='text-center'>You are the First Bider Yeeeeh!! :-)</th>
              </tr>";
      }

      $count = 0;
      while ($b_row = mysqli_fetch_assoc($b_query)) {
        $b_tid = $b_row['tender_id'];
        $b_date = $b_row['date'];
        $b_amount = $b_row['bid_amount'];

        $b_comp = $b_row['bid_company'];
        $b_user = $b_row['bid_by'];

        $t_cat = $row['tender_type'];
        $count++;

        // get comapny name
        $c_select = "SELECT * FROM companies WHERE _id = '$b_comp'";
        $c_query = mysqli_query($db, $c_select);
        $user = mysqli_fetch_assoc($c_query);
        $comp_name = $user['company_name'];

        // get user name
        $u_select = "SELECT * FROM users WHERE _id = '$b_user'";
        $u_query = mysqli_query($db, $u_select);
        $user = mysqli_fetch_assoc($u_query);
        $user_name = $user['username'];

        switch ($count) {
          case 1:
            $bg_color = 'bg-success';
            break;

          case 2:
            $bg_color = 'bg-primary';
            break;

          case 3:
            $bg_color = 'bg-warning';
            break;

          default:
            $bg_color = '';
            break;
        }
        echo "
          <tr class='$bg_color'>
            <th scope='row'>$count</th>
            <td>$comp_name</td>
            <td>$user_name</td>
            <td>$t_cat</td>
            <td>$b_date</td>
            <td>Ksh. $b_amount</td>
          </tr>
        ";
      }
      ?>
    </tbody>
  </table>

<?php
  include 'include/footer.php';
  }else {
    // redirect to home page
    header("location: index.php?msg=sup-login");
    exit();
  }
?>
