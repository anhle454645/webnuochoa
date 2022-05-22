<?php
    if (isset($_GET['xoaMa']))
        include("user/giohang/xoasanpham.php");
    else if(isset($_GET['maSanPham'])){
        include("user/giohang/themsanpham.php");
    }
    if(isset($_SESSION['user'])){
        $tenTK=$_SESSION['user'];
        $query="SELECT * FROM giohang WHERE taikhoan='$tenTK'";
        $result=mysqli_query($connect, $query)or die("Không thực hiện được");
        $load=mysqli_fetch_all($result);
        $thanhtien=0;
        foreach($load as $sp){
            $thanhtien +=$sp[6];
        }
    }else if(isset($_SESSION['admin'])){
        echo '<script type="text/javascript">window.location.replace("./admin/admin.php")</script>';
    }else{
        echo '<script type="text/javascript">window.location.replace("user/dangnhap/dangnhap.php")</script>';
    }
?>

<link rel="stylesheet" type="text/css" href="">
<style>
    .tieude{
        display: flex;
        align-items: center;
        justify-content: center;
        padding-top:50px;
    }
    .tieude p{
        font-size: 25px;
        font-weight: bold;
        padding-top: 25px;
        padding-bottom: 20px;
    }
    .gh{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .sanpham{
       
    }
    .mucluc{
        
    }
    .mucluc th{
        padding-top: 10px;
        padding-bottom: 10px;
        background:palegoldenrod;
    }
    #donhang{
        
    }
    #donhang td{
        padding: 20px 20px 20px 20px;
        font-size: 20px;
    }
    #tensanpham{

    }
    #mota{}
    #dongia{
    }
    #soluong input{
        height: 30px;
        width: 60px;
        font-size: 20px;
        padding-left: 10px;
        border-radius: 10px;
    }
    #thanhttien{}
    #donhang-xoa{
        height: 40px;
        width: 80px;
        font-size: 20px;
        font-weight: bold;
        border-radius: 10px;
        border: none;
        background:burlywood;
    }
    #donhang-xoa:hover{
        color:red;
    }
    .footer{
        background:blanchedalmond;
    }
    .tongtien{
        font-size: 20px;
        padding-top: 10px;
        padding-bottom: 10px;
        background:blanchedalmond;
    }
    .thanhtoan{
        display: flex;
        align-items: center;
        justify-content: center;
        padding-bottom:100px;
        padding-top: 20px;
    }
    .thanhtoan a{
        font-size: 20px;
        color: black;
        font-weight: bold;
        padding: 10px 8px 10px 8px;
        border-radius: 10px;
        background:rgb(167, 173, 255);
        border: none;
    }
    .thanhtoan a:hover{
        color:deeppink;
    }
</style>
<div class="tieude">
    <p>GIỎ HÀNG CỦA BẠN</p>
</div>
<div class="gh">
    <table class="sanpham" border="1">
        <tr class="mucluc"> 
            <th width="100px"> MÃ SẢN PHẨM </th>
            <th width="300px"> SẢN PHẨM </th>
            <th width="400px"> MÔ TẢ </th>
            <th width="200px"> ĐƠN GIÁ </th>
            <th width="150px"> SỐ LƯỢNG </th>
            <th width="200px"> THÀNH TIỀN </th>
            <th width="200px"> TÙY CHỌN </th>
        </tr>
            <?php
                
                    foreach($load as $loadds){
                        $gia=$loadds[6]/$loadds[5];
                        $dongia=number_format($gia, 0, '', '.');
                        $tongtien=number_format($loadds[6], 0, '', '.');
                        echo"
                    <tr id='donhang'>
                        <td id='masanpham'> <p> $loadds[1] </p> </td>
                        <td id='tensanpham'> <p> $loadds[2] </p> </td>
                        <td id='mota'> <p> <i> $loadds[3] </i> </p> </td>
                        <td id='dongia'>
                        <p>$dongia đồng </p>
                        </td>
                        <td id='soluong'>
                        <input name='soluong' class='donhang-soluong' type='number' min=1 max= 10 value='$loadds[5]'>
                        </td>
                        <td id='thanhtien'>
                        <p>$tongtien đồng </p>
                        <td> 
                        <button id='donhang-xoa' onclick='xoadonhang(this)' name='xoa'> Xóa </button>
                        </td>
                    </tr>
                        ";
                    }
            ?>
        <tr class="footer">
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th class="tongtien"> Tổng tiền </th>
            <th class="tongtien"> 
                <p> <?php echo number_format($thanhtien, 0, '', '.'); ?> đồng </p>
            </th>
        </tr>
    </table>
</div>
    <div class="thanhtoan">
        <a href="thanhtoan.php"> Tiến hành thanh toán </a>
    </div>
    <p class="cach"></p>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function xoadonhang(x) {
        var tr = x.parentElement.parentElement;
        var tensp = tr.children[0].innerText;
        window.location.replace("giohang.php?xoaMa=" +tensp);
    };
    $(".donhang-soluong").change(function() {
        var tr = this.parentElement.parentElement;
        var tensp = tr.children[0].innerText;
        var soLuong = $(this).val();
        window.location.replace("giohang.php?maSanPham=" +tensp +"&soLuong=" +soLuong);
    });
</script>