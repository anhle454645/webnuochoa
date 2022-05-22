<link rel="stylesheet" type="text/css" href="user/lichsumuahang/style.css">

<?php 
    // kết nối dữ liệu
    $connect = mysqli_connect("localhost", "root", "", "web") or die("không thể kết nối");
    // thiết lập bảng mã
    mysqli_query($connect, "set names 'utf8'");
    // lấy tên đăng nhập
    $user = $_SESSION["user"];
    $lenh = "SELECT * FROM `lichsugiaodich` WHERE `taikhoan` = '$user'";
    $results = mysqli_query($connect, $lenh) or die("Không thực hiện được");
    $soHangDaMua = mysqli_num_rows($results);

?>
<?php if($soHangDaMua == 0){ ?>
    <style>
        .tieude{
            display: flex;
            align-items: center;
            justify-content: center;
            padding:100px 0 100px 0;
        }
        .tieude p{
            font-size: 30px;
            color:coral;
            padding-top: 30px;
            padding-bottom: 30px;
        }
    </style>
    <div class="tieude">
        <p>BẠN CHƯA MUA HÀNG TẠI SHOP!!!</p>
    </div>
<?php } ?>
<?php if ($soHangDaMua !=0 ) { ?>
<div class="lichsuGD">
    <div class="lblsGD">
        <p>LỊCH SỬ GIAO DỊCH</p>
    </div>
    <div class="tblichsu">
    <table class="lichsu">
        <tr class="header"> 
            <th width="150px"> Ngày bán</th>
            <th width="280px"> Tên khách hàng</th>
            <th width="250px"> Sdt nhận hàng </th>
            <th width="250px"> Tổng tiền thanh toán</th>
        </tr>
            <?php while ($row = mysqli_fetch_array($results)) {
                $ngayban = date_create($row['ngayban']);
            ?>
                <tr class="giaodich">
                    <th id="ngayBan"> <p> <?php echo date_format($ngayban, "d - m - Y");?> </p> </th>
                    <th id="tenKH"> <p> <?php echo $row['tenkhachhang']; ?> </p> </th>
                    <th id="soDienThoai"> <div> <?php echo $row['sodienthoai']; ?> </div> </th>
                    <th id="thanhTien"> <p> <?php echo number_format($row['tongtien'],0,",",".");?> VND </p> </th>
                </tr>
            <?php } ?>
    </table>
    </div>
</div>
<?php } ?>

