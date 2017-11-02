<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dictionary of Nigerian names</title>
	<!-- Compiled and minified CSS -->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  	<!-- Compiled and minified JavaScript -->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>  
  	<style type="text/css">
  		nav{
  			background-color: #9B51E0;
  		}
  		#heading{
  			color:#9B51E0;
  			padding-top: 3%;
  			padding-bottom: 3%;
  			text-align: center;
  		}
  		#first-hr{
  			margin-bottom: 2%;
  		}
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
	
	<?php if (isset($_GET['status']) && $_GET['status'] == 'success') { ?> 
	<strong>Thank you for your contribution to this great work. We <span style="color:red;">heart</span> you!</strong>
	<?php } ?>
	<h3 id="heading"><strong>Dictionary of Nigerian Names</strong></h3>
	<hr id="first-hr">
	<div class="container">
	<a href="add-name.php" class="right" style="color: #FF9933;">Didn't find your name? Click here to add it.</a>
	<form action="search.php" method="GET">
		<input type="text" name="search" placeholder="SEARCH">
		<button class="btn waves-effect waves-light right" type="submit" name="submit" style="background-color: #EA4335;">Search
		<i class="material-icons right">send</i>
		</button>
	</form>
	<?php if (isset($_GET['status']) && $_GET['status'] == 'error') { ?> 
	<strong style="color: red;">No results currently available. Please add it if you know the meaning. Thankyou.</strong>
	<?php } ?>
	<div style="margin-top: 8%;">
		<p>
			<?php
			$query = "SELECT * FROM name_meanings";
			$result = mysqli_query( $conn, $query);

			if( mysqli_num_rows($result) > 0){
				
				while( $row = mysqli_fetch_assoc($result)){
					echo "<strong>".$row["name"]."</strong><br><br>"."<strong>Meaning : </strong>".$row["meaning"]."<br><br><strong>Origin : </strong>". $row["tribe"]." , ". $row["state"]. "<br><hr>";
				}
			} else {
				echo "Ooops! Something went wrong.";
			}

			mysqli_close($conn);
			?>
		</p>
	</div>
</div>
</body>
</html>
