<?php
	include_once('../include/DBConnect.php');
	$tr_id = $_POST['tr_id'];
	$userid = $_SESSION['ID'];
	$sql = "INSERT INTO `bl_do_breakdown`(`brkd_tr_per_reg_num`, `id`, `accept`) VALUES ('$tr_id','$userid','Y');";
	$result = mysqli_query($conn, $sql);
	if(!$result)
		echo "false";
	else
	{
		$sql = "UPDATE request_registration SET accept = accept + 1 WHERE tr_per_reg_num = '$tr_id'";
		$result = mysqli_query($conn, $sql);
		if(!$result)
			echo "false";
		else
			echo "true";
	}
?>