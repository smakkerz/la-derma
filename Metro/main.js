/* METRO UI TEMPLATE
/* Copyright 2013 Thomas Verelst, http://metro-webdesign.info*/

/*This file does the basic things for the template like loading pages and uses functinos of functions.js*/
$show = {
	prepareTiles: function(){ /* Prepare for showing the tilepage */
		$events.onTilesPrepare();
		$("#subNav").fadeOut(hideSpeed);
		$("#centerWrapper").fadeOut(hideSpeed,function(){
			$show.tiles();
		}); 
	},
	tiles: function(){ /* Show homepage */
		$("#adminEditButton").attr("href","admin/code-editor.php?p=../config/tiles.php"+$hashed.parts[0]); // for admin editor things
		$tileContainer = $("#tileContainer")	
		$allTiles = $tileContainer.children(".tile");
		$tileContainer.show().children().hide();
		$("#contentWrapper, #subNavWrapper").hide();
		$("#centerWrapper").show();
		
		document.title = siteTitle+" - "+siteTitleHome;
		if($hashed.parts.length==1 || ($group.current = inArrayNCindex($hashed.parts[1].addSpaces(),$group.titles)) == -1){$group.current = 0;}
		$("html, body").animate({"scrollLeft":getMarginLeft($group.current)},1);
		$page.current = "home";
		
		$tileContainer.addClass("loading")
		$events.beforeTilesShow();
		
		if($group.inactive.opacity==1){ /* Code for effects */
			if($group.showEffect==0){	
				$allTiles.each(function(index) {
					var $this = $(this)
					if($this.hasClass("group0")){
						$this.delay(50*index).show(300);
					}else{
						$this.delay(50*index).fadeIn(300);
					}		
				});
			}else if($group.showEffect==1){
				$allTiles.fadeIn(700);
			}else if($group.showEffect==2){
				$allTiles.show(700);
			}
			$tileContainer.children(".groupTitle").fadeIn(700);
		}else{
			$allTiles.not(".group"+$group.current).fadeTo(700,$group.inactive.opacity);
			$tileContainer.children(".group"+$group.current).removeClass("inactiveTile").fadeTo(700,1);
			$tileContainer.children(".groupTitle").fadeTo(500,$group.inactive.opacity);
			$("#groupTitle"+$group.current).fadeTo(500,1);
			if(!$group.inactive.clickable){
				$tileContainer.unbind("click.inactiveTile");
				$tileContainer.on("click.inactiveTile",".tile",function(){
					var $this = $(this)
					if(!$this.hasClass("group"+$group.current)){
						var thisClass = $this.attr("class")
						$group.goTo(parseInt(thisClass.substr((thisClass.indexOf("group")+5),3)));
						return false;
					}
				});
				$allTiles.not(".group"+$group.current).addClass("inactiveTile");
			}
		}

		setTimeout(function(){
			$tileContainer.removeClass("loading")
			$arrows.place(400); // must ALWAYS happen after ALL tiles are showed! (in this case, tiles after 700ms, arrows after 350+800 ms
		 	$(window).resize(); // check the scrollbars now, same as ^
			$events.afterTilesShow();
		},701);
		
		$mainNav.setActive();
		
		$(window).resize();
	},
	page:function(){ /* show a page with content */
		$("#adminEditButton").attr("href","admin/page-editor.php?p="+$hashed.parts[0]);
		$content = $("#content")
		$("#tileContainer").hide();
		$("#centerWrapper").show();
		if($("#contentWrapper").css("display")=="none"){
			$("#contentWrapper, #subNavWrapper").fadeIn(700);
		}
		$content.html("<img src='themes/"+theme+"/img/primary/loader.gif' height='24' width='24'/>");
		$group.current = -1;
		$page.current = "loading";
		
		var title;
		if($hashed.parts[0].substr(0,4) == "url="){ // if the template already noticed the link was not in pageTitles array when generating the url
			title = $hashed.parts[0].substr(4).split(".")[0].addSpaces();
			url = $hashed.parts[0].substr(4);
		}else{ // url is OK
			var hashReq = $hashed.parts[0].addSpaces();
			var i = inArrayNCkey(hashReq,pageTitles); // find the corresponding array entry with title
			if(i!=-1){ // found!
				title = pageTitles[i];
				url = i;
			}else{ // not found! let's do a wild guess of the url!
				title = hashReq.split(".")[0];
				url = hashReq;
			}
		}
		
		$.ajax("pages/"+url+(typeof $hashed.get[1] != "undefined" ? "?"+$hashed.get[1] : "")).success(function(newContent,textStatus){	
			$content.fadeOut(50,function(){	
				$content.html(newContent);
				$page.current = url;
				$subNav.make();
				transformLinks();
				$events.beforeSubPageShow();
				$content.show(500,function(){
					$events.afterSubPageShow();
					$(window).resize();
				});
				if (typeof _gaq !== "undefined" && _gaq !== null) {_gaq.push(['_trackPageview', "/#!/"+$hashed.parts[0]]); }
			});
		}).error(function(){
			title = "Page not Found";
			$content.html("<h2 class='margin-t-0'><br>We're sorry :(</h2>the page you're looking for is not found.").show(400);
			$subNav.setActive();
		})
		
		document.title = title+" | "+siteTitle;
		$(window).resize();
	}
}

$(window).hashchange(function(){
	$hashed.get = chars(decodeURI(window.location.hash).replace("#!/","").replace("!/","").replace("#!","").replace("#","")).split("?");
	$hashed.parts = $hashed.get[0].split("&");
	$events.hashChangeBegin();
	if($hashed.doRefresh){
		if($hashed.parts[0] == ""){ // homepage with tiles
			if($group.current == -1){ // no tiles shown
				if($page.current == ""){
					$show.tiles();
				}else{
					$show.prepareTiles();
				}
			}else{ // it must have been a tilegroup switch
				if($hashed.parts.length>1){
				}else if($group.current == 0){//we refresh the page
					$show.prepareTiles();
				}else{
					$group.goTo(0);
				}		
			}
		}else{ // page with content
			if($page.current == "home"){ // homepage with tiles
				$("#centerWrapper").fadeOut(hideSpeed,function(){
					$show.page();
				});
			}else if($page.current != ""){ // other content page
				$("#content").fadeOut(hideSpeed,function(){
					$show.page();
				});
			}else{ // nothing loaded yet
				$show.page();
			}
		}
	}

	$events.hashChangeEnd();
});


$(window).resize(function(){
	$events.windowResizeBegin();

	$tileContainer =  $("#tileContainer")
	
	if(device!="desktop"){/*Fix scrolling issues on mobile devices*/
		$('<style></style>').appendTo($(document.body)).remove();
	}
	
	/*Responsive tile layout only in full version */
	
	/*Check mousewheel */
	if(!mouseScroll || $group.direction == "vertical" || $page.current != 'home' || $page.layout == "column" || (disableGroupScrollingWhenVerticalScroll && $(document).height()>$(window).height())){	/*Scrolling on pages and home */
		$(document).unbind("mousewheel");	
	}else{
		$(document).bind("mousewheel", function(event, delta) { /* Mouse scroll to move tilepages */		
			if(!scrolling){
				 if(delta>0){
					 $group.goLeft();
				 }else{
					 $group.goRight();
				 }
			}
			event.preventDefault();
		});
	}
	
	/* Change menu if page is too small */
	if($("#headerWrapper").height()>$("#headerTitles").height()*1.3){		
		$("nav").find("img").hide();
	}else{
		$("nav").find("img").show();
	}
	
	/* Adapt wrapper to header height */
	$("#wrapper").css("padding-top",$("#headerWrapper").height())
	
	/*Fix scrolling */
	
	$events.windowResizeEnd();
});

/* To prevent scroll bugs */
$(window).scroll(function(){
	if(scrollHeader && $group.direction == "horizontal"){
		$("header").css("top",-$(document).scrollTop());
	}
	
	if(!scrolling && $page.current == "home"){
		var scrollLeft = $(window).scrollLeft()/(scaleSpacing*zoomScale);
	
		var diffSpacing = [];
		var t = 0; // temp var 
		diffSpacing[0] = scrollLeft;
		for(i=1;i<$group.spacing.length;i++){
			t += $group.spacing[i-1];
			diffSpacing[i] = Math.abs(t-scrollLeft);
		}
		var t = 999;
		var n = 0;
		for(var i in diffSpacing){
			if(diffSpacing[i]<t){
				t=diffSpacing[i];
				n = i;
			}
		}
		if($group.current != n){
			$group.current = parseInt(n);
			if(typeof setHash != "undefined"){
				clearTimeout(setHash);
			}
			setHash = setTimeout(function(){
				window.location.hash = "&"+$group.titles[parseInt($group.current)].toLowerCase().stripSpaces();
				$arrows.place(400);
			},300);
			
			scrollBg();
			$mainNav.setActive();
			setTileOpacity();
		}
		$events.onScroll();		
	}	
});

setTileOpacity = function(){
	if($group.inactive.opacity==1 || $page.layout == "column"){ // makes the inactive tilegroups transparent
			$tileContainer.children().not(".navArrows").fadeTo(0,1);
		}else{
			$tileContainer.children(".tile,.groupTitle").not(".group"+$group.current).stop().fadeTo(500,$group.inactive.opacity);
			$tileContainer.children(".group"+$group.current+", #groupTitle"+$group.current).removeClass("inactiveTile").stop().fadeTo(500,1);
			if(!$group.inactive.clickable){ // if this function is activatd, clicking on an inactive tilegroup will go to that tilegroup
				$tileContainer.unbind("click.inactiveTile");
				$tileContainer.on("click.inactiveTile",".tile",function(){
					var $this = $(this)
					if(!$this.hasClass("group"+$group.current)){
						var thisClass = $this.attr("class")
						$group.goTo(parseInt(thisClass.substr((thisClass.indexOf("group")+5),3)));
						return false;
					}
				});
				$tileContainer.children(".tile").not(".group"+$group.current).addClass("inactiveTile");
			}
		}
}

window.onload = function(){
	$tileContainer  = $("#tileContainer");
	
	$events.siteLoad();
		
	/* for fixing dimension issues */
	for(i=0;i<$group.count;i++){
		var mostRightGr = -999;
		$tileContainer.children(".group"+i).each(function(){
			
			/*For good scrolling */
			var thisRight = parseInt($(this).css("margin-left"))+$(this).width(); // GLOBAL
			if(thisRight>mostRight){
				mostRight=thisRight;
			}
			var thisDown= parseInt($(this).css("margin-top"))+$(this).height();
			if(thisDown>mostDown){
				mostDown=thisDown;
			}
			thisRightGr = parseInt($(this).css('margin-left'))+$(this).width()  // FOR THIS GROUP 
			if(thisRightGr > mostRightGr){
				mostRightGr = thisRightGr
			}
			$arrows.rightArray[i]=mostRightGr;
			
			/* For nice urls with nice transitions */
			if(typeof $(this).attr("href") != "undefined"){
				$(this).attr("href",$(this).attr("href").replace("?p=","#!/"));
			}		
		})				
	}	
	tileContainer = $("#tileContainer").html();
	
	/*For good scrolling */
	fixScrolling();
	
	/* make links for mainnav for navigation */
	$mainNav.init();
	
	/*Start page rendering */
	setTimeout(function(){
		$(window).hashchange();
	},20);
	$(window).resize();
};