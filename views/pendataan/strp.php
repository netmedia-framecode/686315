<?php require_once("../../controller/script.php");
require_once("redirect.php");
$_SESSION["page-name"] = "STRP";
$_SESSION["page-url"] = "strp";
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
            <th class="text-center min-w-125px">No. Registrasi</th>
            <th class="text-center min-w-125px">No. Polisi</th>
            <th class="text-center min-w-125px">Nama Pemilik</th>
            <th class="text-center min-w-125px">Alamat Pemilik</th>
            <th class="text-center min-w-125px">Nama Pengemudi</th>
            <th class="text-center min-w-100px">Aksi</th>
          </tr>
        </thead>
        <tbody class="text-gray-600 fw-bold">
          <?php if (mysqli_num_rows($views_strp) > 0) {
            while ($row = mysqli_fetch_assoc($views_strp)) { ?>
          <tr>
            <td><?= $row['kategori'] ?></td>
            <td>STRP/<?= $row['no_registrasi'] ?>/II/<?= date('Y')?>/Motamasin</td>
            <td><?= $row['no_polisi'] ?></td>
            <td><?= $row['nama_pemilik'] ?></td>
            <td><?= $row['alamat_pemilik'] ?></td>
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
                    data-bs-target="#detail<?= $row['id_strp'] ?>">Detail</a>
                </div>
                <div class="menu-item px-3">
                  <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                    data-bs-target="#files<?= $row['id_strp'] ?>">Files</a>
                </div>
                <div class="menu-item px-3">
                  <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                    data-bs-target="#ubah<?= $row['id_strp'] ?>">Ubah</a>
                </div>
                <?php if($role==4){?>
                <div class="menu-item px-3">
                  <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                    data-bs-target="#hapus<?= $row['id_strp'] ?>">Hapus</a>
                </div>
                <?php }?>
              </div>

              <div class="modal fade" id="detail<?= $row['id_strp'] ?>" tabindex="-1"
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

              <div class="modal fade" id="files<?= $row['id_strp'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
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

              <?php if($role==4){?>
              <div class="modal fade" id="ubah<?= $row['id_strp'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header border-bottom-0 shadow">
                      <h5 class="modal-title" id="exampleModalLabel">Ubah STRP <?= $row['nama_pengemudi'] ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="id_strp" value="<?= $row['id_strp'] ?>">
                      <input type="hidden" name="id_kepemilikan_kendaraan"
                        value="<?= $row['id_kepemilikan_kendaraan'] ?>">
                      <input type="hidden" name="filesOld" value="<?= $row['files'] ?>">
                      <div class="modal-body d-flex flex-column flex-lg-row">
                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                          <div class="card card-flush py-4 shadow">
                            <div class="card-header">
                              <div class="card-title">
                                <h2>Kategori</h2>
                              </div>
                            </div>
                            <div class="card-body pt-0">
                              <select name="kategori" class="form-select mb-2" required>
                                <option value="" selected>Pilih Kategori</option>
                                <option value="keberangkatan">Keberangkatan</option>
                                <option value="kedatangan">Kedatangan</option>
                              </select>
                            </div>
                          </div>
                          <div class="card card-flush py-4 shadow">
                            <div class="card-header">
                              <div class="card-title">
                                <h2>Warga Negara</h2>
                              </div>
                              <div class="card-toolbar">
                                <div class="rounded-circle bg-success w-15px h-15px"
                                  id="kt_ecommerce_add_product_status"></div>
                              </div>
                            </div>
                            <div class="card-body pt-0">
                              <select name="id_warga_negara" class="form-select mb-2" required>
                                <option value="" selected>Pilih Warga Negara</option>
                                <?php $id_warga_negara = $row['id_warga_negara'];
                                foreach ($views_warga_negara as $data) :
                                  $selected = ($data['id_warga_negara'] == $id_warga_negara) ? 'selected' : ''; ?>
                                <option value="<?= $data['id_warga_negara'] ?>" <?= $selected ?>>
                                  <?= $data['warga_negara'] ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                          </div>
                          <div class="card card-flush py-4 shadow">
                            <div class="card-header">
                              <div class="card-title">
                                <h2>Kepemilikan Kendaraan</h2>
                              </div>
                            </div>
                            <div class="card-body pt-0">
                              <div class="mb-10 fv-row">
                                <select name="id_kepemilikan_kendaraan" class="form-select mb-2" required>
                                  <option value="" selected>Pilih Kepemilikan Kendaraan</option>
                                  <?php $id_kepemilikan_kendaraan = $row['id_kepemilikan_kendaraan'];
                                  foreach ($views_kepemilikan_kendaraan as $data) :
                                    $selected = ($data['id_kepemilikan_kendaraan'] == $id_kepemilikan_kendaraan) ? 'selected' : ''; ?>
                                  <option value="<?= $data['id_kepemilikan_kendaraan'] ?>" <?= $selected ?>>
                                    <?= $data['kepemilikan_kendaraan'] ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                              <div class="fv-row w-100 flex-md-root">
                                <label class="required form-label">Upload File Persyaratan</label>
                                <div class="mb-3">
                                  <input class="form-control" type="file" name="files" id="formFile" accept=".pdf">
                                </div>
                                <div class="fs-6">Lengkapi persyaratan Surat Tanda Registrasi Permohonan (STRP) dengan
                                  mengupload berkas dalam
                                  format .PDF dengan isi dalam file .PDF sebagai berikut: <br>
                                  Pribadi<br>
                                  1. KTP<br>
                                  2. SIM<br>
                                  2. Pasport<br>
                                  3. STNK<br>
                                  Bukan Milik Pribadi ( Dinas, Perusahaan, Angkutan Umum )<br>
                                  1. KTP Pengemudi<br>
                                  2. SIM Pengemudi<br>
                                  2. Pasport Pengemudi<br>
                                  3. STNK<br>
                                  4. Surat Kuasa<br>
                                  5. KTP Pemberi Kuasa<br>
                                  6. Pasport Pemberi Kuasa<br>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card card-flush py-4 shadow">
                            <div class="card-header">
                              <div class="card-title">
                                <h2>Bahan Bakar</h2>
                              </div>
                            </div>
                            <div class="card-body pt-0">
                              <select name="id_bahan_bakar" class="form-select mb-2" required>
                                <option value="" selected>Pilih Bahan Bakar</option>
                                <?php $id_bahan_bakar = $row['id_bahan_bakar'];
                                  foreach ($views_bahan_bakar as $data) :
                                    $selected = ($data['id_bahan_bakar'] == $id_bahan_bakar) ? 'selected' : ''; ?>
                                <option value="<?= $data['id_bahan_bakar'] ?>" <?= $selected ?>>
                                  <?= $data['bahan_bakar'] ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                          <div class="tab-content">
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general"
                              role="tab-panel">
                              <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="card card-flush py-4 shadow">
                                  <div class="card-header">
                                    <div class="card-title">
                                      <h2>Detail STRP</h2>
                                    </div>
                                  </div>
                                  <div class="card-body pt-0">
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">No. Polisi</label>
                                      <input type="text" name="no_polisi" class="form-control mb-2"
                                        value="<?= $row['no_polisi']?>" placeholder="No. Polisi" required />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Nama Pemilik</label>
                                      <input type="text" name="nama_pemilik" class="form-control mb-2"
                                        value="<?= $row['nama_pemilik']?>" placeholder="Nama Pemilik" required />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Alamat Pemilik</label>
                                      <input type="text" name="alamat_pemilik" class="form-control mb-2"
                                        value="<?= $row['alamat_pemilik']?>" placeholder="Alamat Pemilik" required />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Nama Pengemudi</label>
                                      <input type="text" name="nama_pengemudi" class="form-control mb-2"
                                        value="<?= $row['nama_pengemudi']?>" placeholder="Nama Pengemudi" required />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">No. SIM</label>
                                      <input type="text" name="no_sim" class="form-control mb-2"
                                        value="<?= $row['no_sim']?>" placeholder="No. SIM" required />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">No. Pasport</label>
                                      <input type="text" name="no_pasport" class="form-control mb-2"
                                        value="<?= $row['no_pasport']?>" placeholder="No. Pasport" required />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Merk / Jenis Kendaraan</label>
                                      <input type="text" name="jenis_kendaraan" class="form-control mb-2"
                                        value="<?= $row['jenis_kendaraan']?>" placeholder="Jenis Kendaraan" required />
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-7">
                                        <div class="mb-5 fv-row">
                                          <label class="required form-label">Tahun Pembuatan</label>
                                          <input type="number" name="tahun_pembuatan" class="form-control mb-2"
                                            value="<?= $row['tahun_pembuatan']?>" placeholder="Tahun Pembuatan"
                                            required />
                                        </div>
                                      </div>
                                      <div class="col-lg-1">
                                        <div class="mb-5 fv-row">
                                          <label class="form-label"></label>
                                          <input type="text" class="form-control mb-2 border-0" style="font-size: 20px;"
                                            value="/" />
                                        </div>
                                      </div>
                                      <div class="col-lg-4">
                                        <div class="mb-5 fv-row">
                                          <label class="required form-label">CC</label>
                                          <input type="number" name="cc" class="form-control mb-2"
                                            value="<?= $row['cc']?>" placeholder="CC" required />
                                        </div>
                                      </div>
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">No. Rangka</label>
                                      <input type="text" name="no_rangka" class="form-control mb-2"
                                        value="<?= $row['no_rangka']?>" placeholder="No. Rangka" required />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">No. Mesin</label>
                                      <input type="text" name="no_mesin" class="form-control mb-2"
                                        value="<?= $row['no_mesin']?>" placeholder="No. Mesin" required />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Warna</label>
                                      <input type="text" name="warna" class="form-control mb-2"
                                        value="<?= $row['warna']?>" placeholder="Warna" required />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Maksud Kunjungan</label>
                                      <input type="text" name="maksud_kunjungan" class="form-control mb-2"
                                        value="<?= $row['maksud_kunjungan']?>" placeholder="Maksud Kunjungan"
                                        required />
                                    </div>
                                    <div class="mb-5 fv-row">
                                      <label class="required form-label">Alamat Tujuan</label>
                                      <input type="text" name="alamat_tujuan" class="form-control mb-2"
                                        value="<?= $row['alamat_tujuan']?>" placeholder="Alamat Tujuan" required />
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
                        <button type="submit" name="edit_strp" class="btn btn-warning">Ubah</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="hapus<?= $row['id_strp'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header border-bottom-0 shadow">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus STRP <?= $row['nama_pengemudi'] ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST">
                      <input type="hidden" name="id_strp" value="<?= $row['id_strp'] ?>">
                      <input type="hidden" name="id_kepemilikan_kendaraan"
                        value="<?= $row['id_kepemilikan_kendaraan'] ?>">
                      <input type="hidden" name="filesOld" value="<?= $row['files'] ?>">
                      <div class="modal-body text-center">
                        <p>Apakah Anda yakin ingin menghapus data ini?</p>
                      </div>
                      <div class="modal-footer border-top-0 justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="delete_strp" class="btn btn-danger">Hapus</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <?php }else if($role<4){?>
              <div class="modal fade" id="ubah<?= $row['id_strp'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header border-bottom-0 shadow">
                      <h5 class="modal-title" id="exampleModalLabel">Ubah STRP <?= $row['nama_pengemudi'] ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="id_strp" value="<?= $row['id_strp'] ?>">
                      <div class="modal-body">
                        <div class="mb-5 fv-row">
                          <label class="required form-label">No. Registrasi</label>
                          <input type="text" name="no_registrasi" class="form-control mb-2"
                            value="<?= $row['no_registrasi']?>" placeholder="No. Registrasi" required />
                        </div>
                        <div class="mb-5 fv-row">
                          <label class="required form-label">Berlaku Hingga</label>
                          <input type="date" name="berlaku_hingga" class="form-control mb-2"
                            value="<?= $row['berlaku_hingga']?>" placeholder="Berlaku Hingga" required />
                        </div>
                      </div>
                      <div class="modal-footer border-top-0 justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="edit_strp_lantas" class="btn btn-warning">Ubah</button>
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