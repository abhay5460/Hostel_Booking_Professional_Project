<html>
    <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body>
<?php
 include("navbar.php");
// servername => localhost
// username => root
// password => empty
// database name => staff
$conn = mysqli_connect("localhost", "root", "", "hms");
 
// Check connection
if($conn == false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

 



// Taking all 5 values from the form data(input)
$hostel_name =  $_POST['hostel_name'];
//$last_name = $_REQUEST['last_name'];
//$gender =  $_REQUEST['gender'];
$hostel_description = $_POST['hostel_description'];
$hostel_type = $_POST['hostel_type'];
$hostel_fees = $_POST['hostel_fees'];
$hostel_address = $_POST['hostel_address'];
$city=$_POST['city'];
$owner_name = $_POST['owner_name'];
$owner_email = $_POST['owner_email'];
$owner_password=$_POST['owner_password'];
$owner_mobileno = $_POST['owner_mobileno'];

$targetDir = "C:/xampp/htdocs/Hostel-02-03-2024/management/Imges/";
$targetFile = $targetDir . basename($_FILES["image"]["name"]); 
$tgt=$targetDir.basename($_FILES["food"]["name"]);
$tgh=$targetDir.basename($_FILES["parking"]["name"]);





 


$sql2 = "INSERT INTO hostelowner (owner_name,owner_email,owner_password,owner_mobileno)  VALUES ('$owner_name','$owner_email', '$owner_password','$owner_mobileno')";  

if(mysqli_query($conn, $sql2) )  {

    
    // echo"<h1>congratulations! New  business partner add grow your business!!!!</h1>";
    
        
          
    } else{
        echo "ERROR: Hush! Sorry $sql2. "
            . mysqli_error($conn);
    }




    $sl="select * from hostelowner  order by hostelowner_id desc LIMIT 1"; 
    $rst=mysqli_query($conn,$sl);
    if(mysqli_num_rows($rst)>0)
    {
       while($rw=mysqli_fetch_assoc($rst))
       {
           $id=$rw['hostelowner_id'];
       }
    }
$sql="INSERT INTO `hostel`(`hostel_name`, `hostel_description`, `hostel_type`, `hostel_fees`, `hostel_address`, `city`,`hostelowner_id`,`hostel_photo_path`) VALUES ('$hostel_name','$hostel_description','$hostel_type','$hostel_fees','$hostel_address','$city','$id','$targetFile')";

 
if(mysqli_query($conn,$sql) )  {

    
// echo"<h1>congratulations! New  business partner add grow your business!!!!</h1>";

    
      
} else{
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}



//code for Inserting Images In Images Table
$sel="select * from hostel  order by hostel_id desc LIMIT 1"; 
$rslt=mysqli_query($conn,$sel);
if(mysqli_num_rows($rslt)>0)
{
   while($rww=mysqli_fetch_assoc($rslt))
   {
       $hostel_id=$rww['hostel_id'];
   }
}
 if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)&& move_uploaded_file($_FILES["food"]["tmp_name"],$tgt)&&move_uploaded_file($_FILES["parking"]["tmp_name"], $tgh)) {
        // Insert data into database
        $insertQuery = "INSERT INTO image(hostel_id,hostel_img,food,parking) VALUES ('$hostel_id','$targetFile', '$tgt','$tgh')";
        
        $conn->query($insertQuery);
        echo "<h1>Image and Hostel Added  Successfully..</h1>";
    }
  else{
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}



// $sql = "INSERT INTO hostel(hostel_name,hostel_description,hostel_type,hostel_fees,hostel_address,city,owner_email)  VALUES ($hostel_name, 
//     $hostel_description,$hostel_type,$hostel_fees,$hostel_address,$city,$owner_email)";    

 $sql1 = "INSERT INTO location (location_name)  VALUES ('$city')";
 
 if(mysqli_query($conn, $sql1) )  {

          
 } else{
     echo "ERROR: Hush! Sorry $sql. "
         . mysqli_error($conn);
 }
 


// Close connection
// mysqli_close($con);





?>

<?php

$conn = mysqli_connect("localhost", "root", "", "hms");
 
// Check connection
if($conn == false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$sql="SELECT *  FROM hostel"; 
$result = $conn->query($sql);

echo"<br><br><center><h1>Our business partner</h1></center><br><br>";
echo "<table class= 'table table-dark table-striped table-bordered'>
<tr><th>hostelname</th><th>hosteldescription</th><th>hosteltype</th><th>hostelfees</th><th>hosteladdress</th> </tr>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc())
    {
echo "<tr ><td>$row[hostel_name]</td><td>$row[hostel_description]</td><td>$row[hostel_type]</td><td>$row[hostel_fees]</td><td>$row[hostel_address]</td></tr>";
}
echo "</table>";
}
else {
    echo "0 results";
  }
  $conn->close();
?>
</body>
</html>