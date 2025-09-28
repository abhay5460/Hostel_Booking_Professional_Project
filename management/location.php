<html>
<body>

   <table>
    <tr>
      <td> Hostal Location list</td>
      <td>     
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

  echo "<select name=loc>";
  while ($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['city'] . "'>" . $row['city'] . "</option>";
  }
  echo "</select>";
  
  $conn->close();
  ?>
</td>
</tr>
</table>




         
        </body>
        </html>
        