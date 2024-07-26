<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="../assets/plugins/global/plugins.bundle.js"></script>
<script src="../assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<script src="../assets/js/jquery-3.5.1.min.js"></script>
<!--end::Javascript-->

<div class="translate" id="google_translate_element"></div>
<div class="gtranslate_wrapper"></div>
<script>
  window.gtranslateSettings = {
    "default_language": "id",
    "native_language_names": true,
    "detect_browser_language": true,
    "languages": ["id", "pt", "en"],
    "wrapper_selector": ".gtranslate_wrapper"
  }
</script>
<script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>

<script>
  const messageSuccess = $('.message-success').data('message-success');
  const messageInfo = $('.message-info').data('message-info');
  const messageWarning = $('.message-warning').data('message-warning');
  const messageDanger = $('.message-danger').data('message-danger');

  if (messageSuccess) {
    Swal.fire({
      icon: 'success',
      title: 'Successfully Sent',
      text: messageSuccess,
    })
  }

  if (messageInfo) {
    Swal.fire({
      icon: 'info',
      title: 'For your information',
      text: messageInfo,
    })
  }
  if (messageWarning) {
    Swal.fire({
      icon: 'warning',
      title: 'Warning!!',
      text: messageWarning,
    })
  }
  if (messageDanger) {
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: messageDanger,
    })
  }
</script>