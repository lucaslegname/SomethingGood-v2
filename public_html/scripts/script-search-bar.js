$(function(){

    var input = $('input#s');
    var divInput = $('div.input');
    var width = divInput.width();
    var outerWidth = divInput.parent().width() - (divInput.outerWidth() - width) - 28;
    var submit = $('#searchSubmit');
    var txt = input.val();
    
    input.bind('focus', function() {
        if(input.val() === txt) {
            input.val('');
        }
        $(this).animate({color: '#000'}, 300); // text color
        $(this).parent().animate({
            backgroundColor: '#fff' // background color
        }, 300).addClass('focus');
    }).bind('blur', function() {
        $(this).animate({color: '#b4bdc4'}, 300); // text color
        $(this).parent().animate({
            backgroundColor: '#F5F5F5' // background color
        }, 300, function() {
            if(input.val() === '') {
                input.val(txt)
            }
        }).removeClass('focus');
    });
});