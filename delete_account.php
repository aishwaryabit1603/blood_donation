<?php
    require 'C:\xampp\htdocs\blood_donation\db_connection.php';
    session_start();
    if($_SESSION['email'] != true)
    {
        echo "<script>alert('login first !!')</script>";
        header('Location: login.html');
    }

    $id = $_SESSION['email'];
    $sql = "delete from donors where id_no = $id";
    $result = mysqli_query($connection,$sql);
    if($result)
    {
        echo "<script>alert('Deleted Successfully !!')</script>";

        $URL="http://localhost:8080/blood_donation/index.html";
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
    else
    {
        die(mysqli_error($connection));
    }
?>