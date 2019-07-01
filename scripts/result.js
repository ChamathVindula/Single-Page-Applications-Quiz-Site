/**
*Author: Chamath Vindula SId - 101887796
*Target: register.html
*Purpose: This file is for adding JavaScript to validate form inputs
*Created: 4/17/2018
*Last updated: 4/18/2018
*Credits:...
*/

"use strict";

//Checks whether the number of attempts exceeds 3 and if so does not allow user to retry quiz
function checkAttempts(){
	var result = true;
	var attempts = localStorage.attempts;
	if (attempts == 3){
		result = false;
		alert("Sorry you have reached your maximum attempt limit!");
	}
	return result;
}
//Fiils the local Storage data of user name, id, score, number of attempts to results.html fileds
function fill_data(){
	document.getElementById("user_name").textContent = localStorage.fname + " " + localStorage.lname;
	document.getElementById("user_id").textContent = localStorage.id;
	document.getElementById("score").textContent = localStorage.user_score;
	document.getElementById("no_of_attempts").textContent = localStorage.attempts;
}

function init(){
	fill_data();									//calls the fill_data function to fill the user info. and quiz data from local storage 
	var retry = document.getElementById("retry");
	retry.onclick = checkAttempts;					//initiates checkAttempts function if the retry link is clicked
}

window.onload = init;