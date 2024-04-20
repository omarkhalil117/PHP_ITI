<?php

require_once './db_connection.php';
require_once './db_info.php';

$errors=[];

if(empty($_POST['name']))
{
    $errors['name'] = 'name is required';
}

if(empty($_POST['email']))
{
    $errors['email'] = 'email is required';
}

// $email_count = count(explode("@",$_POST['email']));

// if ($email_count !== 2)
// {
//     $errors['email'] = 'email is not correct';
// }

// OR 

if (!isset($errors['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
{
    $errors['email'] = 'email is not correct';
}

// var_dump($errors);

if(count($errors))
{
    $errors = json_encode($errors);
    header("Location:form.php?errors={$errors}");
    exit();
}


if (isset($_FILES['image']['tmp_name'])){
    $filename = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $allowed =  array('jpeg','jpg', "png", "gif", "bmp", "JPEG","JPG", "PNG", "GIF", "BMP");
    
    if (!in_array($extension,$allowed))
    {
        $errors['image'] = "Wrong file format";
        header("Location:form.php");
    }

    $saved = move_uploaded_file($tmp_name, "images/{$filename}");

try{
    $pdo = connect_to_db();

    $insert_query = "INSERT INTO ".DB_NAME.".".DB_TABLE."(`name`, `email`, `password` , `room_number` , `image`) 
        VALUES (:username, :useremail, :userpassword , :room_number , :image)";

    $stmt  = $pdo->prepare($insert_query);

    $stmt ->bindParam(':username', $_POST['name']);
    $stmt->bindParam(':useremail', $_POST['email']);
    $stmt->bindParam(':userpassword', $_POST['password'] );
    $stmt->bindParam(':room_number', $_POST['roomnumber']);
    $stmt->bindParam(':image', $_FILES['image']['name']);

    $res = $stmt->execute();
}
catch (PDOException $e){
    echo $e->getMessage();
    exit();
}

}
header("Location:login_form.php");


?>