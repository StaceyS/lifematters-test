<?php


function spamcheck($field) {
  // Sanitize e-mail address
  $field=filter_var($field, FILTER_SANITIZE_EMAIL);
  // Validate e-mail address
  if(filter_var($field, FILTER_VALIDATE_EMAIL)) {
    return TRUE;
  } else {
    return FALSE;
  }
}



$errors = '';
/*

if(empty($_POST['firstname'])  || 
   empty($_POST['fromemail']) || 
   empty($_POST['situation']))
{
    $errors .= "\n <span class='glyphicon glyphicon-warning-sign'></span>  Fill in all required fields";
}
*/

$firstname = 'Some Guy';
echo $firstname;
$lastname = 'Friend';
$fromemail = 'steve@espinozadesign.com'; 
$situation = 'I love lamp';
$separator = md5(time());
$eol = PHP_EOL;

if( empty($errors)) {
	$to = "stvesp@gmail.com"; 
	$email_subject = "Contact Form Submission from" . $firstname;
	
	$email_body = "<html><body>";
	$email_body .= "<p style='color:#777;'>Submitted by:</p><hr noshade>";
	$email_body .= "<h2>$firstname";
	$email_bofy .= " $lastname</h2>";
	$email_bofy .= "<p>$situation</p>";
	$email_body .= "</body></html>";	
	
	$headers = "From: info@lifemattersusa.com ".$eol;
	$headers .= "Reply-To: $fromemail ".$eol;
	$headers .= "MIME-Version: 1.0".$eol;
	$headers .= "Content-Type: text/html; charset=UTF-8";
	
	mail($to,$email_subject,$email_body,$headers);
	
	header('Location: contactusform_thankyou.html');
	
}




?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Request a Post - ERROR</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<style>
        	body { padding:1.5em 1.5em 3em; background-color: #EEE;}
        	div.container { background-color: #FFF; padding: 2.25em; }
        	div.row { margin-top: 2em; }
        	h2 { margin-left: 3em; }
        	button { margin-top: 3em; }
    </style>
</head>

<body>
<div class="container">
	    	<div class="row">
	    		<div class="col-lg-12">
	    			<h1 class="text-danger">ERROR</h1>
					<h2 class="text-danger"><?php echo nl2br($errors); echo "$to \n".$eol; echo "$email_subject \n".$eol; echo "$email_body \n".$eol; echo $headers; ?></h2>
					<button class="btn btn-primary btn-lg" type="button" data-toggle="dropdown" onclick="window.history.back()"><span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;&nbsp;Go Back</button>
	    		</div>
	    	</div>
</div>
</body>
</html>