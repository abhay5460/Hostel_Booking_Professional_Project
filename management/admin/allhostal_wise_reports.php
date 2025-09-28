<form action="locationmain.php" method="post">
    <?php

    /* $servername = "localhost";
     $username = "root";
     $password = " ";
     $dbname = "hms";*/
     
     // Create connection
     $conn = mysqli_connect("localhost", "root", "", "hms");
     
     // Check connection
     if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
     }
     
     $sql = "SELECT  DISTINCT city FROM  hostel";
     
     $result = $conn->query($sql);
     
     echo "<select class='form-control ' name=loc>";
     echo "<option class='form-control '>Select Hostel</option>" ;

     while ($row = $result->fetch_assoc()) {
       echo "<option  value='" . $row['city'] . "'>" . $row['city'] . "</option>";
     }
     echo "</select>";
     
     $conn->close();
     ?>
     <input  type="submit" class='bg-secondary text-center px-5 rounded-3 mt-4 mb-4 border-0 p-1 ' name="submit">
    </from>
    
  