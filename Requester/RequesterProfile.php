<?php
define('TITLE', 'Requester Profile');
define('PAGE', 'RequesterProfile');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if ($_SESSION['is_login']) {
  $rEmail = $_SESSION['rEmail'];
} else {
  echo "<script> location.href='RequesterLogin.php'; </script>";
}
?>

<script type="text/javascript" src="../js/sjcl.js"></script>
<script type="text/javascript" src="../js/vault.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<script>
  window.onload = function() {
    populate();
  }
</script>
<div class="col-sm-6 mt-5">
  <form class="mx-5" method="POST">
    <div class="container" style="width:700px;">
      <h3 align="center">Password Vault</h3><br />
      <!-- boxes are generated dynamically -->
      <div class="container" id="vaultContainer">
      </div>
    </div>
  </form>
</div>
<?php
include('includes/footer.php');
?>