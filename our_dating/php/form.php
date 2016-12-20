<?php

$name = $email = $number = $message = "";

if (isset($_POST['name']))
	$name = fix_string($_POST['name']);
if (isset($_POST['email']))
	$email = fix_string($_POST['email']);
if (isset($_POST['number']))
	$number = fix_string($_POST['number']);
if (isset($_POST['message']))
	$message = fix_string($_POST['message']);

$fail  = validate_forename($forename);
$fail .= validate_surname($surname);
$fail .= validate_username($username);
$fail .= validate_password($password);

echo "<html><head><title>An Example Form</title>";

if ($fail == "") {
	echo "</head><body>Form data successfully validated: $forename,
		$surname, $username, $password, $age, $email.</body></html>";

	// This is where you would enter the posted fields into a database

	exit;
}

function validate_name($field) {
	if ($field == "") return "No Name was entered<br />";
	return "";
}

function validate_email($field) {
	if ($field == "") return "No Email was entered<br />";
		else if (!((strpos($field, ".") > 0) &&
			       (strpos($field, "@") > 0)) ||
					preg_match("/[^a-zA-Z0-9.@_-]/", $field))
		return "The Email address is invalid<br />";
	return "";
}

function validate_number($field) {
	if ($field == "") return "No Number was entered<br />";
	else if (strlen($field) < 7)
		return "Number must be at least 7 characters<br />";
	else if (preg_match("/[^Z0-9]/", $field))
		return "Only numbers in number<br />";
	return "";		
}


function fix_string($string) {
	if (get_magic_quotes_gpc()) $string = stripslashes($string);
	return htmlentities ($string);
}

if($_POST['submit']) { 
     
        $title = substr(htmlspecialchars(trim($_POST['name'])), 0, 1000); 
        $mess =  substr(htmlspecialchars(trim($_POST['number'])), 0, 1000000); 
        // $to - кому отправляем 
        $to = 'happylolonly@gmail.com'; 
        // $from - от кого 
        $from='test@test.by'; 
        // функция, которая отправляет наше письмо. 
        mail($to, $title, $mess, 'From:'.$from); 
        echo 'Спасибо! Ваше письмо отправлено.'; 
} 


?>


echo <<<_END

<!-- The HTML section -->

<style>.signup { border: 1px solid #999999;
	font: normal 14px helvetica; color:#444444; }</style>

<table class="signup" border="0" cellpadding="2"
	cellspacing="5" bgcolor="#eeeeee">
<th colspan="2" align="center">Signup Form</th>

<tr><td colspan="2">Sorry, the following errors were found<br />
in your form: <p><font color=red size=1><i>$fail</i></font></p>
</td></tr>

	<input type="submit" value="Signup" /></td>
</tr></form></table>

_END;


