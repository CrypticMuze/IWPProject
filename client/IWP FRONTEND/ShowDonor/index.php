<!DOCTYPE html>
<HTML><Head><title>Show</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="SeaAssAss.css" rel="stylesheet" type="text/css" media="all">
</head>
<style>
body{ 
background-image:url(office1.jpg);}
</style>

<h1><span class="yellow">Our Donors</span></h1>


<table class="container">
	<thead>
		<tr>
			<th><h1>First Name</h1></th>
			<th><h1>Last Name</h1></th>
			<th><h1>Donor ID</h1></th>
			<th><h1>Date of Birth</h1></th>
			<th><h1>Gender</h1></th>
			<th><h1>Email</h1></th>
			<th><h1>Phone Number</h1></th>
			<th><h1>Blood Group</h1></th>
		</tr>
	</thead>
	<?php
	$conn = mysqli_connect("localhost","root","","blood bank");
	if($conn->connect_error)
	{
	die("Connection failed:".$conn->connect_error);
	}
	$sql= "select first_name,last_name,aadhar_no,date_of_birth,gender,email,phone_no,blood_group from bb_donor_redg";
	$result = $conn-> query($sql);
	if($result-> num_rows>0)
	{
	while($row=$result->fetch_assoc())
	 {
	    echo "<tr><td>". $row["first_name"] ."</td><td>". $row["last_name"] ."</td><td>". $row["aadhar_no"] ."</td><td>". $row["date_of_birth"]. "</td><td>". $row["gender"] ."</td><td>". $row["email"] ."</td><td>". $row["phone_no"] ."</td><td>". $row["blood_group"] ."</td></tr>";
	 }
	echo "</table>";
	}
	else 
	{
	echo "0 result";
	}
	$conn-> close();
	
	?>
</table>
</body></html>