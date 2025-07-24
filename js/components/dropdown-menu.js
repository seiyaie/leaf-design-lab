import { openSubMenu, closeSubMenu, closeAllSubMenus } from "../utility/functions.js";

export const initDropdownMenu = () => {
    const btns = document.querySelectorAll(".js-dropdown-button");
    // const headerList = document.querySelector(".js-header-list");

    // メイン処理
    btns.forEach((btn) => {
        btn.addEventListener("click", () => {
            const submenu = btn.nextElementSibling;
            const isOpen = submenu.classList.contains("active");

            if (!isOpen) {
                closeAllSubMenus();
                openSubMenu(submenu);
            } else {
                closeSubMenu(submenu);
            }
        });
    });
};
