
var main = function() {



    var message = function() {

// тут функцию сохранил чтобы тоже самое делалось по keypress ниже

	    var post = $('.status-box').val();

	    $('<li>').text(post).prependTo('.posts');
	    $('.status-box').val('');  
	    $('.counter').text(140);
	    $('.btn1').addClass('disabled');



	    
        
    };

    $('.btn1').click(message);
   

    
    $(document).on('click', 'li', function() { // тут вопрос почему через click не работает

        // и даже если это оставлять, для чего нужно выделять весь документ а не просто li?

            $(this).fadeOut(300);
            var lll = $(this).text();

// тут еще хотел чтобы при удалении писалось где нибудь что удалено,
// но там тоже глючно пашет, но это в последнюю очень смотри)
            $('.here').text(lll + 'has done!').fadeOut(1000);
            $('p').show();

        });
    


    $('.btn2').click(function() {
        $('li').fadeOut(300);

    });


    $(document).keypress(function(event) {
    	if (event.which === 13) {
            if ($('.status-box').val() != '') {

// ну тут вообще намудрил, хочу чтобы при пустом сообщении ничего не отправлялось
// но там форма энтер за текст считает, как это исправить не разобрался

     		     message()

            };
     	};

    });


    

    
    $('.status-box').keyup(function() {
        var postLength = $(this).val().length;
        var charactersLeft = 140 - postLength;
        $('.counter').text(charactersLeft);
        
        
        if (charactersLeft < 0) {
            $('.btn').addClass('disabled');
        }
        
        else if ( charactersLeft == 140) {
            $('.btn').addClass('disabled');
        }
        
        else {
            $('.btn').removeClass('disabled');
        }
            
        
        
        });
        
    $('.btn1').addClass('disabled'); // тут с классами потом объединю
    $('.btn2').addClass('disabled');

    
        
    
};


$(document).ready(main);


draggable() 

selectable() 