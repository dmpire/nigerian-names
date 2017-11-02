<?php include 'config.php';

	if(isset($_POST['save'])){
		$firstname = ucfirst($_POST['name']);
		$meaning = $_POST['meaning'];
		$tribe = $_POST['tribe'];
		$state = $_POST['state'];
		
		$elem = "INSERT into name_meanings (name, meaning, tribe, state) VALUES('$firstname', '$meaning', '$tribe', '$state')";
		$result = mysqli_query($conn, $elem);
		if ($result) {
			header('location: names.php?status=success');
		}
		else {
			// echo mysqli_error($conn);
			echo "<button><a href='names.php'>Back</a></button><br><br>Please do not use any punctuation marks within the form. Thankyou.";
		}
	} 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Nigerian Names and Meanings</title>
	<!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <style type="text/css">
	        body{
	        	background-color: #9B51E0;
	        }
   			nav{
				background-color: #9B51E0;
				box-shadow: 0 0 0;
			}
			#container{
				background-color: #ffffff;
				padding-right: 50px;
				padding-left: 50px;
				padding-top: 30px;
				padding-bottom: 37px;
				margin-top: 20px;
				margin-bottom: 0!important;
			}
			h1, p {
				text-align: center;
			}
			/*footer{
				background-color: #ccf4cc;
			}*/
        </style>  
</head>
<body>
	<nav>
	    <div class="nav-wrapper">
	      <a href="#" class="brand-logo" style="padding-left: 30px;">Nigerian Names</a>
	      <ul id="nav-mobile" class="right hide-on-med-and-down">
	      	<li><a href="names.php">HOME</a></li>
	      	<li><a href="names.php">ABOUT</a></li>
	        <li><a href="add-name.php" style="padding-right: 30px;">ADD</a></li>
	      </ul>
	    </div>
	  </nav>
<div class="container" id="container">
	<h2 style="color: #9B51E0;">What does your name mean?</h2>
	<p style="color: #FFCA28;"><strong>Please do not use any punctuation marks within the form.</strong></p>
	<form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
		<input type="text" name="name" placeholder="Your native name" required>
		<input type="text" name="state" placeholder="State of Origin e.g. Benue State" required>
		<input type="text" name="tribe" placeholder="Tribe" required>
		<input type="text" name="meaning" placeholder="Meaning of name" required>
		<input type="submit" name="save" class="btn waves-effect waves-light right" value="Save" style="background-color: #FF6663;">
	</form>
	<div style="margin-top: 8%; color: #9B51E0;">
		
		<?= "<strong>Thankyou for your contribution to this great work. We heart you!</strong>"; ?>
	</div>
	<!-- <footer>
		<a href="https://twitter.com/daniella_mato">Twitter</a>
		<a href="https://twitter.com/daniella_mato">Twitter</a>
		<a href="https://twitter.com/daniella_mato">Twitter</a>
	</footer> -->
</div>
</body>
</html>