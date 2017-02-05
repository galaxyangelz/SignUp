<?php
include("db.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
	// username and password sent from Form
	$username=mysqli_real_escape_string($db,$_POST['username']); 
	$password=mysqli_real_escape_string($db,$_POST['password']); 
	$password=md5($password); // Encrypted Password
	$sql="SELECT id FROM TestingLogin WHERE username='$username' and pass='$password'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

	// If result matched $username and $password, table row must be 1 row
	if($count == 1) {
        $_SESSION['login_user'] = $username;
        header("location: welcome.php");
    } else {
        $error = "Your Login Name or Password is invalid";
	}
}
?>
<form action="index.php" method="post">
	<label>UserName :</label>
	<input type="text" name="username"/><br />
	<label>Password :</label>
	<input type="password" name="password"/><br/>
	<input type="submit" value="Login "/><br />
</form>
<button>
	<a href="registration.php" style="text-decoration : none;">Sign Up</a>
</button>
