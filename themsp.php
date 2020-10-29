<!DOCTYPE html>
<html>
<head>
	<title>Thêm Sản Phẩm</title>
	<style type="text/css">
		td{
			padding-bottom: 5px;
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
		#next table{
		  border: 1px solid none;
		  border-collapse: collapse;
		  margin: auto;
		  margin-bottom: 50px;
		}
		#next th{
		  border: 1px solid black;
		  border-collapse: collapse;
		  font-size: 15px;
		  padding: 5px 2px;
		}
		#next td{
		  border: 1px solid black;
		  border-collapse: collapse;
		  font-size: 15px;
		  padding-top: 10px;
		}
	</style>
</head>
<body>
	<?php 
		$error = null;
		$ms = null;
		$ts = null;
		$hs = null;
		$ls = null;
		$tl = null;
		$dg = null;
		$tpdd = null;
		$li = null;
		$ha = null;
		$con = mysqli_connect("localhost" ,"root","" , "db_milk") or die("Connect error");
		if(isset($_POST["btnsub"])){
			
			$ms = $_POST["txtId"];
			$ts = $_POST["txtTen"];
			$hs = $_POST["hangsua"];
			$ls = $_POST["loaisua"];
			$tl = $_POST["txtTLuong"];
			$dg = $_POST["txtTien"];
			$tpdd = $_POST["txtdd"];
			$li = $_POST["txtloiich"];
			$ha = $_POST["btnImg"];
			switch ($hs) {
				case 1:
					$hs == "VinaMilk";
					break;
				case 2:
					$hs == "Ducth Lady";
					break;
				case 3:
					$hs == "Ensure";
					break;
				case 4:
					$hs == "Nutifood";
					break;
				case 5:
					$hs == "TH TrueMilk";
					break;
			}
			switch ($ls) {
				case 1:
					$hs == "Sữa bột";
					break;
				case 2:
					$hs == "Sữa đặc";
					break;
				case 3:
					$hs == "Sữa tươi";
					break;
				case 4:
					$hs == "Sữa không đường";
					break;
				case 5:
					$hs == "Sữa có đường";
					break;
				
			}
			if($ms == null||$ts == null||$hs == null||$ls == null||$tl == null||$dg == null||$tpdd == null||$li == null||$ha == null)
			{
				$error = "Nhập thiếu thông tin ! Nhập lại .";
			}
			else{
				$insert = "INSERT into thongtin values('".$ts."','".$hs."','".$ls."','".$tl."','".$dg."','".$tpdd."','".$li."','".$ha."','".$ms."');";
				if (mysqli_query($con, $insert)) {
				  $error = "Thêm thành công !";
				} else {
				  $error = "Thêm thất bại.Trùng mã sản phẩm khác!";
				}
				
			}
		}




	 ?>
	<div id="container" style="width: 700px ;margin:auto">
		<form method="POST">
			<table style="margin:100px auto 10px auto; padding:30px; box-sizing: border-box ">
				<tr>
					<th style="padding-bottom: 20px;" colspan="3">THÊM MỚI SẢN PHẨM</th></tr>
				<tr>
					<td ><label for="txtId">Mã Sữa </label></td>
					<td >:</td>
					<td><input type="text" name="txtId" id="txtId" >
						<select name="mk" id="mk">
							<?php 

								$select = " SELECT thongtin.masua from thongtin";

								$result = mysqli_query($con,$select);


								while ($row = mysqli_fetch_array($result)){
							 ?>
							<option value="<?php echo $row['masua']?>" ><?php echo $row["masua"]; ?></option>
							<?php 

								}

							 ?>
						</select>
						<font style="color: red ; font-size: 13px;">(danh sách các mã đã tồn tại)</font>
					</td>
					
				</tr>
				<tr>
					<td ><label for="txtTen">Tên Sữa</label> </td>
					<td>:</td>
					<td><input type="text" name="txtTen" id="txtTen" ></td>
				</tr>
				<tr>
					<td><label>Hãng sữa</label></td>
					<td>:</td>
					<td>
						<select name="hangsua" id="hangsua">
							<option value="VinaMilk">VinaMilk</option>
							<option value="Nutifood">Nutifood</option>
							<option value="Ducth Lady">Ducth Lady</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><label>Loại sữa</label></td>
					<td>:</td>
					<td>
						<select name="loaisua" id="loaisua">
							<option value="Sữa bột">Sữa bột</option>
							<option value="Sữa đặc">Sữa đặc</option>
							<option value="Sữa tươi">Sữa tươi</option>
							<option value="Sữa không đường">Sữa không đường</option>
							<option value="Sữa có đường">Sữa có đường</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><label for="txtTLuong">Trọng Lượng</label></td>
					<td>:</td>
					<td><input type="text" name="txtTLuong" id="txtTLuong"></td>
				</tr>
				<tr>
					<td><label for="txtTien">Đơn Giá</label></td>
					<td>:</td>
					<td><input type="text" name="txtTien" id="txtTien"></td>
				</tr>
				<tr>
					<td><label for="txtdd">Thành Phần Dinh Dưỡng</label></td>
					<td>:</td>
					<td><input type="textarea" rows="4" cols="50" name="txtdd" id="txtdd">

					</td>
				</tr>
				<tr>
					<td><label for="txtloiich">Lợi Ích</label></td>
					<td>:</td>
					<td><input type="text" name="txtloiich" id="txtloiich"></td>
				</tr>
				<tr>
					<td>Hình ảnh</td>
					<td>:</td>
					<td>
						<input type="file" name="btnImg" id="btnImg" accept="image/png, .jpeg, .jpg, image/gif" >
					</td>
				</tr>
				<tr>
					<th style="padding-top: 20px" colspan="3"><input type="submit" name="btnsub" id="btnsubs" value="Thêm"></th>
				</tr>
				<tr>
					<td colspan="3"><p style="color: red;text-align: center"><?php echo $error; ?></p></td>
				</tr>
				
				
						
			</table>
			
		</form>
		<div id="next" style="margin: auto" <?php if($error != "Thêm thành công !") echo "hidden" ?> >
				
				<table style="margin: auto"> 
					<tr>
						<th colspan="2" style="text-align: center;"><?php echo $ts . " - " .$hs; ?></th>
					</tr>
					<tr>
						<td rowspan="3"><img width="100px" src="img/<?php echo $ha ?>"></td>
					</tr>
					<tr>
						<td >
							<font style="font-style:bold ">Thành phần dinh dưỡng:</font> <br><?php echo $tpdd ?> 
							<br>
							Lợi ích: <br><?php echo $li ?>
							<br>
							Trọng Lượng: <font style="color: red"><?php echo $tl?> gr </font> --  Đơn giá:<font style="color: red"> <?php echo $dg; ?> VNĐ</font> 
						</td>
					</tr>

				</table>
			</div>
		<div style="text-align: center;">
				<button class="btn" style="background-color: #92cbbc;border: groove" onclick="window.location = 'admin.php'">Quay Lại</button>
				<button class="btn" style="background-color: #92cbbc;border: groove" onclick="window.location = 'thongtinSP.php'">Danh sách sản phẩm</button>
		</div>
	</div>
	
</body>
</html>


	</div>
</body>
</html>