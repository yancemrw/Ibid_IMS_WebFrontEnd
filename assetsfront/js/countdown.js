setTimeout(function() {
	var less = getCookieCountdown('CODOCK'), checkpoint = getCookieCountdown('CHKPT');
	if(less === false) {
		if(checkpoint === false) {
			document.cookie = "CHKPT=1; Path=/;";
			countdown(2);
		}
		else {
			switch(checkpoint) {
				case '1': document.cookie = "CHKPT=2; Path=/;"; countdown(2); break;
				case '2': document.cookie = "CHKPT=3; Path=/;"; countdown(5); break;
				case '3': document.getElementById("countdown-id").innerHTML = '<div style="margin: 40px 0;">OTP sudah kadaluarsa<br />Silahkan hubungi customer service kami</div>';
						  document.getElementById("divreotp").style.display = 'none'; break;
			}
		}
	}
	else {
		switch(checkpoint) {
			case '1': countdown(2); break;
			case '2': countdown(2); break;
			case '3': countdown(5); break;
		}
	}
}, 100);
	
function countdown(setTimer) {
	// config with cookie
	var countDownDate, direct;
	var cookie_name = document.cookie.indexOf('CODOCK=');
	if(cookie_name === -1) {
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

	// hide link
	document.getElementById('reotp').style.display = 'none';
		
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
		//document.getElementById("countdown-id").innerHTML = '<button class="btn btn-green" id="btn-submit" onclick="refresh_button()">Submit</button>';
		document.getElementById("divreotp").innerHTML = '<div style="margin-bottom:40px">' + numbering(minutes) + ':' + numbering(seconds) + '</div>';
		
		// If the count down is over, write some text 
		if(distanced < 0) {
			clearInterval(y);
			deleteCookieCountdown('CODOCK');
			var checkpoint2 = getCookieCountdown('CHKPT');
			switch(checkpoint2) {
				case '3': document.getElementById("countdown-id").innerHTML = '<div style="margin: 40px 0;">OTP sudah kadaluarsa<br />Silahkan hubungi customer service kami</div>';
						  document.getElementById("divreotp").style.display = 'none';
				case '2': document.getElementById("divreotp").innerHTML = '<a id="reotp" href="'+linked+'">Kirim ulang kode verifikasi</a>';
				case '1': document.getElementById("divreotp").innerHTML = '<a id="reotp" href="'+linked+'">Kirim ulang kode verifikasi</a>';
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