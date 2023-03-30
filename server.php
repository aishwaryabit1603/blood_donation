<?php
 
// Starting the session, necessary
// for using session variables
session_start();
ob_start();
require "db_connection.php" ;
// Declaring and hoisting the variables

$f_name = "";
$birthday = "";
$sex = "";
$blood = "";
$mobile = "";
$email = "";
$state = "";
$district = "";
$pw_1 = "";
$pw_2 = "";

$errors = array();
$_SESSION['success'] = "";

// Registration code
if (isset($_POST['reg_user'])) {
  
    // Receiving the values entered and storing
    // in the variables
    // Data sanitization is done to prevent
    // SQL injections
    $f_name = mysqli_real_escape_string($db_database, $_POST['name']);
    $birthday = mysqli_real_escape_string($db_database, $_POST['dob']);
    $sex = mysqli_real_escape_string($db_database, $_POST['sex']);
    $blood = mysqli_real_escape_string($db_database, $_POST['blood_type']);
    $mobile = mysqli_real_escape_string($db_database, $_POST['mobile_no']);
    $email = mysqli_real_escape_string($db_database, $_POST['email']);
    $state = mysqli_real_escape_string($db_database, $_POST['state_input']);
    $district = mysqli_real_escape_string($db_database, $_POST['district_input']);
    $pw_1  = mysqli_real_escape_string($db_database, $_POST['password_1']);
    $pw_2  = mysqli_real_escape_string($db_database, $_POST['password_2']);
  
    // Ensuring that the user has not left any input field blank
    // error messages will be displayed for every blank input
    if (empty($f_name)) { array_push($errors, "Full Name is required"); }
    if (empty($birthday)) { array_push($errors, "Date of Birth is required"); }
    if (empty($sex)) { array_push($errors, "Gender is required"); }
    if (empty($blood)) { array_push($errors, "Blood Type is required"); }
    if (empty($mobile)) { array_push($errors, "Contact No is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($state)) { array_push($errors, "State of your residence is required"); }
    if (empty($district)) { array_push($errors, "District of your residence is required"); }
    if (empty($pw_1)) { array_push($errors, "Password is required"); }
  
    if ($pw_1 != $pw_2) {
        array_push($errors, "The two passwords do not match");
        echo '<script>alert("Passwords do not match ")</script>';
        // Checking if the passwords match
    }
    
    
    // If the form is error free, then register the user
    if (count($errors) == 0) {
         
        // Password encryption to increase data security
        $password_final = md5($password_1);
         
        // Inserting data into table
        $query = "INSERT INTO donors (password,name,dob,sex,bloodgroup,mobile_no,email,state,district)
                  VALUES('$password_final' '$f_name', '$birthday', '$sex', '$blood' , '$mobile' , '$email' ,'$state' , '$district' )";
        
        mysqli_query($db_database, $query);
  
        // Storing username of the logged in user,
        // in the session variable
        $_SESSION['email'] = $email;
         
        // Welcome message
        $_SESSION['success'] = "You have logged in";
         
        // Page on which the user will be
        // redirected after logging in
        echo '<script>alert("Successful Registration")</script>';
        header('location:index.html');
    }
    else
    {
       var_dump($errors);
    }
}
  
// User login
if (isset($_POST['login_user'])) {
     
    // Data sanitization to prevent SQL injection
    $email = mysqli_real_escape_string($db_database, $_POST['email']);
    $pw_1 = mysqli_real_escape_string($db_database, $_POST['password_1']);
    
    // Error message if the input field is left blank
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($pw_1)) {
        array_push($errors, "Password is required");
    }
    // Checking for the errors
    if (count($errors) == 0) {
         
        // Password matching
        $password_final = md5($pw_1);
         
        $query = "SELECT * FROM donors WHERE email=
                '$email' AND password='$password_final'";
        $results = mysqli_query($db_database, $query);
  
        // $results = 1 means that one user with the
        // entered username exists
        if (mysqli_num_rows($results) == 1) {
             
            // Storing username in session variable
            $_SESSION['email'] = $email;
            // Welcome message
            $_SESSION['success'] = "You have logged in!";

            header('location:user_page.html');
        }
        else {
             
            // If the username and password doesn't match
            array_push($errors, "Email or password incorrect");
        }
    }
}
  
?>