<?php
  require 'db_connection.php';
  if(isset($_POST['register']))
  {
    if(!empty($_POST['name']) && !empty($_POST['dob']) && !empty($_POST['sex']) && !empty($_POST['blood_type']) && !empty($_POST['mobile_no']) && !empty($_POST['email']) &&!empty($_POST['state_input']) && !empty($_POST['district_input']) && !empty($_POST['password_1']) && !empty($_POST['password_2']))
    {
        $error = 0;
        $f_name = ucfirst($_POST['name']);
        $birthday = $_POST['dob'];
        $sex = $_POST['sex'];
        $blood = $_POST['blood_type'];
        $mobile = $_POST['mobile_no'];
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $state = $_POST['state_input'];
        $district = $_POST['district_input'];
        $pw_1  = $_POST['password_1'];
        $pw_2 = $_POST['password_2'];

        function validateAge($birthday, $age = 18)
        {
          // $birthday can be UNIX_TIMESTAMP or just a string-date.
          if(is_string($birthday))
          {
            $birthday = strtotime($birthday);
          }
          // check
          // 31536000 is the number of seconds in a 365 days year.
          if(time() - $birthday < $age * 31536000)  {
              return false;
          }

          return true;
        }
        $ans = validateAge($birthday,18);
        if($ans == 0)
        {
          $error = $error + 1;
        }
         
        if($pw_1 != $pw_2)
        {
          $error = $error + 1;
        }

        if($error == 0)
        {
          $query = "Select * from donors where email = '$email' || mobile_no = '$mobile' ";
          $res = mysqli_query($connection,$query);
          if($res)
          {
            $num = mysqli_num_rows($res);
            if($num > 0)
            {
              echo '<script>alert("USER ALREADY EXISTS")</script>';
              header('location: C:\xampp\htdocs\blood_donation\login.html');
            }
            else
            {
              $sql = "INSERT INTO donors (password,name,dob,sex,bloodgroup,mobile_no,email,state,district)VALUES ('$pw_1','$f_name','$birthday','$sex','$blood','$mobile','$email','$state','$district')";
              $result = mysqli_query($connection,$sql);
              if($result)
              {
                echo '<script>alert("Registration Successful !! ")</script>';
              }
              else
              {
                die(mysqli_error($connection));
              }
          }
        }
      }
    }
  }  
  else
  {
    echo "<script type ='text/JavaScript'>";  
    echo "alert('Registration Failed')";  
    echo '</script>';
  }
  echo "<script type='text/javascript'>";
  echo 'window.location.href = "http://localhost:8080/blood_donation/index.html" ';
  echo '</script>';
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