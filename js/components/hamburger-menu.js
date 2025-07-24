import { closeAllSubMenus } from "../utility/functions.js";

export const initHamburgerMenu = () => {
    const menu = document.querySelector(".js-header-menu");
    const button = document.querySelector(".js-hamburger-button");
    const closeButton = document.querySelector(".js-hamburger-close-button");

    // コンテンツ Opening Keyframe
    const contentsOpeningKeyframes = {
        width: [0, 100 + "%"],
    };

    // コンテンツ Opening Option
    const contentsOpeningOptions = {
        duration: 200,
        easing: "ease-out",
    };

    // コンテンツ Closing Keyframe
    const contentsClosingKeyframes = {
        width: [100 + "%", 0],
    };

    // コンテンツ Closing Option
    const contentsClosingOptions = {
        duration: 200,
        easing: "ease-out",
    };

    // menuとbuttonがページ内にない場合returnする
    if (!menu || !button) return;

    // スクロール制御 for iOS Safari
    const preventScroll = (e) => e.preventDefault();

    const disableScroll = () => {
        document.body.style.overflow = "hidden";
        document.documentElement.style.overflow = "hidden";
        document.addEventListener("touchmove", preventScroll, { passive: false });
    };

    const enableScroll = () => {
        document.body.style.overflow = "";
        document.documentElement.style.overflow = "";
        document.removeEventListener("touchmove", preventScroll);
    };

    // メニューopenする関数
    const openMenu = () => {
        closeAllSubMenus();
        disableScroll();
        menu.showModal();
        menu.animate(contentsOpeningKeyframes, contentsOpeningOptions);
    };
    // メニューcloseする関数
    const closeMenu = () => {
        closeAllSubMenus();
        const closingAnim = menu.animate(contentsClosingKeyframes, contentsClosingOptions);

        // アニメーションの完了後
        closingAnim.onfinish = () => {
            menu.close();
            enableScroll();
        };
    };

    button.addEventListener("click", () => {
        openMenu();
    });

    closeButton.addEventListener("click", () => {
        closeMenu();
    });

    window.addEventListener("resize", () => {
        if (menu && window.innerWidth >= 768 && menu.open) {
            menu.close();
            document.body.style.overflow = "";
        }
    });

    menu.addEventListener("click", (e) => {
        if (!e.target.closest(".js-header-list")) {
            closeMenu();
        }
    });

    // Escapeキーを押すと非表示
    document.addEventListener("keydown", function (event) {
        if (event.key === "Escape") {
            event.preventDefault();
            closeMenu();
        }
    });
};
