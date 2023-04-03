<?php
     require 'C:\xampp\htdocs\blood_donation\db_connection.php';
     session_start();
     if($_SESSION['admin'] != true)
     {
       echo "<script>alert('login first !!')</script>";
       header('Location: admin_login.php');
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display USERS</title>
    <link rel="icon" type="image/x-icon" href="C:\xampp\htdocs\blood_donation\images\icon2.ico" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
        *{
            font-family: 'Poppins', sans-serif;
        }
        body{
            background: #f6eded;
        }
        .container{
            max-width: 95%;
            margin: 5px 5px;
            width: 100%;
            padding: 0 15px;
            overflow: hidden;
        }
        h1{
            color: #850000;
        }
        #table-container{
            overflow: auto;
        }
        table{
            max-width: 100%;
            text-align: center;
            min-width: 50rem;
            width: 120%;
        }
        table tbody:last-child{
        box-shadow: 0px 1px #850000;
        }
        table tr{
        height: 80px;
        }
        table tbody tr:nth-child(even) {
        background-color: #85000012;
        }
        table thead{
        background: #850000;
        color: white;
        }
        table tbody:last-child td{
        padding: 19px 0
        }
        th{
        min-width: 3rem;
        font-size:14px;
        padding: 15px 10px;
        }
        td {  
        padding: 5px ;
        font-size:13px;
        }
        .Remove{
        background: #850000;
        color: white;
        padding: 10px ;
        border-radius: 5px; 
        text-decoration:none;
        font-weight:300;
        cursor: pointer;
        }
        .Add {
        color: #850000;
        border: 1px solid #850000;
        background: #fff;
        width: 100px;
        font-weight:400;
        text-decoration:none;
        font-size:20px;
        padding: 10px ;
        border-radius: 5px; 
        cursor: pointer;
        }
    </style>
    <script>
        
    </script>
</head>
<body>

<body>
    <div class="container">
      <center><h1>Donors Available </h1></center>
        <div id="table-container">
            <table >
                <thead>
                    <tr>
                        <td>id</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Gender</td>
                        <td>Mobile No</td>
                        <td>Blood Type</td>
                        <td>State</td>
                        <td>district</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
            <?php
                $query = "SELECT id_no, name, email, sex, mobile_no, bloodgroup, state, district FROM donors";
                $result = mysqli_query($connection,$query);
                while($row = mysqli_fetch_array($result))
                {
                    $id = $row['id_no'];
            ?>
            <tr>
                <td><?php echo $row['id_no'] ?> </td>
                <td><?php echo $row['name'] ?> </td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['sex'] ?></td>
                <td><?php echo $row['mobile_no'] ?></td>
                <td><?php echo $row['bloodgroup'] ?></td>
                <td><?php echo $row['state'] ?></td>
                <td><?php echo $row['district'] ?></td>
                <td>
                <button class="Remove" id ="update">
                <a href="http://localhost:8080/blood_donation/admin/update.html"  onclick="window.open('http://localhost:8080/blood_donation/admin/update.html');">Update</a></button>
                <button class="Remove" id = "delete">
                <a href="http://localhost:8080/blood_donation/admin/delete.php?deleteid=.<?php echo $id; ?>'" onclick="window.open('http://localhost:8080/blood_donation/admin/delete.php');">Delete</a></button>
                </td> 
            </tr>
            <?php
                }
            ?>
        </tbody>
        <tbody>
            <tr>
                <td colspan="4" ></td>
                <td><button class="Add" id="Add">
                <a href="http://localhost:8080/blood_donation/admin/add_user.html" style="color:red;" onclick="window.open('http://localhost:8080/blood_donation/admin/add_user.html');">ADD</a></button>
            </td>
            </tr>
        </tbody>
        </table>
        </div>
    </div>

</body>
</html>