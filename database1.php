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
    $name=$_POST['name'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    



   echo $sql="Insert into `studentinfo1`(`name`, `email`, `contact`)
          values('$name','$email','$contact')";
          $sql2=mysqli_query($conn,$sql);

          if($sql2 == true)
          {
            header('location:form.php');
          }
}