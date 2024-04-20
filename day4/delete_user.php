<?php
require_once  './db_connection.php';
require_once './utils.php';
require_once './db_info.php';

var_dump($_GET);
$user_id = $_GET['id'];

try{
    $pdo = connect_to_db();
    var_dump($pdo);

    $delete_query = "DELETE FROM ".DB_TABLE." WHERE id = :id";
    $stmt = $pdo->prepare($delete_query);
    $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
    $res=$stmt->execute();
    if($stmt->rowCount()==1)
    {
        echo "Deleted";
    }
    header("Location:home.php");
}catch(PDOException $e){
    echo $e->getMessage();

}