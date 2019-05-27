<?php

$uploadPermitted = false;
$uploadSuccess = 0;
$infoMessage = '';

if (isset($_POST["submit"]))
{
	$passwordVerified = password_verify($_POST["sbcPassword"], '$2y$10$rgMdRsw1Ak9jjqa46muvGOLrJIbHl6/la/SbR63/dfV.TBTjDKYS6');
	
	$uploadPermitted = $passwordVerified && end(explode(".", $_FILES['fileToUpload']['name'])) === 'txt';
	
	if ($uploadPermitted)
	{
		$destFullPath = getcwd().'/content/episodes/'.$_POST["episodeName"];
		
		$uploadSuccess = move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $destFullPath);

		$infoMessage = $uploadSuccess !== 0 ? 'Upload has succeded.' : 'Upload has failed.';
	}
	else
	{
		$infoMessage = !$passwordVerified ? 'Wrong password.' : 'Wrong file extension.';
	}
}

echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<title>Synopsis Upload Form | SpongeBob Captures</title>
	</head>
	<body>
EOT;

echo '
	<p style="font-weight: bold; color: red;">'.$infoMessage.'</p>
';

echo <<<EOT
	<form action="#" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Episode</td>
				<td>
					<select name="episodeName">
						<option value="001a - Help Wanted.txt">001a - Help Wanted</option>
						<option value="001b - Reef Blower.txt">001b - Reef Blower</option>
						<option value="001c - Tea at the Treedome.txt">001c - Tea at the Treedome</option>
						<option value="002a - Bubblestand.txt">002a - Bubblestand</option>
						<option value="002b - Ripped Pants.txt">002b - Ripped Pants</option>
						<option value="003a - Jellyfishing.txt">003a - Jellyfishing</option>
						<option value="003b - Plankton!.txt">003b - Plankton!</option>
						<option value="004a - Naughty Nautical Neighbors.txt">004a - Naughty Nautical Neighbors</option>
						<option value="004b - Boating School.txt">004b - Boating School</option>
						<option value="005a - Pizza Delivery.txt">005a - Pizza Delivery</option>
						<option value="005b - Home Sweet Pineapple.txt">005b - Home Sweet Pineapple</option>
						<option value="006a - Mermaid Man and Barnacle Boy.txt">006a - Mermaid Man and Barnacle Boy</option>
						<option value="006b - Pickles.txt">006b - Pickles</option>
						<option value="007a - Hall Monitor.txt">007a - Hall Monitor</option>
						<option value="007b - Jellyfish Jam.txt">007b - Jellyfish Jam</option>
						<option value="008a - Sandy's Rocket.txt">008a - Sandy's Rocket</option>
						<option value="008b - Squeaky Boots.txt">008b - Squeaky Boots</option>
						<option value="009a - Nature Pants.txt">009a - Nature Pants</option>
						<option value="009b - Opposite Day.txt">009b - Opposite Day</option>
						<option value="010a - Culture Shock.txt">010a - Culture Shock</option>
						<option value="010b - FUN.txt">010b - F.U.N.</option>
						<option value="011a - MuscleBob BuffPants.txt">011a - MuscleBob BuffPants</option>
						<option value="011b - Squidward the Unfriendly Ghost.txt">011b - Squidward the Unfriendly Ghost</option>
						<option value="012a - The Chaperone.txt">012a - The Chaperone</option>
						<option value="012b - Employee of the Month.txt">012b - Employee of the Month</option>
						<option value="013a - Scaredy Pants.txt">013a - Scaredy Pants</option>
						<option value="013b - I Was a Teenage Gary.txt">013b - I Was a Teenage Gary</option>
						<option value="014a - SB-129.txt">014a - SB-129</option>
						<option value="014b - Karate Choppers.txt">014b - Karate Choppers</option>
						<option value="015a - Sleepy Time.txt">015a - Sleepy Time</option>
						<option value="015b - Suds.txt">015b - Suds</option>
						<option value="016a - Valentine's Day.txt">016a - Valentine's Day</option>
						<option value="016b - The Paper.txt">016b - The Paper</option>
						<option value="017a - Arrgh!.txt">017a - Arrgh!</option>
						<option value="017b - Rock Bottom.txt">017b - Rock Bottom</option>
						<option value="018a - Texas.txt">018a - Texas</option>
						<option value="018b - Walking Small.txt">018b - Walking Small</option>
						<option value="019a - Fools in April.txt">019a - Fools in April</option>
						<option value="019b - Neptune's Spatula.txt">019b - Neptune's Spatula</option>
						<option value="020a - Hooky.txt">020a - Hooky</option>
						<option value="020b - Mermaid Man and Barnacle Boy II.txt">020b - Mermaid Man and Barnacle Boy II</option>
						<option value="021a - Your Shoe's Untied.txt">021a - Your Shoe's Untied</option>
						<option value="021b - Squid's Day Off.txt">021b - Squid's Day Off</option>
						<option value="022a - Something Smells.txt">022a - Something Smells</option>
						<option value="022b - Bossy Boots.txt">022b - Bossy Boots</option>
						<option value="023a - Big Pink Loser.txt">023a - Big Pink Loser</option>
						<option value="023b - Bubble Buddy.txt">023b - Bubble Buddy</option>
						<option value="024a - Dying for Pie.txt">024a - Dying for Pie</option>
						<option value="024b - Imitation Krabs.txt">024b - Imitation Krabs</option>
						<option value="025a - Wormy.txt">025a - Wormy</option>
						<option value="025b - Patty Hype.txt">025b - Patty Hype</option>
						<option value="026a - Grandma's Kisses.txt">026a - Grandma's Kisses</option>
						<option value="026b - Squidville.txt">026b - Squidville</option>
						<option value="027a - Prehibernation Week.txt">027a - Prehibernation Week</option>
						<option value="027b - Life of Crime.txt">027b - Life of Crime</option>
						<option value="028 - Christmas Who.txt">028 - Christmas Who?</option>
						<option value="029a - Survival of the Idiots.txt">029a - Survival of the Idiots</option>
						<option value="029b - Dumped.txt">029b - Dumped</option>
						<option value="030a - No Free Rides.txt">030a - No Free Rides</option>
						<option value="030b - I'm Your Biggest Fanatic.txt">030b - I'm Your Biggest Fanatic</option>
						<option value="031a - Mermaid Man and Barnacle Boy III.txt">031a - Mermaid Man and Barnacle Boy III</option>
						<option value="031b - Squirrel Jokes.txt">031b - Squirrel Jokes</option>
						<option value="032a - Pressure.txt">032a - Pressure</option>
						<option value="032b - The Smoking Peanut.txt">032b - The Smoking Peanut</option>
						<option value="033a - Shanghaied.txt">033a - Shanghaied</option>
						<option value="033b - Gary Takes a Bath.txt">033b - Gary Takes a Bath</option>
						<option value="034a - Welcome to the Chum Bucket.txt">034a - Welcome to the Chum Bucket</option>
						<option value="034b - Frankendoodle.txt">034b - Frankendoodle</option>
						<option value="035a - The Secret Box.txt">035a - The Secret Box</option>
						<option value="035b - Band Geeks.txt">035b - Band Geeks</option>
						<option value="036a - Graveyard Shift.txt">036a - Graveyard Shift</option>
						<option value="036b - Krusty Love.txt">036b - Krusty Love</option>
						<option value="037a - Procrastination.txt">037a - Procrastination</option>
						<option value="037b - I'm with Stupid.txt">037b - I'm with Stupid</option>
						<option value="038a - Sailor Mouth.txt">038a - Sailor Mouth</option>
						<option value="038b - Artist Unknown.txt">038b - Artist Unknown</option>
						<option value="039a - Jellyfish Hunter.txt">039a - Jellyfish Hunter</option>
						<option value="039b - The Fry Cook Games.txt">039b - The Fry Cook Games</option>
						<option value="040a - Squid on Strike.txt">040a - Squid on Strike</option>
						<option value="040b - Sandy, SpongeBob, and the Worm.txt">040b - Sandy, SpongeBob, and the Worm</option>
						<option value="041a - The Algae's Always Greener.txt">041a - The Algae's Always Greener</option>
						<option value="041b - SpongeGuard on Duty.txt">041b - SpongeGuard on Duty</option>
						<option value="042a - Club SpongeBob.txt">042a - Club SpongeBob</option>
						<option value="042b - My Pretty Seahorse.txt">042b - My Pretty Seahorse</option>
						<option value="043a - Just One Bite.txt">043a - Just One Bite</option>
						<option value="043b - The Bully.txt">043b - The Bully</option>
						<option value="044a - Nasty Patty.txt">044a - Nasty Patty</option>
						<option value="044b - Idiot Box.txt">044b - Idiot Box</option>
						<option value="045a - Mermaid Man and Barnacle Boy IV.txt">045a - Mermaid Man and Barnacle Boy IV</option>
						<option value="045b - Doing Time.txt">045b - Doing Time</option>
						<option value="046a - Snowball Effect.txt">046a - Snowball Effect</option>
						<option value="046b - One Krabs Trash.txt">046b - One Krabs Trash</option>
						<option value="047a - As Seen on TV.txt">047a - As Seen on TV</option>
						<option value="047b - Can You Spare a Dime.txt">047b - Can You Spare a Dime?</option>
						<option value="048a - No Weenies Allowed.txt">048a - No Weenies Allowed</option>
						<option value="048b - Squilliam Returns.txt">048b - Squilliam Returns</option>
						<option value="049a - Krab Borg.txt">049a - Krab Borg</option>
						<option value="049b - Rock-a-Bye Bivalve.txt">049b - Rock-a-Bye Bivalve</option>
						<option value="050a - Wet Painters.txt">050a - Wet Painters</option>
						<option value="050b - Krusty Krab Training Video.txt">050b - Krusty Krab Training Video</option>
						<option value="051 - Party Pooper Pants.txt">051 - Party Pooper Pants</option>
						<option value="052a - Chocolate with Nuts.txt">052a - Chocolate with Nuts</option>
						<option value="052b - Mermaid Man and Barnacle Boy V.txt">052b - Mermaid Man and Barnacle Boy V</option>
						<option value="053a - New Student Starfish.txt">053a - New Student Starfish</option>
						<option value="053b - Clams.txt">053b - Clams</option>
						<option value="054 - Ugh.txt">054 - Ugh</option>
						<option value="055a - The Great Snail Race.txt">055a - The Great Snail Race</option>
						<option value="055b - Mid-Life Crustacean.txt">055b - Mid-Life Crustacean</option>
						<option value="056a - Born Again Krabs.txt">056a - Born Again Krabs</option>
						<option value="056b - I Had an Accident.txt">056b - I Had an Accident</option>
						<option value="057a - Krabby Land.txt">057a - Krabby Land</option>
						<option value="057b - The Camping Episode.txt">057b - The Camping Episode</option>
						<option value="058a - Missing Identity.txt">058a - Missing Identity</option>
						<option value="058b - Plankton's Army.txt">058b - Plankton's Army</option>
						<option value="059 - The Sponge Who Could Fly.txt">059 - The Sponge Who Could Fly</option>
						<option value="060a - SpongeBob Meets the Strangler.txt">060a - SpongeBob Meets the Strangler</option>
						<option value="060b - Pranks a Lot.txt">060b - Pranks a Lot</option>
						<option value="061a - Fear of a Krabby Patty.txt">061a - Fear of a Krabby Patty</option>
						<option value="061b - Shell of a Man.txt">061b - Shell of a Man</option>
						<option value="062a - The Lost Mattress.txt">062a - The Lost Mattress</option>
						<option value="062b - Krabs vs. Plankton.txt">062b - Krabs vs. Plankton</option>
						<option value="063 - Have You Seen This Snail.txt">063 - Have You Seen This Snail?</option>
						<option value="064a - Skill Crane.txt">064a - Skill Crane</option>
						<option value="064b - Good Neighbors.txt">064b - Good Neighbors</option>
						<option value="065a - Selling Out.txt">065a - Selling Out</option>
						<option value="065b - Funny Pants.txt">065b - Funny Pants</option>
						<option value="066 - Dunces and Dragons.txt">066 - Dunces and Dragons</option>
						<option value="067a - Enemy In-Law.txt">067a - Enemy In-Law</option>
						<option value="067b - Mermaid Man and Barnacle Boy VI - The Motion Picture.txt">067b - Mermaid Man and Barnacle Boy VI: The Motion Picture</option>
						<option value="068a - Patrick SmartPants.txt">068a - Patrick SmartPants</option>
						<option value="068b - SquidBob TentaclePants.txt">068b - SquidBob TentaclePants</option>
						<option value="069a - Krusty Towers.txt">069a - Krusty Towers</option>
						<option value="069b - Mrs. Puff, You're Fired.txt">069b - Mrs. Puff, You're Fired</option>
						<option value="070a - Chimps Ahoy.txt">070a - Chimps Ahoy</option>
						<option value="070b - Ghost Host.txt">070b - Ghost Host</option>
						<option value="071a - Whale of a Birthday.txt">071a - Whale of a Birthday</option>
						<option value="071b - Karate Island.txt">071b - Karate Island</option>
						<option value="072a - All That Glitters.txt">072a - All That Glitters</option>
						<option value="072b - Wishing You Well.txt">072b - Wishing You Well</option>
						<option value="073a - New Leaf.txt">073a - New Leaf</option>
						<option value="073b - Once Bitten.txt">073b - Once Bitten</option>
						<option value="074a - Bummer Vacation.txt">074a - Bummer Vacation</option>
						<option value="074b - Wigstruck.txt">074b - Wigstruck</option>
						<option value="075a - Squidtastic Voyage.txt">075a - Squidtastic Voyage</option>
						<option value="075b - That's No Lady.txt">075b - That's No Lady</option>
						<option value="076a - The Thing.txt">076a - The Thing</option>
						<option value="076b - Hocus Pocus.txt">076b - Hocus Pocus</option>
						<option value="077a - Driven to Tears.txt">077a - Driven to Tears</option>
						<option value="077b - Rule of Dumb.txt">077b - Rule of Dumb</option>
						<option value="078a - Born to Be Wild.txt">078a - Born to Be Wild</option>
						<option value="078b - Best Frenemies.txt">078b - Best Frenemies</option>
						<option value="079a - The Pink Purloiner.txt">079a - The Pink Purloiner</option>
						<option value="079b - Squid Wood.txt">079b - Squid Wood</option>
						<option value="080a - Best Day Ever.txt">080a - Best Day Ever</option>
						<option value="080b - The Gift of Gum.txt">080b - The Gift of Gum</option>
						<option value="081 - Friend or Foe.txt">081 - Friend or Foe</option>
						<option value="082a - The Original Fry Cook.txt">082a - The Original Fry Cook</option>
						<option value="082b - Night Light.txt">082b - Night Light</option>
						<option value="083a - Rise and Shine.txt">083a - Rise and Shine</option>
						<option value="083b - Waiting.txt">083b - Waiting</option>
						<option value="083c - Fungus Among Us.txt">083c - Fungus Among Us</option>
						<option value="084a - Spy Buddies.txt">084a - Spy Buddies</option>
						<option value="084b - Boat Smarts.txt">084b - Boat Smarts</option>
						<option value="084c - Good Ol' Whatshisname.txt">084c - Good Ol' Whatshisname</option>
						<option value="085a - New Digs.txt">085a - New Digs</option>
						<option value="085b - Krabs a la Mode.txt">085b - Krabs à la Mode</option>
						<option value="086a - Roller Cowards.txt">086a - Roller Cowards</option>
						<option value="086b - Bucket Sweet Bucket.txt">086b - Bucket Sweet Bucket</option>
						<option value="087a - To Love a Patty.txt">087a - To Love a Patty</option>
						<option value="087b - Breath of Fresh Squidward.txt">087b - Breath of Fresh Squidward</option>
						<option value="088a - Money Talks.txt">088a - Money Talks</option>
						<option value="088b - SpongeBob vs. The Patty Gadget.txt">088b - SpongeBob vs. The Patty Gadget</option>
						<option value="088c - Slimy Dancing.txt">088c - Slimy Dancing</option>
						<option value="089a - The Krusty Sponge.txt">089a - The Krusty Sponge</option>
						<option value="089b - Sing a Song of Patrick.txt">089b - Sing a Song of Patrick</option>
						<option value="090a - A Flea in Her Dome.txt">090a - A Flea in Her Dome</option>
						<option value="090b - The Donut of Shame.txt">090b - The Donut of Shame</option>
						<option value="090c - The Krusty Plate.txt">090c - The Krusty Plate</option>
						<option value="091a - Goo Goo Gas.txt">091a - Goo Goo Gas</option>
						<option value="091b - Le Big Switch.txt">091b - Le Big Switch</option>
						<option value="092 - Atlantis SquarePantis.txt">092 - Atlantis SquarePantis</option>
						<option value="093a - Picture Day.txt">093a - Picture Day</option>
						<option value="093b - Pat No Pay.txt">093b - Pat No Pay</option>
						<option value="093c - BlackJack.txt">093c - BlackJack</option>
						<option value="094a - Blackened Sponge.txt">094a - Blackened Sponge</option>
						<option value="094b - Mermaid Man vs. SpongeBob.txt">094b - Mermaid Man vs. SpongeBob</option>
						<option value="095a - The Inmates of Summer.txt">095a - The Inmates of Summer</option>
						<option value="095b - To Save a Squirrel.txt">095b - To Save a Squirrel</option>
						<option value="096 - Pest of the West.txt">096 - Pest of the West</option>
						<option value="097a - 20,000 Patties Under the Sea.txt">097a - 20,000 Patties Under the Sea</option>
						<option value="097b - The Battle of Bikini Bottom.txt">097b - The Battle of Bikini Bottom</option>
						<option value="098 - What Ever Happened to SpongeBob.txt">098 - What Ever Happened to SpongeBob?</option>
						<option value="099a - The Two Faces of Squidward.txt">099a - The Two Faces of Squidward</option>
						<option value="099b - SpongeHenge.txt">099b - SpongeHenge</option>
						<option value="100a - Banned in Bikini Bottom.txt">100a - Banned in Bikini Bottom</option>
						<option value="100b - Stanley S. SquarePants.txt">100b - Stanley S. SquarePants</option>
						<option value="101a - House Fancy.txt">101a - House Fancy</option>
						<option value="101b - Krabby Road.txt">101b - Krabby Road</option>
						<option value="102a - Penny Foolish.txt">102a - Penny Foolish</option>
						<option value="102b - Nautical Novice.txt">102b - Nautical Novice</option>
						<option value="103a - Spongicus.txt">103a - Spongicus</option>
						<option value="103b - Suction Cup Symphony.txt">103b - Suction Cup Symphony</option>
						<option value="104a - Not Normal.txt">104a - Not Normal</option>
						<option value="104b - Gone.txt">104b - Gone</option>
						<option value="105a - The Splinter.txt">105a - The Splinter</option>
						<option value="105b - Slide Whistle Stooges.txt">105b - Slide Whistle Stooges</option>
						<option value="106a - A Life in a Day.txt">106a - A Life in a Day</option>
						<option value="106b - Sun Bleached.txt">106b - Sun Bleached</option>
						<option value="107a - Giant Squidward.txt">107a - Giant Squidward</option>
						<option value="107b - No Nose Knows.txt">107b - No Nose Knows</option>
						<option value="108a - Patty Caper.txt">108a - Patty Caper</option>
						<option value="108b - Plankton's Regular.txt">108b - Plankton's Regular</option>
						<option value="109a - Boating Buddies.txt">109a - Boating Buddies</option>
						<option value="109b - The Krabby Kronicle.txt">109b - The Krabby Kronicle</option>
						<option value="110a - The Slumber Party.txt">110a - The Slumber Party</option>
						<option value="110b - Grooming Gary.txt">110b - Grooming Gary</option>
						<option value="111 - SpongeBob SquarePants vs. The Big One.txt">111 - SpongeBob SquarePants vs. The Big One</option>
						<option value="112a - Porous Pockets.txt">112a - Porous Pockets</option>
						<option value="112b - Choir Boys.txt">112b - Choir Boys</option>
						<option value="113a - Krusty Krushers.txt">113a - Krusty Krushers</option>
						<option value="113b - The Card.txt">113b - The Card</option>
						<option value="114a - Dear Vikings.txt">114a - Dear Vikings</option>
						<option value="114b - Ditchin'.txt">114b - Ditchin'</option>
						<option value="115a - Grandpappy the Pirate.txt">115a - Grandpappy the Pirate</option>
						<option value="115b - Cephalopod Lodge.txt">115b - Cephalopod Lodge</option>
						<option value="116a - Squid's Visit.txt">116a - Squid's Visit</option>
						<option value="116b - To SquarePants or Not to SquarePants.txt">116b - To SquarePants or Not to SquarePants</option>
						<option value="117a - Shuffleboarding.txt">117a - Shuffleboarding</option>
						<option value="117b - Professor Squidward.txt">117b - Professor Squidward</option>
						<option value="118a - Pet or Pests.txt">118a - Pet or Pests</option>
						<option value="118b - Komputer Overload.txt">118b - Komputer Overload</option>
						<option value="119a - Gullible Pants.txt">119a - Gullible Pants</option>
						<option value="119b - Overbooked.txt">119b - Overbooked</option>
						<option value="120a - No Hat for Pat.txt">120a - No Hat for Pat</option>
						<option value="120b - Toy Store of Doom.txt">120b - Toy Store of Doom</option>
						<option value="121a - Sand Castles in the Sand.txt">121a - Sand Castles in the Sand</option>
						<option value="121b - Shell Shocked.txt">121b - Shell Shocked</option>
						<option value="122a - Chum Bucket Supreme.txt">122a - Chum Bucket Supreme</option>
						<option value="122b - Single Cell Anniversary.txt">122b - Single Cell Anniversary</option>
						<option value="123-124 - Truth or Square.txt">123-124 - Truth or Square</option>
						<option value="125a - Pineapple Fever.txt">125a - Pineapple Fever</option>
						<option value="125b - Chum Caverns.txt">125b - Chum Caverns</option>
						<option value="126 - The Clash of Triton.txt">126 - The Clash of Triton</option>
						<option value="127a - Tentacle-Vision.txt">127a - Tentacle-Vision</option>
						<option value="127b - I Heart Dancing.txt">127b - I ♥ Dancing</option>
						<option value="128a - Growth Spout.txt">128a - Growth Spout</option>
						<option value="128b - Stuck in the Wringer.txt">128b - Stuck in the Wringer</option>
						<option value="129a - Someone's in the Kitchen with Sandy.txt">129a - Someone's in the Kitchen with Sandy</option>
						<option value="129b - The Inside Job.txt">129b - The Inside Job</option>
						<option value="130a - Greasy Buffoons.txt">130a - Greasy Buffoons</option>
						<option value="130b - Model Sponge.txt">130b - Model Sponge</option>
						<option value="131a - Keep Bikini Bottom Beautiful.txt">131a - Keep Bikini Bottom Beautiful</option>
						<option value="131b - A Pal for Gary.txt">131b - A Pal for Gary</option>
						<option value="132a - Yours, Mine and Mine.txt">132a - Yours, Mine and Mine</option>
						<option value="132b - Kracked Krabs.txt">132b - Kracked Krabs</option>
						<option value="133a - The Curse of Bikini Bottom.txt">133a - The Curse of Bikini Bottom</option>
						<option value="133b - Squidward in Clarinetland.txt">133b - Squidward in Clarinetland</option>
						<option value="134 - SpongeBob's Last Stand.txt">134 - SpongeBob's Last Stand</option>
						<option value="135a - Back to the Past.txt">135a - Back to the Past</option>
						<option value="135b - The Bad Guy Club for Villains.txt">135b - The Bad Guy Club for Villains</option>
						<option value="136a - A Day Without Tears.txt">136a - A Day Without Tears</option>
						<option value="136b - Summer Job.txt">136b - Summer Job</option>
						<option value="137a - One Coarse Meal.txt">137a - One Coarse Meal</option>
						<option value="137b - Gary in Love.txt">137b - Gary in Love</option>
						<option value="138a - The Play's the Thing.txt">138a - The Play's the Thing</option>
						<option value="138b - Rodeo Daze.txt">138b - Rodeo Daze</option>
						<option value="139a - Gramma's Secret Recipe.txt">139a - Gramma's Secret Recipe</option>
						<option value="139b - The Cent of Money.txt">139b - The Cent of Money</option>
						<option value="140a - The Monster Who Came to Bikini Bottom.txt">140a - The Monster Who Came to Bikini Bottom</option>
						<option value="140b - Welcome to the Bikini Bottom Triangle.txt">140b - Welcome to the Bikini Bottom Triangle</option>
						<option value="141a - The Curse of the Hex.txt">141a - The Curse of the Hex</option>
						<option value="141b - The Main Drain.txt">141b - The Main Drain</option>
						<option value="142a - Trenchbillies.txt">142a - Trenchbillies</option>
						<option value="142b - Sponge-Cano!.txt">142b - Sponge-Cano!</option>
						<option value="143 - The Great Patty Caper.txt">143 - The Great Patty Caper</option>
						<option value="144a - That Sinking Feeling.txt">144a - That Sinking Feeling</option>
						<option value="144b - Karate Star.txt">144b - Karate Star</option>
						<option value="145a - Buried in Time.txt">145a - Buried in Time</option>
						<option value="145b - Enchanted Tiki Dreams.txt">145b - Enchanted Tiki Dreams</option>
						<option value="146a - The Abrasive Side.txt">146a - The Abrasive Side</option>
						<option value="146b - Earworm.txt">146b - Earworm</option>
						<option value="147a - Hide and Then What Happens.txt">147a - Hide and Then What Happens?</option>
						<option value="147b - Shellback Shenanigans.txt">147b - Shellback Shenanigans</option>
						<option value="148a - The Masterpiece.txt">148a - The Masterpiece</option>
						<option value="148b - Whelk Attack.txt">148b - Whelk Attack</option>
						<option value="149a - You Don't Know Sponge.txt">149a - You Don't Know Sponge</option>
						<option value="149b - Tunnel of Glove.txt">149b - Tunnel of Glove</option>
						<option value="150a - Krusty Dogs.txt">150a - Krusty Dogs</option>
						<option value="150b - The Wreck of the Mauna Loa.txt">150b - The Wreck of the Mauna Loa</option>
						<option value="151a - New Fish in Town.txt">151a - New Fish in Town</option>
						<option value="151b - Love That Squid.txt">151b - Love That Squid</option>
						<option value="152a - Big Sister Sam.txt">152a - Big Sister Sam</option>
						<option value="152b - Perfect Chemistry.txt">152b - Perfect Chemistry</option>
						<option value="153a - Accidents Will Happen.txt">153a - Accidents Will Happen</option>
						<option value="153b - The Other Patty.txt">153b - The Other Patty</option>
						<option value="154a - Drive Thru.txt">154a - Drive Thru</option>
						<option value="154b - The Hot Shot.txt">154b - The Hot Shot</option>
						<option value="155a - A Friendly Game.txt">155a - A Friendly Game</option>
						<option value="155b - Sentimental Sponge.txt">155b - Sentimental Sponge</option>
						<option value="156 - Frozen Face-Off.txt">156 - Frozen Face-Off</option>
						<option value="157a - Squidward's School for Grown-Ups.txt">157a - Squidward's School for Grown-Ups</option>
						<option value="157b - Oral Report.txt">157b - Oral Report</option>
						<option value="158a - Sweet and Sour Squid.txt">158a - Sweet and Sour Squid</option>
						<option value="158b - The Googly Artiste.txt">158b - The Googly Artiste</option>
						<option value="159 - A SquarePants Family Vacation.txt">159 - A SquarePants Family Vacation</option>
						<option value="160a - Patrick's Staycation.txt">160a - Patrick's Staycation</option>
						<option value="160b - Walking the Plankton.txt">160b - Walking the Plankton</option>
						<option value="161a - Mooncation.txt">161a - Mooncation</option>
						<option value="161b - Mr. Krabs Takes a Vacation.txt">161b - Mr. Krabs Takes a Vacation</option>
						<option value="162 - Ghoul Fools.txt">162 - Ghoul Fools</option>
						<option value="163a - Mermaid Man Begins.txt">163a - Mermaid Man Begins</option>
						<option value="163b - Plankton's Good Eye.txt">163b - Plankton's Good Eye</option>
						<option value="164a - Barnacle Face.txt">164a - Barnacle Face</option>
						<option value="164b - Pet Sitter Pat.txt">164b - Pet Sitter Pat</option>
						<option value="165a - House Sittin' for Sandy.txt">165a - House Sittin' for Sandy</option>
						<option value="165b - Smoothe Jazz at Bikini Bottom.txt">165b - Smoothe Jazz at Bikini Bottom</option>
						<option value="166a - Bubble Troubles.txt">166a - Bubble Troubles</option>
						<option value="166b - The Way of the Sponge.txt">166b - The Way of the Sponge</option>
						<option value="167a - The Krabby Patty That Ate Bikini Bottom.txt">167a - The Krabby Patty That Ate Bikini Bottom</option>
						<option value="167b - Bubble Buddy Returns.txt">167b - Bubble Buddy Returns</option>
						<option value="168a - Restraining SpongeBob.txt">168a - Restraining SpongeBob</option>
						<option value="168b - Fiasco!.txt">168b - Fiasco!</option>
						<option value="169a - Are You Happy Now.txt">169a - Are You Happy Now?</option>
						<option value="169b - Planet of the Jellyfish.txt">169b - Planet of the Jellyfish</option>
						<option value="170a - Free Samples.txt">170a - Free Samples</option>
						<option value="170b - Home Sweet Rubble.txt">170b - Home Sweet Rubble</option>
						<option value="171a - Karen 2.0.txt">171a - Karen 2.0</option>
						<option value="171b - InSPONGEiac.txt">171b - InSPONGEiac</option>
						<option value="172a - Face Freeze!.txt">172a - Face Freeze!</option>
						<option value="172b - Glove World RIP.txt">172b - Glove World R.I.P.</option>
						<option value="173a - Squiditis.txt">173a - Squiditis</option>
						<option value="173b - Demolition Doofus.txt">173b - Demolition Doofus</option>
						<option value="174a - Treats!.txt">174a - Treats!</option>
						<option value="174b - For Here or to Go.txt">174b - For Here or to Go</option>
						<option value="175 - It's a SpongeBob Christmas!.txt">175 - It's a SpongeBob Christmas!</option>
						<option value="176a - Super Evil Aquatic Villain Team Up is Go!.txt">176a - Super Evil Aquatic Villain Team Up is Go!</option>
						<option value="176b - Chum Fricassee.txt">176b - Chum Fricassee</option>
						<option value="177a - The Good Krabby Name.txt">177a - The Good Krabby Name</option>
						<option value="177b - Move It or Lose It.txt">177b - Move It or Lose It</option>
						<option value="178 - Hello Bikini Bottom!.txt">178 - Hello Bikini Bottom!</option>
						<option value="179a - Extreme Spots.txt">179a - Extreme Spots</option>
						<option value="179b - Squirrel Record.txt">179b - Squirrel Record</option>
						<option value="180a - Patrick-Man!.txt">180a - Patrick-Man!</option>
						<option value="180b - Gary's New Toy.txt">180b - Gary's New Toy</option>
						<option value="181a - License to Milkshake.txt">181a - License to Milkshake</option>
						<option value="181b - Squid Baby.txt">181b - Squid Baby</option>
						<option value="182a - Little Yellow Book.txt">182a - Little Yellow Book</option>
						<option value="182b - Bumper to Bumper.txt">182b - Bumper to Bumper</option>
						<option value="183a - Eek, an Urchin!.txt">183a - Eek, an Urchin!</option>
						<option value="183b - Squid Defense.txt">183b - Squid Defense</option>
						<option value="184a - Jailbreak!.txt">184a - Jailbreak!</option>
						<option value="184b - Evil Spatula.txt">184b - Evil Spatula</option>
						<option value="185 - It Came from Goo Lagoon.txt">185 - It Came from Goo Lagoon</option>
						<option value="186a - Safe Deposit Krabs.txt">186a - Safe Deposit Krabs</option>
						<option value="186b - Plankton's Pet.txt">186b - Plankton's Pet</option>
						<option value="187a - Don't Look Now.txt">187a - Don't Look Now</option>
						<option value="187b - Seance Shmeance.txt">187b - Séance Shméance</option>
						<option value="188a - Kenny the Cat.txt">188a - Kenny the Cat</option>
						<option value="188b - Yeti Krabs.txt">188b - Yeti Krabs</option>
						<option value="189 - SpongeBob You're Fired.txt">189 - SpongeBob You're Fired</option>
						<option value="190a - Lost in Bikini Bottom.txt">190a - Lost in Bikini Bottom</option>
						<option value="190b - Tutor Sauce.txt">190b - Tutor Sauce</option>
						<option value="191a - Squid Plus One.txt">191a - Squid Plus One</option>
						<option value="191b - The Executive Treatment.txt">191b - The Executive Treatment</option>
						<option value="192a - Company Picnic.txt">192a - Company Picnic</option>
						<option value="192b - Pull Up a Barrel.txt">192b - Pull Up a Barrel</option>
						<option value="193a - Sanctuary!.txt">193a - Sanctuary!</option>
						<option value="193b - What's Eating Patrick.txt">193b - What's Eating Patrick?</option>
						<option value="194a - Patrick! The Game.txt">194a - Patrick! The Game</option>
						<option value="194b - The Sewers of Bikini Bottom.txt">194b - The Sewers of Bikini Bottom</option>
						<option value="195a - SpongeBob LongPants.txt">195a - SpongeBob LongPants</option>
						<option value="195b - Larry's Gym.txt">195b - Larry's Gym</option>
						<option value="196a - The Fish Bowl.txt">196a - The Fish Bowl</option>
						<option value="196b - Married to Money.txt">196b - Married to Money</option>
						<option value="197a - Mall Girl Pearl.txt">197a - Mall Girl Pearl</option>
						<option value="197b - Two Thumbs Down.txt">197b - Two Thumbs Down</option>
						<option value="198a - Sharks vs. Pods.txt">198a - Sharks vs. Pods</option>
						<option value="198b - CopyBob DittoPants.txt">198b - CopyBob DittoPants</option>
						<option value="199a - Sold!.txt">199a - Sold!</option>
						<option value="199b - Lame and Fortune.txt">199b - Lame and Fortune</option>
						<option value="200 - Goodbye, Krabby Patty.txt">200 - Goodbye, Krabby Patty?</option>
						<option value="201a - Sandy's Nutmare.txt">201a - Sandy's Nutmare</option>
						<option value="201b - Bulletin Board.txt">201b - Bulletin Board</option>
						<option value="202a - Food Con Castaways.txt">202a - Food Con Castaways</option>
						<option value="202b - Snail Mail.txt">202b - Snail Mail</option>
						<option value="203a - Pineapple Invasion.txt">203a - Pineapple Invasion</option>
						<option value="203b - Salsa Imbecilicus.txt">203b - Salsa Imbecilicus</option>
						<option value="204a - Mutiny on the Krusty.txt">204a - Mutiny on the Krusty</option>
						<option value="204b - The Whole Tooth.txt">204b - The Whole Tooth</option>
						<option value="205a - Whirly Brains.txt">205a - Whirly Brains</option>
						<option value="205b - Mermaid Pants.txt">205b - Mermaid Pants</option>
						<option value="206a - Unreal Estate.txt">206a - Unreal Estate</option>
						<option value="206b - Code Yellow.txt">206b - Code Yellow</option>
						<option value="207a - Mimic Madness.txt">207a - Mimic Madness</option>
						<option value="207b - House Worming.txt">207b - House Worming</option>
						<option value="208a - Snooze You Lose.txt">208a - Snooze You Lose</option>
						<option value="208b - Krusty Katering.txt">208b - Krusty Katering</option>
						<option value="209a - SpongeBob's Place.txt">209a - SpongeBob's Place</option>
						<option value="209b - Plankton Gets the Boot.txt">209b - Plankton Gets the Boot</option>
						<option value="210a - Life Insurance.txt">210a - Life Insurance</option>
						<option value="210b - Burst Your Bubble.txt">210b - Burst Your Bubble</option>
						<option value="211a - Plankton Retires.txt">211a - Plankton Retires</option>
						<option value="211b - Trident Trouble.txt">211b - Trident Trouble</option>
						<option value="212a - The Incredible Shrinking Sponge.txt">212a - The Incredible Shrinking Sponge</option>
						<option value="212b - Sportz.txt">212b - Sportz?</option>
						<option value="213a - The Getaway.txt">213a - The Getaway</option>
						<option value="213b - Lost and Found.txt">213b - Lost and Found</option>
						<option value="214a - Patrick's Coupon.txt">214a - Patrick's Coupon</option>
						<option value="214b - Out of the Picture.txt">214b - Out of the Picture</option>
						<option value="215a - Feral Friends.txt">215a - Feral Friends</option>
						<option value="215b - Don't Wake Patrick.txt">215b - Don't Wake Patrick</option>
						<option value="216a - Cave Dwelling Sponge.txt">216a - Cave Dwelling Sponge</option>
						<option value="216b - The Clam Whisperer.txt">216b - The Clam Whisperer</option>
						<option value="217a - Spot Returns.txt">217a - Spot Returns</option>
						<option value="217b - The Check-Up.txt">217b - The Check-Up</option>
						<option value="218a - Spin the Bottle.txt">218a - Spin the Bottle</option>
						<option value="218b - There's a Sponge in My Soup.txt">218b - There's a Sponge in My Soup</option>
						<option value="219a - Man Ray Returns.txt">219a - Man Ray Returns</option>
						<option value="219b - Larry the Floor Manager.txt">219b - Larry the Floor Manager</option>
						<option value="220 - The Legend of Boo-Kini Bottom.txt">220 - The Legend of Boo-Kini Bottom</option>
						<option value="221a - No Pictures Please.txt">221a - No Pictures Please</option>
						<option value="221b - Stuck on the Roof.txt">221b - Stuck on the Roof</option>
						<option value="222a - Krabby Patty Creature Feature.txt">222a - Krabby Patty Creature Feature</option>
						<option value="222b - Teacher's Pests.txt">222b - Teacher's Pests</option>
						<option value="223a - Sanitation Insanity.txt">223a - Sanitation Insanity</option>
						<option value="223b - Bunny Hunt.txt">223b - Bunny Hunt</option>
						<option value="224a - Squid Noir.txt">224a - Squid Noir</option>
						<option value="224b - Scavenger Pants.txt">224b - Scavenger Pants</option>
						<option value="225a - Cuddle E. Hugs.txt">225a - Cuddle E. Hugs</option>
						<option value="225b - Pat the Horse.txt">225b - Pat the Horse</option>
						<option value="226a - Chatterbox Gary.txt">226a - Chatterbox Gary</option>
						<option value="226b - Don't Feed the Clowns.txt">226b - Don't Feed the Clowns</option>
						<option value="227a - Drive Happy.txt">227a - Drive Happy</option>
						<option value="227b - Old Man Patrick.txt">227b - Old Man Patrick</option>
						<option value="228a - Fun-Sized Friends.txt">228a - Fun-Sized Friends</option>
						<option value="228b - Grandmum's the Word.txt">228b - Grandmum's the Word</option>
						<option value="229a - Doodle Dimension.txt">229a - Doodle Dimension</option>
						<option value="229b - Moving Bubble Bass.txt">229b - Moving Bubble Bass</option>
						<option value="230a - High Sea Diving.txt">230a - High Sea Diving</option>
						<option value="230b - Bottle Burglars.txt">230b - Bottle Burglars</option>
						<option value="231a - My Leg!.txt">231a - My Leg!</option>
						<option value="231b - Ink Lemonade.txt">231b - Ink Lemonade</option>
						<option value="232a - Mustard O' Mine.txt">232a - Mustard O' Mine</option>
						<option value="232b - Shopping List.txt">232b - Shopping List</option>
						<option value="233a - Whale Watching.txt">233a - Whale Watching</option>
						<option value="233b - Krusty Kleaners.txt">233b - Krusty Kleaners</option>
						<option value="234a - Patnocchio.txt">234a - Patnocchio</option>
						<option value="234b - ChefBob.txt">234b - ChefBob</option>
						<option value="235a - Plankton Paranoia.txt">235a - Plankton Paranoia</option>
						<option value="235b - Library Cards.txt">235b - Library Cards</option>
						<option value="236a - Call the Cops.txt">236a - Call the Cops</option>
						<option value="236b - Surf N' Turf.txt">236b - Surf N' Turf</option>
						<option value="237 - Goons on the Moon.txt">237 - Goons on the Moon</option>
						<option value="238a - Appointment TV.txt">238a - Appointment TV</option>
						<option value="238b - Karen's Virus.txt">238b - Karen's Virus</option>
						<option value="239a - The Grill is Gone.txt">239a - The Grill is Gone</option>
						<option value="239b - The Night Patty.txt">239b - The Night Patty</option>
						<option value="240a - Bubbletown.txt">240a - Bubbletown</option>
						<option value="240b - Girls' Night Out.txt">240b - Girls' Night Out</option>
						<option value="241a - Squirrel Jelly.txt">241a - Squirrel Jelly</option>
						<option value="241b - The String.txt">241b - The String</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Synopsis</td>
				<td>
					<input type="file" name="fileToUpload" accept=".txt">
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td>
					<input type="password" name="sbcPassword">
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>
					<input type="submit" name="submit" value="Upload">
				</td>
			</tr>
		</table>
	</form>
	</body>
</html>
EOT;

?>