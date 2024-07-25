<?php require_once("../../controller/script.php");
require_once("redirect.php");
$_SESSION['page-name'] = "Security";
$_SESSION['page-url'] = "security";
$_SESSION['actual-link'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$_SESSION['object-link'] = $baseURL . "/views/account/";
require_once("../../templates/views-top.php");
require_once("../../sections/views-nav-account.php");
?>

<?php foreach ($dataUser as $row) : ?>
  <div class="card mb-5 mb-xl-10">
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
      <div class="card-title m-0">
        <h3 class="fw-bolder m-0">Metode Masuk</h3>
      </div>
    </div>
    <div id="kt_account_settings_signin_method" class="collapse show">
      <div class="card-body border-top p-9">

        <div class="d-flex flex-wrap align-items-center">
          <div id="kt_signin_email">
            <div class="fs-6 fw-bolder mb-1">Alamat email</div>
            <div class="fw-bold text-gray-600"><?= $row['email'] ?></div>
          </div>
          <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
            <form id="kt_signin_change_email" class="form-email" novalidate="novalidate">
              <input type="hidden" name="type-data" value="email">
              <div class="row mb-6">
                <div class="col-lg-6 mb-4 mb-lg-0">
                  <div class="fv-row mb-0">
                    <label for="email" class="form-label fs-6 fw-bolder mb-3">Masukkan Alamat Email Baru</label>
                    <input type="hidden" name="emailOld" value="<?= $_SESSION['data-user']['email'] ?>">
                    <input type="email" class="form-control form-control-lg form-control-solid" id="email" placeholder="Email Address" name="email" value="<?= $row['email'] ?>" />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="fv-row mb-0">
                    <label for="confirmemailpassword" class="form-label fs-6 fw-bolder mb-3">konfirmasi sandi</label>
                    <input type="password" class="form-control form-control-lg form-control-solid" name="confirmemailpassword" id="confirmemailpassword" />
                  </div>
                </div>
              </div>
              <div class="d-flex">
                <button id="kt_signin_submit" type="button" class="btn btn-primary me-2 px-6">Perbarui Email</button>
                <button id="kt_signin_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Batal</button>
              </div>
            </form>
          </div>
          <div id="kt_signin_email_button" class="ms-auto">
            <button class="btn btn-light btn-active-light-primary">Ganti e-mail</button>
          </div>
        </div>

        <div class="separator separator-dashed my-6"></div>
        <div class="d-flex flex-wrap align-items-center mb-10">
          <div id="kt_signin_password">
            <div class="fs-6 fw-bolder mb-1">Kata sandi</div>
            <div class="fw-bold text-gray-600">************</div>
          </div>
          <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
            <form id="kt_signin_change_password" class="form-password" novalidate="novalidate">
              <input type="hidden" name="type-data" value="password">
              <div class="row mb-1">
                <div class="col-lg-4">
                  <div class="fv-row mb-0">
                    <label for="currentpassword" class="form-label fs-6 fw-bolder mb-3">kata sandi saat ini</label>
                    <input type="password" class="form-control form-control-lg form-control-solid" name="currentpassword" id="currentpassword" min="8" />
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="fv-row mb-0">
                    <label for="newpassword" class="form-label fs-6 fw-bolder mb-3">kata sandi baru</label>
                    <input type="password" class="form-control form-control-lg form-control-solid" name="newpassword" id="newpassword" min="8" />
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="fv-row mb-0">
                    <label for="confirmpassword" class="form-label fs-6 fw-bolder mb-3">Konfirmasi password baru</label>
                    <input type="password" class="form-control form-control-lg form-control-solid" name="confirmpassword" id="confirmpassword" min="8" />
                  </div>
                </div>
              </div>
              <div class="form-text mb-5">Kata sandi minimal harus 8 karakter dan mengandung simbol</div>
              <div class="d-flex">
                <button id="kt_password_submit" type="button" class="btn btn-primary me-2 px-6">Perbarui Kata Sandi</button>
                <button id="kt_password_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Batal</button>
              </div>
            </form>
          </div>
          <div id="kt_signin_password_button" class="ms-auto">
            <button class="btn btn-light btn-active-light-primary">Atur Ulang Kata Sandi</button>
          </div>
        </div>

        <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
          <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor" />
              <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor" />
            </svg>
          </span>
          <?php if (mysqli_num_rows($authActive) == 0) { ?>
            <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
              <div class="mb-3 mb-md-0 fw-bold">
                <h4 class="text-gray-900 fw-bolder">Secure Your Account</h4>
                <div class="fs-6 text-gray-700 pe-7">Two-factor authentication adds an extra layer of security to your account. To log in, in addition you'll need to provide a 6 digit code</div>
              </div>
              <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap" data-bs-toggle="modal" data-bs-target="#kt_modal_two_factor_authentication">Enable</a>
            </div>
          <?php } else if (mysqli_num_rows($authActive) > 0) { ?>
            <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
              <div class="mb-3 mb-md-0 fw-bold">
                <h4 class="text-gray-900 fw-bolder">Two-factor authentication Active</h4>
              </div>
              <form action="" method="post" class="form-gauth-disable">
                <input type="hidden" name="type-data" value="gauth-disable">
                <button type="button" name="disable-gauth" class="disable-gauth btn btn-primary px-6 align-self-center text-nowrap">Disable</button>
              </form>
            </div>
          <?php } ?>
        </div>

      </div>
    </div>
  </div>
<?php endforeach; ?>

<div class="modal fade" id="kt_modal_two_factor_authentication" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered mw-650px">
    <div class="modal-content">
      <div class="modal-header flex-stack">
        <h2>Choose An Authentication Method</h2>
        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
          <span class="svg-icon svg-icon-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
              <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
            </svg>
          </span>
        </div>
      </div>
      <div class="modal-body scroll-y pt-10 pb-15 px-lg-17">

        <div data-kt-element="options">
          <div class="pb-10">
            <input type="radio" class="btn-check" name="auth_option" value="apps" checked="checked" id="kt_modal_two_factor_authentication_option_1" />
            <label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-5" for="kt_modal_two_factor_authentication_option_1">
              <span class="svg-icon svg-icon-4x me-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path opacity="0.3" d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z" fill="currentColor" />
                  <path d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z" fill="currentColor" />
                </svg>
              </span>
              <span class="d-block fw-bold text-start">
                <span class="text-dark fw-bolder d-block fs-3">Authenticator Apps</span>
                <span class="text-muted fw-bold fs-6">Get codes from an app like Google Authenticator.</span>
              </span>
            </label>
          </div>
          <button class="btn btn-primary w-100" data-kt-element="options-select">Melanjutkan</button>
        </div>

        <div class="d-none" data-kt-element="apps">
          <h3 class="text-dark fw-bolder mb-7">Authenticator Apps</h3>
          <div class="text-gray-500 fw-bold fs-6 mb-10">Using an authenticator app like
            <a href="https://support.google.com/accounts/answer/1066447?hl=en" target="_blank">Google Authenticator</a>, scan the QR code. It will generate a 6 digit code for you to enter below.
            <div class="pt-5 text-center">
              <img src="<?= $qrCodeUrl; ?>" alt="Verify this Google Authenticator" class="mw-150px" />
            </div>
          </div>
          <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-10 p-6">
            <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
                <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
              </svg>
            </span>
            <div class="d-flex flex-stack flex-grow-1">
              <div class="fw-bold">
                <div class="fs-6 text-gray-700">If you having trouble using the QR code, select manual entry on your app, and enter your username and the code:
                  <div class="d-flex flex-nowrap">
                    <div class="fw-bolder text-dark pt-2"><span id="text-to-copy"><?= $qrCodeUrl_view; ?></span></div>
                    <button class="btn btn-link" onclick="copyText(document.getElementById('text-to-copy').innerHTML)"><i class="bi bi-clipboard text-primary" style="margin-top: -10px; margin-left: 5px; font-size: 16px;"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <form data-kt-element="apps-form" class="form-gauth" action="#" method="POST">
            <div class="mb-10 fv-row">
              <input type="hidden" name="type-data" value="gauth">
              <input type="text" class="form-control form-control-lg form-control-solid" placeholder="Enter authentication code" name="code" />
            </div>
            <div class="d-flex flex-center">
              <button type="reset" data-kt-element="apps-cancel" class="btn btn-light me-3">Batal</button>
              <button type="button" data-kt-element="apps-submit" class="btn btn-primary">
                <span class="indicator-label">Send</span>
                <span class="indicator-progress">Please wait...
                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
              </button>
            </div>
          </form>
        </div>

        <div class="d-none" data-kt-element="sms">
          <h3 class="text-dark fw-bolder fs-3 mb-5">SMS: Verifikasi Nomor Ponsel Anda</h3>
          <div class="text-muted fw-bold mb-10">Masukkan nomor ponsel Anda dengan kode negara dan kami akan mengirimkan kode verifikasi berdasarkan permintaan.</div>
          <form data-kt-element="sms-form" class="form" action="#">
            <div class="mb-10 fv-row">
              <input type="hidden" name="type-data" value="sms">
              <input type="text" class="form-control form-control-lg form-control-solid" placeholder="Mobile number with country code..." name="mobile" value="<?= $_SESSION['data-user']['phone'] ?>" />
            </div>
            <div class="d-flex flex-center">
              <button type="reset" data-kt-element="sms-cancel" class="btn btn-light me-3">Batal</button>
              <button type="submit" data-kt-element="sms-submit" class="btn btn-primary">
                <span class="indicator-label">Kirim</span>
                <span class="indicator-progress">Mohon tunggu...
                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
              </button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>

<?php require_once("../../templates/views-bottom.php"); ?>