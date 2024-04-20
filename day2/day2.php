<?php
// open file
// $filecontent = fopen('form.txt','r');
// var_dump($filecontent);
// fclose($filecontent);

// write into file
// $testfile = fopen('text.txt', 'w');
// fwrite($testfile,"Hello");
// fclose($testfile);

// read file as string 
// $testf = fopen('test.txt','r');
// $testfsize = filesize('test.txt');
// $data = fread($testf,$testfsize);
// var_dump($data);  // read as string
// fclose($testf);

// return a string in one step
// readfile('test.txt');

// return array of content (ARRAY)
// $data = file('test.txt');
// var_dump($data);

// using file_get_contents (STRING)
// $data = file_get_contents('test.txt');
// var_dump($data);

// split data
// $data = file('test.txt');

// foreach($data as $line)
// {
//     $i=0;
//     echo "{$line} no. {$i} <br>";   
// }

// get line as : seperated string
$filehandler = fopen('test.txt','r');
$size = filesize('test.txt');
echo "<table>";
echo "<th>col1</th>";
echo "<th> col2 </th>";
echo "<th> col3 </th>";
echo "<th> col4 </th>";
echo "<th> col5 </th>";
echo "<th> col6 </th>"; 
echo "<tr>";
while(!feof($filehandler))
{
    $info = fgetcsv($filehandler,100,':');
    foreach($info as $inf)
    {
        echo "<td> {$inf} </td>";
    }
    echo "</tr>";
}
echo "</table>";
fclose($filehandler);


//////////////////////////////////////////////////////////////

//! Arrays



?>