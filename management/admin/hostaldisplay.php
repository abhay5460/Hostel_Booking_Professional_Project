




<?php
// require("meun.php");
$conn = mysqli_connect("localhost", "root", "", "hms");
include("navbar.php");
 
?>



<!DOCTYPE html>
<html>
<head>
    <title>Student Database</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body>

    <div class="container mt-2">
        <h1 style='margin-top:3%;'><u>Hostel Details</u></h1><br>
<table class="table table-dark table-striped table-bordered fs-4">
    <thead>
    <tr>
        <th>Hostel Name</th>
    <th>Hostel Description</th>
    <th>Hostel Type</th>
    <th>Hostel Fees</th>
    <th>Hostel Address</th>
    <th>Action</th>
 </tr>
    </thead>
    <tbody>

    
        <?php
               $sql="SELECT *  FROM hostel"; 
               $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?>
                    <tr>
                    <td><?php echo $row['hostel_name']; ?></td>
                    <td><?php echo $row['hostel_description']; ?></td>
                    <td><?php echo $row['hostel_type']; ?></td>
                    <td><?php echo $row['hostel_fees']; ?></td>
                    <td><?php echo $row['hostel_address']; ?></td>
                    
                    <td>
                    <a class="btn btn-danger" href="hostelDelete.php?hostel_id=<?php echo $row['hostel_id']; ?>">Delete</a></td>
                   
                    </tr>
        <?php       }
            }
        ?>
    </tbody>
</table>
    </div>
</body>
</html>