var $j = jQuery,w,h,pgnav=new Array(), ie=9,mobile=(/iphone|ipad|ipod|android|blackberry|mini|windows\sce|palm/i.test(navigator.userAgent.toLowerCase())),ios=(/(iPad|iPhone|iPod)/i.test(navigator.userAgent.toLowerCase()));


$j(document).ready(function(){

	if( Exsists($j('noscript')) ){$j('noscript').remove();}

	Resize();
	$j(window).resize(function(){ Resize(); });
	
	// If anchor hash exsists
	if(Exsists(location.hash)){
		GoToAnchor(location.hash.substring(1));
	}
	
	// Check if Bootstrap.js is loaded
	//if(ie>9){ if(typeof($j.fn.popover) == 'undefined'){ console.log("Bootstrap .js may not be loaded") } }
	
	if(!mobile){
		// Paralaxx
		/* Paralaxx('div.container-sp'); */ // Reset
	  	/* $j(window).scroll(function(){ Paralaxx('div.container-sp'); ScrollReveal();  }); */
	  	$j(window).scroll(function(){ ScrollReveal();  });
	}
	
	// Nav Dropdowns
	// $j('nav#nav_row .nav li').click(function(e){
	// 	if(Exsists($j(this).find('a'))){ var lnkurl = $j(this).find('a').attr('href'); GoToAnchor( lnkurl.split('#')[1]  ); }
	// });

	
	// Add smooth scrolling between anchor points on same page (STACEY)

		var windowWidth = $j(window).width();
		var headerHeight;

		if (windowWidth >= 480) {
			headerHeight = $j(".header").height() - 24;
			}

		else {
			headerHeight = $j(".header").height() + 24;
			}

			$j(function() {
			  $j('a[href*="#"]:not([href="#"])').click(function() {
			    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			      var target = $j(this.hash);
			      target = target.length ? target : $j('[name=' + this.hash.slice(1) +']');
			      if (target.length) {
			        $j('html,body').animate({
			          scrollTop: target.offset().top - headerHeight
			        }, 1000);
			        return false;
			      }
			    }
			  });
			});

	
	// Replace video thumb with video
	$j('#vidthumb').click(function(){
		$j(this).append('<iframe class="embed-responsive-item" src="http://www.youtube.com/embed/_rpm8JIBgD8?autoplay=1&showinfo=0&rel=0" frameborder="0"/>')		
	});
	
	// Staff Thumbnails
	// Updated by Stacey 5/11/16: Clicking image thumbnail opens modal
	// and clicking 'Read More' link redirects to individual staff bio page
	$j('.staff_thumbnail .staff-headshot, .thumb').click(function(){
		var thumbinfo = $j(this).closest('.staff_thumbnail'),
			thumbdetails = $j(thumbinfo).find('.bio').html(),
			thumbimg = $j(thumbinfo).find('img').attr('src');
			
			if(!IsDefined(thumbdetails)){ thumbdetails= $j(thumbinfo).find('.details').html(); }
			if(!IsDefined(thumbimg)){ thumbimg = $j(thumbinfo).css('background-image').replace(/.*\s?url\([\'\"]?/, '').replace(/[\'\"]?\).*/, '');}
			
		if( Exsists($j('#teamModal')) ){
			
			$j('#teamModal').find('#teamModalName').html( $j(thumbinfo).find('.name').html() );
			$j('#teamModal').find('#teamModalTitle').html( $j(thumbinfo).find('.title').html() );
			$j('#teamModal').find('.modal-body').html( '<img src="'+thumbimg+'" class="img-responsive">' ).append('<div class="bio">'+thumbdetails+'</div>');
			
			$j('#teamModal').modal();

		};
	});
	
	// Center Staff Thumbnails if less than 4
	$j('#primary_whoweare').find('.row').each(function(i){
		if( $j(this).find('.thmbcol').length < 4 ){
			$j(this).addClass('row-centered').find('.thmbcol').addClass('col-centered')
		}
	});
		
  ArrangeThumbs();

 	$j('.primary_nav').animate({
    opacity: 1
  }, 200, function() {
    // Animation complete.
  });


 // Set initial height equal to width for staff thumbnails 
 // and also update on window resize (STACEY)
 var headshotWidth = $j('.staff-headshot').width();
 $j('.staff-headshot').height(headshotWidth);

 $j(window).resize(function() {
 	 headshotWidth = $j('.staff-headshot').width();
	 $j('.staff-headshot').height(headshotWidth);
	 });


	// Mobile menu (STACEY)
	var headerHeight = $j('.header').outerHeight();	

	$j('.mobile-nav-icon').click(function(){ 
		$j('body').toggleClass('noscroll');
		//headerHeight = $j('.header').outerHeight();
		// $j('.menu-main-menu-container').css('top', headerHeight).fadeToggle(); 
		$j('.menu-main-menu-container').fadeToggle(); 
	});

	var windowWidth = $j(window).width();

	$j('.menu-item a').click(function(){ 
		windowWidth = $j(window).width();

		if (windowWidth <= 960) {
			$j('body').toggleClass('noscroll');
			$j('.menu-main-menu-container').fadeToggle(); 
			}
		else {
			}
	});


  // Add classes to main nav (Stacey)
  $j('.menu-item a:contains("Homepage")').closest('.menu-item').addClass('home-nav-link');
  $j('.menu-item a:contains("Contact")').closest('.menu-item').addClass('contact-nav-link');
  $j('.menu-item a:contains("Jobs")').closest('.menu-item').addClass('jobs-nav-link');


});

// 	  // Logic for managing cookies
// 	  function createCookie(name, value, days) {
// 	      if (days) {
// 	          var date = new Date();
// 	          date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
// 	          var expires = "; expires=" + date.toGMTString();
// 	      } else var expires = "";
// 	      document.cookie = name + "=" + value + expires + "; path=/";
// 	  }

// 	  function readCookie(name) {
// 	      var nameEQ = name + "=";
// 	      var ca = document.cookie.split(';');
// 	      for (var i = 0; i < ca.length; i++) {
// 	          var coo = ca[i];
// 	          while (coo.charAt(0) == ' ') coo = coo.substring(1, coo.length);
// 	          if (coo.indexOf(nameEQ) == 0) return coo.substring(nameEQ.length, coo.length);
// 	      }
// 	      return null;
// 	  }

// 	  function eraseCookie(name) {
// 	      createCookie(name, "", -1);
// 	  }

// 	  if (!readCookie('hide')) {
// 	        // Display popup if window is wider than 481px
// 	        if ($j(window).width() > 481) {
// 	            // On load, show popup
// 	            $j('.overlay').show();
// 	            $j('.popup').show();
// 	            // ga('send', 'event', 'Nav Lightbox', 'Load', this.href, {
// 	            //     'nonInteraction': true
// 	            // });
// 	        }
// 	    }

// // Hide the home page popup on click
// $j('#closepopup').click(function(){
// 	$j('.overlay').fadeOut();
// 	$j('.popup').fadeOut();
// 	});

// $j('.popup-link').click(function(){
// 	$j('.overlay').fadeOut();
// 	$j('.popup').fadeOut();
// 	});



// Creates li elements in menu; use only with ul
function CreatePageMenu(where){
	// Search and build array
	$j('#content').find('a').each(function(i) {
		// Find anchor id's
		var objid = String($j(this).attr('id'));
		if(objid!='undefined'){
			// Find title attr, if present
			var lbl, cls = '', title = String($j(this).attr('title'));
			
			if( $j(this).hasClass('faq')){ cls = 'faq'; }
			
			if (title!='undefined'){
				lbl = title;
			} else {
				// Find parent text, if present
				var parenttxt = String($j(this).parent().text());
				if(parenttxt!='undefined'){
					lbl = parenttxt;
				} else {
					lbl = 'Undefined'
				}
			}
			
			var navlbl = [objid,cls,lbl]
			
			// Find icon, if present
			var icn = String($j(this).attr('data-icon-src'));
			if(icn!='undefined'){ navlbl.push(icn)};
			
			pgnav.push( navlbl );
		};
	});
	
	if(pgnav.length>0){
		
		$j(pgnav).each(function(i){
		
			var li = '<li><a href="#' + pgnav[i][0] + '" class="' + pgnav[i][1] + '">';
			
			if(pgnav[i][3]!=undefined){ li+='<img src="' + pgnav[i][3] + '" class="navicon img-circle" width="54" height="54">' };
			
			li += pgnav[i][2] + '</a></li>';
		
			$j(where).append(li);
		});
		
	} else {
		$j(where).append('<li>Page anchors not detected.</li>');
	}	
}

// Who We Are, Put CEO first
function ArrangeThumbs(){
	var thumb;
	$j('#content').find('.staff_thumbnail').each(function(){
		var patt1 = new RegExp("Scott Thompson"),
			patt2 = new RegExp("CEO"),
			patt3 = new RegExp("Chief Executive Officer");
	
		if(patt1.test( $j(this).find('.name').html() ) || patt2.test( $j(this).find('.title').html() ) || patt3.test( $j(this).find('.title').html() )){
			thumb = $j(this).parent();
		}
	});
	
	$j('.thmbcol:first').before( thumb );
}

// Who We Are, Center Colums that have less than 4 thumbs
function ArrangeCols(){
	var thumb;
	$j('#content .row').each(function(){
		var thmnum = $j(this).find('.thmbcol').length;
		if(thmnum == 3){ $j(this).find('.thmbcol:first').before('<div class="visible-lg-inline-block athirdspace thmbcol"></div>') };
	});
}

var cppplay=false;
function ScrollReveal(){
	if( Exsists($j('#careplanprocess')) ){
		var cpp = $j('#careplanprocess').offset();
		if ($j(window).scrollTop() > cpp.top*.85){
			if(!cppplay){
				$j('#careplanprocess .img-circle').each(function(i){
					$j(this).delay(250*i).fadeTo(250,.1,function(){ 
						if(i==3)
						$j('#careplanprocess .img-circle').each(function(i){
							$j(this).delay(250*i).fadeTo(250,1);
						});
					 });
				 });
				cppplay = true;
			}
  		}
	}
	
	if( Exsists($j('#ourhistorytimeline')) ){
		var oht = $j('#ourhistorytimeline').offset();
		if ($j(window).scrollTop() > oht.top*.5){
			$j('.timeline-circ').find('.timeline-vr-bottom, .timeline-vr-top').each(function(i){
				$j(this).delay(250*i).fadeIn(700,function(){ 
						
					$j('.timeline-circ .timeline-vr-top:even').css({ 'margin-top':'-144px','height':'144px' });
					$j('.timeline-circ .timeline-vr-bottom:even').css({ 'margin-top':'104px','height':'130px' });
					$j('#circ2012 .timeline-vr-top').height(100).css('margin-top',-100+'px');
					$j('#circ2012 .timeline-desc, #circ2014 .timeline-desc').css('margin-left', -200+'px');
					$j('#circ2013 .timeline-vr-bottom').height(150)
					$j('.timeline-circ .timeline-vr-bottom .timeline-enddot').each(function(){ $j(this).css('margin-top',$j(this).parent().height()+'px') });
					$j('.timeline-circ .timeline-vr-bottom .timeline-desc').each(function(){ $j(this).css('margin-top',$j(this).parent().outerHeight()-$j(this).outerHeight()+'px'); });
	
				});
			});	
		}
	}
}

var prevscroll = 0;
function ScrollDirection(pos){
		var dir = 'null';
		if (pos > prevscroll){ dir = 'dwn'; }  else { dir = 'up'; }
		prevscroll = pos;
		 
		return dir;
}

function Resize() {
	w = document.body.offsetWidth;
	h = window.innerHeight;
	
	$j('div.container-sp').width(w);
	
	var prime;	
	if( Exsists('#primary') ){ prime = $j('#primary'); }
	if( Exsists('#primary_joinourteam') ){ prime = $j('#primary_joinourteam'); }
	if( Exsists('#primary_home') ){ prime = $j('#primary_home'); }
	if( prime!=undefined){ 
		var mainoffset = $j(prime).offset(), mainfromleft = Math.floor(mainoffset.left*-1); 
		$j('div.container-sp').width(w).css('left', mainfromleft+'px');
	}
	
	if( Exsists('#rtmenu') ){ if( $j('#rtmenu').height()> Math.floor(h*.6)){ $j('#rtmenu').css({'max-height':Math.floor(h*.6)+'px','overflow':'auto' }); } }
	
	
}

function LoadDOMElem(where, kind, content) {
	var domelem = document.createElement(kind);
	if (domelem.styleSheet) {
		domelem.styleSheet.cssText = content;
	} else {
		domelem.innerHTML = content;
	}
	document.getElementsByTagName(where)[0].appendChild(domelem);
	return domelem;
}

function GetRandom(limit) {
	return Math.floor((Math.random() * limit))
};

function Exsists(what){
	if( $j(what).length>0 ){ return true; }
	return false;
}

function IsDefined(what){
	if(what==undefined || what=='undefined'){ return false; }
	
	return true;
}

function GoToAnchor(anchor){
	var hash_offset = $j('#'+anchor).offset();
	var hash_top = Math.floor(hash_offset.top);
	
	$j( 'div' ).each(function( i ) {
		var patt = new RegExp(anchor);
		var res = patt.test( $j( this ).attr('id') );
		var offset =  $j( this ).offset();
		var hdr_ht = $j( 'header#header' ).height() + 30;
		if( res ){ window.scrollTo(0,Math.floor(offset.top-150)); }
	});
	
}


/* Unused */
function CreateSubMenu(){
	
	// Find achor tag menus labels on page
	if( $j('#rtmenu').length>0 ){ CreatePageMenu('#rtmenu'); }
	
	// Add from Bootstrap JS
	$j('#content').scrollspy({ target: '#rtmenu' })
	$j('[data-spy="scroll"]').each(function () { var $spy = $j(this).scrollspy('refresh') });
	$j('#content').on('activate.bs.scrollspy', function () {  });
}

var startingpos=new Array();
function Paralaxx(what){
	
	function GetBgImgPosition(obj){
		var pos = $j(obj).css('backgroundPosition');
		if (pos == 'undefined' || pos == null) {
			pos = [obj.css("background-position-x"),obj.css("background-position-y")];
		} else {
			pos = pos.split(" ");
		}
		return {
			x: parseFloat(pos[0]),
			xUnit: pos[0].replace(/[0-9-.]/g, ""),
			y: parseFloat(pos[1]),
			yUnit: pos[1].replace(/[0-9-.]/g, "")
		}
	};
	
	function GetBgImgHeight(obj){
	
		var bgimg = new Image(),ogw,ogh;
			bgimg.src = $j(obj).css('background-image').replace(/url\(['"]*(.*?)['"]*\)/g, '$1');
			bgimg.onload = function(){
				ogw = this.width;
				ogh = this.height;
			};
		
		var bgsize = $j(obj).css('background-size').split(' '),w,h;
		
		if($j(bgsize[1]).length=0){ bgsize[1] = ogh; }
		
		
		if (/px/.test(bgsize[0])) w = parseInt(bgsize[0]);
		// checking if width was set to percent value
		if (/%/.test(bgsize[0])) w = $j(obj).parent().w() * (parseInt(bgsize[0]) / 100);
		// checking if height was set to pixel value
		if (/px/.test(bgsize[1])) h = parseInt(bgsize[1]);
		// checking if height was set to percent value
		if (/%/.test(bgsize[1])) h = $j(obj).parent().h() * (parseInt(bgsize[0]) / 100);
		
		bgsize[0] = w, bgsize[1] = h;
		
		return bgsize;
	}
			
	$j(what).each(function(i){
	
		if(startingpos[i]=='undefined' || startingpos[i]==undefined){ startingpos.push(GetBgImgPosition($j(this)).y) }
		
		var offs = $j(this).offset(), bgimgdif = offs.top+startingpos[i], windif= Math.floor($j(window).scrollTop()-bgimgdif), toplyrscr = Math.floor(0-(windif*.2))+'px';
				
		$j(this).css('backgroundPosition', 'center '+toplyrscr);
		
	});
}
