<html>
<head>
<meta charset="UTF-8">
<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type='text/javascript' src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<script src="./script/jquery.scrollTo.min.js"></script>
<script src="./script/public.js"></script>
<link type="text/css" rel="stylesheet" href="css/main.css" media="screen" />

</head>
<body>
<div id="content">
	<div id="landing-page">
			<div id="landing-content">
				<h1 id="title">■■■■■■■.ws</h1>
				<h3 id="language" style="float:left; position:absolute;"><a id="lang-fr" href="#">FR</a> ■ <a id="lang-en" href="#">EN</a></h3>
				<div id="text-english" class="landing-text">
					<h3>about:retention</h3>
					<p >February 1st, 2014.</p>
					<p>Retention as in what we leave behind, intentionally or not; what we hold on to as keepsakes; what we decide to show and what we decide to bury.  
					<br/><br/>
					From 14/08/2011 to 25/08/2012, all text messages sent or received through my cellphone were saved. That was the first mobile phone that I owned, its number being 514 374 8030. I have decided to put all of it online, so the different narratives can be explored. I will edit the parts that I do not wish to disclose as time goes by. While the content will disapears, all edits will leave marks. I will do this until I am satisfied with what is accessible but in the meantime, everything is there, good and bad. Feel free to loiter.
					<br/><br/>
					So far, <?php include "../lib/nb_edits.php"; ?> text messages have been redacted in part or in their entirety.
					<br/><br/>
					Click to navigate.<br/>
					Double click to highlight a particular correspondant.<br/>
					Click on the square below to put the page in fullscreen<br/>
					
					<br/>
					<a href="mailto:hello@samuelcousin.com?Subject=■■■■■■■.ws">Samuel.</a>
					</p>
				</div>
				<div id="text-francais" class="landing-text">
					<h3>about:retention</h3>
					<p >1er Février, 2014.</p>
					<p>Retention c'est à dire, ce que l'on laisse dérièrre comme trace, voulue ou non; ce que l'on garde comme souvenir mais aussi, ce que l'on choisi de montrer et ce que l'on dissimule.
					<br/><br/>
					Durant une année, c'est a dire du 14/08/2011 jusqu'au 25/08/2012, j'ai conservé tout les message textes qui on été envoyé vers ou à partir de mon téléphone portable.C'était, incidamment, mon premier véritable téléphone cellulaire: mon numéro, à l'époque, était le 514 374 8030.  
					<br/><br/>
					À partir d'aujourd'hui, je vais censurer le contenu que je ne veux pas rendre disponible, pour une raison ou pour une autre.Chaque altérations laissera toutefois sa trace, prenant la forme d'une marque noire.Je vais éditer un peu chaque jour, jusqu'à ce que je sois satisfait avec ce qu'il y a d'accessible. En attendant, tout est là, le bon autant que le mauvais. Libre à vous de flâner.
					<br/><br/>
					Jusqu'à présent, <?php include "../lib/nb_edits.php"; ?> messages on été édité en partie ou en totalité.
					<br/><br/>
					Cliquer avec la souris pour naviquer.<br/>
					Double cliquer pour illuminer une correspondance.<br/>
					Appuyer sur Espace pour réinitialiser les selections.<br/>
					<br/>
					<a href="mailto:hello@samuelcousin.com?Subject=■■■■■■■.ws">Samuel.</a>
					</p>
				</div>
			</div>
			<div id="loader">
				<div id="loading">
				<img src="img/loading-squares.gif"/>
				<p>loading.</p>
				</div>
				<div id="loaded">
				<img src="img/loaded-squares.gif"/>
				<p>ready.</p>
				</div>
			</div>	
	</div>
	<p id="all-the-text"></p>
</div>
</body>
<script>

$( window ).load(function(e) {
$.scrollTo(0, 0);
$("#landing-page").css({"display": "block", "visibility": "visible"});
});

$("#lang-fr").click(function(){
	$.scrollTo(0, 0);
  $(this).parent().fadeOut("fast");
  $("#text-francais").fadeIn(3000);
  $("#loader").fadeIn(6000);
  loadMessage(); 
});

$("#lang-en").click(function(){
	$.scrollTo(0, 0);
  $(this).parent().fadeOut("fast");
  $("#text-english").fadeIn(3000);
  $("#loader").fadeIn(6000);
  loadMessage(); 
});
</script>

</html>
