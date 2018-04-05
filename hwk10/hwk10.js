var firstClicked = false;
var secondClicked = false;
var matching = false;
var val1 = undefined;
var tries = 0;
var timeOut;

function match(btn){
	if ($(btn.firstElementChild).css('display') == 'block'){
		return;
	}

	if (firstClicked == false){
		firstClicked = btn;
		$(firstClicked.firstElementChild).show();
		val1 = btn.value;
		timeOut = setTimeout(reset, 3000);
	}

	else if (secondClicked == false){
		secondClicked = btn;
		$(secondClicked.firstElementChild).show();
		matching = check(btn.value);
		clearTimeout(timeOut);
		if (matching){
			reset();
		}
		else{
			timeOut = setTimeout(reset, 1000);
		}
	}

	else {
		return;
	}
}

function check(val2){
	if (val1 == val2){
		return true;
	}
	else {
		return false;
	}
}

function reset(){
	if (matching == false){
		$(firstClicked.firstElementChild).hide();
		if (secondClicked != false){
			$(secondClicked.firstElementChild).hide();
		}
	}

	firstClicked = false;
	secondClicked = false;
	matching = false;
	val1 = undefined;
	tries++
}

// I did this before I read the directions. I'm not changing it.
// It works but not done the way the directions say to do it.