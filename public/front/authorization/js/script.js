// ==========(For Icon in Register Page)===================
//Define all password fields
const passwordFields = document.querySelectorAll('input[type="password"]');
// تحديد جميع الأيقونات
const togglePasswordIcons = document.querySelectorAll(".toggle-password");
// The function that alters the display property
function togglePassword(passwordField, togglePasswordIcon) {
  const type =
    passwordField.getAttribute("type") === "password" ? "text" : "password";
  passwordField.setAttribute("type", type);
  togglePasswordIcon.classList.toggle("show");
}
// Add event listener for all icons
togglePasswordIcons.forEach(function (icon) {
  icon.addEventListener("click", function () {
    // الحصول على الحقل الذي يقابل هذه الأيقونة
    const passwordField = icon.previousElementSibling;
    togglePassword(passwordField, icon);
  });
});

// ============== (function switchLanguage) =================
function switchLanguage(language) {
  var arabicLink = document.querySelector(
    ".language-switcher li:nth-child(2) a"
  );
  var englishLink = document.querySelector(
    ".language-switcher li:nth-child(1) a"
  );

  if (language === "arabic") {
    arabicLink.classList.add("active");
    englishLink.classList.remove("active");
  } else {
    arabicLink.classList.remove("active");
    englishLink.classList.add("active");
  }
}

// ======(Get the dropdown toggle and menu elements)===========

const dropdownToggle = document.querySelector(".dropdown-toggle");
const dropdownMenu = document.querySelector(".dropdown-menu");

// Toggle the active class on the dropdown toggle and show/hide the dropdown menu
dropdownToggle.addEventListener("click", function () {
  this.classList.toggle("active");
  dropdownMenu.classList.toggle("active");
});

var popup = document.getElementById("myModal");

function openPopup() {
  popup.style.display = "block";
}

function closePopup() {
  popup.style.display = "none";
}
