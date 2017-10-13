$.plugin($beforeSubPageShow,{
	accordion:function(){
		$("div.metro-accordion").children("h3").each(function(){
			$(this).addClass("accordionTitle").next().addClass("accordionContent").hide();
			$(this).prepend("<img class='accordionArrow' src='themes/"+theme+"/img/primary/arrowRight.png'/>");
			
		});
		if(!$("div.metro-accordion").hasClass("no-memory")){
			for(var i = 1;i<$hashed.parts.length;i++){
				if($hashed.parts[i].substr(0,4) == "acc="){
					var t = $hashed.parts[i].substr(4);
					$("div.metro-accordion").children("h3").each(function(){
						if($(this).text().toLowerCase() == t){
							$(this).next().slideDown(500);
							if($.browser.name=="msie" && $.browser.version<9){
								$(this).children("img").attr("src","themes/"+theme+"/img/primary/arrowBottom.png")
							}else if($.layout.name == "webkit"){	
								r=89;
								$accordion.turnImageDown($(this).children("img"));
							}else{
								$(this).children("img").removeClass('right').addClass("down");
							}
							if(!$("div.metro-accordion").hasClass("no-scrollto")){
								setTimeout(function(el){$("html,body").animate({scrollTop: $(el).offset().top},500)},500,this);
							}
							return false;
						}
					});
					break;
				}
			}
			setTimeout("$hashed.doRefresh = true",500);
		}
		$("#content").children("div.metro-accordion").on("click","h3",function(){
			var $c = $(this).next(),
				$d = $(this).parent();
			if($c.css("display") == "none"){
				if($d.hasClass("hide-others")){
					$d.children("div").stop().slideUp(500);
					$d.children("h3").children("img").attr("src","themes/"+theme+"/img/primary/arrowRight.png").removeClass('down').addClass("right");
					if($.layout.name == "webkit"){
						r=0;
						$accordion.turnImageRight($d.children("h3").children("img"));
					}
				}
				$c.stop().slideDown(500);
				if($.browser.name=="msie" && $.browser.version<9){
					$(this).children("img").attr("src","themes/"+theme+"/img/primary/arrowBottom.png")
				}else if($.layout.name == "webkit"){	
					r=0;
					$accordion.turnImageDown($(this).children("img"));
				}else{
					$(this).children("img").removeClass('right').addClass("down");
				}
				if(!$d.hasClass("no-scrollto")){
					$("html,body").animate({scrollTop: $(this).offset().top},500);
				}
				if(!$d.hasClass("no-memory")){
					$hashed.doRefresh = false;
					for(var i = 1;i<$hashed.parts.length;i++){
						if($hashed.parts[i].substr(0,4) == "acc="){
							 $hashed.parts.splice(i,1);
							 window.location.hash = $hashed.parts.join("&");
							 break;
						}
					}
					window.location.hash += "&acc="+$(this).text().toLowerCase(); 
					setTimeout("$hashed.doRefresh = true",500);
				}
			}else{
				$c.stop().slideUp(500);
				if($.browser.name=="msie" && $.browser.version<9){
					$(this).children("img").attr("src","themes/"+theme+"/img/primary/arrowRight.png")
				}else if($.layout.name == "webkit"){
					r=90;
					$accordion.turnImageRight($(this).children("img"));
				}else{
					$(this).children("img").removeClass('down').addClass("right");					
				}
				if(!$d.hasClass("no-memory")){
					$hashed.doRefresh = false;
					for(var i = 1;i<$hashed.parts.length;i++){
						if($hashed.parts[i].substr(0,4) == "acc="){
							 $hashed.parts.splice(i,1);
							 window.location.hash = $hashed.parts.join("&");
							 break;
						}
					}
					setTimeout("$hashed.doRefresh = true",500);
				}
			}
		});
	}
});
$accordion={
	turnImageDown:function(img){
	    r+=9;
		$accordion.turn(img,r);
	    if(r<90){setTimeout(function(){$accordion.turnImageDown(img)},40)}else{setTimeout(function(){$accordion.turn(img,90)},40)}
	},
	turnImageRight: function(img){
	    r-=9;
	    $accordion.turn(img,r);
	    if(r>0){setTimeout(function(){$accordion.turnImageRight(img)},40)}else{setTimeout(function(){$accordion.turn(img,0)},40)}
	},
	turn:function(img,r){
	    img.css("transform","rotate("+r+"deg)").css("-webkit-transform","rotate("+r+"deg)")
	}
}