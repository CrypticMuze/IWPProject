<?php
$hosp_name=filter_input(INPUT_POST,'hosp_name');
$hosp_address=filter_input(INPUT_POST,'hosp_address');
$state=filter_input(INPUT_POST,'state');
$hosp_phone_no=filter_input(INPUT_POST,'hosp_phone_no');
$police_address=filter_input(INPUT_POST,'police_address');
$police_phone_no=filter_input(INPUT_POST,'police_phone_no');
$pincode=filter_input(INPUT_POST,'pincode');
$police_name=filter_input(INPUT_POST,'police_name');
if(!empty($hosp_name) && !empty($hosp_address) && !empty($state) && !empty($hosp_phone_no) && !empty($police_address) && !empty($police_phone_no) && !empty($pincode) && !empty($police_name))  
{
	
		$host="localhost";
		$dbusername="root";
		$dbpassword="";
		$dbname="blood bank";
		$conn=new \mysqli ('localhost','root','','blood bank');
		if(mysqli_connect_error())
		{
			die('Connect Error ('.mysqli_connect_errno().')'
			. mysqli_connect_error());
		}
		else
		{
			$sql="INSERT INTO bb_hosp_redg (hosp_name,hosp_address,state,hosp_phone_no,pincode,police_name)
			values ('$hosp_name','$hosp_address','$state','$hosp_phone_no','$pincode','$police_name')";
			$sql1="INSERT INTO bb_police_redg(police_name,police_address,police_phone_no)
			values ('$police_name','$police_address','$police_phone_no')";
			$result=mysqli_query($conn,$sql1);
			$count=mysqli_num_rows($result);
			if($conn->query($sql))
			{
				if(count==0)
				{
					$conn->query($sql1);
				}
				
				header('Location:http:/index.html');
			}
			else 
			{
				echo "Error: ". $sql ."<br>".$conn->error;
			}
			$conn->close();
		}
	
}
else
{
	echo "Field should not be empty";
	die();
	
}


?>
