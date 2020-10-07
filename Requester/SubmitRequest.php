<?php
define('TITLE', 'Submit Request');
define('PAGE', 'SubmitRequest');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if ($_SESSION['is_login']) {
  $rEmail = $_SESSION['rEmail'];
} else {
  echo "<script> location.href='RequesterLogin.php'; </script>";
}
if (isset($_REQUEST['submitrequest'])) {
  $vault = $_REQUEST['enc_vault'];
  $sql = "UPDATE users SET enc_vault='$vault' WHERE r_email='$rEmail'";
  if ($conn->query($sql) == TRUE) {
    // below msg display on form submit success

    $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Password Inserted Successfully  </div>';
  } else {
    // below msg display on form submit failed
    $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to insert password </div>';
  }
}
?>
<script type="text/javascript" src="../js/passgen.js"></script>

<div class="col-sm-9 col-md-10 mt-5">
  <form class="mx-5" action="" method="POST" onsubmit="updateVault(event)">


    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputTitle">Title</label>
        <input type="text" class="form-control" id="inputTitle" name="requestertitle">
      </div>

    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputPassword">Password</label>
        <div class="form-row">
          <input type="password" class="form-control col-md-9" id="inputPassword" name="requesterpassword">
          <button class="btn btn-default input-grp-btn col-md-3" onclick="randomGenerate(document.getElementById('inputPassword'),event)">Generate</button>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" onclick="togglePassword()" value="" id="showPassword">
          <label class="form-check-label" for="showPassword">
            Show password
          </label>
        </div>
      </div>

    </div>
    <input type="hidden" name="enc_vault" id="encryptedVault">
    <button type="submit" class="btn btn-danger" name="submitrequest">Submit</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
  </form>
  <!-- below msg display if required fill missing or form submitted success or failed -->
  <?php if (isset($msg)) {
    echo $msg;
  } ?>
</div>
</div>
</div>

<?php
include('includes/footer.php');
$conn->close();
?>