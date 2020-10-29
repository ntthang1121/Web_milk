<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>Trang Chủ</title>
	<link rel="stylesheet" type="text/css" href="styletrangchu.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<div class="header">
		<div id="header-item">
		 	<img id="logo1" src="img/logo.png">
		 	<h3 class="text-header">HMT-MILK <br>
		 		<font style="font-size: 30px">Vươn Tầm Thế Giới</font>
		 	</h3>
		 	<img id="logo2" src="img/logo2.gif">
		</div>
	</div>

	<div class="navbar" id="navbar_main">

	  		<div class="navbar-item">

		  		<div class="dropdown">

				    <button class="dropbtn">Hãng Sữa 
				      <i class="fa fa-caret-down"></i>
				    </button>
				    <div class="dropdown-content">
				    <?php 
		  				$conn = mysqli_connect("localhost","root","","db_milk") or die ("Ket noi that bai");
		  				$sql_TenHS = "select thongtinhangsua.tenhs from thongtinhangsua";
						$rs = mysqli_query($conn, $sql_TenHS);	
						while($row = mysqli_fetch_assoc($rs))
						 {
							?>	
								<a href="#" ><?php echo $row["tenhs"];  ?></a>
						<?php
							} 
						?>
					</div>
	  			</div>
	  			
		    	<div class="dropdown">
				    <button class="dropbtn">Loại Sữa 
				      <i class="fa fa-caret-down"></i>
				    </button>
				    <div class="dropdown-content">
				       <?php 
		  				$sql_TenHS ="select DISTINCT thongtin.loaisua from thongtin";
						$rs = mysqli_query($conn, $sql_TenHS);	
						while($row = mysqli_fetch_assoc($rs))
						 {
							?>	
								<a href="#" ><?php echo $row["loaisua"];  ?></a>
						<?php
							} 
						?>
				    </div>
				 </div> 
		    	<div class="dropdown">
				    <button class="dropbtn">Giá Thành 
				      <i class="fa fa-caret-down"></i>
				    </button>
				    <div class="dropdown-content">
				       <?php 
		  				$sql_TenHS ="select DISTINCT thongtin.dongia from thongtin order by dongia ";
						$rs = mysqli_query($conn, $sql_TenHS);	
						while($row = mysqli_fetch_assoc($rs))
						 {
							?>	
								<a href="#" ><?php echo $row["dongia"];  ?></a>
						<?php
							} 
						?>
				    </div>
				</div>

				<div class="dropdown">
					<button class="dropbtn" <?php 
						if(!isset($_SESSION["user"])){
							echo "onclick=\"location.href = 'login.php';\"";
						}
						else{
							echo "onclick=\"location.href = 'admin.php';\"";
						}
					 ?> 
					>Admin</button>
				</div>
				<form method="post" style="float: right;padding-top: 5px;padding-right: 50px;">
			      	<input type="text" placeholder="Tìm Kiếm.." name="search" id="search">
			      	<input type="submit" name="btnsub" id="btnsub" value="Search">
			    </form>

		    </div>
	</div>

	<div class="content">
		<div style="position: fixed;padding: 0px;margin: 0px;">
			<table>
				<tr>
					<td>
						<img id="messenger" onclick="window.location = 'https://www.messenger.com/'" src="img/mess.png" width="50px">
					</td>
					<td><p style="font-size: 13px;font-family: none">Chăm sóc khách hàng</p></td>
				</tr>
			</table>
			
		</div>
	  	<div class="slide-content">
		  <img class="mySlides" src="img/ensure.jpg">
		  <img class="mySlides" src="img/vinamillk.jpg">
		  <img class="mySlides" src="img/th truemilk.jpg">
		</div>
	</div>

	<!-- vòng lặp hãng sữa... -->
	<?php
		$sql_HS = "select * from thongtinhangsua";
		$rs = mysqli_query($conn, $sql_HS);	
		$u = 0;
		while($row_HS = mysqli_fetch_assoc($rs))
		{
	?>
	<div class="content-hangSua">
		<!-- tên hãng sữa -->
		<div style="text-align: center;height: 50px;line-height: 50px" class="tenhangsua">
			<h3><?php echo $row_HS["tenhs"] ?></h3>
		</div>
		<?php
			$u++;
			$sql_SP = "select * from thongtin where hangsua = '".$row_HS["tenhs"]."'";
			$result = mysqli_query($conn, $sql_SP);		
			while($row = mysqli_fetch_assoc($result))
			{
		?>
		<div style="width: 56%;margin:auto;" class="thongtinsua<?php echo $u ?> ">
			<table style="border: 1px solid yellow;border-radius: 10px;box-shadow: 15px 15px 45px #80000663;width: 100%;height: 300px;">
				<tr>
					<td rowspan="2" style="height: 300px; width: 300px">
						<img style="width: 70%;" class="mySlide" src="img/<?php echo $row['hinhanh']; ?>">
					</td>
				</tr>
				<tr>
					<td>
						<h3 class="text-sanPham"><?php echo $row["tensua"]; ?></h3>
						<p class="text-sanPham-item"><?php echo $row["hangsua"]; ?></p>
						<p class="text-sanPham-item"><?php echo $row["loaisua"]. " - " .$row["trongluong"]. " - ".$row["dongia"]; ?></p>
						
					</td>
					<td style="font-size: 14px">
						<button style="margin-top: 277px;" onclick="window.location='chitiet.php?ma=<?php echo $row["masua"]; ?>'">xem chi tiết</button>
					</td>
				</tr>
			
			</table>
		
	
		</div>
		
			<?php
				} 

			?>
		<script>
			var slideIndex<?php echo $u ?> = 1;
			showDivs<?php echo $u ?>(slideIndex<?php echo $u ?>);

			function plusDivs<?php echo $u ?>(n) {
			  showDivs<?php echo $u ?>(slideIndex<?php echo $u ?> += n);
			}

			function showDivs<?php echo $u ?>(n) {
			  var i;
			  var x = document.getElementsByClassName("thongtinsua<?php echo $u ?>");
			  if (n > x.length) {slideIndex<?php echo $u ?> = 1}
			  if (n < 1) {slideIndex<?php echo $u ?> = x.length}
			  for (i = 0; i < x.length; i++) {
			    x[i].style.display = "none";  
			  }
			  x[slideIndex<?php echo $u ?>-1].style.display = "block";  
			}


		</script>
		<div class="move">
			<button class="btnPre" onclick="plusDivs<?php echo $u ?>(-1)">&#10094;</button>
			<button class="btnNext" onclick="plusDivs<?php echo $u ?>(1)">&#10095;</button>
		</div>
	
		
	</div>
	<?php
			} 
		?>


	<div class="footer">
		<div>
			<img src="img/dienthoai.png"> <a style="text-decoration: blink;" href="#">Điện thoại: 123456790</a>
		</div>
		<div>
			<img src="img/dinhvi.png"> <a style="text-decoration: blink;" href="#">Địa chỉ: https://www.google.com/maps/</a>
		</div>
		<div>
			<img src="img/face.png"><a style="text-decoration: blink;" href="#">Facebook: https://www.facebook.com/</a>
		</div>
	</div>


	<script>
			var myIndex = 0;
			carousel();

			function carousel() {
			  var i;
			  var x = document.getElementsByClassName("mySlides");
			  for (i = 0; i < x.length; i++) {
			    x[i].style.display = "none";  
			  }
			  myIndex++;
			  if (myIndex > x.length) {myIndex = 1}    
			  x[myIndex-1].style.display = "block";  
			  setTimeout(carousel, 3000); // Change image every 2 seconds
		}
		</script>
	
	<script>
		window.onscroll = function() {myFunction()};

		var navbar = document.getElementById("navbar_main");
		var sticky = navbar.offsetTop;

		function myFunction() {
	  		if (window.pageYOffset >= sticky) {
	    		navbar.classList.add("sticky");
	  		} else {
	    		navbar.classList.remove("sticky");
	  		}
		}
	</script>
</body>
</html>