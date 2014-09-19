<meta charset=utf-8>
<?php 
		//get form stuff and make into variables

		if ($_POST['sex'] == 'male'){
			$sex = "male";
	    // Checkbox is selected
		} else {
			$sex = "female";
		   // Alternate code
		}

		if ($_POST['v'] == '1'){
			$v = 1;
		}

		else if ($_POST['v'] == '2'){
			$v = 2;
		}
		else if ($_POST['v'] == '3'){
			$v = 3;
		}
		else if ($_POST['v'] == '4'){
			$v = 4;
		}
		else if ($_POST['v'] == '5'){
			$v = 5;
		}

		if ($_POST['m'] == '1'){
			$m = 1;
		}
		else if ($_POST['m'] == '2'){
			$m = 2;
		}
		else if ($_POST['m'] == '3'){
			$m = 3;
		}
		else if ($_POST['m'] == '4'){
			$m = 4;
		}
		else if ($_POST['m'] == '5'){
			$m = 5;
		}

		if ($_POST['ui'] == '1'){
			$ui = 1;
		}
		else if ($_POST['ui'] == '2'){
			$ui = 2;
		}
		else if ($_POST['ui'] == '3'){
			$ui = 3;
		}
		else if ($_POST['ui'] == '4'){
			$ui = 4;
		}
		else if ($_POST['ui'] == '5'){
			$ui = 5;
		}


		if ($_POST['c'] == '1'){
			$c = 1;
		}
		else if ($_POST['c'] == '2'){
			$c = 2;
		}
		else if ($_POST['c'] == '3'){
			$c = 3;
		}
		else if ($_POST['c'] == '4'){
			$c = 4;
		}
		else if ($_POST['c'] == '5'){
			$c = 5;
		}

		if ($_POST['i'] == '1'){
			$i = 1;
		}
		else if ($_POST['i'] == '2'){
			$i = 2;
		}
		else if ($_POST['i'] == '3'){
			$i = 3;
		}
		else if ($_POST['i'] == '4'){
			$i = 4;
		}
		else if ($_POST['i'] == '5'){
			$i = 5;
		}

		//echo $sex;



	$link = mysqli_connect('//192.168.1.4','',''); 
	if (mysqli_connect_errno()) { 
		die(' <br> Could not connect to MySQL: ' . mysqli_connect_error()); 
	} 
	//else { echo ' <br> Connection OK';
	//} 


	// Select Data Base
   if(!mysqli_select_db($link, "test")){
   	echo " <br> cant select db";
   }
   //else {
   //	echo "<br> selected db";
  //}


   //put into db
    $sqlAddToDB = "INSERT INTO usability(sex, visual, model, interface, control, interact) VALUES ('$sex', $v, $m, $ui, '$c', '$i')";
	$insertQuery = mysqli_query($link, $sqlAddToDB);

	if(!$insertQuery){
		echo "failed to insert". mysql_error();
	}
	else {
		echo "inserted ok";
	}

	$result = mysqli_query($link,"SELECT * FROM usability");

	//while($row = mysqli_fetch_array($result)) {
	//	echo "<br>";
	//  echo $row['sex'] . " " . $row['visual'] . " " . $row['model'] . " " . $row['interface'] . " " . $row['control'] . " " . $row['interact'];
	//  echo "<br>";
	//}



mysqli_close($link); 

//echo file_get_contents("chart.html");
header("Location: chart.php");
?> 
