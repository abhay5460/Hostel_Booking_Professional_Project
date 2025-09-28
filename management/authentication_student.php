<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Booking Site</title>
          <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <style>
         body {
  font-family: sans-serif;
  text-align: center;
}
button {
  background-color: cadetblue;
  color: whitesmoke;
  border: 0;
  -webkit-box-shadow: none;
  box-shadow: none;
  font-size: 18px;
  font-weight: 500;
  border-radius: 7px;
  padding: 15px 35px;
  cursor: pointer;
  white-space: nowrap;
  margin: 10px;
}
input[type="text"] {
  padding: 12px 20px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-sizing: border-box;
}
h1 {
  border-bottom: solid 2px grey;
}
#success {
  background: green;
}
#error {
  background: red;
}
#warning {
  background: coral;
}


    </style>

</head>
<body>

<?php
 session_start();
            
 $id= $_SESSION['uname'];
 if($id=="user"){
 }
  else{
    header("location:index.php");
 
  }

$con = mysqli_connect("localhost", "root", "", "hms");
 
// Check connection
if($con == false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        // //to prevent from mysqli injection  
        // $username = stripcslashes($username);  
        // $password = stripcslashes($password);  
        // $username = mysqli_real_escape_string($con, $username);  
        // $password = mysqli_real_escape_string($con, $password);  
        // session_start();

?>

<?php   

$sel="select * from hostel,payment,student where hostel.hostel_id = (select hostel_id from student where username='".$username."') and payment.student_id= (select student_id from student where username='".$username."')";
$finalpunch=mysqli_query($con,$sel);
if(mysqli_num_rows($finalpunch)>0)
{ 
?>
  <nav class="navbar navbar-expand-lg bg-secondary navbar-light sticky-top px-4 px-lg-5 py-lg-0">
  <a href="index.php" class="navbar-brand">
  <img style='width:100%; height:100px; ' src="https://img.freepik.com/free-vector/editable-hotel-logo-vector-business-corporate-identity-hostel_53876-111553.jpg" alt="">
 
  </a>
  <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav mx-auto">
          <div class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle mt-2 text-primary " data-bs-toggle="dropdown">Student Infomation</a>
              <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                  <a href="feedback.php" class="dropdown-item"> Feedback</a>
                <!--  <a href="team.html" class="dropdown-item">Popular Teachers</a>
                  <a href="call-to-action.html" class="dropdown-item">Become A Teachers</a>-->
                 
                  <!--<a href="testimonial.html" class="dropdown-item">Testimonial</a>
                  <a href="404.html" class="dropdown-item">404 Error</a>-->
              </div>
          </div>

          <a href="session_logout_student.php" class="nav-item nav-link text-primary mt-2">Student Logout</a>
<button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Cancel Booking
    </button>

      </div>
  </div>
</nav>
<?php
        $sql = "select * from registiontable where username = '$username'  and binary password1 ='$password' ";  
        $result = mysqli_query($con, $sql);  
    
        $count = mysqli_num_rows($result);  
          
          if($count == 1)
          {  
                // echo "<h1 style='font-family:rockwell;'><center> Login successful </center></h1>";
                $sql="SELECT *  FROM student where username='".$username."'"; 
                $sel="select * from hostel,payment,student where hostel.hostel_id = (select hostel_id from student where username='".$username."') and payment.student_id= (select student_id from student where username='".$username."')";
                $result = $con->query($sql);
                $rslt=$con->query($sel);
                
                echo "<table class='table table-striped' >
             ";
                
                if ($result->num_rows > 0 && $rslt->num_rows > 0) {
                    // output data of each row 
                    while($row = $result->fetch_assoc())
                    {
                      $_SESSION['stuid']=$row['student_id'];
                echo "
        
        
                <tr>   <th> Image </th><td><img  style='width: 150px; height: 150px;' src='$row[image]'> </td>   </tr>
        
        
            <tr>   <th> Student Name <td>$row[student_name]</td> </th>  </tr>
            <tr>    <th>  Parents No <td>$row[parents_no]</td></th> </tr>
            <tr>     <th>  Gender <td>$row[Gander]</td></th> </tr>
            <tr>    <th>  Date_of_brith  <td>$row[Date_of_brith]</td></th> </tr>
                
            <tr>    <th>  Address <td>$row[Address1]</td></th> </tr>
            <tr>   <th>  City <td>$row[city1]</td></th> </tr>
            <tr>    <th> Pincode <td>$row[pincode]</td></th> </tr>
            <tr><th>College Name</th><td>$row[college_name]</td></tr>
                
                ";
                }
    
              if($rw=$rslt->fetch_assoc()){
                $_SESSION['hostelid']=$rw['hostelowner_id'];
                // echo "<h1>$rw[hostelowner_id]</h1>";
                echo "
                <tr><th>Your Paid Amount<td>$rw[payment_amount]</td></th></tr>
                <tr><th>Hostel Name<td>$rw[hostel_name]</td></th></tr>
                ";
        
              }
        }
    }  
  else{  
             
                header("Location:validation.php");
      }  
       
      $con->close();
}
else
{
  $sql="select * from hostel,student where student.username='$username' and student.hostel_id=hostel.hostel_id";
  $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_assoc($result)){
        $stu_id=$row['student_id'];
        $stu_name=$row['student_name'];
        $hostel_id=$row['hostel_id'];
    $_SESSION['id']=$hostel_id;
    $_SESSION['stu_id']=$stu_id;
    $_SESSION['rno']="username";
      }
      // echo "<h1>success,id->$stu_id,name->$stu_name,hid->$hostel_id</h1>";
    }else{
      header("Location:validation.php");
    }
    
  echo " <div class='box' style='margin-left:5rem;margin-right:5rem;box-sizing:border-box;border:2px solid black;padding:3rem;margin-top:8rem;background-color:lightgrey ;'>
  <h2 style='font-family:Rockwell;font-size:40px;color:red;'> You are a Registered User,So please logout</h2>
<p style='margin-left:5%;font-size:30px;padding:1rem;font-family:rockwell;'>or Start Booking process By Clicking on Below button</p>
<table style='margin-left:84%;'><tr><td><a class='' style='border:2px solid;font-size:large;color:black;background-color:grey;padding:5px;border-radius:3px;' href='session_logout_student.php'>Log out</a></td><td>
<a class='' style='border:2px solid;font-size:large;color:black;background-color:grey;padding:5px;border-radius:3px;' href='room.php'>Book Now</a></td></tr></table></div>";
}     

    ?>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Cancel Booking</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
				
			 <form action="CancelBooking.php" class='mt-3 mb-3' method="post">
			<label for="email">Enter your name:</label>
			<input type="text" id="email" name="email" disabled value=<?php echo $username;?> required><br><br>
			<button  type="reset" id="success" data-bs-dismiss="modal">Cancel Booking</button>
			</form>

    </div>
  </div>
</div>


<script>
// Alert Modal Type
$(document).on('click', '#success', function(e) {
			swal(
				'Success',
				'your Hostel Booking cancel <b style="color:green;">successfully </b> !',
				'success'
			)
		});
        $(document).on('click', '#error', function(e) {
			swal(
				'Error!',
				'You clicked the <b style="color:red;">error</b> button!',
				'error'
			)
		});

		$(document).on('click', '#warning', function(e) {
			swal(
				'Warning!',
				'You clicked the <b style="color:coral;">warning</b> button!',
				'warning'
			)
		});

		$(document).on('click', '#info', function(e) {
			swal(
				'Info!',
				'You clicked the <b style="color:cornflowerblue;">info</b> button!',
				'info'
			)
		});

		$(document).on('click', '#question', function(e) {
			swal(
				'Question!',
				'You clicked the <b style="color:grey;">question</b> button!',
				'question'
			)
		});

	// Alert With Custom Icon and Background Image
		$(document).on('click', '#icon', function(event) {
			swal({
				title: 'Custom icon!',
				text: 'Alert with a custom image.',
				imageUrl: 'https://image.shutterstock.com/z/stock-vector--exclamation-mark-exclamation-mark-hazard-warning-symbol-flat-design-style-vector-eps-444778462.jpg',
				imageWidth: 200,
				imageHeight: 200,
				imageAlt: 'Custom image',
				animation: false
			})
		});

		$(document).on('click', '#image', function(event) {
			swal({
				title: 'Custom background image, width and padding.',
				width: 700,
				padding: 150,
				background: '#fff url(https://image.shutterstock.com/z/stock-vector--exclamation-mark-exclamation-mark-hazard-warning-symbol-flat-design-style-vector-eps-444778462.jpg)'
			})
		});

	// Alert With Input Type
		$(document).on('click', '#subscribe', function(e) {
			swal({
			  title: 'Submit email to subscribe',
			  input: 'email',
			  inputPlaceholder: 'Example@email.xxx',
			  showCancelButton: true,
			  confirmButtonText: 'Submit',
			  showLoaderOnConfirm: true,
			  preConfirm: (email) => {
			    return new Promise((resolve) => {
			      setTimeout(() => {
			        if (email === 'example@email.com') {
			          swal.showValidationError(
			            'This email is already taken.'
			          )
			        }
			        resolve()
			      }, 2000)
			    })
			  },
			  allowOutsideClick: false
			}).then((result) => {
			  if (result.value) {
			    swal({
			      type: 'success',
			      title: 'Thank you for subscribe!',
			      html: 'Submitted email: ' + result.value
			    })
			  }
			})
		});

	// Alert Redirect to Another Link
		$(document).on('click', '#link', function(e) {
		    swal({
				title: "Are you sure?", 
				text: "You will be redirected to https://utopian.io", 
				type: "warning",
				confirmButtonText: "Yes, visit link!",
				showCancelButton: true
		    })
		    	.then((result) => {
					if (result.value) {
					    window.location = 'https://utopian.io';
					} else if (result.dismiss === 'cancel') {
					    swal(
					      'Cancelled',
					      'Your stay here :)',
					      'error'
					    )
					}
				})
		});

</script>
</body>
</html>
