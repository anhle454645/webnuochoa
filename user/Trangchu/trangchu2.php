<link rel="stylesheet" type="text/css" href="user/TrangChu/style.css">
<?php
    // kết nối
	$connect = mysqli_connect("localhost", "root", "", "web") or die("không thể kết nối");
	// thiết lập bảng mã
	mysqli_query($connect, "set names 'utf8'");
        $page=0;
	$query = "SELECT * FROM sanpham ";
	$result = mysqli_query($connect, $query)or die("Không thực hiện được");
	$dsSanPham = mysqli_fetch_all($result);
        $tongSoTrang = (int)(count($dsSanPham) / 4);
	if(count($dsSanPham) - ($tongSoTrang * 4) > 0){
		$tongSoTrang ++;
	}

	$offset = 4 * $page;
	$query = "SELECT * FROM sanpham JOIN loaisanpham ON sanpham.loaisanpham = loaisanpham.idLoaiSP WHERE soluongdaban > 40 LIMIT 4 OFFSET {$offset}";
	$result = mysqli_query($connect, $query)or die("Không thực hiện được");
	$dsSanPham =  mysqli_fetch_all($result);
?>
<div class="sanphambanchay">
        <div class="le"><br></div>
        <div class="than1">
            <marquee class="noidung" behavior="Alternate" direction="right">
                SẢN PHẨM BÁN CHẠY
            </marquee>
                <div class="product">
                	<?php
					require_once('database.php');
					foreach($dsSanPham as $sanpham){
					//$href = layDuongDanAnh($sanpham[13], $sanpham[1]);
					$img = "url(\" {$href} \")";
					$dongia = number_format($sanpham[5], 0, '', '.');
					$giamgia = $sanpham[5] - $sanpham[5] * ($sanpham[8] / 100);
					$giamgia = number_format($giamgia, 0, '', '.');
					$rating = $sanpham[6];
					$ratingView = '';
					$sale=$sanpham[8];										
					$saleView = '';	

					for($i = 0; $i < 5; $i++){
				        if($rating){
							$ratingView .= "
								<i class='fas fa-star home-product-item__star--gold'></i>
							";
							$rating--;
						}
						else{
							$ratingView .= "
								<i class='fas fa-star home-product-item__star--off'></i>
							";
						}
						if($sale > 0){
							$saleView .= "<div class='home-product-item__sale-off'>
											<span class='home-product-item__sale-off-percent'>{$sanpham[8]}%</span>
											<span class='home-product-item__sale-off-label'>GIẢM</span>
											</div>";
						}else{
							$saleView;
						}			
					}
					$view = "
                        <div class='box'>
			        <a class='home-product-item' href='chitiet.php?idsanpham={$sanpham[0]}&lienquan={$sanpham[5]}&sex={$sanpham[12]}'>
		                <div class='home-product-item-img' style='background-image: {$img};'>
			        </div>
			        <h4 class='home-product-item-name'>{$sanpham[1]}</h4>
					<div class='home-product-item__price'>
					<span class='home-product-item__price-old'>{$dongia}đ</span>
					<span class='home-product-item__price-current'>{$giamgia}đ</span>
					</div>
					<div class='home-product-item__action'>
					<span class='home-product-item__like home-product-item__like--liked'>
					        <i class='far fa-heart home-product-item-icon-like-empty'></i>
					        <i class='fas fa-heart home-product-item-icon home-product-item-icon-like-fill'></i>
					</span>
					<div class='home-product-item__rating'>
						{$ratingView}
					</div>
					<span class='home-product-item__sold'>{$sanpham[3]} đã bán</span>
					</div>
					<div class='home-product-item__origin'>
					<span class='home-product-item__origin-name'>{$sanpham[7]}</span>
					</div>
					{$saleView};
			        </a>
                             </div>   ";
                                echo $view;
                    }
                        ?>
                </div>
        </div>
        <div class="le"><br></div>
</div>