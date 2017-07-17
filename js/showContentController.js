var countdown;
var countdown_number;
var flag = "Fade Out";

function countdown_init() {
	countdown_number = 10;
	countdown_trigger();
}

function countdown_trigger() {
	if(countdown_number > 0) {
		countdown_number--;
		if(countdown_number > 0) {
			countdown = setTimeout('countdown_trigger()', 100);
		}
		if(countdown_number == 0){
			document.getElementById('myImg').style.visibility="visible";
			document.getElementById("myImg").className = "fade-in";
			document.getElementById('countdown_text').innerHTML = "";
		}else{
			document.getElementById('countdown_text').innerHTML = "<img src='img/loading51.gif' width='50'/>";
			document.getElementById('myImg').style.visibility="hidden";
			document.getElementById("myImg").className = "fade-out";
			
		}
	}
}
