<link rel="stylesheet" type="text/css" href="user_inc/style.css">

<header>
    <div class="head1">
        <div class="head-address">
            <div class="le"><br></div>
            <div class="address">
                <div class="icon">
                    <i class="fa fa-map-marker-alt"
                    style="color: white; font-size: 25px;"></i>
                </div>
                <div style="color: white; font-size: 20;padding-left: 10px;padding-top: 3px;">111 Hùng Vương</div>
            </div>
            <div class="contact">
                <div class="icon">
                    <i class="fas fa-phone-alt "
                    style="color: white; font-size: 25px;"></i>
                </div>
                <a href="trangchu.php" style="color: white; font-size: 20;padding-left: 10px;padding-top: 3px;cursor: pointer;">0966454645</a>
            </div>
            <div class="ic-icon">
                <a href=""><i class="fab fa-facebook"
                style="color: white; font-size: 25px;cursor: pointer;"></i></a>
                <i class="fab fa-facebook-messenger"
                style="color: white; font-size: 25px;cursor: pointer;"></i>
                <i class="fab fa-instagram"
                style="color: white; font-size: 25px;cursor: pointer;"></i>
            </div>
            <div class="le"><br></div>
        </div>
        <div class="head-logo">
            <div class="le"><br></div>
            <div class="logo">
                <img src="images/anhthien.png" alt="trangchu.php" >
            </div>
            <div class="search">
                <input id="timkiem" type="text" class="search-text" placeholder="Tìm kiếm ...">   
                <button class="search-btn" type="submit" onclick="timkiem(this)">
                    <i class="fas fa-search"> </i>
                </button>
            </div>
            <?php
            session_start();
            $thoat = !empty($_GET['yeucau'])?$_GET['yeucau']:"";    
            if($thoat=="Đăng nhập"){
                unset($_SESSION['user']);
                unset($_SESSION['ten']);
                echo '<script type="text/javascript">window.location.replace("trangchu.php")</script>';
            }
            if(!isset($_SESSION['user'])){ ?>
            <div class="dangnhap-giohang">
                <div class="fa fa-user login" style="color: white; font-size: 30px;">
                <ul class="user1">
                        <li class="user11"> <a href="user/dangnhap/dangnhap.php"> Đăng nhập </a></li>
                        <li class="user12"> <a href="user/dangky/dangky.php"> Đăng ký </a></li>
                </ul>
                </div>
            <?php } else {?>
                <?php 
                    $taiKhoan = $_SESSION['ten'];
                    $tentaikhoan=$_SESSION['user'];
                    // lấy số lượng sp người ấy đặt trong giỏ hàng
                    $sql ="SELECT * FROM `giohang` WHERE `taikhoan` = '$tentaikhoan' ";
                    $query = mysqli_query($connect ,$sql) or die("Không thực hiện được");
                    $soLuong = mysqli_num_rows($query);
                ?>
                <div class="user2">
                    <div class="user21"> 
                        <p style="color: White; font-size:20px;">Chào <?php echo $taiKhoan ?> </p> 
                        <ul>
                            <li class="u1"> <a href="thongtin.php"> Cập nhật thông tin </a></li>
                            <li class="u2"> <a href="lichsumuahang.php"> Lịch sử mua hàng </a></li>
                            <li class="u2"> <a href="?yeucau=Đăng nhập"> Thoát </a></li>
                        </ul>
                    </div>
                    <div class="user22">
                        <a class="fa fa-shopping-bag" href="giohang.php"></a>
                        <div id="soLuongSP"> <?php echo $soLuong; ?> </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="le"><br></div>
        </div>
    </div>   
    <!--tạo mục menu-->
    <div class="head2" id="myHeader">
        <nav id="mucluc">
            <ul class="menu">
                <li> <a href="trangchu.php"> TRANG CHỦ </a> </li>
                <li> <a href="gioithieu.php"> GIỚI THIỆU </a></li> 
                <li> <a href="nuochoa.php?sex=1"> NƯỚC HOA NAM </a> </li>
                <li> <a href="nuochoa.php?sex=0"> NƯỚC HOA NỮ </a></li> 
                <li> <a href="lienhe.php"> LIÊN HỆ </a></li>  
            </ul>
        </nav>
    </div>
</header>

<script>
    function timkiem(x) {
        $timkiem = $("#timkiem").val();
        if($timkiem == "")
            alert("Chưa nhập thông tin! "); 
        else 
            window.location.replace("user_danhmuc.php?timkiem=" +$timkiem);
    };

    window.onscroll = function() {myFunction()};
    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;    
    function myFunction() {
    if (window.pageYOffset > sticky) 
        header.classList.add("sticky");
    else 
        header.classList.remove("sticky");
    }
</script>