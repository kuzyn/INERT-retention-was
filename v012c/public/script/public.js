
function loadMessage()
{
    var xmlhttp;
    var url;

    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange=function()
    {
	        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            $("#loading").fadeOut("slow", function () {
                $("#loaded").fadeIn();
            });

            $('.landing-text, #title').click(function () {
					$("#landing-page").fadeOut("slow", function () {
					document.getElementById("all-the-text").innerHTML = xmlhttp.responseText;
					colorThread();
					$("#all-the-text").fadeIn("slow");
					checkForClick();
					checkForDblClick();
					
					});
			});
			
			$('#loader').click(function () {
					toggleFullScreen();
					$("#landing-page").fadeOut("slow", function () {
					document.getElementById("all-the-text").innerHTML = xmlhttp.responseText;
					colorThread();
					$("#all-the-text").fadeIn("slow");
					checkForClick();
					checkForDblClick();
					
					});
			});
		}
    }
    xmlhttp.open("GET","../lib/populate.php",true);
    xmlhttp.send();
}

 function colorThread() {
     $(".txt-msg").each(function () {
		 var itemClasses = this.classList;
		 var itemThread = itemClasses[1];
		 var alpha = 0.4;
		  
		 var r = Math.round(((itemThread.slice(13, 16))*230)/999);
         var g = Math.round(((itemThread.slice(11, 14))*230)/999);
         var b = Math.round(((itemThread.slice(12, 15))*230)/999);
         
         
         if ((r+g+b) <= 100) {
             r = Math.round(r + (r/2));
             g = Math.round(g + (r/2));
             b = Math.round(b + (r/2));
         }
		 
         var rgbvalue = 'rgba(' + r + ',' + g + ',' + b + ',' +alpha + ')';
         $(this).css(
             'background', rgbvalue
         );
     });
 }

function checkForDblClick() { 
	$(".txt-msg").dblclick(function() {
		var itemClasses = this.classList;
		var itemThread = itemClasses[1];
		console.log(itemThread);
		//revealThread($(this));
		colorThread($(this), itemThread);


function colorThread($div, tId) {
    if ($div.hasClass(tId))
        $div.toggleClass('txt-msg-white');
    
    setTimeout(function () {
        
        (function togglePrev($div) {
            if ($div.hasClass(tId))
                $div.toggleClass('txt-msg-white');
            setTimeout(function () {
                togglePrev($div.prev());
            }, 100);
        })($div.prev());

        (function toggleNext($div) {
            if ($div.hasClass(tId))
                $div.toggleClass('txt-msg-white');
            setTimeout(function () {
                toggleNext($div.next());
            }, 100);
        })($div.next());

    }, 100);
}

	});
} 


$(document).keydown(function (e) {
            if (e.keyCode == 32) {
                $(".txt-msg").addClass("txt-msg-white");
            }
 });
 
function checkForClick() { 
	$(".txt-msg").click(function() {
	$(this).animate({
			opacity: 1
		  }, 100 );
		var offY = Math.round($( window ).height()/12);
		var offX = Math.round($( window ).width()/5);
		var itemId = "#"+$(this).attr("id");
		$.scrollTo(itemId, {offset: {top:-offY, left:-offX}, easing : 'easeInOutCubic', duration : 2000});
		var lastClickedItem = itemId;
	  });
}

 document.onkeydown = function(e) {
	if (e.which == 37 || e.which == 38 || e.which == 39 || e.which == 40 ) {
		return false;
	}
 }
 
 if(window.addEventListener){
    window.addEventListener('DOMMouseScroll',wheel,false);
}

function wheel(event)
{
    event.preventDefault();
    event.returnValue=false;
}
window.onmousewheel=document.onmousewheel=wheel;

function toggleFullScreen() {
  if (!document.fullscreenElement &&    // alternative standard method
      !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement ) {  // current working methods
    if (document.documentElement.requestFullscreen) {
      document.documentElement.requestFullscreen();
    } else if (document.documentElement.msRequestFullscreen) {
      document.documentElement.msRequestFullscreen();
    } else if (document.documentElement.mozRequestFullScreen) {
      document.documentElement.mozRequestFullScreen();
    } else if (document.documentElement.webkitRequestFullscreen) {
      document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
    }
  } else {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    }
  }
}

