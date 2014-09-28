<?php
	header('Content-type: application/json');

		if($_POST) {
		    if($_POST['staffuname'] == 'user' && $_POST['staffpass'] == 'password') {
		   echo '{"success":1}';


//---------------------------what to do if password is ok

			header("Location: staffChart.php");

//---------------------------what to do if password is wrong

		 } else {
		    echo '{"success":0,"error_message":"Username and/or password is invalid."}';
		    header("Location: staffLogin.html");
		}
		}else {    echo '{"success":0,"error_message":"Username and/or password is invalid."}';
			header("Location: staffLogin.html");
		}
?>