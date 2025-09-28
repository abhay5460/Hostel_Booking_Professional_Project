<html>
    <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

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
$location_name =  $_REQUEST['location_name'];
//$last_name = $_REQUEST['last_name'];
//$gender =  $_REQUEST['gender'];

// Performing insert query execution
// here our table name is college
$sql = "INSERT INTO location (location_name)  VALUES ('$location_name' 
    )";    


  
     

 
if(mysqli_query($conn, $sql) )  {

    
echo"<h1>congratulations! New  business partner add grow your business!!!!</h1>";

    
      
} else{
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}


// Close connection
// mysqli_close($con);





?>

