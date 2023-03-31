<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

            while($row = mysqli_fetch_array($query_run))
            {
                ?>
                    <form action = "" method = "">
                        <input type="text" name = "name" value = "<?php echo $row['name'] ?>"/>
                        <input type="text" name = "sex" value = "<?php echo $row['sex'] ?>"/>
                        <input type="text" name = "bloodgroup" value = "<?php echo $row['bloodgroup'] ?>"/>
                        <input type="text" name = "mobile_no" value = "<?php echo $row['mobile_no'] ?>"/>
                        <input type="text" name = "email" value = "<?php echo $row['email'] ?>"/>
                        <input type="text" name = "state" value = "<?php echo $row['state'] ?>" />
                        <input type="text" name = "district" value = "<?php echo $row['district'] ?>"/>
                    </form>
                <?php
            }
        }
    }
    ?>
</body>
</html>