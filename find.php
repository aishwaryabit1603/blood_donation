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
</head>
<body>
<?php
    if(isset($_POST['submit']))
    {
        if(isset($_POST['blood_type']) && isset($_POST['state_input']) && isset($_POST['district_input']))
        {
            $blood_required = $_POST['blood_type'];
            $state_required = $_POST['state_input'];
            $district_required = $_POST['district_input'];

            $query = "SELECT name,sex,bloodgroup,mobile_no,email,state,district FROM donors where bloodgroup = '$blood_required' && state = '$state_required' && district = '$district_required' ";
            $query_run = mysqli_query($connection,$query);
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile No</th>
                    <th>State</th>
                    <th>district</th>
                    <th>Blood Type</th>
                </tr>
                <?php
                    while($row = mysqli_fetch_assoc($query_run))
                    {
                ?>
                    <tr>
                        <td><?php echo $row['name']; ?> </td>
                        <td><?php echo $row['bloodgroup']; ?></td>
                        <td><?php echo $row['mobile_no']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['state']; ?></td>
                        <td><?php echo $row['district']; ?></td>
                    </tr>
                <?php
                    }    
                ?>
            </table>
        }
    }
?>
</body>
</html>