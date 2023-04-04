<?php
    require 'C:\xampp\htdocs\blood_donation\db_connection.php';
    session_start();
    if($_SESSION['admin'] != true)
    {
    echo "<script>alert('login first !!')</script>";
    header('Location: admin_login.php');
    }
    if(isset($_GET['delete_id']))
    {
        $id = $_GET['delete_id'];

        $sql = "delete from donors where id_no = $id";
        $result = mysqli_query($connection,$sql);
        if($result)
        {
            echo "<script>alert('Deleted Successfully !!')</script>";
            header("Location : C:\xampp\htdocs\blood_donation\admin\display.php");
        }
        else
        {
           die(mysqli_error($connection));
        }
    }
?>