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
		<script src="gctictactoe.php"></script>
		<script>

		//Info sent/received: winState, board[], turn
		//Uses JSON to interact between files
		//Variables
		var gameInfo = 0;
		var turnInfo = 0;
		var url = "gctictactoe.php"
		var board = [" ", " ", " ", " ", " ", " ", " ", " ", " "];
		var winState = 0;
		var jsonboard = 0;

		//Beginning- hide win things, how clicking yes works
		$(document).ready(function() {
		    $("#gameState").hide();
		    $("#buttons").hide();

		    //Yes button is the "play again" button
		    $("#yes").click(function() {
		    	$("#gameState").hide();
		    	$("#buttons").hide();
		    	reset();
		    });
		});

		//Function to take turn, starts as turn "C", evaluates board
		//If board is empty, turn "X", if not, turn "O"
		//Sets client side visuals and sends new info to the server
		var turn = "C";
		function takeTurn(element, idx) {
			if(board[idx] === " " && winState == 0) {
				if(turn == "C") {
					turn = getTurn();
				}
				board[idx] = turn;
				winState = 4;
					turnInfo = $.post(url, {"winState":winState,"board":board,"turn":turn}
						//, function(data){alert("Response: " + data);}
						);
			}

		}

		//Used by takeTurn() to evaluate the board for the client's turn
		function getTurn() {
			var temp = 0;
			for(var i = 0; i < 9; i++) {
				if(board[i] == " ") {
					temp++;
				}
				else if(board[i] == "X") {
					return "O";
				}
				else if(board[i] == "O") {
					return "-";
				}
			}
			if(temp == 9) {
				return "X";
			}
		}

		//Update function used to take info from the server and change the client
		//Update is set on the interval below, currently 1/2 second
		setInterval(update, 500);
		var obj = 0;
		function update() {
			//Huge ajax $.get function that uses data from server, changes data variables into JSON objects
			//if necessary, then updates winState and the board from the board array
			gameInfo = $.get(url, function(data) {
				console.log("Data Loaded: " + data.winState + " " + data.board + " " + data.turn);
				
				obj = JSON.parse(data.board);
				winState = data.winState;
				if(winState > 0) {
					win();
				}
				board = obj;
				
				$("#topleft").html(obj[0]);
				$("#topmid").html(obj[1]);
				$("#topright").html(obj[2]);
				$("#midleft").html(obj[3]);
				$("#midmid").html(obj[4]);
				$("#midright").html(obj[5]);
				$("#botleft").html(obj[6]);
				$("#botmid").html(obj[7]);
				$("#botright").html(obj[8]);
			}, "json");
		}

		//When the reset button is pressed, wipes the board, winState, client side turn, and sends it to server
		function reset() {
			board = [" ", " ", " ", " ", " ", " ", " ", " ", " "];
			winState = 0;
			turn = "C";
			$.post(url, {"winState":winState,"board":board,"turn":turn});
		}

		//If winState == 1, 2, or 3, displays the win screen and buttons to play again or exit
		function win() {
			if (winState == 1) {
			    document.getElementById("gameState").innerHTML = "X wins" + "<br />" + "Play again?";
		    }
		   	else if (winState == 2) {
		  		document.getElementById("gameState").innerHTML = "O wins" + "<br />" + "Play again?";
			}
			else if (winState == 3) {
				document.getElementById("gameState").innerHTML = "Tie" + "<br />" + "Play again?";
			}
			$("#gameState").show();
			$("#buttons").show();
		}

		</script>
	</head>

<!-- HTML of the page -->
	<body>
		<a href="logout.php">Logout</a><br>
		<button id="reset" onclick = "reset()">Reset</button>

		<h3>
		   Tic Tac Toe
		</h3>

		<div id="grid">
		   <div class="box" id="topleft" onclick = "takeTurn(this, 0)"></div>

		   <div class="box" id="topmid" onclick = "takeTurn(this, 1)"></div>

		   <div class="box" id="topright" onclick = "takeTurn(this, 2)"></div>

		   <div class="box" id="midleft" onclick = "takeTurn(this, 3)"></div>

		   <div class="box" id="midmid" onclick = "takeTurn(this, 4)"></div>

		   <div class="box" id="midright" onclick = "takeTurn(this, 5)"></div>

		   <div class="box" id="botleft" onclick = "takeTurn(this, 6)"></div>

		   <div class="box" id="botmid" onclick = "takeTurn(this, 7)"></div>

		   <div class="box" id="botright" onclick = "takeTurn(this, 8)"></div>
		</div>

		<div id="gameState"></div>
		<div id="buttons">
			<button id="yes" onclick = "reset()">Play</button>
			<button id="no" onclick="window.location.href='logout.php';">Exit</button>
		</div>


		<p>Garrett Chase Tic Tac Toe</p>

	</body>
</html>