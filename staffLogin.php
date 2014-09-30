<html>
<head>
<?php
	header('Content-type: application/json');
	$checked = 0;

		if($_POST) {
		    if($_POST['staffuname'] == 'user' && $_POST['staffpass'] == 'password') {
		   	$checked = 1;

		 } else {
		    $checked = 0;
		    }
		}else {   
			$checked = 0;
			}
?>

<script type="text/javascript">
var checked = <?php echo $checked ?>;

if (checked ==1){
	window.location.assign("http://cs1.ucc.ie/~tv3/app/staffChart.php");
}
else {
	window.location.assign("http://cs1.ucc.ie/~tv3/app/staffLogin.php");
}

</script>
</head>
</html>