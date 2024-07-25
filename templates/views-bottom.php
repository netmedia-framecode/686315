</div>
<!--end::Container-->
</div>
<!--end::Content-->

<!--begin::Footer-->
<?php require_once(__DIR__ . "/../sections/views-footer.php") ?>
<!--end::Footer-->

</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::Root-->
<!--begin::Javascript-->
<?php require_once(__DIR__ . "/../sections/views-scrolltop.php") ?>
<?php require_once(__DIR__ . "/../sections/views-js.php") ?>
<script src="<?= $baseURL . '/assets/js/signin-methode.js' ?>"></script>
<script src="<?= $baseURL . '/assets/js/two-factor-authentications.js' ?>"></script>
<script>
  $(document).ready(function() {
    $(".disable-gauth").click(function() {
      var data = $(".form-gauth-disable").serialize();
      $.ajax({
        type: "POST",
        url: "method.php",
        data: data,
        dataType: "json",
        success: function(response) {
          if (response.status == true) {
            // Show success message.
            Swal.fire({
              text: response.message,
              icon: "success",
              customClass: {
                confirmButton: "btn btn-success",
              },
            }).then(function() {
              window.location.href = "security";
            });
          }
        },
      });
    })
  })
</script>
<script>
  function copyText(text) {
    var dummy = document.createElement("textarea");
    document.body.appendChild(dummy);
    dummy.value = text;
    dummy.select();
    document.execCommand("copy");
    document.body.removeChild(dummy);
    Swal.fire({
      text: "Code has been copied",
      icon: "success",
      customClass: {
        confirmButton: "btn btn-success",
      },
    })
  }
</script>
<!--end::Javascript-->
</body>
<!--end::Body-->

</html>