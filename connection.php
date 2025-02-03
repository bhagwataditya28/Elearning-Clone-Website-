6['
<?php
$conn=mysqli_connect('localhost','root','','elearning1');
if(!$conn){
    die('Connection Failed: '.mysqli_connect_error());
}


echo ('connected');
?>