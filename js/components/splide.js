export const initSplide = () => {
    const splide = new Splide(".splide", {
        type: "loop",
        perMove: 1,
        autoplay: true,
        interval: 3000,
        pauseOnHover: true,
        pauseOnFocus: true,
        resetProgress: false,
        focus: "center",
        fixedWidth: "320px",
        fixedHeight: "320px",
        gap: "60px",
        pagination: false,
        breakpoints: {
            1200: { gap: "48px" },
            1024: { gap: "40px" },
            768: { perPage: 2, gap: "32px", fixedWidth: "280px", fixedHeight: "280px" },
            480: { perPage: 1, gap: "24px", fixedWidth: "90%", fixedHeight: "auto" },
        },
    });
    let restartTimeout;

    splide.on("moved", () => {
        clearTimeout(restartTimeout);
        restartTimeout = setTimeout(() => {
            splide.Components.Autoplay.play();
        }, 5000);
    });

    splide.mount();
};
