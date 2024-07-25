"use strict";

// Class definition
var KTSigninGeneral = (function () {
  // Elements
  var form;
  var submitButton;
  var validator;

  // Handle form
  var handleForm = function (e) {
    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
    validator = FormValidation.formValidation(form, {
      fields: {
        oauth: {
          validators: {
            notEmpty: {
              message: "Authenticator code is required",
            },
            OAuth: {
              message: "The code you entered is invalid or has expired",
            },
          },
        },
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap: new FormValidation.plugins.Bootstrap5({
          rowSelector: ".fv-row",
        }),
      },
    });

    // Handle form submit
    submitButton.addEventListener("click", function (e) {
      // Prevent button default action
      e.preventDefault();

      // Validate form
      validator.validate().then(function (status) {
        if (status == "Valid") {
          // Show loading indication
          submitButton.setAttribute("data-kt-indicator", "on");

          // Disable button to avoid multiple click
          submitButton.disabled = true;

          // Simulate ajax request
          setTimeout(function () {
            // Hide loading indication
            submitButton.removeAttribute("data-kt-indicator");

            // Enable button
            submitButton.disabled = false;

            // Submit data
            var data = $(".form").serialize();
            $.ajax({
              type: "POST",
              url: "oauth-method.php",
              data: data,
              dataType: "json",
              success: function (response) {
                if (response.status == true) {
                  form.querySelector('[name="oauth"]').value = "";
                  var redirectUrl = form.getAttribute("data-kt-redirect-url");
                  if (redirectUrl) {
                    location.href = redirectUrl;
                  }
                } else if (response.status == false) {
                  Swal.fire({
                    text: response.message,
                    icon: "error",
                    customClass: {
                      confirmButton: "btn btn-danger",
                    },
                  });
                }
              },
            });
          }, 2000);
        } else {
          // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
          Swal.fire({
            text: "Sorry, it looks like some errors were detected, please try again.",
            icon: "error",
            customClass: {
              confirmButton: "btn btn-danger",
            },
          });
        }
      });
    });
  };

  // Public functions
  return {
    // Initialization
    init: function () {
      form = document.querySelector("#kt_sign_in_form");
      submitButton = document.querySelector("#kt_sign_in_submit");

      handleForm();
    },
  };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
  KTSigninGeneral.init();
});
