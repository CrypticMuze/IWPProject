<?php
$needles=filter_input(INPUT_POST,'needles');
$beds=filter_input(INPUT_POST,'beds');
$cotton=filter_input(INPUT_POST,'cotton');
$blood_container=filter_input(INPUT_POST,'blood_container');
$company_name=filter_input(INPUT_POST,'company_name');
$merchant_id=filter_input(INPUT_POST,'merchant_id');
$dd_cheque_no=filter_input(INPUT_POST,'dd_cheque_no');
$payment_mode=filter_input(INPUT_POST,'payment_mode');
$drawn_on=filter_input(INPUT_POST,'drawn_on');
$payable_at=filter_input(INPUT_POST,'payable_at');
if(!empty($needles) && !empty($beds) && !empty($cotton) && !empty($blood_container) && !empty($company_name) && !empty($drawn_on) && !empty($merchant_id) && !empty($dd_cheque_no) && !empty($payment_mode) && !empty($payable_at))
	
{
	
		
		$conn=new \mysqli ('localhost','root','','blood bank');
		if(mysqli_connect_error())
		{
			die('Connect Error ('.mysqli_connect_errno().')'
			. mysqli_connect_error());
		}
		else
		{
			$sql="INSERT INTO bb_stocks (needles,beds,cotton,blood_container)
			values ('$needles','$beds','$cotton','$blood_container')";
			
			$result=mysqli_query($conn,$sql1);
			$count=mysqli_num_rows($result);
			if($conn->query($sql))
			{
				$sql2="select order_id from bb_stocks where needles='$needles' and beds='$beds' and cotton='$cotton' and blood_container='$blood_container'";
				$result=mysqli_query($conn,$sql2);
			    $count=mysqli_num_rows($result);
				
				if(count==0)
				{
					$rowdata=mysqli_fetch_assoc($result);
				     $sql1="INSERT INTO bb_suppliers (order_id,company_name,merchant_id,dd_cheque_no,payment_mode,drawn_on,payable_at)
			        values ('$rowdata[order_id]','$company_name','$merchant_id','$dd_cheque_no','$payment_mode','$drawn_on','$payable_at')";
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
