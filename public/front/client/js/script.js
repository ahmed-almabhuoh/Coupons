// Button in popup
// Get all the icon boxes
const iconBoxes = document.querySelectorAll(".icon-box");

// Loop through each icon box and add a click event listener
iconBoxes.forEach((iconBox) => {
  iconBox.addEventListener("click", function () {
    const img = this.querySelector("img");
    // Check if the 'data-src' attribute is set
    if (img.getAttribute("data-src")) {
      // If it's set, swap the 'src' and 'data-src' attributes
      const temp = img.getAttribute("src");
      img.setAttribute("src", img.getAttribute("data-src"));
      img.setAttribute("data-src", temp);
    }
  });
});

// gallery item filter

const filterButtons = document.querySelector("#filter-btns").children;
const items = document.querySelector("#portfolio-gallery").children;

for (let i = 0; i < filterButtons.length; i++) {
  filterButtons[i].addEventListener("click", function () {
    for (let j = 0; j < filterButtons.length; j++) {
      filterButtons[j].classList.remove("active");
    }
    this.classList.add("active");
    const target = this.getAttribute("data-target");

    for (let k = 0; k < items.length; k++) {
      items[k].style.display = "none";
      if (target == items[k].getAttribute("data-id")) {
        items[k].style.display = "block";
      }
      if (target == "all") {
        items[k].style.display = "block";
      }
    }
  });
}
// POPUP
$(document).ready(function () {
  $("#myButton").click(function () {
    $(".popover").toggle();
  });
});
