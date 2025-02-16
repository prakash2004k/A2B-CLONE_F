<?php
if(!isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $con=mysqli_connect("localhost","root","","project");
    $sql="SELECT * from register WHERE username='$username' AND password='$password' ";
    $result=mysqli_query($con,$sql);
    $resultcheck=mysqli_num_rows($result);
    if($resultcheck>0)
    {
        echo "<script>alert('login successfull');window.location='index.html';</script>";
    }
    else{
        echo "<script>alert('UserId or password missmatch');window.location = 'login.html';</script>";
    }
}
?>