
/* Wp-custom-horizontal JS */




// GSAP ScrollTrigger code
gsap.registerPlugin(ScrollTrigger);

let sections = gsap.utils.toArray(".panel");

gsap.to(sections, {
  xPercent: -100 * (sections.length - 1),
  ease: "none",
  scrollTrigger: {
    trigger: ".container-wraper",
    pin: true,
    markers: true,
    scrub: 1,
    snap: {
      snapTo: 1 / (sections.length - 1),
      duration: 0.05
    },
    end: "+=4500",
  }
});

