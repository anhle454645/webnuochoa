<?php
	// kết nối
	$connect = mysqli_connect("localhost", "root", "", "web") or die("không thể kết nối");
	// thiết lập bảng mã
	mysqli_query($connect, "set names 'utf8'");
    $query = "SELECT * FROM loaisanpham";
	$result = mysqli_query($connect, $query)or die("Không thực hiện được");
    $dataLoaiSP = mysqli_fetch_all($result);
		
	// Load Sản Phẩm
	$idLoai = 0;
	$page = 0;
	$tongSoTrang;
	$sex = 1;
	$hrefSex = "?sex=" . $sex;
	if(isset($_GET['idLoai'])){
		$idLoai = $_GET['idLoai'];
	}
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}
	if(isset($_GET['sex'])){
		$sex = $_GET['sex'];
		$hrefSex = "?sex=" . $sex;
	}

	if($idLoai == 0){
		$query = "SELECT * FROM sanpham WHERE sex = {$sex}";
	}
	else{
		$query = "SELECT * FROM sanpham WHERE loaisanpham = {$idLoai} AND sex = {$sex}";
	}

	$result = mysqli_query($connect, $query)or die("Không thực hiện được");
	$dsSanPham = mysqli_fetch_all($result);
	$tongSoTrang = (int)(count($dsSanPham) / 15);
	if(count($dsSanPham) - ($tongSoTrang * 15) > 0){
		$tongSoTrang ++;
	}
	$offset = 15 * $page;


	if($idLoai == 0){
		$query = "SELECT * FROM sanpham JOIN loaisanpham ON sanpham.loaisanpham = loaisanpham.idLoaiSP WHERE sex = {$sex} LIMIT 15 OFFSET {$offset}";
	}
	else{
		$query = "SELECT * FROM sanpham JOIN loaisanpham ON sanpham.loaisanpham = loaisanpham.idLoaiSP WHERE loaisanpham = {$idLoai} AND sex = {$sex} LIMIT 15 OFFSET {$offset}";
	}
	$result = mysqli_query($connect, $query)or die("Không thực hiện được");
	$dsSanPham =  mysqli_fetch_all($result);

	//-----Phân trang-----
	$nextPage;
	$afterPage;
	if($page == $tongSoTrang - 1){
		$nextPage = 0;
	}
	else{
		$nextPage = $page + 1;
	}
	if($page == 0){
		$afterPage = $tongSoTrang - 1;
	}
	else{
		$afterPage = $page - 1;
	}

	//
	if(isset($_GET['sapxep'])){
		if($_GET['sapxep'] == 0){
			for($i = 0; $i < count($dsSanPham) - 1; $i++){
				$priceProductM = $dsSanPham[$i][5] - $dsSanPham[$i][5] * ($dsSanPham[$i][8] / 100);
				for($j = $i + 1; $j < count($dsSanPham); $j++){
					$priceProduct = $dsSanPham[$j][5] - $dsSanPham[$j][5] * ($dsSanPham[$j][8] / 100);
					if($priceProduct < $priceProductM){
						$productTmp = $dsSanPham[$i];
						$dsSanPham[$i] = $dsSanPham[$j];
						$dsSanPham[$j] = $productTmp;
						$priceProductM = $priceProduct;
					}
				}
			}
		}
		if($_GET['sapxep'] == 1){
			for($i = 0; $i < count($dsSanPham) - 1; $i++){
				$priceProductM = $dsSanPham[$i][5] - $dsSanPham[$i][5] * ($dsSanPham[$i][8] / 100);
				for($j = $i + 1; $j < count($dsSanPham); $j++){
					$priceProduct = $dsSanPham[$j][5] - $dsSanPham[$j][5] * ($dsSanPham[$j][8] / 100);
					if($priceProduct > $priceProductM){
						$productTmp = $dsSanPham[$i];
						$dsSanPham[$i] = $dsSanPham[$j];
						$dsSanPham[$j] = $productTmp;
						$priceProductM = $priceProduct;
					}
				}
			}
		}
	}
?>

<link rel="stylesheet" type="text/css" href="/WebNuocHoa/user/NuocHoa/style.css">
        <div class="app__container">
			<div class="grid wide">
				<div class="row sm-gutter app__content">
					<div class="col l-2 m-0 c-0">
                        <nav class="category">
							<h3 class="category__heading">
								<i class="fas fa-list-ul category__heading-icon"></i>Thương hiệu</h3>
							<ul class="category-list">
								<?php
									foreach($dataLoaiSP as $loaiSP){
										$idLoai = '&idLoai=' . $loaiSP[0];
										$href = $_SERVER['PHP_SELF'] . $hrefSex . $idLoai;
										echo "
											<li class='category-item catgory-item--active'>
												<a href='{$href}' class='category-item__link'>{$loaiSP[1]}</a>
											</li>
										";
									}
								?>							
							</ul>
						</nav>
					</div> 
                    <div class="col l-10 m-12 c-12">
						<div class="home-filter hide-on-mobile-tablet">
							<span class="home-filter__label">
								Sắp xếp theo
							</span>
							<div class="select-input">
								<span class="select-input__label titlePrice">
									<?php
										if(isset($_GET['sapxep'])){
											if($_GET['sapxep'] == 0){
												echo 'Giá: Thấp đến cao';
											}
											else{
												echo 'Giá: Cao đến thấp';
											}
										}
										else{
											echo 'Giá';
										}
									?>
								</span>
								<i class="fas fa-chevron-down select-input__icon"></i>
								<ul class="select-input__list">
									<li class="select-input__item">
										<a href="" class="select-input__link lowToHigh">Giá: Thấp đến cao</a>
									</li>
									<li class="select-input__item">
										<a href="" class="select-input__link highToLow">Giá: Cao đến thấp</a>
									</li>

								</ul>
							</div>
						</div>

                        <div class="home-product">
							<div class="row sm-gutter">
								<?php
									require_once('database.php');
									foreach($dsSanPham as $sanpham){
										$href = layDuongDanAnh($sanpham[13], $sanpham[1]);
										$img = "url(\" {$href} \")";
										$dongia = number_format($sanpham[5], 0, '', '.');
										$giamgia = $sanpham[5] - $sanpham[5] * ($sanpham[8] / 100);
										$giamgia = number_format($giamgia, 0, '', '.');
										$rating = $sanpham[6];
										$ratingView = '';										

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
										}
										$view = "
											<div class='col l-2-4 m-4 c-6'>
												<a class='home-product-item' href='chitiet.php?idsanpham={$sanpham[0]}&lienquan={$sanpham[5]}&sex={$sex}'>
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
														<span class='home-product-item__brand'>{$sanpham[12]}</span>
														<span class='home-product-item__origin-name'>{$sanpham[7]}</span>
													</div>
													<div class='home-product-item__favourite'>
														<i class='fas fa-check'></i>
														<span>Yêu thích</span>
													</div>
													<div class='home-product-item__sale-off'>
														<span class='home-product-item__sale-off-percent'>{$sanpham[8]}%</span>
														<span class='home-product-item__sale-off-label'>GIẢM</span>
													</div>
												</a>
											</div>
										";
										echo $view;
									}
								?>
							</div>
						</div>
						<ul class="pagination home-product__pagination">
							<li class='pagination-item'>
								<a href='<?php echo "{$_SERVER['PHP_SELF']}?page={$afterPage}"; ?>' class='pagination-item__link'>
									<i class='pagination-item__icon fas fa-angle-left'></i>
								</a>
							</li>
							<?php
								for($i = 0; $i < $tongSoTrang; $i++){
									$j = $i + 1;
									if($i == $page){
										echo "
											<li class='pagination-item pagination-item--active'>
												<a href='{$_SERVER['PHP_SELF']}?page={$i}' class='pagination-item__link'>{$j}</a>
											</li>
										";
									}
									else{
										echo "
											<li class='pagination-item'>
												<a href='{$_SERVER['PHP_SELF']}?page={$i}' class='pagination-item__link'>{$j}</a>
											</li>
										";
									}
									
								}
								// pagination-item--active
							?>
							<li class="pagination-item">
								<a href='<?php echo "{$_SERVER['PHP_SELF']}?page={$nextPage}"; ?>' class="pagination-item__link">
									<i class="pagination-item__icon fas fa-angle-right"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<script>
			const btnLowToHighElement = document.querySelector('.lowToHigh');
			const btnHightToLowElement = document.querySelector('.highToLow');
			if(window.location.href.includes('sapxep')){
				let href = window.location.href.split('&');
				href.splice(href.length - 1, 1);
				href = href.join('&');
				btnLowToHighElement.href = href + "&sapxep=0";
				btnHightToLowElement.href = href + "&sapxep=1";
			}
			else{
				btnLowToHighElement.href = window.location.href + "&sapxep=0";
				btnHightToLowElement.href = window.location.href + "&sapxep=1";
			}
		</script>