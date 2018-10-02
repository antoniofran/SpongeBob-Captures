<?php

	//processing queryString

	/**** Prod code ****/

	if ( isset($_GET['prod']) ) {
		$currProdCode = $_GET['prod'];
	} else {
		$currProdCode = '001a';
	}

	/**** Page count ****/

	if ( isset($_GET['page']) ) {
		$currPageNum = $_GET['page'];
	} else {
		$currPageNum = 1;
	}

	/**** Per page number ****/

	if ( isset($_GET['limit']) ) {
		$imgPerPageNum = $_GET['limit'];
	} else {
		$imgPerPageNum = 60;
	}

	//disovering galleryInfo

	/**** Content type ****/

	if ( ctype_digit($currProdCode[0]) ) {
		$contentType = 'episodes';
	} else if ( $currProdCode[0] == 'M' && ctype_digit($currProdCode[1]) ) {
		$contentType = 'movies';
	} else if ( $currProdCode[0] == 'S' && ctype_digit($currProdCode[1]) ) {
		$contentType = 'specials';
	} else if ( $currProdCode[0] == 'R' && ctype_digit($currProdCode[1]) ) {
		$contentType = 'rides';
	} else {
		$contentType = 'shorts';
	}


	/**** Navigation info ****/

	$prevProdCode = '';

	$currCapturesTitle = '';

	$nextProdCode = '';


	$capturesTitleList = glob('images/cards/'.$contentType.'/'.'*.jpg');

	$contentCount = count($capturesTitleList);


	for ($i = 0; $i < $contentCount; $i++) {

		$captTitleProdBegin = strpos($capturesTitleList[$i], $currProdCode);

		if ( $captTitleProdBegin !== false ) {

			//prevProdCode

			if ( $i > 0 ) {
				$prevProdCodeStrLen = strpos($capturesTitleList[$i - 1], ' - ') - $captTitleProdBegin;

				$prevProdCode = substr($capturesTitleList[$i - 1], $captTitleProdBegin, $prevProdCodeStrLen);
			}

			//currCapturesTitle

			$currProdCodeStrLen = strlen($currProdCode);

			$currCapturesTitle = substr($capturesTitleList[$i], $captTitleProdBegin + $currProdCodeStrLen + 3, -4);

			//nextProdCode

			if ( $i < ($contentCount - 1) ) {
				$nextProdCodeStrLen = strpos($capturesTitleList[$i + 1], ' - ') - $captTitleProdBegin;

				$nextProdCode = substr($capturesTitleList[$i + 1], $captTitleProdBegin, $nextProdCodeStrLen);
			}

		}
	}


	/**** List of images ****/

	$imageList = glob('content/'.$contentType.'/galleries/'.$currProdCode.' - '.$currCapturesTitle.'/'.'*.jpg');

	$imageCount = count($imageList);

	$pageCount = ceil( (double)$imageCount / $imgPerPageNum );


	/**** Image indexes ****/

	$lastImgIndex = $currPageNum * $imgPerPageNum - 1; //default: 79

	$firstImgIndex = $lastImgIndex - $imgPerPageNum + 1; //default: 0


	/**** Content text file ****/

	$displayPage = false;

	$contentTextFileArr = file('content/'.$contentType.'/'.$currProdCode.' - '.$currCapturesTitle.'.txt', FILE_IGNORE_NEW_LINES);

	if ( !empty($contentTextFileArr) ) {
		$displayPage = true;
	}

	$contentTextFileLinesCount = count($contentTextFileArr);


	/**** Current SpongeBob Title ****/

	switch ($currCapturesTitle) {
		case 'FUN': $currSpongeBobTitle = 'F.U.N.'; break;
		case 'Christmas Who': $currSpongeBobTitle = 'Christmas Who?'; break;
		case 'Can You Spare a Dime': $currSpongeBobTitle = 'Can You Spare a Dime?'; break;
		case 'Have You Seen This Snail': $currSpongeBobTitle = 'Have You Seen This Snail?'; break;
		case 'Mermaid Man and Barnacle Boy VI - The Motion Picture': $currSpongeBobTitle = 'Mermaid Man and Barnacle Boy VI: The Motion Picture'; break;
		case 'Krabs a la Mode': $currSpongeBobTitle = 'Krabs à la Mode'; break;
		case 'What Ever Happened to SpongeBob': $currSpongeBobTitle = 'What Ever Happened to SpongeBob?'; break;
		case 'I Heart Dancing': $currSpongeBobTitle = 'I ♥ Dancing'; break;
		case 'Hide and Then What Happens': $currSpongeBobTitle = 'Hide and Then What Happens?'; break;
		case 'Are You Happy Now': $currSpongeBobTitle = 'Are You Happy Now?'; break;
		case 'Glove World RIP': $currSpongeBobTitle = 'Glove World R.I.P.'; break;
		case 'Seance Shmeance': $currSpongeBobTitle = 'Séance Shméance'; break;
		case 'What\'s Eating Patrick': $currSpongeBobTitle = 'What\'s Eating Patrick?'; break;
		case 'The SpongeBob Movie - Sponge Out of Water': $currSpongeBobTitle = 'The SpongeBob Movie: Sponge Out of Water'; break;
		default: $currSpongeBobTitle = $currCapturesTitle; break;
	}
	

	/**** Current page range ****/

	$displayGallery = false;

	if ( ($currPageNum >= 1) && ($currPageNum <= $pageCount) ) {

		//enabling displayGallery

		$displayGallery = true;

		//calculating oddPageRange

		$pageLinksOddNumber = 15;

		$middlePageNumber = (int)($pageLinksOddNumber + 1) / 2;

		if ( $currPageNum >= $middlePageNumber ) { 
			$firstPageInRange = $currPageNum - ($middlePageNumber - 1);
			$lastPageInRange = $currPageNum + ($middlePageNumber - 1);
		} else {
			$firstPageInRange = 1;
			$lastPageInRange = $pageLinksOddNumber;
		}

		//pageCountOverflow

		if ( $lastPageInRange > $pageCount ) {
			$firstPageInRange -= ($lastPageInRange - $pageCount);

			$lastPageInRange = $pageCount;
		}

		if ( $firstPageInRange < 1 ) {
			$firstPageInRange = 1;
		}

	}

	//htmlDocument

	echo'
<!DOCTYPE html>
<html>
	<head>
		<title>'.$currProdCode.' | '.$currSpongeBobTitle.' | SpongeBob Captures</title>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="images/icons/Favicon.ico" type="image/x-icon"/>
		<link rel="stylesheet" type="text/css" href="styles/styles.css">
		<script type="text/javascript" src="/global/scripts/trackingCode.js"></script>
	</head>

	<body>
		<header id="hiddenElements">
			<div id="pageOverlay"></div>
			<div id="directoryListContainer">
				<div id="directoryListClose">
					<a href="#" id="directoryListCloseLink" onclick="closeDirectoryList();">X</a>
				</div>
				<div id="listOfImagesContainer">
					<h3>List of images in directory:</h3>
					<ul id="listOfImages">';

					for ($i = 0; $i < $imageCount; $i++) {
						$currImagePathSplit = explode('/',$imageList[$i]);

						$downloadJpgName = $currProdCode.' - '.$currCapturesTitle.' ('.str_pad(strval($i + 1), strlen($imageCount), "0", STR_PAD_LEFT).').jpg';

						$currImagePathSplit[count($currImagePathSplit)-1] = $downloadJpgName;

						$newImagePath = implode('/', $currImagePathSplit);

						if ($imageList[$i] != $newImagePath) {
							rename($imageList[$i],$newImagePath);
						}						

						$imageList[$i] = $newImagePath;

						echo '<li><a href="'.$imageList[$i].'" download="'.$downloadJpgName.'">'.$downloadJpgName.'</a></li>';
					}

					echo '
					</ul>
				</div>
			</div>
			<div id="previewAreaContainer">
				<div id="previewAreaClose">
					<a href="#" id="previewAreaCloseLink" onclick="closePreviewArea();">X</a>
				</div>
				<div id="previewArea">
					<table>
						<tr>
							<td>
								<a id="previewAreaPrevLink" href="#">&lt;--</a>
							</td>
							<td id="previewAreaImageContainer">
								<img src="images/icons/Preloader.gif" alt="preloader" id="preloaderImage">
							</td>
							<td>
								<a id="previewAreaNextLink" href="#">--&gt;</a>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div id="settingsFormContainer">
				<div id="settingsFormClose">
					<a href="#" id="settingsFormCloseLink" onclick="closeSettingsForm();">X</a>
				</div>
				<form enctype="multipart/form-data" name="settingsForm" action="gallery.php" method="GET">
					<h3>Gallery settings:</h3>
					<table>
						<tr>
							<td>
								Desired production code:
							</td>
							<td>
								<input name="prod" id="prodInput" type="text" value="'.$currProdCode.'">
								<div id="prodInputText"></div>
							</td>
						</tr>
						<tr>
							<td>
								Number of page to be opened:
							</td>
							<td>
								<input name="page" id="pageInput" type="text" value="'.$currPageNum.'">
								<div id="pageInputText"></div>
							</td>
						</tr>
						<tr>
							<td>
								Number of images per each page:
							</td>
							<td>
								<input name="limit" id="limitInput" type="text" value="'.$imgPerPageNum.'">
								<div id="limitInputText"></div>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" value="Submit" onclick="return validateSubmit();">
							</td>
						</tr>
					</table>
				</form>
			</div>
		</header>

		<main id="mainContent">
			<nav id="mainGalleryNavigation">
				<table>
					<tr>					
						<td class="arrow">';

						if ( !empty($prevProdCode) ) {
							echo '<a href="gallery.php?prod='.$prevProdCode.'&page=1&limit='.$imgPerPageNum.'"><img src="images/arrows/Left.png" alt="prev" width="40" align="middle"></a>';
						} else {
							echo '&nbsp;';
						}

						echo '</td>
						<td>
							<ul>
								<li><a href=".">Homepage</a></li>
								<li class="selected"><a href="#">Gallery</a></li>
								<li><a href="#" onclick="openDirectoryList();">Directory</a></li>
								<li><a href="#" onclick="launchSlideshow();">Slideshow</a></li>
								';
								switch ($contentType) {
									case 'movies':
										echo '<li><a href="http://spongebob.wikia.com/wiki/'.str_replace(' ','_',$currSpongeBobTitle).'/gallery">ESB Page</a></li>';
										break;
									default:
										echo '<li><a href="http://spongebob.wikia.com/wiki/'.str_replace(' ','_',$currSpongeBobTitle).'_(gallery)">ESB Page</a></li>';
										break;
								}

								echo '												
								<li><a href="#" onclick="openSettingsForm();">Settings</a></li>
							</ul>
						</td>
						<td class="arrow">';

						if ( !empty($nextProdCode) ) {
							echo '<a href="gallery.php?prod='.$nextProdCode.'&page=1&limit='.$imgPerPageNum.'"><img src="images/arrows/Right.png" alt="next" width="40" align="middle"></a>';
						} else {
							echo '&nbsp;';
						}

						echo '</td>
					</tr>
				</table>
			</nav>

			<section id="pageGallerySection">';

			if ( $displayPage && $displayGallery) {
				echo '
				<article id="galleryOreview">
					<img src="images/cards/'.$contentType.'/'.$currProdCode.' - '.$currCapturesTitle.'.jpg" alt="titlecard" width="150" align="middle">
					<h2>'.$currProdCode.' - '.$currSpongeBobTitle.'</h2>';

					for ($i = 0; $i < $contentTextFileLinesCount; $i++) {
						echo '<p>'.$contentTextFileArr[$i].'</p>';
					}
					
					echo '
				</article>

				<div id="pageGalleryDiv">
					<table id="galleryPageNavigation">
						<tr>
							<td style="width:100px;">';

							if ( $currPageNum > 1 ) {
								echo '
								<a style="float:left;" class="emphatise" href="gallery.php?prod='.$currProdCode.'&page=1&limit='.$imgPerPageNum.'">&lt;&lt;</a>
								&nbsp;
								<a style="float:left;" class="emphatise" href="gallery.php?prod='.$currProdCode.'&page='.($currPageNum - 1).'&limit='.$imgPerPageNum.'">&lt;</a>
								';
							} else {
								echo '&nbsp;';
							}

							echo '
							</td>

							<td style="text-align: center;" id="pageNavList">';

								for ($i = $firstPageInRange; $i <= $lastPageInRange; $i++) {

									if ($i == $currPageNum ) {
										echo '<b>'.$i.'</b>';
									} else {
										echo '<a href="gallery.php?prod='.$currProdCode.'&page='.$i.'&limit='.$imgPerPageNum.'">'.$i.'</a>';
									}

								}

								echo '
							</td>

							<td style="width:100px;">';

							if ( $currPageNum < $pageCount ) {
								echo '
								<a style="float:right;" class="emphatise" href="gallery.php?prod='.$currProdCode.'&page='.$pageCount.'&limit='.$imgPerPageNum.'">&gt;&gt;</a>
								&nbsp;
								<a style="float:right;" class="emphatise" href="gallery.php?prod='.$currProdCode.'&page='.($currPageNum + 1).'&limit='.$imgPerPageNum.'">&gt;</a>
								';
							} else {
								echo '&nbsp;';
							}

							echo '
							</td>
						</tr>
					</table>
					<div id="mainImageGallery">';

						for ($i = $firstImgIndex; ($i < $imageCount) && ($i <= $lastImgIndex); $i++) {
							echo '<a href="#" class="galleryItem"><img onclick="showImage(this,\'previewImage\');" src="'.$imageList[$i].'" alt="'.str_pad(strval($i + 1), strlen($imageCount), "0", STR_PAD_LEFT).'"><p><span onclick="showImage(this,\'replaceImage\');">replace</span>&nbsp;&bull;&nbsp;<span onclick="showImage(this,\'removeImage\');">remove</span></p></a>';
						}

						echo '
					</div>
				</div>';
			} else {
				echo '<div style="text-align: center; width:100%; margin: 15px;"><img src="images/errors/404.png" alt="nothing to display" width="350px"></div>';
			}

			echo '
			</section>
		</main>

		<footer id="scriptCalls">
			<script type="text/javascript" src="scripts/directoryList.js"></script>
			<script type="text/javascript" src="scripts/previewArea.js"></script>
			<script type="text/javascript" src="scripts/settingsMenu.js"></script>
		</footer>
	</body>
</html>';
?>

