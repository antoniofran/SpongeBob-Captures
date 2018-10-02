function openRandomGallery() {
	
	var listOfGalleries = document.getElementsByClassName("galleryLink");

	var randomIndex = Math.floor( Math.random() * listOfGalleries.length ); 
	
	window.location.href = listOfGalleries[randomIndex].href;
	
}