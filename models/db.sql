-- Active: 1721730379871@@127.0.0.1@3306@plbn_motamasin_pro
CREATE TABLE
  users_role (
    id_role INT AUTO_INCREMENT PRIMARY KEY,
    role VARCHAR(35)
  );

INSERT INTO
  users_role (role)
VALUES
  ('Administrator'),
  ('Pengemudi');

CREATE TABLE
  users_status (
    id_status INT AUTO_INCREMENT PRIMARY KEY,
    status VARCHAR(35)
  );

INSERT INTO
  users_status (status)
VALUES
  ('Active'),
  ('No Active');

CREATE TABLE
  users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    id_role INT,
    id_active INT,
    en_user VARCHAR(75),
    img_user VARCHAR(225) DEFAULT 'default.jpg',
    username VARCHAR(50),
    email VARCHAR(75),
    emailOld VARCHAR(75),
    password VARCHAR(75),
    phone VARCHAR(75),
    address TEXT,
    country VARCHAR(10),
    ip_user VARCHAR(20),
    regulation VARCHAR(20),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_role) REFERENCES users_role (id_role) ON UPDATE NO ACTION ON DELETE NO ACTION,
    FOREIGN KEY (id_active) REFERENCES users_status (id_active) ON UPDATE NO ACTION ON DELETE NO ACTION
  );

CREATE TABLE
  users_menu (
    id_menu INT AUTO_INCREMENT PRIMARY KEY,
    menu VARCHAR(50) icon VARCHAR(50) folder VARCHAR(50)
  );

CREATE TABLE
  users_sub_menu (
    id_sub_menu INT AUTO_INCREMENT PRIMARY KEY,
    id_menu INT,
    id_active INT,
    title VARCHAR(50),
    file VARCHAR(50),
    FOREIGN KEY (id_menu) REFERENCES users_menu (id_menu) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (id_active) REFERENCES users_status (id_active) ON UPDATE NO ACTION ON DELETE NO ACTION
  );

CREATE TABLE
  users_access_menu (
    id_access_menu INT AUTO_INCREMENT PRIMARY KEY,
    id_role INT,
    id_menu INT,
    FOREIGN KEY (id_role) REFERENCES users_role (id_role) ON UPDATE NO ACTION ON DELETE NO ACTION,
    FOREIGN KEY (id_menu) REFERENCES users_menu (id_menu) ON UPDATE CASCADE ON DELETE CASCADE
  );

CREATE TABLE
  users_access_sub_menu (
    id_access_sub_menu INT AUTO_INCREMENT PRIMARY KEY,
    id_role INT,
    id_sub_menu INT,
    FOREIGN KEY (id_role) REFERENCES users_role (id_role) ON UPDATE NO ACTION ON DELETE NO ACTION,
    FOREIGN KEY (id_sub_menu) REFERENCES users_sub_menu (id_sub_menu) ON UPDATE CASCADE ON DELETE CASCADE
  );

CREATE TABLE
  users_log (
    id_log INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    status VARCHAR(10),
    description TEXT,
    date_log DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE DEFAULT_GENERATED,
    FOREIGN KEY (id_user) REFERENCES users (id_user) ON UPDATE NO ACTION ON DELETE NO ACTION
  );

CREATE TABLE
  users_login_logs (
    id_login_logs INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    problem TEXT,
    device VARCHAR(200),
    ip_address VARCHAR(45),
    date_login_logs DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE DEFAULT_GENERATED,
    FOREIGN KEY (id_user) REFERENCES users (id_user) ON UPDATE NO ACTION ON DELETE NO ACTION
  );

CREATE TABLE
  users_otentikasi (
    id_otentikasi INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    encryption TEXT,
    FOREIGN KEY (id_user) REFERENCES users (id_user) ON UPDATE NO ACTION ON DELETE NO ACTION
  );

CREATE TABLE
  warga_negara (
    id_warga_negara INT AUTO_INCREMENT PRIMARY KEY,
    warga_negara VARCHAR(50)
  );

INSERT INTO
  warga_negara (warga_negara)
VALUES
  ('INDONESIA (ID)'),
  ('TIMOR LESTE (TL)');

CREATE TABLE
  bahan_bakar (
    id_bahan_bakar INT AUTO_INCREMENT PRIMARY KEY,
    bahan_bakar VARCHAR(50)
  );

INSERT INTO
  bahan_bakar (bahan_bakar)
VALUES
  ('Bensin'),
  ('Solar'),
  ('Pertamax'),
  ('Pertalite'),
  ('Premium'),
  ('Bio Solar'),
  ('Dexlite'),
  ('Pertamina Dex'),
  ('Biodiesel'),
  ('E85'),
  ('Electricity');

CREATE TABLE
  kepemilikan_kendaraan (
    id_kepemilikan_kendaraan INT AUTO_INCREMENT PRIMARY KEY,
    kepemilikan_kendaraan VARCHAR(75)
  );

INSERT INTO
  kepemilikan_kendaraan (kepemilikan_kendaraan)
VALUES
  ('Pribadi'),
  ('Dinas'),
  ('Perusahaan'),
  ('Angkutan Umum');

CREATE TABLE
  strp (
    id_strp INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    no_registrasi INT,
    no_polisi CHAR(15),
    nama_pemilik VARCHAR(225),
    alamat_pemilik VARCHAR(225),
    nama_pengemudi VARCHAR(225),
    no_sim VARCHAR(100),
    no_pasport VARCHAR(50),
    id_warga_negara INT,
    jenis_kendaraan VARCHAR(100),
    id_kepemilikan_kendaraan INT,
    tahun_pembuatan INT,
    cc INT,
    no_rangka VARCHAR(50),
    no_mesin VARCHAR(25),
    warna VARCHAR(25),
    id_bahan_bakar INT,
    maksud_kunjungan TEXT,
    alamat_tujuan TEXT,
    berlaku_hingga DATE,
    files VARCHAR(50),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users (id_user) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (id_warga_negara) REFERENCES warga_negara (id_warga_negara) ON UPDATE NO ACTION ON DELETE NO ACTION,
    FOREIGN KEY (id_kepemilikan_kendaraan) REFERENCES kepemilikan_kendaraan (id_kepemilikan_kendaraan) ON UPDATE NO ACTION ON DELETE NO ACTION,
    FOREIGN KEY (id_bahan_bakar) REFERENCES bahan_bakar (id_bahan_bakar) ON UPDATE NO ACTION ON DELETE NO ACTION
  );

CREATE TABLE
  alamat_pengemudi (
    id_alamat_pengemudi INT AUTO_INCREMENT PRIMARY KEY,
    jalan VARCHAR(75),
    kelurahan VARCHAR(75),
    kecamatan VARCHAR(75),
    kabupaten_kota VARCHAR(75),
    provinsi VARCHAR(75)
  );

CREATE TABLE
  alamat_kendaraan (
    id_alamat_kendaraan INT AUTO_INCREMENT PRIMARY KEY,
    jalan VARCHAR(75),
    kelurahan VARCHAR(75),
    kecamatan VARCHAR(75),
    kabupaten_kota VARCHAR(75),
    provinsi VARCHAR(75)
  );

CREATE TABLE
  alamat_tujuan (
    id_alamat_tujuan INT AUTO_INCREMENT PRIMARY KEY,
    jalan VARCHAR(75),
    distric VARCHAR(75),
    sub_distric VARCHAR(75),
    suco VARCHAR(75),
    aldeia VARCHAR(75)
  );

CREATE TABLE
  formulir_wawancara (
    id_fw INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    kesehatan CHAR(10),
    pengemudi_kendaraan CHAR(10),
    nama_pengemudi VARCHAR(100),
    tempat_lahir VARCHAR(50),
    tgl_lahir DATE,
    id_alamat_pengemudi INT,
    no_pasport_pengemudi VARCHAR(50),
    no_sim_pengemudi VARCHAR(75),
    no_hp_pengemudi VARCHAR(75),
    pemilik_kendaraan CHAR(10),
    nama_pemilik_kendaraan CHAR(10),
    identitas_pemilik_kendaraan CHAR(10),
    id_alamat_kendaraan INT,
    surat_kuasa VARCHAR(50),
    plat_nomor CHAR(15),
    merek_kendaraan CHAR(15),
    id_kepemilikan_kendaraan INT,
    id_alamat_tujuan INT,
    maksud_kunjungan VARCHAR(50),
    waktu_kunjungan DATE,
    pelanggaran_atas_barang CHAR(20),
    pelanggaran_atas_penyalahgunaan CHAR(20),
    pelanggaran_atas_modifikasi CHAR(20),
    pelanggaran_atas_waktu CHAR(20),
    sanksi CHAR(20),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users (id_user) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (id_alamat_pengemudi) REFERENCES alamat_pengemudi (id_alamat_pengemudi) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (id_alamat_kendaraan) REFERENCES alamat_kendaraan (id_alamat_kendaraan) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (id_kepemilikan_kendaraan) REFERENCES kepemilikan_kendaraan (id_kepemilikan_kendaraan) ON UPDATE NO ACTION ON DELETE NO ACTION,
    FOREIGN KEY (id_alamat_tujuan) REFERENCES alamat_tujuan (id_alamat_tujuan) ON UPDATE NO ACTION ON DELETE NO ACTION
  );

CREATE TABLE
  keberangkatan (
    id_keberangkatan INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    id_fw INT,
    status_strp VARCHAR(50),
    status_formulir VARCHAR(50),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users (id_user) ON UPDATE CASCADE ON DELETE CASCADE
  );

CREATE TABLE
  kedatangan (
    id_keberangkatan INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    id_fw INT,
    status_strp VARCHAR(50),
    status_formulir VARCHAR(50),
    status_vhd VARCHAR(50),
    kesimpulan TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users (id_user) ON UPDATE CASCADE ON DELETE CASCADE
  );
