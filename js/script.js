// ulpload and chance image

let previewImage = () => {
  const image = document.querySelector(".imagepreview");
  const value = document.querySelector(".valueimage");

  // file reader
  const reader = new FileReader();
  reader.readAsDataURL(value.files[0]);

  reader.onload = (e) => (image.src = e.target.result);
};

$(function () {
  $(".loader").hide();
  $(".input").on("keyup", function () {
    $(".loader").show();

    $.get(`ajax.php?keyword=${$(this).val()}`, function (data) {
      $(".container").html(data);
    });
  });
});

$(function () {
  $("#logoutIcon").on("click", function () {
    let confirmUser = confirm("you want to logout?");

    confirmUser == true
      ? (window.location.href = "logout.php")
      : (window.location.href = "#");
  });
});

function readURL(input) {
  if (input.files && input.files[0]) {
    let reader = new FileReader();
    reader.onload = function (e) {
      $("#cover").css("background-image", `url(${e.target.result})`);
      $("#cover").hide();
      $("#cover").fadeIn(650);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

$("#tInput").on("change", function () {
  readURL(this);
});

function readurl(input) {
  if (input.files && input.files[0]) {
    let reader = new FileReader();
    reader.onload = function (e) {
      $("#imagePreview").css("background-image", `url(${e.target.result})`);
      $("#imagePreview").hide();
      $("#imagePreview").fadeIn(650);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
$("#imageUpload").on("change", function () {
  readurl(this);
});
