
$(document).ready(function() {
    $("#gameState").hide();
    $("#buttons").hide();

    $("#yes").click(function() {
    	for(var i = 0; i < board.length; i++) {
    		board[i] = " ";
    	}
    	document.getElementById("topleft").innerHTML = " ";
    	document.getElementById("topmid").innerHTML = " ";
    	document.getElementById("topright").innerHTML = " ";
    	document.getElementById("midleft").innerHTML = " ";
    	document.getElementById("midmid").innerHTML = " ";
    	document.getElementById("midright").innerHTML = " ";
    	document.getElementById("botleft").innerHTML = " ";
    	document.getElementById("botmid").innerHTML = " ";
    	document.getElementById("botright").innerHTML = " ";

    	$("#gameState").hide();
    	$("#buttons").hide();

    });
});

var turn = "X";
var board = [" ", " ", " ", " ", " ", " ", " ", " ", " "];
function takeTurn(element, idx) {
	if(board[idx] === " " && checkForWin() === 0) {
		board[idx] = turn;
		element.innerHTML = turn;
		if(turn === "X") {
			turn = "O";
		}
		else {
			turn = "X";
		}
    }

    //var state = checkForWin();
    if (checkForWin() == 1) {
	    document.getElementById("gameState").innerHTML = "X wins" + "<br />" + "Play again?";
	    $("#gameState").show();
	    $("#buttons").show();
    }
   	else if (checkForWin() == 2) {
  		document.getElementById("gameState").innerHTML = "O wins" + "<br />" + "Play again?";
  		$("#gameState").show();
  		$("#buttons").show();
	}
	else if (checkForWin() == 3) {
		document.getElementById("gameState").innerHTML = "Tie" + "<br />" + "Play again?";
		$("#gameState").show();
		$("#buttons").show();
	}
}

function checkForWin() {
	if(board[0] == board[1] && board[1] == board[2] && board[2] != " ") {
		if(board[0] == "X") {
			return 1;
		}
		else if(board[0] == "O") {
			return 2;
		}
	}

	else if(board[0] == board[3] && board[3] == board[6] && board[6] != " ") {
		if(board[0] == "X") {
			return 1;
		}
		else if(board[0] == "O") {
			return 2;
		}
	}

	else if(board[2] == board[5] && board[5] == board[8] && board[8] != " ") {
		if(board[2] == "X") {
			return 1;
		}
		else if(board[2] == "O") {
			return 2;
		}
	}

	else if(board[6] == board[7] && board[7] == board[8] && board[8] != " ") {
		if(board[6] == "X") {
			return 1;
		}
		else if(board[6] == "O") {
			return 2;
		}
	}

	else if(board[0] == board[4] && board[4] == board[8] && board[8] != " ") {
		if(board[0] == "X") {
			return 1;
		}
		else if(board[0] == "O") {
			return 2;
		}
	}

	else if(board[2] == board[4] && board[4] == board[6] && board[6] != " ") {
		if(board[2] == "X") {
			return 1;
		}
		else if(board[2] == "O") {
			return 2;
		}
	}

	else if(board[1] == board[4] && board[4] == board[7] && board[7] != " ") {
		if(board[1] == "X") {
			return 1;
		}
		else if(board[1] == "O") {
			return 2;
		}
	}

	else if(board[3] == board[4] && board[4] == board[5] && board[5] != " ") {
		if(board[3] == "X") {
			return 1;
		}
		else if(board[3] == "O") {
			return 2;
		}
	}

	for(var i=0; i < board.length; i++) {
		if(board[i] == " ") {
			return 0;
		}
	}

	return 3;

}
