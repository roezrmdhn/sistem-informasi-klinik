-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jul 2022 pada 04.51
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbrumahsakit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbdokter`
--

CREATE TABLE `tbdokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(20) DEFAULT NULL,
  `spesialis` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbdokter`
--

INSERT INTO `tbdokter` (`id_dokter`, `nama_dokter`, `spesialis`) VALUES
(101, 'dr. Rais Ramadhani', 'Saraf'),
(102, 'dr. Arimby Kusmaya', 'Mata'),
(103, 'dr. Cikal Fauziah S', 'Jantung'),
(104, 'dr. Dwi Prasetyo', 'Penyakit Dalam'),
(105, 'dr. Yusuf Ci', 'Hati'),
(107, 'dr. Cikal Fauziah S', 'Umum'),
(108, 'dr. Simanjung Tar', 'Umum'),
(109, 'drg. Jimmy Hendrix', 'Gigi'),
(110, 'drg. Cisuf', 'Gigi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbkamar`
--

CREATE TABLE `tbkamar` (
  `no_kamar` int(11) NOT NULL,
  `nama_kamar` varchar(30) NOT NULL,
  `kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbkamar`
--

INSERT INTO `tbkamar` (`no_kamar`, `nama_kamar`, `kelas`) VALUES
(201, 'Edelweis', 'Umum'),
(202, 'Anggrek', 'Umum'),
(203, 'Dahlia', 'Umum'),
(204, 'Bougenville', 'VIP'),
(205, 'Tulip', 'VIP'),
(206, 'Mawar Putih', 'Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbobat`
--

CREATE TABLE `tbobat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(123) DEFAULT NULL,
  `harga_obat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbobat`
--

INSERT INTO `tbobat` (`id_obat`, `nama_obat`, `harga_obat`) VALUES
(301, 'Paracetamol', 5000),
(302, 'Amoxcillin 500 mg', 25000),
(303, 'Bromhexine ', 45500),
(304, 'Cefixime 200 mg', 30550),
(305, 'Dexketoprofen 25 mg', 43600);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpasien`
--

CREATE TABLE `tbpasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `alamat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbpasien`
--

INSERT INTO `tbpasien` (`id_pasien`, `nama_pasien`, `alamat`) VALUES
(401, 'Surtijo', 'Sragen'),
(402, 'Marsinah', 'Sukoharjo'),
(403, 'Dwiki', 'Surakarta'),
(404, 'Marjuki', 'Karanganyar'),
(405, 'Sarjinem', 'Klaten'),
(406, 'Karas Andiwijaya', 'Madiun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_inap`
--

CREATE TABLE `transaksi_inap` (
  `id_inap` char(15) NOT NULL,
  `id_pasien` int(11) DEFAULT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_kamar` int(11) DEFAULT NULL,
  `tanggal_inap` date DEFAULT NULL,
  `tanggal_pulang` date DEFAULT NULL,
  `biaya_inap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_inap`
--

INSERT INTO `transaksi_inap` (`id_inap`, `id_pasien`, `id_dokter`, `id_kamar`, `tanggal_inap`, `tanggal_pulang`, `biaya_inap`) VALUES
('7012022', 401, 101, 201, '2022-07-16', '2022-07-17', 300000),
('7042022', 402, 102, 202, '2022-06-08', '2022-06-10', 600000),
('7052022', 401, 104, 202, '2022-07-19', '2022-07-20', 320000),
('70532022', 402, 102, 204, '2022-07-04', '2022-07-13', 10000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_obat`
--

CREATE TABLE `transaksi_obat` (
  `id_tebus` int(11) NOT NULL,
  `tanggal_tebus` date DEFAULT NULL,
  `id_pasien` int(11) DEFAULT NULL,
  `id_obat` int(11) DEFAULT NULL,
  `biaya_tebus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_obat`
--

INSERT INTO `transaksi_obat` (`id_tebus`, `tanggal_tebus`, `id_pasien`, `id_obat`, `biaya_tebus`) VALUES
(803022, '2022-07-09', 403, 305, 17500),
(8012022, '2022-07-19', 402, 302, 25000),
(8022022, '2022-07-12', 401, 302, 12000),
(8042022, '2022-07-14', 404, 303, 41000),
(8052022, '2022-07-03', 406, 304, 89000),
(8062022, '2022-07-02', 403, 301, 60000),
(8082022, '2022-07-07', 402, 302, 25000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbdokter`
--
ALTER TABLE `tbdokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `tbkamar`
--
ALTER TABLE `tbkamar`
  ADD PRIMARY KEY (`no_kamar`);

--
-- Indeks untuk tabel `tbobat`
--
ALTER TABLE `tbobat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `tbpasien`
--
ALTER TABLE `tbpasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `transaksi_inap`
--
ALTER TABLE `transaksi_inap`
  ADD PRIMARY KEY (`id_inap`),
  ADD KEY `id_kamar` (`id_kamar`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indeks untuk tabel `transaksi_obat`
--
ALTER TABLE `transaksi_obat`
  ADD PRIMARY KEY (`id_tebus`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `biaya_tebus` (`biaya_tebus`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbdokter`
--
ALTER TABLE `tbdokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi_inap`
--
ALTER TABLE `transaksi_inap`
  ADD CONSTRAINT `transaksi_inap_ibfk_2` FOREIGN KEY (`id_kamar`) REFERENCES `tbkamar` (`no_kamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_inap_ibfk_3` FOREIGN KEY (`id_pasien`) REFERENCES `tbpasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_inap_ibfk_4` FOREIGN KEY (`id_dokter`) REFERENCES `tbdokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_obat`
--
ALTER TABLE `transaksi_obat`
  ADD CONSTRAINT `transaksi_obat_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `tbpasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_obat_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `tbobat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
