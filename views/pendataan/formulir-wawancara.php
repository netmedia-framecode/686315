<?php require_once("../../controller/script.php");
require_once("redirect.php");
$_SESSION["page-name"] = "Formulir Wawancara";
$_SESSION["page-url"] = "formulir-wawancara";
$_SESSION["actual-link"] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$_SESSION["object-link"] = $baseURL . "/views/pendataan/";
require_once("../../templates/views-top.php");
?>

<!-- begin::Content -->
<div class="card">
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
            <th class="text-center min-w-100px">Aksi</th>
          </tr>
        </thead>
        <tbody class="text-gray-600 fw-bold">
          <?php if (mysqli_num_rows($views_formulir_wawancara) > 0) {
            while ($row = mysqli_fetch_assoc($views_formulir_wawancara)) { ?>
          <tr>
            <td><?= $row['kategori'] ?></td>
            <td>STRP/<?= $row['no_registrasi'] ?>/II/<?= date('Y')?>/Motamasin</td>
            <td><?= $row['plat_nomor'] ?></td>
            <td><?= $row['nama_pengemudi'] ?></td>
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
                    data-bs-target="#detail<?= $row['id_fw'] ?>">Detail</a>
                </div>
                <div class="menu-item px-3">
                  <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                    data-bs-target="#files<?= $row['id_fw'] ?>">Files</a>
                </div>
                <?php if($role==4){?>
                <div class="menu-item px-3">
                  <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                    data-bs-target="#ubah<?= $row['id_fw'] ?>">Ubah</a>
                </div>
                <div class="menu-item px-3">
                  <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                    data-bs-target="#hapus<?= $row['id_fw'] ?>">Hapus</a>
                </div>
                <?php }?>
              </div>

              <div class="modal fade" id="detail<?= $row['id_strp'] ?>" tabindex="-1"
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

              <div class="modal fade" id="files<?= $row['id_fw'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header border-bottom-0 shadow">
                      <h5 class="modal-title" id="exampleModalLabel">Files Persyaratan</h5>
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

              <?php if($role==4){?>
              <div class="modal fade" id="ubah<?= $row['id_fw'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header border-bottom-0 shadow">
                      <h5 class="modal-title" id="exampleModalLabel">Ubah Formulir Wawancara</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="id_fw" value="<?= $row['id_fw'] ?>">
                      <div class="modal-body d-flex flex-column flex-lg-row">
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-12">
                          <div class="tab-content">
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general"
                              role="tab-panel">
                              <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="card card-flush py-4">
                                  <div class="card-body pt-5">

                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Apakah saat ini Saudara dalam keadaan sehat
                                        ?</label>
                                      <div class="d-flex">
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="kesehatan" id="ya"
                                            value="Ya" checked>
                                          <label class="form-check-label" for="ya">
                                            Ya
                                          </label>
                                        </div>
                                        <div class="form-check" style="margin-left: 10px;">
                                          <input class="form-check-input" type="radio" name="kesehatan" id="tidak"
                                            value="Tidak">
                                          <label class="form-check-label" for="tidak">
                                            Tidak
                                          </label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Apakah Saudara adalah
                                        <strong>pengemudi</strong> atas kendaraan yang
                                        mengajukan permohonan ?</label>
                                      <div class="d-flex">
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="pengemudi_kendaraan"
                                            id="ya" value="Ya" checked>
                                          <label class="form-check-label" for="ya">
                                            Ya
                                          </label>
                                        </div>
                                        <div class="form-check" style="margin-left: 10px;">
                                          <input class="form-check-input" type="radio" name="pengemudi_kendaraan"
                                            id="tidak" value="Tidak">
                                          <label class="form-check-label" for="tidak">
                                            Tidak
                                          </label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Nama Lengkap Pengemudi</label>
                                      <input type="text" name="nama_pengemudi" class="form-control mb-2"
                                        value="<?= $row["nama_pengemudi"] ?>" required />
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-6">
                                        <div class="mb-5 fv-row">
                                          <label class="required form-label">Tempat Lahir</label>
                                          <input type="text" name="tempat_lahir" class="form-control mb-2"
                                            value="<?= $row["tempat_lahir"] ?>" required />
                                        </div>
                                      </div>
                                      <div class="col-lg-6">
                                        <div class="mb-5 fv-row">
                                          <label class="required form-label">Tgl Lahir</label>
                                          <input type="date" name="tgl_lahir" class="form-control mb-2"
                                            value="<?= $row["tgl_lahir"] ?>" required />
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <h6>Alamat Pengemudi ( Sesuai KTP / ID )</h6>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Jalan</label>
                                      <input type="text" name="jalan_pengemudi" class="form-control mb-2"
                                        value="<?= $row["jalan_pengemudi"] ?>" required />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Kelurahan</label>
                                      <input type="text" name="kelurahan_pengemudi" class="form-control mb-2"
                                        value="<?= $row["kelurahan_pengemudi"] ?>" required />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Kecamatan</label>
                                      <input type="text" name="kecamatan_pengemudi" class="form-control mb-2"
                                        value="<?= $row["kecamatan_pengemudi"] ?>" required />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Kabupaten / Kota</label>
                                      <input type="text" name="kabupaten_kota_pengemudi" class="form-control mb-2"
                                        value="<?= $row["kabupaten_kota_pengemudi"] ?>" required />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Provinsi</label>
                                      <input type="text" name="provinsi_pengemudi" class="form-control mb-2"
                                        value="<?= $row["provinsi_pengemudi"] ?>" required />
                                    </div>
                                    <hr>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Nomor Paspor Pengemudi</label>
                                      <input type="text" name="no_pasport_pengemudi" class="form-control mb-2"
                                        value="<?= $row["no_pasport_pengemudi"] ?>" required />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Nomor SIM Pengemudi</label>
                                      <input type="number" name="no_sim_pengemudi" class="form-control mb-2"
                                        value="<?= $row["no_sim_pengemudi"] ?>" required />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Nomor HP Pengemudi</label>
                                      <input type="number" name="no_hp_pengemudi" class="form-control mb-2"
                                        value="<?= $row["no_hp_pengemudi"] ?>" required />
                                    </div>
                                    <hr>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Apakah Saudara adalah pemilik kendaraan
                                        ?</label>
                                      <div class="d-flex">
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="pemilik_kendaraan" id="ya"
                                            value="Ya" checked>
                                          <label class="form-check-label" for="ya">
                                            Ya
                                          </label>
                                        </div>
                                        <div class="form-check" style="margin-left: 10px;">
                                          <input class="form-check-input" type="radio" name="pemilik_kendaraan"
                                            id="tidak" value="Tidak">
                                          <label class="form-check-label" for="tidak">
                                            Tidak
                                          </label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="form-label">Nama Pemilik Kendaraan</label>
                                      <input type="text" name="nama_pemilik_kendaraan" class="form-control mb-2"
                                        value="<?= $row["nama_pemilik_kendaraan"] ?>" />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="form-label">Nomor Paspor / Identitas Pemilik Kendaraan</label>
                                      <input type="text" name="identitas_pemilik_kendaraan" class="form-control mb-2"
                                        value="<?= $row["identitas_pemilik_kendaraan"] ?>" />
                                    </div>
                                    <hr>
                                    <h6>Alamat Pemilik Kendaraan</h6>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Jalan</label>
                                      <input type="text" name="jalan_kendaraan" class="form-control mb-2"
                                        value="<?= $row["jalan_kendaraan"] ?>" />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Kelurahan</label>
                                      <input type="text" name="kelurahan_kendaraan" class="form-control mb-2"
                                        value="<?= $row["kelurahan_kendaraan"] ?>" />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Kecamatan</label>
                                      <input type="text" name="kecamatan_kendaraan" class="form-control mb-2"
                                        value="<?= $row["kecamatan_kendaraan"] ?>" />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Kabupaten / Kota</label>
                                      <input type="text" name="kabupaten_kota_kendaraan" class="form-control mb-2"
                                        value="<?= $row["kabupaten_kota_kendaraan"] ?>" />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Provinsi</label>
                                      <input type="text" name="provinsi_kendaraan" class="form-control mb-2"
                                        value="<?= $row["provinsi_kendaraan"] ?>" />
                                    </div>
                                    <hr>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Apakah Saudara memiliki Surat Kuasa ( dalam hal
                                        kendaraan pribadi )
                                        atau Surat Tugas ( dalam hal kendaraan dinas ) dari pemilik kendaraan ?</label>
                                      <div class="d-flex">
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="surat_kuasa" id="ya"
                                            value="Ya" checked>
                                          <label class="form-check-label" for="ya">
                                            Ya
                                          </label>
                                        </div>
                                        <div class="form-check" style="margin-left: 10px;">
                                          <input class="form-check-input" type="radio" name="surat_kuasa" id="tidak"
                                            value="Tidak">
                                          <label class="form-check-label" for="tidak">
                                            Tidak
                                          </label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Tanda Nomor Kendaraan / Plat Nomor</label>
                                      <input type="text" name="plat_nomor" class="form-control mb-2"
                                        value="<?= $row["plat_nomor"] ?>" required />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Merek / Type / Warna kendaraan</label>
                                      <input type="text" name="merek_kendaraan" class="form-control mb-2"
                                        value="<?= $row["merek_kendaraan"] ?>" required />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Kepemilikan Kendaraan</label>
                                      <select name="id_kepemilikan_kendaraan" class="form-select mb-2" required>
                                        <option value="" selected>Pilih Kepemilikan Kendaraan</option>
                                        <?php  $id_kepemilikan_kendaraan = $row['id_kepemilikan_kendaraan'];
                                        foreach ($views_kepemilikan_kendaraan as $data) :
                                          $selected = ($data['id_kepemilikan_kendaraan'] == $id_kepemilikan_kendaraan) ? 'selected' : ''; ?>
                                        <option value="<?= $data['id_kepemilikan_kendaraan'] ?>" <?= $selected ?>>
                                          <?= $data['kepemilikan_kendaraan'] ?>
                                        </option>
                                        <?php endforeach; ?>
                                      </select>
                                    </div>
                                    <hr>
                                    <h6>Alamat Tujuan Kunjungan Saudara di negara tujuan ?</h6>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Jalan</label>
                                      <input type="text" name="jalan_tujuan" class="form-control mb-2"
                                        value="<?= $row["jalan_tujuan"] ?>" required />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Distric</label>
                                      <input type="text" name="distric" class="form-control mb-2"
                                        value="<?= $row["distric"] ?>" required />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Sub-Distric</label>
                                      <input type="text" name="sub_distric" class="form-control mb-2"
                                        value="<?= $row["sub_distric"] ?>" required />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Suco</label>
                                      <input type="text" name="suco" class="form-control mb-2"
                                        value="<?= $row["suco"] ?>" required />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Aldeia</label>
                                      <input type="text" name="aldeia" class="form-control mb-2"
                                        value="<?= $row["aldeia"] ?>" required />
                                    </div>
                                    <hr>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Maksud kunjunagn Saudara di negara tujuan
                                        ?</label>
                                      <input type="text" name="maksud_kunjungan" class="form-control mb-2"
                                        value="<?= $row["maksud_kunjungan"] ?>" required />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Rencana jangka waktu kunjungan ?</label>
                                      <input type="date" name="waktu_kunjungan" class="form-control mb-2"
                                        value="<?= $row["waktu_kunjungan"] ?>" required />
                                    </div>
                                    <hr>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Apakah Saudara bersedia
                                        <strong>mempertanggungjawabkan</strong> jika
                                        <strong>terjadi pelanggaran</strong> atas kendaraan dan
                                        <strong>barang-barang</strong> yang dimuat
                                        diatasnya ?</label>
                                      <div class="d-flex">
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="pelanggaran_atas_barang"
                                            id="bersedia" value="Bersedia" checked>
                                          <label class="form-check-label" for="bersedia">
                                            Bersedia
                                          </label>
                                        </div>
                                        <div class="form-check" style="margin-left: 10px;">
                                          <input class="form-check-input" type="radio" name="pelanggaran_atas_barang"
                                            id="tidak-bersedia" value="Tidak Bersedia">
                                          <label class="form-check-label" for="tidak-bersedia">
                                            Tidak Bersedia
                                          </label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Apakah Saudara bersedia
                                        <strong>mempertanggungjawabkan</strong> jika
                                        <strong>terjadi pelanggaran</strong> dalam hal kendaraan ini <strong>dijual,
                                          disewakan, dihibahkan,
                                          dibuang</strong> di negara tujuan <strong>tanpa izin</strong> ?</label>
                                      <div class="d-flex">
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio"
                                            name="pelanggaran_atas_penyalahgunaan" id="bersedia" value="Bersedia"
                                            checked>
                                          <label class="form-check-label" for="bersedia">
                                            Bersedia
                                          </label>
                                        </div>
                                        <div class="form-check" style="margin-left: 10px;">
                                          <input class="form-check-input" type="radio"
                                            name="pelanggaran_atas_penyalahgunaan" id="tidak-bersedia"
                                            value="Tidak Bersedia">
                                          <label class="form-check-label" for="tidak-bersedia">
                                            Tidak Bersedia
                                          </label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Apakah Saudara bersedia
                                        <strong>mempertanggungjawabkan</strong> jika
                                        <strong>terjadi pelanggaran</strong> dalam hal kendaraan ini <strong>dirubah
                                          bentuknya</strong> di
                                        negara tujuan secara hakiki <strong>tanpa izin</strong> ?</label>
                                      <div class="d-flex">
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio"
                                            name="pelanggaran_atas_modifikasi" id="bersedia" value="Bersedia" checked>
                                          <label class="form-check-label" for="bersedia">
                                            Bersedia
                                          </label>
                                        </div>
                                        <div class="form-check" style="margin-left: 10px;">
                                          <input class="form-check-input" type="radio"
                                            name="pelanggaran_atas_modifikasi" id="tidak-bersedia"
                                            value="Tidak Bersedia">
                                          <label class="form-check-label" for="tidak-bersedia">
                                            Tidak Bersedia
                                          </label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Apakah Saudara bersedia
                                        <strong>mempertanggungjawabkan</strong> jika
                                        <strong>terjadi pelanggaran</strong> kendaraan ini keberadaannya di negara
                                        tujuan <strong>melebihi
                                          batas waktu</strong> yang telah ditetapkan yakni <strong>30 ( tiga puluh )
                                          hari</strong> ?</label>
                                      <div class="d-flex">
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="pelanggaran_atas_waktu"
                                            id="bersedia" value="Bersedia" checked>
                                          <label class="form-check-label" for="bersedia">
                                            Bersedia
                                          </label>
                                        </div>
                                        <div class="form-check" style="margin-left: 10px;">
                                          <input class="form-check-input" type="radio" name="pelanggaran_atas_waktu"
                                            id="tidak-bersedia" value="Tidak Bersedia">
                                          <label class="form-check-label" for="tidak-bersedia">
                                            Tidak Bersedia
                                          </label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Jika Saudara bersedia <strong>melanggar
                                          pernyataan</strong>
                                        sebagaimana tersebut dalam poin-poin diatas, apakah Saudara <strong>bersedia
                                          membayar sanki
                                          administrasi berupa denda sebesar 100%</strong> dari bea masuk atas Nilai FOB
                                        / harga kendaraan yang
                                        seharusnya dibayarkan ?</label>
                                      <div class="d-flex">
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="sanksi" id="bersedia"
                                            value="Bersedia" checked>
                                          <label class="form-check-label" for="bersedia">
                                            Bersedia
                                          </label>
                                        </div>
                                        <div class="form-check" style="margin-left: 10px;">
                                          <input class="form-check-input" type="radio" name="sanksi" id="tidak-bersedia"
                                            value="Tidak Bersedia">
                                          <label class="form-check-label" for="tidak-bersedia">
                                            Tidak Bersedia
                                          </label>
                                        </div>
                                      </div>
                                    </div>

                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer border-top-0 justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="edit_formulir_wawancara" class="btn btn-warning">Ubah</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="hapus<?= $row['id_fw'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header border-bottom-0 shadow">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus Formulir Wawancara</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST">
                      <input type="hidden" name="id_fw" value="<?= $row['id_fw'] ?>">
                      <div class="modal-body text-center">
                        <p>Apakah Anda yakin ingin menghapus data ini?</p>
                      </div>
                      <div class="modal-footer border-top-0 justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="delete_formulir_wawancara" class="btn btn-danger">Hapus</button>
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
<!-- end::Content -->

<?php require_once("../../templates/views-bottom.php");?>