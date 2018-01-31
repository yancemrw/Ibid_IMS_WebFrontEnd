var less = getCookieCountdown('CODOCK'), checkpoint = getCookieCountdown('WRG');
if(less !== false) {
	countdown(0, less);
}

if(checkpoint === '9') {
	setTimeout(function() {
		var isbtn = document.getElementById("btn-submit");
		if(isbtn !== null) {
			document.getElementById("countdown-id").innerHTML = '<div style="margin: 40px 0;">OTP sudah kadaluarsa<br />Silahkan hubungi customer service kami</div>';
			document.getElementById('reotp').style.display = 'none';
		}
	}, 1000);
}
	
function countdown(setTimer, timerCookie = false) {
	// config with cookie
	var countDownDate;
	var cookie_name = document.cookie.indexOf('CODOCK=');
	if(timerCookie === true) {
		countDownDate = timerCookie;
	}
	else if(cookie_name === -1) {
		// set 5 minute from now
		var rightnow = new Date();
		Date.prototype.addMinutes = function(minutes) {
			this.setMinutes(this.getMinutes() + minutes);
			return this;
		};
		
		countDownDate = new Date(rightnow.addMinutes(setTimer)).getTime();
		document.cookie = "CODOCK="+countDownDate+"; Path=/;";
	}
	else {
		countDownDate = getCookieCountdown('CODOCK');
	}

	// Update the count down every 1 second
	var x = setInterval(function() {
		// hide link
		document.getElementById('reotp').style.display = 'none';

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
			deleteCookieCountdown('CODOCK');
			var checkpoint2 = getCookieCountdown('WRG');console.log(checkpoint2);
			switch(checkpoint2) {
				case '9': document.getElementById("countdown-id").innerHTML = '<div style="margin: 40px 0;">OTP sudah kadaluarsa<br />Silahkan hubungi customer service kami</div>';
				case '3': document.getElementById("countdown-id").innerHTML = '<div style="margin: 40px 0;">Sedang reload halaman</div>'; location.reload();
				case '6': document.getElementById("countdown-id").innerHTML = '<div style="margin: 40px 0;">Sedang reload halaman</div>'; location.reload();
			}			
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