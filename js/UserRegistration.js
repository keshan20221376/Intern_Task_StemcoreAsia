$().ready(function () {
  $("#UserRegistration").validate({
    errorClass: "error",

    rules: {
      title: "required",
      firstname: "required",
      lastname: "required",
      birthday: "required",
      gender: "required",
      zipcode: "required",
      address: "required",
      place: "required",
      country: "required",
      code: "required",
      phonenumber: "required",
      check: "required",
      UserEmail: "required",
    },

    messages: {
      title: "Title is required!",
      firstname: "First name is required and can't contain numbers",
      lastname: "Last name is required and can't contain numbers",
      birthday: "Birthday is required!",
      gender: "Gender is required!",
      zipcode: "Zip code is required!",
      address: "Address is required and can't contain the quotation mark",
      place: "Place is required!",
      country: "Country is required!",
      code: "Code is required and should start with '+'",
      phonenumber: "Phone number is required and need last nine numbers",
      check: "Should agree to the terms and conditions",
      UserEmail: "Check the email!",
    },
  });
});
