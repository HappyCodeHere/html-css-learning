<?php

$name = $age = $email = $number = $promo = "";

if (isset($_POST['name']))
	$name = fix_string($_POST['name']);
if (isset($_POST['age']))
	$age = fix_string($_POST['age']);
if (isset($_POST['email']))
	$email = fix_string($_POST['email']);
if (isset($_POST['number']))
	$number = fix_string($_POST['number']);
if (isset($_POST['promo']))
	$promo = fix_string($_POST['promo']);


$fail  = validate_name($name);
$fail .= validate_age($age);
$fail .= validate_email($email);
$fail .= validate_number($number);

if ($fail == "") {
	
	$can_send = True;
}
else {
	echo $fail;
	$can_send = False;
}



function validate_name($field) {
	if ($field == "") return "Пожалуйста, введите имя <br />";
	return "";
}

function validate_age($field) {
	if (strlen($field) > 3)
		return "Введите ваш реальный возраст <br />";
	else if (preg_match("/[^Z0-9]/", $field))
		return "Подходят только числа <br />";
	return "";		
}

function validate_email($field) {
	if ($field == "") return "Пожалуйста, введите e-mail <br />";
		else if (!((strpos($field, ".") > 0) &&
			       (strpos($field, "@") > 0)) ||
					preg_match("/[^a-zA-Z0-9.@_-]/", $field))
		return "E-mail не подходит <br />";
	return "";
}

function validate_number($field) {
	if ($field == "") return "Пожалуйста, введите номер телефона <br />";
	else if (strlen($field) < 6)
		return "Номер должен быть длиннее <br />";
	else if (preg_match("/[^Z0-9+-]/", $field))
		return "Подходят только числа и знаки '+' и '-'<br />";
	return "";		
}


function fix_string($string) {
	if (get_magic_quotes_gpc()) $string = stripslashes($string);
	return htmlentities ($string);
}

$crub = $_POST['ik_am'];
/*echo $crub;*/

$title = 'Новое письмо!';

$mess =<<<END
	Имя: $name,
	Возраст: $age,
	E-mail: $email,
	Номер телефона: $number,
	Промокод: $promo,
	RUB: $crub
END;

$to = 'happylolonly@gmail.com' . ', ';
$to .= 'vstrechatut.com@gmail.com';

$from='speeddating@mail.by';
       
if ($can_send) {
	mail($to, $title, $mess, 'From:'.$from);
	echo "Спасибо! <br />"; 
}


?>

<html>
	<head>
		<style>
			a {
				color: purple;
			}
		</style>
	</head>
	<body>
		<a href="http://www.vstrecha-tut.com/#one">  Вернуться на сайт </a>

		<form action="https://sci.interkassa.com/" method="post" enctype="utf-8" id="payment" name="payment">

			<input type="hidden" name="ik_co_id" value="574371d53b1eafb1198b4569" />
			<input type="hidden" name="ik_pm_no" value="ID_4233" />
			<input type="hidden" name="ik_am" value="<?=$_POST['ik_am']?>" />
			<input type="hidden" name="ik_cur" value="RUB" />
			<input type="hidden" name="ik_desc" value="Event Description" />


			<!-- <input type="text" name="name">
			<input type="text" name="age">
			<input type="email" name="email">
			<input type="text" name="number">
			<input type="text" name="promo"> -->

		</form>

		<script type="text/javascript">
			if (<?=$can_send?>) {
				document.write('Через 5 секунд вы будете перенапревлены на сайт оплаты');
				setTimeout(function() {
					/*document.write('Через 10 секунд вы будете перенапревлены на сайт опалы'); */
					document.forms["payment"].submit();
				}, 5000);
				
			}
		</script>

	</body>
</html>



<!-- $name = substr(htmlspecialchars(trim($_POST['name-subscribe'])), 0, 10000);  
$number = substr(htmlspecialchars(trim($_POST['number-subscribe'])), 0, 10000);    
$email = substr(htmlspecialchars(trim($_POST['email-subscribe'])), 0, 10000);   
$text = substr(htmlspecialchars(trim($_POST['message-subscribe'])), 0, 10000); -->