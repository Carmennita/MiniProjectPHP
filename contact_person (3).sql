-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2023 at 10:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contact_person`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id`, `nama`) VALUES
(5, 'Buddha'),
(4, 'Hindu'),
(1, 'Islam'),
(3, 'Katolik'),
(6, 'Khonghucu'),
(2, 'Kristen');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(45) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `role` enum('admin','staff') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama`, `email`, `uname`, `pass`, `role`) VALUES
(1, 'Robert', 'robert17@gmail.com', 'robert', '486b26829997a644159748d498b9a9eb23519d75', 'staff'),
(2, 'Lisa ', 'lisaaa@gmail.com', 'lisa', 'd2410b3ca2b0eca83a741933f69749e9ae1272cb', 'staff'),
(4, 'Ayu Maniez', 'ayuniez@gmail.com', 'ayu', '51f503d63a4e413bffd8608fc3882c6a980ce0cc', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `idagama` int(11) NOT NULL,
  `tempat_lahir` varchar(45) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `sosmed` varchar(45) NOT NULL,
  `asal_kampus` varchar(45) NOT NULL,
  `quotes` varchar(100) NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `nama`, `gender`, `idagama`, `tempat_lahir`, `tgl_lahir`, `alamat`, `hp`, `email`, `sosmed`, `asal_kampus`, `quotes`, `foto`) VALUES
(1, 'Irgi Rama Sulistio', 'L', 1, 'Bogor', '2002-03-06', 'Kp.Babakan RT:02/03 No:16 Kec.Cileungsi Kab.B', '089612431791', 'irgirama01@gmail.com', 'irgiramz', 'Politeknik Negeri Media Kreatif', 'Semangat dan teruslah berusaha', 'Irgi Rama Sulistio - Irgi Rama.jpg'),
(2, 'Ahmad Fadhliansyah', 'L', 1, 'Dki Jakarta', '2003-06-13', 'Jl Lapangan Roos III', '082114254952', 'fadhliansyah9f@gmail.com', 'fadhliansyaah', 'Stt NF', 'Janganlah menjadi orang yang tidak menghargai orang lain.', 'https://drive.google.com/open?id=1laNPoGSe4ptL_4U55KcKrRTTztmFPxKX'),
(3, 'Nata Nara Narendra Putra Suanda', 'L', 4, 'Sumbawa Besar', '2003-07-30', 'Jl. Gunung Agung Gang. 1C Perumahan Pesona Ag', '089675998114', 'natanaranarendra@gmail.com', 'natanaraps', 'Universitas Udayana', 'Tetap semangat walaupun hidup sangat berat', 'https://drive.google.com/open?id=115I2R31TKlFJRWHCEuvrmzamrsLzLUM5'),
(4, 'Muhammad Jaisy Adli', 'L', 1, 'Bekasi', '2004-01-13', 'Jln. H. Taqwa no 108 rt/rw 006/009', '089512391211', 'muhjaisyadli@gmail.com', 'jaisyadli', 'STT NF', '2 3 ular kebo\nkita hidup harus semangat tlus lo phei phei', 'https://drive.google.com/open?id=1BR35Cwh4lkbehB2r_wy15CvH6p832A4z'),
(5, 'Adi', 'L', 1, 'Pamekasan', '2000-10-29', 'Sumber Waru Waru Jawa Timur', '081937264222', 'adilrindu29@gmail.com', '@adialfatih45', 'Institut Sains danTeknologi Annuqayah', 'Jangan pernah takut untuk mencoba', 'https://drive.google.com/open?id=13omsJheY-SQdMeqRAmQdPKiEEmdLOsYg'),
(6, 'Qonita Azizah', 'P', 1, 'Panyalaian', '2002-03-08', 'Jalan Allogio barat 3, Medang, kec pegedangan', '085761434808', 'qonita.azizah@student.pradita.ac.id', 'qonitaazh_', 'Pradita University', 'Jadi diri sendiri', 'https://drive.google.com/open?id=1hyy9LLgJGTaidRW0i7RkwzAIe38GwP3x'),
(7, 'Milda Khusnul Khotimah', 'P', 1, 'Lumajang', '2003-02-26', 'Lumajang, Jawa Timur', '087863533945', 'mildakhusnul999@gmai.com', '_mldkhsnl', 'Politeknik Negeri Malang', 'Life is to be grateful', 'https://drive.google.com/open?id=1a_oAIGwdGNKIQh45_gpE_k2OeWkEAjaD'),
(8, 'Izzudin muktar', 'L', 1, 'Depok', '2003-06-27', 'Dsn bebegan, jati kabupaten Blora Jawa Tengah', '083122661966', 'izudinmuktar5@gmail.com', 'mukktaaaaar', 'STT Terpadu Nurul Fikri', 'Guru terbaik adalah pengalaman orang lain.', 'https://drive.google.com/open?id=1c27-7GPo18iPhl36dZjQPE9GLiEioZ6k'),
(9, 'MOCH FIKRI RAMADHAN', 'L', 1, 'Depok', '2001-10-11', 'JL. Situ Indah No.3 Rt.06/10 Kel.Tugu Kec.Cim', '089684711291', 'libr.libr1711@gmail.com', '@fikrii1711', 'Sekolah Tinggi Teknologi Terpadu Nurul Fikri', 'Everything you do, do it 100%', 'https://drive.google.com/open?id=1PzkglugW8cyuF3thY1JGguD3AdNrqlza'),
(10, 'Sri Lestari', 'P', 1, 'Pati', '2002-09-28', 'Ds.Sukolilo RT 06/RW 07', '08157945227', 'lestatari41@gmail.com', 'taarrrrri', 'Universitas Muria Kudus', 'Tuhan memiliki rencananya sendiri. Percayai itu dan nikmati saat ini.', 'https://drive.google.com/open?id=1rb8q3qwIXQI4R5FemydeI-udb6kq1FPR'),
(11, 'Septia Dwi Kurniasih', 'P', 1, 'Jakarta', '1995-09-18', 'Kp. Pulo Makasar Jakarta Timur', '087889018920', 'septiadk2@gmail.com', 'cepiaaaws', 'Unsurya', 'Sebaik apapun diri kita, kita tidak akan pernah terlihat sempurna oleh manusia lain.', 'https://drive.google.com/open?id=1mWdoGZrpNmXO6QfczdFhs3RvZD_wCcPI'),
(12, 'Putra Habib Al Aziz', 'L', 1, 'Rantau karya', '2003-12-23', 'OKI, Sumatera Selatan', '085377519996', 'putrahabibalaziz@gmail.com', 'ajizz11_', 'Politeknik Manufaktur Negeri Bangka Belitung', 'Bernafaslah selagi masih hidup', 'https://drive.google.com/open?id=1mR353F0eybxXSTF9lk9ky2AetRFkebl5'),
(13, 'Siti Amdah', 'P', 1, 'Tangerang', '2001-04-14', 'Tigaraksa, Tangerang-Banten', '08979281365', 'siti.amdah14@gmail.com', 'amdah14', 'STT Terpadu Nurul Fikri', 'مَنْ جَدَّ وَجَدَ', 'https://drive.google.com/open?id=1AvYIqRSxsY-dD4IQ732Gj-vKY7xCm2GM'),
(14, 'Renawati', 'P', 1, 'Tangerang', '2001-05-22', 'Kp.Daraham', '085282884467', 'rena09910@gmail.com', 'ren_aniqobie', 'STT Terpadu Nurul Fikri', 'If you\'re finish changing, you\'re finished', 'https://drive.google.com/open?id=1qaaZaNsJJRAdljIavvpmfrWF7ZwN7hE1'),
(15, 'Hanif Hidayatulloh', 'L', 1, 'Brebes', '2003-11-28', 'Purwokerto Utara', '087862678478', 'hanifhidayatulloh2811@gmail.com', 'hanief_nief', 'Universitas Amikom Purwokerto', '\"Jangan kau penjarakan ucapanmu, jika kau menghamba kepada ketakutan kau hanya akan memperpanjang ba', 'https://drive.google.com/open?id=1tqaKGY1YGOqyQ5zcNHWJVhCoMxtXwdQR'),
(16, 'Ariza Akmal Syahida', 'L', 1, 'Bantul', '2003-04-13', 'Bantul, Daerah Istimewa Yogyakarta', '083849257999', 'arizaakmal04@gmail.com', 'arizaakmal13', 'Universitas Amikom Yogyakarta', 'Jadilah lebih baik dari hari kemarin', 'https://drive.google.com/open?id=1rdiEKa9Bqwg5Qa8qdabJgLSHEQvG3ZCf'),
(17, 'Muarif Rizqy', 'L', 1, 'Brebes', '2001-11-21', 'Kec. Paguyangan jl. Bumiayu - Purwokerto', '085326762608', 'murizqyarf17@gmail.com', 'Arif_rzym', 'Universitas Peradaban', 'Ayo makan biar nggak mati', 'https://drive.google.com/open?id=1Y7HCxeWngkXlQog-ndzKnoS-Ur7Kr_d9'),
(18, 'Muhammad Alifi Ferdiansyah', 'L', 1, 'Tulungagung', '2000-07-24', 'Desa Tenggong, Kecamatan Rejotangan, Kabupate', '088217206039', 'alifi240700@gmail.com', 'alifi_24', 'Universitas Bhinneka PGRI', 'Just Do It Man!', 'https://drive.google.com/open?id=1akCTlNpVT2-bCQf8vgb0CcXHg99nMM3O'),
(19, 'Fajar septianto', 'L', 1, 'jakarta selatan', '2002-09-06', 'cinere, depok', '085889432197', 'fajar23.septianto@gmail.com', 'slashandback', 'STT Nurul Fikri', 'we can buy the time. setiap proses yang bisa di kurangi waktunya sama dengan membeli waktu', 'https://drive.google.com/open?id=1PeeilCPErcChk9NojIKtVpqdhdwGPBtj'),
(20, 'Kurniawan', 'L', 1, 'Sumedang', '2001-08-19', 'Sumedang', '081411096708', 'ikurniawannf@gmail.com', 'i_kr19', 'SEKOLAH TINGGI TEKNOLOGI TERPADU NURUL FIKRI', 'Jangan malu untuk menjadi diri sendiri', 'https://drive.google.com/open?id=18vV_Q4cNlRxk6qBx-nM26RUfJZ9-781w'),
(21, 'Muhammad Bahrul Ulum', 'L', 1, 'Pontianak', '2002-09-15', 'Jalan Bujama Desa Pal IX Kecamatan Sungai Kak', '087716374672', 'rangga.agg2018@gmail.com', '@ulum_kane', 'Universitas Tanjungpura', 'Dunia memang tidak memihakmu, Tapi bukan berarti kau harus kalah darinya', 'https://drive.google.com/open?id=1RIem8WkIZ6jtL9u17lSegXTi4ABiAeiu'),
(22, 'Zian Naisila Anjarwati', 'P', 1, 'Sumedang', '2001-02-24', 'Jl. Caringin Cikungkurak Bandung', '089652639063', 'ziannaisilaa@gmail.com', 'ziannaisilaa', 'STMIK - IM Bandung', 'spion dulu diri sendiri, baru klakson orang lain', 'https://drive.google.com/open?id=1XjkckNT2mp9sEa3NcqAAfIjELkDDQGcy'),
(23, 'Hadi Prasetiyo', 'L', 1, 'Samarinda', '2002-06-16', 'Samarinda, Kalimantan Timur', '085711228592', 'hadiiyok01@gmail.com', '@hadiiprasetiyo', 'Universitas Mulawarman', 'Sesulit apapun tugasmu pasti akan selesai dimenit terakhir', 'https://drive.google.com/open?id=1Fw1ClGFHPwcELblvyGYVivxt302Nwu_y'),
(24, 'Euis safania', 'P', 1, 'Cirebon', '2001-10-25', 'Kabupaten Cirebon Provinsi Jawa Barat', '083156525468', 'euissafania8703@students.unnes.ac.id', '@safania.euis', 'Universitas Negeri Semarang', '\"Sukses bukanlah kunci kebahagiaan, tapi kebahagian adalah kunci sukses\"', 'https://drive.google.com/open?id=1IMAG6png-s8jp_AI4rytJtymXW-YKocH'),
(25, 'Ulayya Salmaa Khoirunnisaa', 'P', 1, 'Kudus', '2003-05-28', 'Bulungcangkring RT 03/ RW 01, Kec. Jekulo, Ka', '081215627905', 'ulayyasalmaa28@gmail.com', 'salmaaul._', 'Universitas Muria Kudus', 'Hidup itu seperti di drama Korea, penuh dengan plot twist, tapi pasti ada episode happy endingnya.', 'https://drive.google.com/open?id=1H5GlVSkQL6WGL-fHEmCn-ncfjHLKNzkf'),
(26, 'Ahmad Riziq', 'L', 1, 'Jakarta', '2002-07-18', 'Kp.Roke Des. Negkasari Kec.Jasinga Kab. Bogor', '085939446587', 'ahmadriziq010@gmail.com', '@arizieq', 'Sekolah Tinggi Teknologi terpadu Nurul fikri', 'Satu Satunya perjalanan yg Mustahil, adalah perjalanan yg tidak pernah kamu mulai', 'https://drive.google.com/open?id=1DmXduVSdQeHobycZQ0Mbw61q1v7pkGAs'),
(27, 'Carmennita Soleman', 'P', 2, 'Samarinda', '2004-01-24', 'Jl. Budaya Pampang, Samarinda, Kalimantan Tim', '085350232057', 'nitacarmen06@gmail.com', '@carmeennita', 'Universitas Mulawarman', 'Be Grateful', 'https://drive.google.com/open?id=1nZWzBonQHCL7qG44jSDRjcASqs38fIis'),
(28, 'Dimas Andhika Firmansyah', 'L', 1, 'Pemalang', '2003-07-20', 'Pemalang, Jawa Tengah', '089630147925', 'dmsandhika87@gmail.com', 'dmsandhika_', 'Universitas Negeri Semarang', 'Jika kamu merasa tidak ada orang baik, jadilah orang baik tersebut', NULL),
(29, 'Ahmad Zuaidi', 'L', 1, 'Sumenep', '2001-11-02', 'Lembung Barat Lenteng Sumenep Jatim', '085963093822', 'ahmadzuaidi892@gmail.com', 'ahmd.zdi__', 'IST Annuqayah', 'Fatum brutum amor fati. Sebab kata orang Tuhan tidak pernah bermain dadu.', 'https://drive.google.com/open?id=1LyEIh0jXxE8gLkhQDWxuVcdMoIZXaOzD'),
(30, 'SHABRINA PRIMADEWI', 'P', 1, 'Kudus', '2003-01-09', 'Desa Sadang, Rt 03 Rw 02, Kecamatan Jekulo, K', '085848686194', 'shabrinaprima@gmail.com', 'shabrinampol', 'Universitas Muria Kudus', 'Kamu seringkali berkata gak sanggup, bahkan beberapa kali ingin menyerah, tapi lihat kamu masih bert', 'https://drive.google.com/open?id=1ESsoqDwVWY_q3LiLmxoy9WZb0JTN50x8'),
(31, 'Ridwan Khomarudin Muharram', 'L', 1, 'Tanggerang', '2003-03-10', 'Citayam kp. Kelapa gg. Nusaindah rt04/rw16', '081281238348', 'ridwanmts812@gmail.com', '@arraaamm__', 'STT Terpadu Nurul Fikri', 'Klo bisa dilakukan skrng knpa harus bsk.', NULL),
(32, 'Anisa', 'P', 1, 'Depok', '2003-10-09', 'Kp. Sindangkarsa Rt01/07, sukamaju baru, Tapo', '083895461608', 'anisaaabcd@gmail.com', 'SyNissa', 'Stt terpadu nurul Fikri', 'Stop wishing, start doing! :)', 'https://drive.google.com/open?id=1Fw2MmxtHNcXqbCBABM36nBoqkUFDGead'),
(33, 'Shafa Salsabila Febriani', 'P', 1, 'Depok', '2002-02-20', 'Jl Bhakti Abri Rt 02 Rw 10', '0895706510309', 'shafafebriani4@gmail.com', '@shafaslls', 'UBSI Depok', 'jadilah diri sendiri', 'https://drive.google.com/open?id=1JB3fF2lruthW8lZo52nIzd_zpxlUwNvc'),
(34, 'Febi Febiyanti', 'P', 1, 'Garut', '2003-02-27', 'Jl. KH Hasan Arif, Kp. Pagersari RT.01 RW.06 ', '085860257486', 'febi20289ti@student.nurulfikri.ac.id', '_ffyyyyyyy', 'Sekolah Tinggi Teknologi Terpadu Nurul Fikri', '\"Terkadang, perubahan adalah kunci untuk pertumbuhan.\"', 'https://drive.google.com/open?id=1FW-YgB8HMbvf9CO4BYUZmAnTD-YAClID'),
(35, 'Nasyath Faykar', 'L', 1, 'Pekalongan', '2002-11-30', 'Jalan KH Ahmad Dahlan Tirto Gg. 7 No. 31', '088806923500', 'nasyathfaykar@gmail.com', 'faykarr_', 'STMIK WIDYA PRATAMA PEKALONGAN', 'Learn to be best rather than yesterday.', 'https://drive.google.com/open?id=1G9_p8X7kBKB3iZrkzaLFXji-11gcfEG4'),
(36, 'Maulidhiansyah Bayu Setiawan', 'L', 1, 'Jakarta', '2003-05-10', 'Jl. Jantung Harapan RT 08/07 Kel.pabuaran Kec', '089507631813', 'maulidhiansyahbayu@gmail.com', '@inibayou', 'STT Terpadu Nurul Fikri', 'Hiduplah seperti larry', 'https://drive.google.com/open?id=1WUHjzatdfOhw6Sffchtc45EnPaTuErUC'),
(37, 'RANGGA EKKLESIA GABRIEL ANUGRAHNU', 'L', 2, 'Palangka Raya', '2002-06-08', 'Jl.Perkebunan komp perikanan', '083143508517', 'ranggaekkle20020806@gmail.com', 'rangga_e.g.a', 'UNIVERSITAS PALANGKARAYA', 'Ngoding Tanpa Error impossible!', NULL),
(38, 'Muhammad Alif Firdaus Arizona', 'L', 1, 'Surabaya', '2002-03-14', 'Perum TNI AL Candi', '082132306322', '20410100080@dinamika.ac.id', '@afarizona_', 'Universitas Dinamika', 'Aut viam inveniam aut faciam', 'https://drive.google.com/open?id=1cka9eIGnmY58edSq4J8hWXZ4k_diG8_Z'),
(39, 'Mukhammad Rifkhi Rifangga', 'L', 1, 'Kudus', '2002-05-13', 'Sunggingan RT 03 RW 03 Kota Kudus', '08812670156', 'rifkhirifangga@gmail.com', '@rifkhi.rifangga_', 'Universitas Muria Kudus', 'Tawa adalah cara terbaik untuk lupa', 'https://drive.google.com/open?id=199oRqigNkF6JmMomQMCyVN7DE35ZWn4W'),
(40, 'Winanda afrilia harisya', 'P', 1, 'Sungai penuh', '2003-04-26', 'Kapalo koto, Pauh, Padang', '+62 878-4218-27', 'winandaafrilia0304@gmail.com', '@_winandaah', 'Universitas Andalas', '\"Walaupun hidup tidak menyenangkan akhir akhir ini, tapi setidaknya masih layak di jalani dan dicoba', NULL),
(41, 'Muhammad Anwar Fauzan', 'L', 1, 'Serang', '2003-01-15', 'Bumi Agung Permai 1', '085939410330', 'anwar.fauzan98@gmail.com', '@anwarfz__', 'Universitas Banten Jaya', 'Your future created by what you do today not tomorrow', 'https://drive.google.com/open?id=1zE3ysQ6UVYwN7UNodg2PQvZZeiEIKtBT'),
(42, 'Erick Darmawan', 'L', 1, 'Kota Serang', '2003-08-13', 'Kota Serang', '085282568210', 'erickdarmawanboeniarto130803@gmail.com', '@erick.db13', 'Universitas Banten Jaya', 'tetap Semangat', 'https://drive.google.com/open?id=10MgTZ7xmnRdCM8znyAaZUVbeYSP2Td_L'),
(43, 'Lora Lorensa Manafe', 'P', 2, 'Sulamu', '2001-10-30', 'Sulamu', '081353024713', 'lhomanafe@gmail.com', '@Lhomnfe30', 'Politeknik Negeri kupang', 'Jalan mu memang beda dengan mereka, tetapi kamu akan lebih kuat dari mereka.', NULL),
(44, 'Bagus Febriyanto', 'L', 1, 'Pati', '2002-02-02', 'Kab. Pati, Kec. Tayu, desa Pondowan', '08978270522', 'bagusfebriyanto19@gmail.com', '@__imnotbgs', 'Universitas Muria Kudus', 'Itami o kanjiro\n\nItami o kangaero\n\nItami o uketore\n\nItami o shire\n\nKoko yori.... sekai ni itami o...', 'https://drive.google.com/open?id=1AYoQdvBrKcYi0B3IDswj3EDimV6PSkbN'),
(45, 'Safitri', 'P', 1, 'Jakarta', '2003-10-16', 'Jakarta', '084567444545', 'safitri1337@gmail.com', 'safitri16__', 'Universitas Bina Nusantara', 'Nothing', ''),
(46, 'Bagus Muhammad Mumtaza', 'L', 1, 'Kota Pekalongan', '2003-08-20', 'Indonesia, Jawa Tengah, Kota Pekalongan, Jl. ', '085875282178', 'bagusbendan07@gmail.com', '@mmtza.mm', 'STMIK Widya Pratama Pekalongan', 'Tetap semangat dan jangan menyerah apapun yang terjadi', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agamacol_UNIQUE` (`nama`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `logincol_UNIQUE` (`uname`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hp_UNIQUE` (`hp`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `sosmed_UNIQUE` (`sosmed`),
  ADD KEY `fk_person_agama_idx` (`idagama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `fk_person_agama` FOREIGN KEY (`idagama`) REFERENCES `agama` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
