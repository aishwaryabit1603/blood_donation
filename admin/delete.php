<?php
    require 'C:\xampp\htdocs\blood_donation\db_connection.php';
    session_start();
    if($_SESSION['admin'] != true)
    {
    echo "<script>alert('login first !!')</script>";
    header('Location: admin_login.php');
    }
    
    $id = $string = str_replace(" '' ", ".", $id); 
    echo $_GET['delete_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="C:\xampp\htdocs\blood_donation\images\icon2.ico" />
    <title>Delete User</title>
</head>
<body>
    <h1>hi delete</h1>
</body>
</html>