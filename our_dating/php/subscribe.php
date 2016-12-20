<?php

$name = $email = $number = $message = "";

if (isset($_POST['name-subscribe']))
	$name = fix_string($_POST['name-subscribe']);
if (isset($_POST['email-subscribe']))
	$email = fix_string($_POST['email-subscribe']);
if (isset($_POST['number-subscribe']))
	$number = fix_string($_POST['number-subscribe']);
if (isset($_POST['message-subscribe']))
	$message = fix_string($_POST['message-subscribe']);


$fail  = validate_name($name);
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
	else if (strlen($field) < 7)
		return "Номер должен быть длиннее <br />";
	else if (preg_match("/[^Z0-9+-]/", $field))
		return "Подходят только числа и знаки '+' и '-'<br />";
	return "";		
}


function fix_string($string) {
	if (get_magic_quotes_gpc()) $string = stripslashes($string);
	return htmlentities ($string);
}



$title = 'Новое письмо!';

$mess =<<<END
	Имя: $name,
	E-mail: $email,
	Номер телефона: $number,
	Сообщение: $message
END;

$to = 'vstrechatut.com@gmail.com';       
$from='speeddating@mail.by'; 
       
if ($can_send) {
	mail($to, $title, $mess, 'From:'.$from);
	echo "Спасибо за подписку!"; 
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
		<a href="http://www.vstrecha-tut.com/#buttons">  Вернуться на сайт </a>

	</body>
</html>



<!-- $name = substr(htmlspecialchars(trim($_POST['name-subscribe'])), 0, 10000);  
$number = substr(htmlspecialchars(trim($_POST['number-subscribe'])), 0, 10000);    
$email = substr(htmlspecialchars(trim($_POST['email-subscribe'])), 0, 10000);   
$text = substr(htmlspecialchars(trim($_POST['message-subscribe'])), 0, 10000); -->