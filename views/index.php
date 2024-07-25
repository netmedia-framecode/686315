<?php require_once("../controller/script.php");
require_once("redirect.php");
$_SESSION["page-name"] = "Dashboard";
$_SESSION["page-url"] = "./";
$_SESSION['actual-link'] = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$_SESSION['object-link'] = $baseURL . "/views/";
require_once("../templates/views-top.php");
?>

<!-- begin::Content -->
<?php if($role<4){?>
<div class="row g-5 g-xl-10">
  <div class="col-md-6 col-lg-6 col-xl-6 mb-md-5 mb-xl-10">

    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center h-md-100 mb-5 mb-xl-10"
      style="background-color: #080655;background-image:url('../assets/files/wave-bg-dark.svg')">
      <div class="card-header pt-5">
        <div class="card-title d-flex flex-column">
          <span
            class="fs-2hx fw-bolder text-white me-2 lh-1 ls-n2"><?= mysqli_num_rows($views_keberangkatan)." / ".mysqli_num_rows($views_kedatangan) ?></span>
          <span class="text-white opacity-50 pt-1 fw-bold fs-6">Keberangkatan / Kedatangan</span>
        </div>
      </div>
    </div>

  </div>
  <div class="col-md-6 col-lg-6 col-xl-6 mb-md-5 mb-xl-10">

    <div class="card card-flush">
      <div class="card-header pt-5">
        <div class="card-title d-flex flex-column">
          <span
            class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2"><?= mysqli_num_rows($views_keberangkatan)+mysqli_num_rows($views_kedatangan) ?></span>
          <span class="text-gray-400 pt-1 fw-bold fs-6">Jumlah Kendaraan</span>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <?php if($role==2){?>
          <div class="col-lg-4">
            <div class="card shadow text-center">
              <i class="bi bi-card-checklist" style="font-size: 60px;"></i>
              <div class="card-body">
                <h5 class="card-title">STRP</h5>
                <a href="pendataan/strp" class="btn btn-primary">Detail</a>
              </div>
            </div>
          </div>
          <?php } else if($role==1){?>
          <div class="col-lg-4">
            <div class="card shadow text-center">
              <i class="bi bi-card-checklist" style="font-size: 60px;"></i>
              <div class="card-body">
                <h5 class="card-title">Formulir Wawancara</h5>
                <a href="pendataan/formulir-wawancara" class="btn btn-primary">Detail</a>
              </div>
            </div>
          </div>
          <?php }?>
          <div class="col-lg-4">
            <div class="card shadow text-center">
              <i class="bi bi-truck" style="font-size: 60px;"></i>
              <div class="card-body">
                <h5 class="card-title">Keberangkatan</h5>
                <a href="pendataan/keberangkatan" class="btn btn-primary">Detail</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card shadow text-center">
              <i class="bi bi-truck" style="font-size: 60px;"></i>
              <div class="card-body">
                <h5 class="card-title">Kedatangan</h5>
                <a href="pendataan/kedatangan" class="btn btn-primary">Detail</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>
<?php }if($role==4){
  if(!isset($_SESSION['strp'])){?>
<h1 class="mb-5">STRP</h1>
<form method="POST" class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">

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
          <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
        </div>
      </div>
      <div class="card-body pt-0">
        <select name="id_warga_negara" class="form-select mb-2" required>
          <option value="" selected>Pilih Warga Negara</option>
          <?php foreach ($views_warga_negara as $data) : ?>
          <option value="<?= $data['id_warga_negara'] ?>"><?= $data['warga_negara'] ?></option>
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
            <?php foreach ($views_kepemilikan_kendaraan as $data) : ?>
            <option value="<?= $data['id_kepemilikan_kendaraan'] ?>"><?= $data['kepemilikan_kendaraan'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="fv-row w-100 flex-md-root">
          <label class="required form-label">Upload File Persyaratan</label>
          <div class="mb-3">
            <input class="form-control" type="file" name="files" id="formFile" accept=".pdf">
          </div>
          <div class="fs-6">Lengkapi persyaratan Surat Tanda Registrasi Permohonan (STRP) dengan mengupload berkas dalam
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
          <?php foreach ($views_bahan_bakar as $data) : ?>
          <option value="<?= $data['id_bahan_bakar'] ?>"><?= $data['bahan_bakar'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
  </div>

  <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
    <div class="tab-content">
      <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
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
                <input type="text" name="no_polisi" class="form-control mb-2" value="<?php if (isset($_POST['no_polisi'])) {
                                                                                        echo $_POST['no_polisi'];
                                                                                      } ?>" placeholder="No. Polisi"
                  required />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Nama Pemilik</label>
                <input type="text" name="nama_pemilik" class="form-control mb-2" value="<?php if (isset($_POST['nama_pemilik'])) {
                                                                                        echo $_POST['nama_pemilik'];
                                                                                      } ?>" placeholder="Nama Pemilik"
                  required />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Alamat Pemilik</label>
                <input type="text" name="alamat_pemilik" class="form-control mb-2" value="<?php if (isset($_POST['alamat_pemilik'])) {
                                                                                        echo $_POST['alamat_pemilik'];
                                                                                      } ?>"
                  placeholder="Alamat Pemilik" required />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Nama Pengemudi</label>
                <input type="text" name="nama_pengemudi" class="form-control mb-2" value="<?php if (isset($_POST['nama_pengemudi'])) {
                                                                                        echo $_POST['nama_pengemudi'];
                                                                                      } ?>"
                  placeholder="Nama Pengemudi" required />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">No. SIM</label>
                <input type="text" name="no_sim" class="form-control mb-2" value="<?php if (isset($_POST['no_sim'])) {
                                                                                        echo $_POST['no_sim'];
                                                                                      } ?>" placeholder="No. SIM"
                  required />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">No. Pasport</label>
                <input type="text" name="no_pasport" class="form-control mb-2" value="<?php if (isset($_POST['no_pasport'])) {
                                                                                        echo $_POST['no_pasport'];
                                                                                      } ?>" placeholder="No. Pasport"
                  required />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Merk / Jenis Kendaraan</label>
                <input type="text" name="jenis_kendaraan" class="form-control mb-2" value="<?php if (isset($_POST['jenis_kendaraan'])) {
                                                                                        echo $_POST['jenis_kendaraan'];
                                                                                      } ?>"
                  placeholder="Jenis Kendaraan" required />
              </div>
              <div class="row">
                <div class="col-lg-7">
                  <div class="mb-5 fv-row">
                    <label class="required form-label">Tahun Pembuatan</label>
                    <input type="number" name="tahun_pembuatan" class="form-control mb-2" value="<?php if (isset($_POST['tahun_pembuatan'])) {
                                                                                            echo $_POST['tahun_pembuatan'];
                                                                                          } ?>"
                      placeholder="Tahun Pembuatan" required />
                  </div>
                </div>
                <div class="col-lg-1">
                  <div class="mb-5 fv-row">
                    <label class="form-label"></label>
                    <input type="text" class="form-control mb-2 border-0" style="font-size: 20px;" value="/" />
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="mb-5 fv-row">
                    <label class="required form-label">CC</label>
                    <input type="number" name="cc" class="form-control mb-2" value="<?php if (isset($_POST['cc'])) {
                                                                                            echo $_POST['cc'];
                                                                                          } ?>" placeholder="CC"
                      required />
                  </div>
                </div>
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">No. Rangka</label>
                <input type="text" name="no_rangka" class="form-control mb-2" value="<?php if (isset($_POST['no_rangka'])) {
                                                                                        echo $_POST['no_rangka'];
                                                                                      } ?>" placeholder="No. Rangka"
                  required />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">No. Mesin</label>
                <input type="text" name="no_mesin" class="form-control mb-2" value="<?php if (isset($_POST['no_mesin'])) {
                                                                                        echo $_POST['no_mesin'];
                                                                                      } ?>" placeholder="No. Mesin"
                  required />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Warna</label>
                <input type="text" name="warna" class="form-control mb-2" value="<?php if (isset($_POST['warna'])) {
                                                                                        echo $_POST['warna'];
                                                                                      } ?>" placeholder="Warna"
                  required />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Maksud Kunjungan</label>
                <input type="text" name="maksud_kunjungan" class="form-control mb-2" value="<?php if (isset($_POST['maksud_kunjungan'])) {
                                                                                        echo $_POST['maksud_kunjungan'];
                                                                                      } ?>"
                  placeholder="Maksud Kunjungan" required />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Alamat Tujuan</label>
                <input type="text" name="alamat_tujuan" class="form-control mb-2" value="<?php if (isset($_POST['alamat_tujuan'])) {
                                                                                        echo $_POST['alamat_tujuan'];
                                                                                      } ?>" placeholder="Alamat Tujuan"
                  required />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-start mt-5 mb-5">
        <button type="submit" name="add_strp" class="btn btn-primary shadow">
          <span class="indicator-label">Lanjut</span>
          <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
      </div>
    </div>
  </div>

</form>
<?php }else if(isset($_SESSION['strp'])){
  $kategori = $_SESSION['strp']['kategori'];
  $id_strp = $_SESSION['strp']['id_strp'];
  ?>
<h1 class="mb-5">Formulir Wawancara</h1>
<form method="POST" class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
  <input type="hidden" name="kategori" value="<?= $kategori?>">
  <input type="hidden" name="id_strp" value="<?= $id_strp?>">

  <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-12">
    <div class="tab-content">
      <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
        <div class="d-flex flex-column gap-7 gap-lg-10">
          <div class="card card-flush py-4 shadow">
            <div class="card-body pt-5">

              <div class="mb-5 fv-row">
                <label class="required form-label">Apakah saat ini Saudara dalam keadaan sehat ?</label>
                <div class="d-flex">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="kesehatan" id="ya" value="Ya" checked>
                    <label class="form-check-label" for="ya">
                      Ya
                    </label>
                  </div>
                  <div class="form-check" style="margin-left: 10px;">
                    <input class="form-check-input" type="radio" name="kesehatan" id="tidak" value="Tidak">
                    <label class="form-check-label" for="tidak">
                      Tidak
                    </label>
                  </div>
                </div>
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Apakah Saudara adalah <strong>pengemudi</strong> atas kendaraan yang
                  mengajukan permohonan ?</label>
                <div class="d-flex">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="pengemudi_kendaraan" id="ya" value="Ya" checked>
                    <label class="form-check-label" for="ya">
                      Ya
                    </label>
                  </div>
                  <div class="form-check" style="margin-left: 10px;">
                    <input class="form-check-input" type="radio" name="pengemudi_kendaraan" id="tidak" value="Tidak">
                    <label class="form-check-label" for="tidak">
                      Tidak
                    </label>
                  </div>
                </div>
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Nama Lengkap Pengemudi</label>
                <input type="text" name="nama_pengemudi" class="form-control mb-2" value="<?php if (isset($_POST['nama_pengemudi'])) {
                                                                                        echo $_POST['nama_pengemudi'];
                                                                                      } ?>" required />
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="mb-5 fv-row">
                    <label class="required form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control mb-2" value="<?php if (isset($_POST['tempat_lahir'])) {
                                                                                            echo $_POST['tempat_lahir'];
                                                                                          } ?>" required />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-5 fv-row">
                    <label class="required form-label">Tgl Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control mb-2" value="<?php if (isset($_POST['tgl_lahir'])) {
                                                                                            echo $_POST['tgl_lahir'];
                                                                                          } ?>" required />
                  </div>
                </div>
              </div>
              <hr>
              <h6>Alamat Pengemudi ( Sesuai KTP / ID )</h6>
              <div class="mb-5 fv-row">
                <label class="required form-label">Jalan</label>
                <input type="text" name="jalan_pengemudi" class="form-control mb-2" value="<?php if (isset($_POST['jalan_pengemudi'])) {
                                                                                        echo $_POST['jalan_pengemudi'];
                                                                                      } ?>" required />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Kelurahan</label>
                <input type="text" name="kelurahan_pengemudi" class="form-control mb-2" value="<?php if (isset($_POST['kelurahan_pengemudi'])) {
                                                                                        echo $_POST['kelurahan_pengemudi'];
                                                                                      } ?>" required />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Kecamatan</label>
                <input type="text" name="kecamatan_pengemudi" class="form-control mb-2" value="<?php if (isset($_POST['kecamatan_pengemudi'])) {
                                                                                        echo $_POST['kecamatan_pengemudi'];
                                                                                      } ?>" required />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Kabupaten / Kota</label>
                <input type="text" name="kabupaten_kota_pengemudi" class="form-control mb-2" value="<?php if (isset($_POST['kabupaten_kota_pengemudi'])) {
                                                                                        echo $_POST['kabupaten_kota_pengemudi'];
                                                                                      } ?>" required />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Provinsi</label>
                <input type="text" name="provinsi_pengemudi" class="form-control mb-2" value="<?php if (isset($_POST['provinsi_pengemudi'])) {
                                                                                        echo $_POST['provinsi_pengemudi'];
                                                                                      } ?>" required />
              </div>
              <hr>
              <div class="mb-5 fv-row">
                <label class="required form-label">Nomor Paspor Pengemudi</label>
                <input type="text" name="no_pasport_pengemudi" class="form-control mb-2" value="<?php if (isset($_POST['no_pasport_pengemudi'])) {
                                                                                        echo $_POST['no_pasport_pengemudi'];
                                                                                      } ?>" required />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Nomor SIM Pengemudi</label>
                <input type="number" name="no_sim_pengemudi" class="form-control mb-2" value="<?php if (isset($_POST['no_sim_pengemudi'])) {
                                                                                        echo $_POST['no_sim_pengemudi'];
                                                                                      } ?>" required />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Nomor HP Pengemudi</label>
                <input type="number" name="no_hp_pengemudi" class="form-control mb-2" value="<?php if (isset($_POST['no_hp_pengemudi'])) {
                                                                                        echo $_POST['no_hp_pengemudi'];
                                                                                      } ?>" required />
              </div>
              <hr>
              <div class="mb-5 fv-row">
                <label class="required form-label">Apakah Saudara adalah pemilik kendaraan ?</label>
                <div class="d-flex">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="pemilik_kendaraan" id="ya" value="Ya" checked>
                    <label class="form-check-label" for="ya">
                      Ya
                    </label>
                  </div>
                  <div class="form-check" style="margin-left: 10px;">
                    <input class="form-check-input" type="radio" name="pemilik_kendaraan" id="tidak" value="Tidak">
                    <label class="form-check-label" for="tidak">
                      Tidak
                    </label>
                  </div>
                </div>
              </div>
              <div class="mb-5 fv-row">
                <label class="form-label">Nama Pemilik Kendaraan</label>
                <input type="text" name="nama_pemilik_kendaraan" class="form-control mb-2" value="<?php if (isset($_POST['nama_pemilik_kendaraan'])) {
                                                                                        echo $_POST['nama_pemilik_kendaraan'];
                                                                                      } ?>" />
              </div>
              <div class="mb-5 fv-row">
                <label class="form-label">Nomor Paspor / Identitas Pemilik Kendaraan</label>
                <input type="text" name="identitas_pemilik_kendaraan" class="form-control mb-2" value="<?php if (isset($_POST['identitas_pemilik_kendaraan'])) {
                                                                                        echo $_POST['identitas_pemilik_kendaraan'];
                                                                                      } ?>" />
              </div>
              <hr>
              <h6>Alamat Pemilik Kendaraan</h6>
              <div class="mb-5 fv-row">
                <label class="required form-label">Jalan</label>
                <input type="text" name="jalan_kendaraan" class="form-control mb-2" value="<?php if (isset($_POST['jalan_kendaraan'])) {
                                                                                        echo $_POST['jalan_kendaraan'];
                                                                                      } ?>" />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Kelurahan</label>
                <input type="text" name="kelurahan_kendaraan" class="form-control mb-2" value="<?php if (isset($_POST['kelurahan_kendaraan'])) {
                                                                                        echo $_POST['kelurahan_kendaraan'];
                                                                                      } ?>" />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Kecamatan</label>
                <input type="text" name="kecamatan_kendaraan" class="form-control mb-2" value="<?php if (isset($_POST['kecamatan_kendaraan'])) {
                                                                                        echo $_POST['kecamatan_kendaraan'];
                                                                                      } ?>" />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Kabupaten / Kota</label>
                <input type="text" name="kabupaten_kota_kendaraan" class="form-control mb-2" value="<?php if (isset($_POST['kabupaten_kota_kendaraan'])) {
                                                                                        echo $_POST['kabupaten_kota_kendaraan'];
                                                                                      } ?>" />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Provinsi</label>
                <input type="text" name="provinsi_kendaraan" class="form-control mb-2" value="<?php if (isset($_POST['provinsi_kendaraan'])) {
                                                                                        echo $_POST['provinsi_kendaraan'];
                                                                                      } ?>" />
              </div>
              <hr>
              <div class="mb-5 fv-row">
                <label class="required form-label">Apakah Saudara memiliki Surat Kuasa ( dalam hal kendaraan pribadi )
                  atau Surat Tugas ( dalam hal kendaraan dinas ) dari pemilik kendaraan ?</label>
                <div class="d-flex">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="surat_kuasa" id="ya" value="Ya" checked>
                    <label class="form-check-label" for="ya">
                      Ya
                    </label>
                  </div>
                  <div class="form-check" style="margin-left: 10px;">
                    <input class="form-check-input" type="radio" name="surat_kuasa" id="tidak" value="Tidak">
                    <label class="form-check-label" for="tidak">
                      Tidak
                    </label>
                  </div>
                </div>
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Tanda Nomor Kendaraan / Plat Nomor</label>
                <input type="text" name="plat_nomor" class="form-control mb-2" value="<?php if (isset($_POST['plat_nomor'])) {
                                                                                        echo $_POST['plat_nomor'];
                                                                                      } ?>" required />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Merek / Type / Warna kendaraan</label>
                <input type="text" name="merek_kendaraan" class="form-control mb-2" value="<?php if (isset($_POST['merek_kendaraan'])) {
                                                                                        echo $_POST['merek_kendaraan'];
                                                                                      } ?>" required />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Kepemilikan Kendaraan</label>
                <select name="id_kepemilikan_kendaraan" class="form-select mb-2" required>
                  <option value="" selected>Pilih Kepemilikan Kendaraan</option>
                  <?php foreach ($views_kepemilikan_kendaraan as $data) : ?>
                  <option value="<?= $data['id_kepemilikan_kendaraan'] ?>"><?= $data['kepemilikan_kendaraan'] ?>
                  </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <hr>
              <h6>Alamat Tujuan Kunjungan Saudara di negara tujuan ?</h6>
              <div class="mb-5 fv-row">
                <label class="required form-label">Jalan</label>
                <input type="text" name="jalan_tujuan" class="form-control mb-2" value="<?php if (isset($_POST['jalan_tujuan'])) {
                                                                                        echo $_POST['jalan_tujuan'];
                                                                                      } ?>" required />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Distric</label>
                <input type="text" name="distric" class="form-control mb-2" value="<?php if (isset($_POST['distric'])) {
                                                                                        echo $_POST['distric'];
                                                                                      } ?>" required />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Sub-Distric</label>
                <input type="text" name="sub_distric" class="form-control mb-2" value="<?php if (isset($_POST['sub_distric'])) {
                                                                                        echo $_POST['sub_distric'];
                                                                                      } ?>" required />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Suco</label>
                <input type="text" name="suco" class="form-control mb-2" value="<?php if (isset($_POST['suco'])) {
                                                                                        echo $_POST['suco'];
                                                                                      } ?>" required />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Aldeia</label>
                <input type="text" name="aldeia" class="form-control mb-2" value="<?php if (isset($_POST['aldeia'])) {
                                                                                        echo $_POST['aldeia'];
                                                                                      } ?>" required />
              </div>
              <hr>
              <div class="mb-5 fv-row">
                <label class="required form-label">Maksud kunjunagn Saudara di negara tujuan ?</label>
                <input type="text" name="maksud_kunjungan" class="form-control mb-2" value="<?php if (isset($_POST['maksud_kunjungan'])) {
                                                                                        echo $_POST['maksud_kunjungan'];
                                                                                      } ?>" required />
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Rencana jangka waktu kunjungan ?</label>
                <input type="date" name="waktu_kunjungan" class="form-control mb-2" value="<?php if (isset($_POST['waktu_kunjungan'])) {
                                                                                        echo $_POST['waktu_kunjungan'];
                                                                                      } ?>" required />
              </div>
              <hr>
              <div class="mb-5 fv-row">
                <label class="required form-label">Apakah Saudara bersedia <strong>mempertanggungjawabkan</strong> jika
                  <strong>terjadi pelanggaran</strong> atas kendaraan dan <strong>barang-barang</strong> yang dimuat
                  diatasnya ?</label>
                <div class="d-flex">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="pelanggaran_atas_barang" id="bersedia"
                      value="Bersedia" checked>
                    <label class="form-check-label" for="bersedia">
                      Bersedia
                    </label>
                  </div>
                  <div class="form-check" style="margin-left: 10px;">
                    <input class="form-check-input" type="radio" name="pelanggaran_atas_barang" id="tidak-bersedia"
                      value="Tidak Bersedia">
                    <label class="form-check-label" for="tidak-bersedia">
                      Tidak Bersedia
                    </label>
                  </div>
                </div>
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Apakah Saudara bersedia <strong>mempertanggungjawabkan</strong> jika
                  <strong>terjadi pelanggaran</strong> dalam hal kendaraan ini <strong>dijual, disewakan, dihibahkan,
                    dibuang</strong> di negara tujuan <strong>tanpa izin</strong> ?</label>
                <div class="d-flex">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="pelanggaran_atas_penyalahgunaan" id="bersedia"
                      value="Bersedia" checked>
                    <label class="form-check-label" for="bersedia">
                      Bersedia
                    </label>
                  </div>
                  <div class="form-check" style="margin-left: 10px;">
                    <input class="form-check-input" type="radio" name="pelanggaran_atas_penyalahgunaan"
                      id="tidak-bersedia" value="Tidak Bersedia">
                    <label class="form-check-label" for="tidak-bersedia">
                      Tidak Bersedia
                    </label>
                  </div>
                </div>
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Apakah Saudara bersedia <strong>mempertanggungjawabkan</strong> jika
                  <strong>terjadi pelanggaran</strong> dalam hal kendaraan ini <strong>dirubah bentuknya</strong> di
                  negara tujuan secara hakiki <strong>tanpa izin</strong> ?</label>
                <div class="d-flex">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="pelanggaran_atas_modifikasi" id="bersedia"
                      value="Bersedia" checked>
                    <label class="form-check-label" for="bersedia">
                      Bersedia
                    </label>
                  </div>
                  <div class="form-check" style="margin-left: 10px;">
                    <input class="form-check-input" type="radio" name="pelanggaran_atas_modifikasi" id="tidak-bersedia"
                      value="Tidak Bersedia">
                    <label class="form-check-label" for="tidak-bersedia">
                      Tidak Bersedia
                    </label>
                  </div>
                </div>
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Apakah Saudara bersedia <strong>mempertanggungjawabkan</strong> jika
                  <strong>terjadi pelanggaran</strong> kendaraan ini keberadaannya di negara tujuan <strong>melebihi
                    batas waktu</strong> yang telah ditetapkan yakni <strong>30 ( tiga puluh ) hari</strong> ?</label>
                <div class="d-flex">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="pelanggaran_atas_waktu" id="bersedia"
                      value="Bersedia" checked>
                    <label class="form-check-label" for="bersedia">
                      Bersedia
                    </label>
                  </div>
                  <div class="form-check" style="margin-left: 10px;">
                    <input class="form-check-input" type="radio" name="pelanggaran_atas_waktu" id="tidak-bersedia"
                      value="Tidak Bersedia">
                    <label class="form-check-label" for="tidak-bersedia">
                      Tidak Bersedia
                    </label>
                  </div>
                </div>
              </div>
              <div class="mb-5 fv-row">
                <label class="required form-label">Jika Saudara bersedia <strong>melanggar pernyataan</strong>
                  sebagaimana tersebut dalam poin-poin diatas, apakah Saudara <strong>bersedia membayar sanki
                    administrasi berupa denda sebesar 100%</strong> dari bea masuk atas Nilai FOB / harga kendaraan yang
                  seharusnya dibayarkan ?</label>
                <div class="d-flex">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="sanksi" id="bersedia" value="Bersedia" checked>
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
              <hr>

            </div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-start mt-5 mb-5">
        <button type="submit" name="add_formulir_wawancara" class="btn btn-primary shadow">
          <span class="indicator-label">Kirim</span>
          <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
      </div>
    </div>
  </div>

</form>
<?php }}?>
<!-- end::Content -->

<?php require_once("../templates/views-bottom.php"); ?>