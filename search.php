<?php
include 'config.php';

$query = $_GET['search'];
$min_length = 3;

if(strlen($query) >= $min_length){
	$query = filter_var($query, FILTER_SANITIZE_STRING);

	$sql = "SELECT * from name_meanings WHERE (`name` LIKE '%$query%') OR (`state` LIKE '%$query%') OR (`tribe` LIKE '%$query%')";
	$results = mysqli_query($conn, $sql) or die(mysqli_error($conn));

	if(mysqli_num_rows($results) > 0){
		while($resultant = mysqli_fetch_array($results)){
			echo "<button><a href='names.php'>Back</a></button><br><br>";
			echo "<strong>".$resultant["name"]."</strong><br><br>"."<strong>Meaning : </strong>".$resultant["meaning"]."<br><br>". $resultant["tribe"]." , ". $resultant["state"]. "<br><hr>";
		}
	} else {
	if (mysqli_num_rows($results) <= 0) {
		header('location: names.php?status=error');
	}
		// echo "<button><a href='names.php'>Back</a></button><br>";
		// echo "No results currently available. Please add it if you know the meaning. Thankyou.";
	}
} else {
	echo "<button><a href='names.php'>Back</a></button><br><br>";
	echo "Minimum search entry : ". $min_length;
}

?>