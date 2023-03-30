<?php
    $db_host = 'localhost';
    $db_user = 'root';
    $db_password = "";
    $db_database = "blood_donation";

    // connecting to database
    $connection = mysqli_connect($db_host,$db_user,$db_password,$db_database);
    // if connection fails alert msgbox
    if(!$connection)
    {
        die('Connect not Connect: '.mysqli_error($connection));
    }
?>