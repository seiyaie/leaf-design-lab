// submenuを開く
export const openSubMenu = (submenu) => {
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

    submenu.classList.add("active");
};

// submenuを閉じる
export const closeSubMenu = (submenu) => {
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
        submenu.classList.remove("active");
    };
};

// すべてのsubmenuを閉じる
export const closeAllSubMenus = (context = document) => {
    context.querySelectorAll(".dropdown-submenu.active").forEach((submenu) => {
        closeSubMenu(submenu);
    });
};

export const closeAllSubMenusImmediately = (context = document) => {
    context.querySelectorAll(".dropdown-submenu.active").forEach((submenu) => {
        submenu.style.display = "none";
        submenu.classList.remove("active");
    });
};

