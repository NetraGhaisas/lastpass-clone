<?php
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_login']) && $_SESSION['is_login']==true){
    $email = $_SESSION['rEmail'];
    $sql = "SELECT enc_vault FROM users WHERE r_email='" .$email. "'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
    $row = $result->fetch_assoc();
    echo $row['enc_vault'];
    } else{
        echo "ERROR: Invalid request";
    }
} else {
    echo "ERROR: Invalid request";
}
?>