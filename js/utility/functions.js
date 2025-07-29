const rotateArrow = (arrow, isOpening, animate = true) => {
    if (!arrow) return;
    arrow.getAnimations().forEach((anim) => anim.cancel());
    if (!animate) {
        arrow.style.transform = `rotate(${isOpening ? "585deg" : "45deg"})`;
        arrow.style.top = isOpening ? "45%" : "40%";
        return;
    }

    arrow.animate(
        [
            {
                transform: `rotate(${isOpening ? "45deg" : "585deg"})`,
                top: isOpening ? "40%" : "45%",
            },
            {
                transform: `rotate(${isOpening ? "585deg" : "45deg"})`,
                top: isOpening ? "45%" : "40%",
            },
        ],
        {
            duration: 300,
            easing: "ease",
            fill: "forwards",
        }
    );
};

// submenuを開く
export const openSubMenu = (submenu, arrow) => {
    submenu.style.display = "block";
    const height = submenu.scrollHeight;

    submenu.animate(
        { height: ["0px", `${height}px`], opacity: [0, 1] },
        {
            duration: 300,
            easing: "ease",
            fill: "forwards",
        }
    );

    submenu.classList.add("is-active");
    rotateArrow(arrow, true);
};

// submenuを閉じる
export const closeSubMenu = (submenu, arrow) => {
    const height = submenu.scrollHeight;

    const animation = submenu.animate(
        { height: [`${height}px`, "0px"], opacity: [1, 0] },
        {
            duration: 300,
            easing: "ease",
            fill: "forwards",
        }
    );

    animation.onfinish = () => {
        submenu.style.display = "none";
        submenu.classList.remove("is-active");
    };
    rotateArrow(arrow, false);
};

// すべてのsubmenuを閉じる
export const closeAllSubMenus = (context = document) => {
    context.querySelectorAll(".dropdown-submenu.is-active").forEach((submenu) => {
        const parentBtn = submenu.previousElementSibling;
        const arrow = parentBtn.querySelector(".js-dropdown-button--arrow");
        closeSubMenu(submenu, arrow);
    });
};

export const closeAllSubMenusImmediately = (context = document) => {
    context.querySelectorAll(".dropdown-submenu.is-active").forEach((submenu) => {
        const parentBtn = submenu.previousElementSibling;
        const arrow = parentBtn.querySelector(".js-dropdown-button--arrow");
        submenu.style.display = "none";
        submenu.classList.remove("is-active");
        rotateArrow(arrow, false, false);
    });
};
