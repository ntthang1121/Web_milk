<!DOCTYPE html>
<html>
<head>
	<title>Sửa Hãng Sữa</title>
	<style type="text/css">
		td{
			padding-bottom: 10px;
		}
		body{
			background-image: linear-gradient(-100deg, #13d7b7e0, #ffc0c0);
		}
		#container{
			background-image: linear-gradient(-100deg, #13d7b7e0, #ffc0c0);	
			box-shadow: 0px 0px 15px 15px gray;
			border-radius: 15px;
		}
		.btn:hover{
			color: white;
		}
	</style>
</head>
<body>
	<?php 
		$error 	= null;
		$idd 	= null;
		$ten 	= null;
		$diachi = null;
		$sdtt 	= null;
		$email 	= null;
		$con 	= mysqli_connect("localhost", "root", "", "db_milk") or die ("Connect error");

		// nút show toàn bộ thông tin của hãng sữa
		if(isset($_POST['btnshow'])){
			$sec = "SELECT * from thongtinhangsua where mahs = '".$_POST["mk"]."'";
			$rs = mysqli_query($con,$sec);
			$ro = mysqli_fetch_array($rs);
				$idd 	= $ro['mahs'];
				$ten 	= $ro['tenhs'];
				$diachi = $ro['diachi'];
				$sdtt 	= $ro['dienthoai'];
				$email 	= $ro['email'];
			}
		// nút sửa
		if(isset($_POST["btnsub"])){
				$ths 		= $_POST['txttenhs'];
				$dckh 		= $_POST['txtAddress'];
				$sdt 		= $_POST['txtSDT'];
				$em 		= $_POST['txtEmail'];

			$sqlUpdate = "UPDATE thongtinhangsua SET tenhs='".$ths."',diachi='".$dckh."',dienthoai='".$sdt."',email='".$em."' WHERE mahs='".$_POST["mk"]."'";

			if (mysqli_query($con, $sqlUpdate)) {
			  $error =  "Sửa Thành Công !";
			} else {
			  $error =  "Lỗi : " . mysqli_error($con);
			}
		}	
			
	 ?>

	<div id="container" style="width: 700px; margin: auto">
		<form method="POST">
			<table  style="margin:100px auto; padding:30px; box-sizing: border-box ">
				<tr>
					<th colspan="3" style="padding-bottom: 10px;">SỬA HÃNG SỮA</th>
				</tr>
				<tr>
					<td>Mã hãng sữa</td>
					<td>:</td>
					<td>
						<select name="mk" id="mk">
							<?php 
								

								$select = " SELECT thongtinhangsua.mahs from thongtinhangsua";

								$result = mysqli_query($con,$select);


								while ($row = mysqli_fetch_array($result)){
							 ?>
							<option value="<?php echo $row["mahs"];?>" <?php if($row["mahs"] == $idd)  echo "selected";?>><?php echo $row["mahs"]; ?></option>
							<?php 

								}

							 ?>
						</select>
						<input type="submit" name="btnshow" id="btnshow" value="hiển thị">
					</td>
					
				</tr>
				<tr>
					<td>Tên hãng sữa</td>
					<td>:</td>
					<td><input type="text" name="txttenhs" value="<?php echo $ten ?>"></td>
				</tr>
			
				<tr>
					<td>Địa chỉ</td>
					<td>:</td>
					<td><input type="text" name="txtAddress" value="<?php echo $diachi ?>"></td>
				</tr>
				<tr>
					<td>Điện thoại</td>
					<td>:</td>
					<td><input type="text" name="txtSDT" value="<?php echo $sdtt ?>"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><input type="text" name="txtEmail" value="<?php echo $email ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" name="btnsub" value="Sửa" style="background-color: #aec9bd;border: groove"></td>
				</tr>
				<tr>
					<th colspan="3"><?php echo $error; ?></th>
				</tr>
			</table>
		</form>
		<div style="text-align: center;">
				<button class="btn" style="background-color: #92cbbc;border: groove" onclick="window.location = 'admin.php'">Quay Lại</button>
				<button class="btn" style="background-color: #92cbbc;border: groove" onclick="window.location = 'thongtinHS.php'">Danh sách hãng sữa</button>
			
		</div>	
	</div>
</body>
</html>