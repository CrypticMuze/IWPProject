<?php
$con=mysqli_connect("localhost","root","","blood bank");

if(isset($_REQUEST["submit"]))
{
	$hosp_name=$_REQUEST["hosp_name"];
	$state=$_REQUEST["state"];
	$hosp_id=$_REQUEST["hosp_id"];
	$query=mysqli_query($con,"select * from bb_hosp_redg where hosp_name='$hosp_name' && state='$state' && hosp_id='$hosp_id'");
	$rowcount=mysqli_num_rows($query);
	if($rowcount==true)
	{
		header('Location:order_now/index.html');
	}
	else
	{
		echo "OOPS! Looks like your Hospital is not registered with us.";
	}
}
?>	 	