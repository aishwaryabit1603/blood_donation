<?php
    $db_host = 'localhost';
    $db_user = 'root';
    $db_password = "";
    $db_database = "blood_donation";

    // connecting to database
    $connection = mysqli_connect($db_host,$db_user,$db_password,$db_database);
    // if connection fails alert message box
    if(!$connection)
    {
        die('Connect not Connect: '.mysqli_error($connection));
    }
    else
    {
        echo "connection successful";
        if(mysqli_select_db($connection,'blood_donation'))
        {
            echo "db selected";
        }
    }
?>