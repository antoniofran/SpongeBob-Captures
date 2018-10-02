var settingsFormContainer = document.getElementById("settingsFormContainer");

var pageOverlay = document.getElementById("pageOverlay");

function openSettingsForm() {
	pageOverlay.style.visibility = "visible";
	
	settingsFormContainer.style.visibility = "visible";
}

function closeSettingsForm() {
	settingsFormContainer.style.visibility = "hidden";

	pageOverlay.style.visibility = "hidden";
}

function validateSubmit() {

	//initialize

	var allowSubmit = true;

	var errorMessage = '';

	//prodInput

	var prodInput = document.getElementById("prodInput");
	
	var prodInputText = document.getElementById("prodInputText");

	if ( prodInput.value === '' ) {
		errorMessage = 'It must be filled.';
	} else {
		errorMessage = '';
	}
	
	if ( errorMessage === '' ) {
		prodInputText.innerHTML = '';

		prodInputText.style = '';
	} else {
		prodInputText.innerHTML = errorMessage;

		prodInputText.style = 'color: white; background: black; width: 150px; padding: 1px;';

		allowSubmit = false;
	}

	//pageInput

	var pageInput = document.getElementById("pageInput");
	
	var pageInputText = document.getElementById("pageInputText");

	if ( pageInput.value === '' ) {
		errorMessage = 'It must be filled.';
	} else if ( !isNumeric(pageInput.value) ) {
		errorMessage = 'It must ba a number.';
	} else if ( parseInt(pageInput.value) <= 0) {
		errorMessage = 'It must be greater than "0".';
	} else {
		errorMessage = '';
	}
	
	if ( errorMessage === '' ) {
		pageInputText.innerHTML = '';

		pageInputText.style = '';
	} else {
		pageInputText.innerHTML = errorMessage;

		pageInputText.style = 'color: white; background: black; width: 150px; padding: 1px;';

		allowSubmit = false;
	}

	//limitInput

	var limitInput = document.getElementById("limitInput");
	
	var limitInputText = document.getElementById("limitInputText");

	if ( limitInput.value === '' ) {
		errorMessage = 'It must be filled.';
	} else if ( !isNumeric(limitInput.value) ) {
		errorMessage = 'It must ba a number.';
	} else if ( parseInt(limitInput.value) <= 0) {
		errorMessage = 'It must be greater than "0".';
	} else {
		errorMessage = '';
	}
	
	if ( errorMessage === '' ) {
		limitInputText.innerHTML = '';

		limitInputText.style = '';
	} else {
		limitInputText.innerHTML = errorMessage;

		limitInputText.style = 'color: white; background: black; width: 150px; padding: 1px;';

		allowSubmit = false;
	}

	//return

	return allowSubmit;
}

function isNumeric(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}