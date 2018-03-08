setTimeout(function() {
	var less = getCookieCountdown('CODOCKVA');
	if(less === false) {
		countdown(2880);
	}
	else {
		countdown(0);
	}
}, 100);
	
function countdown(setTimer) {
	// config with cookie
	var countDownDate, direct;
	var cookie_name = document.cookie.indexOf('CODOCKVA=');
	if(cookie_name === -1) {
		// set 5 minute from now
		var rightnow = new Date();
		Date.prototype.addMinutes = function(minutes) {
			this.setMinutes(this.getMinutes() + minutes);
			return this;
		};
		
		countDownDate = new Date(rightnow.addMinutes(setTimer)).getTime(); console.log(rightnow.addMinutes(setTimer));
		document.cookie = "CODOCKVA="+countDownDate+"; Path=/;";
	}
	else {
		countDownDate = getCookieCountdown('CODOCKVA');
	}
		
	var y = setInterval(function() {			
		// Get todays date and time
		var nowy = new Date().getTime();
		
		// Find the distance between now an the count down date
		var distanced = countDownDate - nowy;
		
		// Time calculations for days, hours, minutes and seconds
		var days = Math.floor(distanced / (1000 * 60 * 60 * 24));
		var hours = Math.floor((distanced % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((distanced % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((distanced % (1000 * 60)) / 1000);
		document.getElementById("divotp").innerHTML = '<div>'+days+' Hari '+numbering(hours)+' Jam '+numbering(minutes)+' Menit '+numbering(seconds)+' Detik</div>';
		
		// If the count down is over, write some text 
		if(distanced < 0) {
			clearInterval(y);
			document.getElementById("divotp").style.display = 'Sudah Habis';		
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