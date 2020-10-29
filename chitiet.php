<!DOCTYPE html>
<html>
<head>
	<title>Chi tiết sản phẩm</title>
	<style type="text/css">
		
		body{
			background-image: linear-gradient(-100deg, #13d7b7e0, #ffc0c0);
		}
		 table{
		 	margin: 50px auto;
	 		background-image: linear-gradient(-100deg, #13d7b7e0, #ffc0c0);	
			box-shadow: 0px 0px 15px 15px gray;
			
		  border: 1px solid none;
		  border-collapse: collapse;
		}
		 th{
		  border: 1px solid black;
		  border-collapse: collapse;
		  font-size: 15px;
		  padding: 5px 2px;
		}
		 td{
		  border: 1px solid black;
		  border-collapse: collapse;
		  font-size: 15px;
		  padding-top: 10px;
		}
	</style>
</head>
<body>
	<?php 
		$IDD = $_GET['ma'];

		$con = mysqli_connect("localhost" , "root" , "" , "db_milk");

		$chitiet = "SELECT * from thongtin where masua ='".$IDD."'";
		$res = mysqli_query($con, $chitiet);
		$rowcount=mysqli_num_rows($res);
		if ($rowcount != 0) {
			$row = mysqli_fetch_assoc($res);
			echo '<div id="next" style="margin: auto ;text-align:center;overflow: hidden;margin-top: 10%;">
				<table style="margin: auto; boder:1px solid black;"> 
					<tr>
						<th colspan="2" style="text-align: center;">'.$row["tensua"].'</th>
					</tr>
					<tr>
						<td rowspan="3"><img width="100px" src="img/'.$row["hinhanh"].'"></td>

					</tr>
					
					<tr>
						<td >
							<font style="font-style: oblique;color: chocolate ">Thành phần dinh dưỡng:</font> <br>'.$row["tpdd"].' 
							<br>
							<font style="font-style: oblique;color: chocolate ">Lợi ích:</font> <br>'.$row["loiich"].'
							<br>
							Trọng Lượng: <font style="color: red">'.$row["trongluong"].'</font> --  Đơn giá:<font style="color: red"> '.$row["dongia"].'</font> 
						</td>
					</tr>
					

				</table>
				<button onclick="window.location=\'trangchu.php\'">quay về</button>
			</div>';
			
		} else {
		  echo "Error deleting record: " . mysqli_error($con);
		}
		mysqli_close($con);

 ?>

</body>
</html>
