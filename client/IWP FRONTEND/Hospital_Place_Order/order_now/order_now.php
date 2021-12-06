<?php
$hosp_id=filter_input(INPUT_POST,'hosp_id');
$Blood_type=filter_input(INPUT_POST,'Blood_type');
$units=filter_input(INPUT_POST,'units');
$address=filter_input(INPUT_POST,'address');
if(!empty($hosp_id) && !empty($Blood_type) && !empty($units) && !empty($address))  
{
	
		
		$conn=new \mysqli ('localhost','root','','blood bank');
		if(mysqli_connect_error())
		{
			die('Connect Error ('.mysqli_connect_errno().')'
			. mysqli_connect_error());
		}
		else
		{
			$sql="INSERT INTO bb_place_order (hosp_id,Blood_type,units,address)
			values ('$hosp_id','$Blood_type','$units','$address')";
			if($conn->query($sql))
			{
				header('Location:redirect.html');
				
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
