<?php

require_once './db_info.php';
require_once './db_connection.php';

try
{
    $pdo = connect_to_db();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $select_query = "SELECT * FROM ".DB_NAME.".".DB_TABLE.
    " WHERE email="."'".$email."'"." AND "."password="."'".$password."'";
    var_dump($select_query);
    $stmt = $pdo->prepare($select_query);

    $res = $stmt->execute();

    $count = $stmt->rowCount();
    
    if($count == 1)
    {
        session_start(); 
        header('Location:home.php');
    }
    else
    {
        header("Location:login_form.php");
    }

}
catch(PODException $e)
{
    echo $e;
}
?>