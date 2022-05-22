<?php
    function layDuLieu($query){
        // kết nối
        $connect = mysqli_connect("localhost", "root", "", "web") or die("không thể kết nối");
        // thiết lập bảng mã
        mysqli_query($connect, "set names 'utf8'");
        $result=mysqli_query($connect,$query) or die ("không thực hiện được");
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    }
    function layDuongDanAnh($loaiSP, $tenSP){
        $direct = 'images/products/' . $loaiSP . '/' . $tenSP;
        if(file_exists($direct . '.jpg')){
            return $direct . '.jpg';
        }
        if(file_exists($direct . '.png')){
            return $direct . '.png';
        }
        if(file_exists($direct . '.jpge')){
            return $direct . '.jpge';
        }
        return 'images/products/' . 'default.jpg';
    }
?>