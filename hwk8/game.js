var solvable = [[4, 6, 9, 7, "", 11, 5, 1, 14, 2, 15, 8, 3, 13, 10, 12],
				[4, 6, 5, 7, 14, 1, 2, 11, 9, 10, 13, 8, "", 15, 3, 12],
				[5, 11, 10, 8, 1, 15, 6, 14, 13, 2, 9, "", 3, 4, 7, 12],
				[5, 6, 10, 3, 14, 15, 12, 1, 8, 13, 4, 11, 9, 2, 7, ""],
				[10, 3, 11, "", 2, 12, 15, 1, 8, 9, 4, 6, 13, 7, 14, 5],
				[12, "", 7, 11, 5, 10, 15, 3, 9, 1, 6, 4, 13, 8, 2, 14],
				[2, 7, 11, 6, 5, "", 15, 13, 14, 10, 4, 9, 3, 1, 12, 8],
				[7, 2, 6, 11, "", 5, 13, 15, 10, 14, 9, 4, 1, 3, 8, 12],
				[12, 8, 3, 1, 4, 9, 14, 10, 15, 13, 5, "", 11, 6, 7, 2],
				[9, 8, 4, 10, 3, 12, 14, 1, 15, 2, 13, 6, "", 7, 5, 11]];

var n = Math.floor(Math.random()*10);
var board = solvable[n];
var btn_ids = ["b00", "b01", "b02", "b03", "b10", "b11", "b12", "b13", "b20", "b21", "b22", "b23", "b30", "b31", "b32", "b33"];

var index = 0;
for (i=0; i<16; i++){
	if (board[i]==""){
		index = i;
		break;
	}
}

var empty = btn_ids[index];

for (i=0; i<16; i++){
	document.getElementById(btn_ids[i]).value = board[i];
}

function game(id, val){
	row = id.charAt(1);
	column = id.charAt(2);
	
	if (up(row, column)){
		r = Number(row) - 1;
		i = "b" + r.toString() + column;
		document.getElementById(i).value = val;
		document.getElementById(id).value = "";
		empty = id;
		return;
	}

	if (right(row, column)){
		c = Number(column) + 1;
		i = "b" + row + c.toString();
		document.getElementById(i).value = val;
		document.getElementById(id).value = "";
		empty = id;
		return;
	}

	if (left(row, column)){
		c = Number(column) - 1;
		i = "b" + row + c.toString();
		document.getElementById(i).value = val;
		document.getElementById(id).value = "";
		empty = id;
		return;
	}

	if (down(row, column)){
		r = Number(row) + 1;
		i = "b" + r.toString() + column;
		document.getElementById(i).value = val;
		document.getElementById(id).value = "";
		empty = id;
		return;
	}
	
}

function up(r, c){
	if (r == 0){return false;}
	new_r = Number(r) - 1;
	new_r = new_r.toString();
	if (empty == "b" + new_r + c){return true;}
	else{return false;}
}

function right(r, c){
	if (c == 3){return false;}
	new_c = Number(c) + 1;
	new_c = new_c.toString();
	if (empty == "b" + r + new_c){return true;}
	else{return false;}
}

function left(r, c){
	if (c == 0){return false;}
	new_c = Number(c) - 1;
	new_c = new_c.toString();
	if (empty == "b" + r + new_c){return true;}
	else{return false;}
}

function down(r, c){
	if (r == 3){return false;}
	new_r = Number(r) + 1;
	new_r = new_r.toString();
	if (empty == "b" + new_r + c){return true;}
	else{return false;}
}