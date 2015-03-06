<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- For MOBILE -->
<title>Register - SynergySpace</title>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'> <!-- Google Font Import -->
<link rel="stylesheet" href="CSS/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="CSS/global.css"> <!-- Global CSS Styling -->

<link rel="STYLESHEET" type="text/css" href="style/pwdwidget.css" /> <!-- Form validation CSS -->
<script src="scripts/pwdwidget.js" type="text/javascript"></script>  <!-- Form validation JAVASCRIPT -->
</head>
<?php
// Define database variables
define('DB_HOST', 'ec2-107-20-244-39.compute-1.amazonaws.com');
define('DB_NAME', 'ddn82pff17m8p9');
define('DB_USER','vbbkmqgcbmprhj');
define('DB_PASSWORD','hgtlv6g35Sn0zxepyM-f7JKqK6');

// Connecting, selecting database
$dbconn = pg_connect("host=DB_HOST dbname=DB_NAME user=DB_USER password=DB_PASSWORD")
    or die('Could not connect: ' . pg_last_error());

function NewUser() { 
	$fullname = $_POST['name']; 
	$userName = $_POST['user']; 
	$email = $_POST['email']; 
	$password = $_POST['pass']; 
	$query = "INSERT INTO users (fullname,userName,email,pass) VALUES ('$fullname','$userName','$email','$password')"; 
	$data = pg_query($query) or die('Query failed: ' . pg_last_error()); 
	if($data) { echo "Registration completed."; }
}

function SignUp() { 
	if(!empty($_POST['user'])) {
		$query = pg_query("SELECT * FROM users WHERE username = '$_POST[user]'")
			or die('Query failed: ' . pg_last_error()); 
		if(!$row = pg_fetch_array($query,0) 
			or die('Query failed: ' . pg_last_error())) { NewUser(); } 
		else { echo "Sorry, that username is already taken."; } 
	} 
} 
if(isset($_POST['submit'])) { SignUp(); }

// Performing SQL query
$query = 'SELECT * FROM users';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

// Printing results in HTML
echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);
?>
<body>
	<header>
		<a href="/index.php"><span class="fa fa-connectdevelop fa-2x"></span><span>SynergySpace</span></a>
		<div id='search-box'>
			<form action='/search' id='search-form' method='get' target='_top'>
				<input id='search-text' name='q' placeholder='Search by postal code' type='text' autocomplete="off"/>
				<button id='search-button' type='submit'>                     
					<span class="fa fa-search"></span>
				</button>
			</form>
		</div>
		<div id="account">
			<ul>
				<li><a href="/profile.html"><span class="fa fa-cogs"></span>My Account</a></li>
				<li><a href=""><span class="fa fa-plus"></span>Create an Account</a></li>
				<li><a href=""><span class="fa fa-sign-out"></span>Logout</a></li>
				<li><a href=""><span class="fa fa-sign-in"></span>Login</a></li>
			</ul>
		</div>
	</header>
	<section>
		<form id='register' action='register.php' method='post' accept-charset='UTF-8'>
			<fieldset >
				<legend>Register</legend>
				<input type='hidden' name='submitted' id='submitted' value='1'/>
				<label for='name' >Your Full Name*: </label>
				<input type='text' name='name' id='name' maxlength="50" />
				<label for='email' >Email Address*:</label>
				<input type='text' name='email' id='email' maxlength="50" />
				 
				<label for='username' >UserName*:</label>
				<input type='text' name='user' id='user' maxlength="50" />
				 
				<label for='password' >Password*:</label>
				<input type='password' name='pass' id='pass' maxlength="50" />
				<input type='submit' name='Submit' value='Submit' />	 
			</fieldset>
		</form>
		</form>
	</section>
	<footer><a href="https://synergyspace309.herokuapp.com/">SynergySpace</a> is a coworking space rental and teaming to succeed service. &copy; 2015</footer>
</body>

</html>