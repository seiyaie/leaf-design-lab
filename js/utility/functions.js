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

    rotateArrow(arrow, false);

    animation.onfinish = () => {
        submenu.style.display = "none";
        submenu.classList.remove("is-active");
    };
};

// // すべてのsubmenuを閉じる
export const closeAllSubMenus = (context = document) => {
    context.querySelectorAll(".dropdown-submenu.is-active").forEach((submenu) => {
        const parentBtn = submenu.previousElementSibling;
        if (!parentBtn) return;
        const arrow = parentBtn.querySelector(".js-dropdown-button--arrow");
        closeSubMenu(submenu, arrow);
    });
};

export const rotateArrow = (arrow, isOpening) => {
    if (!arrow) return;

    arrow.classList.toggle("is-open", isOpening);
};


// transitionを一時的に無効化する処理
const disableTransitionTemporarily = (element) => {
    if (!element) return;

    element.style.transition = "none";

    // 強制的にリフロー（再描画）を発生させて適用させる
    void element.offsetHeight;

    // 元のtransitionに戻す
    requestAnimationFrame(() => {
        element.style.transition = "";
    });
};

// ドロップダウンのすべてのサブメニューを即時で閉じる（アニメーションなし）
export const closeAllSubMenusImmediately = (context = document) => {
    context.querySelectorAll(".js-dropdown-submenu.is-active").forEach((submenu) => {
        const parentBtn = submenu.previousElementSibling;
        if (!parentBtn) return;

        const arrow = parentBtn.querySelector(".js-dropdown-button--arrow");

        disableTransitionTemporarily(arrow);
        if (arrow) arrow.classList.remove("is-open");

        submenu.style.display = "none";
        submenu.classList.remove("is-active");
    });
};

// 開いているサブメニューがあれば閉じる（アニメーション付き）
export const closeSubmenusIfOpen = (context = document) => {
    const isAnySubmenuOpen = context.querySelector(".js-dropdown-submenu.is-active");
    if (isAnySubmenuOpen) {
        closeAllSubMenusImmediately(context);
    }
};
