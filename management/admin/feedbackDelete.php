<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        button:hover{
            cursor:pointer;
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


if (isset($_GET['feedback_id'])) {

    $user_id = $_GET['feedback_id'];

    $sql = "DELETE FROM  feedback WHERE feedback_id  ='$user_id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

  
        echo "<div style='border:2px solid black;width:50%;text-align:center;padding:10px;margin-left:23%;'><h1>Record deleted successfully.</h1><br>";
        echo "<a style='background-color:green;color:black;border:2px solid black;' href='feedback_main.php'>View Data</a></div>";


    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>
<script src="script.js"></script>
</body>
</html>