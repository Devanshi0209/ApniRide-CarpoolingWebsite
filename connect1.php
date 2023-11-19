<?php
$source= filter_input(INPUT_POST,"source");
$destination= filter_input(INPUT_POST,"destination");
$datetime= filter_input(INPUT_POST,"datetime");
$price= filter_input(INPUT_POST,"price");
$email= filter_input(INPUT_POST,"email");
if(!empty($source))
{
	if(!empty($destination))
	{
		if(!empty($datetime))
		{
			if(!empty($price))
			{
			$host="localhost";
			$dbusername="root";
			$dbpassword="";
			$dbname="dm";
			$conn=new mysqli ($host,$dbusername,$dbpassword,$dbname);
			if(mysqli_connect_error())
			{
				die('Connect error('. mysqli_connect_error().')' .mysqli_connect_error());
			}
			else
			{
				$sql="INSERT INTO oride(source,destination,datetime,price,email) values('$source','$destination','$datetime','$price','$email')";
				if($conn->query($sql)){
					echo "ride submitted sucessfully, we will send you an email when u have riders";

				}
				else{
					echo "Error: ". $sql ."<br>". $conn->error;
				}
				$conn->close();
			}
		}
		else
	{
		echo "price cannot be empty";
		die();
	}
	}

		else
		{
			echo "date and time cannot empty";
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
