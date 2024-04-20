<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<?php

require_once './db_connection.php';
require_once './db_info.php';

function display_in_table($rows){
    echo "<table class='table'> <tr> <th>ID</th>  <th>Name</th>  <th>Email</th>
    <th>Grade</th>
    </tr>";
    foreach ($rows as $row){
        echo "<tr>";
        foreach ($row as $value){
            echo "<td>{$value}</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function display_table($rows){

        echo "<table class='table'> <tr> <th>ID</th>  <th>Name</th>  <th>Email</th>
    <th>Grade</th> <th>Edit</th> <th> Delete</th>
    </tr>";
        foreach ($rows as $row){
            $user_id = $row['id'];
            $delete_url = "delete_user.php?id={$user_id}";
            $edit_url = "update_form.php?id={$user_id}";

            echo "<tr>";
            foreach ($row as $value){
                echo "<td>{$value}</td>";
            }
            echo "<td><a href='{$edit_url}' class='btn btn-warning'>Edit</a></td>";
            echo "<td> <a href='{$delete_url}'  class='btn btn-danger'> Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";

}

function get_all_data()
{
    $pdo = connect_to_db();

    $query = "SELECT * FROM ".DB_TABLE;
    $statement = $pdo->prepare($query);
    $res=$statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
?>