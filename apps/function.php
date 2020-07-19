<?php
//Function made for old data
function old($name){
	if(isset($_POST[$name])){
	echo $_POST[$name];	
	}
}


//Function made for date of birth validation

function ageValidate($dob, $min, $max){
	if($dob >= $min && $dob <= $max){
		return true;
	}else{
		return false;
	}
}

//Email validation
function mailValidate($email){
	//mail part exploding
	$mail_part = explode('@', $email);
	$mail_end = end($mail_part);
	if($mail_end == 'ctbd.com' || $mail_end == 'gmail.com' || $mail_end == 'yahoo.com'){
		return true;
	}else{
		return false;
	}
}


//Cell validation section 
function cellVal($cell){
	if(strlen($cell)==11){
		return true;
	}else{
		return false;
	}
}
