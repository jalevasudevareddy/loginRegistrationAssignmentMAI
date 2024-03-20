<?php
session_start();
unset($_SESSION['email']);
session_unset();
session_destroy();
echo "<script>window.localStorage.setItem('logout', true);</script>";
?>

<?php
header('Location: ../login.php');
exit();
?>