document.addEventListener("DOMContentLoaded", function () {

    let slides = document.querySelectorAll(".slide");
    let current = 0;

    if (slides.length === 0) return;

    slides[0].classList.add("active");

    setInterval(() => {
        slides[current].classList.remove("active");
        current = (current + 1) % slides.length;
        slides[current].classList.add("active");
    }, 4000); // change slide every 4 seconds
});
