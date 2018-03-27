document.getElementById("calcForm").calc.onclick = mortgage;

function mortgage(){
	var elt = document.getElementById("calcForm");

	var p = parseFloat(elt.principal.value);
	var i = parseFloat(elt.interest.value);
	var t = Math.round(parseFloat(elt.months.value));
	var r = i/1200;

	if (p < 0 || i < 0 || t < 0){
		alert("Enter Positive Numbers");
		return false;
	}

	if (!(isNumeric(p) && isNumeric(i) && isNumeric(t))){
		alert("Enter Numbers");
		return false;
	}

	var R = p * r / (1 - (1 / Math.pow((1 + r),t))); 
	var sum = R*t;
	var int = sum - p;

	elt.monthlyPay.value = R.toFixed(2);
	elt.sum.value = sum.toFixed(2);
	elt.interestPaid.value = int.toFixed(2);
}

function isNumeric(n) {
		return !isNaN(parseFloat(n)) && isFinite(n);
}