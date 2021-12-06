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

<h1><span class="yellow">Service Center</span></h1>


<table class="container">
	<thead>
		<tr>
			<th><h1>Service Center Name</h1></th>
			<th><h1>SErvice Center Address</h1></th>
			<th><h1>Service Center Phone No.</h1></th>
			
		</tr>
	</thead>
	<?php
	$conn = mysqli_connect("localhost","root","","blood bank");
	if($conn->connect_error)
	{
	die("Connection failed:".$conn->connect_error);
	}
	$sql= "select service_center,sc_address,sc_phone from bb_service_center";
	$result = $conn-> query($sql);
	if($result-> num_rows>0)
	{
	while($row=$result->fetch_assoc())
	 {
	    echo "<tr><td>". $row["service_center"] ."</td><td>". $row["sc_address"] ."</td><td>". $row["sc_phone"] ."</td></tr>";
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