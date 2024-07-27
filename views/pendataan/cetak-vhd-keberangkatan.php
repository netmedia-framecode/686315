<?php require_once("../../controller/script.php");
require_once __DIR__ . '/../../assets/vendor/autoload.php';

if (isset($_SESSION["keberangkatan"])) {
  
  $type_file=valid($conn, $_SESSION["keberangkatan"]["type_file"]);
  $no_polisi=valid($conn, $_SESSION["keberangkatan"]["no_polisi"]);
  $keberangkatan = "SELECT keberangkatan.*, 
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
      FROM keberangkatan 
      JOIN formulir_wawancara ON keberangkatan.id_fw = formulir_wawancara.id_fw 
      JOIN alamat_pengemudi ON formulir_wawancara.id_fw = alamat_pengemudi.id_fw 
      JOIN alamat_kendaraan ON formulir_wawancara.id_fw = alamat_kendaraan.id_fw 
      JOIN alamat_tujuan ON formulir_wawancara.id_fw = alamat_tujuan.id_fw 
      JOIN kepemilikan_kendaraan ON formulir_wawancara.id_kepemilikan_kendaraan = kepemilikan_kendaraan.id_kepemilikan_kendaraan
      JOIN strp ON formulir_wawancara.id_strp = strp.id_strp
      JOIN warga_negara ON strp.id_warga_negara = warga_negara.id_warga_negara
      JOIN bahan_bakar ON strp.id_bahan_bakar = bahan_bakar.id_bahan_bakar
      WHERE strp.no_polisi = '$no_polisi'
      AND keberangkatan.status_strp = 'Valid'
      OR keberangkatan.status_formulir = 'Valid'
  ";
  $views_keberangkatan = mysqli_query($conn, $keberangkatan);
  $data = mysqli_fetch_assoc($views_keberangkatan);
  $customSize = [210, 330]; // 210mm x 330mm
  $mpdf = new \Mpdf\Mpdf([
    'format' => $customSize
  ]);
  $mpdf->WriteHTML('<div style="border-bottom: 3px solid black;width: 100%;">
    <table style="width: 100%;" style="border: 1px solid #000;">
      <tbody>
        <tr>
          <th style="text-align: center;">
            <img src="../../assets/images/logo-kiri.png" alt="" style="width: 80px;">
          </th>
          <td style="text-align: center;">
            <h5 class="text-dark" style="font-size: 14px;font-weight: bold;">REPUBLIK INDONESIA <br>KEMENTERIAN KEUANGAN <br>DIREKTORAT JENDERAL BEA DAN CUKAI <br><i>VEHICLE DECLARATION</i> <br>EKSPOR YANG DIMAKSUDKAN UNTUK DIIMPOR KEMBALI (EKSPOR SEMENTARA) <br>ATAS KENDARAAN BERMOTOR YANG MELALUI POS LINTAS BATAS NEGARA MOTAMASIN</h5>
          </td>
          <th style="text-align: center;">
            <img src="../../assets/images/logo-kanan.png" alt="" style="width: 100px;height: 100px;">
          </th>
        </tr>
      </tbody>
    </table>
    </div>
    <p class="text-dark" style="background-color: #c0c2c1;font-size: 14px;text-align: center;padding: 5px;margin-top: 0;border: 1px solid #000;font-weight: bold;">UNTUK DIISI OLEH EKSPORTIR</p>
    <table class="text-dark" style="border-collapse: collapse; width: 100%; margin-top: 0; font-size: 14px;">
      <thead>
        <tr style="border: 1px solid #000;">
          <td style="text-align: center;border: 1px solid #000;" colspan="2">NOMOR PENDAFTARAN / KODE KANTOR : '. $data['no_registrasi'].' / 081400 <br>TANGGAL : '. date('d-m-Y').'</td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;width: 300px;">DATA EKSPORTIR</td>
          <td style="border: 1px solid #000;">PERNYATAAN EKSPORTIR</td>
        </tr>
        <tr>
          <td style="border: 1px solid #000;">1. Nama Pemilik Kendaraan Bermotor : <strong>'. $data['nama_pemilik'].'</strong> <br><i>Name od Owner</i></td>
          <td style="border-right: 1px solid #000;" rowspan="2">1. Bahwa saya akan menyampaikan Vehicle Declaration kepada Pejabat Bea dan Cukai baik saat keluar dari daerah pabean untuk proses ekspor maupun masuk ke daerah pabean untuk proses impor kembali.</td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;">2. Alamat Pemilik Kendaraan Bermotor : <strong>'. $data['alamat_pemilik'].'</strong> <br>Address of Owner</td>
        </tr>
        <tr>
          <td style="border: 1px solid #000;">3. Nomor Passport atau Identitas Lain Pemilik : <strong>'. $data['identitas_pemilik_kendaraan'].'</strong> <br>Number od Owners Passport or Other Identity</td>
          <td style="border-right: 1px solid #000;">2. Bahwa saya menerima penetapan nilai pabean dari tarif yang dilakukan oleh Pejabat Bea dan Cukai dalam rangka pemenuhan kepabeanan.</td>
        </tr>
        <tr>
          <td style="border: 1px solid #000;">4. Nama Pengemudi : <strong>'. $data['nama_pengemudi'].'</strong> <br>Name of Driver</td>
          <td style="border-right: 1px solid #000;" rowspan="2">3. Bahwa saya bertanggung jawab terhadap kendaraan bermotor untuk tidak dilakukan perubahan dan sanggup membayar bea masuk dan pajak dalam rangka impor apabila terjadi terhadap bagian-bagian (parts) pengganti atau ditambahkan, serta biaya perbaikannya termasuk ongkos angkutan dan asuransi pada kendaraan bermotor.</td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;">5. Alamat Pengemudi : <strong>'. $data['jalan_pengemudi'].", ".$data['kelurahan_pengemudi'].", ".$data['kecamatan_pengemudi'].", ".$data['kabupaten_kota_pengemudi'].", ".$data['provinsi_pengemudi'] .'</strong> <br>Address of Driver</td>
        </tr>
        <tr>
          <td style="border: 1px solid #000;">6. Nomor Passport atau Identitas Lain pengemudi : <strong>'. $data['no_pasport_pengemudi'].'</strong> <br>Number od Drivers Passport or Other Identity</td>
          <td style="border-right: 1px solid #000;" rowspan="2">4. Apabila saya tidak melakukan ketentuan di atas, maka saya tidak berkeberatan atas tindakan Pejabat Bea dan Cukai untuk menegah hingga melakukan penyitaan atas kendaraan dan barang yang dimuatnya yang saya kuasai untuk penyelesaian sesuai ketentuan yang berlaku.</td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;">7. Nomor Lisensi Mengemudi : <strong>'. $data['no_sim_pengemudi'].'</strong> <br>Drivers License Number</td>
        </tr>
        <tr>
          <td style="border: 1px solid #000;">DATA KENDARAAN</td>
          <td style="border-right: 1px solid #000;" rowspan="5"></td>
        </tr>
        <tr>
          <td style="border: 1px solid #000;">8. Nomor Registrasi Kendaraan Bermotor : <strong>STRP / '. $data["no_registrasi"].' / II ? '. date('Y').'</strong> <br>Vehicle Registration Card Number</td>
        </tr>
        <tr>
          <td style="border: 1px solid #000;">9. Tanda Nomor Kendaraan Bermotor : <strong>'. $data["no_polisi"].'</strong> <br><i>Registration Plate Number</i></td>
        </tr>
        <tr>
          <td style="border: 1px solid #000;">10. Negara Pendaftaran : <strong>INDONESIA</strong> <br><i>Country of Registration</i></td>
        </tr>
        <tr>
          <td style="border: 1px solid #000;">11. Merk dan jenis kendaraan : <strong>'. $data['merek_kendaraan'].'</strong> <br><i>Make and Model of Vehicle</i></td>
        </tr>
        <tr>
          <td style="border: 1px solid #000;">12. Nomor Rangka : <strong>'. $data['no_rangka'].'</strong> <br><i>Chassis Number</i></td>
          <td style="border-top: 1px solid #000;border-right: 1px solid #000;" rowspan="2">Dengan ini saya menyatakan bertanggung jawab atas kebenaran hal-hal yang diberitahukan dalam dokumen ini dan telah memahami isi pernyataan <strong>PLBN MOTAMASIN, '. date('d-m-Y / h:i:a').' Eksportir,</strong></td>
        </tr>
        <tr>
          <td style="border: 1px solid #000;">13. Nomor Mesin : <strong>'. $data['no_mesin'].'</strong> <br><i>Engine Number</i></td>
        </tr>
        <tr>
          <td style="border: 1px solid #000;">14. Tahun Pembuatan / cc : <strong>'. $data['tahun_pembuatan']." / ".$data['cc'].'</strong> <br><i>Year Manufactured / cc</i></td>
          <th style="border-right: 1px solid #000;"></th>
        </tr>
        <tr>
          <td style="border: 1px solid #000;width: 300px;">15. Warna Kendaraan Bermotor : <strong>'. $data['warna'].'</strong> <br><i>Colour of Vehicle</i></td>
          <th style="border-right: 1px solid #000;"></th>
        </tr>
        <tr>
          <td style="border: 1px solid #000;">16. Alamat (di luar negeri) : <strong>'. $data['jalan_tujuan'].", ".$data['distric'].", ".$data['sub_distric'].", ".$data['suco'].", ".$data['aldeia'] .'</strong> <br><i>Address of Destination</i></td>
          <th style="border-bottom: 1px solid #000;border-right: 1px solid #000;">'. $data['nama_pemilik'].'</th>
        </tr>
      </thead>
    </table>');
    $mpdf->AddPage();
    if($data['status_strp']!="Valid"){
      $diperiksa = "10%";
    }else if($data['status_strp']=="Valid"){
      $diperiksa = "50%";
    }else if($data['status_formulir']=="Valid"){
      $diperiksa = "100%";
    }
    $tgl_validasi = date_create($data['updated_at']); 
    $tgl_validasi = date_format($tgl_validasi, "d-m-Y / h:i:a");
    if($data['status_formulir']!="Valid"){
      $kesimpulan = "FISIK KENDARAAN TIDAK SESUAI";
    }else if($data['status_formulir']=="Valid"){
      $kesimpulan = "FISIK KENDARAAN SESUAI";
    }
    if($data['status_formulir']=="Valid"){
      $status_plbn = "Setuju/<del>Tidak</del>";
    }else if($data['status_formulir']!="Valid"){
      $status_plbn = "<del>Setuju</del>/Tidak";
    }
    $mpdf->WriteHTML('
    <p class="text-dark" style="background-color: #c0c2c1;font-size: 14px;text-align: center;padding: 5px;margin-top: 0;border: 1px solid #000;font-weight: bold;">
      UNTUK DIISI OLEH PEJABAT DIREKTORAT JENDERAL BEA DAN CUKAI</p>
    <table class="text-dark" style="border-collapse: collapse; width: 100%; margin-top: -14px; font-size: 14px;">
      <thead>
        <tr style="border: 1px solid #000;">
          <td style="text-align: center;border: 1px solid #000;width: 30px;" colspan="2">SAAT EKSPOR SEMENTARA (PERTAMA)</td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;width: 300px;">1. Izin tinggal di luar negeri sampai tanggal : <strong>'. $data['berlaku_hingga'].'</strong></td>
          <td style="border: 1px solid #000;">Catatan Pemeriksaan Fisik Kendaraan Saat Impor</td>
        </tr>
        <tr>
          <td style="border: 1px solid #000;">2. Asuransi di luar negeri sampai tanggal : <strong></strong></td>
          <td style="border-right: 1px solid #000;" rowspan="3">Diperiksa sesuai Instruksi : <strong>'.$diperiksa.'</strong> <br>Pada tanggal / jam : <strong>'.$tgl_validasi.'</strong> <br>Atas Kendaraan : <br>a. Jumlah Roda : <strong>'. $data['jenis_kendaraan'].'</strong> <br>b. Nomor Polisi : <strong>'. $data['no_polisi'].'</strong> <br>Merk / Type / Warna : <strong>'. $data['merek_kendaraan']." / ".$data['warna'].'</strong> <br>d. No. Mesin / No. Rangka : <strong>'. $data['no_mesin']." / ".$data['no_rangka'].'</strong> <br>e. Uraian Muatan : <strong>'. $data['kepemilikan_kendaraan'].'</strong> <br>f. Kesimpulan : <strong>'.$kesimpulan.'</strong></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;">3. Surat ijin/kuasa dari pemilik kendaraan : <strong></strong></td>
        </tr>
        <tr style="border-left: 1px solid #000;border-right: 1px solid #000;">
          <td style="border-right: 1px solid #000;height: 150px;">Tanggal Kendaraan Keluar : '. date('d-m-Y').' <br>'.$status_plbn.'</td>
        </tr>
        <tr>
          <td style="border-left: 1px solid #000;border-right: 1px solid #000;text-align: center;">Kepala Hanggar PLBN,</td>
          <td style="border-right: 1px solid #000;text-align: center;">Pejabat Pemeriksa,</td>
        </tr>
        <tr>
          <td style="border-left: 1px solid #000;border-right: 1px solid #000;text-align: center;height: 100px;"></td>
          <td style="border-right: 1px solid #000;text-align: center;height: 100px;"></td>
        </tr>
        <tr>
          <td style="border-left: 1px solid #000;border-right: 1px solid #000;border-bottom: 1px solid #000;text-align: center;">.............................................. <br>..............................................</td>
          <td style="border-right: 1px solid #000;border-bottom: 1px solid #000;text-align: center;">.............................................. <br>..............................................</td>
        </tr>
      </thead>
    </table>');
  
  $mpdf->Output();
  // $mpdf->OutputHttpDownload('try.pdf');
  // header("Location: keberangkatan");
  // exit;
}