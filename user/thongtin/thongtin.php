<link rel="stylesheet" type="text/css" href="user/ThongTin/style.css">
<?php
    // kết nối dữ liệu
    $connect = mysqli_connect("localhost", "root", "", "web") or die("không thể kết nối");
    // thiết lập bảng mã
    mysqli_query($connect, "set names 'utf8'");
    // lấy tên đăng nhập
    $user = $_SESSION["user"];
    // câu lệnh truy vấn tìm tên quận
    $lenh = "SELECT * FROM member WHERE username = '$user'";
    // thực hiện câu lệnh
    $results = mysqli_query($connect, $lenh) or die("Không thực hiện được");
    $row = mysqli_fetch_array($results);
    $hoten =  $row['fullname'];
    $gioitinh = $row['sex'];
    $ngaysinh = $row['birthday'];
    $email = $row['email'];
?>
<div>
<form action="" method="POST">
    <div class="tttk">
        <p>THÔNG TIN TÀI KHOẢN</p>
    </div>
    <div class="tt">
    <table class="thongtin">
            <tr>
                <td>
                    <div class="label"> Họ tên </div>
                </td>
                <td>
                    <div class="input"> <?php echo $hoten; ?> </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="label"> Giới tính </div>
                </td>
                <td>
                    <div class="input"> 
                        <?php if($gioitinh=="1") echo "nam";
                        else echo "nữ"?> 
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="label"> Ngày sinh </div>
                </td>
                <td>
                    <div class="input"> <?php echo $ngaysinh; ?> </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="label"> Email </div>
                </td>
                <td>
                    <div class="input"> <?php echo $email; ?> </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="label"> Nhập mật khẩu </div>
                </td>
                <td>
                    <input  type="password" class="input-thongtin" placeholder="Nhập mật khẩu cũ (bắt buộc)" name="matkhaucu">
                </td>
            </tr>
            <tr>
                <td>
                    <div class="label"> Mật khẩu mới </div>
                </td>
                <td>
                    <input type="password" class="input-thongtin" placeholder="Nhập mật khẩu mới ..." name="matkhaumoi">
                </td>
            </tr>
            <tr>
                <td>
                    <div class="label"> Nhập lại mật khẩu </div>
                </td>
                <td>
                    <input type="password" class="input-thongtin" placeholder="Nhập lại mật khẩu mới ..." name="rematkhaumoi">
                </td>
            </tr>
            <tr>
                <td>
                    <div id="baoloi"> Cập nhật thông tin! </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                     <input class="capnhat" type="submit" name="capnhat" value="Cập nhật">
                </td>
            </tr>
            </table>
    </div>
       
</form>
</div>
<?php
    if (isset($_POST['capnhat'])) { 
        $matkhaucu = $_POST['matkhaucu'];
        $matkhau = md5($matkhaucu);
        $matkhaumoi = $_POST['matkhaumoi'];
        $passmoi = md5($matkhaumoi);
        $rematkhaumoi = $_POST['rematkhaumoi'];
        if ( $matkhaumoi == "" && $rematkhaumoi == ""){ ?>
            <script> 
                var div = document.getElementById('baoloi');
                div.textContent = 'Không có thông tin cập nhập!';
            </script>
            <?php }
        else {
            // kiểm tra nhập mật khẩu đúng không
            $sql ="SELECT * FROM member WHERE username = '{$user}' AND password = '{$matkhau}' ";
            $query = mysqli_query($connect ,$sql) or die("Không thực hiện được");
            $num_rows = mysqli_num_rows($query);
            if ($num_rows == 0) { ?>
                <script> 
                    var div = document.getElementById('baoloi');
                    div.textContent = 'Nhập mật khẩu cũ không chính xác!';
                </script>
            <?php } 
                else if ($matkhaumoi != "") {
                    if (strlen($matkhaumoi) < 6) { ?>
                        <script> 
                            var div = document.getElementById('baoloi');
                            div.textContent = 'Mật khẩu mới không bảo mật!';
                        </script>
                    <?php } 
                    else if ($matkhaumoi != $rematkhaumoi) { ?>
                        <script> 
                            var div = document.getElementById('baoloi');
                            div.textContent = 'Nhập lại mật khẩu mới không khớp!';
                        </script>
                    <?php } 
                    else {
                        $sql1 ="UPDATE member SET password='{$passmoi}' WHERE username='{$user}' ";
                        $query = mysqli_query($connect ,$sql1) or die("Không thực hiện được"); { ?> 
                        <script> 
                            var div = document.getElementById('baoloi');
                            div.textContent = 'mật khẩu đã được cập nhật!';
                        </script> <?php } 
                    }
                }
            }
        }
?>