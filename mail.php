<?php

$to ="Abhisheksja1998@gmail.com";
$subject = "Response From Website";
$message = "I am very thankful to you";
$header = "From:excellenceeducation.info@gmail.com";

if(mail($to,$subject,$message,$header)){
	echo "Mail sent successfuly";

}
else
{
	echo "Mail was not sent";
}
?>