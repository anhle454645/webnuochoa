<html>
    <head>
        <meta charset="utf-8"/>
        <title>dn</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"/>
    </head>
    <style>
        *{
    margin: 0 auto;
    padding: 0;
    box-sizing: border-box;
}
body{
    display: flex;
    background-image: url(https://nhathauxaydung24h.com/wp-content/uploads/2021/04/hinh-nen-dep-nhat-1.jpg);
    background-repeat: no-repeat;
    background-size: 100% 100%;
    background-position: center;
}
.khoi1{
    height: 100%;
    width: 100%;background: rgb(216, 246, 255);
    
    align-items: center;
    justify-content: center;
    display: flex;
}
form{
    width: 350px;
    height: 400px;
    background: whitesmoke;
    background: transparent;
    border: 2px solid rgb(167, 173, 255);
}
form h1{
    position: relative;
    font-size: 50px;
    font-family: cursive;
    color:rgb(31, 5, 27);
    margin: 15px 0 35px;
    width: fit-content;
}
form h1::after{
    content: "";
    position:absolute;
    display:block;
    width: 100%;
    height: 5px;
    background-color: rgb(8, 99, 151);
}
.khoi2{
    margin-bottom: 20px;
    position: relative;
    
}
.khoi2 i{
    color: white;
    font-size: 24px;
    position: absolute;
    line-height: 42px;
}
.khoi2 input{
    font-size: 20px;
    color: white;
    width: 100%;
    height: 45px;
    border: none;
    padding-left: 30px;
    border-bottom: 1px solid rgb(255, 143, 51);
    background: transparent;
}
.khoi2 input::placeholder{
    font-size: 20px;
    color: rgb(133, 104, 133);
}
    </style>
    <body>
        <div class="khoi1">
            <form>
                <h1>Đăng nhập</h1>
                <div class="khoi2">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Tên đăng nhập"/>
                </div>
                <div class="khoi2">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Mật khẩu"/>
                </div>
            </form>
        </div>
    </body>
</html>