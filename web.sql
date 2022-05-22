-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 17, 2022 lúc 11:25 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chiphivanchuyen`
--

CREATE TABLE `chiphivanchuyen` (
  `maVC` int(11) NOT NULL,
  `ngoaithanh` float NOT NULL,
  `noithanh` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `taikhoan` text NOT NULL,
  `tensanpham` text NOT NULL,
  `mota` text NOT NULL,
  `dongia` float NOT NULL,
  `soluong` int(11) NOT NULL,
  `tongtien` float NOT NULL,
  `ngaychon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`taikhoan`, `tensanpham`, `mota`, `dongia`, `soluong`, `tongtien`, `ngaychon`) VALUES
('anh123', 'Nước hoa Jean Paul', 'Nước hoa Jean Paul Gaultier Le Male EDT là hương thơm dành cho phái mạnh được giới thiệu bởi Jean Paul Gaultier vào năm 1995. Được xếp vào loại nước hoa Fougere phương Đông. Jean Paul Gaultier Le Male là sản phẩm của nhà thiết kế Francis Kurkdjian, Quest.', 540000, 1, 540000, '2021-12-23'),
('anhle45', 'Nước hoa Tommy', 'Với Impact Tommy Hilfiger, mùi hương không chỉ dừng ở việc lan tỏa, mà còn thấm đẫm cả những khứu giác tham lam chưa bao giờ ngừng tìm kiếm điều mới mẻ. Giây phút đầu tiên, khi bạn nhận ra sự xuất hiện của Cam chanh thanh mát đang chạy dọc khắp sóng mũi t', 650000, 1, 650000, '2022-01-17'),
('anhle45', 'Nước hoa Chanel', 'Lấy cảm hứng dựa trên thế giới thể thao năng động là nơi vẻ đẹp hình thể lên ngôi, tất cả hòa quyện với hương thơm tươi mát, đầy ấn tượng đánh thẳng vào các giác quan như một luồng điện, ánh chớp bất ngờ.Chai nước hoa Pháp với thân chai hình chữ nhật đứng', 770000, 1, 770000, '2022-01-17'),
('anhle45', 'ARMAF', 'Nước hoa Armaf Club De Nuit Women là một hương thơm thuộc nhóm hương trái cây dành cho nữ. Hương đầu là cam bergamot, bưởi, đào, cam. Note hương giữa là sự hòa trộn tinh tế của hoa phong lữ, hoa nhài, hoa hồng và vải thiều. Note hương cuối là hoắc hương, ', 700000, 1, 700000, '2022-01-17'),
('anhle45', 'CKBE', 'Hương thơm phải được mệnh danh là nước hoa \"THUỐC PHIỆN \" gây nghiện, gây bão trên thị trường Eva \r\n  Một chút ngọt ngào sexy từ vani, một chút tinh khiết với hương cà phê đen cùng với hương cam thảo, hạnh nhân còn đọng lại thoang thoảng. Quả là một loại ', 190000, 1, 190000, '2022-01-17'),
('anhle454645', 'ACQUA', 'Hương thơm phải được mệnh danh là nước hoa \"THUỐC PHIỆN \" gây nghiện, gây bão trên thị trường Eva \r\n  Một chút ngọt ngào sexy từ vani, một chút tinh khiết với hương cà phê đen cùng với hương cam thảo, hạnh nhân còn đọng lại thoang thoảng. Quả là một loại ', 650000, 3, 1950000, '2021-12-29'),
('Lê Quốc Mạnh', 'Nước hoa Paco', 'Nước hoa Paco Rabanne Phantom EDT là một loại nước hoa có hương gỗ dành cho nam giới. Là mẫu nước hoa đầu tiên trên thế giới có thể kết nối với smartphone của bạn thông qua mã code có sẵn trên chai nước hoa, đưa bạn bước vào hành tinh của Phantom và điều ', 550000, 2, 550000, '2021-12-17'),
('Lê Quốc Mạnh', 'Nước hoa Jean Paul', 'Nước hoa Jean Paul Gaultier Le Male EDT là hương thơm dành cho phái mạnh được giới thiệu bởi Jean Paul Gaultier vào năm 1995. Được xếp vào loại nước hoa Fougere phương Đông. Jean Paul Gaultier Le Male là sản phẩm của nhà thiết kế Francis Kurkdjian, Quest.', 540000, 3, 1620000, '2021-12-17'),
('Lê Quốc Mạnh', 'ARMAF', 'Nước hoa Armaf Club De Nuit Women là một hương thơm thuộc nhóm hương trái cây dành cho nữ. Hương đầu là cam bergamot, bưởi, đào, cam. Note hương giữa là sự hòa trộn tinh tế của hoa phong lữ, hoa nhài, hoa hồng và vải thiều. Note hương cuối là hoắc hương, ', 700000, 1, 700000, '2021-12-17'),
('phim', 'Ysl Black Opium', 'Hương thơm phải được mệnh danh là nước hoa \"THUỐC PHIỆN \" gây nghiện, gây bão trên thị trường Eva \r\n  Một chút ngọt ngào sexy từ vani, một chút tinh khiết với hương cà phê đen cùng với hương cam thảo, hạnh nhân còn đọng lại thoang thoảng. Quả là một loại ', 500000, 2, 1000000, '2021-12-17'),
('phim', 'Nước hoa Givenchy', 'Givenchy Gentleman được ra mắt vào năm 2018. Sản phẩm như đang mô tả về các quý ông thế hệ mới, vừa có chút cổ điển lắng đọng những đầy hiện đại và phóng khoáng. Nước hoa Givenchy Gentleman 100ml mang sự hấp dẫn của phong cách phương Đông qua hương thơm n', 640000, 2, 1280000, '2021-12-17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `tenkhachhang` varchar(255) NOT NULL,
  `mahoadon` int(11) NOT NULL,
  `ngaythanhtoan` datetime NOT NULL,
  `tongiten` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsugiaodich`
--

CREATE TABLE `lichsugiaodich` (
  `ngayban` date NOT NULL,
  `taikhoan` text NOT NULL,
  `tenkhachhang` text NOT NULL,
  `sodienthoai` text NOT NULL,
  `diachi` text NOT NULL,
  `tongtien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lichsugiaodich`
--

INSERT INTO `lichsugiaodich` (`ngayban`, `taikhoan`, `tenkhachhang`, `sodienthoai`, `diachi`, `tongtien`) VALUES
('2022-01-17', 'anhle45', 'LÊ ĐỨC ÁNH', '0966454645', 'quy nhơn', 650000),
('2022-01-17', 'anhle45', 'LÊ ĐỨC ÁNH', '0966454645', 'quy nhơn', 1420000),
('2022-01-17', 'anhle45', 'LÊ ĐỨC ÁNH', '0966454645', 'Đường Hoàng Cầm', 2120000),
('2022-01-17', 'anhle45', 'LÊ ĐỨC ÁNH', '0966454645', 'bình định', 2310000),
('2022-01-17', 'misapon', 'Lê Quốc Mạnh', '0398849060', 'QuyNhơn', 1480000),
('2022-01-17', 'misapon', 'Lê Quốc Mạnh', '0398849060', 'QuyNhơn', 1970000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `idLoaiSP` int(11) NOT NULL,
  `tenLoaiSP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`idLoaiSP`, `tenLoaiSP`) VALUES
(1, 'Gucci'),
(2, 'Dior'),
(23, 'Chanel'),
(24, 'Adidas');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` bit(1) DEFAULT NULL,
  `chucvu` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `email`, `fullname`, `birthday`, `sex`, `chucvu`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'admin', '2001-11-25', b'1', 1),
(15, 'anhle45', 'afa10e5e8236de71eaac0d4007443b21', 'leducanh454645@gmail.com', 'LÊ ĐỨC ÁNH', '2001-01-01', b'1', 0),
(17, 'misapon', '729f4ca8251e928906dbae6b1d69c647', 'lequocmanh@gmail.com', 'Lê Quốc Mạnh', '2001-11-25', b'1', 0),
(18, 'trihieu', '729f4ca8251e928906dbae6b1d69c647', 'trihieu@gmail.com', 'Trí Hiếu', '2001-11-12', b'1', 0),
(19, 'hophuong', '729f4ca8251e928906dbae6b1d69c647', 'hophuong@gmail.com', 'Hồ Phương', '2001-12-12', b'1', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `idSP` int(11) NOT NULL,
  `tenSP` varchar(255) NOT NULL,
  `mota` varchar(255) NOT NULL,
  `soluongdaban` int(11) NOT NULL,
  `soluongcon` int(11) NOT NULL,
  `DonGia` float NOT NULL,
  `danhgia` int(11) NOT NULL,
  `quocgia` varchar(255) NOT NULL,
  `giamgia` float DEFAULT NULL,
  `loaisanpham` int(11) NOT NULL,
  `ngaySX` date NOT NULL,
  `sex` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idSP`, `tenSP`, `mota`, `soluongdaban`, `soluongcon`, `DonGia`, `danhgia`, `quocgia`, `giamgia`, `loaisanpham`, `ngaySX`, `sex`) VALUES
(94, 'Ysl Black Opium', 'Hương thơm phải được mệnh danh là nước hoa \"THUỐC PHIỆN \" gây nghiện, gây bão trên thị trường Eva \r\n  Một chút ngọt ngào sexy từ vani, một chút tinh khiết với hương cà phê đen cùng với hương cam thảo, hạnh nhân còn đọng lại thoang thoảng. Quả là một loại ', 90, 102, 500000, 5, 'Ý', 0, 2, '2008-01-01', 0),
(96, 'Dior Sauvage EDP', 'Nằm trong 𝒕𝒐𝒑 𝟏𝟎 dòng nước hoa nam quyến rũ nhất thế giới, với những mùi hương nổi bật của 𝒂𝒎𝒃𝒓𝒐𝒙𝒂𝒏, 𝒕𝒊𝒆̂𝒖 và 𝒄𝒂𝒎 𝒃𝒆𝒓𝒈𝒂𝒎𝒐𝒕, 𝑫𝒊𝒐𝒓 𝑺𝒂𝒖𝒗𝒂𝒈𝒆  tạo ấn tượng tươi mát đầy mạnh mẽ. Chúng như dựng nên một không gian', 30, 199, 190000, 3, 'Nga', 0, 1, '2008-01-01', 0),
(97, 'ARMAF', 'Nước hoa Armaf Club De Nuit Women là một hương thơm thuộc nhóm hương trái cây dành cho nữ. Hương đầu là cam bergamot, bưởi, đào, cam. Note hương giữa là sự hòa trộn tinh tế của hoa phong lữ, hoa nhài, hoa hồng và vải thiều. Note hương cuối là hoắc hương, ', 90, 231, 700000, 4, 'Thụy Điển', 0, 2, '2008-01-01', 0),
(98, 'AFNAN', 'Hương thơm phải được mệnh danh là nước hoa \"THUỐC PHIỆN \" gây nghiện, gây bão trên thị trường Eva \r\n  Một chút ngọt ngào sexy từ vani, một chút tinh khiết với hương cà phê đen cùng với hương cam thảo, hạnh nhân còn đọng lại thoang thoảng. Quả là một loại ', 60, 450, 800000, 5, 'Ý', 0, 24, '2008-01-01', 0),
(99, 'CKBE', 'Hương thơm phải được mệnh danh là nước hoa \"THUỐC PHIỆN \" gây nghiện, gây bão trên thị trường Eva \r\n  Một chút ngọt ngào sexy từ vani, một chút tinh khiết với hương cà phê đen cùng với hương cam thảo, hạnh nhân còn đọng lại thoang thoảng. Quả là một loại ', 587, 758, 190000, 5, 'MỸ', 0, 24, '2009-11-01', 0),
(100, 'ACQUA', 'Hương thơm phải được mệnh danh là nước hoa \"THUỐC PHIỆN \" gây nghiện, gây bão trên thị trường Eva \r\n  Một chút ngọt ngào sexy từ vani, một chút tinh khiết với hương cà phê đen cùng với hương cam thảo, hạnh nhân còn đọng lại thoang thoảng. Quả là một loại ', 99, 354, 650000, 3, 'BRAZIL', 0, 23, '2010-08-01', 1),
(101, 'Nước hoa Paco', 'Nước hoa Paco Rabanne Phantom EDT là một loại nước hoa có hương gỗ dành cho nam giới. Là mẫu nước hoa đầu tiên trên thế giới có thể kết nối với smartphone của bạn thông qua mã code có sẵn trên chai nước hoa, đưa bạn bước vào hành tinh của Phantom và điều ', 344, 679, 550000, 3, 'Ý', 0, 1, '2005-01-01', 1),
(102, 'Ysl Black Opium', 'Với Impact Tommy Hilfiger, mùi hương không chỉ dừng ở việc lan tỏa, mà còn thấm đẫm cả những khứu giác tham lam chưa bao giờ ngừng tìm kiếm điều mới mẻ.\r\n\r\nGiây phút đầu tiên, khi bạn nhận ra sự xuất hiện của Cam chanh thanh mát đang chạy dọc khắp sóng mũ', 44, 654, 650000, 5, 'Ả RẬP', 0, 24, '2006-11-11', 1),
(103, 'Nước hoa Tommy', 'Với Impact Tommy Hilfiger, mùi hương không chỉ dừng ở việc lan tỏa, mà còn thấm đẫm cả những khứu giác tham lam chưa bao giờ ngừng tìm kiếm điều mới mẻ. Giây phút đầu tiên, khi bạn nhận ra sự xuất hiện của Cam chanh thanh mát đang chạy dọc khắp sóng mũi t', 33, 555, 650000, 5, 'IRAN', 0, 23, '2006-12-12', 1),
(104, 'Nước hoa Yves', 'Yves Saint Laurent Libre được thương hiệu danh giá Yves Saint Laurent ra mắt vào năm 2019, bởi sự hợp tác ăn ý giữa chai chuyên gia nước hoa Anne Flipo và Carlos Benaim.\r\n\r\nXóa đi những phù phiếm gần như khiến người ta choáng ngợp, với YSL Libre có nghĩa ', 46, 244, 730000, 5, 'IRAN', 0, 24, '2009-12-12', 0),
(105, 'Nước hoa Hermes', 'Hermes EDP được ra mắt vào mùa thu tháng 8 năm 2017 bởi nhà pha chế Christine Nagel. Đối tượng khách hàng thiết yếu là những người trẻ của thế hệ Millennials, cùng điểm nhấn là chiếc khăn lụa màu sắc trẻ trung đại diện cho những cô gái phương Tây thanh lị', 57, 843, 980000, 5, 'IRAQ', 0, 24, '2015-12-12', 0),
(106, 'Nước hoa Jean Paul', 'Nước hoa Jean Paul Gaultier Le Male EDT là hương thơm dành cho phái mạnh được giới thiệu bởi Jean Paul Gaultier vào năm 1995. Được xếp vào loại nước hoa Fougere phương Đông. Jean Paul Gaultier Le Male là sản phẩm của nhà thiết kế Francis Kurkdjian, Quest.', 48, 559, 540000, 5, 'Hàn Quốc', 0, 1, '2017-11-11', 1),
(107, 'Nước hoa Givenchy', 'Givenchy Gentleman được ra mắt vào năm 2018. Sản phẩm như đang mô tả về các quý ông thế hệ mới, vừa có chút cổ điển lắng đọng những đầy hiện đại và phóng khoáng. Nước hoa Givenchy Gentleman 100ml mang sự hấp dẫn của phong cách phương Đông qua hương thơm n', 488, 1000, 640000, 5, 'Mỹ', 0, 1, '2017-11-11', 1),
(108, 'Nước hoa Chanel', 'Lấy cảm hứng dựa trên thế giới thể thao năng động là nơi vẻ đẹp hình thể lên ngôi, tất cả hòa quyện với hương thơm tươi mát, đầy ấn tượng đánh thẳng vào các giác quan như một luồng điện, ánh chớp bất ngờ.Chai nước hoa Pháp với thân chai hình chữ nhật đứng', 390, 978, 770000, 5, 'Mỹ', 0, 1, '2017-11-11', 1),
(109, 'Nước hoa Lattafa', 'Lattafa Bade’e Al Oud (Oud for Glory) mang hương thơm hoa cỏ phương Đông . Bản thân mùi hương thay đổi đáng kể tùy thuộc vào Gỗ được sử dụng, nơi cây được trồng và liệu bản thân cây đã được trồng trọt hay bị nhiễm bệnh tự nhiên. Hương thơm không có gì đán', 355, 865, 880000, 5, 'Mỹ', 0, 1, '2019-11-11', 1),
(110, 'Nước hoa Versace', 'Chai nước hoa Ý với hương vị đầy mát mẻ và sảng khoái đến từ bạc hà, táo xanh, chanh vàng đem đến cho người sử dụng một cảm giác rất ngọt ngào cùng một chút hơi cay nồng. Đan xen sự mạnh mẽ đó là hương vị ấm áp, lắng đọng nhờ sự góp mặt của phong lữ, hươn', 333, 245, 950000, 5, 'Mỹ', 0, 1, '2018-11-11', 1),
(111, 'Nước hoa Lolita', 'Với Lolita, mùi hương không chỉ dừng ở việc lan tỏa, mà còn thấm đẫm cả những khứu giác tham lam chưa bao giờ ngừng tìm kiếm điều mới mẻ. Giây phút đầu tiên, khi bạn nhận ra sự xuất hiện của Cam chanh thanh mát đang chạy dọc khắp sóng mũi thì cũng đừng vộ', 42, 666, 730000, 5, 'Đức', 0, 24, '2006-11-11', 1),
(112, 'Nước hoa Montblanc', 'Trong phiên bản này, bạn sẽ tìm thấy nhân vật nổi tiếng của truyền thuyết, với hợp âm của cam bergamot, hoa nhài thuần khiết và rêu, nhưng nó cũng có những cách phối mới: lá violet tươi và một nốt hương hoa mộc lan hấp dẫn và thú vị.\r\n\r\nHương thơm kết thú', 44, 654, 850000, 5, 'Ả RẬP', 0, 24, '2007-11-11', 1),
(113, 'Nước hoa Montblanc', 'Với Montblanc, mùi hương không chỉ dừng ở việc lan tỏa, mà còn thấm đẫm cả những khứu giác tham lam chưa bao giờ ngừng tìm kiếm điều mới mẻ. Giây phút đầu tiên, khi bạn nhận ra sự xuất hiện của Cam chanh thanh mát đang chạy dọc khắp sóng mũi thì cũng đừng', 44, 654, 790000, 5, 'Nga', 0, 24, '2006-11-11', 1),
(114, 'Nước hoa Afnan', 'Với Afnan, mùi hương không chỉ dừng ở việc lan tỏa, mà còn thấm đẫm cả những khứu giác tham lam chưa bao giờ ngừng tìm kiếm điều mới mẻ. Giây phút đầu tiên, khi bạn nhận ra sự xuất hiện của Cam chanh thanh mát đang chạy dọc khắp sóng mũi thì cũng đừng vội', 48, 653, 900000, 5, 'Nhật Bản', 0, 24, '2006-11-11', 1),
(115, 'Nước hoa Carolina', 'Với Carolina, mùi hương không chỉ dừng ở việc lan tỏa, mà còn thấm đẫm cả những khứu giác tham lam chưa bao giờ ngừng tìm kiếm điều mới mẻ. Giây phút đầu tiên, khi bạn nhận ra sự xuất hiện của Cam chanh thanh mát đang chạy dọc khắp sóng mũi thì cũng đừng ', 44, 632, 650000, 5, 'BRAZIL', 0, 24, '2006-11-11', 1),
(116, 'Nước hoa LIntense', 'Giorgio Armani Sì Passione mở đầu bằng những nốt hương cay nồng của hạt tiêu hồng, kích thích và truyền tải xung thần kinh, kích thích các giác quan. Sau khi thu hút sự chú ý, quả lê lấp lánh và rạng rỡ làm sáng lên nho đen ngon ngọt mang tính biểu tượng ', 653, 943, 650000, 5, 'Mỹ', 0, 24, '2009-11-11', 1),
(117, ' Nước hoa LIntense', 'Mùi hương của L Homme Ideal LIntense mang lại cảm giác mạnh mẽ, sang trọng và cá tính. Mở đầu bằng sự kết hợp ngọt ngào của hạnh nhân, hoa hồng bulgaria, bạch đậu khấu. Và rồi, như một chuyến phiêu lưu đầy ẩn số, tầng hương cuối đọng lại một chút nồng ấm,', 95, 321, 650000, 5, 'Ả RẬP', 0, 24, '2006-11-11', 1),
(118, 'Nước hoa Lattafa', 'nhẹ nhàng, quyến rũ', 0, 5, 1200000, 0, 'Việt Nam', 30, 1, '2022-01-14', 0),
(119, 'Ysl Black Opium', 'năng động, trẻ trung', 0, 100, 1200000, 0, 'Việt Nam', 0, 1, '2022-01-20', 0),
(120, 'products-01', 'dịu nhẹ, ngọt ngào', 0, 100, 120000, 0, 'Việt Nam', 30, 1, '2022-01-05', 0),
(121, 'afnan1', 'nhẹ nhàng, quyến rũ', 0, 100, 120000, 0, 'Việt Nam', 0, 1, '2022-01-27', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chiphivanchuyen`
--
ALTER TABLE `chiphivanchuyen`
  ADD PRIMARY KEY (`maVC`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`mahoadon`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`idLoaiSP`);

--
-- Chỉ mục cho bảng `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idSP`),
  ADD KEY `loaisanpham` (`loaisanpham`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `mahoadon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `idLoaiSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`loaisanpham`) REFERENCES `loaisanpham` (`idLoaiSP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
