<?php
    session_start();
    unset($_SESSION['email']);
    echo '<script>window.location="http://localhost:8080/blood_donation/"</script>';
?>