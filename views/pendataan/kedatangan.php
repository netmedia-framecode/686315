<?php require_once("../../controller/script.php");
require_once("redirect.php");
$_SESSION["page-name"] = "Kedatangan";
$_SESSION["page-url"] = "kedatangan";
$_SESSION["actual-link"] = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
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
        <h3 class="card-title font-weight-bold poppins-regular text-dark">Kedatangan</h3>
        <form action="" method="post">
          <div class="mb-5 fv-row">
            <label class="required form-label">Pilih data yang akan anda cetak ?</label>
            <div class="d-flex">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="type_file" id="vhd" value="vhd">
                <label class="form-check-label" for="vhd">
                  VHD
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
                <button type="submit" name="search_kedatangan" class="btn btn-primary"><i class="bi bi-search"></i>
                  Mencari</button>
              </div>
            </div>
            <small id="textHelp" class="form-text text-muted">Temukan plat kendaraan dengan memasukan kombinasi huruf
              dan angka seperti contoh berikut <strong>XX 1111 XX</strong>.</small>
          </div>
        </form>
        <h5 class="mt-5 text-dark">Jumlah Kedatangan</h5>
        <div class="d-flex">
          <i class="bi bi-truck text-dark" style="font-size: 50px;"></i>
          <h3 class="ml-3 text-dark"><?= mysqli_num_rows($counts_kedatangan)?></h3>
        </div>
      </div>
    </div>
  </div>
</div>

<?php if(!isset($_SESSION["kedatangan"])){?>
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
          <?php if (mysqli_num_rows($views_kedatangan) > 0) {
            while ($row = mysqli_fetch_assoc($views_kedatangan)) { ?>
          <tr>
            <td><?= $row['kategori'] ?></td>
            <td>STNK LBN/<?= $row['no_registrasi'] ?>/II/<?= date('Y')?>/Motamasin</td>
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
                    data-bs-target="#detail-strp<?= $row['id_kedatangan'] ?>">Detail STRP</a>
                </div>
                <div class="menu-item px-3">
                  <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                    data-bs-target="#detail-formulir<?= $row['id_kedatangan'] ?>">Detail Formulir Wawancara</a>
                </div>
                <div class="menu-item px-3">
                  <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                    data-bs-target="#files<?= $row['id_kedatangan'] ?>">Files</a>
                </div>
                <div class="menu-item px-3">
                  <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                    data-bs-target="#ubah<?= $row['id_kedatangan'] ?>">Ubah</a>
                </div>
              </div>

              <div class="modal fade" id="detail-strp<?= $row['id_kedatangan'] ?>" tabindex="-1"
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

              <div class="modal fade" id="detail-formulir<?= $row['id_kedatangan'] ?>" tabindex="-1"
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

              <div class="modal fade" id="files<?= $row['id_kedatangan'] ?>" tabindex="-1"
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

              <?php if($role==2 && $row["status_strp"]!="Valid"){?>
              <div class="modal fade" id="ubah<?= $row['id_kedatangan'] ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header border-bottom-0 shadow">
                      <h5 class="modal-title" id="exampleModalLabel">Ubah STRP <?= $row['nama_pengemudi'] ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="id_kedatangan" value="<?= $row['id_kedatangan'] ?>">
                      <div class="modal-body">
                        <div class="mb-5 fv-row">
                          <label class="required form-label">Apakah data STRP dari Saudara <?= $row['nama_pengemudi'] ?>
                            benar ?</label>
                          <div class="d-flex">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="status_strp" id="valid" value="Valid"
                                checked>
                              <label class="form-check-label" for="valid">
                                Valid
                              </label>
                            </div>
                            <div class="form-check" style="margin-left: 10px;">
                              <input class="form-check-input" type="radio" name="status_strp" id="tidak-valid"
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
                        <?php if($row['status_formulir']=="Valid"){?>
                        <button type="submit" name="validasi_strp_kedatangan" class="btn btn-warning">Ubah</button>
                        <?php }else{?>
                        <button type="button" class="btn btn-outline-warning border shadow">Ubah</button>
                        <p class="mt-5">Anda belum bisa validasi dikarenakan berkas Formulir Wawancara belum di validasi!</p>
                        <?php }?>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <?php }if($role==1 && $row["status_formulir"]!="Valid"){?>
              <div class="modal fade" id="ubah<?= $row['id_kedatangan'] ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header border-bottom-0 shadow">
                      <h5 class="modal-title" id="exampleModalLabel">Ubah Formulir Wawancara <?= $row['nama_pengemudi'] ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="id_kedatangan" value="<?= $row['id_kedatangan'] ?>">
                      <div class="modal-body">
                        <div class="mb-5 fv-row">
                          <label class="required form-label">Apakah data Formulir Wawancara dari Saudara
                            <?= $row['nama_pengemudi'] ?> benar ?</label>
                          <div class="d-flex">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="status_formulir" id="valid"
                                value="Valid" checked>
                              <label class="form-check-label" for="valid">
                                Valid
                              </label>
                            </div>
                            <div class="form-check" style="margin-left: 10px;">
                              <input class="form-check-input" type="radio" name="status_formulir" id="tidak-valid"
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
                        <button type="submit" name="validasi_formulir_kedatangan"
                          class="btn btn-outline-warning">Ubah</button>
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
<?php }else if(isset($_SESSION["kedatangan"])){
    $type_file=valid($conn, $_SESSION["kedatangan"]["type_file"]);
    $no_polisi=valid($conn, $_SESSION["kedatangan"]["no_polisi"]);
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
        AND keberangkatan.status_formulir = 'Valid'
    ";
    $views_keberangkatan = mysqli_query($conn, $keberangkatan);
    if(mysqli_num_rows($views_keberangkatan)==0){?>
<div class="card shadow">
  <div class="card-body">
    <p class="text-dark">No. Plat Kendaraan <strong><?= $no_polisi?></strong> tidak ditemukan!</p>
  </div>
</div>
<?php }else if(mysqli_num_rows($views_keberangkatan)>0){
      while($data=mysqli_fetch_assoc($views_keberangkatan)){
        if($type_file=="vhd"){?>
<div class="card shadow">
  <div class="card-body">
    <div class="d-flex justify-content-end">
      <a href="cetak-vhd-kedatangan" class="btn btn-success ml-3" target="_blank"><i class="bi bi-printer"></i>
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
              <h5 class="text-dark" style="font-size: 12px;font-weight: bold;">REPUBLIK INDONESIA <br>KEMENTERIAN
                KEUANGAN
                <br>DIREKTORAT JENDERAL BEA DAN CUKAI <br><i style="font-size: 12px;color: #000;">VEHICLE DECLARATION</i> <br>EKSPOR YANG DIMAKSUDKAN UNTUK DIIMPOR KEMBALI (EKSPOR SEMENTARA) <br>ATAS KENDARAAN BERMOTOR YANG MELALUI POS LINTAS BATAS NEGARA MOTAMASIN
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
      UNTUK DIISI OLEH EKSPORTIR</p>
    <table class="text-dark" style="border-collapse: collapse; width: 100%; margin-top: -14px;">
      <thead>
        <tr style="border: 1px solid #000;">
          <td style="text-align: center;border: 1px solid #000;" colspan="2">NOMOR PENDAFTARAN / KODE KANTOR : <?= $data['no_registrasi']?> / 081400 <br>TANGGAL : <?= date('d-m-Y')?></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;width: 700px;">DATA EKSPORTIR</td>
          <td style="border: 1px solid #000;">PERNYATAAN EKSPORTIR</td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;">1. Nama Pemilik Kendaraan Bermotor : <strong><?= $data['nama_pemilik']?></strong> <br><i>Name od Owner</i></td>
          <td rowspan="2">1. Bahwa saya akan menyampaikan Vehicle Declaration kepada Pejabat Bea dan Cukai baik saat keluar dari daerah pabean untuk proses ekspor maupun masuk ke daerah pabean untuk proses impor kembali.</td>
        </tr>
        <tr style="border-right: 1px solid #000;">
          <td style="border: 1px solid #000;">2. Alamat Pemilik Kendaraan Bermotor : <strong><?= $data['alamat_pemilik']?></strong> <br>Address of Owner</td>
        </tr>
        <tr style="border-right: 1px solid #000;">
          <td style="border: 1px solid #000;">3. Nomor Passport atau Identitas Lain Pemilik : <strong><?= $data['identitas_pemilik_kendaraan']?></strong> <br>Number od Owner's Passport or Other Identity</td>
          <td>2. Bahwa saya menerima penetapan nilai pabean dari tarif yang dilakukan oleh Pejabat Bea dan Cukai dalam rangka pemenuhan kepabeanan.</td>
        </tr>
        <tr style="border-right: 1px solid #000;">
          <td style="border: 1px solid #000;">4. Nama Pengemudi : <strong><?= $data['nama_pengemudi']?></strong> <br>Name of Driver</td>
          <td rowspan="2">3. Bahwa saya bertanggung jawab terhadap kendaraan bermotor untuk tidak dilakukan perubahan dan sanggup membayar bea masuk dan pajak dalam rangka impor apabila terjadi terhadap bagian-bagian (parts) pengganti atau ditambahkan, serta biaya perbaikannya termasuk ongkos angkutan dan asuransi pada kendaraan bermotor.</td>
        </tr>
        <tr style="border-right: 1px solid #000;">
          <td style="border: 1px solid #000;">5. Alamat Pengemudi : <strong><?= $data['jalan_pengemudi'].", ".$data['kelurahan_pengemudi'].", ".$data['kecamatan_pengemudi'].", ".$data['kabupaten_kota_pengemudi'].", ".$data['provinsi_pengemudi'] ?></strong> <br>Address of Driver</td>
        </tr>
        <tr style="border-right: 1px solid #000;">
          <td style="border: 1px solid #000;">6. Nomor Passport atau Identitas Lain pengemudi : <strong><?= $data['no_pasport_pengemudi']?></strong> <br>Number od Driver's Passport or Other Identity</td>
          <td rowspan="2">4. Apabila saya tidak melakukan ketentuan di atas, maka saya tidak berkeberatan atas tindakan Pejabat Bea dan Cukai untuk menegah hingga melakukan penyitaan atas kendaraan dan barang yang dimuatnya yang saya kuasai untuk penyelesaian sesuai ketentuan yang berlaku.</td>
        </tr>
        <tr style="border-right: 1px solid #000;">
          <td style="border: 1px solid #000;">7. Nomor Lisensi Mengemudi : <strong><?= $data['no_sim_pengemudi']?></strong> <br>Driver's License Number</td>
        </tr>
        <tr style="border-right: 1px solid #000;">
          <td style="border: 1px solid #000;">DATA KENDARAAN</td>
          <td rowspan="5"></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;">8. Nomor Registrasi Kendaraan Bermotor : <strong>STRP / <?= $data["no_registrasi"]?> / II ? <?= date('Y')?></strong> <br>Vehicle Registration Card Number</td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;">9. Tanda Nomor Kendaraan Bermotor : <strong><?= $data["no_polisi"]?></strong> <br><i>Registration Plate Number</i></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;">10. Negara Pendaftaran : <strong>INDONESIA</strong> <br><i>Country of Registration</i></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;">11. Merk dan jenis kendaraan : <strong><?= $data['merek_kendaraan']?></strong> <br><i>Make and Model of Vehicle</i></td>
        </tr>
        <tr style="border: 1px solid #000;">
          <td style="border: 1px solid #000;">12. Nomor Rangka : <strong><?= $data['no_rangka']?></strong> <br><i>Chassis Number</i></td>
          <td rowspan="2">Dengan ini saya menyatakan bertanggung jawab atas kebenaran hal-hal yang diberitahukan dalam dokumen ini dan telah memahami isi pernyataan <strong>PLBN MOTAMASIN, <?= date('d-m-Y / h:i:a')?> Eksportir,</strong></td>
        </tr>
        <tr style="border-right: 1px solid #000;">
          <td style="border: 1px solid #000;">13. Nomor Mesin : <strong><?= $data['no_mesin']?></strong> <br><i>Engine Number</i></td>
        </tr>
        <tr style="border-right: 1px solid #000;">
          <td style="border: 1px solid #000;">14. Tahun Pembuatan / cc : <strong><?= $data['tahun_pembuatan']." / ".$data['cc']?></strong> <br><i>Year Manufactured / cc</i></td>
        </tr>
        <tr style="border-right: 1px solid #000;">
          <td style="border: 1px solid #000;">15. Warna Kendaraan Bermotor : <strong><?= $data['warna']?></strong> <br><i>Colour of Vehicle</i></td>
        </tr>
        <tr style="border-right: 1px solid #000;border-bottom: 1px solid #000;">
          <td style="border: 1px solid #000;">16. Alamat (di luar negeri) : <strong>DILI</strong> <br><i>Address of Destination</i></td>
          <th><?= $data['nama_pemilik']?></th>
        </tr>
      </thead>
    </table>
    <p class="text-dark"
      style="background-color: #c0c2c1;font-size: 14px;text-align: center;padding: 5px;margin-top: 0;border: 1px solid #000;font-weight: bold;">
      UNTUK DIISI OLEH PEJABAT DIREKTORAT JENDERAL BEA DAN CUKAI</p>
    <?php 
    $check_id_kedatangan = "SELECT kedatangan.*, 
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
        AND kedatangan.status_vhd = 'Setuju'";
    $views_id_kedatangan = mysqli_query($conn, $check_id_kedatangan);
    if(mysqli_num_rows($views_id_kedatangan) > 0) {
      $data_vhd=mysqli_fetch_assoc($views_kedatangan)?>
        <table class="text-dark" style="border-collapse: collapse; width: 100%; margin-top: -14px;">
          <thead>
            <tr style="border: 1px solid #000;">
              <td style="text-align: center;border: 1px solid #000;width: 30px;" colspan="2">SAAT EKSPOR KEMBALI (PENYELESAIAN EKSPOR SEMENTARA)</td>
            </tr>
            <tr style="border: 1px solid #000;">
              <td style="border: 1px solid #000;text-align: center;width: 500px;">Catatan</td>
              <td style="border: 1px solid #000;">Catatan Pemeriksaan Fisik Kendaraan Saat Impor Kembali</td>
            </tr>
            <tr style="border: 1px solid #000;">
              <td style="border: 1px solid #000;">1. Kendaraan berangkat menuju : <strong>INDONESIA</strong></td>
              <td rowspan="3">Diperiksa sesuai Instruksi : <strong>100%</strong> <br>Pada tanggal / jam : <strong><?= date('d-m-Y / h:i:a')?></strong> <br>Atas Kendaraan : <br>a. Jumlah Roda : <strong><?= $data_vhd['jenis_kendaraan']?></strong> <br>b. Nomor Polisi : <strong><?= $data_vhd['no_polisi']?></strong> <br>Merk / Type / Warna : <strong><?= $data_vhd['merek_kendaraan']." / ".$data_vhd['warna']?></strong> <br>d. No. Mesin / No. Rangka : <strong><?= $data_vhd['no_mesin']." / ".$data_vhd['no_rangka']?></strong> <br>e. Uraian Muatan : <strong><?= $data_vhd['kepemilikan_kendaraan']?></strong> <br>f. Kesimpulan : <strong><?= $data_vhd['kesimpulan']?></strong></tr></td>
            </tr>
            <tr style="border: 1px solid #000;">
              <td style="border: 1px solid #000;">2. Melalui Pos Lintas Batas Negara : <strong>MOTAMASIN</strong></td>
            </tr>
            <tr style="border-left: 1px solid #000;border-right: 1px solid #000;">
              <td style="border-right: 1px solid #000;height: 150px;">Tanggal Kendaraan Keluar : <?= date('d-m-Y / h:i:a')?> <br><?php 
              if ($data_vhd['status_vhd'] == "Setuju") {
                  echo "Setuju/<del>Tidak</del>";
              } else {
                  echo "<del>Setuju</del>/Tidak";
              }
              ?></td>
            </tr>
            <tr style="border-left: 1px solid #000;border-right: 1px solid #000;">
              <td style="border-right: 1px solid #000;text-align: center;">Pejabat Pemeriksa,</td>
              <td style="border-right: 1px solid #000;text-align: center;">Pejabat Pemeriksa,</td>
            </tr>
            <tr style="border-left: 1px solid #000;border-right: 1px solid #000;">
              <td style="border-right: 1px solid #000;text-align: center;height: 100px;"></td>
              <td style="border-right: 1px solid #000;text-align: center;height: 100px;"></td>
            </tr>
            <tr style="border-left: 1px solid #000;border-right: 1px solid #000;border-bottom: 1px solid #000;">
              <td style="border-right: 1px solid #000;border-bottom: 1px solid #000;text-align: center;">.................................................................. <br>..................................................................</td>
              <td style="border-right: 1px solid #000;border-bottom: 1px solid #000;text-align: center;">.................................................................. <br>..................................................................</td>
            </tr>
          </thead>
        </table>
    <?php }else{?>
    <form action="" method="post">
      <input type="hidden" name="id_user" value="<?= $data['id_user']?>">
      <input type="hidden" name="id_fw" value="<?= $data['id_fw']?>">
      <table class="text-dark" style="border-collapse: collapse; width: 100%; margin-top: -14px;">
        <thead>
          <tr style="border: 1px solid #000;">
            <td style="text-align: center;border: 1px solid #000;width: 30px;" colspan="2">SAAT EKSPOR KEMBALI (PENYELESAIAN EKSPOR SEMENTARA)</td>
          </tr>
          <tr style="border: 1px solid #000;">
            <td style="border: 1px solid #000;text-align: center;width: 500px;">Catatan</td>
            <td style="border: 1px solid #000;">Catatan Pemeriksaan Fisik Kendaraan Saat Impor Kembali</td>
          </tr>
          <tr style="border: 1px solid #000;">
            <td style="border: 1px solid #000;">1. Kendaraan berangkat menuju : <strong>INDONESIA</strong></td>
            <td rowspan="3">Diperiksa sesuai Instruksi : <strong>100%</strong> <br>Pada tanggal / jam : <strong><?= date('d-m-Y / h:i:a')?></strong> <br>Atas Kendaraan : <br>a. Jumlah Roda : <strong><?= $data['jenis_kendaraan']?></strong> <br>b. Nomor Polisi : <strong><?= $data['no_polisi']?></strong> <br>Merk / Type / Warna : <strong><?= $data['merek_kendaraan']." / ".$data['warna']?></strong> <br>d. No. Mesin / No. Rangka : <strong><?= $data['no_mesin']." / ".$data['no_rangka']?></strong> <br>e. Uraian Muatan : <strong><?= $data['kepemilikan_kendaraan']?></strong> <br>f. Kesimpulan : <input type="text" name="kesimpulan" placeholder="Isi kesimpulan" class="form-control-sm shadow border-0 mt-3" required /></tr></td>
          </tr>
          <tr style="border: 1px solid #000;">
            <td style="border: 1px solid #000;">2. Melalui Pos Lintas Batas Negara : <strong>MOTAMASIN</strong></td>
          </tr>
          <tr style="border-left: 1px solid #000;border-right: 1px solid #000;">
            <td style="border-right: 1px solid #000;height: 150px;">Tanggal Kendaraan Keluar : <?= date('d-m-Y / h:i:a')?> <br>
                <div class="d-flex mt-3" style="margin-left: 20px;">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status_vhd" id="setuju" value="Setuju" checked>
                    <label class="form-check-label" for="setuju">
                      Setuju
                    </label>
                  </div>
                  <div class="form-check" style="margin-left: 10px;">
                    <input class="form-check-input" type="radio" name="status_vhd" id="tidak"
                      value="Tidak">
                    <label class="form-check-label" for="tidak">
                      Tidak
                    </label>
                  </div>
                </div></td>
          </tr>
          <tr style="border-left: 1px solid #000;border-right: 1px solid #000;">
            <td style="border-right: 1px solid #000;text-align: center;">Pejabat Pemeriksa,</td>
            <td style="border-right: 1px solid #000;text-align: center;">Pejabat Pemeriksa,</td>
          </tr>
          <tr style="border-left: 1px solid #000;border-right: 1px solid #000;">
            <td style="border-right: 1px solid #000;text-align: center;height: 100px;"></td>
            <td style="border-right: 1px solid #000;text-align: center;height: 100px;"></td>
          </tr>
          <tr style="border-left: 1px solid #000;border-right: 1px solid #000;border-bottom: 1px solid #000;">
            <td style="border-right: 1px solid #000;border-bottom: 1px solid #000;text-align: center;">.................................................................. <br>..................................................................</td>
            <td style="border-right: 1px solid #000;border-bottom: 1px solid #000;text-align: center;">.................................................................. <br>..................................................................</td>
          </tr>
        </thead>
      </table>
      <div class="d-flex justify-content-center mt-5 mb-5">
        <button type="submit" name="validasi_vhd_kedatangan" class="btn btn-primary shadow">
          <span class="indicator-label">Valid</span>
          <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
      </div>
    </form>
    <?php }?>
  </div>
</div>
<?php }}}}?>
<!-- end::Content -->

<?php require_once("../../templates/views-bottom.php"); ?>