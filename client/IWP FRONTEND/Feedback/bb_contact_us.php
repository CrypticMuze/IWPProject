<?php
$full_name=filter_input(INPUT_POST,'full_name');
$email=filter_input(INPUT_POST,'email');
$phone=filter_input(INPUT_POST,'phone');
$message=filter_input(INPUT_POST,'message');

if(!empty($full_name) && !empty($email) && !empty($phone) && !empty($message))  
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
			$sql="INSERT INTO bb_contact_us (full_name,email,phone,message)
			values ('$full_name','$email','$phone','$message')";
			

			
			if($conn->query($sql))
			{
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
