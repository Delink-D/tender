<div class="container text-center margin-top-10">
<?php
  // get the error from the url
  $error = $_GET['msg'];

  if ($error === 'required') {
    echo "
      <div class='alert alert-danger' role='alert'>
        User name and Password required!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
    ";
  }
  if ($error === 'user') {
    echo "
      <div class='alert alert-danger' role='alert'>
        User name or password incorrect!!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
    ";
  }
  if ($error === 'suclogin') {
    echo "
      <div class='alert alert-success' role='alert'>
        Success login, welcome to <strong>E-Tender</strong>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
    ";
  }
?>  
</div>
