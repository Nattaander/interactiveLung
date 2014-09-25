<meta charset=utf-8>
<?php 
	if ($_POST){echo "got it";}
		//get form stuff and make into variables
		$name = $_POST['firstname'];


		if ($_POST['sex'] == 'male'){
			$sex = "male";
	    // Checkbox is selected
		} else {
			$sex = "female";
		   // Alternate code
		}


		
		if (isset($_POST['Apples'])) {
			$apples = 1;
	    // Checkbox is selected
		} else {
			$apples = 0;
		  
		}

		if (isset($_POST['Oranges'])) {
			$oranges = 1;
	    // Checkbox is selected
		} else {
			$oranges = 0;
		   
		}

		if (isset($_POST['Bananas'])) {
			$bananas = 1;
	    // Checkbox is selected
		} else {
			$bananas = 0;
		   
		}

		$favourite = $_POST['favourite'];
		$comments = $_POST['comments'];



	$link = mysqli_connect('http://192.168.1.3','',''); 
	if (mysqli_connect_errno()) { 
		die(' <br> Could not connect to MySQL: ' . mysqli_connect_error()); 
	} 
	else { echo ' <br> Connection OK';
	} 


	// Select Data Base
   if(!mysqli_select_db($link, "test")){
   	echo " <br> cant select db";
   }
   else {
   	echo "<br> selected db";
   }


   //put into db
   //echo "  INSERT INTO students(first_name, sex, apple, orange, ban, fav_sport, comments) VALUES ($name, $sex, $apples, $oranges, $bananas, $favourite, $comments)";
    $sqlAddToDB = "INSERT INTO students(first_name, sex, apple, orange, ban, fav_sport, comments) VALUES ('$name', '$sex', $apples, $oranges, $bananas, '$favourite', '$comments')";
	$insertQuery = mysqli_query($link, $sqlAddToDB);

	if(!$insertQuery){
		echo "failed to insert". mysql_error();
	}
	else {
		echo "inserted ok";
	}

mysqli_close($link); 
header("Location: chart.php");

?> 
