<?php
    require 'db_connection.php' ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Donor</title>
    <link rel="icon" type="image/x-icon" href="images\icon2.ico" />
<style>
       @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
    *{
        font-family: 'Poppins', sans-serif;
    }
    body{
        background: #f6eded;
    }
    .container{
        max-width: 992px;
        margin: auto;
        width: 100%;
        padding: 0 15px;
        overflow: auto;
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
        width: 100%;
    }
    table tbody:last-child{
        box-shadow: 0px 1px #850000;
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
    td img{
        width: 90px;
        height: auto;
    }
    th{
        min-width: 3rem;
        font-size:14px;
        padding: 15px 10px;
    }
    td {  
        padding: 10px ;
        font-size:13px;
    }
    .Remove{
        background: #850000;
        color: white;
        padding: 10px ;
        border-radius: 5px; 
        cursor: pointer;
    }
    .Add , #addTotable{
        color: #850000;
        border: 1px solid #850000;
        background: #fff;
        padding: 10px ;
        border-radius: 5px; 
        cursor: pointer;
    }

    #popup{
        background: #fff;
        width: 100%;
        z-index: 9;
        padding: 15px;
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }
    .popup-content {
        background-color: #fefefe;
        margin: auto;
        padding: 0 20px 20px;
        border: 1px solid #888;
        max-width: 500px;
        width: 100%;
    }
    .popup-header{
    position: relative;
    }
    .popup-header span{
        display: flex;
        justify-content: end;
        color: #850000;
        font-size: 24px;
        border-radius: 50%;
        padding: 10px;
        cursor: pointer;
    }
    .input-group label{
        display: block;
        margin-top: 1rem;
    }
    input[type="text"]{
        outline: none;
        border: 1px solid #850000;
        width: -webkit-fill-available;
        padding: 7px;
        border-radius: 10px;
        margin: 1rem 0;
    }
    .input-group:focus-within label {
        color: #850000;
    }
    .btn-group{
        width: fit-content;
        margin: 2rem auto 1rem;
        margin-right: 0;
    }
</style>
</head>
<body>

<body>
    <div class="container">
      <center><h1>Donors Available </h1></center>
        <div id="table-container">
            <table >
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Mobile No</th>
                        <th>Blood Type</th>
                        <th>State</th>
                        <th>district</th>
                    </tr>
                </thead>
                <tbody>
        <?php
            if(isset($_POST['submit']))
            {
                if(isset($_POST['blood_type']) && isset($_POST['state_input']) && isset($_POST['district_input']))
                {
                    $blood_required = $_POST['blood_type'];
                    $state_required = $_POST['state_input'];
                    $district_required = $_POST['district_input'];
        
                    $query = "SELECT name,sex,bloodgroup,mobile_no,email,state,district FROM donors where bloodgroup = '$blood_required' && state = '$state_required' && district = '$district_required' ";
                    $result = mysqli_query($connection,$query);
                    $count = mysqli_num_rows($result);
                    if($count == 0)
                    {
                        echo "<script>alert('Sorry No Donor Available')</script>";
                        header('location:index.html');
                    }
                }
            }
            while($row = mysqli_fetch_array($result))
            {
        ?>
		<tr>
			<td><?php echo $row['name'] ?> </td>
			<td><?php echo $row['sex'] ?></td>
			<td><?php echo $row['bloodgroup'] ?></td>
			<td><?php echo $row['mobile_no'] ?></td>
			<td><?php echo $row['email'] ?></td>
			<td><?php echo $row['state'] ?></td>
			<td><?php echo $row['district'] ?></td>
		</tr>
        <?php
            }
        ?>
	</tbody>
            </table>
        </div>
    </div>
</body>
</html>