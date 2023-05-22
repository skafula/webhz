
function check() {
	var rendben = true;

	//********************************************************
	//* Név ellenőrzése               						 *
	//********************************************************

	var nev = document.getElementById("nev");
	if (nev) {
		if (nev.value.length < 8) {
				rendben = false;
				nev.style.background = '#fad0d0';
		} else {
			nev.style.background = '#d1f8d1';
		}
	}

	//********************************************************
	//* Emil ellenőrzése               						 *
	//********************************************************

	var email = document.getElementById("email");
	if (email) {
		var checkPattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if (!checkPattern.test(email.value)) {
			rendben = false;
			email.style.background = '#fad0d0';
		} else {
			email.style.background = '#d1f8d1';
		}
	}

	//********************************************************
	//* Darab ellenőrzése               					 *
	//********************************************************

	var darab = document.getElementById("darab");
	if (darab) {

		if (darab.value < 1 )
		{
			rendben = false;
			darab.style.background = '#fad0d0';
		} else if (darab.value > 10 ) {
			rendben = false;
			darab.style.background = '#fad0d0';
		} else {
			darab.style.background = '#d1f8d1';
		}
	}


	//********************************************************
	//* Nap ellenőrzése               						 *
	//********************************************************


	var nap = document.getElementById("nap");
	if (nap) {
		if (nap.value.length==0) {
			rendben = false;
			nap.style.background = '#fad0d0';
		} else {
			nap.style.background = '#d1f8d1';
		}
	}



	return rendben;
}