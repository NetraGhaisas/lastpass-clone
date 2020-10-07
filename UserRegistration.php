<?php
include('dbConnection.php');

if (isset($_REQUEST['rSignup'])) {
  // Checking for Empty Fields
  if (($_REQUEST['rEmail'] == "") || ($_REQUEST['hashedPassword'] == "")) {
    $regmsg = '<div class="alert alert-warning mt-2" role="alert"> All Fields are Required </div>';
  } else {
    $sql = "SELECT r_email FROM users WHERE r_email='" . $_REQUEST['rEmail'] . "'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
      $regmsg = '<div class="alert alert-warning mt-2" role="alert"> Email ID Already Registered </div>';
    } else {
      // Assigning User Values to Variable
      $rEmail = $_REQUEST['rEmail'];
      $rPassword = $_REQUEST['hashedPassword'];
      $serverHashedPassword = password_hash($rPassword,PASSWORD_DEFAULT);
      $encVault = $_REQUEST['encVault'];
      $sql = "INSERT INTO users(r_email, r_password,enc_vault) VALUES ('$rEmail', '$serverHashedPassword','$encVault')";
      if ($conn->query($sql) == TRUE) {
        $regmsg = '<div class="alert alert-success mt-2" role="alert"> Account Successfully Created </div>';
      } else {
        $regmsg = '<div class="alert alert-danger mt-2" role="alert"> Unable to Create Account </div>';
      }
    }
  }
}
?>

<div class="container pt-5" id="registration">
  <h2 class="text-center">Create an Account</h2>
  <div class="row mt-4 mb-4">
    <div class="col-md-6 offset-md-3">
      <form id="regForm" class="shadow-lg p-4" method="POST" onsubmit="beforeRegister(event)">
        <div class="form-group">
          <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">Email</label><input type="email" class="form-control" placeholder="Email" name="rEmail" id="email">
          <small class="form-text">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">Master
            Password</label><input type="password" class="form-control" placeholder="Password" name="rPassword" id="password">
        </div>
        <input type="hidden" id="hashedPassword" name="hashedPassword">
        <input type="hidden" id="encryptedVault" name="encVault">
        <button type="submit" class="btn btn-danger mt-5 btn-block shadow-sm font-weight-bold" name="rSignup">Sign Up</button>
        <em style="font-size:10px;">Note - By clicking Sign Up, you agree to our Terms, Data
          Policy and Cookie Policy.</em>
        <?php if (isset($regmsg)) {
          echo $regmsg;
        } ?>
      </form>
    </div>
  </div>
</div>