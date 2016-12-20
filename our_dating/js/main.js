var main = function () {
	$('.info-part').hide();
	/*$('#three button').on('click', function () {
		$('.info-part').fadeToggle("fast", "linear");

	});*/

	
	$('#buy-form-button1, #buy-form-button2, #buy-form-button3, #buy-form-button4, #buy-form-button5, #buy-form-button6 ').attr('disabled', 'disabled');
/*
	$('#checkbox-button').on('click', function () {


		if (this).is(':checked') {
			$('#buy-form-button').removeAttr('disabled', 'disabled');
		}
		else {
			$('#buy-form-button').attr('disabled', 'disabled');
		};
	});*/
/*
	$('#checkbox-button').change( function () {
		$('#buy-form-button').disabled = !this.checked;


	});*/

/*$('.info-part').hide();
		$('.part-one').toggle();*/
		/*var lll = $(this).parent().parent().parent();
		console.log(lll);
		var ooo = lll.parent();
		console.log(ooo);
		var ppp = ooo[0]indexOf[lll[0]];
		console.log(ppp);*/

	/*$('.action-one').on('click', function() {	
		$('.part-one').toggle();
	});


	$('.action-two').on('click', function() {
		$('.part-two').toggle();
	});


	$('.action-three').on('click', function() {	
		$('.part-three').toggle();
	});


	$('.action-four').on('click', function() {
		$('.part-four').toggle();
	});


	$('.action-five').on('click', function() {	
		$('.part-five').toggle();
	});


	$('.action-six').on('click', function() {
		$('.part-six').toggle();
	});*/

	$('.photos-here').hide();


	$('.in-cafe-image').on('click', function() {
		$('[data-src]').each(changeDataSrcToSrc);
		$('.on-yacht-photoes').hide();
		$('.at-sea-photoes').hide();
		$('.in-cafe-photoes').toggle();
	});

	$('.on-yacht-image').on('click', function() {
		$('[data-src]').each(changeDataSrcToSrc);
		$('.at-sea-photoes').hide();
		$('.in-cafe-photoes').hide();
		$('.on-yacht-photoes').toggle();
	});

	$('.at-sea-image').on('click', function() {
		$('[data-src]').each(changeDataSrcToSrc);
		$('.on-yacht-photoes').hide();
		$('.in-cafe-photoes').hide();
		$('.at-sea-photoes').toggle();
	});
	

	/*$('.news').hide();*/
	$('.my-button').on('click', function() {
		var className = $(this).attr('class');
		var number = className.substring(16);
		var myClass = '.news-' + number;

		if ( $(myClass).hasClass('active')  ) {
			$('.active').fadeOut('fast');
			$('.active').removeClass('active');
		}
		else {
			$('.active').fadeOut('fast');
			$('.active').removeClass('active');
			$(myClass).addClass('active');
			$('.active').fadeIn('fast');
		}

		/*if( $(myClass).css('display') == 'display-block' )  { 
   			$('.news').fadeOut('fast');
   			$(myClass).css('display') == 'none';
		} 
		else { 
			$('.news').hide();
			$(myClass).fadeIn('fast');
		
		}*/
	});

	$('.info-button').on('click', function() {
		var className = $(this).attr('class');
		var number = className.substring(19);
		var myClass = '.part-' + number;

		if ( $(myClass).hasClass('active')  ) {
			$('.active').fadeOut('fast');
			$('.active').removeClass('active');
		}
		else {
			$('.active').fadeOut('fast');
			$('.active').removeClass('active');
			$(myClass).addClass('active');
			$('.active').fadeIn('fast');
		}
	});

/*	$('.my-select').on('click', function() {

		var className = $(this).attr('class');
		var number = className.substring(16)
		
		var value = $('.my-select').val();
		var my_value = value.substring(7);
		console.log(my_value);

		switch (my_value) {
	    	case 'one':
	        	$("input[name='ik_am']").val('900');
	        	break;
	    	case 'two':
		        $("input[name='ik_am']").val('4000');
		        break;
		    case 'three':
		        $("input[name='ik_am']").val('500');
		        break;
		    case 'four':
		        $("input[name='ik_am']").val('1200');
		        break;
		    case 'five':
		        $("input[name='ik_am']").val('1200');
		        break;
		    case 'six':
		        $("input[name='ik_am']").val('1900');
		        break;
		};

	});*/



	function changeDataSrcToSrc(i, e) {
    	e.src = $(e).data('src');
    }




	$(".fancybox").fancybox({
		openEffect	: 'elastic',
		closeEffect	: 'elastic'
	});
};





$(document).ready(main);



/*document.getElementById('buy-form-button').disabled = !this.checked;

document.getElementById('buy-form-button').enabled = this.checked;*/


/*<script type="text/javascript">
function validate(form)
{
	fail  = validateForename(form.forename.value)
	fail += validateSurname(form.surname.value)
	fail += validateUsername(form.username.value)
	fail += validatePassword(form.password.value)
	fail += validateAge(form.age.value)
	fail += validateEmail(form.email.value)
	if (fail == "") return true
	else { alert(fail); return false }
}
</script></head><body>



<script type="text/javascript">
function validateForename(field) {
	if (field == "") return "No Forename was entered.\\n"
	return ""
}

function validateSurname(field) {
	if (field == "") return "No Surname was entered.\\n"
	return ""
}

function validateUsername(field) {
	if (field == "") return "No Username was entered.\\n"
	else if (field.length < 5)
		return "Usernames must be at least 5 characters.\\n"
	else if (/[^a-zA-Z0-9_-]/.test(field))
		return "Only letters, numbers, - and _ in usernames.\\n"
	return ""
}

function validatePassword(field) {
	if (field == "") return "No Password was entered.\\n"
	else if (field.length < 6)
		return "Passwords must be at least 6 characters.\\n"
	else if (! /[a-z]/.test(field) ||
			 ! /[A-Z]/.test(field) ||
		     ! /[0-9]/.test(field))
		return "Passwords require one each of a-z, A-Z and 0-9.\\n"
	return ""
}

function validateAge(field) {
	if (isNaN(field)) return "No Age was entered.\\n"
	else if (field < 18 || field > 110)
		return "Age must be between 18 and 110.\\n"
	return ""
}

function validateEmail(field) {
	if (field == "") return "No Email was entered.\\n"
		else if (!((field.indexOf(".") > 0) &&
			       (field.indexOf("@") > 0)) ||
			       /[^a-zA-Z0-9.@_-]/.test(field))
		return "The Email address is invalid.\\n"
	return ""
}
</script></body></html>*/