<link rel="stylesheet" type="text/css" href="user/thanhtoan/style.css">
<?php
    // kết nối dữ liệu
    $connect = mysqli_connect("localhost", "root", "", "web") or die("không thể kết nối");
    // thiết lập bảng mã
    mysqli_query($connect, "set names 'utf8'");
    // lấy tên đăng nhập
    $user = $_SESSION["user"];
    // câu lệnh truy vấn dữ liệu
    $lenh = "SELECT * FROM member WHERE username = '$user'";
    // thực hiện câu lệnh
    $results = mysqli_query($connect, $lenh) or die("Không thực hiện được");
    $row = mysqli_fetch_array($results);
    $hoten =  $row['fullname'];
    $date=getdate(); 
    $ngay=$date['mday']."/".$date['mon']."/".$date['year'];
?>
<?php
    if(isset($_SESSION['user'])){
            $tenTK=$_SESSION['user'];
            $query="SELECT * FROM giohang WHERE taikhoan='$tenTK'";
            $result=mysqli_query($connect, $query)or die("Không thực hiện được");
            $load=mysqli_fetch_all($result);
            $thanhtien=0;
            foreach($load as $sp){
                $thanhtien +=$sp[6];
            }
        }
    if (isset($_POST['dathang'])) { 
        $ngay1=date('Y-m-d');
        $sodienthoai = $_POST['sdt'];
        $diachi = $_POST['diachi'];
        if ( $sodienthoai == "" || $diachi == ""){ ?>
            <script> 
                var div = document.getElementById('thongbaoloi');
                div.textContent = 'Vui lòng điền đầy đủ thông tin!';
            </script>
            <?php }
                    else {
                        $sql1="INSERT INTO lichsugiaodich(ngayban, taikhoan, tenkhachhang, sodienthoai
                        , diachi, tongtien) VALUES ('$ngay1','$user','$hoten'
                        ,'$sodienthoai','$diachi','$thanhtien')";
                        $query = mysqli_query($connect ,$sql1) or die("Không thực hiện được");{ ?> 
                        <script> 
                           window.location="/Webnuochoa/sauthanhtoan.php";
                        </script> <?php } 
                        $sql2 ="DELETE FROM giohang WHERE taikhoan = '$user' ";
                        $query = mysqli_query($connect ,$sql2) or die("Không thực hiện được");
                    }
                }
?>
<form action="" method="POST" role="form">
    <div class="bocuc">
        <div class="left">
            <div class="tieudiem"> Thông tin khách hàng </div>
            <table class="thongtin">
                <tr class="form-group">
                    <td class="label"> Họ tên </td>
                    <td class="inputlabel"><?php echo $hoten ?> </td>
                </tr>
                <tr class="form-group">
                    <td class="label">Số điện thoại</td>
                    <td class="input"><input  type="text" class="input-thongtin" placeholder="Nhập số điện thoại ..." name="sdt"> </td>
                </tr>
                <tr class="form-group">
                    <td class="label">Địa chỉ</td>
                    <td class="input"><input  type="text" class="input-thongtin" placeholder="Nhập địa chỉ ..." name="diachi"></td>
                </tr>
            </table>
            <div id="thongbaoloi"> Vui lòng điền đầy đủ thông tin! </div> 
        </div>

        <div class="right">
            <div class="thanhtoan"> Chi tiết thanh toán </div>
            <table class="hoadon">
                <tr class="form-group">
                    <td class="label donhang"> Ngày mua </td>
                    <td class="tien">
                        <?php 
                            echo $ngay;
                        ?>
                    </td>
                </tr>
                <tr class="form-group">
                    <td class="label donhang">Phí vận chuyển </td>
                    <td class="tien">
                       0đ
                    </td>
                </tr>
                <tr class="form-group">
                    <td class="label donhang">Tổng cộng </td>
                    <td class="tien">
                    <?php echo $thanhtien ?>
                    </td>
                </tr>
            </table>
            <div id="thongbao"> <i> * Quý khách kiểm tra hàng trước khi đặt hàng! </i> </div>
            <div class="btn">
                <a href="/WebNuocHoa/giohang.php"><p id="quaylai"><< Quay lại</p></a>
                <input id="dathang" type="submit" name="dathang" value="Đặt hàng"></input>
            </div>
        </div>
    </div>
</form>
