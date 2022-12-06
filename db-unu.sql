-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 5.7.33 - MySQL Community Server (GPL)
-- OS Server:                    Win64
-- HeidiSQL Versi:               11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- membuang struktur untuk table db_unu.berita
CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_user` int(11) unsigned DEFAULT NULL,
  `judul` text,
  `isi` text,
  `gambar` varchar(50) DEFAULT NULL,
  `tgl_posting` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_berita`),
  KEY `FK_berita_users` (`id_user`),
  CONSTRAINT `FK_berita_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel db_unu.berita: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;

-- membuang struktur untuk table db_unu.buku
CREATE TABLE IF NOT EXISTS `buku` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `judul_buku` varchar(150) DEFAULT NULL,
  `id_kategori` int(10) unsigned DEFAULT NULL,
  `id_penerbit` int(10) unsigned DEFAULT NULL,
  `id_pengarang` int(10) unsigned DEFAULT NULL,
  `id_rak` int(10) unsigned DEFAULT NULL,
  `kode_barcode` tinytext,
  `tahun_buku` year(4) DEFAULT NULL,
  `jumlah_buku` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_penerbit_buku_idx` (`id_penerbit`),
  KEY `fk_buku_pengarang_idx` (`id_pengarang`),
  KEY `fk_buku_rak_idx` (`id_rak`),
  KEY `fk_buku_kategori_idx` (`id_kategori`),
  CONSTRAINT `fk_buku_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_buku_penerbit` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_buku_pengarang` FOREIGN KEY (`id_pengarang`) REFERENCES `pengarang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_buku_rak` FOREIGN KEY (`id_rak`) REFERENCES `rak` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_unu.buku: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `buku` DISABLE KEYS */;
/*!40000 ALTER TABLE `buku` ENABLE KEYS */;

-- membuang struktur untuk table db_unu.denda
CREATE TABLE IF NOT EXISTS `denda` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_unu.denda: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `denda` DISABLE KEYS */;
/*!40000 ALTER TABLE `denda` ENABLE KEYS */;

-- membuang struktur untuk table db_unu.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_unu.failed_jobs: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- membuang struktur untuk table db_unu.fakultas
CREATE TABLE IF NOT EXISTS `fakultas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_unu.fakultas: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `fakultas` DISABLE KEYS */;
/*!40000 ALTER TABLE `fakultas` ENABLE KEYS */;

-- membuang struktur untuk table db_unu.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_unu.migrations: ~5 rows (lebih kurang)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- membuang struktur untuk table db_unu.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_unu.password_resets: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- membuang struktur untuk table db_unu.peminjaman
CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_users` int(10) unsigned DEFAULT NULL,
  `id_buku` int(10) unsigned DEFAULT NULL,
  `id_denda` int(10) unsigned DEFAULT NULL,
  `kode_peminjaman` varchar(45) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_peminjaman_buku_idx` (`id_buku`),
  KEY `fk_peminjaman_denda_idx` (`id_denda`),
  KEY `fk_peminjaman_users_idx` (`id_users`),
  CONSTRAINT `fk_peminjaman_buku` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_peminjaman_denda` FOREIGN KEY (`id_denda`) REFERENCES `denda` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_peminjaman_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_unu.peminjaman: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `peminjaman` DISABLE KEYS */;
/*!40000 ALTER TABLE `peminjaman` ENABLE KEYS */;

-- membuang struktur untuk table db_unu.penerbit
CREATE TABLE IF NOT EXISTS `penerbit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) DEFAULT NULL,
  `alamat` tinytext,
  `telepon` varchar(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_unu.penerbit: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `penerbit` DISABLE KEYS */;
/*!40000 ALTER TABLE `penerbit` ENABLE KEYS */;

-- membuang struktur untuk table db_unu.pengarang
CREATE TABLE IF NOT EXISTS `pengarang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) DEFAULT NULL,
  `alamat` tinytext,
  `telepon` varchar(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_unu.pengarang: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `pengarang` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengarang` ENABLE KEYS */;

-- membuang struktur untuk table db_unu.rak
CREATE TABLE IF NOT EXISTS `rak` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_rak` varchar(45) DEFAULT NULL,
  `lokasi` tinytext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Membuang data untuk tabel db_unu.rak: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `rak` DISABLE KEYS */;
/*!40000 ALTER TABLE `rak` ENABLE KEYS */;

-- membuang struktur untuk table db_unu.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `id_prodi` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `telepon` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('P','L') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(145) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nim/nip` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `fk_users_prodi_idx` (`id_prodi`),
  CONSTRAINT `fk_users_prodi` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_unu.users: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `id_prodi`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `telepon`, `jenis_kelamin`, `foto`, `nim/nip`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, NULL, 'Riza', 'admin@gmail.com', NULL, '$2y$10$4iqySaevhtIMCuq7YG2SIuzdT3kO6IkF.najQe6OlmFCu7xYYnqKe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-10 07:09:21', '2022-06-10 07:09:21', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
