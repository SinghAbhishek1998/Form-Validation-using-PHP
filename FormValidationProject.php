<?php
$NameError="";
$EmailError="";
$WebsiteError="";
$GenderError="";
// Initialized all Errors to Null before Submission of Form

if(isset($_POST['Submit'])){ //On Submitting the form
	if(empty($_POST["Name"])){//if name field is empty 
		$NameError="Name is Required";//Name is Required
	}
	else{
		$Name=Test_User_Input($_POST["Name"]);
		if(!preg_match("/^[A-Za-z. ]*$/", $Name)){
			$NameError="Only Letters and whitespaces are allowed";
		}
	}

	if(empty($_POST["Email"])){
		$EmailError="Email is Required";
	}
	else{
		$Email=Test_User_Input($_POST["Email"]);
		if(!preg_match("/[a-zA-Z0-9._]{3,}@[a-zA-Z0-9._]{3,}[.]{1,}[a-zA-Z0-9._]{2,}/", $Email)){
			$EmailError="Enter a Valid Email";
		}
	}
	if(empty($_POST["Gender"])){
		$GenderError="Gender is Required";
	}
	else{
		$Gender=Test_User_Input($_POST["Gender"]);
	}

	if(empty($_POST["Website"])){
		$WebsiteError="Website is Required";
	}
	else{
		$Website=Test_User_Input($_POST["Website"]);
		if(!preg_match("/(https:|ftp:)\/\/+[A-Za-z0-9.\-\/_\%$=?\#+*!&\~]+\.[.A-Za-z0-9\-\/_\%$=?\#+*!&\~]*/", $Website)){
			$WebsiteError="Invalid Website Address Format";
		}
	}
	if(!empty($_POST["Name"])&&!empty($_POST["Email"])&&!empty($_POST["Gender"])&& !empty($_POST["Website"])){
		if(preg_match("/^[A-Za-z. ]*$/", $Name)&& preg_match("/[a-zA-Z0-9._]{3,}@[a-zA-Z0-9._]{3,}[.]{1,}[a-zA-Z0-9._]{2,}/", $Email) && preg_match("/(https:|ftp:)\/\/+[A-Za-z0-9.\-\/_\%$=?\#+*!&\~]+\.[.A-Za-z0-9\-\/_\%$=?\#+*!&\~]*/", $Website)){
	echo "<h2>Information Submitted Succesfully ! </h2><br>";
	echo "Name : {$_POST['Name']}<br>";
	echo "Email : {$_POST['Email']}<br>";
 	echo "Gender : {$_POST['Gender']}<br>";
 	echo "Website : {$_POST['Website']}<br>";
 	echo "Comment : {$_POST['Comment']}<br>";
		$to ="{$_POST['Email']}";
		$subject = "Response From Website !";
		$message ="A person name : ".$_POST['Name']." With the Email ".$_POST['Email']." have Gender ".$_POST['Gender']." have website of ".$_POST['Website']." Added Comment :: ".$_POST['Comment'];
		$header = "From:excellenceeducation.info@gmail.com";

		if(mail($to,$subject,$message,$header)){
			echo "<br><strong>Mail sent successfully</strong>";

		}
		else
		{
			echo "<br><strong>Mail was not sent</strong>";
		}
 }
 else echo "<span class='Error'> Please complete & correct your form again </span>";
 }

}
function Test_User_Input($Data){
	return $Data;
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Form Validation Project</title>
</head>
<style type="text/css">
	h2{
		padding: 15px;
		font-family: "Lucida Handwriting"; 
	}
	fieldset{
		padding: 10px;
	}
	input[type='text'],textarea{
		border: 1px solid_dashed;
		background-color: rgb(221,216,212);
		width: 600px;
		padding: .5em;
		font-size: 1.4em;
		font-family: "Lucida Handwriting";

	}
	body{
		background-color: rgb(240, 240, 240);
	}
	.submit{
			 background-color: #4CAF50; /* Green */
			  border: none;
			  color: white;
			  padding: 10px 32px;
			  text-align: center;
			  text-decoration: none;
			  display: inline-block;
			  font-size: 16px;

	}
	.Error{
		color: red;
	}
</style>
<body>
<h2>Form Validation with PHP</h2>
<form action="FormValidationProject.php" method="post">
	<legend>* Please Fill Out the Following Fields.</legend>
	<fieldset>
		Name:<br>
		<input class="input" type="text" name="Name" placeholder="Enter your Name"><span class="Error">*<?php echo $NameError;?></span><br>
		E-mail:<br>
		<input class="input" type="text" name="Email" placeholder="Enter your Email"><span class="Error">*<?php echo $EmailError;?></span><br>
		Gender:<br>
		<input class="radio" type="radio" name="Gender" value="Male">Male
		<input class="radio" type="radio" name="Gender" value="Female">Female <span class="Error">*<?php echo $GenderError;?></span><br>
		Website:<br>
		<input class="input" type="text" name="Website" placeholder="URL to be mentioned here"><span class="Error">*<?php echo $WebsiteError;?></span>
		<br>Comment:<br>
		<textarea name="Comment" rows="6" cols="50" placeholder="Comment goes here"></textarea>
		<br>
		<input class="submit" type="submit" name="Submit" value="Submit Your Information"> 
	</fieldset>
</form>

</body>
</html>