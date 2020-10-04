<?php
 session_start();
 session_destroy();
 echo "<script>sessionStorage.removeItem('key');sessionStorage.removeItem('email');alert('Successfully logged out!');</script>";
 echo "<script> location.href='index.php'; </script>";
?>