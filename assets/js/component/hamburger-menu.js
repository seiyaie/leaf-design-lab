// component/hamburger-menu.js

export const initHamburgerMenu = () => {
    // 要素を取得
    const menu = document.querySelector(".js-header__menu");
    const menuNav = document.querySelector(".js-header__menu-nav");
    const openButton = document.querySelector(".js-header__menu-open-button");
    const closeButton = document.querySelector(".js-header__menu-close-button");


    // 必要な要素がなければ処理を中断
    if (!menu || !menuNav || !openButton || !closeButton) return;

    let isAnimating = false;

    // モバイル判定
    const isMobile = () => window.matchMedia("(max-width: 767px)").matches;


    // メニューを開く処理
    const openMenu = () => {
        if (isAnimating || menu.open) return;
        isAnimating = true;
        document.body.style.overflow = "hidden";
        menu.showModal();

        gsap.killTweensOf([menu, menuNav]);

        const tl = gsap.timeline({
            onComplete: () => {
                isAnimating = false;
            },
        });

        tl.fromTo(
            menu,
            { opacity: 0 },
            {
                opacity: 1,
                duration: 0.3,
                ease: "power2.out",
            }
        ).fromTo(
            menuNav,
            { opacity: 0, y: 24 },
            {
                opacity: 1,
                y: 0,
                duration: 0.4,
                ease: "power3.out",
            },
            "-=0.15"
        );
    };


    // メニューを閉じる処理
    const closeMenu = () => {
        if (isAnimating || !menu.open) return Promise.resolve();
        isAnimating = true;

        return new Promise((resolve) => {
            gsap.killTweensOf([menu, menuNav]);

            const tl = gsap.timeline({
                onComplete: () => {
                    document.body.style.overflow = "";
                    menu.close();
                    gsap.set([menu, menuNav], { clearProps: "all" });
                    isAnimating = false;
                    resolve();
                },
            });

            tl.to(menuNav, {
                opacity: 0,
                y: 24,
                duration: 0.25,
            }).to(
                menu,
                {
                    opacity: 0,
                    duration: 0.3,
                },
                "-=0.1"
            );
        });
    };

    // ボタンのクリックイベント
    openButton.addEventListener("click", openMenu);
    closeButton.addEventListener("click", closeMenu);

    // Escapeキーで閉じる
    document.addEventListener("keydown", (e) => {
        if (e.key !== "Escape" || !menu.open) return;
        e.preventDefault();
        closeMenu();
    });

    // メニュー背景クリックで閉じる
    menu.addEventListener("click", (e) => {
        if (!e.target.closest(".js-hamburger__menu-link")) closeMenu();
    });

    // ナビリンククリック時の処理
    menuNav.addEventListener("click", async (e) => {
        const link = e.target.closest("a");

        // リンクでない、またはPCの場合は何もしない
        if (!link || !isMobile()) return;

        const url = new URL(link.href, window.location.href);

        if (url.hash && url.pathname === window.location.pathname) {
            e.preventDefault();

            await closeMenu();

            document.querySelector(url.hash)?.scrollIntoView({
                behavior: "smooth",
            });
            return;
        }

        closeMenu();
    });

    // リサイズ時の処理 | PC時にリセット
    window.addEventListener("resize", () => {
        if (!isMobile()) {
            if (menu.open) menu.close();
            gsap.set(menu, { clearProps: "all" });
            isAnimating = false;
        }
    });
};
