<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Cập nhật Thông Tin</title>
	<link rel="stylesheet" type="text/css" href="styletrangchu.css">

</head>
<body  onload="hide('container-thongtinkhachhang','container-thongtinhangsua','container-thongtinsanpham')">
	<?php
		
		if(!isset($_SESSION["user"]))
		{
			echo isset($_SESSION["user"]);
			echo "Bạn phải đăng nhập <a href = 'login.php' >Dang nhap</a> moi có quền sửa sản phẩm";
		}
		else
		{
			?>
				<div class="header">
					<div id="header-item">
					 	<img id="logo1" src="img/logo.png">
					 	<h3 class="text-header">HMT-MILK <br>
					 		<font style="font-size: 30px">Vươn Tầm Thế Giới</font>
					 	</h3>
					 	<img id="logo2" src="img/logo2.gif">
					</div>
				</div>


				<div class="navbar" id="navbar_main" >
			  		<div class="navbar-item">
			  			<div class="dropdown">
						    <button class="dropbtn" onclick="window.location = 'trangchu.php'">Trang chủ
						      <i class="fa fa-caret-down"></i>
						    </button>
			  			</div>
				  		<div class="dropdown">
						    <button class="dropbtn">Hãng Sữa
						      <i class="fa fa-caret-down"></i>
						    </button>
						    <div class="dropdown-content">
								<a href="#" onclick="showhide('container-thongtinhangsua','container-thongtinsanpham','container-thongtinkhachhang')" >Thông Tin Hãng Sữa</a>
								<a href="themHS.php" >Thêm Hãng Sữa</a>
								<a href="deleteHS.php" >Xóa Hãng Sữa</a>
								<a href="suaHS.php" >Sửa Hãng Sữa</a>
							</div>
			  			</div>
				    	<div class="dropdown">
						    <button class="dropbtn">Sản Phẩm
						      <i class="fa fa-caret-down"></i>
						    </button>
						    <div class="dropdown-content">
								<a href="#" onclick="showhide('container-thongtinsanpham','container-thongtinhangsua','container-thongtinkhachhang')" >Thông Tin Sản Phẩm</a>
								<a href="themsp.php" >Thêm Sản Phẩm</a>
								<a href="deleteSP.php" >Xóa Sản Phẩm</a>
								<a href="suasp.php" >Sửa Sản Phẩm</a>
						    </div>
						 </div> 
				    	<div class="dropdown">
						    <button class="dropbtn">Khách Hàng 
						      <i class="fa fa-caret-down"></i>
						    </button>
						    <div class="dropdown-content">
								<a href="#" onclick="showhide('container-thongtinkhachhang','container-thongtinhangsua','container-thongtinsanpham')" >Thông Tin Khách Hàng</a>
								<a href="themKH.php" >Thêm Khách Hàng</a>
								<a href="deleteKhach.php" >Xóa Khách Hàng</a>
								<a href="suaKH.php" >Sửa Khách Hàng</a>
						    </div>
						</div>

						<div class="dropdown">
							<button class="dropbtn" onclick="window.location='logout.php'">Đăng Xuất</button>
						</div>
				    </div>
				</div>

				<div id="container-thongtinhangsua" style="width: 1000px; margin:30px auto;">
					<form method="POST">
						<table  style="background-image: linear-gradient(-100deg, #13d7b7e0, #ffc0c0);">
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
								<td ><?php echo $row["mahs"]; $id = $row["mahs"]; ?></td>
								<td><?php echo $row["tenhs"] ?></td>
								<td><?php echo $row["diachi"] ?></td>
								<td><?php echo $row["dienthoai"] ?></td>
								<td><?php echo $row["email"] ?></td>
								<td><a href='deleteHS.php?IDD=<?php echo $id; ?>' >Xoa</a></td>
								
							</tr>

							<?php 
								}
							 ?>
						</table>
						
					</form>
				</div>

				<div id="container-thongtinsanpham" style="width: 1000px; margin:30px auto;">
					<form method="POST">
						<table border="1" style="background-image: linear-gradient(-100deg, #13d7b7e0, #ffc0c0);">
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
								<td><a href='deleteSP.php?MaSua=<?php echo $row["masua"]; ?>' >Xoa</a></td>
								
							</tr>

							<?php 
								}
							 ?>
						</table>
					</form>
				</div>

				<div id="container-thongtinkhachhang" style="width: 1000px; margin:30px auto;">
					<form method="POST">
						<table border="1" style="background-image: linear-gradient(-100deg, #13d7b7e0, #ffc0c0);">
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
								<td><a href='deleteKhach.php?IDD=<?php echo $id; ?>' >Xoa</a></td>
								
							</tr>

							<?php 
								}
								mysqli_close($con);
							 ?>
						

						</table>
						
					</form>
				</div>


				<script type="text/javascript">
					function showhide(a,b,c){
						var tths = document.getElementById(a);
						var ttsp = document.getElementById(b);
						var ttkh = document.getElementById(c);

						tths.style.display = "";
						ttsp.style.display = "none";
						ttkh.style.display = "none";
					}
					function hide(a,b,c){
						var tths = document.getElementById(a);
						var ttsp = document.getElementById(b);
						var ttkh = document.getElementById(c);

						tths.style.display = "none";
						ttsp.style.display = "none";
						ttkh.style.display = "none";
					}

				</script>
		<?php
		}
		?>

</body>
</html>