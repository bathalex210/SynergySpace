<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- For MOBILE -->
<title>Search - SynergySpace</title>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'> <!-- Google Font Import -->
<link rel="stylesheet" href="CSS/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="CSS/global.css"> <!-- Global CSS Styling -->
<link rel="stylesheet" type="text/css" href="CSS/search.css"> <!-- Search CSS Styling -->
</head>
<body>
	<?php
		session_start();
		include 'functions/menu.php';
		if (isset($_SESSION['username'])) {
			userMenu();
		} else {
			defaultMenu();
		}
	?>
	<aside>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
		<input type="hidden" name="order" value="b_id" /> 
		<a href="#" onClick='this.form.submit()'><span class="fa fa-crosshairs"></span>Order by: default</a>
		</form>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
		<input type="hidden" name="order" value="address" /> 
		<a href=""><span class="fa fa-map-marker"></span>Order by: address</a>
		</form>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
		<input type="hidden" name="order" value="city" /> 
		<a href=""><span class="fa fa-map-marker"></span>Order by: city</a>
		</form>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
		<input type="hidden" name="order" value="country" /> 
		<a href=""><span class="fa fa-map-marker"></span>Order by: country</a>
		</form>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
		<input type="hidden" name="order" value="n_id" /> 
		<a href=""><span class="fa fa-connectdevelop"></span>Order by: network</a>
		</form>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
		<input type="hidden" name="order" value="capacity" /> 
		<a href=""><span class="fa fa-users"></span>Order by capacity</a>
		</form>
	</aside>
	<section>
		<?php
			$address=$_GET['query'];
			$order=$_GET['order'];
			$dbconn = pg_connect("host=ec2-107-20-244-39.compute-1.amazonaws.com dbname=ddn82pff17m8p9 user=vbbkmqgcbmprhj password=hgtlv6g35Sn0zxepyM-f7JKqK6") 
				or die('Could not connect: ' . pg_last_error());
			
			$query = "SET search_path TO synergy; SELECT * FROM building WHERE address  LIKE '%$address%' ORDER BY $order;";
			$result = pg_query($query) or die('Query failed: ' . pg_last_error());
			while ($data = pg_fetch_object($result)) {
				echo '<div class="building">';
				echo '<span class="fa fa-building-o fa-2x"></span>';
				echo '<a href="/building.php?id='.$data->b_id.'"><h2>'.$data->address.'</h2></a>';
				echo '<p>City: '.$data->city.'</p>';
				echo '<p>Country: '.$data->country.'</p>';
				echo '<p>Capacity: '.$data->capacity.'</p>';
				echo '</div>';
			}
		?>
	</section>
	<footer><a href="https://synergyspace309.herokuapp.com/">SynergySpace</a> is a coworking space rental and teaming to succeed service. &copy; 2015</footer>
</body>

</html>