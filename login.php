<?php 
include ("koneksi.php");
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = mysql_query("SELECT * FROM tb_login WHERE username = '$username' AND password = '$password'");
		$data = mysql_fetch_array($sql);
		if(mysql_num_rows($sql)==1){
			$_SESSION['id'] = $data[0];
			echo "<script>document.location.href='index.php?status=1'</script>";
		}else{
			echo "DATA TIDAK KETEMU";
			// echo $sql;
		}

	}
?>
<!DOCTYPE html>
<html>

	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
		<body>
			<br>
			<h1 style="text-align:center"> <font face="arial">Login </font> </h1>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
				
						<form  method="post">
							<div class="form-group">
								<label>Username</label>
								<input type="text" placeholder="username" name="username" class="form-control" required></input>
							</div>

							<div class="form-group">
								<label>Password</label>
								<input type="password" placeholder="password" name="password" class="form-control" required></input>
							</div>

							<input type="submit" name="submit" class="btn btn-default" value="Sign In">
						</form>
					</div>
				</div>
			</div>
		</body>
</html>
