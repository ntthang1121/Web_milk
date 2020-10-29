<!DOCTYPE html>
<html>
<head>
	<title>Thông Tin Hãng Sữa</title>
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

	 <div id="container" style="width: 1000px; margin:100px auto;">
		<form method="GET">
			<table border="1" >
		        <tr>
		           <th colspan="8"><h3>THÔNG TIN HÃNG SỮA</h3></th>
		        </tr>
				<tr>
					<th>Mã HS</th>
					<th>Tên Hãng Sữa</th>
					<th>Địa chỉ</th>
					<th>Điện Thoại</th>
					<th>Email</th>
					<th colspan="2" style="text-align: center;">Event</th>

				</tr>
				<?php 
					$con = mysqli_connect("localhost" , "root" , "" , "db_milk");
					$select = " SELECT * from thongtinhangsua";

					$result = mysqli_query($con,$select);

					while ($row = mysqli_fetch_assoc($result)){
			 	?>
				<tr>
					<td><?php echo $row["mahs"]; $id = $row["mahs"]; ?></td>
					<td><?php echo $row["tenhs"] ?></td>
					<td><?php echo $row["diachi"] ?></td>
					<td><?php echo $row["dienthoai"] ?></td>
					<td><?php echo $row["email"] ?></td>
					<td><a onclick="return check()" href='deleteHS.php?IDD=<?php echo $id; ?>' >Xoa</a></td>
					
				</tr>

				<?php 
					}
					mysqli_close($con);
				 ?>
			

			</table>
		</form>
		<div style="text-align: center;">
					<button class="btn" style="background-color: #92cbbc;border: groove" onclick="window.location = 'admin.php'">Quay Lại</button>
					<button class="btn" style="background-color: #92cbbc;border: groove" onclick="window.location = 'themHS.php'">Thêm Hãng Sữa</button>
					<button class="btn" style="background-color: #92cbbc;border: groove" onclick="window.location = 'suaHS.php'">Sửa Hãng Sữa</button>
				
			</div>
	</div>
	<script type="text/javascript">
		function check(){
			if(confirm("Bạn chắc chắn muốn xóa")){
				return true;
			}
			else{
				window.location = "thongtinHS.php";
				return false;
			}
		}

	</script>
</body>
</html>