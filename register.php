<?php
  ob_start();
  require 'db_connection.php';
  
  $error = [];
  if(!empty($_POST['submit'] ))
  {
    if(!empty($_POST(['name'])) && !empty($_POST(['dob'])) && !empty($_POST(['sex'])) && !empty($_POST(['blood_type'])) && !empty($_POST(['mobile_no'])) && !empty($_POST(['email'])) &&
    !empty($_POST(['state_input'])) && !empty($_POST(['district_input'])) && !empty($_POST(['password_1'])) &&
      !empty($_POST(['password_2'])))
      {
        $f_name = mysqli_real_escape_string($connection, $_POST['name']);
        $birthday = mysqli_real_escape_string($connection, $_POST['dob']);
        $sex = mysqli_real_escape_string($connection, $_POST['sex']);
        $blood = mysqli_real_escape_string($connection, $_POST['blood_type']);
        $mobile = mysqli_real_escape_string($connection, $_POST['mobile_no']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $state = mysqli_real_escape_string($connection, $_POST['state_input']);
        $district = mysqli_real_escape_string($connection, $_POST['district_input']);
        $pw_1  = mysqli_real_escape_string($connection, md5($_POST['password_1']));
        $pw_2  = mysqli_real_escape_string($connection, md5($_POST['password_2']));

        
      }
      else
      {
        echo "Registration Failed";
      }
  }
  
?>
