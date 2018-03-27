function grade(){
	var correct = 0;

	var formElt = document.getElementById("quiz");

	if (document.getElementById("q1a").checked){
		var a1 = document.getElementById("q1a").value;
	}
	else if (document.getElementById("q1b").checked){
		var a1 = document.getElementById("q1b").value;
	}

	if (document.getElementById("q2a").checked){
		var a2 = document.getElementById("q2a").value;
	}
	else if (document.getElementById("q2b").checked){
		var a2 = document.getElementById("q2b").value;
	}

	a3 = checkboxes("q3");
	a4 = checkboxes("q4");
	a5 = formElt.q5.value;
	a6 = formElt.q6.value;

	a5 = a5.toLowerCase().trim();
	a6 = a6.toLowerCase().trim();


	var answers = [a1, a2, a3, a4, a5, a6];
	for (i=0; i<6; i++){
		if (answers[i] === undefined || answers[i] === ""){
			var a = i + 1;
			alert("Answer question " + a);
			return false;
		}
	}


	if (a1 == "false"){correct++;}
	if (a2 == "true"){correct++;}
	if (a3 == "b"){correct++;}
	if (a4 == "d"){correct++;}
	if (a5 == "galaxy"){correct++;}
	if (a6 == "age"){correct++;}

	alert("Your grade is " + correct + "/ 6.");
}

function checkboxes(name){
	var numChecked = 0;
	var checks = document.getElementsByName(name);
	var value = undefined;
	for (var i=0; i<4; i++){
		if (checks[i].checked){
			numChecked++;
			if (numChecked > 1){return false;}
			value = checks[i].value;
		}
	}
	return value;
}