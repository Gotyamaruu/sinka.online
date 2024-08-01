document.addEventListener("DOMContentLoaded", function () {
  gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

  const topBtn = document.querySelector(".js-pagetop");
  topBtn.style.display = "none";

  window.addEventListener("scroll", function () {
    if (window.scrollY > 70) {
      topBtn.style.display = "block";
    } else {
      topBtn.style.display = "none";
    }
  });

  topBtn.addEventListener("click", function (e) {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });

  document.querySelectorAll('a[href*="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      const targetId = this.getAttribute("href").substring(1);
      const targetElement = document.getElementById(targetId);
      if (!targetElement) return;
      const headerHeight = document.querySelector("header").offsetHeight;
      const targetPosition =
        targetElement.getBoundingClientRect().top +
        window.pageYOffset -
        headerHeight;
      window.scrollTo({
        top: targetPosition,
        behavior: "smooth",
      });
    });
  });

  particlesJS("js-particles", {
    particles: {
      number: { value: 140, density: { enable: true, value_area: 780 } },
      color: { value: "#ffffff" },
      shape: {
        type: "circle",
        stroke: { width: 0, color: "#000000" },
        polygon: { nb_sides: 5 },
        image: { src: "img/github.svg", width: 100, height: 100 },
      },
      opacity: {
        value: 0.5,
        random: false,
        anim: { enable: false, speed: 1, opacity_min: 0.1, sync: false },
      },
      size: {
        value: 3,
        random: true,
        anim: { enable: false, speed: 40, size_min: 0.1, sync: false },
      },
      line_linked: {
        enable: true,
        distance: 110.48066982851817,
        color: "#ffffff",
        opacity: 1,
        width: 1.5,
      },
      move: {
        enable: true,
        speed: 6,
        direction: "none",
        random: false,
        straight: false,
        out_mode: "out",
        bounce: false,
        attract: { enable: false, rotateX: 600, rotateY: 1200 },
      },
    },
    interactivity: {
      detect_on: "canvas",
      events: {
        onhover: { enable: true, mode: "repulse" },
        onclick: { enable: true, mode: "push" },
        resize: true,
      },
      modes: {
        grab: { distance: 400, line_linked: { opacity: 1 } },
        bubble: { distance: 400, size: 40, duration: 2, opacity: 8, speed: 3 },
        repulse: { distance: 200, duration: 0.4 },
        push: { particles_nb: 4 },
        remove: { particles_nb: 2 },
      },
    },
    retina_detect: true,
  });

  const contentAnimateElements = document.querySelectorAll(
    ".p-mv__content-animate, .c-page-title__text"
  );
  if (contentAnimateElements) {
    contentAnimateElements.forEach((element) => {
      element.classList.add("load-animation");
    });
  }

  document.querySelectorAll(".js-visible").forEach((section) => {
    const sectionTitle = section.querySelector(".c-section-title");

    gsap.fromTo(
      section,
      { autoAlpha: 0, y: 50 },
      {
        autoAlpha: 1,
        y: 0,
        scrollTrigger: {
          trigger: section,
          start: "top 90%",
          end: "bottom top",
          toggleActions: "play none none reverse",
          onEnter: () => sectionTitle.classList.add("load-animation"),
          onLeaveBack: () => sectionTitle.classList.remove("load-animation"),
        },
      }
    );
  });

  const hamburger = document.querySelector("#js-hamburger");
  const drawer = document.querySelector(".js-drawer");

  // hamburger.addEventListener("click", (e) => {
  //   const isExpanded =
  //     e.currentTarget.getAttribute("aria-expanded") !== "false";
  //   e.currentTarget.setAttribute("aria-expanded", !isExpanded);

  //   document.documentElement.classList.toggle("is-drawerActive");
  // });

  hamburger.addEventListener("click", function (e) {
    const isExpanded = e.currentTarget.getAttribute("aria-expanded") !== "true";
    e.currentTarget.setAttribute("aria-expanded", isExpanded);
    if (isExpanded) {
      gsap.set(drawer, { display: "flex" });
      gsap.fromTo(drawer,
          { opacity: 0, y: -20 },
          { opacity: 1, y: 0, duration: 0.3, ease: "power2.inOut" })
    } else {
      gsap.to(drawer,
        { opacity: 0, y: -20, duration: 0.3, ease: "power2.inOut", onComplete: () => {
            gsap.set(drawer, { display: "none" });
        }
    });
    }
  });

  function resizeHandler() {
    const width = window.innerWidth;
    const drawer = document.querySelector(".js-drawer");
    if (drawer) {
      if (width >= 768) {
        gsap.to(drawer, { display: "flex", duration: 0 });
        drawer.classList.remove("open");
      } else {
        gsap.to(drawer, { display: "none", duration: 0 });
      }
    }
  }

  window.addEventListener("load", resizeHandler);
  window.addEventListener("resize", resizeHandler);

  ScrollTrigger.create({
    start: "top -50",
    toggleClass: { targets: ".p-header", className: "js-scrolled" },
  });

  var main = new Splide("#main", {
    type: "loop",
    autoplay: true,
    interval: 4000,
    pagination: false,
    arrows: false,
    gap: "20px",
  }).mount();

  var thumbnails = new Splide("#thumbnail", {
    type: "loop",
    perPage: 5,
    focus: "center",
    autoplay: false,
    interval: 4000,
    pagination: false,
    arrows: false,
    gap: 5,
    fixedHeight: 100,
    isNavigation: true,
    mediaQuery: "min",
    breakpoints: {
      768: {
        fixedWidth: 110,
        fixedHeight: 40,
      },
    },
  }).mount();

  main.sync(thumbnails);
});
