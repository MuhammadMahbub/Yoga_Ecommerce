/*=========================================================================================
  File Name: form-validation.js
  Description: jquery bootstrap validation js
==========================================================================================*/

$(function () {
  'use strict';

  var pageForgotPasswordForm = $('.auth-forgot-password-form');

  // jQuery Validation
  // --------------------------------------------------------------------
  if (pageForgotPasswordForm.length) {
    pageForgotPasswordForm.validate({
      /*? To enable validation onkeyup
      onkeyup: function (element) {
        $(element).valid();
      },
      */
      /* ? To enable validation on focusout
      onfocusout: function (element) {
        $(element).valid();
      },
      */
      rules: {
        'email': {
          required: true,
          email: true
        }
      }
    });
  }
});
