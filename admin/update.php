<?php
  require 'C:\xampp\htdocs\blood_donation\db_connection.php';
  $id = null;
  if ( !empty($_GET['update_id'])) {
        $id = $_REQUEST['update_id'];
  }
  if(isset($_POST['update']))
  {
    if(!empty($_POST['name']) && !empty($_POST['dob']) && !empty($_POST['sex']) && !empty($_POST['blood_type']) && !empty($_POST['mobile_no']) && !empty($_POST['email']) &&!empty($_POST['state_input']) && !empty($_POST['district_input']))
    {
        $f_name = strtolower($_POST['name']) ;
        $f_name = ucfirst($f_name);
        $birthday = $_POST['dob'];
        $sex = $_POST['sex'];
        $blood = $_POST['blood_type'];
        $mobile = $_POST['mobile_no'];
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $state = $_POST['state_input'];
        $district = $_POST['district_input'];
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
            echo '</script>';
            
            die(mysqli_error($connection));
        }
    }
  }
  echo "<script type ='text/JavaScript'>";  
  echo 'window.location.href = "http://localhost:8080/blood_donation/admin/display.php" ';
  echo '</script>';
?>