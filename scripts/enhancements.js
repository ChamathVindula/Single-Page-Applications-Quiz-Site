/**
*Author: Chamath Vindula SId - 101887796
*Target: quiz.html
*Purpose: This file is for adding JavaScript enhancement to quiz page
*Created: 4/23/2018
*Last updated: 4/23/2018
*Credits:...
*/

"use strict"

function countdownto() {

  // The timer works properly but i could not figure out a method to set an exact time for the timer, right now it generates a random time between 5 minutes
  var countDownDate = new Date("Dec 1, 2018 22:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    
    
    var minutes = Math.floor((distance % (100 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if ((minutes == 0) && (seconds == 0)) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
        alert("You have run out of time!");
        //document.getElementById("form1").submit();
    }
}, 1000);
  }

