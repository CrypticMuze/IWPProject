<?php
$aadhar_no=filter_input(INPUT_POST,'aadhar_no');
$first_name=filter_input(INPUT_POST,'first_name');
$last_name=filter_input(INPUT_POST,'last_name');
$date_of_birth=filter_input(INPUT_POST,'date_of_birth');
$gender=filter_input(INPUT_POST,'gender');
$email=filter_input(INPUT_POST,'email');
$phone_no=filter_input(INPUT_POST,'phone_no');
$blood_group=filter_input(INPUT_POST,'blood_group');
$Thalassemia=filter_input(INPUT_POST,'Thalassemia');
$Anemia=filter_input(INPUT_POST,'Anemia');
$Renal_Failure=filter_input(INPUT_POST,'Renal_Failure');
$Rheumatoid_Disease=filter_input(INPUT_POST,'Rheumatoid_Disease');
if(!empty($first_name) && !empty($last_name) && !empty($date_of_birth) && !empty($gender) && !empty($email) && !empty($phone_no) && !empty($blood_group) && !empty($Thalassemia) && !empty($Anemia) && !empty($Renal_Failure) && !empty($Rheumatoid_Disease) && !empty($aadhar_no))  
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
			$sql="INSERT INTO bb_donor_redg (aadhar_no,first_name,last_name,date_of_birth,gender,email,phone_no,blood_group)
			values ('$aadhar_no','$first_name','$last_name','$date_of_birth','$gender','$email','$phone_no','$blood_group')";
			$sql1="INSERT INTO bb_diseases (aadhar_no,Thalassemia,Anemia,Renal_Failure,Rheumatoid_Disease)
			        values ('$aadhar_no','$Thalassemia','$Anemia','$Renal_Failure','$Rheumatoid_Disease')";
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
