/**
*Author: Chamath Vindula SId - 101887796
*Target: register.html
*Purpose: This file is for adding JavaScript to validate form inputs
*Created: 4/17/2018
*Last updated: 4/18/2018
*Credits:...
*/

"use strict";
var idarray = [];

//checks wether the user has used up his three attempts and if so returns a value of false 
function validateUser(){
	var result = true;
	var fname = document.getElementById("fname").value;
	var lname = document.getElementById("lname").value;
	var id = document.getElementById("stID").value;
	var attempts = 0;

	for(var count =0; count < idarray.length; count++){ 
		if(idarray[count] == id){						//checks wether the user id is in the idarray consisting of all previously entered ids
			attempts += 1;
		}
	}
	if (attempts == 0){									// if id not in array it is appended to array
		idarray.push(id);
		attempts += 1;
		result = true;
		localStorage.attempts = attempts;
		localStorage.id = id;
		localStorage.fname = fname;
		localStorage.lname = lname;		
	}
	if (attempts == 4){									// if number of attempts is reached user cannot submit quiz form
		alert("Sorry you have reached your maximum attempt limit!");
		result = false;
	}
	if (attempts < 4){									// if number of attempts is less than 3 then user can attempt quiz
		idarray.push(id);
		result = true;
		localStorage.attempts = attempts;
		localStorage.id = id;
		localStorage.fname = fname;
		localStorage.lname = lname;	
	}
	return result;
}

//Check whether the questions without a required attribute in html have been anwsered and if yes returns a value of true 
function checkNonRequiredQuestions(){
	var result = false;
	if (validateUser()){
		result = true;	
		var check1 = document.getElementById("check1").checked;		
		var check2 = document.getElementById("check2").checked;
		var check3 = document.getElementById("check3").checked;
		var check4 = document.getElementById("check4").checked;
		var check5 = document.getElementById("check5").checked;
		var check6 = document.getElementById("check6").checked;
		var check7 = document.getElementById("check7").checked;
		var check8 = document.getElementById("check8").checked;
		var check9 = document.getElementById("check9").checked;
		var check10 = document.getElementById("check10").checked;
		if(!(check1) && !(check2) && !(check3) && !(check4) && !(check5)){	// checkes wether atleast one checkbox has been selected for question 1
			alert("Please try the JavaScript frameworks question");
			result = false;
		}
		if(!(check6) && !(check7) && !(check8) && !(check9) && !(check10)){	// checkes wether atleast one checkbox has been selected for question 2
			alert("Please try the AJAX MCQ question");
			result = false;
		}
	}
	return result;

}
//checks the user entered anwsers against the saves marking script and if score is greater than zero, returns a value of true
function validateAnwsers(){
	var result = false;
	if (checkNonRequiredQuestions()){
	
		var score = 0;
		//anwser script	
		var correctAnwser1 = "single page application";
		var correctAnwser2 = "dynamically";
		var correctAnwser3 = "ajax";
		var CorrectAnwser4 = document.getElementById("radio4").checked;
		var CorrectAnwser5_1 = document.getElementById("check1").checked;
		var CorrectAnwser5_2 = document.getElementById("check2").checked;
		var CorrectAnwser5_3 = document.getElementById("check3").checked;
		var CorrectAnwser5_4 = document.getElementById("check4").checked;
		var CorrectAnwser5_5 = document.getElementById("check5").checked;
		var CorrectAnwser6_1 = document.getElementById("check6").checked;
		var CorrectAnwser6_2 = document.getElementById("check7").checked;
		var CorrectAnwser6_3 = document.getElementById("check8").checked;
		var CorrectAnwser6_4 = document.getElementById("check9").checked;
		var CorrectAnwser6_5 = document.getElementById("check10").checked;
		var correctAnwser7 = "Hackers can use cross-site scripting on Single page applications.";
		var correctAnwser8 = 2015;

		//User inputs for the the text based and select questions
		var anwser1 = document.getElementById("text1").value;
		var anwser2 = document.getElementById("text2").value;
		var anwser3 = document.getElementById("text3").value;
		var anwser7 = document.getElementById("SelectOption").value;
		var anwser8 = document.getElementById("number_question").value;

		if (anwser1.toLowerCase() == correctAnwser1){
			score += 2;
		}
		if (anwser2.toLowerCase() == correctAnwser2){
			score += 2;
		}
		if (anwser3.toLowerCase() == correctAnwser3){
			score += 2;
		}
		if (CorrectAnwser4){
			score += 2;
		}
		if (CorrectAnwser5_1 && CorrectAnwser5_3 && CorrectAnwser5_4 && !(CorrectAnwser5_2) && !(CorrectAnwser5_5)){
			score += 2;
		}
		if (CorrectAnwser6_1 && CorrectAnwser6_2 && CorrectAnwser6_3 && CorrectAnwser6_4 && CorrectAnwser6_5){
			score += 2;
		}
		if (anwser7 == correctAnwser7){
			score += 2;
		}
		if (anwser8 == correctAnwser8){
			score += 2;
		}
		if (score != 0){
			result = true;
			localStorage.user_score = score;
		}else {alert("You have scored 0 in the quiz!"+"\n\t"+"  Please try again");}
		
	}
	return result;
}


function init(){
	var form = document.getElementById("form1");
	form.onsubmit = validateAnwsers;            // Runs the validateAnwsers function on form submit
	var form = document.getElementById("stID");
  	form.onblur = countdownto(); 
}

window.onload = init;