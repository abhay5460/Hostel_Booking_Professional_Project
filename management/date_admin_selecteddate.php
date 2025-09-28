<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<a href="session_logout.php" class="nav-item nav-link float-end" style="margin-left:90px;margin-right:2rem;background-color:rgb(255,99,71);color:white;box-sizing:border-box;border:2px solid black;padding:5px;border-radius:8px;font-size:15px;">Logout</a>    
<?php
  session_start();
  $owner= $_SESSION['ownerid'];
  if($owner){
}
 else{
   header("location:loginpagemain.php");
 }

 ?>   
<div class="container mt-3">
        
    <?php
        $mvalue=$_POST['dates'];
        if($mvalue=='3months')
        {
            $conn = mysqli_connect("localhost", "root", "", "hms");
            $today_date=Date('Y-m-d');
            $qry="SELECT * FROM roomdata,hostel,student where roomdata.hostel_id=hostel.hostel_id and roomdata.student_id=student.student_id and hostel.hostelowner_id = $owner and roomdata.startDate < '$today_date' order by startDate asc";
            $result=mysqli_query($conn,$qry);
            $today_date=Date('Y-m-d');
            $sr=0;
            if(mysqli_num_rows($result)>0)
            {
                echo "<table class='table' style='border-top:2px solid;'>
                <thead><tr><th>Sr.No</th>    
                <th>Room Number</th>
                <th>Room Type</th>
                <th>Student Name</th>
                <th>Duration</th>
                <th>Start Date</th><th>Today Date</th><th>End Date</th><th>Remaining Days</th>                <th>Manage </th></tr></thead><tbody>";
               
                    while($row=mysqli_fetch_Assoc($result))
                    {   
                        if($row['duration']=="3months")
                        {
                            $date = $row['startDate'];
                            $dura=$row['duration'];
            
                            $month=Date('m',strtotime($date));
                            $day=Date('d',strtotime($date));
                            $year=Date('y',strTotime($date));
                            $year= "20$year";  
                            $start_date= "$year-$month-$day";
                            if( $month==10 || $month==12 || $month==11)
                            {
                                $year=$year+01;
                                if($month==10) { $m="01"; }

                                elseif($month==11){ $m="02"; }
    
                                else { $m="03"; }
                            }
                            else{
                                $m=$month+"03";
                            }
                            // $effective_date=strtotime(date("Y-m-d",strtotime($start_Date))."+3 months");
                            // $ye=date('Y-m-d',$effective_date);
                            // echo "$ye";
                            $End_date="$year-$m-$day";
                            if($today_date > $start_date )
                            {
                                $d= new DateTime($today_date);
                                $d1= new DateTime($End_date);
                                $interval=$d->diff($d1);
                                $mahina=Date('m',strtotime($today_date));
                                if($interval->m == 0 && $interval->y==0 && ($interval->d == 15 || $interval->d < 15 && $mahina < $month))
                                {
                                    $sr++;
            ?>                          <tr><td><?php echo $sr ?></td>    
                                        <td><?php echo $row['room_number']; ?></td>
                                        <td><?php echo $row['room_type']; ?></td>
                                        <td><?php echo $row['student_name']?></td>
                                        <td><?php echo $row['duration']; ?></td>
    <?php                               
                                       echo "<td>$start_date</td>";
                                       echo "<td>$today_date</td>";
                                       echo "<td>$End_date</td>";
                        
                                       $new=Date('d',strtotime($today_date));
                                     
                                    if($interval->d==15){
                                    echo "<td>15 Day</td>";}
                                    if($interval->d < 15){
                                        if($day < $new){
                                            echo "<td>Expired</td>";
                                        }
                                        elseif($day == $new){
                                            echo "<td>Last Day</td>";
                                        }
                                        elseif($day > $new){
                                            $n=$day-$new;
                                            echo "<td>$n day's</td>";}
                                    }
                                    
                                   
    ?>                                <td>
                                    <a class='btn btn-info' href='update.php?id=<?php echo $row['id']; ?>' style='width:90%;'>Edit</a></td></tr>
    <?php                        }
                                  elseif($today_date>$End_date)
                                  {
                                      $d= new DateTime($today_date);
                                      $d1= new DateTime($End_date);
                                      $interval=$d->diff($d1);
                                      $sr++;
      ?>                              <tr><td><?php echo $sr ?></td>    
                                      <td><?php echo $row['room_number']; ?></td>
                                      <td><?php echo $row['room_type']; ?></td>
                                      <td><?php echo $row['student_name']?></td>
                                      <td><?php echo $row['duration']; ?></td>
                                      <td><?php echo $start_date; ?></td>
                                      <td><?php echo $today_date ;?></td>
                                      <td><?php echo $End_date; ?></td>
      <?php 
                                      if($interval->d == 0)
                                      {
                                          echo "<td>Expired</td>";
                                      }
                                      else{
                                          echo "<td>Expired $interval->d days</td>";
                                      }
      ?>
                                     <td>
                                      <a class='btn btn-info' href='update.php?id=<?php echo $row['id']; ?>' style='width:90%;'>Edit</a></td></tr>
      <?php                       }
                                else { }
                          
                                    
                            }
                          
                      
                        }
                    }
                    require("main1.php");
                    echo "<br><h4 style='display:inline;'><u>Room 3months Detail's</u></h4>";
            }
        }
        if($mvalue=="6months")
        { 
            $today_date=Date('Y-m-d');
            $conn = mysqli_connect("localhost", "root", "", "hms");
            $qry="SELECT * FROM roomdata,hostel,student where roomdata.hostel_id=hostel.hostel_id and roomdata.student_id=student.student_id and hostel.hostelowner_id = $owner and roomdata.startDate < '$today_date' order by startDate asc";
            $result=mysqli_query($conn,$qry);
             $sr=0;
            if(mysqli_num_rows($result)>0)
            {
                echo "<table class='table' style='border-top:2px solid;'>
                <thead><tr><th>Sr.No</th>    
                <th>Room Number</th>
                <th>Room Type</th>
                <th>Student Name</th>
                <th>Duration</th>
                <th>Start Date</th><th>Today Date</th><th>End Date</th><th>Remaining Days</th>                <th>Manage </th></tr></thead><tbody>";
               
                    while($row=mysqli_fetch_Assoc($result))
                    {   
                        if($row['duration']=="6months")
                        {
                            $date = $row['startDate'];
                            $dura=$row['duration'];
            
                            $month=Date('m',strtotime($date));
                            $day=Date('d',strtotime($date));
                            $year=Date('y',strTotime($date));
                            $year= "20$year";  
                            $start_date= "$year-$month-$day";
                            if($month==12 || $month==10 || $month==11|| $month==7|| $month==8|| $month==9)
                            {
                                $year=$year+01;
                                if($month==10) { $m="04"; }
    
                                elseif($month==11){ $m="05"; }
                                elseif($month==7){ $m="01"; }
                                elseif($month==8){ $m="02"; }
                                elseif($month==9){ $m="03"; }
    
                                else { $m="06"; }
                            }
     
                      
                            else{
                                $m=$month+"06";
                            }
                            // $effective_date=strtotime(date("Y-m-d",strtotime($start_Date))."+3 months");
                            // $ye=date('Y-m-d',$effective_date);
                            // echo "$ye";   
                            $End_date="$year-$m-$day";
                            if($today_date>$start_date)
                            {
                                $d= new DateTime($today_date);
                                $d1= new DateTime($End_date);
                                $interval=$d->diff($d1);
                                $mahina=Date('m',strtotime($today_date));
                            if($interval->m == 0 && $interval->y==0 && ($interval->d == 15 || $interval->d < 15 && $mahina < $month))
                                {
                                    $sr++;
            ?>                          <tr><td><?php echo $sr ?></td>    
                                        <td><?php echo $row['room_number']; ?></td>
                                        <td><?php echo $row['room_type']; ?></td>
                                        <td><?php echo $row['student_name']?></td>
                                        <td><?php echo $row['duration']; ?></td>
    <?php                               
                                       echo "<td>$start_date</td>";
                                       echo "<td>$today_date</td>";
                                       echo "<td>$End_date</td>";
                        
                                       $new=Date('d',strtotime($today_date));
                                     
                                    if($interval->d==15){
                                    echo "<td>15 Day</td>";}
                                    if($interval->d < 15){
                                        if($day < $new){
                                            echo "<td>Expired</td>";
                                        }
                                        elseif($day == $new){
                                            echo "<td>Last Day</td>";
                                        }
                                        elseif($day > $new){
                                            $n=$day-$new;
                                            echo "<td>$n day's</td>";}
                                    }
                                    
                                   
    ?>                                <td>
                                    <a class='btn btn-info' href='update.php?id=<?php echo $row['id']; ?>' style='width:90%;'>Edit</a></td></tr>
    <?php                       }
                                elseif($today_date>$End_date)
                                {
                                    $d= new DateTime($today_date);
                                    $d1= new DateTime($End_date);
                                    $interval=$d->diff($d1);
                                    $sr++;
    ?>                              <tr><td><?php echo $sr ?></td>    
                                    <td><?php echo $row['room_number']; ?></td>
                                    <td><?php echo $row['room_type']; ?></td>
                                    <td><?php echo $row['student_name']?></td>
                                    <td><?php echo $row['duration']; ?></td>
                                    <td><?php echo $start_date; ?></td>
                                    <td><?php echo $today_date ;?></td>
                                    <td><?php echo $End_date; ?></td>
    <?php 
                                    if($interval->d == 0)
                                    {
                                        echo "<td>Expired</td>";
                                    }
                                    else{
                                        echo "<td>Expired $interval->d days</td>";
                                    }
    ?>
                                   <td>
                                    <a class='btn btn-info' href='update.php?id=<?php echo $row['id']; ?>' style='width:90%;'>Edit</a></td></tr>
    <?php                       }
                                else { }
                        
                            }
                           

                              
                        }
                    }
                    require("main1.php");
                    echo "<br><h4 style='display:inline;'><u>Room 6months Detail's</u></h4>";
            }
        }
        if($mvalue=="12months")
        {
            $today_date=Date('Y-m-d');
            $conn = mysqli_connect("localhost", "root", "", "hms");
            $qry="SELECT * FROM roomdata,hostel,student where roomdata.hostel_id=hostel.hostel_id and roomdata.student_id=student.student_id and hostel.hostelowner_id = $owner and roomdata.startDate < '$today_date' order by startDate asc";
            $result=mysqli_query($conn,$qry);
            $sr=0;
            if(mysqli_num_rows($result)>0)
            {
                echo "<table class='table' style='border-top:2px solid;'>
                <thead><tr><th>Sr.No</th>    
                <th>Room Number</th>
                <th>Room Type</th>
                <th>Student Name</th>
                <th>Duration</th>
                <th>Start Date</th><th>Today Date</th><th>End Date</th><th>Remaining Days</th>                <th>Manage </th></tr></thead><tbody>";
                    while($row=mysqli_fetch_Assoc($result))
                    {   
                        if($row['duration']=="12months")
                        {
                            $date = $row['startDate'];
                            $dura=$row['duration'];
            
                            $month=Date('m',strtotime($date));
                            $day=Date('d',strtotime($date));
                            $year=Date('y',strTotime($date));
                            $year= "20$year";  
                            $start_date= "$year-$month-$day";
                           $year=$year+01;
                            // $effective_date=strtotime(date("Y-m-d",strtotime($start_Date))."+3 months");
                            // $ye=date('Y-m-d',$effective_date);
                            // echo "$ye";
                            $End_date="$year-$month-$day";
                            if($today_date>$start_date)
                            {
                                $d= new DateTime($today_date);
                                $d1= new DateTime($End_date);
                                $interval=$d->diff($d1);
                                $mahina=Date('m',strtotime($today_date));
                                if($interval->m == 0 && $interval->y==0 && ($interval->d == 15 || $interval->d < 15 && $mahina < $month))
                                {
                                    $sr++;
            ?>                          <tr><td><?php echo $sr ?></td>    
                                        <td><?php echo $row['room_number']; ?></td>
                                        <td><?php echo $row['room_type']; ?></td>
                                        <td><?php echo $row['student_name']?></td>
                                        <td><?php echo $row['duration']; ?></td>
    <?php                               
                                       echo "<td>$start_date</td>";
                                       echo "<td>$today_date</td>";
                                       echo "<td>$End_date</td>";
                        
                                       $new=Date('d',strtotime($today_date));
                                      
                                       if($interval->d < 15){
                                        $new=Date('d',strtotime($today_date));
                                        if($day<$new){
                                            echo "<td>Expired</td>";
                                        }
                                        elseif($day == $new){
                                            echo "<td>Last Day</td>";
                                        }
                                        elseif($day > $new){
                                            $n=$day-$new;
                                            echo "<td>$n day</td>";}
                                    }
                                    
                                   
    ?>                                <td>
                                    <a class='btn btn-info' href='update.php?id=<?php echo $row['id']; ?>' style='width:90%;'>Edit</a></td></tr>
    <?php                        }
                                elseif($today_date>$End_date)
                                  {
                                      $d= new DateTime($today_date);
                                      $d1= new DateTime($End_date);
                                      $interval=$d->diff($d1);
                                      $sr++;
      ?>                              <tr><td><?php echo $sr ?></td>    
                                      <td><?php echo $row['room_number']; ?></td>
                                      <td><?php echo $row['room_type']; ?></td>
                                      <td><?php echo $row['student_name']?></td>
                                      <td><?php echo $row['duration']; ?></td>
                                      <td><?php echo $start_date; ?></td>
                                      <td><?php echo $today_date ;?></td>
                                      <td><?php echo $End_date; ?></td>
      <?php 
                                      if($interval->d == 0)
                                      {
                                          echo "<td>Expired</td>";
                                      }
                                      else{
                                          echo "<td>Expired $interval->d days</td>";
                                      }
      ?>
                                     <td>
                                      <a class='btn btn-info' href='update.php?id=<?php echo $row['id']; ?>' style='width:90%;'>Edit</a></td></tr>
      <?php                       }
                                else { }
                             
                            }
                          
                           
                       
                        }
                
                    }
                    require("main1.php");
                    echo "<br><h4 style='display:inline;'><u>Room 12months Detail's</u></h4>";
            }
        }
        echo "<span style='width:15%;font-size:12px;'>
        <form  action='date_admin_selecteddate.php' method='post' style='display:inline;'>
            <label for='dte' style='margin-left:45%;'><h6>Select Choice's:</h6></label>
        <select  name='dates' id='dte' style='border-radius:3px;border:2px solid;font-size:12px;width:120px;' required>
            <option value=''></option>
            <option value='3months'required>3months</option>
            <option value='6months'required>6months</option>
            <option value='12months' required>12months</option>
        </select>
        <input type = 'submit' value='view' style='border-radius:3px;border:1px solid;color:black;'>
        </form></span><br>
            </tbody>"; 
            echo "<br>";
        ?>
    </tbody>
</table>
</div>
<script src="script.js"></script>
</body>
</html>