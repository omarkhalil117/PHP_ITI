<?php
session_start();  # check session --> create /// use it

    unset($_SESSION['login']);
    unset($_SESSION['name']);
    setcookie("PHPSESSID", "", time() - 3600, "/" , "", 0);
session_destroy();  # I am no longer needs

echo "logged out successfully";

echo "<a href='login_form.php' class='btn btn-primary'> login  </a>";
?>