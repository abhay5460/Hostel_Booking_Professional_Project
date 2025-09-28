<?php   

$con = mysqli_connect("localhost", "root", "", "hms");
 
// Check connection

//session_start();
$con = mysqli_connect("localhost", "root", "", "hms");
 
// Check connection
if($con == false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
        session_start();

         
        $sql = "update registiontable  set  password1 = '$password' where username = '$username'";  
       
        $result = mysqli_query($con, $sql);  
        //$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        //$count = mysqli_num_rows($result);  
        echo"your Password is change";
          include("student_main_Login.php");
       
               
        $con->close();
?>