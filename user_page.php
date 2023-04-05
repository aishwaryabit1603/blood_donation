<?php
    require 'db_connection.php';
    session_start();
    if (!isset($_SESSION['email'])) 
    {
      echo '<script>alert("You have to log in first")</script>';
      header('location: login.html');
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>USER PAGE</title>
    <link rel="icon" type="image/x-icon" href="images\icon2.ico" />
  <style>
        @import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');

    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      list-style: none;
      font-family: 'Josefin Sans', sans-serif;
    }

    body{
      background-color: #D2122E;
    }

    .wrapper{
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%,-50%);
      width: 500px;
      height:800px;
      display: flex;
      box-shadow: 0 1px 20px 0 rgba(69,90,100,.08);
    }

    .wrapper .left{
      width: 50%;
      background: linear-gradient(to right,#E9967A,#E9967A);
      padding: 30px 25px;
      border-top-left-radius: 5px;
      border-bottom-left-radius: 5px;
      text-align: center;
      color: #fff;
    }
    .wrapper .left h3{
      background: linear-gradient(to right,#E9967A,#E9967A);
      padding: 25px 25px;
      border-top-left-radius: 5px;
      border-bottom-left-radius: 5px;
      text-align: center;
      font-size:25px;
      color: #fff;
    }

    .wrapper .right{
      width: 70%;
      background: #fff;
      padding: 30px 25px;
      border-top-right-radius: 5px;
      border-bottom-right-radius: 5px;
    }

    .wrapper .right .info,
    .wrapper .right .projects{
      margin-bottom: 25px;
      font-size: 20px;
    }

    .wrapper .right .info h3,
    .wrapper .right .projects h3{
        margin-bottom: 15px;
        padding-bottom: 5px;
        border-bottom: 1px solid #e0e0e0;
        color: #353c4e;
      text-transform: uppercase;
      letter-spacing: 5px;
      font-size:20px;
    }

    .wrapper .right .info_data,
    .wrapper .right .projects_data{
      display: flex;
      justify-content: space-between;
    }

    .wrapper .right .info_data .data,
    .wrapper .right .projects_data .data{
      width: 45%;
    }

    .wrapper .right .info_data .data h4,
    .wrapper .right .projects_data .data h4{
        color: #353c4e;
        margin-bottom: 5px;
    }

    .wrapper .right .info_data .data p,
    .wrapper .right .projects_data .data p{
      font-size: 20px;
      margin-bottom: 10px;
      color: #black;
    }

    .wrapper .social_media ul{
      display: flex;
    }

    .wrapper .social_media ul li{
      width: 45px;
      height: 45px;
      background: linear-gradient(to right,#01a9ac,#01dbdf);
      margin-right: 10px;
      border-radius: 5px;
      text-align: center;
      line-height: 45px;
    }

    .wrapper .social_media ul li a{
      color :#fff;
      display: block;
      font-size: 18px;
    }
  </style>
  </head>
  <body>
      <!-- information of the user logged in -->
      <!-- welcome message for the logged in user -->
      <?php 
      if (isset($_SESSION['email']))
        {
          $email = $_SESSION['email'];
          $query = "Select * from donors where email = '$email'";
          $query_run = mysqli_query($connection,$query);
          $count = mysqli_num_rows($query_run);
          if($count > 0)
          {
            while($result = mysqli_fetch_array($query_run))
            {
              $_SESSION['user'] = $result['name'];
              $name = $result['name'];
              $blood = $result['bloodgroup'];
              $email = $result['email'];
              $number = $result['mobile_no'];
              $state = $result['state'];
              $district = $result['district'];
            }
          }
        }
        
      ?>
      <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<div class="wrapper">
    <div class="left">
        <h3> NAME : </h3>
        <h3><?php echo strtoupper($name); ?></h3>
        <h3>BLOOD TYPE :</h3> 
        <h3><?php echo $blood; ?></h3>
    </div>
    <div class="right">
        <div class="info">
            <h3>Donor Details</h3>
            <div class="info_data">
                 <div class="data">
                   <h4>Email</h4>
                    <p><?php echo $email; ?></p>
                 </div>
                 <div class="data">
                   <h4>Phone</h4>
                    <p><?php echo $number; ?></p>
              </div>
            </div>
        </div>
      <div class="projects">
            <h3></h3>
            <div class="projects_data">
                 <div class="data">
                    <h4>STATE</h4>
                    <p><?php echo $state; ?></p>
                 </div>
                 <div class="data">
                   <h4>District</h4>
                    <p><?php echo $district; ?></p>
                  </div>
            </div>
      </div>
      <div class="projects">
          <h3></h3>
          <div class="projects_data">
                <div class="data">
                  <h4><a href="update.php" style="color: red" style="font-size:30px";>UPDATE HERE</a></h4>
                </div>
          </div>
      </div>
    
      <div class="projects">
          <h3></h3>
          <div class="projects_data">
                <div class="data">
                  <h4><a href="logout.php" style="color: red" style="font-size:30px";>Log Out</a></h4>
                </div>
          </div>
      </div>
      <div class="projects">
          <h3></h3>
          <div class="projects_data">
                <div class="data">
                  <h4><a href="delete_account.php" style="color: red" style="font-size:30px";>Delete Account</a></h4>
                </div>
          </div>
      </div>
</div>
    </div>
  </body>
</html>
