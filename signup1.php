<?php
$name= filter_input(INPUT_POST,"name");
$email= filter_input(INPUT_POST,"email");
$password= filter_input(INPUT_POST,"password");

if(!empty($name))
{
	if(!empty($email))
	{
		if(!empty($password))
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
				$sql="INSERT INTO signup(name,email,password) values('$name','$email','$password')";
				if($conn->query($sql)){
					echo "sign up sucessfull! You can now sign in easily.";

				}
				else{
					echo "Error: ". $sql ."<br>". $conn->error;
				}
				$conn->close();
			}
		}
	
	}

		else
		{
			echo "password cannot empty";
			die();
		}
	}
	else
	{
		echo "email cannot be empty";
		die();
	}
}
else
{
	echo "name cannot be empty";
	die();
}
?>
