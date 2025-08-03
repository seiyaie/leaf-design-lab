import { closeSubmenusIfOpen } from "../utility/functions.js";

export const initHamburgerMenu = () => {
    const menu = document.querySelector(".js-header-menu");
    const button = document.querySelector(".js-hamburger-button");
    const closeButton = document.querySelector(".js-hamburger-close-button");

    // コンテンツ Opening Keyframe
    const contentsOpeningKeyframes = {
        width: [0, 100 + "%"],
    };

    // コンテンツ Closing Keyframe
    const contentsClosingKeyframes = {
        width: [100 + "%", 0],
    };

    // 共通Option
    const options = {
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
        disableScroll();
        menu.showModal();
        menu.animate(contentsOpeningKeyframes, options);
    };
    // メニューcloseする関数
    const closeMenu = (animate = true) => {
        if (animate) {
            const closingAnim = menu.animate(contentsClosingKeyframes, options);

            // アニメーションの完了後
            closingAnim.onfinish = () => {
                menu.close();
                closeSubmenusIfOpen();
                enableScroll();
            };
        } else {
            menu.close();
            closeSubmenusIfOpen();
            enableScroll();
        }
    };

    button.addEventListener("click", () => {
        openMenu();
    });

    closeButton.addEventListener("click", () => {
        closeMenu();
    });

    window.addEventListener("resize", () => {
        if (menu && window.innerWidth >= 768 && menu.open) {
            closeMenu(false);
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
