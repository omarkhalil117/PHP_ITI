<?php 
require './utils.php';


echo "<h1> Welcome !!! </h1>";

$rows = get_all_data();

display_table($rows);


echo "<a class='btn btn-dark m-5' href='logout.php'> logout </a>";

?>