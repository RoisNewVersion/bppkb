
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login Page</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<style type="text/css" media="screen">
		@import "bourbon";

		body {
			background: #eee !important;	
		}

		.wrapper {	
			margin-top: 80px;
			margin-bottom: 80px;
		}

		.form-signin {
			max-width: 380px;
			padding: 15px 35px 45px;
			margin: 0 auto;
			background-color: #fff;
			border: 1px solid rgba(0,0,0,0.1);  

			.form-signin-heading,
			.checkbox {
				margin-bottom: 30px;
			}

			.checkbox {
				font-weight: normal;
			}

			.form-control {
				position: relative;
				font-size: 16px;
				height: auto;
				padding: 10px;
				@include box-sizing(border-box);

				&:focus {
					z-index: 2;
				}
			}

			input[type="text"] {
				margin-bottom: -1px;
				border-bottom-left-radius: 0;
				border-bottom-right-radius: 0;
			}

			input[type="password"] {
				margin-bottom: 20px;
				border-top-left-radius: 0;
				border-top-right-radius: 0;
			}
		}

	</style>
</head>
<body>
	<?php
	session_start();
	include 'system/fungsi.php'; 
	$cek = new Core();
	$cek->check_login('admin');
	?>
	<div class="wrapper">
		<form class="form-signin" method="post" action="postLogin.php">       
			<h2 class="form-signin-heading">Please login</h2>
			<input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" /><p></p>
			<input type="password" class="form-control" name="password" placeholder="Password" required=""/><p></p>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
		</form>
	</div>
</body>
</html>