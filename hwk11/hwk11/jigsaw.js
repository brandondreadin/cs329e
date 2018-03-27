/*
 Define variables for the values computed by the grabber event 
 handler but needed by mover event handler
*/
var diffX, diffY, theElement;


// The event handler function for grabbing the word
function grabber(event) {

// Set the global variable for the element to be moved

  theElement = event.currentTarget;

// Determine the position of the word to be grabbed,
//  first removing the units from left and top

  var posX = parseInt(theElement.style.left);
  var posY = parseInt(theElement.style.top);

// Compute the difference between where it is and
// where the mouse click occurred

  diffX = event.clientX - posX;
  diffY = event.clientY - posY;

// Now register the event handlers for moving and
// dropping the word

  document.addEventListener("mousemove", mover, true);
  document.addEventListener("mouseup", dropper, true);

// Stop propagation of the event and stop any default
// browser action

  event.stopPropagation();
  event.preventDefault();

}  //** end of grabber

// *******************************************************

// The event handler function for moving the word

function mover(event) {
// Compute the new position, add the units, and move the word

  theElement.style.left = (event.clientX - diffX) + "px";
  theElement.style.top = (event.clientY - diffY) + "px";

// Prevent propagation of the event

  event.stopPropagation();
}  //** end of mover

// *********************************************************
// The event handler function for dropping the word

function dropper(event) {

// Unregister the event handlers for mouseup and mousemove

  document.removeEventListener("mouseup", dropper, true);
  document.removeEventListener("mousemove", mover, true);

// Prevent propagation of the event

  event.stopPropagation();
}  //** end of dropper

// OUR CODE
var n = Math.ceil(Math.random() * 3);
var source;
if (n == 1){
	source = "images1";
} else if (n == 2) {
	source = "images2";
} else {
	source = "images3";
}

var imagesArray = [["img1-1.jpg", "img1-2.jpg", "img1-3.jpg", "img1-4.jpg", "img1-5.jpg", "img1-6.jpg", "img1-7.jpg", "img1-8.jpg", "img1-9.jpg", "img1-10.jpg", "img1-11.jpg", "img1-12.jpg"], 
					["img2-1.jpg", "img2-2.jpg", "img2-3.jpg", "img2-4.jpg", "img2-5.jpg", "img2-6.jpg", "img2-7.jpg", "img2-8.jpg", "img2-9.jpg", "img2-10.jpg", "img2-11.jpg", "img2-12.jpg"], 
					["img3-1.jpg", "img3-2.jpg", "img3-3.jpg", "img3-4.jpg", "img3-5.jpg", "img3-6.jpg", "img3-7.jpg", "img3-8.jpg", "img3-9.jpg", "img3-10.jpg", "img3-11.jpg", "img3-12.jpg"]];


var n = Math.floor(Math.random()*3);
var s = n+1
var images = imagesArray[n];

var xyid = ["00", "01", "02", "03", "10", "11", "12", "13", "20", "21", "22", "23"];
count = 0;

while (count < 12){
	var m = Math.floor(Math.random() * images.length);
	var str = "./images" + s.toString() + "/" + images[m];
	document.getElementById(xyid[count]).src = str;
	images.splice(m, 1);
	count++;
}

var clock = setInterval(timer, 1000);
var secs = 0;
var mins = 0;
var hours = 0;
var time = document.getElementById("time");

function timer(){
  secs++;
  if (secs==60){
    secs=0;
    mins++;
  }
  else if (mins == 60){
    mins=0;
    hours++;
  }

  time.value = hours + ":" + mins + ":" + secs;
}

function stopTime(){
  clearInterval(clock);
}