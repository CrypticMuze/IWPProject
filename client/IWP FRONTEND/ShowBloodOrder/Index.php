<?php include "config.php";?>


<html lang="en">
<head>
    <title>Manage Orders</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="icon" href="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png" type="image/x-icon">
    <style>
        #thead>tr>th{ color: white; }
    </style>
</head>
<body>
<!-- <div style="margin-top: 20px;padding-bottom: 20px;">
    <center>
        <img width="100" src="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png"/>
        <h3>Delete records from database using PHP </h3>
    </center>
</div> -->

<H2 style="text-align:center;"><strong><mark><blink>Pending Orders</blink></mark></strong></H2><Br><Br>


<?php
$fetchQuery = mysqli_query($conn,"select * from bb_place_order") or die("could not fetch".mysqli_error($conn));
?>

<div class="container">
<?php
	if(isset($_POST['submitDeleteBtn']))
	{
		$key= $_POST['keyToDelete'];
		
		$check= mysqli_query($conn,"select * from bb_place_order where order_id='$key'") or die("not found".mysqli_error($conn));
		if(mysqli_num_rows($check)>0)
		{
			$queryDelete= mysqli_query($conn,"Delete from bb_place_order where order_id='$key' ")
			or die("not deleted".mysqli_error($conn));
			?>
			
			<div class="alert alert-success">
				<p>Order Dispatched!!</p>
			</div>
			
			
			
		<?php 
		
		header('Refresh:1;URL=Index.php');
		}
		
		else
		{ 
	?>
			<div class="alert alert-warning">
				<p>Record does not exist</p>
			</div>
		<?php 
		}
	}
	?>





    <table class="table">
        <thead id="thead" style="background-color: #26a2af">
        <tr>
            <th>Order No.</th>
            <th>Hospital ID</th>
            <th>Blood Type</th>
            <th>Units</th>
            <th>Address</th>
			<th>Select</th>
            <th>Action</th>
        </tr>
		</thead>
		<?php
		while($row=mysqli_fetch_array($fetchQuery))
		{?>
			<tr>
				<form action="" method="post" role="from">
					<td><?php echo $row['order_id'];?></td>
					<td><?php echo $row['hosp_id'];?></td>
					<td><?php echo $row['Blood_type'];?></td>
					<td><?php echo $row['units'];?></td>
					<td><?php echo $row['address'];?></td>
					<td>
						<input type="checkbox" name="keyToDelete" value="<?php echo $row['order_id'];?>" required>
					</td>
					<td>
						<input type="Submit" name="submitDeleteBtn" class="btn btn-info" Value="Dispatch">
					</td>
				</form>
					
				
				
				
				
				</form>
			</tr> 
		
		
		<?php
		}
		?>
		
        
    </table>
	<A href="/index.html" alink="blue">Go To Homepage</A><br><br>
	<marquee bgcolor="#26a2af" align="top" ><font color="white"><B>Do more than is required. What is the distance between someone who achieves their goals consistently and those who spend their lives and careers merely following? The extra mile.</font></marquee>
</div>
</body>
</html>