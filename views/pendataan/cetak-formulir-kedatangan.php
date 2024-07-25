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
      ORDER BY kedatangan.id_keberangkatan LIMIT 1
  ";
  $views_keberangkatan = mysqli_query($conn, $kedatangan);
  $data = mysqli_fetch_assoc($views_keberangkatan);
  $tgl_lahir = date_create($data["tgl_lahir"]);
  $tgl_lahir = date_format($tgl_lahir, "d M Y");
  $mpdf = new \Mpdf\Mpdf();
  $mpdf->WriteHTML('<div style="border-bottom: 3px solid black;width: 100%;">
    <table style="width: 100%;" style="border: 1px solid #000;">
      <tbody>
        <tr>
          <th style="text-align: center;">
            <img src="../../assets/images/logo-kiri.png" alt="" style="width: 80px;">
          </th>
          <td style="text-align: center;">
            <h5 class="text-dark" style="font-size: 18px;font-weight: bold;">REPUBLIK INDONESIA <br>KEMENTERIAN
              KEUANGAN
              <br>DIREKTORAT JENDERAL BEA DAN CUKAI <br>KANTOR WILAYAH DJBC BALI, NTB DAN NTT <br>KANTOR PENGAWASAN
              DAN
              PELAYANAN BEA DAN CUKAI TIPE MADYA PABEAN B ATAMBUA
            </h5>
          </td>
          <th style="text-align: center;">
            <img src="../../assets/images/logo-kanan.png" alt="" style="width: 100px;height: 100px;">
          </th>
        </tr>
      </tbody>
    </table>
    </div>
    <p class="text-dark" style="background-color: #c0c2c1;font-size: 14px;text-align: center;padding: 5px;margin-top: 0;border: 1px solid #000;font-weight: bold;">UNTUK DIISI OLEH PEMOHON</p>
    <h5 class="text-dark" style="font-size: 18px;text-align: center;font-weight: bold;border: 1px solid #000; margin-top: 0;">FORMULIR WAWANCARA <br>DALAM RANGKA PERMOHONAN ATAS KENDARAAN BERMOTOR</h5>
    <table class="text-dark" style="border-collapse: collapse; width: 100%; margin-top: 0;">
    <thead>
      <tr style="border: 1px solid #000;">
        <td style="text-align: center;border: 1px solid #000;width: 30px;">1</td>
        <td style="border: 1px solid #000;" colspan="2">Apakah saat ini Saudara dalam keadaan sehat ?</td>
        <td style="border: 1px solid #000;">'. $data["kesehatan"].'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="text-align: center;border: 1px solid #000;width: 30px;">2.</td>
        <td style="border: 1px solid #000;" colspan="2">Apakah Saudara adalah <strong>pengemudi</strong> atas
          kendaraan yang mengajukan permohonan ?</td>
        <td style="border: 1px solid #000;">'. $data['pengemudi_kendaraan'] .'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="text-align: center;border: 1px solid #000;" rowspan="10">3</td>
        <td style="border: 1px solid #000;" colspan="2">Nama Lengkap Pengemudi</td>
        <td style="border: 1px solid #000;">'. $data['nama_pengemudi'].'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="border: 1px solid #000;" colspan="2">Tempat dan tanggal lahir pengemudi</td>
        <td style="border: 1px solid #000;">'. $data['tempat_lahir'].", ".$tgl_lahir.'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="border: 1px solid #000;" rowspan="5">Alamat Pengemudi (sesuai KTP/ID)</td>
        <td style="border: 1px solid #000;">Jalan</td>
        <td style="border: 1px solid #000;">'. $data['jalan_pengemudi'] .'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="border: 1px solid #000;">Keluarahan</td>
        <td style="border: 1px solid #000;">'. $data['kelurahan_pengemudi'] .'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="border: 1px solid #000;">Kecamatan</td>
        <td style="border: 1px solid #000;">'. $data['kecamatan_pengemudi'] .'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="border: 1px solid #000;">Kabupaten / Kota</td>
        <td style="border: 1px solid #000;">'. $data['kabupaten_kota_pengemudi'] .'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="border: 1px solid #000;">Provinsi</td>
        <td style="border: 1px solid #000;">'. $data['provinsi_pengemudi'] .'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="border: 1px solid #000;" colspan="2">Nomor Paspor Pengemudi</td>
        <td style="border: 1px solid #000;">'. $data['no_pasport_pengemudi'] .'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="border: 1px solid #000;" colspan="2">Nomor SIM Pengemudi</td>
        <td style="border: 1px solid #000;">'. $data['no_sim_pengemudi'] .'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="border: 1px solid #000;" colspan="2">Nomor HP Pengemudi</td>
        <td style="border: 1px solid #000;">'. $data['no_hp_pengemudi'] .'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="text-align: center;border: 1px solid #000;">4</td>
        <td style="border: 1px solid #000;" colspan="2">Apakah Saudara adalah pemilik kendaraan ?</td>
        <td style="border: 1px solid #000;">'. $data['pemilik_kendaraan'].'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="text-align: center;border: 1px solid #000;" rowspan="7">5</td>
        <td style="border: 1px solid #000;" colspan="2">Nama Pemilik Kendaraan</td>
        <td style="border: 1px solid #000;">'. $data['nama_pemilik_kendaraan'].'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="border: 1px solid #000;" colspan="2">Nomor Paspor / Identitas Pemilik Kendaraan</td>
        <td style="border: 1px solid #000;">'. $data['identitas_pemilik_kendaraan'] .'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="border: 1px solid #000;" rowspan="5">Alamat Pemilik Kendaraan</td>
        <td style="border: 1px solid #000;">Jalan</td>
        <td style="border: 1px solid #000;">'. $data['jalan_kendaraan'] .'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="border: 1px solid #000;">Keluarahan</td>
        <td style="border: 1px solid #000;">'. $data['kelurahan_kendaraan'] .'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="border: 1px solid #000;">Kecamatan</td>
        <td style="border: 1px solid #000;">'. $data['kecamatan_kendaraan'] .'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="border: 1px solid #000;">Kabupaten / Kota</td>
        <td style="border: 1px solid #000;">'. $data['kabupaten_kota_kendaraan'] .'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="border: 1px solid #000;">Provinsi</td>
        <td style="border: 1px solid #000;">'. $data['provinsi_kendaraan'] .'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="text-align: center;border: 1px solid #000;">6</td>
        <td style="border: 1px solid #000;" colspan="2">Apakah Saudara memiliki Surat Kuasa ( dalam hal kendaraan
          pribadi )
          atau Surat Tugas ( dalam hal kendaraan dinas ) dari pemilik kendaraan ?</td>
        <td style="border: 1px solid #000;">'. $data['surat_kuasa'].'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="text-align: center;border: 1px solid #000;" rowspan="3">7</td>
        <td style="border: 1px solid #000;" colspan="2">Tanda Nomor Kendaraan / Plat Nomor</td>
        <td style="border: 1px solid #000;">'. $data['plat_nomor'].'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="border: 1px solid #000;" colspan="2">Merek / Type / Warna kendaraan</td>
        <td style="border: 1px solid #000;">'. $data['merek_kendaraan'].'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="border: 1px solid #000;" colspan="2">Kepemilikan Kendaraan</td>
        <td style="border: 1px solid #000;">'. $data['kepemilikan_kendaraan'].'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="text-align: center;border: 1px solid #000;" rowspan="5">8</td>
        <td style="border: 1px solid #000;" rowspan="5">Alamat Tujuan Kunjungan Saudara di negara tujuan ?</td>
        <td style="border: 1px solid #000;">Jalan</td>
        <td style="border: 1px solid #000;">'. $data['jalan_tujuan'].'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="border: 1px solid #000;">Distric</td>
        <td style="border: 1px solid #000;">'. $data['distric'].'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="border: 1px solid #000;">Sub-Distric</td>
        <td style="border: 1px solid #000;">'. $data['sub_distric'].'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="border: 1px solid #000;">Suco</td>
        <td style="border: 1px solid #000;">'. $data['suco'].'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="border: 1px solid #000;">Aldeia</td>
        <td style="border: 1px solid #000;">'. $data['aldeia'].'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="text-align: center;border: 1px solid #000;">9</td>
        <td style="border: 1px solid #000;" colspan="2">Maksud kunjunagn Saudara di negara tujuan ?</td>
        <td style="border: 1px solid #000;">'. $data['maksud_kunjungan'].'</td>
      </tr>
    </thead>
  </table>');
  $mpdf->AddPage();
  $mpdf->WriteHTML('<table class="text-dark" style="border-collapse: collapse; width: 100%; margin-top: 0;">
    <thead>
      <tr style="border: 1px solid #000;">
        <td style="text-align: center;border: 1px solid #000;">10</td>
        <td style="border: 1px solid #000;" colspan="2">Rencana jangka waktu kunjungan ?</td>
        <td style="border: 1px solid #000;">'. $data['waktu_kunjungan'].'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="text-align: center;border: 1px solid #000;">11</td>
        <td style="border: 1px solid #000;" colspan="2">Apakah Saudara bersedia <strong>mempertanggungjawabkan</strong> jika <strong>terjadi pelanggaran</strong> atas kendaraan dan <strong>barang-barang</strong> yang dimuat diatasnya ? </td>
        <td style="border: 1px solid #000;">'. $data['pelanggaran_atas_barang'].'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="text-align: center;border: 1px solid #000;">12</td>
        <td style="border: 1px solid #000;" colspan="2">Apakah Saudara bersedia <strong>mempertanggungjawabkan</strong> jika <strong>terjadi pelanggaran</strong> dalam hal kendaraan ini <strong>dijual, disewakan, dihibahkan, dibuang</strong> di negara tujuan <strong>tanpa izin</strong> ? </td>
        <td style="border: 1px solid #000;">'. $data['pelanggaran_atas_penyalahgunaan'].'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="text-align: center;border: 1px solid #000;">13</td>
        <td style="border: 1px solid #000;" colspan="2">Apakah Saudara bersedia <strong>mempertanggungjawabkan</strong> jika <strong>terjadi pelanggaran</strong> dalam hal kendaraan ini <strong>dirubah bentuknya</strong> di negara tujuan secara hakiki <strong>tanpa izin</strong> ? </td>
        <td style="border: 1px solid #000;">'. $data['pelanggaran_atas_modifikasi'].'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="text-align: center;border: 1px solid #000;">14</td>
        <td style="border: 1px solid #000;" colspan="2">Apakah Saudara bersedia <strong>mempertanggungjawabkan</strong> jika <strong>terjadi pelanggaran</strong> kendaraan ini keberadaannya di negara tujuan <strong>melebihi batas waktu</strong> yang telah ditetapkan yakni <strong>30 ( tiga puluh ) hari</strong> ? </td>
        <td style="border: 1px solid #000;">'. $data['pelanggaran_atas_waktu'].'</td>
      </tr>
      <tr style="border: 1px solid #000;">
        <td style="text-align: center;border: 1px solid #000;">15</td>
        <td style="border: 1px solid #000;" colspan="2">Jika Saudara bersedia <strong>melanggar pernyataan</strong> sebagaimana tersebut dalam poin-poin diatas, apakah Saudara <strong>bersedia membayar sanki administrasi berupa denda sebesar 100%</strong> dari bea masuk atas Nilai FOB / harga kendaraan yang seharusnya dibayarkan ?</td>
        <td style="border: 1px solid #000;">'. $data['sanksi'].'</td>
      </tr>
    </thead>
  </table>
  <p>Jawaban atas wawancara ini saya lakukan dengan sadar, tanpa adanya paksaan dari pihak manapun, untuk dipergunakan dalam rangka permohonan yang saya ajukan.</p>');
  if($role<=2){
    $pejabat_bea_cukai=$name;
  }else{
    $pejabat_bea_cukai="..........................................";
  }
  $mpdf->WriteHTML('<table style="width: 100%;margin-top: 50px;font-size: 12px;">
  <tbody>
    <tr>
      <td style="text-align: left;">Mengetahui,</td>
      <td style="text-align: left;width: 300px;"></td>
      <td style="text-align: left;">Malaka, ' . date("d M Y") . '</td>
    </tr>
    <tr>
      <td style="text-align: left;">Pejabat Bea Cukai</td>
      <td style="text-align: left;width: 300px;"></td>
      <td style="text-align: left;">Pemohon,</td>
    </tr>
    <tr>
      <td style="text-align: left;height: 100px;" colspan="3"></td>
    </tr>
    <tr>
      <td style="text-align: center;">'.$pejabat_bea_cukai.'</td>
      <td style="text-align: center;width: 300px;"></td>
      <td style="text-align: center;">'.$data['nama_pengemudi'].'</td>
    </tr>
  </tbody>
</table>');
  
  $mpdf->Output();
  // $mpdf->OutputHttpDownload('try.pdf');
  // header("Location: kedatangan");
  // exit;
}