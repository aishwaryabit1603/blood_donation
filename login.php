<?php
    require 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

if(isset($_POST['login_user']))
{
    if(!empty($_POST['email'])&& !empty($_POST['password_1']))
    {
        $email = $_POST['email'];
        $pw_1  = $_POST['password_1'];

        $query = "Select * from donors where email = '$email' && password = '$pw_1'";
        $res = mysqli_query($connection,$query);
        if($res)
        {
            echo '<script>alert("login successful")</script>';
           //header("location:")
        }
        else
        {
            echo '<script>alert("Invalid email or password")</script>';
        }
    }
}
?>
</body>
</html>
