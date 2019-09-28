-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Agu 2019 pada 01.13
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_umkm`
--
CREATE DATABASE IF NOT EXISTS `db_umkm` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_umkm`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `slug`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Panduan Untuk Bergabung di Rumah Kreatif Mawar', 'Panduan-Untuk-Bergabung-di-Rumah-Kreatif-Mawar', '<p>1. Daftar pada website Rumah Kreatif Mawar dengan menggunakan alamat email yang masih aktif</p>\r\n\r\n<p>2. Menunggu verifikasi dari email dan dari admin Rumah Kreatif Mawar</p>\r\n\r\n<p>3. Akun yang telah terverifikasi bisa menambahkan produk yang akan ditawarkan</p>\r\n', '2019-08-05 14:16:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tumbnail` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_umkm` int(11) NOT NULL,
  `user_email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id`, `title`, `tumbnail`, `content`, `slug`, `id_umkm`, `user_email`, `created_at`, `updated_at`) VALUES
(1, 'memulai bisnis dengan kain batik', '3eea778bbd712c9a23d04f1b49397b9c.JPG', '<p><strong>Banyuwangi -&nbsp;</strong>Banyak orang meyakini pendidikan adalah kunci dalam meraih kesuksesan di bidang usaha apapun. Berbeda dengan Susiyati pengusaha batik asal Kecamatan kabat, Kabupaten Banyuwangi, ia menampik keyakinan bahwa pendidikan adalah segalanya. Dia yakin&nbsp;terpenting menjalankan usaha dengan kemampuan&nbsp;<em>soft skill&nbsp;</em>yang mumpuni diimbangi dengan keberanian. Sebagaimana ia merintis usaha batik mulai awal.</p>\r\n\r\n<p>&ldquo;Sudah jamak orang-orang menilai bahwa pendidikan adalah segalanya. Namun sekarang anggapan seperti itu tidak juga benar. Nyatanya sekarang banyak lulusan sarjana atupun magister kebingungan mengurusi dirinya sendiri, apalagi mengurus orang lain. Boleh jadi mereka secara keilmuan mumpuni, belum tentu juga dalam aplikasi lapangan mereka menguasai,&rsquo;&rsquo; tutur istri Mujiono.</p>\r\n\r\n<p>Susi mengaku, sejak duduk sekolah dasar ia mulai belajar menjahit dan sekaligus membordir di bawah panduan bibinya. Dengan sabar ia menerima berbagai arahan dari bibinya.&nbsp;Karena ia meyakini berawal dari bimbingan bibinya, mampu menjadikan penjahit dan pembordir profesional di kemudian hari.</p>\r\n\r\n<p>Konsistensi, kerja keras, dan pantang menyerah yang dimiliki Susi benar-benar diterapkan. Pada akhirnya, lulus SMP ia memilih untuk bekerja dalam bidang&nbsp;<em>garment</em>&nbsp;di Pulau Dewata. &ldquo;Pemilihan ini penuh tantangan dengan terus fokus untuk terus belajar dan berjuang. Pilihan bekerja dalam bidang&nbsp;<em>garment</em>&nbsp;ini saya lakukan sampai dapat mendirikan usaha sendiri dalam bidang bordir dan menjahit. Meski kain didapatkan dari perusahaan lain, saya hanya membantu menjahit dan membordirkannya. Selepas itu, baru dikirim kembali. Pun tak menolak jika ada pelanggan yang ingin menjahit dan membordir pakaian pribadi. Sampai saat itu memiliki karyawan tetap,&rdquo; ujar Susi.</p>\r\n', 'memulai-bisnis-dengan-kain-batik', 1, 'weniayu2@gmail.com', '2019-08-06 13:38:26', '0000-00-00 00:00:00'),
(2, 'kegigihan dalam merintis usaha', 'efaec10ef1f83a98388ee7218f322897.JPG', '<p>Memulai usaha sepatu harus jungkir balik dalam merintis dan mempertahankan usaha kerajinannya. Kerap kali menelan pahit manisnya melakoni usaha kerajinan tangannya.Ia mengaku perintisan usahanya nyaris tanpa modal sama sekali. memberanikan diri promosi ke beberapa tetangga sekitar. Ia mengisahkan waktu&nbsp;itu hanya bermodalkan &#39;ini&#39; (sambil menunjukkan lisannya). Dia&nbsp;katakan sanggup menerima dan sekaligus membuatkan aneka kerajinan.</p>\r\n\r\n<p>Namun, tetap saja tawarannya tidak menuai harapan secara langsung. Butuh waktu&nbsp;untuk meyakinkan calon konsumen yang sekaligus tetangganya. Setelah itu, sang suami membuatkan sample produk kerajinan khusus untuk promosi.</p>\r\n\r\n<p>Dengan berbekal keahlian yang didapatkan suaminya sejak bujang kerja di Bali. Matnawa&nbsp;berhasil menyulap barang-barang yang tidak memiliki nilai ekonomi menjadi produk yang memiliki daya jual tinggi. Sample telah siap, kembali mempromosikan produk&nbsp;kepada para tetangga. Waktu itu, dia masih menetap di Banyuwangi&nbsp;<strong>bukan&nbsp;</strong>di Bali. Tepatnya di perumahan yang sampai sekarang ia tempati di Perum Klatak Asri, Blok E2, Kelurahan Klatak, Kecamatan Kalipuro, Kabupaten Banyuwangi.</p>\r\n\r\n<p>Pada akhirnya, membangun sistem dengan bayar dimuka terlebih dahulu. Berbekal uang pesanan yang telah dibayarkan, ia membeli dan mencari bahan perlengkapan yang dibutuhkan. Kemudian membuat produk sesuai dengan pesanan. Sisihan dari pembayaran ia simpan sebagai keuntungan yang dapat diputar kembali.</p>\r\n', 'kegigihan-dalam-merintis-usaha', 2, 'adeliaananda45@gmail.com', '2019-08-11 04:05:43', '0000-00-00 00:00:00'),
(3, 'kreatifitas tanpa batas', '223b199120042a1273285ee3749881d6.JPG', '<p>Semakin maju suatu Negara semakin banyak orang yang terdidik, dan banyak pula orang menganggur, maka semakin dirasakan pentingnya dunia wirausaha. Kenyataannya bahwa jumlah wirausahawan Indonesia masih sangat sedikit dan mutunya belum bisa dikatakan hebat, sehingga persoalan pembangunan wirausaha Indonesia merupakan persoalan mendesak bagi suksesnya pembangunan. Banyak faktor psikologis yang membentuk sikap negatif masyarakat sehingga mereka kurang berminat terhadap profesi wirausaha, antara lain sifat agresif, ekspansif, bersaing, egois, tidak jujur, kikir, sumber penghasilan tidak stabil, kurang terhor mat, pekerjaan rendah, dan sebagainya. Pandangan semacam ini dianut oleh sebagian besar penduduk, sehingga mereka tidak tertarik. Mereka tidak menginginkan anak-anaknya menerjuni bidang ini, dan berusaha mengalihkan perhatian anak untuk menjadi pegawai negeri, apalagi bila anaknya sudah bertitel lulus perguruan tinggi.</p>\r\n\r\n<p>Landasan filosofis inilah yang menyebabkan rakyat Indonesia tidak termotivasi terjun ke dunia bisnis. Negara Indonesia tertinggal jauh dari negara tetangga, yang seakan-akan memiliki spesialisasi dalam profesi bisnis. Mereka dapat mengembangkan bisnis besar-besaran mulai dari industri hulu sampai keindustri hilir, meliputi usaha jasa, perbankan, perdagangan besar (grosir),eksportir, importir, dan berbagai bentuk usaha lainnya dalam berbagai jenis komoditi.</p>\r\n\r\n<p>Pemberdayaan masyarakat dalam ekonomi rakyat memang perlu menjadi perhatian bersama, terutama dalam masa-masa sekarang ini, dimana masyarakat menjadi semakin dituntut untuk aktif berperan dan bekerja lebih keras untuk memenuhi kebutuhan hidup sehari-hari. Baik laki-laki maupun perempuan dituntut untuk dapat mencari peluang dan kesempatan agar dapat berkarya dan berkreasi, sekaligus untuk memenuhi kebutuhan.</p>\r\n\r\n<p>Sehingga dengan adanya Rumah Kreatif yang berguna untuk menampung, membimbing, dan membina rakyat untuk memiliki keahlian khusus yang nantinya dapat digunakan sebagai peluang usaha. Meskipun usaha micro di Indonesia hampir mencapai 57 juta, dirasa masih perlu untuk mendapatkan bimbingan yang lebih agar para pelaku usaha dapat meningkatkan usahanya.</p>\r\n\r\n<p>Dengan berkembangnya teknologi, manusia akan sangat mudah mendapatkan suatu informasi khususnya kemajuan teknologi internet. Dengan adanya internet, seseorang akan lebih mudah mendapatkan suatu informasi, mempercepat aktifitas, dan memberi ruang untuk seseorang dalam memenuhi kebutuhan sehari-hari. Salah satu pemanfaatan internet semakin terlihat ketika banyak pemakai internet yang memanfaatkannya sebagai peluang bisnis. Sehingga dengan adanya kemajuan teknologi ini harus dimanfaatkan oleh para pelaku usaha untuk dapat mempromosikan dan menjual usahanya.</p>\r\n\r\n<p>Dengan adanya Rumah Kreatif sebagai wadah bagi para pelaku UKM yang tersebar di seluruh Kabupaten Banyuwangi, maka untuk memperluas jangkauannya dirasa perlu membuat website Rumah Kreatif. Website Rumah Kreatif akan digunakan oleh para UKM untuk mempromosikan hasil karyanya, sebagai pusat data dan informasi serta sebagai pusat edukasi, pengembangan dan digitalisasi Usaha Kecil Menengah (UKM). Selain untuk para pelaku UKM, sistem informasi dapat dimanfaatkan masyarakat untuk mengetahui hasil karya, promosi dan kegiatan UKM. Sehingga memudahkan pengguna untuk dapat mengetahui informasi terbaru dari website Rumah Kreatif.</p>\r\n', 'kreatifitas-tanpa-batas', 1, 'weniayu2@gmail.com', '2019-08-20 09:38:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `business_type`
--

CREATE TABLE `business_type` (
  `id` int(11) NOT NULL,
  `bussines_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `business_type`
--

INSERT INTO `business_type` (`id`, `bussines_type`) VALUES
(1, 'micro'),
(2, 'kecil'),
(3, 'menegah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_umkm`
--

CREATE TABLE `data_umkm` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vision` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mision` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_business_type` int(11) NOT NULL,
  `user_email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_form` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_approved',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_umkm`
--

INSERT INTO `data_umkm` (`id`, `name`, `address`, `vision`, `mision`, `id_business_type`, `user_email`, `business_form`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pringgokusumo', 'Desa Labanasem Kecamatan Kabat, Kabupaten Banyuwangi', 'Melestarikan  dan menumbuhkan tradisi batik Banyuwangi sebagai salah satu upaya untuk  meningkatkan kesejahteraan masyarakat Banyuwangi pada khususnya dan menumbuhkan industri kerajinan batik Indonesia pada  umumnya.', '1. Batik Banyuwangi bisa lebih dikenal di kancah dunia batik nasional dan internasional.\r\n2. Meningkatkan kualitas dan daya saing yang berpotensi untuk memasuki pasar global.\r\n3. Memperkaya desain motif untuk menambah perbendaharaan motif-motif tradisional yang sudah ada dan memasyarakat', 2, 'weniayu2@gmail.com', 'Batik', 'approved', '2019-08-06 13:15:03', '2019-08-06 13:25:54'),
(2, 'Salsa Shoes', 'Karangrejo, Banyuwangi, Jawa Timur', 'Menyalurkan aspirasi pengusaha dan perajin di bidang kerajinan untuk lebih mendorong jiwa kewiraswastaan hingga menjadikan para perajin dan produsen sebagai pengusaha profesional dan sekaligus mendukung usaha pemerintah untuk menyukseskan program Pembangunan Ekonomi Nasional.', '1. Membantu mengatasi hambatan dalam proses produksi dan pemasaran.\r\n2. Membuka peluang pemasaran produk kerajinan di dalam maupun di luar negeri.\r\n3. Membantu pengembangan design produk kerajinan yang berorientasi pasar.\r\n4. Membuka wawasan berpikir para UKM produk kerajinan untuk meningkatkan usahanya.', 3, 'adeliaananda45@gmail.com', 'Sepatu Kulit', 'approved', '2019-08-11 03:34:55', '2019-08-11 03:37:05'),
(3, 'lintang aksesoris', 'banyuwangi', 'Dengan adanya Rumah Kreatif sebagai wadah bagi para pelaku UKM yang tersebar di seluruh Kabupaten Banyuwangi, maka untuk memperluas jangkauannya dirasa perlu membuat website Rumah Kreatif. Website Rumah Kreatif akan digunakan oleh para UKM untuk ', 'Dengan adanya Rumah Kreatif sebagai wadah bagi para pelaku UKM yang tersebar di seluruh Kabupaten Banyuwangi, maka untuk memperluas jangkauannya dirasa perlu membuat website Rumah Kreatif. Website Rumah Kreatif akan digunakan oleh para UKM untuk ', 2, 'lintangherbianti@gmail.com', 'usaha pribadi', 'approved', '2019-08-20 09:45:11', '2019-08-20 09:46:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_product` text COLLATE utf8mb4_unicode_ci,
  `id_umkm` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `descriptions`, `link_product`, `id_umkm`, `id_category`, `created_at`, `updated_at`) VALUES
(1, 'Batik Kangkung Setingkes', '9a690ca862f5cf1be6dd3025330e236d.JPG', '<p>yang di ikat dalam sebuah tali yang mempunyai makna penting nya sebuah kerukunan dalam hidup berumah tangga. produk ini dibuat menggunakan teknik Tulis, karya eksklusif UKM Canting Mustika yang merupakan perajin asli Banyuwangi. Batik Kangkung Setingkes - Canting Mustika adalah produk UKM unggulan yang bisa Anda dapatkan hanya di banyuwangi-mall.com.&nbsp;Dengan berbelanja di www.banyuwangi-mall.com anda sudah ikut berpartisipasi untuk pertumbuhan para UKM di Banyuwangi.</p>\r\n', 'https://www.instagram.com/gallery_batik_banyuwangi', 1, 1, '2019-08-06 13:33:16', '2019-08-25 04:04:29'),
(2, 'Batik Gajah Oling', '3dbadb1b312ea3904dc82df9154bf04c.JPG', '<p>ng (belut sungai) berbentuk seperti tanda tanya. Melihat dari arti kata nya Gajah bertubuh besar dan Uling berarti eling (ingat). Sehingga gajah oling ini bermakna kita harus selalu mengingat yang maha agung (Tuhan). Produk ini dibuat menggunakan teknik cap, karya eksklusif UKM Najiha yang merupakan perajin asli Banyuwangi. Kain Batik Gajah Oling Bunga Roda - Najiha adalah produk UKM unggulan yang bisa Anda dapatkan hanya di banyuwangi-mall.com. Dengan berbelanja di www.banyuwangi-mall.com anda sudah ikut berpartisipasi untuk pertumbuhan para UKM di Banyuwangi.</p>\r\n', 'https://www.instagram.com/gallery_batik_banyuwangi', 1, 1, '2019-08-06 13:59:44', '2019-08-25 04:05:25'),
(3, 'Batik Modern', '4bc1db9b260ab790e9acc88de6020d7d.JPG', '<p>ing (belut sungai) berbentuk seperti tanda tanya. Melihat dari arti kata nya Gajah bertubuh besar dan Uling berarti eling (ingat). Sehingga gajah oling ini bermakna kita harus selalu mengingat yang maha agung (Tuhan). Produk ini dibuat menggunakan teknik tulis, karya eksklusif UKM Najiha yang merupakan perajin asli Banyuwangi. Kain Batik Banyuwangi Klasik Modern - Najiha adalah produk UKM unggulan yang bisa Anda dapatkan hanya di banyuwangi-mall.com. Dengan berbelanja di www.banyuwangi-mall.com anda sudah ikut berpartisipasi untuk pertumbuhan para UKM di Banyuwangi.</p>\r\n', 'https://www.instagram.com/gallery_batik_banyuwangi', 1, 1, '2019-08-06 14:10:37', '2019-08-25 04:05:39'),
(4, 'Sepatu Batik Banyuwangi', '4a4d114aaae0a5e9fb2e1a333dd7e75d.JPG', '<p>Sepatu batik cap dengan aksen pita polos warna hijau.</p>\r\n', 'https://www.instagram.com/thewarna_hk', 2, 2, '2019-08-11 04:09:03', '2019-08-25 04:18:09'),
(5, 'Sepatu Batik Banyuwangi', '951efbc920f9380fd47f4683a8768b8b.JPG', '<p>Sepatu batik semi tulis warna grey aksen pita hitam.</p>\r\n', 'https://www.instagram.com/thewarna_hk', 2, 2, '2019-08-11 04:09:38', '2019-08-25 04:18:43'),
(6, 'Sepatu Batik Banyuwangi', '05d40bb04e047e89e3813e4fd8227fb7.JPG', '<p>Sepatu batik aksen pita jaring orange.</p>\r\n', 'https://www.instagram.com/thewarna_hk', 2, 2, '2019-08-11 04:10:15', '2019-08-25 04:18:57'),
(7, 'Oleh - Oleh Khas Banyuwangi', '4c6cf8240e917a0681d05e177b16405b.JPG', '<p>Berat : 300 gr Isi : 5 pcsKue Kering Rasa Kopi (Cookies Kopi) adalah oleh - oleh khas banyuwangi yang dibuat eksklusif oleh UKM asli Banyuwangi. Rasanya enak dan cocok sebagai teman minum kopi atau teh. Cookies Kopi ini tersedia dalam beberapa rasa rempah diantaranya : adas, keningar, dan jahe. Rasa tersebut merupakan rempah - rempah asli Indonesia.Komposisi : Mentega, tepung, gula, tepung pisang</p>\r\n', 'https://www.instagram.com/thewarna_hk', 2, 4, '2019-08-11 04:33:27', '2019-08-25 04:28:43'),
(8, 'Oleh - Oleh Khas Banyuwangi', '6d86dd66135be69f9ac4aa0a127d7f3c.JPG', '<p>Berat : 200 gIsi : 9 pcsArtisan Noodles Dragon Fruit merupakan salah satu makanan khas banyuwangi yang semakin eksis. Teksturnya yang lebih halus, rasanya yang khas dengan cita rasa manis, gurih dan ditambah sensasi berbagai macam varian rasa dapat dijadikan cemilan saat santai dengan minum kopi atau teh hangat. Bahan dasar dari makanan yang satu ini terbuat dari tepung terigu, tepung tapioka, bua</p>\r\n', 'https://www.instagram.com/thewarna_hk', 2, 4, '2019-08-11 04:34:07', '2019-08-25 04:28:59'),
(9, 'Oleh - Oleh Khas Banyuwangi', 'd69a53ff8c7e6c1454928e31e17da762.JPG', '<p>Dari biji kopi organik khas Banyuwangi. Kopi lanang murni jenis robusta dengan kadar caffein yang tinggi serta cita rasa kopi yang halus.Selain tidak membuat mata mengantuk juga menambah vitalitas / stamina.</p>\r\n', 'https://www.instagram.com/thewarna_hk', 2, 4, '2019-08-11 04:36:53', '2019-08-25 04:29:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_category`
--

INSERT INTO `product_category` (`id`, `category_name`) VALUES
(1, 'kain batik'),
(2, 'tas dan sepatu'),
(3, 'peralatan rumah tangga'),
(4, 'oleh - oleh khas banyuwangi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reset_passwords`
--

CREATE TABLE `reset_passwords` (
  `id` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired_time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `reset_passwords`
--

INSERT INTO `reset_passwords` (`id`, `email`, `token`, `created_time`, `expired_time`) VALUES
(1, 'adeliaananda45@gmail.com', 'OUBzSwRk71s89DvmoEr5KMfl5SMAfyxT2DXCevkON9u2kt03HDgU4Y6WteV12P8hDuOw5et7h7rk5B6jychaoBTmh3O7QMxEF', '2019:08:25 16:38', '2019:08:25 17:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama_depan` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_belakang` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL DEFAULT '2',
  `status_account` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unverified',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama_depan`, `nama_belakang`, `username`, `email`, `password`, `level`, `status_account`, `created_at`, `updated_at`) VALUES
(13, 'weni', 'ayu', 'weniayu', 'dabelyubouquet@gmail.com', '$2y$09$rA2a5kjs26OKDkvLpZ2GXegVbknzAGWxYeKlidWjsAU5MLX0GHxCO', 1, 'verified', '2019-07-07 02:21:17', '2019-07-07 02:23:46'),
(15, 'adelia', 'ananda', 'adelia', 'weniayu2@gmail.com', '$2y$09$knqHjYP2RQraixFJnjqsYeAW2xURLSw70c8rQjRw4WCmpXiDnLpqq', 2, 'verified', '2019-08-06 12:50:20', '2019-08-06 12:53:34'),
(17, 'Salsa', 'Bila', 'Salsa', 'adeliaananda45@gmail.com', '$2y$09$rdVcmeNij/eB.GM1lsGrgOumYRAcBtnwUr8r6D06sho8qKfQacOvq', 2, 'verified', '2019-08-11 03:18:53', '2019-08-25 04:12:30'),
(18, 'lintang', 'herbianti', 'lintang', 'lintangherbianti@gmail.com', '$2y$09$p8X4Ee7k1x4l.xeMCV6UkO7tsSeOS8.Zi1hMCjIvnoAU9BiLqpr.6', 2, 'verified', '2019-08-20 09:41:42', '2019-08-20 09:42:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE `user_level` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `level_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_level`
--

INSERT INTO `user_level` (`id`, `level`, `level_name`) VALUES
(1, 1, 'super_admin'),
(2, 2, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_verifications`
--

CREATE TABLE `user_verifications` (
  `id` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired_time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_verifications`
--

INSERT INTO `user_verifications` (`id`, `email`, `token`, `created_time`, `expired_time`) VALUES
(2, 'weniayu2@gmail.com', 'QvzGOAvoue6ato8UPWDGRJur8PeXoJ8DAYSW6Jk1itu4WHuGxflz', '2019:08:06 14:50', '2019:08:06 15:50'),
(4, 'adeliaananda45@gmail.com', 'bM5vR81CE36NUkkR7EjijGzn59Xrqi64WTA4WgUKOdiLjEHZozWFQfgSM9Exqnez9uxhQhJ9b1Rz0uHjuJeLyr5Z', '2019:08:11 05:18', '2019:08:11 06:18'),
(5, 'lintangherbianti@gmail.com', 'CP30IompBBTdBsjlSwU7TD3EnUi8mz7ceumsL1WS71HOUzlHbtoB5CSSaScQQ1l384ef5As22E3EAbLNnO2rKox0n', '2019:08:20 11:41', '2019:08:20 12:41');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_umkm` (`id_umkm`);

--
-- Indeks untuk tabel `business_type`
--
ALTER TABLE `business_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_umkm`
--
ALTER TABLE `data_umkm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reset_passwords`
--
ALTER TABLE `reset_passwords`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_verifications`
--
ALTER TABLE `user_verifications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `business_type`
--
ALTER TABLE `business_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_umkm`
--
ALTER TABLE `data_umkm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `reset_passwords`
--
ALTER TABLE `reset_passwords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_verifications`
--
ALTER TABLE `user_verifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Database: `pendaftaran`
--
CREATE DATABASE IF NOT EXISTS `pendaftaran` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pendaftaran`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_daftar`
--

CREATE TABLE `tbl_daftar` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `asal` varchar(30) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `status` varchar(20) NOT NULL,
  `laptop` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_daftar`
--
ALTER TABLE `tbl_daftar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_daftar`
--
ALTER TABLE `tbl_daftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Dumping data untuk tabel `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"angular_direct\":\"direct\",\"relation_lines\":\"true\",\"snap_to_grid\":\"off\"}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data untuk tabel `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"db_umkm\",\"table\":\"products\"},{\"db\":\"db_umkm\",\"table\":\"data_umkm\"},{\"db\":\"db_umkm\",\"table\":\"user_level\"},{\"db\":\"db_umkm\",\"table\":\"user_verifications\"},{\"db\":\"db_umkm\",\"table\":\"users\"},{\"db\":\"db_umkm\",\"table\":\"reset_passwords\"},{\"db\":\"db_umkm\",\"table\":\"product_category\"},{\"db\":\"db_umkm\",\"table\":\"business_type\"},{\"db\":\"db_umkm\",\"table\":\"blog\"},{\"db\":\"db_umkm\",\"table\":\"announcement\"}]');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data untuk tabel `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('', '2019-07-15 12:13:05', '{\"lang\":\"id\"}'),
('root', '2019-08-29 22:49:55', '{\"lang\":\"id\",\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indeks untuk tabel `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indeks untuk tabel `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indeks untuk tabel `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indeks untuk tabel `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indeks untuk tabel `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indeks untuk tabel `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indeks untuk tabel `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indeks untuk tabel `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indeks untuk tabel `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indeks untuk tabel `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `pmb`
--
CREATE DATABASE IF NOT EXISTS `pmb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pmb`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_daftar`
--

CREATE TABLE `tbl_daftar` (
  `id_maba` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `tgllahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kelamin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_daftar`
--

INSERT INTO `tbl_daftar` (`id_maba`, `nama`, `tempat`, `tgllahir`, `alamat`, `hp`, `email`, `kelamin`) VALUES
(1, 'erda habiby', 'banyuwangi', '2019-04-15', 'jl a yani', '0811111', 'oke@gmail.com', 'Laki - Laki'),
(9, 'vuvuuv', 'da', '2019-07-18', 'aku', 'asdweq', 'bakakun00@gmail.com', 'Perempuan'),
(10, 'weni', 'bwi', '2000-12-12', 'bwi', '12234658976878', 'weniayu2@gmail.com', 'Perempuan'),
(11, 'weni', 'bwi', '2019-07-21', 'bwi', '12234658976878', 'weniayu2@gmail.com', 'Perempuan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_daftar`
--
ALTER TABLE `tbl_daftar`
  ADD PRIMARY KEY (`id_maba`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_daftar`
--
ALTER TABLE `tbl_daftar`
  MODIFY `id_maba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
