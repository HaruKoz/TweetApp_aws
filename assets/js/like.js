$(function(){
	$(document).on('click','.heart-like', function(){
 		var tweet_id  = $(this).data('tweet');
		var counter   = $(this).find('.likes-count');
		var button    = $(this);

        $.ajax({
            type: "POST",
            url: "handle/handleLike.php",
            data: {like:true, post_id:tweet_id},
            cache: false,
            success: function(data){
                counter.text(data);
                button.removeClass('heart-like');
                button.addClass('heart-unlike');                                
            }
        })
	});

	$(document).on('click','.heart-unlike', function(){
        var tweet_id  = $(this).data('tweet');
		var counter   = $(this).find('.likes-count');
		var button    = $(this);

        $.ajax({
            type: "POST",
            url: "handle/handleLike.php",
            data: {unlike:true, post_id:tweet_id},
            cache: false,
            success: function(data){
                if (data == 0)
                    counter.text('');
                else  counter.text(data);
                    button.addClass('heart-like');
                    button.removeClass('heart-unlike');
            }
          })     
	});
});