<!DOCTYPE html>
<html>
<head>
	<title>Contact | John Marble</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <!-- Link to CSS file -->
	<link rel="stylesheet" type="text/css" href="../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<!-- Link to JavaScript file -->
	<script type="text/javascript" src="js/nav.js"></script>
</head>
<body class="body">
	<div class="wrapper">
		<!-- Navigation bar -->
		<nav class="navbar navbar-default navbar-vertical">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					<a class="navbar-brand" href="../index.html">John Marble</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="../about.html">About</a></li>
						<li class="dropdown">
							<a href="../projects.html" class="dropbtn">Projects</a>
							<div class="dropdown-content">
								<a href="../projects/nao.html">Nao Research Projects</a>
								<a href="../projects/hack.html">Hack-Io-Thon Weather application</a>
								<a href="../projects/timer.html">Swim Timer Repair Project</a>
								<a href="../projects/mobdev.html">Mobile Application Development</a>
							</div>
						</li>
						<li><a href="../resume.html">Resume</a></li>
						<li><a href="../skills.html">Skills</a></li>
						<li class ="dropdown">
							<a href="../hobby.html" class="dropbtn">Hobbies</a>
							<div class="dropdown-content">
								<a href="../hobbies/swim.html">Swimming</a>
								<a href="../hobbies/surf.html">Surfing</a>
								<a href="../hobbies/climb.html">Climbing</a>
							</div>
						</li>
						<li><a href="../php/contact.php" class="active">Contact</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<?php
		session_start();

		// Check if the form was submitted
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		// Get the form data
		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
		$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

		// Validate the email address
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "Invalid email address";
			exit();
		}

		// Validate the CSRF token
		if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
			echo "Invalid CSRF token";
			exit();
		}

		// Set the recipient email address
		$to = 'mackjarble@gmail.com';

		// Set the subject of the email
		$subject = 'New message from ' . $name;

		// Set the message body
		$body = 'Name: ' . $name . "\n";
		$body .= 'Email: ' . $email . "\n";
		$body .= 'Message: ' . $message . "\n";

		// Send the email
		$headers = "From: $email";
		$result = mail($to, $subject, $body, $headers);

		if ($result) {
			echo "Email sent successfully";
		} else {
			$error = error_get_last();
			$error_message = isset($error['message']) ? $error['message'] : 'Unknown error';
			echo "Email sending failed: $error_message";
		}
		}

		?>

		<h1 class="text-center">Contact Information</h1>
		<hr class="my-hr">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
						<h2>Contact me</h2>
						<?php
						// Generate CSRF token
						if (!isset($_SESSION['csrf_token'])) {
						$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
						}
						?>
						<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="name" name="name" required>
						</div>
						<div class="form-group">
							<label for="email">Email address</label>
							<input type="email" class="form-control" id="email" name="email" required>
						</div>
						<div class="form-group">
							<label for="message">Message</label>
							<textarea class="form-control" id="message" name="message" rows="5" required></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
				<div class="col-md-6">
					<div class="media-icons">
						<h2>Connect with me</h2>
						<ul class="list-unstyled">
						<li style="font-size: 40px;" class="text-center"><a href="https://www.facebook.com/jack.marble.792"><img src="../img/facebook.png" style="max-width: 25%; height: auto;">Facebook</a></li>
						<li style="font-size: 40px;" class="text-center"><a href="https://www.linkedin.com/in/john-marble-15aa23246/"><img src="../img/linkedin.png" style="max-width: 17%; height: auto;">LinkedIn</a></li>
						<li style="font-size: 40px;" class="text-center"><a href="https://www.instagram.com/mackjarble/?hl=en"><img src="../img/insta.png" style="max-width: 17%; height: auto;">Instagram</a></li>
						<li style="font-size: 40px;" class="text-center"><a href="https://github.com/mackjarble"><img src="../img/GitHub.png" style="max-width: 17%; height: auto;">GitHub</a></li>
						</ul>
					</div>
				</div>
			</div>
		  </div>

	</div>
	<div class="push"></div>
</body>

    <!-- Footer -->
	<footer class="footer">
		<div class="container">
		  <div class="row">
			<div class="col-md-12 text-center">
				<p>non ducor, duco</p>
			  <p>&copy; 2023 John Marble. All rights reserved.</p>
			</div>
		  </div>
		</div>
	</footer>

</html>
