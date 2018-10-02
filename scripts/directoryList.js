var directoryListContainer = document.getElementById("directoryListContainer");

var pageOverlay = document.getElementById("pageOverlay");

function openDirectoryList() {
	pageOverlay.style.visibility = "visible";
	
	directoryListContainer.style.visibility = "visible";
}

function closeDirectoryList() {
	directoryListContainer.style.visibility = "hidden";

	pageOverlay.style.visibility = "hidden";
}