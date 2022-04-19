<?php
session_start();

	include("connection.php");
	include("functions.php");
	$user_data = check_login($con);


	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$turn = $_POST["turn"];
		$turnCheck = mysqli_fetch_assoc(mysqli_query($con,"select turn from games"));
		if($turn == $turnCheck["turn"] || $turnCheck["turn"] == "C" || $turn == "C") {
			$board = $_POST["board"];
			$winState = checkForWin($board);
			
			if(($winState == 1 || $winState == 2 || $winState == 3) && $_POST["winState"] == 0) {
				$winState = 0;
			}
			
			if($turn == "X") {
				$turn = "O";
			}
			else if($turn == "O") {
				$turn = "X";
			}
			$jsonboard = json_encode($board);
			echo mysqli_query($con,"insert into games (gameid,winState,board,turn) values (1,'$winState','$jsonboard','$turn') on duplicate key update winState='$winState', board='$jsonboard', turn='$turn'");
			//echo var_dump($board);
		}
		else {
			echo "It is not your turn.";
		}
	}
	else if ($_SERVER['REQUEST_METHOD'] == "GET") {
		$query2 = "select winState, board, turn from games";
		$result = mysqli_fetch_assoc(mysqli_query($con,$query2));
		if($result["winState"] == null) {
			$winState = 0;
			$board = json_encode(array(" ", " ", " ", " ", " ", " ", " ", " ", " "));
			mysqli_query($con,"insert into games (gameid,winState,board,turn) values (1,0,'$board','C') on duplicate key update winState='$winState', board='$board'");
		}
		//$board = json_decode($result["board"]);
		echo json_encode(array('winState' => $result["winState"], 'board' => $result["board"], 'turn' => $result["turn"])); 
	}



	//Checks for win, returns 0 for empty board, 1 for X win, 2 for O win, and 3 for in play
	function checkForWin($board) {
	if($board[0] == $board[1] && $board[1] == $board[2] && $board[2] != " ") {
		if($board[0] == "X") {
			return 1;
		}
		else if($board[0] == "O") {
			return 2;
		}
	}

	else if($board[0] == $board[3] && $board[3] == $board[6] && $board[6] != " ") {
		if($board[0] == "X") {
			return 1;
		}
		else if($board[0] == "O") {
			return 2;
		}
	}

	else if($board[2] == $board[5] && $board[5] == $board[8] && $board[8] != " ") {
		if($board[2] == "X") {
			return 1;
		}
		else if($board[2] == "O") {
			return 2;
		}
	}

	else if($board[6] == $board[7] && $board[7] == $board[8] && $board[8] != " ") {
		if($board[6] == "X") {
			return 1;
		}
		else if($board[6] == "O") {
			return 2;
		}
	}

	else if($board[0] == $board[4] && $board[4] == $board[8] && $board[8] != " ") {
		if($board[0] == "X") {
			return 1;
		}
		else if($board[0] == "O") {
			return 2;
		}
	}

	else if($board[2] == $board[4] && $board[4] == $board[6] && $board[6] != " ") {
		if($board[2] == "X") {
			return 1;
		}
		else if($board[2] == "O") {
			return 2;
		}
	}

	else if($board[1] == $board[4] && $board[4] == $board[7] && $board[7] != " ") {
		if($board[1] == "X") {
			return 1;
		}
		else if($board[1] == "O") {
			return 2;
		}
	}

	else if($board[3] == $board[4] && $board[4] == $board[5] && $board[5] != " ") {
		if($board[3] == "X") {
			return 1;
		}
		else if($board[3] == "O") {
			return 2;
		}
	}

	for($i = 0; $i < 9; $i++) {
		if($board[$i] == " ") {
			return 0;
		}
	}

	return 3;
	}

?>