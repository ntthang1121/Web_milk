
	<?php 
		$IDD = $_GET['IDD'];

		$con = mysqli_connect("localhost" , "root" , "" , "db_milk");

		$dele = "DELETE from thongtinkhachhang where makh ='".$IDD."'";


		if (mysqli_query($con, $dele)) {
			header("location:thongtinKH.php");
		} else {
		  echo "Error deleting record: " . mysqli_error($con);
		}
		mysqli_close($con);

 		?>
