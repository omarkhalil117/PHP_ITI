<?php
require_once  './db_connection.php';
require_once  './db_info.php';

var_dump($_GET['id']);
var_dump($_POST);

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
    $old_data = json_encode($_POST);
    header("Location:update_form.php?errors={$errors}&old_data={$old_data}");
    exit();
}

try{
    $pdo = connect_to_db();
    $user_id = $_GET['id'];
    $select_query = "UPDATE ".DB_NAME.".".DB_TABLE.
    " SET name=:name , password=:password , email=:email , `room_number`=:roomnumber , image=:image".
    " WHERE id = :id";
    var_dump($select_query);
    $stmt = $pdo->prepare($select_query);
    $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':password', $_POST['password'] );
    $stmt->bindParam(':roomnumber', $_POST['roomnumber']);
    $stmt->bindParam(':image', $_FILES['image']['name']);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);

    header("Location:home.php");

}catch(PDOException $e){
    echo $e->getMessage();

}
?>