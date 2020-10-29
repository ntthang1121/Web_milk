<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		$masua = $_GET['MaSua'];
		$con = mysqli_connect("localhost" , "root" , "" , "db_milk");

		$delete = "DELETE from thongtin where masua='".$masua."'";
		

		if (mysqli_query($con, $delete)) {
			header("location:thongtinSP.php");
			}
			else {
		 	 echo "Error deleting record: " . mysqli_error($con);
			}
			mysqli_close($con);

 		?>
</body>
</html>