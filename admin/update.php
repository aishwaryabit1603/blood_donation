<?php
  require 'C:\xampp\htdocs\blood_donation\db_connection.php';
  $id = $_GET['update_id'];
  if(isset($_POST['update']))
  {
    if(!empty($_POST['name']) && !empty($_POST['dob']) && !empty($_POST['sex']) && !empty($_POST['blood_type']) && !empty($_POST['mobile_no']) && !empty($_POST['email']) &&!empty($_POST['state_input']) && !empty($_POST['district_input']))
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

        if($error == 0)
        {
            $sql = "UPDATE donors set name = '$f_name',dob = '$birthday',sex = '$sex',bloodgroup = '$blood',mobile_no = '$mobile',email = '$email',state = '$state',district = '$district' where id_no = '$id' ";
            $result = mysqli_query($connection,$sql);
            if($result)
            {
                echo "<script type ='text/JavaScript'>";  
                echo "alert('Updated Successfully')";
                echo 'window.location.href = "http://localhost:8080/blood_donation/admin/display.php" ';
                echo '</script>';
            }
            else
            {
                echo "<script type ='text/JavaScript'>";  
                echo "alert('Not Updated !!!')";
                echo 'window.location.href = "http://localhost:8080/blood_donation/admin/display.php" ';
                echo '</script>';
                die(mysqli_error($connection));
            }
        }
    }
  }
?>