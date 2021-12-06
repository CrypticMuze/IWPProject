<?php
$con=mysqli_connect("localhost","root","","blood bank");

if(isset($_REQUEST["submit"]))
{
	$username=$_REQUEST["username"];
	$password=$_REQUEST["password"];
	$query=mysqli_query($con,"select * from bb_admin_redg where username='$username' && password='$password'");
	$rowcount=mysqli_num_rows($query);
	if($rowcount==true)
	{
		header('Location:http:/ShowBloodOrder/Index.php');
	}
	else
	{
		echo "Your Username and Password is Incorrect";
	}
}
?>	 	