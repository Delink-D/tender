<?php
  session_start();

  // check if user is logged in before accessing this page
  if ($_SESSION['_login'] && ($_SESSION['_user']['category'] === 'supplier')) {
    include 'include/head.php';
    include 'include/modal.php';
?>
<style>
  body {
    background: #000;
  }
</style>
<!-- tender intro -->
<div class="container tender-body padding0">
  <div id="tender-header" style="position: relative;">
    <h3>Tender No. <strong>DLNK/T/04-02-2018</strong> Details</h3>
    <button class="btn btn-sm btn-success" style="position: absolute; top: 10px; right: 10px;" data-toggle="tooltip" data-placement="bottom" title="Place Your Bid">Bid Now</button>
  </div>
  <div class="padding-10 group" style="position: relative;">
    <div class="col-5 float-left">
      <p class="c-text-bold tender-text-detail">Tender Category: Open to All</p>
      <p class="c-text-bold tender-text-detail">Tender Notice Type: Infrastructure and construction</p>
    </div>
    <div class="col-5 float-right">
      <p class="c-text-bold tender-text-detail">Tender Closing Day: <span class="text-danger">04-03-2018 12:00 PM</span></p>
      <p class="c-text-bold tender-text-detail">Tender Security: 100000 Ksh</p>
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
        <th scope="col">Company</th>
        <th scope="col">Bidding Comp</th>
        <th scope="col">Bid By</th>
        <th scope="col">Company Category</th>
        <th scope="col">Bid Date</th>
        <th scope="col">Amount</th>
      </tr>
    </thead>
    <tbody>
      <tr class="bg-success">
        <th scope="row">1</th>
        <td>Delink Inc</td>
        <td>DLNK/T/04-02-2018</td>
        <td>UserName</td>
        <td>Open to All</td>
        <td>04-03-2018 12:00 PM</td>
        <td>250000 Ksh</td>
      </tr>
      <tr class="bg-primary">
        <th scope="row">1</th>
        <td>Delink In</td>
        <td>LDTD/T/04-05-2018</td>
        <td>UserName</td>
        <td>Open to All</td>
        <td>04-03-2018 12:00 PM</td>
        <td>270000 Ksh</td>
      </tr>
      <tr class="bg-warning">
        <th scope="row">1</th>
        <td>Delink Inc</td>
        <td>DLNK/T/04-02-2018</td>
        <td>UserName</td>
        <td>Open to All</td>
        <td>04-03-2018 12:00 PM</td>
        <td>250000 Ksh</td>
      </tr>
      <tr>
        <th scope="row">1</th>
        <td>Delink In</td>
        <td>LDTD/T/04-05-2018</td>
        <td>UserName</td>
        <td>Open to All</td>
        <td>04-03-2018 12:00 PM</td>
        <td>270000 Ksh</td>
      </tr>
      <tr>
        <th scope="row">1</th>
        <td>Delink Inc</td>
        <td>DLNK/T/04-02-2018</td>
        <td>UserName</td>
        <td>Open to All</td>
        <td>04-03-2018 12:00 PM</td>
        <td>250000 Ksh</td>
      </tr>
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
