<div class="container text-center margin-top-10 container-errors">
<?php
  // get the error from the url
  $error = $_GET['msg'];

  if ($error === 'required') {
    echo "
      <div class='alert alert-danger' role='alert'>
        All fields are required!!
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
  if ($error === 'saved') {
    echo "
      <div class='alert alert-success' role='alert'>
        Successfuly saved the record into the <strong>E-Tender</strong> database!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
    ";
  }
  if ($error === 'error-login') {
    echo "
      <div class='alert alert-danger' role='alert'>
        Error while trying to login to <strong>E-Tender</strong> try to login again
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
    ";
  }
  if ($error === 'error-fetching') {
    echo "
      <div class='alert alert-danger' role='alert'>
        Error while trying to Fetch a record!! try again later!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
    ";
  }
  if ($error === 'error-saving') {
    echo "
      <div class='alert alert-danger' role='alert'>
        Error while saving a record!! try again later!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
    ";
  }
  if ($error === 'exist') {
    echo "
      <div class='alert alert-danger' role='alert'>
        The record you are trying to add already exist in the database!!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
    ";
  }
?>  
</div>
