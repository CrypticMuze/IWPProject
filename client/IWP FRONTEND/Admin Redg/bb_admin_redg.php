<?php
$username=filter_input(INPUT_POST,'username');
$password=filter_input(INPUT_POST,'password');
$date_of_birth=filter_input(INPUT_POST,'date_of_birth');
$joining_date=filter_input(INPUT_POST,'joining_date');
$email=filter_input(INPUT_POST,'email');
$phone=filter_input(INPUT_POST,'phone');
$admin_name=filter_input(INPUT_POST,'admin_name');
$address=filter_input(INPUT_POST,'address');
if(!empty($username))
{
	if(!empty($password))
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
			$sql="INSERT INTO bb_admin_redg (admin_name,username,password,date_of_birth,joining_date,email,phone,address)
			values ('$admin_name','$username','$password','$date_of_birth','$joining_date','$email','$phone','$address')";
			if($conn->query($sql))
			{
				echo "New Record is inserted sucessfully";
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
	echo "Password should not be empty";
	die();
	}
}
else
{
	echo "Username should not be empty";
	die();
	
}


?>
