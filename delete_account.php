<?php
    require 'C:\xampp\htdocs\blood_donation\db_connection.php';
    $id = $_GET['email'];
    
    $sql = "DELETE FROM donors WHERE id_no = '$id' ";
    $stmt = mysqli_query($connection, $sql);
    if($stmt)
    {
        echo "<script>alert('Deleted Successfully !!')</script>";
        header('Location: http://localhost:8080/blood_donation/index.html');
    }
    else
    {
        die(mysqli_error($connection));
    }
    mysqli_close($connection);
    
?>