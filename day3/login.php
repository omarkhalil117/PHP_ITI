<?php

if ($_POST['email'] === '' || $_POST['password'] === '')
{
    header('Location:login_form.php');
}

$users = file('test.txt');

foreach($users as $user)
{
    $user_data = explode(':',$user);

    var_dump($user_data);

    if( ($_POST['email'] === $user_data[1]) && 
        ($_POST['password'] === $user_data[2]))
    {
        session_start(); 
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['login'] = true;
        // setcookie("name", $_POST['email'], time()+3600, '/', "",0);
        header("Location:home.php");
    }
}

?>