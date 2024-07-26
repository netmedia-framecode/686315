<?php require_once("../../controller/script.php");
require_once __DIR__ . '/../../assets/vendor/autoload.php';

if (isset($_SESSION["kedatangan"])) {
  
  $type_file=valid($conn, $_SESSION["kedatangan"]["type_file"]);
  $no_polisi=valid($conn, $_SESSION["kedatangan"]["no_polisi"]);
  $kedatangan = "SELECT kedatangan.*, 
    formulir_wawancara.kategori, 
    formulir_wawancara.kesehatan, 
    formulir_wawancara.pengemudi_kendaraan, 
    formulir_wawancara.nama_pengemudi, 
    formulir_wawancara.tempat_lahir, 
    formulir_wawancara.tgl_lahir, 
    formulir_wawancara.no_pasport_pengemudi, 
    formulir_wawancara.no_sim_pengemudi, 
    formulir_wawancara.no_hp_pengemudi, 
    formulir_wawancara.pemilik_kendaraan, 
    formulir_wawancara.nama_pemilik_kendaraan, 
    formulir_wawancara.identitas_pemilik_kendaraan, 
    formulir_wawancara.surat_kuasa, 
    formulir_wawancara.plat_nomor, 
    formulir_wawancara.merek_kendaraan, 
    formulir_wawancara.maksud_kunjungan, 
    formulir_wawancara.waktu_kunjungan, 
    formulir_wawancara.pelanggaran_atas_barang, 
    formulir_wawancara.pelanggaran_atas_penyalahgunaan, 
    formulir_wawancara.pelanggaran_atas_modifikasi, 
    formulir_wawancara.pelanggaran_atas_waktu, 
    formulir_wawancara.sanksi, 
    alamat_pengemudi.jalan_pengemudi, 
    alamat_pengemudi.kelurahan_pengemudi, 
    alamat_pengemudi.kecamatan_pengemudi, 
    alamat_pengemudi.kabupaten_kota_pengemudi, 
    alamat_pengemudi.provinsi_pengemudi, 
    alamat_kendaraan.jalan_kendaraan, 
    alamat_kendaraan.kelurahan_kendaraan, 
    alamat_kendaraan.kecamatan_kendaraan, 
    alamat_kendaraan.kabupaten_kota_kendaraan, 
    alamat_kendaraan.provinsi_kendaraan, 
    alamat_tujuan.jalan_tujuan, 
    alamat_tujuan.distric, 
    alamat_tujuan.sub_distric, 
    alamat_tujuan.suco, alamat_tujuan.aldeia, 
    kepemilikan_kendaraan.kepemilikan_kendaraan, 
    strp.no_registrasi, 
    strp.no_polisi, 
    strp.nama_pemilik, 
    strp.alamat_pemilik, 
    strp.nama_pengemudi, 
    strp.no_sim, 
    strp.no_pasport, 
    strp.jenis_kendaraan, 
    strp.tahun_pembuatan, 
    strp.cc, 
    strp.no_rangka, 
    strp.no_mesin, 
    strp.warna, 
    strp.maksud_kunjungan, 
    strp.alamat_tujuan, 
    strp.berlaku_hingga, 
    strp.files,
    warga_negara.warga_negara,
    bahan_bakar.bahan_bakar
      FROM kedatangan 
      JOIN formulir_wawancara ON kedatangan.id_fw = formulir_wawancara.id_fw 
      JOIN alamat_pengemudi ON formulir_wawancara.id_fw = alamat_pengemudi.id_fw 
      JOIN alamat_kendaraan ON formulir_wawancara.id_fw = alamat_kendaraan.id_fw 
      JOIN alamat_tujuan ON formulir_wawancara.id_fw = alamat_tujuan.id_fw 
      JOIN kepemilikan_kendaraan ON formulir_wawancara.id_kepemilikan_kendaraan = kepemilikan_kendaraan.id_kepemilikan_kendaraan
      JOIN strp ON formulir_wawancara.id_strp = strp.id_strp
      JOIN warga_negara ON strp.id_warga_negara = warga_negara.id_warga_negara
      JOIN bahan_bakar ON strp.id_bahan_bakar = bahan_bakar.id_bahan_bakar
      WHERE strp.no_polisi = '$no_polisi'
      AND kedatangan.status_strp = 'Valid'
      OR kedatangan.status_formulir = 'Valid'
  ";
  $views_kedatangan = mysqli_query($conn, $kedatangan);
  $data = mysqli_fetch_assoc($views_kedatangan);
  $mpdf = new \Mpdf\Mpdf();
  $mpdf->WriteHTML('
    <div style="width: 100%;">
      <table style="width: 100%;">
        <tbody>
          <tr>
            <td style="text-align: left;">
              <h5 class="text-dark" style="font-size: 12px;font-weight: bold;">KEPOLISIAN DAERAH NUSA TENGGARA TIMUR
                <br>RESOR MALAKA
                <br>SATUAN LALU LINTAS
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <p class="text-dark" style="font-size: 12px;text-align: left;padding: 5px;margin-top: 0;border-bottom: 3px solid black;font-weight: bold;">Jalan Ahmad Yani No.10 Betun - Malaka 85672</p>
    <h5 class="text-dark" style="font-size: 14px;text-align: center;font-weight: bold; margin-top: 0;">SURAT TANDA REGISTRASI PENOMORAN (STRP) RANMOR TIMOR LESTE YANG MASUK DIWILAYAH INDONESIA</h5>
    <table class="text-dark" style="border-collapse: collapse; width: 100%; margin-top: 0;">
      <thead>
        <tr style="">
          <th style="text-align: left;" colspan="3">Telah melapor di SATUAN LALU LINTAS PLBN MOTAMASIN, kendaraan Timor Leste dengan identitas sebagai berikut :</th>
        </tr>
        <tr style="">
          <td style=""width: 250px;>Nomor Registrasi</td>
          <td>:</td>
          <td style="">STNK LBN / '. $data["no_registrasi"].' / II ? '. date('Y').' / MOTAMASIN</td>
        </tr>
        <tr style="">
          <td style="">Nomor Polisi</td>
          <td>:</td>
          <td style="">'. $data["no_polisi"].'</td>
        </tr>
        <tr style="">
          <td style="">Nama Pemilik</td>
          <td>:</td>
          <td style="">'. $data["nama_pemilik"].'</td>
        </tr>
        <tr style="">
          <td style="">Alamat Pemilik</td>
          <td>:</td>
          <td style="">'. $data["alamat_pemilik"].'</td>
        </tr>
        <tr style="">
          <td style="">Nama Pengemudi</td>
          <td>:</td>
          <td style="">'. $data["nama_pengemudi"].'</td>
        </tr>
        <tr style="">
          <td style="">No. SIM</td>
          <td>:</td>
          <td style="">'. $data["no_sim"].'</td>
        </tr>
        <tr style="">
          <td style="">No. Pasport</td>
          <td>:</td>
          <td style="">'. $data["no_pasport"].'</td>
        </tr>
        <tr style="">
          <td style="">Warga Negara</td>
          <td>:</td>
          <td style="">'. $data["warga_negara"].'</td>
        </tr>
        <tr style="">
          <td style="">Merk / Jenis</td>
          <td>:</td>
          <td style="">'. $data["jenis_kendaraan"].'</td>
        </tr>
        <tr style="">
          <td style="">Tahun Pembuatan / CC</td>
          <td>:</td>
          <td style="">'. $data["tahun_pembuatan"].' / '. $data["cc"].'</td>
        </tr>
        <tr style="">
          <td style="">No. Rangka</td>
          <td>:</td>
          <td style="">'. $data["no_rangka"].'</td>
        </tr>
        <tr style="">
          <td style="">No. Mesin</td>
          <td>:</td>
          <td style="">'. $data["no_mesin"].'</td>
        </tr>
        <tr style="">
          <td style="">Warna</td>
          <td>:</td>
          <td style="">'. $data["warna"].'</td>
        </tr>
        <tr style="">
          <td style="">Bahan Bakar</td>
          <td>:</td>
          <td style="">'. $data["bahan_bakar"].'</td>
        </tr>
        <tr style="">
          <td style="">Maksud Kunjungan</td>
          <td>:</td>
          <td style="">'. $data["maksud_kunjungan"].'</td>
        </tr>
        <tr style="">
          <td style="">Alamat Tujuan</td>
          <td>:</td>
          <td style="">'. $data["alamat_tujuan"].'</td>
        </tr>
        <tr style="">
          <td style="">Berlaku Hingga</td>
          <td>:</td>
          <td style="">'. $data["berlaku_hingga"].'</td>
        </tr>
      </thead>
    </table>
  ');
  $mpdf->WriteHTML('<table style="width: 100%;margin-top: 50px;font-size: 12px;">
    <tbody>
      <tr>
        <td style="text-align: center;">Pengemudi,</td>
        <td style="text-align: center;width: 200px;"></td>
        <td style="text-align: center;">MOTAMASIN, '.date("d M Y").'<br>An.KEPALA KEPOLISIAN RESOR MALAKA <br>KASAT LANTAS</td>
      </tr>
      <tr>
        <td style="text-align: center;height: 60px;" colspan="3"></td>
      </tr>
      <tr>
        <td style="text-align: center;">'.$data['nama_pengemudi'].'</td>
        <td style="text-align: center;width: 200px;"></td>
        <th style="text-align: center;">
          <p style="border-bottom: 1px solid #000;">APRIS YANTO FATIN</p>
          <br>BRIPDA / 94040222
        </th>
      </tr>
    </tbody>
  </table>');

  $mpdf->Output();
  // $mpdf->OutputHttpDownload('Export Plat Kendaraan kedatangan.pdf');
  // header("Location: kedatangan");
  // exit;
}