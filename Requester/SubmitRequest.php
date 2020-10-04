<?php
define('TITLE', 'Submit Request');
define('PAGE', 'SubmitRequest');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
 $rEmail = $_SESSION['rEmail'];
} else {
 echo "<script> location.href='RequesterLogin.php'; </script>";
}
if(isset($_REQUEST['submitrequest'])){
//  // Checking for Empty Fields
//  if((($_REQUEST['requestertitle'] == "") || ($_REQUEST['requesterpassword'] == "") )){
//   // msg displayed if required field missing
//   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
//  } else {
//    // Assigning User Values to Variable
//    $rtitle = $_REQUEST['requestertitle'];
//    $rpassword = $_REQUEST['requesterpassword'];   
   
  //  $sql = "SELECT * from users where r_email = '$rEmail'";
     
  //  $result = $conn->query($sql);
  //  if($result->num_rows == 1){
  //    $row = $result->fetch_assoc();
  //    $login_id = $row['r_login_id'];
  //  }

  //  $sql = "INSERT INTO passwords(login_id,title,password) VALUES ('$login_id', '$rtitle', '$rpassword')";
  $vault = $_REQUEST['enc_vault'];
  $sql = "UPDATE users SET enc_vault='$vault' WHERE r_email='$rEmail'";
   if($conn->query($sql) == TRUE){
    // below msg display on form submit success
    
    $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Password Inserted Successfully  </div>';
    

   } else {
    // below msg display on form submit failed
    $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to insert password </div>';
   }
 }
// }
?>
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
        <input type="password" class="form-control" id="inputPassword" name="requesterpassword">
      </div>
      
      
    </div>
    <input type="hidden" name="enc_vault" id="encryptedVault">
    <button type="submit" class="btn btn-danger" name="submitrequest">Submit</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
  </form>
  <!-- below msg display if required fill missing or form submitted success or failed -->
  <?php if(isset($msg)) {echo $msg; } ?>
</div>
</div>
</div>

<?php
include('includes/footer.php'); 
$conn->close();
?>