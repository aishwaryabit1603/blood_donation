<?php
  ob_start();
  require 'db_connection.php';
  $error = [];
  if(isset($_POST['submit-form']))
  {
    if(!empty($_POST['name']) && !empty($_POST['dob']) && !empty($_POST['sex']) && !empty($_POST['blood_type']) && !empty($_POST['mobile_no']) && !empty($_POST['email']) &&!empty($_POST['state_input']) && !empty($_POST['district_input']) && !empty($_POST['password_1']) &&!empty($_POST['password_2']))
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

      if(!strlen($mobile == 10))
      {
        array_push($error,"Mobile no should be = 10"); 
      }
      if($pw_1 != $pw_2)
      {
        array_push($error,"Confirm password does not match");
      }

      if (!filter_var($email, FILTER_VALIDATE_EMAIL))
      {
        array_push($error,"Not a valid email address");  
      }

      // validation donor > 18
      $today = date("Y-m-d");
      $diff = date_diff(date_create($birthday), date_create($today));
      if($diff < 18)
      {
        array_push($error,"Not Eligible to donate blood");
      }

      if(count($error) == 0)
      {
        $sql = "INSERT INTO donors (password,name,dob,sex,bloodgroup,mobile_no,email,state,district)VALUES ('$pw_1','$f_name','$birthday','$sex','$blood','$mobile','$email','$state','$district')";
        $result = mysqli_query($connection,$sql);
        if($result)
        {
          echo '<script type ="text/JavaScript">';  
          echo 'alert("Registration Successful ")';  
          echo '</script>';
          header("Location: index.html");
        }
        else
        {
          die(mysqli_error($connection));
        }
      }
      else
      {
        foreach($error as $error)
        {
          echo '<script type ="text/JavaScript">';  
          echo 'alert($error)';  
          echo '</script>';
        }
        header("Location: register.html");
      }
    }
  }
  else
  {
    echo "<script type ='text/JavaScript'>";  
    echo "alert('Registration Failed')";  
    echo '</script>';
    header("Location: register.html");
  }
?>