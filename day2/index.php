<?php

// var_dump($_GET);

$errors=[];

if(empty($_GET['firstname']))
{
    $errors['firstname'] = 'Firstname is required';
}

if(empty($_GET['lastname']))
{
    $errors['lastname'] = 'Lastname is required';
}

if(count($errors))
{
    $errors = json_encode($errors);
    header("Location:form.php?errors={$errors}");
}


$line='';
foreach($_GET as $key=>$val)
{
    if (is_array($val))
    {
        foreach($val as $lang)
        {
            $line .= $lang.',';
        }
    }
    $line .= $val.':';
}
$line = rtrim($line, ':');
$line .= PHP_EOL;
file_put_contents('test.txt', $line , FILE_APPEND );


$customers=file("test.txt");
// var_dump($customers);
echo "<table border='2'>";
echo "<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Address</th>
<th>Country</th>
<th>Languages</th>
<th>Gender</th>
<th>Username</th>
<th>Password</th>
<th>Department</th>
</tr>";

foreach ($customers as $record)
{
$data=explode(":",$record);
foreach ($data as $val){
echo "<td>". $val."</td>";
}
echo "</tr>";
}
echo "</table>";

?>