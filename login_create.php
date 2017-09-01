<?php
	if(isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		//connect to mysql database using root username and password and database name
		$connection = mysqli_connect('localhost', 'root', '', 'loginapp');
		//if connection is good let us know we are connected else let us know
		if($connection) {
			echo "we are connected, ";
		} else {
			die("database connection failed");
		}
		
		//insert username and password from form to the users database
		$query =  "INSERT INTO users(username,password) "; 
		$query .= "VALUES ('$username', '$password')";

		$result = mysqli_query($connection, $query);
			if(!$result) {
				echo ('Query did not go through!' . mysqli_error($connection));
			} else {
				echo ("query went throught!");
			}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
	<div class="container">
		<div class="col-xs-6">
		<form action="login_create.php" method="post">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" name="username" class="form-control">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control">
			</div>
			<input class="btn" type="submit" name="submit" value="Submit">
		</form>
		</div>
	</div>

</body>
</html>