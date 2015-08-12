$('#submitall').click(function(){
    $('form').each(function() {
        var that = $(this);
        $.post(that.attr('action'), that.serialize());
    });
})
