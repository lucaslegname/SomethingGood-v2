function addLike(){
	var url_ctrl = $(this).data("url");
	$.ajax({
           url: url_ctrl,
           type:'POST',
           async: false, 
           dataType: 'json',
           timeout: 5000,
           success: function(output_string){ $.sg.result = output_string; }
    }); // End of ajax call 
    
    if($.sg.result=='success'){
    		var nbLikes = $(this).parent().parent().find(".nb-likes");
    		nbLikes.html(parseInt(nbLikes.html())+1);
    		$(this).parent().attr('data-liked', 1);
    		$(this).parent().fadeOut(100);
    }
}

function getCaptcha(){
	var url_ctrl = $("#captcha-contact").data("url");
	$.ajax({
           url: url_ctrl,
           type:'POST',
           async: true, 
           dataType: 'json',
           timeout: 5000,
           success: function(output_string){
           		$("#captcha-contact").html(output_string);
           		$("#captcha-comment").html(output_string);
           }
    }); // End of ajax call 
}

function sendMessage(){
	$(".captchaError").hide();
	
	if(!validateFields())
		return;

	var url_ctrl = $(this).data("url");
	$("#loading-icon").show();
	
	var params = { 
		"sender-mail"		: $('#sender-mail').val(), 
		"sender-name"		: $('#sender-name').val(), 
		"message"			: $('#sender-message').val(), 
		"sender-captcha" 	: $('#sender-captcha').val() 
	}
	
	$.ajax({
	       url: url_ctrl,
	       type:'POST',
	       //async: false, 
	       data: params,
	       dataType: 'json',
	       timeout: 10000,
	       success: function(output_string){ 	       		
	       		if(output_string=='success'){
	       			$("#loading-msg").animate({
	       			    opacity: 1,
	       			    width: '115px'
	       			}, 600);
	       			$("#loading-icon").fadeOut(600);
	       			setTimeout("$.fancybox.close()", 1400);
	       		}
	       		if(output_string=='wrong_captcha'){
	       			$(".captchaError").show();
	       			$("#loading-icon").hide();
	       			$("#sender-captcha").val('');
	       			$("#sender-captcha").focus();
	       			
	       		}
	       }
	}); // End of ajax call 

}

function sendComment(){
	
	if(!validateCommentFields())
		return;
	
	var url_ctrl = $(this).data("url");
	
	$.sg = { 
	    senderMail 		: $('#sender-mail-com').val(), 
	    senderName 		: $('#sender-name-com').val(),
	    message 		: $('#sender-message-com').val(),
	    senderCaptcha 	: $('#sender-captcha-com').val()
	     
	}; 
	
	var params = { 
		"sender-mail"		: $.sg.senderMail, 
		"sender-name"		: $.sg.senderName, 
		"message"			: $.sg.message, 
		"sender-captcha" 	: $.sg.senderCaptcha 
	}
	
	
	$.ajax({
	       url: url_ctrl,
	       type:'POST',
	       //async: false, 
	       data: params,
	       dataType: 'json',
	       timeout: 10000,
	       success: function(output_string){ 	       		
	       		if(output_string=='wrong_captcha'){
	       			$('#sender-captcha-com').css('border-color','red');
	       			$('#sender-captcha-com').focus();
	       		}
	       		else{
	       			resetCommentFields();
	       			
	       			var blueprint = $('#comment-blueprint');
	       			var name = $('#idNextComment').val()+'. <a href="mailto:'+$.sg.senderMail+'">'+$.sg.senderName+'</a>';
	       			blueprint.find('.comment-title').html(name);
	       			var cdate = blueprint.find('.comment-date').html();
	       			blueprint.find('.comment-date').append('Il y a 1 seconde…');
	       			var url = blueprint.find('.comment-date').find('.com-delete-btn').data('url') + '/'+output_string;
	       			blueprint.find('.comment-date').find('.com-delete-btn').attr('data-url',url);
	       			blueprint.find('.comment-content').html($.sg.message);
	       			
	       			var nextId = parseInt($('#idNextComment').val())+1;
	       			$('#idNextComment').val(nextId);
	       			$('.view-comments-zone').append(blueprint.html());
	       			
	       			blueprint.find('.comment-date').html(cdate);
	       			
	       			$('.com-delete-btn').unbind();
	       			$('.com-delete-btn').click(deleteComment);
	       		}
	       }
	}); // End of ajax call 

}

function deleteComment(){	
	var url_ctrl = $(this).data("url");
	
	$.ajax({
	       url: url_ctrl,
	       type:'POST',
	       dataType: 'json',
	       timeout: 5000,
	       success: function(output_string){ 	       		
	       		if(output_string=='success'){

	       		}
	       }
	}); // End of ajax call 
	
	$(this).parent().parent().parent().animate({
	  opacity: 0,
	  height: '0px',
	  'marginTop': '0px'
	});
}

function resetFields(){
	$("#loading-msg").css('width','0px');
	$(".captchaError").hide();
	$('#sender-mail').val('');
	$('#sender-name').val('');
	$('#sender-message').val('');
	$('#sender-captcha').val('');
}

function resetCommentFields(){
	$('#sender-name-com').val('');
	$('#sender-mail-com').val('');
	$('#sender-captcha-com').val('');
	$('#sender-message-com').val('');
	
	$('#sender-captcha-com').css('border-color','#E0E0E0');
}

function validateFields(){
	if($('#sender-name').val()==''){
		$('#sender-name').focus();
		return false;
	}
	if(verifyEmail($('#sender-mail').val())==false){
		$('#sender-mail').attr('placeholder','Adresse non valide!');
		$('#sender-mail').val('');
		$('#sender-mail').focus();
		return false;
	}
	if($('#sender-message').val()==''){
		$('#sender-message').focus();
		return false;
	}

	return true;
}

function validateCommentFields(){
	if($('#sender-name-com').val()==''){
		$('#sender-name-com').focus();
		return false;
	}
	if(verifyEmail($('#sender-mail-com').val())==false){
		$('#sender-mail-com').attr('placeholder','Adresse non valide!');
		$('#sender-mail-com').val('');
		$('#sender-mail-com').focus();
		return false;
	}
	if($('#sender-message-com').val()==''){
		$('#sender-message-com').focus();
		return false;
	}

	return true;
}

function verifyEmail(val){
	var status = false;     
	var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
     if (val.search(emailRegEx) == -1) {
          return false;
     }
     return true;
}

function appendComment(){

}

function showInstagramPicture(){
	$.ajax({
	       url: 'http://www.somethinggood.fr/index.php/instagram/get_last_picture',
	       type:'POST',
	       async: true, 
	       dataType: 'json',
	       timeout: 5000,
	       success: function(output_string){ 
	       		$("#instagram-feed").html(output_string);
	       		$(".insta-pic-border").fadeIn(3000); 
	       }
	}); // End of ajax call 
}
