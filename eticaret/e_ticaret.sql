
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `e_ticaret`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE `ayar` (
  `ayar_id` int(11) NOT NULL,
  `ayar_logo` varchar(250) NOT NULL,
  `ayar_tittle` varchar(250) NOT NULL,
  `ayar_description` varchar(250) NOT NULL,
  `ayar_keyword` varchar(50) NOT NULL,
  `ayar_author` varchar(250) NOT NULL,
  `ayar_tel` varchar(50) NOT NULL,
  `ayar_gsm` varchar(50) NOT NULL,
  `ayar_faks` varchar(250) NOT NULL,
  `ayar_mail` varchar(250) NOT NULL,
  `ayar_ilce` varchar(50) NOT NULL,
  `ayar_il` varchar(50) NOT NULL,
  `ayar_adres` varchar(250) NOT NULL,
  `ayar_mesai` varchar(250) NOT NULL,
  `ayar_maps` varchar(250) NOT NULL,
  `ayar_analystic` varchar(250) NOT NULL,
  `ayar_zopim` varchar(250) NOT NULL,
  `ayar_facebook` varchar(50) NOT NULL,
  `ayar_google` varchar(50) NOT NULL,
  `ayar_youtube` varchar(50) NOT NULL,
  `ayar_twitter` varchar(50) NOT NULL,
  `ayar_smtphost` varchar(50) NOT NULL,
  `ayar_smtppassword` varchar(50) NOT NULL,
  `ayar_smtpport` varchar(50) NOT NULL,
  `ayar_bakım` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `ayar_logo`, `ayar_tittle`, `ayar_description`, `ayar_keyword`, `ayar_author`, `ayar_tel`, `ayar_gsm`, `ayar_faks`, `ayar_mail`, `ayar_ilce`, `ayar_il`, `ayar_adres`, `ayar_mesai`, `ayar_maps`, `ayar_analystic`, `ayar_zopim`, `ayar_facebook`, `ayar_google`, `ayar_youtube`, `ayar_twitter`, `ayar_smtphost`, `ayar_smtppassword`, `ayar_smtpport`, `ayar_bakım`) VALUES
(0, 'logo/50046832879598_Illustration-of-logo-design-template-on-transparent-background-PNG (1).png', 'eticaret', 'e-ticaret hakkında bir web sitesi', 'php, e-ticaret , admin panel', 'samet karakurt', '0850 8080 2312', '90', '0850 8080 2312', 'example@gmail.com', 'istanbul', 'istanbul', 'topkapı sarayı', '7-24 açık e-ticaret scripti', 'ayar_maps', 'ayar_analystic', 'ayar_zopim', 'www.facebook.com', 'www.google.com', 'www.youtube.com', 'www.x.com', 'mail.alanadınız.com', 'password', '587', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `banka`
--

CREATE TABLE `banka` (
  `banka_id` int(11) NOT NULL,
  `banka_ad` varchar(250) NOT NULL,
  `banka_iban` varchar(250) NOT NULL,
  `banka_hesapadsoyad` varchar(250) NOT NULL,
  `banka_durum` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `banka`
--

INSERT INTO `banka` (`banka_id`, `banka_ad`, `banka_iban`, `banka_hesapadsoyad`, `banka_durum`) VALUES
(1, 'ziraat bankası', 'TR 5441111 11111111111 11111111', 'samet karakurt', '1'),
(2, 'garanti bankası', 'TR 1414 1111111 11111 11111111 111', 'samet karakurt', '1'),
(3, 'yapı kredi', 'TR 43232 1111111  11111111 1111 ', 'samet karakurt', '1'),
(4, 'iş bankası', 'TR 4321 111111111 222222 111111111 1111', 'samet karakurt', '1'),
(5, 'deniz bank', 'TR 2232 43435 54434 21111 111212 1212', 'samet karakurt', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `hakkimizda_id` int(11) NOT NULL,
  `hakkimizda_baslik` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hakkimizda_icerik` text NOT NULL,
  `hakkimizda_video` varchar(50) NOT NULL,
  `hakkimizda_vizyon` varchar(500) NOT NULL,
  `hakkimizda_misyon` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`hakkimizda_id`, `hakkimizda_baslik`, `hakkimizda_icerik`, `hakkimizda_video`, `hakkimizda_vizyon`, `hakkimizda_misyon`) VALUES
(0, 'hakkımızda başlık', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vehicula luctus auctor. Vestibulum eleifend nunc arcu, sed condimentum erat convallis vel. Morbi libero risus, rhoncus sed libero quis, cursus viverra enim. Nullam at lorem eleifend, dignissim orci eu, dictum est. Aenean mattis dignissim justo, sed fermentum lacus accumsan in. Sed a velit urna. Mauris vitae lorem eget nulla condimentum consequat ut vitae tellus.  Vivamus ac pellentesque arcu. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras fermentum nibh a erat dignissim, sit amet ullamcorper eros venenatis. Fusce ullamcorper, sem nec vestibulum ornare, nisi nisl vestibulum libero, vel accumsan enim enim in augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque faucibus faucibus libero. Duis et aliquet nisi. Vivamus odio orci, ullamcorper at bibendum id, pretium at dui. Pellentesque volutpat, sem sed vestibulum mattis, mi ipsum vulputate nunc, in cursus turpis nisl posuere orci.  Nullam id dapibus arcu, eu egestas nisi. Curabitur lobortis tortor non dictum accumsan. Sed ligula justo, sagittis vitae finibus ac, condimentum non dui. Aliquam tincidunt pharetra tellus, eu sodales enim tempus quis. Donec mattis nibh pulvinar sollicitudin facilisis. Pellentesque tellus metus, semper eu enim quis, mattis aliquet magna. Vestibulum a felis facilisis, porttitor orci a, laoreet sem. Curabitur vel felis velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse tristique vitae tortor at suscipit. Cras nec hendrerit turpis. Donec at mi vel nunc sodales porta. Vestibulum venenatis tortor quis nibh finibus, sit amet molestie felis hendrerit. Nam pellentesque mollis nisi in sagittis. In rutrum libero vitae rutrum varius. Vivamus vehicula volutpat ligula.  Sed vehicula urna nec vehicula efficitur. Etiam ligula nibh, bibendum id tristique eget, euismod eleifend lacus. Proin orci dolor, imperdiet vel imperdiet rhoncus, faucibus non elit. Nullam eros velit, consequat tempor lacinia eget, efficitur non odio. Vivamus vitae malesuada sem, quis dictum nulla. Donec eget porttitor erat, id rutrum magna. Sed porta non dui eget consequat. Ut hendrerit condimentum sem, sed ultrices nulla vehicula ut. Aenean in diam ac massa iaculis dictum in sed sapien. Morbi a tellus sit amet neque lacinia sagittis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam et justo id nisl cursus ullamcorper. Vivamus tempus mollis scelerisque. Quisque et erat pretium, varius ante in, interdum nulla.  Vivamus et dictum sapien. Proin commodo enim risus, vel congue turpis gravida at. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras ultrices ante nulla, sed dignissim elit tempus et. Quisque quis orci nunc. Phasellus fermentum eget dolor ut euismod. Praesent at varius dolor. Mauris blandit interdum neque, tempor ultricies urna lobortis sit amet. In elementum eget nisi id lacinia.', 'GWyczFaqzrI', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vehicula luctus auctor. Vestibulum eleifend nunc arcu, sed condimentum erat convallis vel. Morbi libero risus, rhoncus sed libero quis, cursus viverra enim. Nullam at lorem eleifend, dignissim orci eu, dictum est. Aenean mattis dignissim justo, sed fermentum lacus accumsan in. Sed a velit urna. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vehicula luctus auctor. Vestibulum eleifend nunc arcu, sed condimentum erat convallis vel. Morbi libero risus, rhoncus sed libero quis, cursus viverra enim. Nullam at lorem eleifend, dignissim orci eu, dictum est. Aenean mattis dignissim justo, sed fermentum lacus accumsan in. Sed a velit urna. ');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_ad` varchar(100) NOT NULL,
  `kategori_ust` int(2) NOT NULL,
  `kategori_seourl` varchar(250) NOT NULL,
  `kategori_sira` int(2) NOT NULL,
  `kategori_durum` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_ad`, `kategori_ust`, `kategori_seourl`, `kategori_sira`, `kategori_durum`) VALUES
(1, 'tişörtler', 0, 'tisortler', 1, '1'),
(2, 'pantolon', 0, 'pantolon', 2, '1'),
(3, 'tablet', 0, 'tablet', 3, '1'),
(4, 'bilgisayar', 0, 'bilgisayar', 4, '1'),
(7, 'mont', 0, 'mont', 5, '1'),
(11, 'ceket', 2, 'ceket', 4, '1'),
(12, 'deneme', 0, 'deneme', 11111111, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_zaman` datetime NOT NULL DEFAULT current_timestamp(),
  `kullanici_resim` varchar(250) NOT NULL,
  `kullanici_tc` varchar(50) NOT NULL,
  `kullanici_mail` varchar(250) NOT NULL,
  `kullanici_gsm` varchar(50) NOT NULL,
  `kullanici_password` varchar(50) NOT NULL,
  `kullanici_adsoyad` varchar(50) NOT NULL,
  `kullanici_adres` varchar(250) NOT NULL,
  `kullanici_il` varchar(50) NOT NULL,
  `kullanici_ilce` varchar(50) NOT NULL,
  `kullanici_unvan` varchar(50) NOT NULL,
  `kullanici_yetki` varchar(50) NOT NULL DEFAULT '1',
  `kullanici_durum` varchar(50) NOT NULL,
  `kullanici_ad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_zaman`, `kullanici_resim`, `kullanici_tc`, `kullanici_mail`, `kullanici_gsm`, `kullanici_password`, `kullanici_adsoyad`, `kullanici_adres`, `kullanici_il`, `kullanici_ilce`, `kullanici_unvan`, `kullanici_yetki`, `kullanici_durum`, `kullanici_ad`) VALUES
(135, '2024-08-27 00:00:00', 'https://i.pinimg.com/564x/51/47/cb/5147cb060b15403e6c6af88c1068bb95.jpg', '11111111111', 'admin@gmail.com', '+905555555555', '5f4dcc3b5aa765d61d8327deb882cf99', 'samet karakurt', 'Türkiye istanbul topkapı sarayı', 'istanbul', '', 'admin', '5', 'aktif', 'samet'),
(140, '2024-09-10 21:00:18', '', '', 'kullanici@gmail.com', '', 'd41d8cd98f00b204e9800998ecf8427e', 'samet karakurt', '', '', '', '', '1', '', ''),
(141, '2024-09-12 15:42:25', '', '', 'kullanici2@gmail.com', '', 'dad0805792b5396e11672644a8496e21', 'samet karakurt', '', '', '', '', '1', '', ''),
(142, '2024-10-01 22:05:35', '', '', 'kullanici3@gmail.com', '', '76d3d479dc5bd42d132ba415b3c4fd69', 'samet karakurt', '', '', '', '', '1', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_ust` varchar(50) NOT NULL,
  `menu_ad` varchar(100) NOT NULL,
  `menu_detay` text NOT NULL,
  `menu_url` varchar(250) NOT NULL,
  `menu_sira` int(2) NOT NULL,
  `menu_durum` enum('0','1') NOT NULL,
  `menu_seourl` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_ust`, `menu_ad`, `menu_detay`, `menu_url`, `menu_sira`, `menu_durum`, `menu_seourl`) VALUES
(9, 'rr', 'hakkımızda', 'menu detay', 'about.php', 0, '1', 'hakkimizda'),
(18, 'menu', 'menu detay', 'menu detay', '', 22, '1', ''),
(19, 'menu', 'menu detay', 'menu detay', '', 33, '1', ''),
(20, 'menu', 'menu detay', 'menu detay', '', 222, '1', ''),
(21, '111', 'kategoriler', '1', 'kategoriler', 2, '1', 'kategoriler');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepet`
--

CREATE TABLE `sepet` (
  `sepet_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urun_adet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_ad` varchar(50) NOT NULL,
  `slider_sira` int(2) NOT NULL,
  `slider_link` varchar(250) NOT NULL,
  `slider_resimyol` varchar(250) NOT NULL,
  `slider_durum` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_ad`, `slider_sira`, `slider_link`, `slider_resimyol`, `slider_durum`) VALUES
(11, 'ceket', 0, '', 'sliders/14829059686932_slider.jpg', '1'),
(12, 'mont', 0, '', 'sliders/97737118057336_slider2.jpg', '1'),
(13, 'ayakkabı', 0, '', 'sliders/96402581065337_slider3.jpg', '1'),
(15, 'yüzük', 0, '', 'sliders/61269203632652_slider4.jpg', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun`
--

CREATE TABLE `urun` (
  `urun_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL DEFAULT 1,
  `urun_zaman` timestamp NOT NULL DEFAULT current_timestamp(),
  `urun_ad` varchar(100) NOT NULL,
  `urun_seourl` varchar(250) NOT NULL,
  `urun_detay` text NOT NULL,
  `urun_fiyat` float NOT NULL,
  `urun_video` varchar(250) NOT NULL,
  `urun_keyword` varchar(150) NOT NULL,
  `urun_stok` int(11) NOT NULL,
  `urun_durum` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `urun`
--

INSERT INTO `urun` (`urun_id`, `kategori_id`, `urun_zaman`, `urun_ad`, `urun_seourl`, `urun_detay`, `urun_fiyat`, `urun_video`, `urun_keyword`, `urun_stok`, `urun_durum`) VALUES
(7, 1, '2024-09-19 18:31:20', 'pantolon', '', 'lorrem ipsum', 500, '', 'pantolon', 1000, '1'),
(8, 2, '2024-09-19 18:31:20', 'ceket', 'ceket', 'lorrem ipsum', 1000, 'url', 'ceket', 100, '1'),
(9, 3, '2024-09-19 18:31:20', 'pantolon', '', 'lorrem ipsum', 500, '', 'pantolon', 1000, '1'),
(10, 4, '2024-09-19 18:31:20', 'ceket', 'ceket', 'lorrem ipsum', 1000, 'url', 'ceket', 100, '1'),
(11, 7, '2024-09-19 18:31:20', 'pantolon', '', 'lorrem ipsum', 500, '', 'pantolon', 1000, '1'),
(12, 4, '2024-09-19 18:31:20', 'ceket', 'ceket', 'lorrem ipsum', 1000, 'url', 'ceket', 100, '1'),
(13, 7, '2024-09-19 18:31:20', 'pantolon', '', 'lorrem ipsum', 500, '', 'pantolon', 1000, '1'),
(14, 4, '2024-09-19 18:31:20', 'ceket', 'ceket', 'lorrem ipsum', 1000, 'url', 'ceket', 100, '1'),
(15, 11, '2024-09-19 18:31:20', 'hırka', '', 'lorrem ipsum', 500, '', 'hırka', 1000, '1'),
(16, 4, '2024-09-19 18:31:20', 'ceket', 'ceket', 'lorrem ipsum', 1000, 'url', 'ceket', 100, '1'),
(17, 11, '2024-09-19 18:31:20', 'pantolon', '', 'lorrem ipsum', 500, '', 'pantolon', 1000, '1'),
(18, 7, '2024-09-19 18:31:20', 'ceket', 'ceket', 'lorrem ipsum', 1000, 'url', 'ceket', 100, '1'),
(19, 11, '2024-09-19 18:31:20', 'pantolon', '', 'lorrem ipsum', 500, '', 'pantolon', 1000, '1'),
(20, 4, '2024-09-19 18:31:20', 'ceket', 'ceket', 'lorrem ipsum', 1000, 'url', 'ceket', 100, '1'),
(21, 3, '2024-09-19 18:31:20', 'pantolon', '', 'lorrem ipsum', 500, '', 'pantolon', 1000, '1'),
(22, 4, '2024-09-19 18:31:20', 'ceket', 'ceket', 'lorrem ipsum', 1000, 'url', 'ceket', 100, '1'),
(23, 1, '2024-09-19 18:31:20', 'pantolon', '', 'lorrem ipsum', 500, '', 'pantolon', 1000, '1'),
(24, 2, '2024-09-19 18:31:20', 'ceket', 'ceket', 'lorrem ipsum', 1000, 'url', 'ceket', 100, '1'),
(25, 3, '2024-09-19 18:31:20', 'pantolon', '', 'lorrem ipsum', 500, '', 'pantolon', 1000, '1'),
(26, 4, '2024-09-19 18:31:20', 'ceket', 'ceket', 'lorrem ipsum', 1000, 'url', 'ceket', 100, '1'),
(27, 7, '2024-09-19 18:31:20', 'pantolon', '', 'lorrem ipsum', 500, '', 'pantolon', 1000, '1'),
(28, 4, '2024-09-19 18:31:20', 'ceket', 'ceket', 'lorrem ipsum', 1000, 'url', 'ceket', 100, '1'),
(29, 7, '2024-09-19 18:31:20', 'pantolon', '', 'lorrem ipsum', 500, '', 'pantolon', 1000, '1'),
(30, 4, '2024-09-19 18:31:20', 'ceket', 'ceket', 'lorrem ipsum', 1000, 'url', 'ceket', 100, '1'),
(31, 11, '2024-09-19 18:31:20', 'hırka', '', 'lorrem ipsum', 500, '', 'hırka', 1000, '1'),
(32, 4, '2024-09-19 18:31:20', 'ceket', 'ceket', 'lorrem ipsum', 1000, 'url', 'ceket', 100, '1'),
(33, 11, '2024-09-19 18:31:20', 'pantolon', '', 'lorrem ipsum', 500, '', 'pantolon', 1000, '1'),
(34, 7, '2024-09-19 18:31:20', 'ceket', 'ceket', 'lorrem ipsum', 1000, 'url', 'ceket', 100, '1'),
(35, 11, '2024-09-19 18:31:20', 'pantolon', '', 'lorrem ipsum', 500, '', 'pantolon', 1000, '1'),
(36, 4, '2024-09-19 18:31:20', 'ceket', 'ceket', 'lorrem ipsum', 1000, 'url', 'ceket', 100, '1'),
(37, 3, '2024-09-19 18:31:20', 'pantolon', '', 'lorrem ipsum', 500, '', 'pantolon', 1000, '1'),
(38, 4, '2024-09-19 18:31:20', 'ceket', 'ceket', 'lorrem ipsum', 1000, 'url', 'ceket', 100, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunfoto`
--

CREATE TABLE `urunfoto` (
  `urunfoto_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urunfoto_resimyol` text NOT NULL,
  `urunfoto_sira` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayar`
--
ALTER TABLE `ayar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `banka`
--
ALTER TABLE `banka`
  ADD PRIMARY KEY (`banka_id`),
  ADD UNIQUE KEY `banka_id` (`banka_id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`hakkimizda_id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`),
  ADD UNIQUE KEY `kullanici_id` (`kullanici_id`);

--
-- Tablo için indeksler `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Tablo için indeksler `sepet`
--
ALTER TABLE `sepet`
  ADD PRIMARY KEY (`sepet_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Tablo için indeksler `urun`
--
ALTER TABLE `urun`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `urunfoto`
--
ALTER TABLE `urunfoto`
  ADD PRIMARY KEY (`urunfoto_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `banka`
--
ALTER TABLE `banka`
  MODIFY `banka_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- Tablo için AUTO_INCREMENT değeri `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `sepet`
--
ALTER TABLE `sepet`
  MODIFY `sepet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `urun`
--
ALTER TABLE `urun`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Tablo için AUTO_INCREMENT değeri `urunfoto`
--
ALTER TABLE `urunfoto`
  MODIFY `urunfoto_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
