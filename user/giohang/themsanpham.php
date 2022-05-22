<?php
    $tenTK=$_SESSION["user"];
    $sanPham = $_GET['maSanPham'];
    $soluong=$_GET['soLuong'];
    $lenh = "SELECT * FROM giohang WHERE taikhoan = '{$tenTK}' AND idsanpham = '{$sanPham}'";
    $results = mysqli_query($connect ,$lenh) or die("Không thực hiện được");
    $row = mysqli_fetch_array($results);
    $sanPhamCon = $row['soluong']; 
    $tongTien = $row['dongia'] * $soluong;
    $today = date('Y-m-d');
    $sql = "UPDATE `giohang` SET `soluong` = '$soluong',`tongtien` = '$tongTien', `ngaychon` = '$today' WHERE `taikhoan` = '$tenTK' AND `idsanpham` = '$sanPham'";
    $query = mysqli_query($connect ,$sql) or die("Không thực hiện được");
    echo '<script type="text/javascript">window.location.replace("giohang.php")</script>';
?>