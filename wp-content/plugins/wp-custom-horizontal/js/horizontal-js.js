
/* Wp-custom-horizontal JS */

const slider = document.querySelector('.slider');
let isDown = false;
let startX;
let sLeft;
slider.scrollLeft = 0;

slider.addEventListener('mousedown', (e) => {
  isDown = true;
  startX = e.pageX;
  sLeft = slider.scrollLeft;
});

slider.addEventListener('mouseleave', () => {
  isDown = false;
});

slider.addEventListener('mouseup', () => {
  isDown = false;
});

slider.addEventListener('mousemove', (e) => {
  if (!isDown) return;
  e.preventDefault();
  const x = e.pageX;
  const dragged = x - startX;
  slider.scrollLeft = sLeft - dragged;
});

// Adding wheel event listener for mouse scrolling
slider.addEventListener('wheel', (e) => {
  e.preventDefault();
  const delta = e.deltaY || e.detail || e.wheelDelta;
  slider.scrollLeft += delta;
});


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

