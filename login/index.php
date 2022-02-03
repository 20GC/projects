<?php
session_start();
	
	include("connection.php");
	include("functions.php");
	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Garrett's Tic Tac Toe</title>
		<link rel="stylesheet" href="gctictactoe.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="gctictactoe.js"></script>
	</head>

	<body>
		<a href="logout.php">Logout</a>

		<h3>
		   Tic Tac Toe
		</h3>

		<div id="grid">
		   <div class="box" id="topleft" onclick = "takeTurn(this, 0)">
		   	  
		   </div>


		   <div class="box" id="topmid" onclick = "takeTurn(this, 1)">
		   	  
		   </div>


		   <div class="box" id="topright" onclick = "takeTurn(this, 2)">
		      
		   </div>


		   <div class="box" id="midleft" onclick = "takeTurn(this, 3)">
		   	  
		   </div>


		   <div class="box" id="midmid" onclick = "takeTurn(this, 4)">
		   	  
		   </div>


		   <div class="box" id="midright" onclick = "takeTurn(this, 5)">
		   	  
		   </div>


		   <div class="box" id="botleft" onclick = "takeTurn(this, 6)">
		   	  
		   </div>


		   <div class="box" id="botmid" onclick = "takeTurn(this, 7)">
		   	  
		   </div>


		   <div class="box" id="botright" onclick = "takeTurn(this, 8)">
		   	  
		   </div>
		</div>

		<div id="gameState"></div>
		<div id="buttons">
			<button id="yes">Play</button>
			<button id="no">Exit</button>
		</div>


		<p>Garrett Chase Tic Tac Toe <span>&copy</span></p>

	</body>
</html>