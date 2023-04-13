<?php 

session_start();
// include("connection.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password))
		{

			//Making sure SQL Injection doesn't work
			$username = mysqli_real_escape_string($con, $username)
			$password = mysqli_real_escape_string($con, $password)

			$query = "select * from users where username = '$username' and password = '$password'";

			$result = mysqli_query($con, $query);
			$rows=mysqli_num_rows($result);


			if($result && $rows > 0){
				header("Location: index.php");
			} else {
				echo "wrong username or password!";
			}
		
			
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>login Page</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<div class="container vh-100">
		<div class="row justify-content-center h-100">
			<div class="card w-25 my-auto shadow">
				<div class="card-header text-center bg-primary text-white">
					<h2>Login form</h2>
				</div>
				<div class="card-body">
					<form method="POST">
						<div class="form-group">
							<label for="email">Username</label>
							<input type="text" id="username" class="form-control" name="username" />
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" id="password" class="form-control" name="password" />
						</div>
						<input type="submit" class="btn btn-primary w-100" value="Login" name="">
					</form>
				</div>
				<div class="card-footer text-right">
					<small>&copy; Technical Babaji</small>
				</div>
			</div>
		</div>
	</div>
</body>
</html>