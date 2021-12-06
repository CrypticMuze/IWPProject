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

<h1><span class="yellow">Our Employees</pan></h1>


<table class="container">
	<thead>
		<tr>
			<th><h1>Name</h1></th>
			<th><h1>Employee ID</h1></th>
			<th><h1>Date of Birth</h1></th>
			<th><h1>Joining Date</h1></th>
			<th><h1>Email</h1></th>
			<th><h1>Contact No.</h1></th>
			<th><h1>Address</h1></th>
		</tr>
	</thead>
	<?php
	$conn = mysqli_connect("localhost","root","","blood bank");
	if($conn->connect_error)
	{
	die("Connection failed:".$conn->connect_error);
	}
	$sql= "select admin_name,ID,date_of_birth,joining_date,email,phone,address from bb_admin_redg";
	$result = $conn-> query($sql);
	if($result-> num_rows>0)
	{
	while($row=$result->fetch_assoc())
	 {
	    echo "<tr><td>". $row["admin_name"] ."</td><td>". $row["ID"] ."</td><td>". $row["date_of_birth"]. "</td><td>". $row["joining_date"] ."</td><td>". $row["email"] ."</td><td>". $row["phone"] ."</td><td>". $row["address"] ."</td></tr>";
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