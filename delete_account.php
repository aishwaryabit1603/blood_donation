<?php
    require 'C:\xampp\htdocs\blood_donation\db_connection.php';
    session_start();
    if(!isset($_SESSION['email']))
    {
        echo "<script>alert('login first !!')</script>";
        header('Location: login.html');
    }
    
    $id = $_SESSION['email'];
    $sql = "DELETE FROM donors WHERE id_no = ?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "s", $id);
    if(mysqli_stmt_execute($stmt))
    {
        echo "<script>alert('Deleted Successfully !!')</script>";
        header('Location: http://localhost:8080/blood_donation/index.html');
    }
    else
    {
        die(mysqli_error($connection));
    }
    
?>