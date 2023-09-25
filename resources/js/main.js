// Searchbar 

// const searchContainerEl = document.querySelector(".search-container");
// const closeBtn = document.querySelector(".fa-times");

// searchContainerEl.addEventListener("click", () => {
//   searchContainerEl.classList.add("active");
// });
// closeBtn.addEventListener("click", (event) => {
//   event.stopPropagation();
//   searchContainerEl.classList.remove("active");
// });


// Fine Searchbar

// form login
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches





const mainImage = document.querySelector(".main-image img");
const thumbnails = document.querySelectorAll(".thumbnail-list img");

thumbnails.forEach(thumbnail => {
  thumbnail.addEventListener("click", function() {
    const src = this.getAttribute("src");
    mainImage.setAttribute("src", src);
  });
});

$('.carousel').carousel({
  interval: 1800
})



