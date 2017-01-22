<?php
	include("db.php");
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
	// username and password sent from Form
		$username=mysqli_real_escape_string($db,$_POST['username']); 
		$password=mysqli_real_escape_string($db,$_POST['password']); 
		$password=md5($password); // Encrypted Password
		$sql="Insert into TestingLogin(username,pass) values('$username','$password');";
		$result=mysqli_query($db,$sql);
		echo "Registration Successfully";
	}
?>
<form action="registration.php" method="post">
	<label>UserName :</label>
	<input type="text" name="username"/><br />

	<label>Password :</label>
	<input type="password" name="password"/><br/>
	<input type="submit" value=" Registration "/><br />
</form>
<button>
	<a href="login.php" style="text-decoration : none;">Back</a>
</button>
