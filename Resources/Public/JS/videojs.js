// responsive videoJS player
videojs("videoplayer", {"height":"auto", "width":"auto"}).ready(function(){
	var myPlayer = this; // Store the video object
	var aspectRatio = 5/12; // Make up an aspect ratio
	function resizeVideoJS(){
		var width = document.getElementById(myPlayer.id()).parentElement.offsetWidth; // Get the parent element's actual width
		myPlayer.width(width).height( width * aspectRatio ); // Set width to fill parent element, Set height
	}
	resizeVideoJS(); // Initialize the function
	window.onresize = resizeVideoJS; // Call the function on resize
});