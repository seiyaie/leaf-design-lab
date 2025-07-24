export const initTabMenu = () => {
    const menuItems = document.querySelectorAll(".js-tab-menu-item");
    const menuContents = document.querySelectorAll(".js-tab-menu-content");

    const openingKeyframes = {
        opacity: [0, 1],
        transform: ["translateY(20rem)", "translateY(0)"],
    };

    const options = {
        duration: 300,
        easing: "ease-in-out",
        fill: "forwards",
    };

    for (let i = 0; i < menuItems.length; i++) {
        menuItems[i].addEventListener("click", () => {

            menuItems.forEach((item) => {
                item.classList.remove("is-active");
            });
            menuItems[i].classList.add("is-active");

            menuContents.forEach((content) => {
                content.classList.remove("is-active");
            });
            menuContents[i].classList.add("is-active");
            menuContents[i].animate(openingKeyframes, options);
        });
    }
};
