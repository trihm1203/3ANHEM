-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 14, 2022 lúc 07:03 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `NoiDung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NgayLap` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_hoadon`
--

CREATE TABLE `chitiet_hoadon` (
  `Id_HoaDon` int(11) NOT NULL,
  `Id_SP` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `DonGia` float NOT NULL,
  `HinhAnh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenSP` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `TenDanhMuc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `TenDanhMuc`, `HinhAnh`) VALUES
(1, 'MSI', 'msi.png'),
(5, 'Dell', 'dell_1.1.png'),
(41, 'Asus', 'asus.png'),
(42, 'Lenovo', 'lenovo.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `Id_HoaDon` int(11) NOT NULL,
  `Id_User` int(11) NOT NULL,
  `NgayLap` datetime NOT NULL,
  `NguoiNhan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` int(11) NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PhuongThucTT` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TongTien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `pass` varchar(255) CHARACTER SET utf8 NOT NULL,
  `quyen` tinyint(4) DEFAULT NULL,
  `trangthai` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `ten`, `sdt`, `DiaChi`, `email`, `pass`, `quyen`, `trangthai`) VALUES
(4, 'Huỳnh Minh Trí', '0857417612', '10 Tân Chánh Hiệp 36', 'trihmps23830@fpt.edu.vn', '21232f297a57a5a743894a0e4a801fc3', 0, 1),
(20, 'Phạm Đình Hậu', '0343324451', 'Long Khánh, Đồng Nai', 'Haups23858@fpt.edu.vn', '202cb962ac59075b964b07152d234b70', 1, 1),
(23, 'Huỳnh Quý Khang', '0987342786', 'Cai Lậy, Tiền Giang', 'Khangps23854@fpt.edu.vn', '202cb962ac59075b964b07152d234b70', 1, 1),
(28, 'abc', '123', '123', 'test123@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1),
(29, 'CC', '329423894', '5gsfg', 'naadm@gmail.com', '3e9b0f124075f5b1486a67872eb6236e', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `TenSP` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `Gia` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `HinhAnh` varchar(200) CHARACTER SET utf8 NOT NULL,
  `ManHinh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Ram` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CPU` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Rom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CardMH` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TinhTrang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sale` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL,
  `id_danhmuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `TenSP`, `Gia`, `SoLuong`, `HinhAnh`, `ManHinh`, `Ram`, `CPU`, `Rom`, `CardMH`, `TinhTrang`, `sale`, `view`, `id_danhmuc`) VALUES
(33, 'Laptop MSI Gaming Stealth 15M A11SDK ', 33989000, 10, '637c6439a2d8c-55872_stealth15w__4_.png', '15.6 inch FHD (1920*1080) IPS, 144Hz', '16GB DDR4 (2666Mhz) (2*8GB)', 'Tiger lake Core i7-1185G7 - CPU Intel thế hệ 11', ' 512GB NVMe PCle SSD', 'GTX1660Ti 6G MaxQ GDDR6', 'Còn hàng', 10, 44, 1),
(35, 'Asus Gaming ROG Zephyrus GA401IU', 34999000, 5, '637dda8a02a57-best-seller-4__asus-rog-zephyrus.png', ' 14', '16GB DDR4 3200MHz (8GB + 8GB Onboard)', 'AMD Ryzen 7 4800HS 2.9GHz up to 4.2GHz 8MB', ' 512GB SSD PCIE G3X4', 'NVIDIA GeForce GTX 1660Ti 6GB GDDR6 VRAM (Boost Cl', 'Còn hàng', 5, 39, 41),
(36, 'Laptop Asus VivoBook A412FA-EK734T', 15999000, 7, '637ddcc98e63b-best-seller-6__vivo_book_a412.png', ' 14.0', '4GB onboard DDR4/ 2666MHz + 1 x 4GB DDR4/ 2666MHz ', 'Intel Core i5-10210U Processor (4 x 1.60 GHz), Max', '512GB SSD PCIe (M.2 2280)', 'Intel UHD Graphics', 'Còn hàng', 0, 6, 41),
(37, 'Asus Gaming TUF FX505DT-AL118T', 16999000, 4, '637ddd1a36d28-best-seller-5__asus_gaming_tuf_fx505dt_al118t_.jpg', ' 15.6', '1 x 8GB DDR4/3200 MHz (2 slots)', 'AMD Ryzen 5 3550H Processor (4 x 2.10 GHz), Max Bo', '512GB SSD PCIe (M.2 2280)', 'NVIDIA GeForce GTX 1650 (4GB of GDDR5 SDRAM, Bus W', 'Còn hàng', 10, 4, 41),
(41, 'Laptop MSI Gaming GF63 9RCX 646VN', 18989000, 10, '63924f45aad13-best-seller-3__msi_nb_gf63__8_.jpg', ' 15.6', '8GB DDR4 (2666Mhz)', 'Intel Core i5 9300H', '512GB NVMe PCIe SSD', 'GeForce® GTX 1050Ti, 4GB GDDR5', 'Còn hàng', 0, 19, 1),
(42, 'Laptop MSI Gaming Bravo 15 A4DCR', 21999000, 10, '63924fa0deb69-56199_msi_gaming_bravo_15_a4dc_052vn__5_.jpg', ' 15.6 inch FHD (1920*1080), IPS 144Hz', '', '15.6 inch FHD (1920*1080), IPS 144Hz', '256GB NVMe PCle SSD', 'AMD Radeon RX 5300M 3GB GDDR6', 'Còn hàng', 0, 2, 1),
(43, 'Laptop Lenovo IdeaPad S540-15IML', 10999000, 7, '639250516ac78-56166_50453_laptop_lenovo_ideapad_s540_15iml__81ng004pvn__i3_xam.jpg', ' 15.6', '4GB DDR4', 'Intel® Core™ i3-10110U Comet Lake 2.1Ghz upto 4.1G', 'SSD 512GB M.2 NVMe', 'Intel® UHD Graphics', 'Còn hàng', 7, 10, 42),
(44, 'Dell Gaming G5 15 5500', 33599000, 7, '639251add913e-best-seller-2__dell-gaming-g5.png', ' 15.6 inch FHD(1920x1080) 300nits WVA Anti-Glare LED Backlit Display(non-touch), 144Hz', '8GB DDR4 2933Mhz (2*4GB)', 'Intel Core i7 10750H (2.6Ghz /12MB cache)', '512GB SSD M.2 PCIe NVMe', 'Nvidia Geforce RTX2060 6G DDR6', 'Còn hàng', 0, 4, 5),
(45, 'Laptop Dell Inspiron 5593A', 24000000, 5, '6392523345760-best-seller-7__laptop_dell_inspiron_5391__70197461__i7_bac.png', ' 15.6” FHD (1920 * 1080) Anti-Glare LED-Backlit', '8GB DDR4 2666Mhz (8GB *1)', 'Intel Core i7 1065G7(upto 3.8Ghz/ 8MB Cache)', '512GB SSD PCIe (M.2 2280)', 'Nvidia Geforce MX230 4G DDR5', 'Còn hàng', 0, 5, 5),
(46, 'Laptop Dell XPS 15 9500 (70221010)', 59999000, 3, '63925290a7953-55982_xps_9500__5_.png', ' 15.6', '16GB DDR4 2933Mhz (2*8GB)', 'Intel® Core™ i7 10750H', '512GB M.2 PCIe NVMe SSD', '512GB M.2 PCIe NVMe SSD', 'Còn hàng', 0, 5, 5);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `binhluan_ibfk_1` (`id_user`),
  ADD KEY `Cmt-Sp` (`id_sp`);

--
-- Chỉ mục cho bảng `chitiet_hoadon`
--
ALTER TABLE `chitiet_hoadon`
  ADD KEY `Sp-ChiTietHoaDon` (`Id_SP`),
  ADD KEY `-HoaDon` (`Id_HoaDon`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`Id_HoaDon`),
  ADD KEY `-User` (`Id_User`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_DanhMuc` (`id_danhmuc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `Id_HoaDon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `Cmt-Sp` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `nguoidung` (`id`);

--
-- Các ràng buộc cho bảng `chitiet_hoadon`
--
ALTER TABLE `chitiet_hoadon`
  ADD CONSTRAINT `-HoaDon` FOREIGN KEY (`Id_HoaDon`) REFERENCES `hoadon` (`Id_HoaDon`),
  ADD CONSTRAINT `Sp-ChiTietHoaDon` FOREIGN KEY (`Id_SP`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `-User` FOREIGN KEY (`Id_User`) REFERENCES `nguoidung` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`Id_DanhMuc`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
