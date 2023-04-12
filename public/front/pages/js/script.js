const togglePassword = document.querySelectorAll(".toggle-password");

togglePassword.forEach(function (element) {
  element.addEventListener("click", function () {
    const target = document.querySelector(this.getAttribute("data-target"));
    if (target.type === "password") {
      target.type = "text";
      this.querySelector("i").classList.remove("fa-eye");
      this.querySelector("i").classList.add("fa-eye-slash");
    } else {
      target.type = "password";
      this.querySelector("i").classList.remove("fa-eye-slash");
      this.querySelector("i").classList.add("fa-eye");
    }
  });
});
// ===================================

function uploadImage() {
  var fileInput = document.getElementById("imageUpload");
  var preview = document.getElementById("imagePreview");
  var file = fileInput.files[0];
  var reader = new FileReader();

  reader.onload = function () {
    var img = document.createElement("img");
    img.src = reader.result;
    preview.appendChild(img);
  };

  reader.readAsDataURL(file);
}
