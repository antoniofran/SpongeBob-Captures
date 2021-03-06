﻿<?php

$currTabCount = 12;

if ( isset($_GET['tabnum']) ) {
	$currTabNumber = intval($_GET['tabnum']);
} else {
	$currTabNumber = 1;
}

function tab_list_code ($currTabNumber, $currTabCount) {

	$currTabSelected = array_fill(1, $currTabCount, '');

	$currTabSelected[$currTabNumber] = ' class="selected"';

	echo '
					<div class="visibilityTabsInt">
						<a href="?tabnum=1"'.$currTabSelected[1].'>Season 1</a>
						<a href="?tabnum=2"'.$currTabSelected[2].'>2</a>
						<a href="?tabnum=3"'.$currTabSelected[3].'>3</a>
						<a href="?tabnum=4"'.$currTabSelected[4].'>4</a>
						<a href="?tabnum=5"'.$currTabSelected[5].'>5</a>
						<a href="?tabnum=6"'.$currTabSelected[6].'>6</a>
						<a href="?tabnum=7"'.$currTabSelected[7].'>7</a>
						<a href="?tabnum=8"'.$currTabSelected[8].'>8</a>
						<a href="?tabnum=9"'.$currTabSelected[9].'>9</a>
						<a href="?tabnum=10"'.$currTabSelected[10].'>10</a>
						<a href="?tabnum=11"'.$currTabSelected[11].'>11</a>
						<a href="?tabnum=12"'.$currTabSelected[12].'>Movies</a>
					</div>
	';

}

function list_item_code($currScreenFormat, $currProdCode, $currCapturesTitle, $currSpongeBobTitle = '', $isEarlyFormat = false) {

	if (empty($currSpongeBobTitle)) $currSpongeBobTitle = $currCapturesTitle;

	$currContentType = ($currProdCode[0] === 'M') ? 'movies' : 'episodes';

	$currImageHeight = ($currScreenFormat === 'Old') ? '113' : '85';

	$currImageHeightEarly = ($isEarlyFormat) ? '85' : $currImageHeight;

	$currFormatClass = ($isEarlyFormat) ? 'earlyFormat' : 'timelyFormat';

	echo '
							<li>
								<a class="galleryLink" href="gallery.php?prod='.$currProdCode.'&page=1&limit=60">
									<img class="holder" src="images/none/PreLoad'.$currScreenFormat.'.jpg" width="150" height="'.$currImageHeight.'">
									<div class="titlecard '.$currFormatClass.'"><img src="images/cards/'.$currContentType.'/'.$currProdCode.' - '.$currCapturesTitle.'.jpg" width="150" height="'.$currImageHeightEarly.'"></div>
									<div class="preloader PreLoad'.$currScreenFormat.'"><img src="images/icons/Preloader.gif" width="64" height="64"></div>
									<div class="preview '.$currFormatClass.'"><img src="images/prevs/'.$currContentType.'/'.$currProdCode.' - '.$currCapturesTitle.'.gif" width="150" height="'.$currImageHeightEarly.'"></div>
									<p>'.$currProdCode.' - '.$currSpongeBobTitle.'</p>
								</a>
							</li>
	';

}

echo '
<!DOCTYPE html>
<html>

	<head>
		<title>SpongeBob Captures | Snapshots of all seconds of all SpongeBob SquarePants episodes and movies</title>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="images/icons/Favicon.ico" type="image/x-icon"/>
		<link rel="stylesheet" type="text/css" href="styles/styles.css" />
		<script type="text/javascript" src="/global/scripts/trackingCode.js"></script>
	</head>

	<body>

		<main id="mainContent">

			<header id="logoAndInfo">
				<div id="logoContainer" onclick="openRandomGallery();">
					<img src="images/logos/Logo.png" width="450" alt="logo">
					<div id="randomButton">
						<img src="images/icons/Random.png" width="222">
					</div>
				</div>
				<div id="infoContainer">
					<span>Snapshots of all seconds of all <a href="http://spongebob.wikia.com/wiki/SpongeBob_SquarePants_(series)">SpongeBob SquarePants</a> episodes and movies.</span>
				</div>
			</header>

			<article id="contentList">
				<div class="visibilityTabs">
';

if ($currTabNumber === 1) {

					tab_list_code($currTabNumber, $currTabCount);

	echo '
					<section class="visibilityTabsSection">
						<ul>
	';

							list_item_code('Old', '001a', 'Help Wanted');
							list_item_code('Old', '001b', 'Reef Blower');
							list_item_code('Old', '001c', 'Tea at the Treedome');
							list_item_code('Old', '002a', 'Bubblestand');
							list_item_code('Old', '002b', 'Ripped Pants');
							list_item_code('Old', '003a', 'Jellyfishing');
							list_item_code('Old', '003b', 'Plankton!');
							list_item_code('Old', '004a', 'Naughty Nautical Neighbors');
							list_item_code('Old', '004b', 'Boating School');
							list_item_code('Old', '005a', 'Pizza Delivery');
							list_item_code('Old', '005b', 'Home Sweet Pineapple');
							list_item_code('Old', '006a', 'Mermaid Man and Barnacle Boy');
							list_item_code('Old', '006b', 'Pickles');
							list_item_code('Old', '007a', 'Hall Monitor');
							list_item_code('Old', '007b', 'Jellyfish Jam');
							list_item_code('Old', '008a', 'Sandy\'s Rocket');
							list_item_code('Old', '008b', 'Squeaky Boots');
							list_item_code('Old', '009a', 'Nature Pants');
							list_item_code('Old', '009b', 'Opposite Day');
							list_item_code('Old', '010a', 'Culture Shock');
							list_item_code('Old', '010b', 'FUN', 'F.U.N.');
							list_item_code('Old', '011a', 'MuscleBob BuffPants');
							list_item_code('Old', '011b', 'Squidward the Unfriendly Ghost');
							list_item_code('Old', '012a', 'The Chaperone');
							list_item_code('Old', '012b', 'Employee of the Month');
							list_item_code('Old', '013a', 'Scaredy Pants');
							list_item_code('Old', '013b', 'I Was a Teenage Gary');
							list_item_code('Old', '014a', 'SB-129');
							list_item_code('Old', '014b', 'Karate Choppers');
							list_item_code('Old', '015a', 'Sleepy Time');
							list_item_code('Old', '015b', 'Suds');
							list_item_code('Old', '016a', 'Valentine\'s Day');
							list_item_code('Old', '016b', 'The Paper');
							list_item_code('Old', '017a', 'Arrgh!');
							list_item_code('Old', '017b', 'Rock Bottom');
							list_item_code('Old', '018a', 'Texas');
							list_item_code('Old', '018b', 'Walking Small');
							list_item_code('Old', '019a', 'Fools in April');
							list_item_code('Old', '019b', 'Neptune\'s Spatula');
							list_item_code('Old', '020a', 'Hooky');
							list_item_code('Old', '020b', 'Mermaid Man and Barnacle Boy II');

	echo '
						</ul>
					</section>
	';

} else if ($currTabNumber === 2) {

					tab_list_code($currTabNumber, $currTabCount);

	echo '
					<section class="visibilityTabsSection">
						<ul>
	';

							list_item_code('Old', '021a', 'Your Shoe\'s Untied');
							list_item_code('Old', '021b', 'Squid\'s Day Off');
							list_item_code('Old', '022a', 'Something Smells');
							list_item_code('Old', '022b', 'Bossy Boots');
							list_item_code('Old', '023a', 'Big Pink Loser');
							list_item_code('Old', '023b', 'Bubble Buddy');
							list_item_code('Old', '024a', 'Dying for Pie');
							list_item_code('Old', '024b', 'Imitation Krabs');
							list_item_code('Old', '025a', 'Wormy');
							list_item_code('Old', '025b', 'Patty Hype');
							list_item_code('Old', '026a', 'Grandma\'s Kisses');
							list_item_code('Old', '026b', 'Squidville');
							list_item_code('Old', '027a', 'Prehibernation Week');
							list_item_code('Old', '027b', 'Life of Crime');
							list_item_code('Old', '028', 'Christmas Who', 'Christmas Who?');
							list_item_code('Old', '029a', 'Survival of the Idiots');
							list_item_code('Old', '029b', 'Dumped');
							list_item_code('Old', '030a', 'No Free Rides');
							list_item_code('Old', '030b', 'I\'m Your Biggest Fanatic');
							list_item_code('Old', '031a', 'Mermaid Man and Barnacle Boy III');
							list_item_code('Old', '031b', 'Squirrel Jokes');
							list_item_code('Old', '032a', 'Pressure');
							list_item_code('Old', '032b', 'The Smoking Peanut');
							list_item_code('Old', '033a', 'Shanghaied');
							list_item_code('Old', '033b', 'Gary Takes a Bath');
							list_item_code('Old', '034a', 'Welcome to the Chum Bucket');
							list_item_code('Old', '034b', 'Frankendoodle');
							list_item_code('Old', '035a', 'The Secret Box');
							list_item_code('Old', '035b', 'Band Geeks');
							list_item_code('Old', '036a', 'Graveyard Shift');
							list_item_code('Old', '036b', 'Krusty Love');
							list_item_code('Old', '037a', 'Procrastination');
							list_item_code('Old', '037b', 'I\'m with Stupid');
							list_item_code('Old', '038a', 'Sailor Mouth');
							list_item_code('Old', '038b', 'Artist Unknown');
							list_item_code('Old', '039a', 'Jellyfish Hunter');
							list_item_code('Old', '039b', 'The Fry Cook Games');
							list_item_code('Old', '040a', 'Squid on Strike');
							list_item_code('Old', '040b', 'Sandy, SpongeBob, and the Worm');

	echo '
						</ul>
					</section>
	';

} else if ($currTabNumber === 3) {

					tab_list_code($currTabNumber, $currTabCount);

	echo '
					<section class="visibilityTabsSection">
						<ul>
	';

							list_item_code('Old', '041a', 'The Algae\'s Always Greener');
							list_item_code('Old', '041b', 'SpongeGuard on Duty');
							list_item_code('Old', '042a', 'Club SpongeBob');
							list_item_code('Old', '042b', 'My Pretty Seahorse');
							list_item_code('Old', '043a', 'Just One Bite');
							list_item_code('Old', '043b', 'The Bully');
							list_item_code('Old', '044a', 'Nasty Patty');
							list_item_code('Old', '044b', 'Idiot Box');
							list_item_code('Old', '045a', 'Mermaid Man and Barnacle Boy IV');
							list_item_code('Old', '045b', 'Doing Time');
							list_item_code('Old', '046a', 'Snowball Effect');
							list_item_code('Old', '046b', 'One Krabs Trash');
							list_item_code('Old', '047a', 'As Seen on TV');
							list_item_code('Old', '047b', 'Can You Spare a Dime', 'Can You Spare a Dime?');
							list_item_code('Old', '048a', 'No Weenies Allowed');
							list_item_code('Old', '048b', 'Squilliam Returns');
							list_item_code('Old', '049a', 'Krab Borg');
							list_item_code('Old', '049b', 'Rock-a-Bye Bivalve');
							list_item_code('Old', '050a', 'Wet Painters');
							list_item_code('Old', '050b', 'Krusty Krab Training Video');
							list_item_code('Old', '051', 'Party Pooper Pants');
							list_item_code('Old', '052a', 'Chocolate with Nuts');
							list_item_code('Old', '052b', 'Mermaid Man and Barnacle Boy V');
							list_item_code('Old', '053a', 'New Student Starfish');
							list_item_code('Old', '053b', 'Clams');
							list_item_code('Old', '054', 'Ugh');
							list_item_code('Old', '055a', 'The Great Snail Race');
							list_item_code('Old', '055b', 'Mid-Life Crustacean');
							list_item_code('Old', '056a', 'Born Again Krabs');
							list_item_code('Old', '056b', 'I Had an Accident');
							list_item_code('Old', '057a', 'Krabby Land');
							list_item_code('Old', '057b', 'The Camping Episode');
							list_item_code('Old', '058a', 'Missing Identity');
							list_item_code('Old', '058b', 'Plankton\'s Army');
							list_item_code('Old', '059', 'The Sponge Who Could Fly');
							list_item_code('Old', '060a', 'SpongeBob Meets the Strangler');
							list_item_code('Old', '060b', 'Pranks a Lot');

	echo '
						</ul>
					</section>
	';

} else if ($currTabNumber === 4) {

					tab_list_code($currTabNumber, $currTabCount);

	echo '
					<section class="visibilityTabsSection">
						<ul>
	';

							list_item_code('Old', '061a', 'Fear of a Krabby Patty');
							list_item_code('Old', '061b', 'Shell of a Man');
							list_item_code('Old', '062a', 'The Lost Mattress');
							list_item_code('Old', '062b', 'Krabs vs. Plankton');
							list_item_code('Old', '063', 'Have You Seen This Snail', 'Have You Seen This Snail?');
							list_item_code('Old', '064a', 'Skill Crane');
							list_item_code('Old', '064b', 'Good Neighbors');
							list_item_code('Old', '065a', 'Selling Out');
							list_item_code('Old', '065b', 'Funny Pants');
							list_item_code('Old', '066', 'Dunces and Dragons');
							list_item_code('Old', '067a', 'Enemy In-Law');
							list_item_code('Old', '067b', 'Mermaid Man and Barnacle Boy VI - The Motion Picture', 'Mermaid Man and Barnacle Boy VI: The Motion Picture');
							list_item_code('Old', '068a', 'Patrick SmartPants');
							list_item_code('Old', '068b', 'SquidBob TentaclePants');
							list_item_code('Old', '069a', 'Krusty Towers');
							list_item_code('Old', '069b', 'Mrs. Puff, You\'re Fired');
							list_item_code('Old', '070a', 'Chimps Ahoy');
							list_item_code('Old', '070b', 'Ghost Host');
							list_item_code('Old', '071a', 'Whale of a Birthday');
							list_item_code('Old', '071b', 'Karate Island');
							list_item_code('Old', '072a', 'All That Glitters');
							list_item_code('Old', '072b', 'Wishing You Well');
							list_item_code('Old', '073a', 'New Leaf');
							list_item_code('Old', '073b', 'Once Bitten');
							list_item_code('Old', '074a', 'Bummer Vacation');
							list_item_code('Old', '074b', 'Wigstruck');
							list_item_code('Old', '075a', 'Squidtastic Voyage');
							list_item_code('Old', '075b', 'That\'s No Lady');
							list_item_code('Old', '076a', 'The Thing');
							list_item_code('Old', '076b', 'Hocus Pocus');
							list_item_code('Old', '077a', 'Driven to Tears');
							list_item_code('Old', '077b', 'Rule of Dumb');
							list_item_code('Old', '078a', 'Born to Be Wild');
							list_item_code('Old', '078b', 'Best Frenemies');
							list_item_code('Old', '079a', 'The Pink Purloiner');
							list_item_code('Old', '079b', 'Squid Wood');
							list_item_code('Old', '080a', 'Best Day Ever');
							list_item_code('Old', '080b', 'The Gift of Gum');

	echo '
						</ul>
					</section>
	';

} else if ($currTabNumber === 5) {

					tab_list_code($currTabNumber, $currTabCount);

	echo '
					<section class="visibilityTabsSection">
						<ul>
	';

							list_item_code('Old', '081', 'Friend or Foe');
							list_item_code('Old', '082a', 'The Original Fry Cook');
							list_item_code('Old', '082b', 'Night Light');
							list_item_code('Old', '083a', 'Rise and Shine');
							list_item_code('Old', '083b', 'Waiting');
							list_item_code('Old', '083c', 'Fungus Among Us');
							list_item_code('Old', '084a', 'Spy Buddies');
							list_item_code('Old', '084b', 'Boat Smarts');
							list_item_code('Old', '084c', 'Good Ol\' Whatshisname');
							list_item_code('Old', '085a', 'New Digs');
							list_item_code('Old', '085b', 'Krabs a la Mode', 'Krabs à la Mode');
							list_item_code('Old', '086a', 'Roller Cowards');
							list_item_code('Old', '086b', 'Bucket Sweet Bucket');
							list_item_code('Old', '087a', 'To Love a Patty');
							list_item_code('Old', '087b', 'Breath of Fresh Squidward');
							list_item_code('Old', '088a', 'Money Talks');
							list_item_code('Old', '088b', 'SpongeBob vs. The Patty Gadget');
							list_item_code('Old', '088c', 'Slimy Dancing');
							list_item_code('Old', '089a', 'The Krusty Sponge');
							list_item_code('Old', '089b', 'Sing a Song of Patrick');
							list_item_code('Old', '090a', 'A Flea in Her Dome');
							list_item_code('Old', '090b', 'The Donut of Shame');
							list_item_code('Old', '090c', 'The Krusty Plate');
							list_item_code('Old', '091a', 'Goo Goo Gas');
							list_item_code('Old', '091b', 'Le Big Switch');
							list_item_code('Old', '092', 'Atlantis SquarePantis');
							list_item_code('Old', '093a', 'Picture Day');
							list_item_code('Old', '093b', 'Pat No Pay');
							list_item_code('Old', '093c', 'BlackJack');
							list_item_code('Old', '094a', 'Blackened Sponge');
							list_item_code('Old', '094b', 'Mermaid Man vs. SpongeBob');
							list_item_code('Old', '095a', 'The Inmates of Summer');
							list_item_code('Old', '095b', 'To Save a Squirrel');
							list_item_code('Old', '096', 'Pest of the West');
							list_item_code('Old', '097a', '20,000 Patties Under the Sea');
							list_item_code('Old', '097b', 'The Battle of Bikini Bottom');
							list_item_code('Old', '098', 'What Ever Happened to SpongeBob', 'What Ever Happened to SpongeBob?');
							list_item_code('Old', '099a', 'The Two Faces of Squidward');
							list_item_code('Old', '099b', 'SpongeHenge');
							list_item_code('Old', '100a', 'Banned in Bikini Bottom');
							list_item_code('Old', '100b', 'Stanley S. SquarePants');

	echo '
						</ul>
					</section>
	';

} else if ($currTabNumber === 6) {

					tab_list_code($currTabNumber, $currTabCount);

	echo '
					<section class="visibilityTabsSection">
						<ul>
	';

							list_item_code('Old', '101a', 'House Fancy');
							list_item_code('Old', '101b', 'Krabby Road');
							list_item_code('Old', '102a', 'Penny Foolish');
							list_item_code('Old', '102b', 'Nautical Novice');
							list_item_code('Old', '103a', 'Spongicus');
							list_item_code('Old', '103b', 'Suction Cup Symphony');
							list_item_code('Old', '104a', 'Not Normal');
							list_item_code('Old', '104b', 'Gone');
							list_item_code('Old', '105a', 'The Splinter');
							list_item_code('Old', '105b', 'Slide Whistle Stooges');
							list_item_code('Old', '106a', 'A Life in a Day');
							list_item_code('Old', '106b', 'Sun Bleached');
							list_item_code('Old', '107a', 'Giant Squidward');
							list_item_code('Old', '107b', 'No Nose Knows');
							list_item_code('Old', '108a', 'Patty Caper');
							list_item_code('Old', '108b', 'Plankton\'s Regular');
							list_item_code('Old', '109a', 'Boating Buddies');
							list_item_code('Old', '109b', 'The Krabby Kronicle');
							list_item_code('Old', '110a', 'The Slumber Party');
							list_item_code('Old', '110b', 'Grooming Gary');
							list_item_code('Old', '111', 'SpongeBob SquarePants vs. The Big One');
							list_item_code('Old', '112a', 'Porous Pockets');
							list_item_code('Old', '112b', 'Choir Boys');
							list_item_code('Old', '113a', 'Krusty Krushers');
							list_item_code('Old', '113b', 'The Card');
							list_item_code('Old', '114a', 'Dear Vikings');
							list_item_code('Old', '114b', 'Ditchin\'');
							list_item_code('Old', '115a', 'Grandpappy the Pirate');
							list_item_code('Old', '115b', 'Cephalopod Lodge');
							list_item_code('Old', '116a', 'Squid\'s Visit');
							list_item_code('Old', '116b', 'To SquarePants or Not to SquarePants');
							list_item_code('Old', '117a', 'Shuffleboarding');
							list_item_code('Old', '117b', 'Professor Squidward');
							list_item_code('Old', '118a', 'Pet or Pests');
							list_item_code('Old', '118b', 'Komputer Overload');
							list_item_code('Old', '119a', 'Gullible Pants');
							list_item_code('Old', '119b', 'Overbooked');
							list_item_code('Old', '120a', 'No Hat for Pat');
							list_item_code('Old', '120b', 'Toy Store of Doom');
							list_item_code('Old', '121a', 'Sand Castles in the Sand');
							list_item_code('Old', '121b', 'Shell Shocked');
							list_item_code('Old', '122a', 'Chum Bucket Supreme');
							list_item_code('Old', '122b', 'Single Cell Anniversary');
							list_item_code('Old', '123-124', 'Truth or Square', null, true);
							list_item_code('Old', '125a', 'Pineapple Fever');
							list_item_code('Old', '125b', 'Chum Caverns');
							list_item_code('Old', '126', 'The Clash of Triton');

	echo '
						</ul>
					</section>
	';

} else if ($currTabNumber === 7) {

					tab_list_code($currTabNumber, $currTabCount);

	echo '
					<section class="visibilityTabsSection">
						<ul>
	';

							list_item_code('Old', '127a', 'Tentacle-Vision');
							list_item_code('Old', '127b', 'I Heart Dancing', 'I ♥ Dancing');
							list_item_code('Old', '128a', 'Growth Spout');
							list_item_code('Old', '128b', 'Stuck in the Wringer');
							list_item_code('Old', '129a', 'Someone\'s in the Kitchen with Sandy');
							list_item_code('Old', '129b', 'The Inside Job');
							list_item_code('Old', '130a', 'Greasy Buffoons');
							list_item_code('Old', '130b', 'Model Sponge');
							list_item_code('Old', '131a', 'Keep Bikini Bottom Beautiful');
							list_item_code('Old', '131b', 'A Pal for Gary');
							list_item_code('Old', '132a', 'Yours, Mine and Mine');
							list_item_code('Old', '132b', 'Kracked Krabs');
							list_item_code('Old', '133a', 'The Curse of Bikini Bottom');
							list_item_code('Old', '133b', 'Squidward in Clarinetland');
							list_item_code('Old', '134', 'SpongeBob\'s Last Stand');
							list_item_code('Old', '135a', 'Back to the Past');
							list_item_code('Old', '135b', 'The Bad Guy Club for Villains');
							list_item_code('Old', '136a', 'A Day Without Tears');
							list_item_code('Old', '136b', 'Summer Job');
							list_item_code('Old', '137a', 'One Coarse Meal');
							list_item_code('Old', '137b', 'Gary in Love');
							list_item_code('Old', '138a', 'The Play\'s the Thing');
							list_item_code('Old', '138b', 'Rodeo Daze');
							list_item_code('Old', '139a', 'Gramma\'s Secret Recipe');
							list_item_code('Old', '139b', 'The Cent of Money');
							list_item_code('Old', '140a', 'The Monster Who Came to Bikini Bottom');
							list_item_code('Old', '140b', 'Welcome to the Bikini Bottom Triangle');
							list_item_code('Old', '141a', 'The Curse of the Hex');
							list_item_code('Old', '141b', 'The Main Drain');
							list_item_code('Old', '142a', 'Trenchbillies');
							list_item_code('Old', '142b', 'Sponge-Cano!');
							list_item_code('Old', '143', 'The Great Patty Caper');
							list_item_code('Old', '144a', 'That Sinking Feeling');
							list_item_code('Old', '144b', 'Karate Star');
							list_item_code('Old', '145a', 'Buried in Time');
							list_item_code('Old', '145b', 'Enchanted Tiki Dreams');
							list_item_code('Old', '146a', 'The Abrasive Side');
							list_item_code('Old', '146b', 'Earworm');
							list_item_code('Old', '147a', 'Hide and Then What Happens', 'Hide and Then What Happens?');
							list_item_code('Old', '147b', 'Shellback Shenanigans');
							list_item_code('Old', '148a', 'The Masterpiece');
							list_item_code('Old', '148b', 'Whelk Attack');
							list_item_code('Old', '149a', 'You Don\'t Know Sponge');
							list_item_code('Old', '149b', 'Tunnel of Glove');
							list_item_code('Old', '150a', 'Krusty Dogs');
							list_item_code('Old', '150b', 'The Wreck of the Mauna Loa');
							list_item_code('Old', '151a', 'New Fish in Town');
							list_item_code('Old', '151b', 'Love That Squid');
							list_item_code('Old', '152a', 'Big Sister Sam');
							list_item_code('Old', '152b', 'Perfect Chemistry');

	echo '
						</ul>
					</section>
	';

} else if ($currTabNumber === 8) {

					tab_list_code($currTabNumber, $currTabCount);

	echo '
					<section class="visibilityTabsSection">
						<ul>
	';

							list_item_code('Old', '153a', 'Accidents Will Happen');
							list_item_code('Old', '153b', 'The Other Patty');
							list_item_code('Old', '154a', 'Drive Thru');
							list_item_code('Old', '154b', 'The Hot Shot');
							list_item_code('Old', '155a', 'A Friendly Game');
							list_item_code('Old', '155b', 'Sentimental Sponge');
							list_item_code('Old', '156', 'Frozen Face-Off');
							list_item_code('Old', '157a', 'Squidward\'s School for Grown-Ups');
							list_item_code('Old', '157b', 'Oral Report');
							list_item_code('Old', '158a', 'Sweet and Sour Squid');
							list_item_code('Old', '158b', 'The Googly Artiste');
							list_item_code('Old', '159', 'A SquarePants Family Vacation');
							list_item_code('Old', '160a', 'Patrick\'s Staycation');
							list_item_code('Old', '160b', 'Walking the Plankton');
							list_item_code('Old', '161a', 'Mooncation');
							list_item_code('Old', '161b', 'Mr. Krabs Takes a Vacation');
							list_item_code('Old', '162', 'Ghoul Fools');
							list_item_code('Old', '163a', 'Mermaid Man Begins');
							list_item_code('Old', '163b', 'Plankton\'s Good Eye');
							list_item_code('Old', '164a', 'Barnacle Face');
							list_item_code('Old', '164b', 'Pet Sitter Pat');
							list_item_code('Old', '165a', 'House Sittin\' for Sandy');
							list_item_code('Old', '165b', 'Smoothe Jazz at Bikini Bottom');
							list_item_code('Old', '166a', 'Bubble Troubles');
							list_item_code('Old', '166b', 'The Way of the Sponge');
							list_item_code('Old', '167a', 'The Krabby Patty That Ate Bikini Bottom');
							list_item_code('Old', '167b', 'Bubble Buddy Returns');
							list_item_code('Old', '168a', 'Restraining SpongeBob');
							list_item_code('Old', '168b', 'Fiasco!');
							list_item_code('Old', '169a', 'Are You Happy Now', 'Are You Happy Now?');
							list_item_code('Old', '169b', 'Planet of the Jellyfish');
							list_item_code('Old', '170a', 'Free Samples');
							list_item_code('Old', '170b', 'Home Sweet Rubble');
							list_item_code('Old', '171a', 'Karen 2.0');
							list_item_code('Old', '171b', 'InSPONGEiac');
							list_item_code('Old', '172a', 'Face Freeze!');
							list_item_code('Old', '172b', 'Glove World RIP', 'Glove World R.I.P.');
							list_item_code('Old', '173a', 'Squiditis');
							list_item_code('Old', '173b', 'Demolition Doofus');
							list_item_code('Old', '174a', 'Treats!');
							list_item_code('Old', '174b', 'For Here or to Go');
							list_item_code('Old', '175', 'It\'s a SpongeBob Christmas!', null, true);
							list_item_code('Old', '176a', 'Super Evil Aquatic Villain Team Up is Go!');
							list_item_code('Old', '176b', 'Chum Fricassee');
							list_item_code('Old', '177a', 'The Good Krabby Name');
							list_item_code('Old', '177b', 'Move It or Lose It');
							list_item_code('Old', '178', 'Hello Bikini Bottom!');

	echo '
						</ul>
					</section>
	';

} else if ($currTabNumber === 9) {

					tab_list_code($currTabNumber, $currTabCount);

	echo '
					<section class="visibilityTabsSection">
						<ul>
	';

							list_item_code('New', '179a', 'Extreme Spots');
							list_item_code('New', '179b', 'Squirrel Record');
							list_item_code('New', '180a', 'Patrick-Man!');
							list_item_code('New', '180b', 'Gary\'s New Toy');
							list_item_code('New', '181a', 'License to Milkshake');
							list_item_code('New', '181b', 'Squid Baby');
							list_item_code('New', '182a', 'Little Yellow Book');
							list_item_code('New', '182b', 'Bumper to Bumper');
							list_item_code('New', '183a', 'Eek, an Urchin!');
							list_item_code('New', '183b', 'Squid Defense');
							list_item_code('New', '184a', 'Jailbreak!');
							list_item_code('New', '184b', 'Evil Spatula');
							list_item_code('New', '185', 'It Came from Goo Lagoon');
							list_item_code('New', '186a', 'Safe Deposit Krabs');
							list_item_code('New', '186b', 'Plankton\'s Pet');
							list_item_code('New', '187a', 'Don\'t Look Now');
							list_item_code('New', '187b', 'Seance Shmeance', 'Séance Shméance');
							list_item_code('New', '188a', 'Kenny the Cat');
							list_item_code('New', '188b', 'Yeti Krabs');
							list_item_code('New', '189', 'SpongeBob You\'re Fired');
							list_item_code('New', '190a', 'Lost in Bikini Bottom');
							list_item_code('New', '190b', 'Tutor Sauce');
							list_item_code('New', '191a', 'Squid Plus One');
							list_item_code('New', '191b', 'The Executive Treatment');
							list_item_code('New', '192a', 'Company Picnic');
							list_item_code('New', '192b', 'Pull Up a Barrel');
							list_item_code('New', '193a', 'Sanctuary!');
							list_item_code('New', '193b', 'What\'s Eating Patrick', 'What\'s Eating Patrick?');
							list_item_code('New', '194a', 'Patrick! The Game');
							list_item_code('New', '194b', 'The Sewers of Bikini Bottom');
							list_item_code('New', '195a', 'SpongeBob LongPants');
							list_item_code('New', '195b', 'Larry\'s Gym');
							list_item_code('New', '196a', 'The Fish Bowl');
							list_item_code('New', '196b', 'Married to Money');
							list_item_code('New', '197a', 'Mall Girl Pearl');
							list_item_code('New', '197b', 'Two Thumbs Down');
							list_item_code('New', '198a', 'Sharks vs. Pods');
							list_item_code('New', '198b', 'CopyBob DittoPants');
							list_item_code('New', '199a', 'Sold!');
							list_item_code('New', '199b', 'Lame and Fortune');
							list_item_code('New', '200', 'Goodbye, Krabby Patty', 'Goodbye, Krabby Patty?');
							list_item_code('New', '201a', 'Sandy\'s Nutmare');
							list_item_code('New', '201b', 'Bulletin Board');
							list_item_code('New', '202a', 'Food Con Castaways');
							list_item_code('New', '202b', 'Snail Mail');
							list_item_code('New', '203a', 'Pineapple Invasion');
							list_item_code('New', '203b', 'Salsa Imbecilicus');
							list_item_code('New', '204a', 'Mutiny on the Krusty');
							list_item_code('New', '204b', 'The Whole Tooth');

	echo '
						</ul>
					</section>
	';

} else if ($currTabNumber === 10) {

					tab_list_code($currTabNumber, $currTabCount);

	echo '
					<section class="visibilityTabsSection">
						<ul>
	';

							list_item_code('New', '205a', 'Whirly Brains');
							list_item_code('New', '205b', 'Mermaid Pants');
							list_item_code('New', '206a', 'Unreal Estate');
							list_item_code('New', '206b', 'Code Yellow');
							list_item_code('New', '207a', 'Mimic Madness');
							list_item_code('New', '207b', 'House Worming');
							list_item_code('New', '208a', 'Snooze You Lose');
							list_item_code('New', '208b', 'Krusty Katering');
							list_item_code('New', '209a', 'SpongeBob\'s Place');
							list_item_code('New', '209b', 'Plankton Gets the Boot');
							list_item_code('New', '210a', 'Life Insurance');
							list_item_code('New', '210b', 'Burst Your Bubble');
							list_item_code('New', '211a', 'Plankton Retires');
							list_item_code('New', '211b', 'Trident Trouble');
							list_item_code('New', '212a', 'The Incredible Shrinking Sponge');
							list_item_code('New', '212b', 'Sportz', 'Sportz?');
							list_item_code('New', '213a', 'The Getaway');
							list_item_code('New', '213b', 'Lost and Found');
							list_item_code('New', '214a', 'Patrick\'s Coupon');
							list_item_code('New', '214b', 'Out of the Picture');
							list_item_code('New', '215a', 'Feral Friends');
							list_item_code('New', '215b', 'Don\'t Wake Patrick');

	echo '
						</ul>
					</section>
	';

} else if ($currTabNumber === 11) {

					tab_list_code($currTabNumber, $currTabCount);

	echo '
					<section class="visibilityTabsSection">
						<ul>
	';

							list_item_code('New', '216a', 'Cave Dwelling Sponge');
							list_item_code('New', '216b', 'The Clam Whisperer');
							list_item_code('New', '217a', 'Spot Returns');
							list_item_code('New', '217b', 'The Check-Up');
							list_item_code('New', '218a', 'Spin the Bottle');
							list_item_code('New', '218b', 'There\'s a Sponge in My Soup');
							list_item_code('New', '219a', 'Man Ray Returns');
							list_item_code('New', '219b', 'Larry the Floor Manager');
							list_item_code('New', '220', 'The Legend of Boo-Kini Bottom');
							list_item_code('New', '221a', 'No Pictures Please');
							list_item_code('New', '221b', 'Stuck on the Roof');
							list_item_code('New', '222a', 'Krabby Patty Creature Feature');
							list_item_code('New', '222b', 'Teacher\'s Pests');
							list_item_code('New', '223a', 'Sanitation Insanity');
							list_item_code('New', '223b', 'Bunny Hunt');
							list_item_code('New', '224a', 'Squid Noir');
							list_item_code('New', '224b', 'Scavenger Pants');
							list_item_code('New', '225a', 'Cuddle E. Hugs');
							list_item_code('New', '225b', 'Pat the Horse');
							list_item_code('New', '226a', 'Chatterbox Gary');
							list_item_code('New', '226b', 'Don\'t Feed the Clowns');
							list_item_code('New', '227a', 'Drive Happy');
							list_item_code('New', '227b', 'Old Man Patrick');
							list_item_code('New', '228a', 'Fun-Sized Friends');
							list_item_code('New', '228b', 'Grandmum\'s the Word');
							list_item_code('New', '229a', 'Doodle Dimension');
							list_item_code('New', '229b', 'Moving Bubble Bass');
							list_item_code('New', '230a', 'High Sea Diving');
							list_item_code('New', '230b', 'Bottle Burglars');
							list_item_code('New', '231a', 'My Leg!');
							list_item_code('New', '231b', 'Ink Lemonade');
							list_item_code('New', '232a', 'Mustard O\' Mine');
							list_item_code('New', '232b', 'Shopping List');
							list_item_code('New', '233a', 'Whale Watching');
							list_item_code('New', '233b', 'Krusty Kleaners');
							list_item_code('New', '234a', 'Patnocchio');
							list_item_code('New', '234b', 'ChefBob');
							list_item_code('New', '235a', 'Plankton Paranoia');
							list_item_code('New', '235b', 'Library Cards');
							list_item_code('New', '239a', 'The Grill is Gone');
							list_item_code('New', '239b', 'The Night Patty');

	echo '
						</ul>
					</section>
	';

} else {

					tab_list_code($currTabNumber, $currTabCount);

	echo '
					<section class="visibilityTabsSection">
						<ul>
	';

							list_item_code('New', 'M001', 'The SpongeBob SquarePants Movie');
							list_item_code('New', 'M002', 'The SpongeBob Movie - Sponge Out of Water', 'The SpongeBob Movie: Sponge Out of Water');

	echo '
						</ul>
					</section>
	';

}

echo '
				</div>
			</article>

			<footer id="scriptCalls">
				<script type="text/javascript" src="scripts/randomProd.js"></script>
			</footer>

		</main>

	</body>

</html>
';
?>