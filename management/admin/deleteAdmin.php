<?php 

// $conn = mysqli_connect("localhost", "root", "", "hms");


// if (isset($_GET['id'])) {

//     $user_id = $_GET['id'];

//     $sql = "DELETE FROM adminlogin WHERE hostalid ='$user_id'";

//      $result = $conn->query($sql);

//      if ($result == TRUE) {

//         echo "Record deleted successfully.";

//     }else{

//         echo "Error:" . $sql . "<br>" . $conn->error;

//     }

// } 

?>

<?php 

$conn = mysqli_connect("localhost", "root", "", "hms");


if (isset($_GET['hostalid'])) {

    $user_id = $_GET['hostalid'];

    $sql = "DELETE FROM  adminlogin WHERE hostalid ='$user_id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>

