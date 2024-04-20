<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php
if(isset($_GET['errors']))
{
    $errors = json_decode($_GET['errors'], true);
}

?>

<form action="index.php" method="GET">

First Name: <input type="text" name="firstname"><br>
<p style="color:red; font-weight:bold;"> <?php echo $errors['firstname'] ? $errors['firstname'] : ''?> </p>

Last Name: <input type="text" name="lastname"><br>
<p style="color:red; font-weight:bold;"> <?php echo $errors['lastname'] ? $errors['lastname'] : ''?> </p>

Address: <input type="text" name="address"><br>

<label for="country">Country</label>
<select name="country" id="">
    <option value="EG">Epypt</option>
    <option value="SA">Saudi Arabia</option>
    <option value="UAE">United Arab Emirates</option>
</select> <br>
Language: <br>

<label for="JS">Javascript</label>
<input type="checkbox" name="language[]" value="JS"/><br>

<label for="python">Python</label>
<input type="checkbox" name="language[]" value="python"/><br>

<label for="PHP">PHP</label>
<input type="checkbox" name="language[]" value="PHP"/><br>

<label for="java">Javascript</label>
<input type="checkbox" name="language[]" value="java"/><br>

Gender: <input type="radio" name="gender" value="male" value="male">
        <label for="male">Male</label>
        <input type="radio" name="gender" value="female" value="female">
        <label for="female">Female</label><br>

Username: <input type="text" name="username"><br>

Password: <input type="text" name="password"><br>

Department: <input type="text" name="department"><br>

<input type="submit">

</form>
</body>
</html>