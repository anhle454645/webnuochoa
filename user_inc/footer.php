<link rel="stylesheet" type="text/css" href="user_inc/style.css">


<form action="" method="POST" role="form">
    <div class="chantrang">
        <div class="le"><br></div>
        <div class="chan1">
            <h1>Thông tin liên hệ</h1>
            <div class="fas fa-map-marker-alt chan1a"></div>
            <p class="chan1b"> 170 An Dương Vương, Tp. Quy Nhơn, Tỉnh Bình Định</p>
            <div class="fas fa-phone-alt chan1c"> </div>
            <div class="chan1d"> 0966454645</div>
            <div class="fas fa-envelope-open chan1e"></div>
            <div class="chan1g"> leducanh454645@gmail.com</div>
            <div class="chan1g"> wayfoxx01@gmail.com</div>
        </div>
        <div class="chan2">
            <h1>Liên kết</h1>
            <p><input class="btn nut" type="submit" name="page" value="Trang chủ"></p>
            <p><input class="btn nut" type="submit" name="nuochoanam" value="Nước hoa nam"></p>
            <p><input class="btn nut" type="submit" name="nuochoanu" value="Nước hoa nữ"></p>
            <p><input class="btn nut" type="submit" name="gioithieu" value="Giới thiệu"></p>
            <p><input class="btn nut" type="submit" name="lienhe" value="Liên hệ"></p>
        </div>
        <div class="chan3">
            <h1>Hổ trợ</h1>
            <p><input class="btn nut" type="submit" name="dieukhoang" value="Điểu khoản"></p>
            <p><input class="btn nut" type="submit" name="doitra" value="Chính sách đổi trả"></p>
            <p><input class="btn nut" type="submit" name="huongdan" value="Hướng dẫn sử dụng"></p>
        </div>
        <div class="logochan">
            <img src="images/anhthien.png" height="50" width="200" >
        </div>
        <div class="le"><br></div>
    </div>
</form>

<?php 
    if (isset($_POST['page']))
        echo '<script type="text/javascript">window.location.replace("trangchu.php")</script>';
    if (isset($_POST['nuochoanam']))
        echo '<script type="text/javascript">window.location.replace("nuochoa.php?sex=1")</script>';
    if (isset($_POST['nuochoanu']))
        echo '<script type="text/javascript">window.location.replace("nuochoa.php?sex=0")</script>';
    if (isset($_POST['gioithieu']))
        echo '<script type="text/javascript">window.location.replace("gioithieu.php")</script>';
    if (isset($_POST['lienhe']))
        echo '<script type="text/javascript">window.location.replace("lienhe.php")</script>';
    if (isset($_POST['dieukhoang']))
        echo '<script type="text/javascript">window.location.replace("gioithieu_dieukhoan.php")</script>';
    if (isset($_POST['doitra']))
echo '<script type="text/javascript">window.location.replace("gioithieu_doitra.php")</script>';
    if (isset($_POST['huongdan']))
        echo '<script type="text/javascript">window.location.replace("gioithieu_huongdan.php")</script>';
?>

<div id="backtop" style="bottom:90px;">
    <i class="fas fa-chevron-up"></i>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $("#backtop").fadeOut();
        $(window).scroll(function(){
            if($(this).scrollTop()) 
                $("#backtop").fadeIn();
            else    
                $("#backtop").fadeOut();
        });
        $("#backtop").click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, 500);
        });
    });
</script>
