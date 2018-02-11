$(document).ready(function () {
  $.validator.setDefaults({
    errorClass: 'help-block',

    highlight: function(element) {
      $(element)
      .addClass('is-invalid');

      $(element)
      .closest('.form-group')
      .addClass('text-danger');
    },

    unhighlight: function(element) {
      $(element)
      .removeClass('is-invalid')
      .addClass('is-valid');

      $(element)
      .closest('.form-group')
      .removeClass('text-danger')
      .addClass('text-success');
    },

    errorPlacement: function(error, element) {
      if (element.prop('type') === 'checkbox') {
        error.insertAfter(element.parent());
      }else
        error.insertAfter(element);
    }
  });

  $.validator.addMethod("pwcheck", function(value) {
   return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
   && /[a-z]/.test(value) // has a lowercase letter
   && /\d/.test(value) // has a digit
  });

  $.validator.addMethod("integer2", function(value, element) {
    return this.optional(element) || /^[0-9]+$/i.test(value);
  }, "A positive non-decimal number please");

  /* validate login form */
  $("#signInForm").validate({
    rules: {
      userName: "required",
      password: "required"
    },

    messages: {
      userName: "User Name required",
      password: "Password required"
    }
  });

  /* validate signup form */
  $("#signUpForm").validate({
    rules: {
      userName: {
        required: true,
        nowhitespace: true,
      },
      email: {
        required: true,
        nowhitespace: true,
          email: true
      },
      firstName: {
        required: true,
        nowhitespace: true,
          lettersonly: true
      },
      lastName: {
        required: true,
        nowhitespace: true,
          lettersonly: true
      },
      natId: {
        required: true,
        nowhitespace: true,
          integer2: true,
          minlength: 6
      },
      company: "required",
      password: {
        required: true,
        pwcheck: true,
        minlength: 6
      },
      passwordReEnter: {
        required: true,
        equalTo: "#password"
      }
    },

    messages: {
      userName: {
        required : "Indicate your User Name Please",
          nowhitespace: "Only one Name is required"
      },
      email: {
        required: "Please Provide Your Email Address",
        nowhitespace: "DONT use spacing in Your Email",
          email: "Use Correct Email Address"
      },
      firstName: {
        required : "Indicate your First Name Please",
          nowhitespace: "Only one Name is required DONT use spacing",
          lettersonly: "Numbers/symbols NOT allowed in names, Letters only"
      },
      lastName: {
        required : "Indicate your Last Name Please",
          nowhitespace: "Only one Name is required DONT use spacing",
          lettersonly: "Numbers/symbols NOT allowed in names, Letters only"
      },
      natId: {
        required: "You Have to Provide Your National ID Please",
        nowhitespace: "A National ID CANT Contain spacing",
          numbersonly: "ONLY USE INTERGERS IN YOUR NATIONAL ID",
          minlength: "Please Input a valid National Id"
      },
      company: "Select the Company you are in!",
      password: {
        required: "You must provide a password!",
        pwcheck: "This is not a password",
        minlength: "Your password is too short, 6 chars"
      },
      passwordReEnter: {
        required: "This field is required!",
        equalTo: "Your password should match"
      }
    }
  });
});