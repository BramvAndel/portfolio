document.addEventListener("DOMContentLoaded", function () {
  let lastScrollTop = 0;
  const header = document.querySelector("header");
  const navbar = document.getElementById("navbar");
  const scrollThreshold = 100;
  const headerHeight = header.offsetHeight;
  let headerIsVisible = false;

  // window.addEventListener("scroll", function () {
  //   let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  //   if (scrollTop > scrollThreshold && !navbar.classList.contains("visible")) {
  //     if (scrollTop > lastScrollTop) {
  //       // Scroll down
  //       header.style.top = `-${headerHeight}px`;
  //       headerIsVisible = false;
  //     } else {
  //       // Scroll up
  //       header.style.top = "0";
  //       headerIsVisible = true;
  //     }
  //   } else {
  //     header.style.top = "0";
  //     headerIsVisible = true;
  //   }
  //   lastScrollTop = scrollTop;
  // });

  // document.addEventListener("mousemove", function (event) {
  //   if (!headerIsVisible) {
  //     if (event.clientY < headerHeight) {
  //       header.style.top = "0";
  //     } else if (event.clientY > headerHeight) {
  //       header.style.top = `-${headerHeight}px`;
  //     }
  //   }
  // });

  const menuToggle = document.getElementById("menuToggle");
  menuToggle.addEventListener("click", function () {
    navbar.classList.toggle("visible");
    header.classList.toggle(
      "navbar-visible",
      navbar.classList.contains("visible")
    );
  });

  const navbarMenuToggle = document.getElementById("navbarMenuToggle");
  navbarMenuToggle.addEventListener("click", function () {
    navbar.classList.toggle("visible");
    header.classList.toggle(
      "navbar-visible",
      navbar.classList.contains("visible")
    );
  });
});
