<?php
	include("db.php");
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
	// username and password sent from Form
		$username=mysqli_real_escape_string($db,$_POST['username']); 
		$password=mysqli_real_escape_string($db,$_POST['password']); 
		$email=mysqli_real_escape_string($db,$_POST['email']); 
		$phone=mysqli_real_escape_string($db,$_POST['phone']); 
		$zipcode=mysqli_real_escape_string($db,$_POST['zipcode']); 
		$city=mysqli_real_escape_string($db,$_POST['city']); 
		$address=mysqli_real_escape_string($db,$_POST['address']); 
		$fname=mysqli_real_escape_string($db,$_POST['fname']); 
		$lname=mysqli_real_escape_string($db,$_POST['lname']); 
		$password=md5($password); // Encrypted Password
		$sql="INSERT INTO accounts (username,pass,email,phone,zip,city,addressline,FirstName,LastName) VALUES ('$username','$password','$email','$phone','$zipcode','$city','$address','$fname','$lname');";
		$result=mysqli_query($db,$sql);
		echo "Registration Successfully";
	}
?>
<form action="registration.php" method="post">
	<label>Username :</label>
	<input type="text" name="username"/><br />
	<label>Password :</label>
	<input type="password" name="password"/><br/>
	<label>Email :</label>
	<input type="text" name="email"/><br/>
	<label>Phone :</label>
	<input type="text" name="phone"/><br/>
	<label>Zip :</label>
	<input type="number" name="zipcode"/><br/>
	<label>City :</label>
	<input type="text" name="city"/><br/>
	<label>Address :</label>
	<input type="text" name="address"/><br/>
	<label>First Name :</label>
	<input type="text" name="fname"/><br/>
	<label>Last Name :</label>
	<input type="text" name="lname"/><br/>
	<input type="submit" value="Registration "/><br />
</form>
<button>
	<a href="index.php" style="text-decoration : none;">Back</a>
</button>
