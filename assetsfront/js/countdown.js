function countdown() {
	// config with cookie
	var countDownDate, setTimer1 = 1;
	var cookie_name = document.cookie.indexOf('countdown_cookie=');
	if(cookie_name === -1) {
		// set 5 minute from now
		var rightnow = new Date();
		Date.prototype.addMinutes = function(minutes) {
			this.setMinutes(this.getMinutes() + minutes);
			return this;
		};
		
		countDownDate = new Date(rightnow.addMinutes(setTimer1)).getTime();
		document.cookie = "countdown_cookie="+countDownDate+"; Path=/;";
	}
	else {
		countDownDate = getCookieCountdown('countdown_cookie');
	}
	
	// hide link
	document.getElementById('reotp').style.display = 'none';

	// Update the count down every 1 second
	var x = setInterval(function() {

		// Get todays date and time
		var now = new Date().getTime();
		
		// Find the distance between now an the count down date
		var distance = countDownDate - now;
		
		// Time calculations for days, hours, minutes and seconds
		var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		document.getElementById("countdown-id").innerHTML = '<div style="margin: 30px 0;">'+numbering(hours) + ':' + numbering(minutes) + ':' + numbering(seconds)+'</div>';
		
		// If the count down is over, write some text 
		if(distance < 0) {
			clearInterval(x);
			deleteCookieCountdown('countdown_cookie');
			document.getElementById("countdown-id").innerHTML = '<button class="btn btn-green">Submit</button>';
			document.getElementById('reotp').style.display = 'block';
		}
	}, 1000);
}

function numbering(value) {
	return (value < 10) ? '0'+value : value;
}

function getCookieCountdown(name) {
    var pattern = RegExp(name + "=.[^;]*")
    matched = document.cookie.match(pattern)
    if(matched) {
        var cookie = matched[0].split('=')
        return cookie[1]
    }
    return false
}

function deleteCookieCountdown(name) {
	document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}