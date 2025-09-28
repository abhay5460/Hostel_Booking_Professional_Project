<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Wallyard concept hostel Admin Panel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">


    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        .submit {
            background:green;
            padding:6px;
            border-radius:5px;
            color:white;
            margin:5px;
            text-align:center;
        }
    </style>
</head>
<body>


<?php 
session_start();
$admin_id=$_SESSION['superid'];
if($admin_id){

}
else{
  header("location:index.php");
}

$conn = mysqli_connect("localhost", "root", "", "hms");


    if (isset($_POST['update'])) {
        $user_id = $_REQUEST['user_id'];
        $room_number =  $_REQUEST['room_number'];
$room_type = $_REQUEST['room_type'];
$Hostelname = $_REQUEST['Hostelname'];
$startDate = $_REQUEST['startDate'];
$endDate = $_REQUEST['endDate'];
$month=$_REQUEST['month'];


        $sql = "UPDATE roomdata SET room_number = '$room_number', room_type = '$room_type', Hostelname = '$Hostelname', startDate = '$startDate', endDate = '$endDate', month = '$month' WHERE id = '$user_id'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

            echo "Record updated successfully.";
            echo "<button style='background-color:green;color:black;'>View Data</button>";


        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['id'])) {

    $user_id = $_GET['id']; 

    $sql = "SELECT * FROM roomdata WHERE id='$user_id'";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $room_number =  $row['room_number'];
            $room_type = $row['room_type'];
            $Hostelname = $row['Hostelname'];
            $startDate = $row['startDate'];
            $endDate = $row['endDate'];
            $month=$row['month'];
            $id = $row['id'];

        } 

    }

    ?>



            <div class="container">
                <div class="bg-light rounded">
                    <div class="row g-0">

                    <div class='mt-4'>
                      
                       <a href="roomdisplay.php" class='submit  ' >View Data</a>
                       
                    </div>

                        <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
                            <div class="d-flex flex-column justify-content-center p-5">
                            <button style='background-color:green;color:black;'>View Data</button>
                                <h1 class="mb-4"> Update Data </h1>

                                 <form action="" method="POST">
                                    <div class="row g-3">
                             <input type="hidden" name="user_id" value="<?php echo $id; ?>">

                                        <div class="col-sm-7">
                                            <div class="form-floating">
                                                <input type="text" class="form-control border-0"  id="room_number"  placeholder="room_number" name="room_number" min="101" max="110"    onKeyUp="if(this.value>110){this.value='110';}else if(this.value<0){this.value='0';}"
                                                 id="yourid"   value="<?php echo $room_number; ?>">
                                                <label for="gname">room_number</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-7 mt-2 mb-2">
                                            <div class="form-floating">
                                            <select name="room_type"  class="form-control">
                                                <option value="">room type</option>
                                            <option value="two"   <?php if($room_type == "two"){ echo "Selected"; } ?>    >2 person</option>
                                            <option value="three"   <?php if($room_type == "three"){ echo "Selected"; } ?>    >3 person</option>
                                            </select>
                                        </div> 
                                       
                                        <div class="col-sm-7 mt-2 mb-2">
                                            <div class="form-floating">
                                             <select name="Hostelname"  class="form-control">
                                                <option value="">Select Hostel</option>
                                                <option value="Samaras Boy's Hostel Ahmedabad"  <?php if($Hostelname == "Samaras Boy's Hostel Ahmedabad"){ echo "Selected"; } ?>    >Samaras Boy's Hostel Ahmedabad</option>
                                                <option value="Shri Ganesh boys hostel" <?php if($Hostelname == "Shri Ganesh boys hostel"){ echo "Selected"; } ?>   >Shri Ganesh boys hostel</option>
                                                <option value="Vishal pg | Boys PG in Ahmedabad" <?php if($Hostelname == "Vishal pg | Boys PG in Ahmedabad"){ echo "Selected"; } ?>   >Vishal pg | Boys PG in Ahmedabad</option>
                                                <option value="Arya Dormitory Hotel" <?php if($Hostelname == "Arya Dormitory Hotel"){ echo "Selected"; } ?>   >Arya Dormitory Hotel</option>
                                                <option value="Shivam hostel, Boys Hostel"  <?php if($Hostelname == "Shivam hostel, Boys Hostel"){ echo "Selected"; } ?>    >Shivam hostel, Boys Hostel</option>
                                                </select>

                                             </div>
                                     </div>



                                         <div class="col-sm-7 mt-2 mb-2">
                                             <div class="form-floating">
                                             <select  name="month" class="form-control">
                                                 <option value="">Select Month</option>
                                                <option value="3Months"  <?php if($month == "3Months"){ echo "Selected"; } ?>  >3 Months (Rs:3000)</option>
                                                <option value="6Months"   <?php if($month == "6Months"){ echo "Selected"; } ?>   >6 Months (Rs:6000)</option>
                                                <option value="12Months"  <?php if($month == "12Months"){ echo "Selected"; } ?>  >12 Months (Rs:12000)</option>
                                                <option value="1Months"  <?php if($month == "1Months"){ echo "Selected"; } ?>  >1 Months (Rs:2000)</option>
                                            </select>
                                             </div>
                                         </div>
                                        
                                    <div class="col-sm-7 mt-2 mb-2">
                                            <div class="form-floating">
                                           <input type="date" name="startDate" value="<?php echo $startDate; ?>" class="form-control">
                                           <label for="cage">start_date</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-7 mt-2 mb-2">
                                            <div class="form-floating">
                                            <input type="date" name="endDate" value="<?php echo $endDate; ?>" class="form-control">
                                                <label for="cage">end_date</label>
                                            </div>
                                        </div>
                                     
                                         <div class="col-12">
                                         <input type="submit" value="Update" class='submit' name="update">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100 rounded" src="img/appointment.jpg" style="object-fit: cover;">
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
 

<sript src="script.js"></script>
        </body>

</html>

    <?php

    } 



?>