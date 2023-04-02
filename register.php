<?php
  require 'db_connection.php';
  if(isset($_POST['submit']))
  {
     echo "1";
    if(!empty($_POST['name']) && !empty($_POST['dob']) && !empty($_POST['sex']) && !empty($_POST['blood_type']) && !empty($_POST['mobile_no']) && !empty($_POST['email']) &&!empty($_POST['state_input']) && !empty($_POST['district_input']) && !empty($_POST['password_1']) &&!empty($_POST['password_2']))
    {

      echo "2";

      $f_name = $_POST['name'];
      $birthday = $_POST['dob'];
      $sex = $_POST['sex'];
      $blood = $_POST['blood_type'];
      $mobile = $_POST['mobile_no'];
      $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
      $state = $_POST['state_input'];
      $district = $_POST['district_input'];
      $pw_1  = $_POST['password_1'];
      $pw_2  = $_POST['password_2'];

      echo "3";
      $query = "Select * from donors where email = '$email' || mobile_no = '$mobile' ";
      $res = mysqli_query($connection,$query);

      if($res)
      {
        echo "4";
        $num = mysqli_num_rows($res);
        echo count($num);
        if($num > 0)
        {
          echo "5";
          echo "USER ALREADY EXISTS";
          header('location: register.html');
        }
      }
      else
      {
        echo "6";
        $sql = "INSERT INTO donors (password,name,dob,sex,bloodgroup,mobile_no,email,state,district)VALUES ('$pw_1','$f_name','$birthday','$sex','$blood','$mobile','$email','$state','$district')";
        $result = mysqli_query($connection,$sql);

        if($result)
        {
          echo "7";
          echo '<script>alert("Registration Successful !! ")</script>';
          header('Location:login.html');
        }
        else
        {
          echo 'hi';
          die(mysqli_error($connection));
        }
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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link rel="icon" type="image/x-icon" href="images\icon2.ico" />
</head>
<body>
  
</body>
</html>