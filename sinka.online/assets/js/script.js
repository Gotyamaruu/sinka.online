document.addEventListener("DOMContentLoaded", function () {
  gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

  // ページトップボタン
  const topBtn = document.querySelector(".js-pagetop");
  topBtn.style.display = "none";

  // ページトップボタンの表示設定
  window.addEventListener("scroll", function () {
    if (window.scrollY > 70) {
      topBtn.style.display = "block";
    } else {
      topBtn.style.display = "none";
    }
  });

  // ページトップボタンをクリックしたらスクロールして上に戻る
  topBtn.addEventListener("click", function (e) {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });

  // スムーススクロール (絶対パスのリンク先が現在のページであった場合でも作動。ヘッダーの高さ考慮。)
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

  particlesJS("particles-js", {
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

  const contentAnimateElement = document.querySelector(
    ".p-mv__content-animate"
  );
  if (contentAnimateElement) {
    contentAnimateElement.classList.add("load-animation");
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

  const hamburger = document.querySelector(".js-hamburger");
  const drawer = document.querySelector(".js-drawer");

  hamburger.addEventListener("click", function () {
    hamburger.classList.toggle("open");
    if (hamburger.classList.contains("open")) {
      gsap.to(drawer, { display: "flex", duration: 0.3, ease: "power2.inOut" });
      drawer.classList.add("open");
    } else {
      gsap.to(drawer, { display: "none", duration: 0.3, ease: "power2.inOut" });
      drawer.classList.remove("open");
    }
  });

  window.addEventListener("load", resizeHandler);
  window.addEventListener("resize", resizeHandler);

  function resizeHandler() {
    const width = window.innerWidth;
    if (width >= 768) {
      gsap.to(drawer, { display: "flex", duration: 0 });
      dr
      
      awer.classList.remove("open");
    } else {
      gsap.to(drawer, { display: "none", duration: 0 });
    }
  }

  ScrollTrigger.create({
    start: "top -50", 
    toggleClass: { targets: ".p-header", className: "js-scrolled" },
  });
});
