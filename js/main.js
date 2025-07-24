import { initSplide } from "./components/splide.js";
import { initIntersectionObserver } from "./components/intersection-observer.js";
import { initAccordion } from "./components/accordion.js";
import { initTabMenu } from "./components/tab-menu.js";
import { initDropdownMenu } from "./components/dropdown-menu.js";
import { initHamburgerMenu } from "./components/hamburger-menu.js";
import { initModal } from "./components/modal.js";


document.addEventListener("DOMContentLoaded", () => {
    initSplide();
    initIntersectionObserver();
    initAccordion();
    initTabMenu();
    initDropdownMenu();
    initHamburgerMenu();
    initModal();
});


