<?php
    session_start();
    unset($_SESSION['email']);
    header('location:C:\xampp\htdocs\blood_donation\index.html');
?>