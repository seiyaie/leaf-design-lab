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
        fixedHeight: '320px',
        gap: "60px",
        pagination: false,
        breakpoints: {
            1200: { gap: "48px", fixedWidth: "500px", fixedHeight: "500px"},
            1024: { gap: "40px", fixedWidth: "460px", fixedHeight: "460px" },
            768: { perPage: 2, gap: "32px", fixedWidth: "320px", fixedHeight: '320px'},
            480: { perPage: 1, gap: "24px", fixedWidth: "100%", fixedHeight: "100%" },
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
