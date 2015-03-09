<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- For MOBILE -->
<title>Homepage</title>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'> <!-- Google Font Import -->
<link rel="stylesheet" href="CSS/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="CSS/global.css"> <!-- Global CSS Styling -->
<link rel="stylesheet" type="text/css" href="CSS/index.css"> <!-- Index CSS Styling -->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
	
</head>


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
				<?php
					include 'functions/menu.php';
					if (isset($_SESSION['username'])) {
						userMenu();
					} else {
						defaultMenu();
					}
				?>
			</ul>
		</div>
	</header>
	<div id="relwrapper">
		<div class="container">
			<div class="panel-group" id="accordion">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a href="#collpaseone" data-toggle="collapse" data-parent="accordion">Recommended Spaces</a>
						</h4>
					</div>


					<div id="collpaseone" class="panel-collapse collapse in">
						<div class="panel-body">
							<div class="cointainer2">
                                <div class ="row">
                                    
                                    <div class="col-md-4">

                                        <div class="list-group list-group-flush" data-toggle="collapse" data-target="#toggleSort1"> 
                                            <div class="list-group-item">
                                                <span class="glyphicon glyphicon-chevron-right">
                                                </span>
                                                Item #1
                                                <div id="toggleSort1" class="collapse in">
                                                    <br>
                                                      <a href="#">Item 1 (maybe add pictures) w/ description</a>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="list-group list-group-flush" data-toggle="collapse" data-target="#toggleSort2"> 
                                            <div class="list-group-item">
                                                <span class="glyphicon glyphicon-chevron-right">
                                                </span>
                                                Item #2
                                                <div id="toggleSort2" class="collapse in">
                                                    <br>
                                                    <a href="#">Item 2</a>

                                                </div>
                                            </div> 
                                        </div>
                                    </div>                        
                                    
                                    <div class="col-md-4">
                                        <div class="list-group list-group-flush" data-toggle="collapse" data-target="#toggleSort3"> 
                                            <div class="list-group-item">
                                                <span class="glyphicon glyphicon-chevron-right">
                                                </span>
                                                Item 3
                                                <div id="toggleSort3" class="collapse in">
                                                    <br>
                                                            <a href="#">Item 3</a>

                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                    <br><br>
                                                                        <div class="col-md-4">
                                        <div class="list-group list-group-flush" data-toggle="collapse" data-target="#toggleSort3"> 
                                            <div class="list-group-item">
                                                <span class="glyphicon glyphicon-chevron-right">
                                                </span>
                                                Item 3
                                                <div id="toggleSort3" class="collapse in">
                                                    <br>
                                                            <a href="#">Item 3</a>

                                                </div>
                                            </div> 
                                        </div>
                                    </div>

                                                                                                            <div class="col-md-4">
                                        <div class="list-group list-group-flush" data-toggle="collapse" data-target="#toggleSort3"> 
                                            <div class="list-group-item">
                                                <span class="glyphicon glyphicon-chevron-right">
                                                </span>
                                                Item 3
                                                <div id="toggleSort3" class="collapse in">
                                                    <br>
                                                            <a href="#">Item 3</a>

                                                </div>
                                            </div> 
                                        </div>
                                    </div>

                                                                                                            <div class="col-md-4">
                                        <div class="list-group list-group-flush" data-toggle="collapse" data-target="#toggleSort3"> 
                                            <div class="list-group-item">
                                                <span class="glyphicon glyphicon-chevron-right">
                                                </span>
                                                Item 3
                                                <div id="toggleSort3" class="collapse in">
                                                    <br>
                                                            <a href="#">Item 3</a>

                                                </div>
                                            </div> 
                                        </div>
                                    </div>


                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>	
<!-- Latest compiled and minified JavaScript -->
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
<footer>
	<a href="https://synergyspace309.herokuapp.com/">SynergySpace</a> is a coworking space rental and teaming to succeed service. &copy; 2015
</footer>
</html>