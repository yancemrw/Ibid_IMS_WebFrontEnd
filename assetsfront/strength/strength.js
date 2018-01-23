function passwordStrength(password) {
	var desc = new Array(), value = new Array(), score = 0;
	desc[0] = "";
	desc[1] = "Lemah";
	desc[2] = "Cukup";
	desc[3] = "Sedang";
	desc[4] = "Kuat";
	desc[5] = "Sangat Kuat";

	//if password bigger than 6 give 1 point
	if ( password.length > 6 ) score++;

	//if password has both lower and uppercase characters give 1 point	
	if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;

	//if password has at least one number give 1 point
	if ( password.match(/\d+/) ) score++;

	//if password has at least one special caracther give 1 point
	if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )	score++;

	//if password bigger than 12 give another 1 point
	if ( password.length > 12 ) score++;
	
	value.strength = "strength"+score;
	value.descstrength = desc[score];
	
	return value;
}