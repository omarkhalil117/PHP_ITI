<?php

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


$line = '';
foreach ($_POST as $key => $val) {
    $line .= $val . ':';
    echo "<br>";
}

if(isset($_FILES['profile_picture']['name']))
{
    $line .= $_FILES['profile_picture']['name'].':';
}

$line = rtrim($line, ':');
$line .= PHP_EOL;
file_put_contents('test.txt', $line, FILE_APPEND);


if (isset($_FILES['profile_picture']['tmp_name'])){
    $filename = $_FILES['profile_picture']['name'];
    $tmp_name = $_FILES['profile_picture']['tmp_name'];
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $allowed =  array('jpeg','jpg', "png", "gif", "bmp", "JPEG","JPG", "PNG", "GIF", "BMP");
    
    if (!in_array($extension,$allowed))
    {
        $errors['image'] = "Wrong file format";
        header("Location:form.php");
    }

    $saved = move_uploaded_file($tmp_name, "images/{$filename}");


    echo "<img  width='300' height='300' src='images/{$filename}'> ";
}
header("Location:login_form.php");


?>