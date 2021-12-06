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

<h1><span class="yellow">Owner</span></h1>


<table class="container">
	<thead>
		<tr>
			<th><h1>ID</h1></th>
			<th><h1>Name</h1></th>
			<th><h1>Phone No</h1></th>
			<th><h1>Address</h1></th>
			<th><h1>Date of Birth</h1></th>
			<th><h1>Driving Liscence No</h1></th>
		
		</tr>
	</thead>
	<?php
	$conn = mysqli_connect("localhost","root","","blood bank");
	if($conn->connect_error)
	{
	die("Connection failed:".$conn->connect_error);
	}
	$sql= "select * from bb_owner";
	$result = $conn-> query($sql);
	if($result-> num_rows>0)
	{
	while($row=$result->fetch_assoc())
	 {
	    echo "<tr><td>". $row["owner_id"] ."</td><td>". $row["owner_name"] ."</td><td>". $row["owner_ph_no"]. "</td><td>". $row["owner_address"] ."</td><td>". $row["owner_dob"] ."</td><td>". $row["driving_lisc_no"] ."</td></tr>";
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