-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2021 at 08:04 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nfs`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id_answer` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi` varchar(30) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id_answer`, `id_question`, `id_user`, `isi`, `date_created`) VALUES
(9, 10, 10, 'Tidak', '2021-09-30 00:55:32'),
(10, 10, 10, 'Tidak', '2021-10-01 09:42:19'),
(11, 10, 10, 'Ya', '2021-10-01 09:42:30'),
(12, 10, 10, 'Tidak', '2021-10-01 09:46:22'),
(13, 10, 10, 'Ya', '2021-10-01 10:22:12'),
(14, 10, 10, 'Tidak', '2021-10-01 10:22:28'),
(15, 10, 10, 'Tidak', '2021-10-01 10:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `slug_kelas` varchar(200) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `slug_kelas`, `nama_kelas`, `tanggal`) VALUES
(15, 'nifas', 'Nifas', '2021-09-21 11:15:25');

-- --------------------------------------------------------

--
-- Table structure for table `komen`
--

CREATE TABLE `komen` (
  `id_komen` int(11) NOT NULL,
  `slug_materi` varchar(100) NOT NULL,
  `comment_status` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `isi_komen` text NOT NULL,
  `tanggal_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komen`
--

INSERT INTO `komen` (`id_komen`, `slug_materi`, `comment_status`, `id_user`, `id_materi`, `id_kelas`, `isi_komen`, `tanggal_post`) VALUES
(232, 'alasan-pengidap-asma-harus-patuh-mengonsumsi-obatnya', 0, 63, 27, 15, 'This file contains server-specific settings. This means you never will need to commit any sensitive information to your version control system. It includes some of the most common ones you want to enter already, though they are all commented out. So uncomment the line with CI_ENVIRONMENT on it, and change.', '2021-09-19 04:37:48'),
(233, 'alasan-pengidap-asma-harus-patuh-mengonsumsi-obatnya', 232, 10, 27, 15, 'In this tutorial, you will be creating a basic news application. You will begin by writing the code that can load static pages. Next, you will create a news section that reads news items from a database. Finally, you’ll add a form to create news items in the databases.', '2021-09-19 04:38:07'),
(234, 'alasan-pengidap-asma-harus-patuh-mengonsumsi-obatnya', 232, 63, 27, 15, 'With that out of the way it’s time to view your application in a browser. You can serve it through any server of your choice, Apache, Nginx, etc, but CodeIgniter comes with a simple command that takes advantage of PHP’s built-in server to get you up and running fast on your development machines. Type the following on the command line from the root of your project.', '2021-09-19 04:38:22'),
(235, 'alasan-pengidap-asma-harus-patuh-mengonsumsi-obatnya', 232, 10, 27, 15, 'Now that you’re in development mode, you’ll see a toolbar on the bottom of your application. This toolbar contains a number of helpful items that you can reference during development. This will never show in production environments. Clicking any of the tabs along the bottom brings up additional information. Clicking the X on the right of the toolbar minimizes it to a small square with the CodeIgniter flame on it. If you click that the toolbar will show again.', '2021-09-19 04:38:32'),
(237, 'alasan-pengidap-asma-harus-patuh-mengonsumsi-obatnya', 232, 63, 27, 15, 'Using color to add meaning only provides a visual indication, which will not be conveyed to users of assistive technologies – such as screen readers. Ensure that information denoted by the color is either obvious from the content itself (e.g. the visible text), or is included through alternative means, such as additional text hidden with the .sr-only class.', '2021-09-19 05:09:07'),
(249, 'alasan-pengidap-asma-harus-patuh-mengonsumsi-obatnya', 245, 63, 27, 15, 'Now that we know how to get started and how to debug a little, let’s get started building this small news application.', '2021-09-20 06:06:40'),
(250, 'pola-makan-sehat-untuk-pengidap-hipoparatiroid', 0, 63, 25, 15, 'very helpful, please share another one ya', '2021-09-20 07:35:22'),
(253, 'pola-makan-sehat-untuk-pengidap-hipoparatiroid', 250, 63, 25, 15, 'waw', '2021-09-20 07:37:29'),
(254, 'pola-makan-sehat-untuk-pengidap-hipoparatiroid', 0, 63, 25, 15, 'newww', '2021-09-20 07:37:35'),
(262, 'alasan-trombosit-rendah-bisa-berbahaya-bagi-tubuh', 0, 10, 33, 15, 'hello world', '2021-09-26 14:33:18'),
(272, 'alasan-trombosit-rendah-bisa-berbahaya-bagi-tubuh', 262, 10, 33, 15, 'coba lagi', '2021-10-08 05:37:14'),
(273, 'alasan-trombosit-rendah-bisa-berbahaya-bagi-tubuh', 262, 10, 33, 15, 'sip', '2021-10-08 05:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `slug_materi` varchar(200) NOT NULL,
  `judul_materi` varchar(200) NOT NULL,
  `isi_materi` text NOT NULL,
  `file_materi` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `id_user`, `id_kelas`, `slug_materi`, `judul_materi`, `isi_materi`, `file_materi`, `tanggal_post`, `tanggal`) VALUES
(25, 10, 15, 'pola-makan-sehat-untuk-pengidap-hipoparatiroid', 'Pola Makan Sehat untuk Pengidap Hipoparatiroid', '<p>Pola makan sehat adalah kunci untuk mengendalikan gejala hipoparatiroid. Pengidap hipoparatiroid perlu mengonsumsi makanan tinggi kalsium dan rendah kandungan fosfat atau fosfor. Contoh makanan yang kaya akan kalsium adalah sayuran berdaun hijau dan sereal. Pengidap hipoparatiroid juga perlu membatasi makanan atau minuman sarat kadar fosfor, seperti daging merah, ayam, nasi, biji-bijian, makanan dari olahan susu, dan minuman bersoda.</p>\r\n\r\n<p>Selain memilih makanan yang tepat. Penting untuk minum 6-8 gelas (1,5-2 liter) air per hari untuk memastikan tubuh tidak kehilangan nutrisi yang diperlukan. Hindari pula kebiasaan minum kopi, alkohol dan merokok yang dapat memperpah hipoparatiroid. Pasca penanganan hipoparatiroid, kondisi pengidap perlu diawasi oleh dokter melalui pemeriksaan darah secara rutin.&nbsp;</p>\r\n\r\n<p>Jika ada perubahan pada kadar kalsium atau fosfat dalam darah, dokter dapat menyesuaikan dosis suplemen kalsium. Kendati demikian, hipoparatiroid merupakan penyakit kronis ketika pengidap perlu melakukan pengobatan dan penyesuaian pola makan sepanjang hidup. Tujuannya untuk menekan gejala hipoparatiroid dan mencegah komplikasi.</p>\r\n\r\n<p><strong>Gejala Hipoparatiroid yang Perlu Diwaspadai</strong></p>\r\n\r\n<p>Pengidap hipoparatiroid biasanya akan mengalami gejala-gejala yang mengganggu, seperti:</p>\r\n\r\n<ul>\r\n	<li>Nyeri otot atau kram yang menyerang otot wajah, perut, kaki, dan tungkai.</li>\r\n	<li>Otot yang berkedut atau tegang di area mulut, tenggorokan, dan lengan.</li>\r\n	<li>Nyeri haid.</li>\r\n	<li>Depresi atau perubahan suasana hati.</li>\r\n	<li>Kulit yang kering dan kuku yang rapuh.</li>\r\n	<li>Memiliki masalah dengan ingatan.</li>\r\n	<li>Lemas.</li>\r\n	<li>Kejang.</li>\r\n</ul>\r\n', '1630867894-ikhza_tbi.png', '2021-09-06 01:51:34', '2021-09-11 07:11:19'),
(26, 10, 15, 'manfaat-bunga-dandelion-untuk-kesehatan-tubuh', 'Manfaat Bunga Dandelion untuk Kesehatan Tubuh', '<p>Kamu pasti sudah tidak asing lagi dengan bunga dandelion. Pasalnya, bunga yang satu ini banyak tumbuh liar di rerumputan. Meskipun sering dianggap gulma, ternyata bunga yang cantik ini punya beragam manfaat kesehatan. Bunga dandelion bahkan telah digunakan selama berabad-abad untuk membantu mengobati beberapa penyakit.</p>\r\n\r\n<p>Ahli botani menganggap dandelion sebagai tanaman herbal. Kamu bisa memanfaatkan daun, batang, bunga, sampai akarnya untuk tujuan pengobatan. Nah, berikut manfaat kesehatan yang bisa diperoleh dari dandelion.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>Manfaat Kesehatan dari Bunga Dandelion</strong></h2>\r\n\r\n<p>Tak banyak orang yang tahu jika bunga dandelion dapat dijadikan&nbsp;<a href=\"https://www.halodoc.com/artikel/mulai-dilirik-untuk-pengobatan-apakah-herbal-aman\">obat herbal</a>. Berikut beragam manfaat kesehatan yang bisa kamu peroleh dari bunga dandelion:</p>\r\n\r\n<h3><strong>1. Menangkal Radikal Bebas</strong></h3>\r\n\r\n<p>Bunga dandelion mengandung beta karoten dan polifenol, yaitu antioksidan yang mampu menetralisir efek berbahaya dari radikal bebas. Tahukah kamu kalau tubuh manusia mampu menghasilkan radikal bebas secara alami? Karena alasan ini, radikal bebas yang terbentuk secara alami tersebut berisiko merusak sel, sehingga kamu rentan mengalami&nbsp; penuaan atau perkembangan penyakit tertentu.</p>\r\n\r\n<h3><strong>2. Menurunkan Kolesterol</strong></h3>\r\n\r\n<p>Studi berjudul &ldquo;<em>Hypolipidemic and Antioxidant Effects of Dandelion (Taraxacum officinale) Root and Leaf on Cholesterol-Fed Rabbits&rdquo;</em>&nbsp;meneliti efek konsumsi dandelion pada kelinci. Hasilnya, akar dan daun dandelion ternyata membantu menurunkan kolesterol pada hewan yang menjalani diet tinggi kolesterol. Studi lain pada tikus menemukan bahwa konsumsi dandelion mengurangi kolesterol total dan kadar lemak di hati. Namun, belum ada temuan seberapa efektif penggunaan dandelion untuk menurunkan kolesterol pada manusia.</p>\r\n\r\n<h3><strong>3. Mengatur Gula Darah</strong></h3>\r\n\r\n<p>Ada beberapa bukti yang menunjukkan bahwa dandelion mengandung senyawa yang dapat membantu mengatur gula darah. Melansir dari&nbsp;<em>Medical News Today,&nbsp;</em>pada tahun 2016, beberapa peneliti mengusulkan bahwa sifat antihiperglikemik, antioksidan, dan antiinflamasi pada dandelion dapat membantu mengobati diabetes tipe 2. Namun, penelitian lebih lanjut diperlukan untuk membuat klaim yang sudah pasti.</p>\r\n\r\n<h3><strong>4. Mengurangi Peradangan</strong></h3>\r\n\r\n<p>Beberapa penelitian menunjukkan bahwa ekstrak dan senyawa dandelion dapat membantu mengurangi peradangan dalam tubuh. Studi tahun 2014 yang telah dipublikasikan dalam&nbsp;<em>National Library of Medicine</em>, para peneliti menemukan bahwa bahan kimia yang ada dalam dandelion memiliki beberapa efek positif dalam mengurangi respons peradangan.</p>\r\n\r\n<p>Kendati demikian, penelitian ini dilakukan dalam sel dan bukan pada peserta manusia. Alhasil, perlu penelitian lebih lanjut untuk menyimpulkan efek anti peradangan dari dandelion di tubuh manusia.</p>\r\n\r\n<p><strong>Baca juga:&nbsp;</strong><a href=\"https://www.halodoc.com/artikel/rekomendasi-5-resep-rempah-bantu-kuatkan-imun\">Rekomendasi 5 Resep Rempah Bantu Kuatkan Imun</a></p>\r\n\r\n<h3><strong>5. Menurunkan Tekanan Darah</strong></h3>\r\n\r\n<p>Dandelion adalah sumber potasium yang baik. Bukti klinis menunjukkan bahwa potasium dapat membantu menurunkan tekanan darah. Penelitian berjudul&nbsp;<em>Daily potassium intake and sodium-to-potassium ratio in the reduction of blood pressure: a meta-analysis of randomized controlled trials</em>&nbsp;menemukan bahwa orang yang mengonsumsi suplemen kalium mengalami penurunan tekanan darah, terutama pada pengidap tekanan darah tinggi.</p>\r\n\r\n<h3><strong>6. Membantu Penurunan Berat Badan</strong></h3>\r\n\r\n<p>Tanaman ini mampu meningkatkan metabolisme karbohidrat dan mengurangi penyerapan lemak. Asam klorogenat, bahan kimia yang ada dalam dandelion dapat membantu mengurangi penambahan berat badan dan retensi lipid. Namun, bukti kuat untuk mendukung klaim ini masih kurang.</p>\r\n\r\n<h3><strong>7. Mengurangi Risiko Kanker</strong></h3>\r\n\r\n<p>Beberapa penelitian terkait hal ini sebenarnya masih terbatas. Sejauh ini, penelitian baru melihat dampak dandelion pada pertumbuhan kanker di tabung reaksi. Hasilnya, dandelion dapat membantu memperlambat pertumbuhan&nbsp;<a href=\"https://www.halodoc.com/artikel/hati-hati-dengan-gejala-kanker-usus-besar\">kanker usus besar</a>, kanker pankreas, dan kanker hati.</p>\r\n\r\n<h3><strong>8. Meningkatkan Sistem Kekebalan Tubuh</strong></h3>\r\n\r\n<p>Kandungan antioksidan dalam dandelion nyatanya juga mampu meningkatkan sistem kekebalan tubuh. Para peneliti juga telah menemukan bahwa dandelion menunjukkan sifat antivirus dan antibakteri. Satu studi tahun 2014 yang dipublikasikan dalam&nbsp;<em>National Library of Medicine,&nbsp;</em>menemukan bahwa dandelion membantu membatasi pertumbuhan hepatitis B pada sel manusia dan hewan dalam tabung reaksi.</p>\r\n\r\n<h3><strong>9. Melancarkan Pencernaan</strong></h3>\r\n\r\n<p>Orang-orang terdahulu sering memanfaatkan dandelion sebagai obat tradisional untuk mengatasi sembelit dan masalah pencernaan lainnya. Sejauh ini, penelitian untuk membuktikannya masih sebatas pengamatan pada hewan. Penelitian pada manusia diperlukan&nbsp; untuk menguji hasil yang serupa.</p>\r\n\r\n<h3><strong>10. Menjaga Kesehatan Kulit</strong></h3>\r\n\r\n<p>Paparan sinar UV yang dipancarkan matahari dapat membahayakan kulit. Beberapa penelitian menunjukkan bahwa dandelion dapat membantu melindungi kulit dari kerusakan akibat sinar matahari. Melindungi kulit dari kerusakan akibat sinar UV dapat membantu kamu terlihat awet muda.&nbsp;</p>\r\n', '1630870114-waterfall.png', '2021-09-06 02:28:34', '2021-09-11 07:11:10'),
(27, 10, 15, 'alasan-pengidap-asma-harus-patuh-mengonsumsi-obatnya', 'Alasan Pengidap Asma Harus Patuh Mengonsumsi Obatnya', '<p>Perawatan utama penyakit asma adalah steroid dan obat antiinflamasi lainnya. Khusus pengidap asma, steroid umumnya tersedia dalam bentuk inhaler. Steroid berfungsi mengurangi peradangan, pembengkakan, dan produksi lendir di saluran udara. Melansir dari&nbsp;<em>Health,&nbsp;</em>tak sedikit pengidap asma yang tidak disiplin mengonsumsi obat atau malah menghentikan pengobatan karena merasa kondisinya sudah membaik.<br />\r\n<strong>Baca juga:&nbsp;</strong><a href=\"https://www.halodoc.com/artikel/asma-dapat-disembuhkan-dengan-terapi-ini-faktanya\">Asma Dapat Disembuhkan dengan Terapi, Ini Faktanya</a><br />\r\nPadahal asma adalah penyakit yang menyerang dengan cepat dan bisa membahayakan nyawa pengidapnya. Selain itu, banyak sekali zat pemicu asma yang sewaktu-waktu dapat memicu kekambuhan. Jadi, selalu konsumsi obat asma yang telah dianjurkan oleh dokter untuk mencegah kekambuhan.</p>\r\n', '1630870531-main_page.png', '2021-09-06 02:35:32', '2021-09-11 07:10:58'),
(28, 10, 15, 'pentingnya-pemeriksaan-kesehatan-usai-alami-covid-19', 'Pentingnya Pemeriksaan Kesehatan Usai Alami COVID-19', '<p>Selama terinfeksi COVID-19, sistem kekebalan tubuh kita berjuang keras untuk melawan virus. Namun, dari apa yang banyak terjadi, virus SARS-COV-2 dapat meninggalkan efek samping yang bertahan lama setelah viral load habis.&nbsp;</p>\r\n\r\n<p>Infeksi virus corona bisa berdampak pada banyak organ vital tubuh, baik secara langsung maupun tak langsung, seperti menghambat respons imun. Perlu diketahui bahwa ada beberapa &ldquo;penanda&rdquo; dalam darah dan sistem kekebalan, yang dapat mengetahui sejauh mana tubuh terkena virus.</p>\r\n\r\n<p>Misalnya, tes dan pemindaian sangat penting untuk dipertimbangkan jika kamu telah mengalami infeksi parah akibat COVID-19. Pemindaian dan tes kesehatan dapat mengungkapkan seberapa baik tubuh kamu telah pulih dan sehat.</p>\r\n', '1630882733-vote.png', '2021-09-06 05:58:53', '2021-09-11 07:10:50'),
(29, 10, 15, 'mengatasi-darah-rendah-dengan-makanan', 'Mengatasi Darah Rendah dengan Makanan', '<p>Hipotensi yang parah dan tidak ditangani segera, bahkan disebut bisa mengancam nyawa pengidapnya. Maka dari itu, sebaiknya segera pergi ke rumah sakit jika mengalami gejala tekanan darah rendah agar pertolongan medis bisa segera diberikan. Hipotensi alias tekanan darah rendah ditandai dengan gejala berupa pusing, pandangan berkunang-kunang atau gelap, kelelahan, lemas, mual, pingsan, keringat dingin, napas tidak teratur, dehidrasi, dan jantung berdebar cepat.</p>\r\n\r\n<p>Tekanan&nbsp;<a href=\"https://www.halodoc.com/selain-penurunan-tekanan-darah-5-penyebab-hipotensi-ortostatik\" target=\"_blank\">darah rendah</a>&nbsp;ditandai dengan beberapa gejala, mulai dari pusing, kelelahan, lemas, mual, hingga dehidrasi dan jantung berdebar cepat. Kalau kamu merasakan salah satu dari gejala di atas, sebaiknya segera hentikan aktivitas dan beristirahat sejenak. Jika gejala terasa semakin parah, sebaiknya segera lakukan pemeriksaan ke rumah sakit.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ambil posisi tidur dengan posisi kepala lebih tinggi dengan menambahkan bantal kepala, hindari bertahan pada suatu posisi dalam waktu lama, misalnya berdiri terlalu lama atau duduk diam terlalu lama, hindari mandi atau berendam dalam air hangat karena air hangat dapat melebarkan pembuluh darah yang berakibat turunnya tekanan darah, serta berolahraga rutin untuk membantu melancarkan aliran darah dan menguatkan jantung.</p>\r\n', '1630883880-voteone.png', '2021-09-06 06:18:01', '2021-09-11 07:10:39'),
(30, 10, 15, 'pengertian-ekslusif', 'Pengertian Ekslusif', '<p><strong>Air susu ibu</strong>&nbsp;(disingkat&nbsp;<strong>ASI</strong>) adalah&nbsp;<a href=\"https://id.wikipedia.org/wiki/Susu\">susu</a>&nbsp;yang diproduksi oleh&nbsp;<a href=\"https://id.wikipedia.org/wiki/Manusia\">manusia</a>&nbsp;untuk konsumsi&nbsp;<a href=\"https://id.wikipedia.org/wiki/Bayi\">bayi</a>&nbsp;dan merupakan sumber gizi utama bayi yang belum dapat mencerna makanan padat.</p>\r\n\r\n<p>Air susu ibu diproduksi karena pengaruh hormon&nbsp;<a href=\"https://id.wikipedia.org/wiki/Prolaktin\">prolaktin</a>&nbsp;dan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Oksitosin\">oksitosin</a>&nbsp;setelah kelahiran bayi. Air susu ibu pertama yang keluar disebut&nbsp;<a href=\"https://id.wikipedia.org/wiki/Kolostrum\">kolostrum</a>&nbsp;atau jolong dan mengandung banyak&nbsp;<a href=\"https://id.wikipedia.org/wiki/Immunoglobulin\">immunoglobulin</a>&nbsp;<a href=\"https://id.wikipedia.org/w/index.php?title=IgA&amp;action=edit&amp;redlink=1\">IgA</a>&nbsp;yang baik untuk pertahanan tubuh bayi melawan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Penyakit\">penyakit</a>.</p>\r\n\r\n<p>Menyusui bayi dari ibunya sendiri adalah cara yang paling umum untuk memperoleh ASI, tetapi ASI dapat dipompa dan kemudian disusui dengan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Botol_bayi\">botol bayi</a>, cangkir dan/atau sendok, sistem tetes suplementasi, atau selang nasogastrik.</p>\r\n\r\n<p>Bila ibu tidak dapat menyusui anaknya, harus digantikan oleh air susu dari orang lain atau susu formula khusus.&nbsp;<a href=\"https://id.wikipedia.org/wiki/Susu_sapi\">Susu sapi</a>&nbsp;tidak cocok untuk bayi sebelum berusia 1 tahun.</p>\r\n', '1631368025-dashboard.jpg', '2021-09-11 20:47:05', '2021-09-15 08:08:40'),
(31, 10, 15, 'pengertian-anemia', 'Pengertian Anemia', '<p>Penyakit anemia merupakan kondisi ketika jumlah sel darah merah lebih rendah dari jumlah normal. Selain itu, anemia terjadi ketika hemoglobin di dalam sel-sel darah merah tidak cukup, seperti protein kaya zat besi yang memberikan warna merah darah. Protein ini membantu sel-sel darah merah membawa oksigen dari paru-paru ke seluruh tubuh.</p>\r\n\r\n<p>Oleh karena itu, tubuh yang tidak mendapatkan cukup darah yang kaya oksigen akan mengalami anemia. Akibatnya, seseorang mungkin akan merasa lelah atau lemah. Selain itu, gejala lain mungkin muncul adalah sesak napas, pusing, atau sakit kepala.</p>\r\n', '1632131029-anemia.png', '2021-09-20 15:35:21', '2021-09-20 09:43:49'),
(32, 10, 15, 'kenali-risiko-dan-efek-samping-dari-transfusi-trombosit', 'Kenali Risiko dan Efek Samping dari Transfusi Trombosit', '<p><a href=\"https://www.halodoc.com/kesehatan/trombositopenia\">Trombositopenia</a>&nbsp;atau kondisi di mana kadar trombosit darah terlalu rendah tidak boleh diabaikan begitu saja. Kondisi nini bisa menyebabkan pengidapnya rentan mengalami perdarahan, mudah lebam, mimisan, hingga sering mengalami gusi berdarah. Di dalam tubuh, trombosit diproduksi oleh sumsum tulang belakang untuk kemudian diedarkan ke seluruh tubuh.&nbsp;</p>\r\n\r\n<p>Namun, pada pengidap penyakit trombositopenia proses ini bisa terhambat sehingga jumlah trombosit yang diproduksi tidak mencukupi. Sumsum tulang tidak bisa memproduksi trombosit sesuai dengan jumlah yang dibutuhkan tubuh. Maka dari itu, dibutuhkan transfusi trombosit untuk membantu memenuhi kadar komponen ini serta menghindari risiko terjadinya gejala penyakit.&nbsp;</p>\r\n\r\n<p>Apa yang dimaksud dengan transfusi trombosit? Apakah berbeda dengan transfusi darah biasa? Kedua hal ini memang berbeda. Pada transfusi darah, seluruh komponen dalam darah dari pendonor akan &ldquo;disumbangkan&rdquo; alias dimasukkan ke dalam tubuh penerima donor. Berbeda dengan transfusi trombosit, komponen yang diambil hanya trombosit yang sudah dipisahkan dari komponen lainnya.</p>\r\n', '1632129300-trans.png', '2021-09-20 16:15:01', '2021-09-20 09:15:01'),
(33, 10, 15, 'alasan-trombosit-rendah-bisa-berbahaya-bagi-tubuh', 'Alasan Trombosit Rendah Bisa Berbahaya bagi Tubuh', '<p><strong><em>&ldquo;Trombosit adalah sel darah yang berguna untuk pembekuan agar luka dapat sembuh. Namun, jika kadar trombosit terlalu rendah, ada banyak dampak buruk yang dapat terjadi pada tubuh. Gangguan yang paling mudah terjadi adalah luka yang sulit untuk sembuh.&rdquo;</em></strong></p>\r\n\r\n<p><strong>Halodoc</strong>, Jakarta &ndash; Trombosit adalah salah satu bagian dari darah yang memiliki fungsi sangat vital, terutama untuk proses penyembuhan luka. Sel yang disebut juga dengan keping darah ini berguna untuk menyebabkan pembekuan darah agar luka dapat tertutup. Namun, bagaimana jika seseorang memiliki&nbsp;<a href=\"https://www.halodoc.com/artikel/kenali-7-gejala-kadar-trombosit-menurun\">trombosit</a>&nbsp;yang sangat rendah? Apa saja bahaya yang dapat terjadi?&nbsp;</p>\r\n\r\n<h2><strong>Bahaya dari Trombosit Rendah pada Tubuh</strong></h2>\r\n\r\n<p>Trombosit adalah sel darah yang berfungsi untuk pembekuan untuk menyembuhkan luka. Jika terdapat kerusakan pada dinding pembuluh darah, trombosit akan melakukan tugasnya untuk membentuk gumpalan agar perdarahan yang terjadi berhenti. Maka dari itu, bagian sel darah ini penting untuk proses penyembuhan.</p>\r\n\r\n<p><strong>Baca juga:&nbsp;</strong><a href=\"https://www.halodoc.com/artikel/yang-terjadi-jika-trombosit-darah-di-tubuh-rendah\">Yang Terjadi Jika Trombosit Darah di Tubuh Rendah</a></p>\r\n\r\n<p>Jumlah trombosit yang normal di dalam darah sebanyak 150.000-400.000 trombosit tiap mikroliter darah. Nah, jika jumlah yang ada di dalam satuan tersebut di bawah angka tersebut, kemungkinan besar kamu dapat mengalami proses pembekuan darah. Jumlah trombosit yang rendah disebut juga&nbsp;<a href=\"https://www.halodoc.com/kesehatan/trombositopenia\">trombositopenia</a>.</p>\r\n\r\n<p>Berkurangnya kandungan trombosit di dalam darah tidak selalu menyebabkan masalah yang serius. Namun, kondisi ini dapat memengaruhi kemampuan darah untuk menggumpal dan luka dapat terus mengeluarkan darah karena tidak terjadinya pembekuan. Jika dibiarkan komplikasi serius mungkin saja terjadi.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '1632129979-trom.png', '2021-09-20 16:26:19', '2021-09-20 09:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `ask` varchar(250) NOT NULL,
  `isi_first` varchar(30) NOT NULL,
  `isi_second` varchar(30) NOT NULL,
  `jumlah_vote` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id_question`, `id_user`, `ask`, `isi_first`, `isi_second`, `jumlah_vote`, `date_created`) VALUES
(6, 10, 'Do you want to learn english ?', 'Ya', 'Tidak', 6, '2021-09-21 18:54:29'),
(10, 10, 'Could you write some projects using javascript ?', 'Ya', 'Tidak', 0, '2021-09-30 00:45:53');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(28) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `status_vote` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `no_telp`, `image`, `password`, `role_id`, `is_active`, `status_vote`, `date_created`, `tanggal`) VALUES
(10, 'Ikhza', 'akhmadikhza123@gmail.com', '083104835779', '1632650560-imageee.jpg', '$2y$10$LbvjSDMp74X15zmWPbckl.jGtB5e3K5fVlFPnCJbTFk6dAN8xJhVy', 1, 1, 1, '2021-10-01 19:56:46', '2021-10-01 12:56:46'),
(63, 'Paul', 'ikhzabeatles11@gmail.com', '083104835755', '1631988320-imageee.jpg', '$2y$10$wfBDBkULFPpAuoILPUyNYOpAmQIn5jI6T3GdEVbandgNqH6xD1qDe', 2, 1, 0, '2021-10-01 18:28:32', '2021-10-01 11:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id_answer`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `komen`
--
ALTER TABLE `komen`
  ADD PRIMARY KEY (`id_komen`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `komen`
--
ALTER TABLE `komen`
  MODIFY `id_komen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
