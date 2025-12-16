const preview = document.querySelector(".project-preview");
const previewImg = preview.querySelector("img");
const projects = document.querySelectorAll(".project-line");

let currentImage = "";

// Mouse positions
let mouseX = 0;
let mouseY = 0;

// Preview positions (for drag effect)
let currentX = 0;
let currentY = 0;

const offsetX = 32;
const offsetY = 32;
const speed = 0.12; // lower = more drag

// Track mouse
document.addEventListener("mousemove", (e) => {
  mouseX = e.clientX + offsetX;
  mouseY = e.clientY + offsetY;
});

projects.forEach((project) => {
  project.addEventListener("mouseenter", () => {
    const imgSrc = project.dataset.image;

    if (imgSrc !== currentImage) {
      previewImg.style.opacity = "0";

      setTimeout(() => {
        previewImg.src = imgSrc;
        previewImg.style.opacity = "1";
      }, 150);

      currentImage = imgSrc;
    }

    preview.style.opacity = "1";
    preview.style.transform = "scale(1)";
  });

  project.addEventListener("mouseleave", () => {
    preview.style.opacity = "0";
    preview.style.transform = "scale(0.95)";
  });
});

// Smooth follow animation
function animate() {
  currentX += (mouseX - currentX) * speed;
  currentY += (mouseY - currentY) * speed;

  preview.style.left = `${currentX}px`;
  preview.style.top = `${currentY}px`;

  requestAnimationFrame(animate);
}

animate();
