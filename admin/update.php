<?php
require 'C:\xampp\htdocs\blood_donation\db_connection.php';
try {
  if(isset($_POST['update'])) {
    if(!empty($_POST['name']) && !empty($_POST['dob']) && !empty($_POST['sex']) && !empty($_POST['blood_type']) && !empty($_POST['mobile_no']) && !empty($_POST['email']) && !empty($_POST['state_input']) && !empty($_POST['district_input'])) {
        require 'C:\xampp\htdocs\blood_donation\db_connection.php';

        // Sanitize input data
        $ids = $_POST['id'];
        $f_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $birthday = filter_var($_POST['dob'], FILTER_SANITIZE_STRING);
        $sex = filter_var($_POST['sex'], FILTER_SANITIZE_STRING);
        $blood = filter_var($_POST['blood_type'], FILTER_SANITIZE_STRING);
        $mobile = filter_var($_POST['mobile_no'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $state = filter_var($_POST['state_input'], FILTER_SANITIZE_STRING);
        $district = filter_var($_POST['district_input'], FILTER_SANITIZE_STRING);
        
        // Validate input data
        if(empty($ids) || empty($f_name) || empty($birthday) || empty($sex) || empty($blood) || empty($mobile) || empty($email) || empty($state) || empty($district)) {
          // Handle validation errors
          echo '<script type = "text/JavaScript">'; 
          echo  $ids;
          echo '</script>';
          echo '<script type = "text/JavaScript">';  
          echo "alert('Please fill all required fields')";
          echo '</script>';
          echo '<script type = "text/JavaScript">'; 
          echo 'window.location.href = "http://localhost:8080/blood_donation/admin/update.php" ';
          echo '</script>';
        }
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          // Handle email validation error
          echo '<script type = "text/JavaScript">';  
          echo "alert('Invalid email format')";
          echo '</script>';
          echo '<script type = "text/JavaScript">'; 
          echo 'window.location.href = "http://localhost:8080/blood_donation/admin/update.html" ';
          echo '</script>';
        }
        
        // Update query
        $res = "UPDATE donors 
                SET name = '$f_name', dob = '$birthday', sex = '$sex', bloodgroup = '$blood',
                mobile_no = '$mobile', email = '$email', state = '$state', district = '$district' 
                WHERE id_no = '$ids'";
        
        // Execute query
        $results = mysqli_query($connection, $res);
        
        // Handle query result
        if($results) {
          echo '<script type = "text/JavaScript">';  
          echo "alert('Updated Successfully')";
          echo '</script>';
          echo '<script type = "text/JavaScript">'; 
          echo 'window.location.href = "http://localhost:8080/blood_donation/admin/display.php" ';
          echo '</script>';
        } else {
          echo '<script type = "text/JavaScript">';  
          echo "alert('Error updating record: " . mysqli_error($connection) . "')";
          echo '</script>';
        }
      

      if($results) {
        echo '<script type = "text/JavaScript">';  
        echo "alert('Updated Successfully')";
        echo '</script>';
        echo '<script type = "text/JavaScript">'; 
        echo 'window.location.href = "http://localhost:8080/blood_donation/admin/display.php" ';
        echo '</script>';
      } else {
        throw new Exception(mysqli_error($connection));
      }
    }
  }
} catch(mysqli_sql_exception $e) {
    echo 'Message: ' . $e->getMessage();
    echo "<script type ='text/JavaScript'>"; 
    echo '</script>';
  }
  
?>
