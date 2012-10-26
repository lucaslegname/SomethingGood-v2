$(document).ready(function() {
	$.sg = { 
	    searchForm : "up",
	    mouseX : "",
	    mouseY : "",
	    result : ""
	}; 
	
	if( !isMobile.any() ){
		$(document).mousemove(function(e){
		      $.sg.mouseX = e.pageX;
		      $.sg.mouseY = e.pageY;
		      
		      var ending_right = e.pageX - ($("#link-tag").width()+25);
		      
		      $("#link-tag").offset({left:ending_right,top:e.pageY-10});
		}); 
	}
	
	// Fonction faisant apparaitre le texte 'rechercher'
 	$("#search-button").hover(searchTextAppear,searchTextDisappear);
 	$("#search-button").click(scrollDownSearchForm);
 	
 	// Fonction faisant apparaitre le texte 'Plus de tweets'
 	$("#link-twitter").hover(twitterTextAppear,twitterTextDisappear);
 	
 	// Fonction pour scroller jusqu'en haut
 	$("#arrow-up").click(scrollToTop);  
 	$("#footer-arrow-up").click(scrollToTop); 

 	$(".tagLink").hover(displayLinkTag,hideLinkTag);
 	
 	//$(".fancybox").fancybox();
 	
 	$(".fancybox").fancybox({
 	    	helpers : {
 	    		title : {
 	    			type : 'inside'
 	    		}
 	    	}
 	    });
 	
 	$("a.confirm").click(function(event) {
 	    event.preventDefault();
 	    var url = $(this).attr('href');
 	    if (confirm('Are you sure?'))
 	       window.location = url;
 	});
 	
 	// Les liens inclus dans les tweets s'ouvrent dans une nouvelle fenêtre
 	$("#twitter_update_list a").attr('target','_blank');
 	
 	$("#footer-contact a, .contact_form").fancybox({
 		'scrolling'		: 'no',
 		'beforeShow'	: getCaptcha,
 		'afterClose'	: resetFields,
 		'wrapCSS' 		: 'rounded-corner-box',
 		'titleShow'		: false
 	});
 	
 	$('.fancybox-media').fancybox({
 			openEffect  : 'none',
 			closeEffect : 'none',
 			helpers : {
 				media : {}
 			}
 		});
 	 
 	 $(".article,.main-article,.view-article").hover(showLikeLink,hideLikeLink);
 	 $(".like-link a").click(addLike);
 	 
 	 $("#searchForm").submit(onSearchSubmit);
 	 
 	 $("#btn-send-message").click(sendMessage);
 	 
 	 showInstagramPicture();
 	 
 	 var keys     = [];
 	 var konami  = '38,38,40,40,37,39,37,39,66,65';
 	  
     $(document)
            .keydown(
                function(e) {
                    keys.push( e.keyCode );
                    if ( keys.toString().indexOf( konami ) >= 0 ){
                        // do something when the konami code is executed
                        $("#sg-video-link").click();
     
                        // empty the array containing the key sequence entered by the user
                        keys = [];
                    }
                }
            );
            
	$('#raptorize-btn').raptorize();
	
	$('#link-english').click(switchEnglish);
	$('#link-french').click(switchFrench);
 	
 	if ($("#captcha-comment").length > 0) {  
 	   getCaptcha();
 	}
 	
 	$('#btn-send-comment').click(sendComment);
 	
 	$('.com-delete-btn').click(deleteComment);
 	
 	var midContainer = $('#middle-container');
 	var browser = $(window);
 	if(midContainer.height()<browser.height())
 		midContainer.css('height',browser.height());
 	
 	if( isMobile.any() ){
	 	$('body').removeClass('no-touch');
	 	$('#footer').css('width','103%');
 	}
 	
 	$(window).bind("load", function() {
 	  	$("#twitter-widget-0").contents().find(".timeline-footer,.timeline-header").css("display","none");
 		$("#twitter-widget-0").attr('height','277px');
 	});
 	
});



var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i) ? true : false;
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i) ? true : false;
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i) ? true : false;
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i) ? true : false;
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Windows());
    }
};

//-------------------------------

function searchTextAppear(){
	$("#search-text").stop(true,true).animate({
	    marginTop: "30px"
	  }, 200 );
}

function searchTextDisappear(){
	$("#search-text").delay(500).animate({
	    marginTop: "0px"
	  }, 200 );
}

function twitterTextAppear(){
	$("#text-twitter").stop(true,true).fadeIn(200);
}

function twitterTextDisappear(){
	$("#text-twitter").fadeOut(200);
}

function scrollToTop(){
	$("html,body").animate({scrollTop : 0},400);
}

function scrollDownSearchForm(){
	if($.sg.searchForm == "up"){
		// scroll up
		$("html,body").animate({scrollTop : 0},400);
		
		// search form comes down
		$("#search-form").animate({
		    marginTop: "0px"
		  }, 200 );
		
		// focus on search textfield (delayed to let the animation going)
		setTimeout(function() { $("#s").focus(); $("#s").select(); }, 400);
		
		// variable used to know the form state
		$.sg.searchForm = "down";
	}
	else {
		// search form comes up
		$("#search-form").stop(true,true).animate({
		    marginTop: "-40px"
		  }, 200 );
		
		// variable used to know the form state
		$.sg.searchForm = "up";
	}
}

function displayLinkTag(){
	$("#link-tag").html($(this).attr("name"));
	$("#link-tag").fadeIn(150);
}

function hideLinkTag(){
	$("#link-tag").fadeOut(50);
}

function moveUp(){
	//$("#logo-background").css('margin-top','5px');
	$("#logo-background").animate({ marginTop: '3px' }, 100);
}

function moveDown(){
	//$("#logo-background").css('margin-top','0px');
	$("#logo-background").animate({ marginTop: '0px' }, 100);
}

function showLikeLink(){
	if($(this).find(".like-link").data('liked')!=1) {
		$(this).find(".like-link").fadeIn(150);
	}
}

function hideLikeLink(){
	$(this).find(".like-link").fadeOut(100);
}

function onSearchSubmit(e){
	e.preventDefault();
	var keywords = $("#s").val();
	
	if(keywords!=''){
		keywords = keywords.replace(/["'!&@#({)}$*,;:+]/g, "")
		keywords = encodeURIComponent(keywords);
		
		if(keywords=='')
			keywords = 'recherche non-valide';
		
		if(keywords=='raptor'){
			$('#raptorize-btn').click();
			return;
		}
		
		window.location.href = $(this).data('url')+'/'+keywords;
	}
}

function switchEnglish(){
	$('#french-version').fadeOut(90);
	$('#english-version').delay(110).fadeIn(150);
	
	$('#link-english').css('color','#262626');
	$('#link-french').css('color','#4BB3B3');
}

function switchFrench(){
	$('#english-version').fadeOut(90);
	$('#french-version').delay(110).fadeIn(150);
	
	$('#link-english').css('color','#4BB3B3');
	$('#link-french').css('color','#262626');
	
}

