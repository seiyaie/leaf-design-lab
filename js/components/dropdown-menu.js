import { openSubMenu, closeSubMenu, closeAllSubMenus, closeSubmenusIfOpen } from "../utility/functions.js";

export const initDropdownMenu = () => {
    const btns = document.querySelectorAll(".js-dropdown-button");

    // メイン処理
    btns.forEach((btn) => {
        btn.addEventListener("click", () => {
            const submenu = btn.nextElementSibling;
            const arrow = btn.querySelector(".js-dropdown-button--arrow");
            const isOpen = submenu.classList.contains("is-active");

            if (!isOpen) {
                closeAllSubMenus();
                openSubMenu(submenu, arrow);
            } else {
                closeSubMenu(submenu, arrow);
            }
        });
    });

    // submenu外クリックで閉じる処理
    document.addEventListener("click", (e) => {
        const isInsideDropdown = e.target.closest(".js-dropdown-button") || e.target.closest(".js-dropdown-submenu");
        if (!isInsideDropdown) {
            closeAllSubMenus();
        }
    });

    let previousWidth = window.innerWidth;

    window.addEventListener("resize", () => {
        const currentWidth = window.innerWidth;

        if (previousWidth >= 768 && currentWidth < 768) {
            // 768px以上 → 未満 に変化したときだけ閉じる
            closeSubmenusIfOpen();
        }

        previousWidth = currentWidth;
    });
};
