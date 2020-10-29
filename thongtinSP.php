<!DOCTYPE html>
<html>
<head>
	<title>Thông Tin Sản Phẩm</title>
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


	<div id="container" style="width: 800px; margin:100px auto;">
		<form method="GET">
			<table border="1">
		        <tr>
		           <th colspan="8"><h3>Thông Tin Sữa</h3></th>
		        </tr>
				<tr>
					<th>Số TT</th>
					<th>Tên Sữa</th>
					<th>Hãng Sữa</th>
					<th>Loại Sữa</th>
					<th>Trọng Lượng</th>
					<th>Đơn Giá</th>
					<th colspan="2" style="text-align: center;">Event</th>

				</tr>
				<?php 
					$con = mysqli_connect("localhost" , "root" , "" , "db_milk");
					$select = " SELECT * from thongtin";

					$result = mysqli_query($con,$select);
					$i=0;
					while ($row = mysqli_fetch_assoc($result)){
						$i+=1;
			 	?>
				<tr>
					<td><?php echo $i?></td>
					<td><?php echo $row["tensua"];?></td>
					<td><?php echo $row["hangsua"];?></td>
					<td><?php echo $row["loaisua"];?></td>
					<td><?php echo $row["trongluong"];?></td>
					<td><?php echo $row["dongia"];?></td>
					<td><a onclick="return check()" href='deleteSP.php?MaSua=<?php echo $row["masua"]; ?>' >Xoa</a></td>
					
				</tr>

				<?php 
					}
					mysqli_close($con);
				 ?>
			

			</table>
		
		</form>
		<div style="text-align: center;">
					<button class="btn" style="background-color: #92cbbc;border: groove" onclick="window.location = 'admin.php'">Quay Lại</button>
					<button class="btn" style="background-color: #92cbbc;border: groove" onclick="window.location = 'themsp.php'">Thêm Sản Phẩm</button>
					<button class="btn" style="background-color: #92cbbc;border: groove" onclick="window.location = 'suasp.php'">Sửa Sản Phẩm</button>
				
			</div>
	</div>
	<script type="text/javascript">
		function check(){
			if(confirm("Bạn chắc chắn muốn xóa")){
				return true;
			}
			else{
				window.location = "thongtinSP.php";
				return false;
			}
		}
	</script>
</body>
</html>