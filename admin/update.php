<?php
try {
  require 'C:\xampp\htdocs\blood_donation\db_connection.php';

  if(isset($_POST['update'])) {
    if(!empty($_POST['name']) && !empty($_POST['dob']) && !empty($_POST['sex']) && !empty($_POST['blood_type']) && !empty($_POST['mobile_no']) && !empty($_POST['email']) && !empty($_POST['state_input']) && !empty($_POST['district_input'])) {
      $ids = $_POST['id'];
      $f_name = strtolower($_POST['name']) ;
      $f_name = ucfirst($f_name);
      $birthday = $_POST['dob'];
      $sex = $_POST['sex'];
      $blood = $_POST['blood_type'];
      $mobile = $_POST['mobile_no'];
      $email = $_POST['email'];
      $state = $_POST['state_input'];
      $district = $_POST['district_input'];

      $res = "UPDATE donors 
              SET name = '$f_name', dob = '$birthday', sex = '$sex', bloodgroup = '$blood',
              mobile_no = '$mobile', email = '$email', state = '$state', district = '$district' 
              WHERE id_no = '$ids'";

      $results = mysqli_query($connection, $res);

      if($results) {
        echo '<script type = "text/JavaScript">';  
        echo "alert('Updated Successfully')";
        echo '</script>';
      } else {
        throw new Exception(mysqli_error($connection));
      }
    }
  }
  
  echo "<script type ='text/JavaScript'>";  
  echo 'window.location.href = "http://localhost:8080/blood_donation/admin/display.php" ';
  echo '</script>';

} catch(Exception $e) {
  echo 'Message: ' . $e->getMessage();
  echo "<script type ='text/JavaScript'>";  
  echo 'window.location.href = "http://localhost:8080/blood_donation/admin/update.html" ';
  echo '</script>';
}
?>
