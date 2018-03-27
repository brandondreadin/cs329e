var x = true;
var board = document.getElementsByTagName("input");
var winner = false;


function tictac(btn){
	if (winner){
		return;
	}

	if (btn.value == ""){
		if (x){
			btn.value = "X";
			x = false;
			if (won("X")){
				winner = true;
				alert("X has won");
			}
		}
		else{
			btn.value = "O";
			x = true;
			if (won("O")){
				winner = true;
				alert("O has won");
			}
		}
	}
	else {
		return;
	}
}

function won(player){
	/*
		Board
		0 1 2
		3 4 5
		6 7 8
	*/
	if (board[0].value == player){
		// horizonal
		if (board[1].value == player && board[2].value == player){
			return true;
		}

		// vertical
		if (board[3].value == player && board[6].value == player){
			return true;
		}

		//diagonal
		else if (board[4].value == player && board[8].value == player){
			return true;
		}
	}

	if (board[1].value == player && board[4].value == player && board[7].value == player){
		return true;
	}

	if (board[2].value == player){
		// vertical
		if (board[5].value == player && board[8].value == player){
			return true;
		}

		//diagonal
		if (board[4].value == player && board[6].value == player){
			return true;
		}
	}

	if (board[3].value == player && board[4].value == player && board[5].value == player){
		return true;
	}

	if (board[6].value == player && board[7].value == player && board[8].value == player){
		return true;
	}

	else{
		return false;
	}
}