<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elearning1";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
if(isset($_POST['submit']))
{
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $course=$_POST['course'];
    $course1= implode(",",$course);



  $sql="Insert into `registration`(`firstname`, `lastname`, `email`, `phone`, `address`, `course`)
          values('$firstname','$lastname','$email','$phone','$address','$course1')";
  $sql2=mysqli_query($conn,$sql);

          if($sql2 == true)
          {
            header('location:registration.html');
          }
         
}