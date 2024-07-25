<?php require_once("../../controller/script.php");
require_once("redirect.php");
$_SESSION["page-name"] = "Keberangkatan";
$_SESSION["page-url"] = "keberangkatan";
$_SESSION["actual-link"] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$_SESSION["object-link"] = $baseURL . "/views/pendataan/";
require_once("../../templates/views-top.php");
?>

<!-- begin::Content -->
<div class="card mb-5 shadow" style="max-width: 100%;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?= $baseURL ?>/assets/images/logo.jpg" style="width: 100%;" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h3 class="card-title font-weight-bold poppins-regular text-dark">Keberangkatan</h3>
        <form action="" method="post">
          <div class="mb-5 fv-row">
            <label class="required form-label">Pilih data yang akan anda cetak ?</label>
            <div class="d-flex">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="type_file" id="strp" value="strp" checked>
                <label class="form-check-label" for="strp">
                  STRP
                </label>
              </div>
              <div class="form-check" style="margin-left: 10px;">
                <input class="form-check-input" type="radio" name="type_file" id="formulir-wawancara"
                  value="formulir_wawancara">
                <label class="form-check-label" for="formulir-wawancara">
                  Formulir Wawancara
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="no_polisi">No. Plat Kendaraan</label>
            <div class="row">
              <div class="col-lg-9">
                <input type="text" name="no_polisi" class="form-control" id="no_polisi" required>
              </div>
              <div class="col-lg-3">
                <button type="submit" name="search_keberangkatan" class="btn btn-primary"><i class="bi bi-search"></i>
                  Mencari</button>
              </div>
            </div>
            <small id="textHelp" class="form-text text-muted">Temukan plat kendaraan dengan memasukan kombinasi huruf
              dan angka seperti contoh berikut <strong>XX 1111 XX</strong>.</small>
          </div>
        </form>
        <h5 class="mt-5 text-dark">Jumlah Keberangkatan</h5>
        <div class="d-flex">
          <i class="bi bi-truck text-dark" style="font-size: 50px;"></i>
          <h3 class="ml-3 text-dark"><?= mysqli_num_rows($counts_keberangkatan)?></h3>
        </div>
      </div>
    </div>
  </div>
</div>

<?php if(!isset($_SESSION["keberangkatan"])){?>
<div class="card mt-5">
  <div class="card-header mt-6">
    <div class="card-title">
      <h2><?= $_SESSION['page-name'] ?></h2>
    </div>
  </div>
  <div class="card-body py-4">
    <div class="table-responsive">
      <table class="table align-middle table-row-dashed fs-6 gy-5 text-center display" id="datatable">
        <thead>
          <tr class="text-muted fw-bolder fs-7 text-uppercase gs-0">
            <th class="text-center min-w-125px">Kategori</th>
            <th class="text-center min-w-125px">No. Registrasi STRP</th>
            <th class="text-center min-w-125px">Plat Nomor</th>
            <th class="text-center min-w-125px">Nama Pengemudi</th>
            <th class="text-center min-w-125px">Status STRP</th>
            <th class="text-center min-w-125px">Status Formulir</th>
            <th class="text-center min-w-100px">Aksi</th>
          </tr>
        </thead>
        <tbody class="text-gray-600 fw-bold">
          <?php if (mysqli_num_rows($views_keberangkatan) > 0) {
            while ($row = mysqli_fetch_assoc($views_keberangkatan)) { ?>
          <tr>
            <td><?= $row['kategori'] ?></td>
            <td>STRP/<?= $row['no_registrasi'] ?>/II/<?= date('Y')?>/Motamasin</td>
            <td><?= $row['no_polisi'] ?></td>
            <td><?= $row['nama_pengemudi'] ?></td>
            <td><?= $row['status_strp'] ?></td>
            <td><?= $row['status_formulir'] ?></td>
            <td class="text-center">

              <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click"
                data-kt-menu-placement="bottom-end">Aksi
                <span class="svg-icon svg-icon-5 m-0">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path
                      d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                      fill="currentColor" />
                  </svg>
                </span>
              </a>

              <div
                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                data-kt-menu="true">
                <div class="menu-item px-3">
                  <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                    data-bs-target="#detail-strp<?= $row['id_keberangkatan'] ?>">Detail STRP</a>
                </div>
                <div class="menu-item px-3">
                  <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                    data-bs-target="#detail-formulir<?= $row['id_keberangkatan'] ?>">Detail Formulir Wawancara</a>
                </div>
                <div class="menu-item px-3">
                  <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                    data-bs-target="#files<?= $row['id_keberangkatan'] ?>">Files</a>
                </div>
                <div class="menu-item px-3">
                  <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                    data-bs-target="#ubah<?= $row['id_keberangkatan'] ?>">Ubah</a>
                </div>
              </div>

              <div class="modal fade" id="detail-strp<?= $row['id_keberangkatan'] ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header border-bottom-0 shadow">
                      <h5 class="modal-title" id="exampleModalLabel">Detail STRP <?= $row['nama_pengemudi'] ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-left">
                      <ul style="list-style-type: none;padding: 0;margin: 0;text-align: left;">
                        <li>
                          <p>No. SIM : <?= $row['no_sim'] ?></p>
                        </li>
                        <li>
                          <p>No. Pasport : <?= $row['no_pasport'] ?></p>
                        </li>
                        <li>
                          <p>Warga Negara : <?= $row['warga_negara'] ?></p>
                        </li>
                        <li>
                          <p>Merek / Jenis : <?= $row['jenis_kendaraan'] ?></p>
                        </li>
                        <li>
                          <p>Kepemilikan Kendaraan : <?= $row['kepemilikan_kendaraan'] ?></p>
                        </li>
                        <li>
                          <p>Tahun Pembuatan / CC : <?= $row['tahun_pembuatan']." / ".$row['cc'] ?></p>
                        </li>
                        <li>
                          <p>No. Rangka : <?= $row['no_rangka'] ?></p>
                        </li>
                        <li>
                          <p>No. Mesin : <?= $row['no_mesin'] ?></p>
                        </li>
                        <li>
                          <p>Warna : <?= $row['warna'] ?></p>
                        </li>
                        <li>
                          <p>Bahan Bakar : <?= $row['bahan_bakar'] ?></p>
                        </li>
                        <li>
                          <p>Maksud Kunjungan : <?= $row['maksud_kunjungan'] ?></p>
                        </li>
                        <li>
                          <p>Alamat Tujuan : <?= $row['alamat_tujuan'] ?></p>
                        </li>
                        <li>
                          <p>Berlaku Hingga : <?= $row['berlaku_hingga'] ?></p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="detail-formulir<?= $row['id_keberangkatan'] ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header border-bottom-0 shadow">
                      <h5 class="modal-title" id="exampleModalLabel">Detail Formulir <?= $row['nama_pengemudi'] ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-left">
                      <ul style="list-style-type: none;padding: 0;margin: 0;text-align: left;">
                        <li>
                          <p>Kesehatan : <?= $row['kesehatan'] ?></p>
                        </li>
                        <li>
                          <p>Pengemudi atas kendaraannya : <?= $row['pengemudi_kendaraan'] ?></p>
                        </li>
                        <li>
                          <p>Tempat lahir : <?= $row['tempat_lahir'] ?></p>
                        </li>
                        <li>
                          <p>Tgl lahir : <?= $row['tgl_lahir'] ?></p>
                        </li>
                        <hr>
                        <h6>Alamat pengemudi</h6>
                        <li>
                          <p>Jalan : <?= $row['jalan_pengemudi'] ?></p>
                        </li>
                        <li>
                          <p>Kelurahan : <?= $row['kelurahan_pengemudi'] ?></p>
                        </li>
                        <li>
                          <p>Kecamatan : <?= $row['kecamatan_pengemudi'] ?></p>
                        </li>
                        <li>
                          <p>Kabupaten / Kota : <?= $row['kabupaten_kota_pengemudi'] ?></p>
                        </li>
                        <li>
                          <p>Provinsi : <?= $row['provinsi_pengemudi'] ?></p>
                        </li>
                        <hr>
                        <li>
                          <p>No. Pasport Pengemudi : <?= $row['no_pasport_pengemudi'] ?></p>
                        </li>
                        <li>
                          <p>No. SIM pengemudi : <?= $row['no_sim_pengemudi'] ?></p>
                        </li>
                        <li>
                          <p>No. HP Pengemudi : <?= $row['no_hp_pengemudi'] ?></p>
                        </li>
                        <li>
                          <p>Pemilik kendaraan : <?= $row['pemilik_kendaraan'] ?></p>
                        </li>
                        <li>
                          <p>Nama pemilik kendaraan : <?= $row['nama_pemilik_kendaraan'] ?></p>
                        </li>
                        <li>
                          <p>Identitas pemilik kendaraan : <?= $row['identitas_pemilik_kendaraan'] ?></p>
                        </li>
                        <hr>
                        <h6>Alamat pemilik kendaraan</h6>
                        <li>
                          <p>Jalan : <?= $row['jalan_kendaraan'] ?></p>
                        </li>
                        <li>
                          <p>Kelurahan : <?= $row['kelurahan_kendaraan'] ?></p>
                        </li>
                        <li>
                          <p>Kecamatan : <?= $row['kecamatan_kendaraan'] ?></p>
                        </li>
                        <li>
                          <p>Kabupaten / Kota : <?= $row['kabupaten_kota_kendaraan'] ?></p>
                        </li>
                        <li>
                          <p>Provinsi : <?= $row['provinsi_kendaraan'] ?></p>
                        </li>
                        <hr>
                        <li>
                          <p>Surat kuasa : <?= $row['surat_kuasa'] ?></p>
                        </li>
                        <li>
                          <p>Merek kendaraan : <?= $row['merek_kendaraan'] ?></p>
                        </li>
                        <li>
                          <p>Kepemilikan kendaraan : <?= $row['kepemilikan_kendaraan'] ?></p>
                        </li>
                        <hr>
                        <h6>Alamat tujuan</h6>
                        <li>
                          <p>Jalan : <?= $row['jalan_kendaraan'] ?></p>
                        </li>
                        <li>
                          <p>Distric : <?= $row['distric'] ?></p>
                        </li>
                        <li>
                          <p>Sub-Distric : <?= $row['sub_distric'] ?></p>
                        </li>
                        <li>
                          <p>Suco : <?= $row['suco'] ?></p>
                        </li>
                        <li>
                          <p>Aldeia : <?= $row['aldeia'] ?></p>
                        </li>
                        <hr>
                        <li>
                          <p>Maksud kunjungan : <?= $row['maksud_kunjungan'] ?></p>
                        </li>
                        <li>
                          <p>Waktu kunjungan : <?= $row['waktu_kunjungan'] ?></p>
                        </li>
                        <li>
                          <p>Pelanggaran atas barang : <?= $row['pelanggaran_atas_barang'] ?></p>
                        </li>
                        <li>
                          <p>Pelanggaran atas penyalahgunaan : <?= $row['pelanggaran_atas_penyalahgunaan'] ?></p>
                        </li>
                        <li>
                          <p>Pelanggaran atas modifikasi kendaraan : <?= $row['pelanggaran_atas_modifikasi'] ?></p>
                        </li>
                        <li>
                          <p>Pelanggaran atas waktu kunjungan : <?= $row['pelanggaran_atas_waktu'] ?></p>
                        </li>
                        <li>
                          <p>Bersedia di kenai sanksi : <?= $row['sanksi'] ?></p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="files<?= $row['id_keberangkatan'] ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header border-bottom-0 shadow">
                      <h5 class="modal-title" id="exampleModalLabel">Files Persyaratan <?= $row['nama_pengemudi'] ?>
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                      <embed
                        src="<?= $baseURL?>/assets/files/<?= $row['kategori']?>/<?php $kk = str_replace(' ', '', strtolower($row['kepemilikan_kendaraan'])); echo $kk;?>/<?= $row['files']?>"
                        type="application/pdf" width="100%" style="height: 700px;">
                    </div>
                  </div>
                </div>
              </div>

              <?php if($role==2){?>
              <div class="modal fade" id="ubah<?= $row['id_keberangkatan'] ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header border-bottom-0 shadow">
                      <h5 class="modal-title" id="exampleModalLabel">Ubah STRP <?= $row['nama_pengemudi'] ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="id_keberangkatan" value="<?= $row['id_keberangkatan'] ?>">
                      <div class="modal-body">
                        <div class="mb-5 fv-row">
                          <label class="required form-label">Apakah data STRP dari Saudara <?= $row['nama_pengemudi'] ?>
                            benar ?</label>
                          <div class="d-flex">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="validasi" id="valid" value="Valid"
                                checked>
                              <label class="form-check-label" for="valid">
                                Valid
                              </label>
                            </div>
                            <div class="form-check" style="margin-left: 10px;">
                              <input class="form-check-input" type="radio" name="validasi" id="tidak-valid"
                                value="Tidak Valid">
                              <label class="form-check-label" for="tidak-valid">
                                Tidak Valid
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer border-top-0 justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="validasi_strp_keberangkatan" class="btn btn-warning">Ubah</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <?php }else if($role==1){?>
              <div class="modal fade" id="ubah<?= $row['id_keberangkatan'] ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header border-bottom-0 shadow">
                      <h5 class="modal-title" id="exampleModalLabel">Ubah STRP <?= $row['nama_pengemudi'] ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="id_keberangkatan" value="<?= $row['id_keberangkatan'] ?>">
                      <div class="modal-body">
                        <div class="mb-5 fv-row">
                          <label class="required form-label">Apakah data Formulir Wawancara dari Saudara
                            <?= $row['nama_pengemudi'] ?> benar ?</label>
                          <div class="d-flex">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="kesehatan" id="valid" value="Valid"
                                checked>
                              <label class="form-check-label" for="valid">
                                Valid
                              </label>
                            </div>
                            <div class="form-check" style="margin-left: 10px;">
                              <input class="form-check-input" type="radio" name="kesehatan" id="tidak-valid"
                                value="Tidak Valid">
                              <label class="form-check-label" for="tidak-valid">
                                Tidak Valid
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer border-top-0 justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="validasi_formulir_keberangkatan"
                          class="btn btn-warning">Ubah</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <?php }?>

            </td>
          </tr>
          <?php }
          } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php }else if(isset($_SESSION["keberangkatan"])){
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
    if(mysqli_num_rows($views_keberangkatan)==0){?>
<div class="card shadow">
  <div class="card-body">
    <p class="text-dark">No. Plat Kendaraan <strong><?= $no_polisi?></strong> tidak ditemukan!</p>
  </div>
</div>
<?php }else if(mysqli_num_rows($views_keberangkatan)>0){
      $no=1;
      while($data=mysqli_fetch_assoc($views_keberangkatan)){
        $tgl_lahir = date_create($data["tgl_lahir"]);
        $tgl_lahir = date_format($tgl_lahir, "d M Y");
        if($type_file=="strp"){?>
<?php }else if($type_file=="formulir_wawancara"){?>
<div class="card shadow">
  <div class="card-body">
    <div class="d-flex justify-content-end">
      <a href="cetak-formulir-keberangkatan" class="btn btn-success ml-3" target="_blank"><i class="bi bi-printer"></i>
        Cetak</a>
    </div>
    <div style="border-bottom: 3px solid black;width: 100%;">
      <table style="width: 100%;" style="border: 1px solid #000;">
        <tbody>
          <tr>
            <th style="text-align: center;">
              <img src="<?= $baseURL?>/assets/images/logo-kiri.png" alt="" style="width: 80px;">
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
              <img src="<?= $baseURL?>/assets/images/logo-kanan.png" alt="" style="width: 100px;height: 100px;">
            </th>
          </tr>
        </tbody>
      </table>
    </div>
    <p class="text-dark"
      style="background-color: #c0c2c1;font-size: 14px;text-align: center;padding: 5px;margin-top: 0;border: 1px solid #000;font-weight: bold;">
      UNTUK DIISI OLEH PEMOHON</p>
    <h5 class="text-dark"
      style="font-size: 18px;text-align: center;font-weight: bold;border: 1px solid #000; margin-top: 0;">FORMULIR
      WAWANCARA
      <br>DALAM RANGKA PERMOHONAN ATAS KENDARAAN BERMOTOR
    </h5>
    <table class="text-dark" style="border-collapse: collapse; width: 100%; margin-top: 0;">
      <thead>
        <tr style="border: 1px solid #000;">
          <td style="text-align: center;border: 1px solid #000;width: 30px;"><?= $no++;?>.</td>
          <td style="border: 1px solid #000;" colspan="2">Apakah saat ini Saudara dalam keadaan sehat ?</td>
          <td style="border: 1px solid #000;"><?= $data["kesehatan"]?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="text-align: center;border: 1px solid #000;width: 30px;"><?= $no++;?>.</td>
          <td style="border: 1px solid #000;" colspan="2">Apakah Saudara adalah <strong>pengemudi</strong> atas
            kendaraan yang mengajukan permohonan ?</td>
          <td style="border: 1px solid #000;"><?= $data['pengemudi_kendaraan'] ?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="text-align: center;border: 1px solid #000;" rowspan="10"><?= $no++;?>.</td>
          <td style="border: 1px solid #000;" colspan="2">Nama Lengkap Pengemudi</td>
          <td style="border: 1px solid #000;"><?= $data['nama_pengemudi']?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;" colspan="2">Tempat dan tanggal lahir pengemudi</td>
          <td style="border: 1px solid #000;"><?= $data['tempat_lahir'].", ".$tgl_lahir?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;" rowspan="5">Alamat Pengemudi (sesuai KTP/ID)</td>
          <td style="border: 1px solid #000;">Jalan</td>
          <td style="border: 1px solid #000;"><?= $data['jalan_pengemudi'] ?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;">Keluarahan</td>
          <td style="border: 1px solid #000;"><?= $data['kelurahan_pengemudi'] ?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;">Kecamatan</td>
          <td style="border: 1px solid #000;"><?= $data['kecamatan_pengemudi'] ?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;">Kabupaten / Kota</td>
          <td style="border: 1px solid #000;"><?= $data['kabupaten_kota_pengemudi'] ?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;">Provinsi</td>
          <td style="border: 1px solid #000;"><?= $data['provinsi_pengemudi'] ?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;" colspan="2">Nomor Paspor Pengemudi</td>
          <td style="border: 1px solid #000;"><?= $data['no_pasport_pengemudi'] ?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;" colspan="2">Nomor SIM Pengemudi</td>
          <td style="border: 1px solid #000;"><?= $data['no_sim_pengemudi'] ?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;" colspan="2">Nomor HP Pengemudi</td>
          <td style="border: 1px solid #000;"><?= $data['no_hp_pengemudi'] ?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="text-align: center;border: 1px solid #000;"><?= $no++;?>.</td>
          <td style="border: 1px solid #000;" colspan="2">Apakah Saudara adalah pemilik kendaraan ?</td>
          <td style="border: 1px solid #000;"><?= $data['pemilik_kendaraan']?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="text-align: center;border: 1px solid #000;" rowspan="7"><?= $no++;?>.</td>
          <td style="border: 1px solid #000;" colspan="2">Nama Pemilik Kendaraan</td>
          <td style="border: 1px solid #000;"><?= $data['nama_pemilik_kendaraan']?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;" colspan="2">Nomor Paspor / Identitas Pemilik Kendaraan</td>
          <td style="border: 1px solid #000;"><?= $data['identitas_pemilik_kendaraan'] ?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;" rowspan="5">Alamat Pemilik Kendaraan</td>
          <td style="border: 1px solid #000;">Jalan</td>
          <td style="border: 1px solid #000;"><?= $data['jalan_kendaraan'] ?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;">Keluarahan</td>
          <td style="border: 1px solid #000;"><?= $data['kelurahan_kendaraan'] ?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;">Kecamatan</td>
          <td style="border: 1px solid #000;"><?= $data['kecamatan_kendaraan'] ?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;">Kabupaten / Kota</td>
          <td style="border: 1px solid #000;"><?= $data['kabupaten_kota_kendaraan'] ?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;">Provinsi</td>
          <td style="border: 1px solid #000;"><?= $data['provinsi_kendaraan'] ?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="text-align: center;border: 1px solid #000;"><?= $no++;?>.</td>
          <td style="border: 1px solid #000;" colspan="2">Apakah Saudara memiliki Surat Kuasa ( dalam hal kendaraan
            pribadi )
            atau Surat Tugas ( dalam hal kendaraan dinas ) dari pemilik kendaraan ?</td>
          <td style="border: 1px solid #000;"><?= $data['surat_kuasa']?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="text-align: center;border: 1px solid #000;" rowspan="3"><?= $no++;?>.</td>
          <td style="border: 1px solid #000;" colspan="2">Tanda Nomor Kendaraan / Plat Nomor</td>
          <td style="border: 1px solid #000;"><?= $data['plat_nomor']?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;" colspan="2">Merek / Type / Warna kendaraan</td>
          <td style="border: 1px solid #000;"><?= $data['merek_kendaraan']?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;" colspan="2">Kepemilikan Kendaraan</td>
          <td style="border: 1px solid #000;"><?= $data['kepemilikan_kendaraan']?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="text-align: center;border: 1px solid #000;" rowspan="5"><?= $no++;?>.</td>
          <td style="border: 1px solid #000;" rowspan="5">Alamat Tujuan Kunjungan Saudara di negara tujuan ?</td>
          <td style="border: 1px solid #000;">Jalan</td>
          <td style="border: 1px solid #000;"><?= $data['jalan_tujuan']?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;">Distric</td>
          <td style="border: 1px solid #000;"><?= $data['distric']?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;">Sub-Distric</td>
          <td style="border: 1px solid #000;"><?= $data['sub_distric']?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;">Suco</td>
          <td style="border: 1px solid #000;"><?= $data['suco']?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;">Aldeia</td>
          <td style="border: 1px solid #000;"><?= $data['aldeia']?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="text-align: center;border: 1px solid #000;"><?= $no++;?>.</td>
          <td style="border: 1px solid #000;" colspan="2">Maksud kunjunagn Saudara di negara tujuan ?</td>
          <td style="border: 1px solid #000;"><?= $data['maksud_kunjungan']?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="text-align: center;border: 1px solid #000;"><?= $no++;?>.</td>
          <td style="border: 1px solid #000;" colspan="2">Rencana jangka waktu kunjungan ?</td>
          <td style="border: 1px solid #000;"><?= $data['waktu_kunjungan']?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="text-align: center;border: 1px solid #000;"><?= $no++;?>.</td>
          <td style="border: 1px solid #000;" colspan="2">Apakah Saudara bersedia
            <strong>mempertanggungjawabkan</strong> jika <strong>terjadi pelanggaran</strong> atas kendaraan dan
            <strong>barang-barang</strong> yang dimuat diatasnya ?</td>
          <td style="border: 1px solid #000;"><?= $data['pelanggaran_atas_barang']?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="text-align: center;border: 1px solid #000;"><?= $no++;?>.</td>
          <td style="border: 1px solid #000;" colspan="2">Apakah Saudara bersedia
            <strong>mempertanggungjawabkan</strong> jika <strong>terjadi pelanggaran</strong> dalam hal kendaraan ini
            <strong>dijual, disewakan, dihibahkan, dibuang</strong> di negara tujuan <strong>tanpa izin</strong> ?</td>
          <td style="border: 1px solid #000;"><?= $data['pelanggaran_atas_penyalahgunaan']?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="text-align: center;border: 1px solid #000;"><?= $no++;?>.</td>
          <td style="border: 1px solid #000;" colspan="2">Apakah Saudara bersedia
            <strong>mempertanggungjawabkan</strong> jika <strong>terjadi pelanggaran</strong> dalam hal kendaraan ini
            <strong>dirubah bentuknya</strong> di negara tujuan secara hakiki <strong>tanpa izin</strong> ?</td>
          <td style="border: 1px solid #000;"><?= $data['pelanggaran_atas_modifikasi']?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="text-align: center;border: 1px solid #000;"><?= $no++;?>.</td>
          <td style="border: 1px solid #000;" colspan="2">Apakah Saudara bersedia
            <strong>mempertanggungjawabkan</strong> jika <strong>terjadi pelanggaran</strong> kendaraan ini
            keberadaannya di negara tujuan <strong>melebihi batas waktu</strong> yang telah ditetapkan yakni <strong>30
              ( tiga puluh ) hari</strong> ?</td>
          <td style="border: 1px solid #000;"><?= $data['pelanggaran_atas_waktu']?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="text-align: center;border: 1px solid #000;"><?= $no++;?>.</td>
          <td style="border: 1px solid #000;" colspan="2">Jika Saudara bersedia <strong>melanggar pernyataan</strong>
            sebagaimana tersebut dalam poin-poin diatas, apakah Saudara <strong>bersedia membayar sanki administrasi
              berupa denda sebesar 100%</strong> dari bea masuk atas Nilai FOB / harga kendaraan yang seharusnya
            dibayarkan ?</td>
          <td style="border: 1px solid #000;"><?= $data['sanksi']?></td>
        </tr>
      </thead>
    </table>
  </div>
</div>
<?php }}}}?>
<!-- end::Content -->

<?p