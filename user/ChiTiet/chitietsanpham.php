<?php
  if(isset($_GET['idsanpham'])){
    $id=$_GET['idsanpham'];
  }
  if(isset($_GET['sex'])){
    $sex=$_GET['sex'];
  }
  if(isset($_SESSION['user'])){
    $tenTK=$_SESSION['user'];
  }
  // chi tiết sản phẩm
  $query = "SELECT * FROM sanpham JOIN loaisanpham ON sanpham.loaisanpham = loaisanpham.idLoaiSP WHERE idSP= $id ";
  $result = mysqli_query($connect, $query)or die("Không thực hiện được");
  $loadSP = mysqli_fetch_all($result);
  if(isset($_GET['lienquan'])){
    $lienquan=$_GET['lienquan'];
  }
  // Liên quan
  $query = "SELECT * FROM sanpham JOIN loaisanpham ON sanpham.loaisanpham = loaisanpham.idLoaiSP WHERE DonGia= $lienquan ";
  $result = mysqli_query($connect, $query)or die("Không thực hiện được");
  $loadSPlq = mysqli_fetch_all($result);
  // Loại sản phẩm
  $query = "SELECT * FROM loaisanpham ";
  $result = mysqli_query($connect, $query)or die("Không thực hiện được");
  $loadloaiSP = mysqli_fetch_all($result);
  // Load sản phẩm 
  $query = "SELECT * FROM sanpham JOIN loaisanpham ON sanpham.loaisanpham = loaisanpham.idLoaiSP WHERE idSP= $id ";
  $result = mysqli_query($connect, $query)or die("Không thực hiện được");
  $row = mysqli_fetch_array($result);
  $tenSanPham = $row['tenSP'];
  $idsanpham=$row['idSP'];
  $moTa = $row['mota'];
  $tenloaiSP=$row['tenLoaiSP'];
  $soluongban=$row['soluongdaban'];
  $soluong=$row['soluongcon'];
  $xuatxu=$row['quocgia'];
  $ngaysanxuat=$row['ngaySX'];
  $thuonghieu=$row['tenLoaiSP'];
  $trangthai='';
  if((int)$row['soluongcon']!=0){
  $trangthai .= "<p>Trạng thái: Còn hàng</p>";
  } 
  else{
  $trangthai .= "<p>Trạng thái: <a style='color:red;font-weight:bold;'>Hết hàng</a></p>";
  }
  $dongia = number_format($row['DonGia'], 0, '', '.');
  $giamgia1 = $row['DonGia'] - $row['DonGia'] * ($row['giamgia'] / 100);
  $giamgia = number_format($giamgia1, 0, '', '.');
  $today=date('Y-m-d');
  // thêm sản phẩm vào giỏ hàng
  if(isset($_POST['them'])){
    if(isset($_SESSION['user'])){
      $soluongdat=$_POST['soluong'];
      $query = "SELECT * FROM giohang WHERE taikhoan='$tenTK' AND tensanpham='$tenSanPham' ";
      $result=mysqli_query($connect, $query)or die("Không thực hiện được");
      $row = mysqli_fetch_array($result);
      $soluongcu=$row['soluong'];
      if($soluongcu!=0){
      $soluongmoi=$soluongcu+$soluongdat;
      $tongtien=$giamgia1*$soluongmoi;
      $query="UPDATE giohang SET  dongia = $giamgia1, soluong=$soluongmoi, tongtien=$tongtien, ngaychon = '$today' WHERE taikhoan='$tenTK' AND tensanpham='$tenSanPham' AND idsanpham='$idsanpham';";
      mysqli_query($connect, $query)or die("Không thực hiện được");
      echo '<script type="text/javascript">window.location.replace("giohang.php")</script>';
      }
      else{
      $tongtien=$giamgia1*$soluongdat;
      $query="INSERT INTO giohang (taikhoan,idsanpham, tensanpham, mota, dongia, soluong, tongtien, ngaychon)
            VALUES ('$tenTK',$idsanpham, '$tenSanPham',  '$moTa', $giamgia1, $soluongdat, $tongtien, '$today');";
      mysqli_query($connect, $query)or die("Không thực hiện được");
      echo '<script type="text/javascript">window.location.replace("giohang.php")</script>';
      }
    }
    else{
      echo "
                <script>
                    alert('Bạn chưa đăng nhập');
                    document.location = '/WebNuocHoa/user/dangnhap/dangnhap.php';
                </script> 
            ";
    }
  }
?>
  
  <link rel="stylesheet" type="text/css" href="/WebNuocHoa/user/ChiTiet/style.css">
	<link rel="stylesheet" type="text/css" href="/WebNuocHoa/user/ChiTiet/bootstrap.css">
    <link href="css/style.css" rel="stylesheet" type="text/css">

      <div class="container_fullwidth">
        <div class="container">
          <div class="row">
            <div class="col-md-9">
              <div class="products-details">
                <div class="preview_image">
                  <?php
                    echo "<img src='images/products/{$thuonghieu}/{$tenSanPham}.jpg'>"
                  ?>
                </div>
				    <div class="products-description">
              <?php
                echo"
                  <h3 class='name'><b>$tenSanPham</b></h3>
                  <br>
                  <p>Thương hiệu : $xuatxu</p>
                  {$trangthai}
				          <p>Số lượng bán: $soluongban </p>
				          <p>Xuất xứ: $xuatxu</p>
				          <p>Ngày sản xuất: $ngaysanxuat</p>
				          <p>Mô tả: $moTa</p>
                  <hr>
                  <div class='price'>
                  Giá : 
                  <span class='new_price'>$giamgia<sup>VNĐ</sup></span>
                  <span class='old_price'>$dongia<sup>VNĐ</sup></span>
                  </div>";
              ?>
                  <hr>
                  <form action="" method="POST" style="background-color: white;">
                  <div class="qty">Số lượng:</div>
                  <input name="soluong" class="soluongdat" type="number" min=1 max=<?php echo $soluong ;?> value="1">
                  <div class="button_group">
                  <button class="button-add" name="them" type="submit"  >Thêm vào giỏ hàng</button>
                  </div>
                  </div></form>
            </div>
              <div class="tab-box">
				<h1 class="title"><strong>Đánh Giá</strong></h1>
                <div class="tab-content-wrap">
                  <div class="tab-content" id="Reviews">
                    <form style="background-color: white;">
                      <table>
                          <tr>
                            <th>&nbsp;</th>
                            <th>1 Sao</th>
                            <th>2 Sao</th>
                            <th>3 Sao</th>
                            <th>4 Sao</th>
                            <th>5 Sao</th>
							<th>&nbsp;</th>
                          </tr>
                        <body>
                          <tr>
                            <td>
                              Chất lượng
                            </td>
                            <td>
                              <input type="radio" value="">
                            </td>
                            <td>
                              <input type="radio" value="">
                            </td>
                            <td>
                              <input type="radio" value="">
                            </td>
                            <td>
                              <input type="radio" value="">
                            </td>
                            <td>
                              <input type="radio" value="">
                            </td>
							<td>
							<button class="button-send" type="button">Gửi tin nhắn</button>
							</td>
                          </tr>
                        </body>
                      </table>
                    </form>
                  </div>
                </div>
              </div>
              <div class="hot-products">
                <h1 class="title">
                  <strong>Sản Phẩm Liên Quan</strong>
                </h1>
                <ul id="hot">
                  <li>
                    <div class="row">
                      <?php
                      foreach($loadSPlq as $sp){
                      $dongia = number_format($sp[5], 0, '', '.');
                      echo "<div class='col-md-4 col-sm-4'>
                        <div class='products'>
                         <div class='thumbnail'><img src='images/products/$sp[13]/$sp[1].jpg' alt='Product Name'></div>
                         <div class='productname'>$sp[1]</div>
                         <h2 class='price'>$dongia VNĐ</h2>
                         <div class='button_group'>
                          <div class='product-tag'>
                           <ul><li><a href='chitiet.php?idsanpham={$sp[0]}&lienquan={$sp[5]}&sex={$sex}'>Xem sản phẩm</a></li></ul>
                          </div>
                         </div>
                        </div>
                      </div>";}
                      ?>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-3">
              <div class="Customer-benefits leftbar">
                <div class="Customer-benefits-item">
                  <div class="product-image">
				   <li>
				    <a>
                     <img width="50px" height="50px" src="images/products/icon/products-01.png">
					</a>
				   </li>
                  </div>
                  <div class="product-info">
                   <p>Cam kết hàng chính hãng 100% hoàn tiền 200% nếu phát hiện hàng giả</p>
                  </div>
                </div>
                <div class="Customer-benefits-item">
                 <div class="product-image">
			      <a>
                      <img width="50px" height="50px" src="images/products/icon/products-02.png">
				  </a>
                 </div>
                  <div class="product-info">
                    <p>Bảo hành đến giọt cuối cùng.Đổi trả trong 30 ngày</p>
                  </div>
                </div>
                <div class="Customer-benefits-item">
                  <div class="product-image">
					<a>
                      <img width="50px" height="50px" src="images/products/icon/products-03.png">
					</a>
                  </div>
                  <div class="product-info">
                    <p>Giao hàng 24h</p>
                  </div>
                </div>
				<div class="Customer-benefits-item">
                  <div class="product-image">
					<a>
                      <img width="50px" height="50px" src="images/products/icon/products-04.png">
					</a>
                  </div>
                  <div class="product-info">
                    <p>Miễn phí ship nội thành HĐ từ 500K</p>
                  </div>
                </div>
				<div class="Customer-benefits-item">
                  <div class="product-image">
					<a>
                      <img width="50px" height="50px" src="images/products/icon/products-05.png">
					</a>
                  </div>
                  <div class="product-info">
                    <p>Miễn phí gói quà</p>
                  </div>
                </div>
              </div>
              <div class="product-tag leftbar">
                <h1 class="title">
                  <strong>
                    Nước hoa <?php 
                              if($sex == 1){
                                echo "Nam";
                              }else if($sex == 0){
                                echo "Nữ";
                              }
                    ?>
                  </strong>
                </h1>
                <ul>
                  <?php
                  foreach($loadloaiSP as $loaiSP){
                  echo "<li><a href='/WebNuocHoa/nuochoa.php?idLoai=$loaiSP[1]'>{$loaiSP[1]}</a></li>";}
                  ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
</html>