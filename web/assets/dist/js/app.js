function _dymm_toggle_history(){jQuery("#history").toggleClass("off-canvas")}function _dymm_walk_history(e){var a,t=jQuery("#history .active"),t="future"==e?t.parent().next():t.parent().prev();t.length?(t=jQuery("a",t).attr("href"),window.location.href=t):(a=jQuery("#indicator"),"past"==e?a.addClass("left-side").animate({opacity:1},200,function(){a.animate({opacity:0},200,function(){a.removeClass("left-side")})}):a.addClass("right-side").animate({opacity:1},200,function(){a.animate({opacity:0},200,function(){a.removeClass("right-side")})}))}function _dymm_show_videoOverlay(){jQuery("#history").addClass("off-canvas"),jQuery("#overlay").removeClass("off-canvas").animate({top:0},400)}function _dymm_hide_videoOverlay(){jQuery("#overlay").animate({top:"-100%"},400,function(){jQuery(this).addClass("off-canvas")})}function _dymm_restoreOpacity(){jQuery("#image, #text, #video-background").css("opacity",1)}jQuery(document).ready(function(){jQuery("#overlay").addClass("off-canvas"),jQuery("#trigger-overlay").click(function(e){return e.preventDefault(),_dymm_show_videoOverlay(),!1}),jQuery("#overlay").click(function(e){_dymm_hide_videoOverlay()}),jQuery(document).click(function(e){var a=jQuery("#image"),t=jQuery("#overlay");a.length&&t.hasClass("off-canvas")&&_dymm_restoreOpacity()}),jQuery(document).keydown(function(e){var a=jQuery("#image"),t=jQuery("#overlay");if(a.length&&t.hasClass("off-canvas"))switch(e.which){case 37:a.css("background-position","left center");break;case 38:a.css("background-position","center top");break;case 39:a.css("background-position","right center");break;case 40:a.css("background-position","center bottom");break;default:a.css("background-position","center center")}if(!t.length||t.hasClass("off-canvas"))switch(e.which){case 72:_dymm_toggle_history();break;case 78:_dymm_walk_history("future");break;case 80:_dymm_walk_history("past");break;case 86:_dymm_show_videoOverlay()}t.hasClass("off-canvas")||27===e.which&&_dymm_hide_videoOverlay()}),$$("body").swipeLeft(function(){_dymm_walk_history("future")}),$$("body").swipeRight(function(){_dymm_walk_history("past")}),jQuery("#trigger-overlay").length||$$("body").swipeDown(function(){_dymm_show_videoOverlay()}),$$("#overlay").swipeUp(function(){_dymm_hide_videoOverlay()}),$$("#image, #text").hold(function(e){_dymm_toggle_history()}),$$("#image, #text").doubleTap(function(){_dymm_restoreOpacity()})});