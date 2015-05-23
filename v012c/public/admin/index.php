<html>
<head>
<meta charset="UTF-8">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="../script/jquery.jeditable.mini.js"></script>
<script src="../script/jquery.scrollTo.min.js"></script>
<link 	type="text/css" rel="stylesheet" href="../css/admin.css"  media="screen" />	
</head>

<?php
require_once '../../config/config.php';
require_once '../../lib/Textmessage.php';

$pullText = new Textmessage();
?>
<body>
<div id="content">
	<div id="all-the-texts">
	<p>
	<?php
	echo $pullText::fetchAllRowAllMsg($DBcon, 0);
	?>
	</p>
	</div>
</div>
</body>

<script>
  $(".txt-msg").editable("../../lib/write_db.php", { 
      tooltip   : "Doubleclick to edit...",
	  event     : "dblclick",
      style  : "inherit",
  });

    	$(".txt-msg").click(function() {
		var offY = Math.round($( window ).height()/24);
		var offX = Math.round($( window ).width()/5);
		var itemId = "#"+$(this).attr("id");
		$.scrollTo(itemId, {offset: {top:-offY, left:-offX}, duration : 2000});
		var lastClickedItem = itemId;
	  });
	  
</script>

</html>
