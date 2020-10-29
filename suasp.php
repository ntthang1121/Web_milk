<!DOCTYPE html>
<html>
<head>
	<title>Sửa Sản Phẩm</title>
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
		$error = null;
		$idd = null;
		$tensua = null;
		$hangsua = null;
		$loaisua = null;
		$trongluong = null;
		$dongia =null;
		$tpdd =null;
		$loiich =null;
		$hinhanh =null;

		$con = mysqli_connect("localhost", "root", "", "db_milk") or die ("Connect error");
		if(isset($_POST['btnshow'])){
			$sec = "SELECT * from thongtin where masua = '".$_POST["mk"]."'";
			$rs = mysqli_query($con,$sec);
			$ro = mysqli_fetch_array($rs);
				$idd 		= $ro['masua'];
				$tensua 	= $ro['tensua'];
				$hangsua	= $ro['hangsua']; //
				$loaisua 	= $ro['loaisua'];//
				$trongluong = $ro['trongluong'];
				$dongia 	= $ro['dongia'];
				$tpdd 		= $ro['tpdd'];
				$loiich 	= $ro['loiich'];
				$hinhanh 	= $ro['hinhanh'];
			}

		if(isset($_POST["btnsub"])){
				$ts 		= $_POST['txtTensua'];
				$hs 		= $_POST['txthangsua'];
				$ls 		= $_POST['txtloaisua'];
				$tl 		= $_POST['txtTrongluong'];
				$dg 		= $_POST['txtDongia'];
				$tp 		= $_POST['txttpdd'];
				$li 		= $_POST['txtloiich'];
				$ha 		= $_POST['btnImg'];


			$sqlUpdate = "UPDATE thongtin SET tensua='".$ts."',hangsua='".$hs."',loaisua='".$ls."',trongluong='".$tl."',dongia='".$dg."',tpdd='".$tp."',loiich='".$li."',hinhanh='".$ha."' WHERE masua='".$_POST["mk"]."'";

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
					<th colspan="3" style="padding-bottom: 10px;">SỬA SẢN PHẨM</th>
				</tr>
				<tr>
					<td>Mã Sữa</td>
					<td>:</td>
					<td>
						<select name="mk" id="mk">
							<?php 
								

								$select = " SELECT thongtin.masua from thongtin";

								$result = mysqli_query($con,$select);


								while ($row = mysqli_fetch_array($result)){
							 ?>
							<option value="<?php echo $row['masua']?>"  <?php if($row["masua"] == $idd)  echo "selected";?>><?php echo $row["masua"]; ?></option>
							<?php 

								}

							 ?>
						</select>
						<input type="submit" name="btnshow" id="btnshow" value="hiển thị">
					</td>
				</tr>
				<tr>
					<td>Tên Sữa</td>
					<td>:</td>
					<td><input type="text" name="txtTensua" value="<?php echo $tensua ?>"></td>
				</tr>
				<tr>
					<td><label>Hãng sữa</label></td>
					<td>:</td>
					<td>
						<select name="txthangsua" id="txthangsua">
							<option value="VinaMilk"	<?php if($hangsua == "VinaMilk") echo "selected"; ?>>VinaMilk</option>
							<option value="Dutch Lady"	<?php if($hangsua == "Dutch Lady") echo "selected"; ?>>Ducth Lady</option>
							<option value="Nutifood"	<?php if($hangsua == "Nutifood") echo "selected"; ?>>Nutifood</option>
							
						</select>
					</td>
				</tr>
				<tr>
					<td><label>Loại sữa</label></td>
					<td>:</td>
					<td>
						<select name="txtloaisua" id="txtloaisua">
							<option value="Sữa bột"			<?php if($loaisua == "Sữa bột") echo "selected";?>>Sữa bột</option>
							<option value="Sữa đặc"			<?php if($loaisua == "Sữa đặc") echo "selected";?>>Sữa đặc</option>
							<option value="Sữa tươi"		<?php if($loaisua == "Sữa tươi") echo "selected";?>>Sữa tươi</option>
							<option value="Sữa không đường"	<?php if($loaisua == "Sữa không đường") echo "selected";?>>Sữa không đường</option>
							<option value="Sữa có đường"	<?php if($loaisua == "Sữa có đường") echo "selected";?>>Sữa có đường</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Trọng Lượng</td>
					<td>:</td>
					<td><input type="text" name="txtTrongluong" value="<?php echo $trongluong ?>"></td>
				</tr>
				<tr>
					<td>Đơn Giá</td>
					<td>:</td>
					<td><input type="text" name="txtDongia" value="<?php echo $dongia ?>"></td>
				</tr>
				<tr>
					<td>Thành Phần Dinh Dưỡng</td>
					<td>:</td>
					<td><input type="text" name="txttpdd" value="<?php echo $tpdd ?>"></td>
				</tr>
				<tr>
					<td>Lợi Ích</td>
					<td>:</td>
					<td><input type="text" name="txtloiich" value="<?php echo $loiich ?>"></td>
				</tr>
				<tr>
					<td>Hình ảnh</td>
					<td>:</td>
					<td>
						<input type="file" name="btnImg" id="btnImg" accept="image/png, .jpeg, .jpg, image/gif" src="<?php echo $hinhanh ?>">
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" name="btnsub" value="Sửa" style="background-color: #aec9bd;border: groove"></td>
				</tr>
				
				<tr>
					<th colspan="3"><?php echo $error; ?> </th>
				</tr>
			</table>
		</form>
		<div style="text-align: center;">
				<button class="btn" style="background-color: #92cbbc;border: groove" onclick="window.location = 'admin.php'">Quay Lại</button>
				<button class="btn" style="background-color: #92cbbc;border: groove" onclick="window.location = 'thongtinSP.php'">Danh sách sản phẩm</button>
			
		</div>
	</div>


</body>
</html>