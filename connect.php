<html>
<body>
<table>
<tr>
<th>Source</th>
<th>Destination</th>
<th>Date and Time</th>
<th>Price</th>
</tr>
<?php
$source= filter_input(INPUT_POST,"source");
$destination= filter_input(INPUT_POST,"destination");
$datetime= filter_input(INPUT_POST,"datetime");
$email1= filter_input(INPUT_POST,"email1");



if(!empty($source))
{
	if(!empty($destination))
	{
		if(!empty($datetime))
		{
			$host="localhost";
			$dbusername="root";
			$dbpassword="";
			$dbname="dm";
			$linkname="confirm a ride";
			$target="confirm.php";
			$conn=new mysqli ($host,$dbusername,$dbpassword,$dbname);
			if(mysqli_connect_error())
			{
				die('Connect error('. mysqli_connect_error().')' .mysqli_connect_error());
			}
			else
			{
				$sql="INSERT INTO findride(source,destination,datetime) values('$source','$destination','$datetime')";
				if($conn->query($sql)){

					echo "available rides:\n";
					$source1="SELECT source,destination,datetime,price,email from oride where source='$source' and destination='$destination' and datetime='$datetime'";
					$result=$conn->query($source1);
					if(mysqli_num_rows($result) >0)
					{
                       while($row = $result-> fetch_assoc()){
                       	echo "<tr><td>".$row["source"] . "</td><td>".$row["destination"] . "</td><td>".$row["datetime"] . "</td><td>".$row["price"]."</td></tr>";
                       	
                       	echo "<a href='".$target."'>Confirm a seat!</a>";
                       	$to=$row["email"];
                       	$header=$email1;
                       	//<form method="get" action="confirm.php">
                       	//<input type="hidden" name="to" value="$to">
                       	//<input type="hidden" name="header" value="$header">
                       	//<input type="submit" value="Confirm a seat!">
                       	//</form>



                       }
                       echo "</table>";
					}
					else
					{
						echo "0 results found";
					}
				
				}
				else{
					echo "Error: ". $sql ."<br>". $conn->error;
				}
				$conn->close();
			}
		}
		else
		{
			echo "date and time cannot be empty";
			die();
		}
	}
	else
	{
		echo "destination cannot be empty";
		die();
	}
}
else
{
	echo "source cannot be empty";
	die();
}
?>

</body>
</html>