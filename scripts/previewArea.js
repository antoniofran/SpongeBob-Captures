//maintaince

var previewAreaActive = false;

var enableArrows = false;

var actionGlobalVar = "";

//previewArea elements

var previewAreaContainer = document.getElementById("previewAreaContainer");

var previewAreaPrevLink = document.getElementById("previewAreaPrevLink");

var previewAreaImageContainer = document.getElementById("previewAreaImageContainer");

var previewAreaNextLink = document.getElementById("previewAreaNextLink");

var pageOverlay = document.getElementById("pageOverlay");

//listOfImages elements

var listOfImages = document.getElementById("listOfImages").getElementsByTagName("a");

var firstImageIndex = 0;
var lastImageIndex = listOfImages.length - 1;

var currentImageIndex = 0;

//currentImageDisplayCode variables

var currentImageVisibleDisplayCode = "";

var currentImageHiddenDisplayCode = "";

//launchSlideshow function

function launchSlideshow() {
	showImage("null","launchSlideshow");
}

//onlick function

function showImage(element,action) {
	//calculating currentImageIndex

	switch (action) {
		case "launchSlideshow": currentImageIndex = 0; break;
		case "previewImage": currentImageIndex = parseInt(element.firstChild.alt) - 1; break;
		case "replaceImage": currentImageIndex = parseInt(element.parentElement.parentElement.firstChild.alt) - 1; break;
		case "removeImage": currentImageIndex = parseInt(element.parentElement.parentElement.firstChild.alt) - 1; break;
	}

	actionGlobalVar = action;

	//general settings

	fillPreviewArea();

	pageOverlay.style.visibility = "visible";

	previewAreaContainer.style.visibility = "visible";

	previewAreaActive = true;
}

//fillPreviewArea function

function fillPreviewArea() {
	//disablingArrows by defualt

	enableArrows = false;

	//currentPreviwAreaTitle

	var currentPreviwAreaTitle = "";

	switch (actionGlobalVar) {
		case "launchSlideshow": currentPreviwAreaTitle = "Image slideshow"; break;
		case "previewImage": currentPreviwAreaTitle = "Image slideshow"; break;
		case "replaceImage": currentPreviwAreaTitle = "Image replacing"; break;
		case "removeImage": currentPreviwAreaTitle = "Image removing"; break;
	}

	//get currentImageHeight

	var currentImageHeight = 0.00;

	switch (listOfImages[0].className) {
		case "imgWdth510": currentImageHeight = 356.25; break;
		case "imgWdth512": currentImageHeight = 356.25; break;
		case "imgWdth680": currentImageHeight = 267.44; break;
		case "imgWdth682": currentImageHeight = 267.44; break;
	}

	var preLoaderCode = '<p style="height:' + currentImageHeight + 'px"><img style="position:relative;top:' + ((currentImageHeight/2)-32) + 'px" src="images/icons/Preloader.gif" alt="preloader" id="preloaderImage"></p>';

	//preparing previewArea

	previewAreaPrevLink.style.visibility = "hidden";

	previewAreaImageContainer.innerHTML = '<p style="margin-bottom: 5px;">' + currentPreviwAreaTitle + '</p>' + preLoaderCode;

	previewAreaNextLink.style.visibility = "hidden";

	//leftArrow

	if (currentImageIndex > firstImageIndex) {
		previewAreaPrevLink.style.visibility = "visible";

		previewAreaPrevLink.onclick = function() {
			if (enableArrows) {
				currentImageIndex--;
				fillPreviewArea();
			}
		};
	}

	//filling previewAreaImageContainer

	var currentImageFullPath = listOfImages[currentImageIndex].href;

	var currentImageFileName = listOfImages[currentImageIndex].innerHTML;

	currentImageVisibleDisplayCode = '<p style="margin-bottom: 5px;">' + currentPreviwAreaTitle + '</p><a href="' + currentImageFullPath + '" download="' + currentImageFileName + '"><img src="' + currentImageFullPath + '"></a><p>' + (currentImageIndex + 1) + ' / ' + (lastImageIndex + 1) + '</p>';

	currentImageHiddenDisplayCode = '<a href="#" style="position:absolute; top:0px; left:0px; visibility:hidden;"><img src="' + currentImageFullPath + '" onload="hidePreloader();"></a><p>' + (currentImageIndex + 1) + ' / ' + (lastImageIndex + 1) + '</p>';

	previewAreaImageContainer.innerHTML += currentImageHiddenDisplayCode;

	//rightArrow

	if (currentImageIndex < lastImageIndex) {
		previewAreaNextLink.style.visibility = "visible";

		previewAreaNextLink.onclick = function() {
			if (enableArrows) {
				currentImageIndex++;
				fillPreviewArea();
			}
		};
	}
}

//hidePreloader function

function hidePreloader() {
	previewAreaImageContainer.innerHTML = currentImageVisibleDisplayCode;

	enableArrows = true;
}

//closePreviewArea function

function closePreviewArea() {
	previewAreaPrevLink.style.visibility = "hidden";
	previewAreaNextLink.style.visibility = "hidden";

	previewAreaContainer.style.visibility = "hidden";

	pageOverlay.style.visibility = "hidden";

	enableArrows = false;

	previewAreaActive = false;
}

//onKeyDown event

document.onkeydown = function(element) {
	if (previewAreaActive && enableArrows) {
		if (window.event) { // IE
			if (element.keyCode === 37 && currentImageIndex > firstImageIndex) {
				previewAreaPrevLink.style.visibility = "visible";
				currentImageIndex--;
				fillPreviewArea();
			} else if (element.keyCode === 39 && currentImageIndex < lastImageIndex) {
				previewAreaPrevLink.style.visibility = "visible";
				currentImageIndex++;
				fillPreviewArea();
			} else if (element.keyCode === 27) {
				closePreviewArea();
			}
		} else if (element.which) { // Netscape/Firefox/Opera
			if (element.which === 37 && currentImageIndex > firstImageIndex) {
				previewAreaPrevLink.style.visibility = "visible";
				currentImageIndex--;
				fillPreviewArea();
			} else if (element.which === 39 && currentImageIndex < lastImageIndex) {
				previewAreaPrevLink.style.visibility = "visible";
				currentImageIndex++;
				fillPreviewArea();
			} else if (element.which === 27) {
				closePreviewArea();
			}
		}
	}
};