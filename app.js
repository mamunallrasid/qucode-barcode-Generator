$("#formData").validate({
  rules: {
    name: "required",
    dob: "required",
    ph_number: "required",
  },
  submitHandler: function (form, e) {
    // The form is valid, and this function is called automatically
    $.ajax({
      url: "action-data.php",
      method: "post",
      data: $(form).serialize(), // Use 'form' instead of 'this' to reference the form
      success: function (response) {
        // Handle the success response as needed
        if (response == "1") {
          toastr.success(
            "Data Insert Successfull Completed!",
            "Congratulations",
            {
              closeButton: true,
              progressBar: true,
            }
          );
          form.reset();
        } else {
          toastr.error("Data Insert Failed!", "Error", {
            closeButton: true,
            progressBar: true,
          });
        }
      },
    });
  },
});
$(".qrGenerate").on("click", function () {
  let num = $(this).data("value");
  let qrCodeImage = $("#qrCode_" + num);
  let spiner = $("#showSpiner_" + num);
  spiner.removeClass("d-none");
  $.ajax({
    url: "action-data.php",
    method: "POST",
    data: { id: num },
    success: function (response) {
      qrCodeImage.html(response);
      spiner.addClass("d-none");
    },
  });
});
// Ajax Request For Data Insert In database

$(".barGenerate").on("click", function () {
  let id = $(this).data("value");
  let printBar = $("#barCode_" + id);
  $.ajax({
    url: "action-data.php",
    method: "POST",
    data: { barcodeid: id },
    success: function (response) {
      printBar.html(response);
    },
  });
});
