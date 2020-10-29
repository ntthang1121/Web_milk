<!DOCTYPE html>
<html>
<head>
	<title>Thông Tin Khách Hàng</title>
	<style type="text/css">
		td{
			padding: 5px;
			box-sizing: border-box;
			text-align: center;
		}
		th{
			padding: 10px;
			text-align: center;
		}
		body{
			background-image: linear-gradient(-100deg, #13d7b7e0, #ffc0c0);
		}
		#container{
			background-image: linear-gradient(-100deg, #13d7b7e0, #ffc0c0);	
			box-shadow: 0px 0px 15px 15px gray;
		}
		.btn:hover{
			color: white;
		}
		#container table{
		  border: 1px solid none;
		  border-collapse: collapse;
		  width: 100%;
		  margin: auto;
		  text-align: center;
		  margin-bottom: 50px;
		}
		#container th{
		  border: 1px solid black;
		  border-collapse: collapse;
		  font-size: 15px;
		  height: 30px;
		  line-height: 30px;
		  align-items: center;
		  text-align: center;
		  padding: 5px 2px;
		}
		#container td{
		  border: 1px solid black;
		  border-collapse: collapse;
		  font-size: 15px;
		  height: 30px;
		  line-height: 30px;
		}
	</style>
</head>
<body>


	<div id="container" style="width: 1000px; margin:30px auto;">
		<form method="GET">
			<table border="1">
		        <tr>
		           <th colspan="8"><h3>Thông Tin Khách Hàng</h3></th>
		        </tr>
				<tr>
					<th>Mã KH</th>
					<th>Tên Khách Hàng</th>
					<th>Giới tính</th>
					<th>Địa chỉ</th>
					<th>Số Đt</th>
					<th>Email</th>
					<th colspan="2" style="text-align: center;">Event</th>

				</tr>
				<?php 
					$con = mysqli_connect("localhost" , "root" , "" , "db_milk");
					$select = " SELECT * from thongtinkhachhang";

					$result = mysqli_query($con,$select);

					while ($row = mysqli_fetch_assoc($result)){
			 	?>
				<tr>
					<td><?php echo $row["makh"]; $id = $row["makh"]; ?></td>
					<td><?php echo $row["tenkh"] ?></td>
					<td><?php if($row["gioitinh"] == 1)
									echo "Nam";
								else
									echo "Nữ";
					 ?></td>
					<td><?php echo $row["diachi"] ?></td>
					<td><?php echo $row["sdt"] ?></td>
					<td><?php echo $row["email"] ?></td>
					<td><a onclick="return check()" href='deleteKhach.php?IDD=<?php echo $id; ?>' >Xoa</a></td>
					
				</tr>

				<?php 
					}
					mysqli_close($con);
				 ?>
			

			</table>
		</form>
		<div style="text-align: center;">
					<button class="btn" style="background-color: #92cbbc;border: groove" onclick="window.location = 'admin.php'">Quay Lại</button>
					<button class="btn" style="background-color: #92cbbc;border: groove" onclick="window.location = 'themKH.php'">Thêm Khách Hàng</button>
					<button class="btn" style="background-color: #92cbbc;border: groove" onclick="window.location = 'suaKH.php'">Sửa Khách Hàng</button>
				
			</div>
	</div>
	<script type="text/javascript">
		function check(){
			if(confirm("Bạn chắc chắn muốn xóa")){
				return true;
			}
			else{
				window.location = "thongtinKH.php";
				return false;
			}
		}
	</script>
</body>
</html>