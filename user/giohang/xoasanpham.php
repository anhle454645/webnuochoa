<?php
    $tenTK=$_SESSION["user"];
    $sanPhamXoa = $_GET['xoaMa'];
    $sql = "DELETE FROM giohang WHERE taikhoan = '{$tenTK}' AND idsanpham = '{$sanPhamXoa}'";
    $query = mysqli_query($connect ,$sql) or die("Không thực hiện được");
    echo '<script type="text/javascript">window.location.replace("giohang.php")</script>';
?>