export const initTabMenu = () => {
    // query selectors
    const tabs = document.querySelectorAll("[data-button]");
    const contents = document.querySelectorAll("[data-content]");

    const openingKeyframes = {
        opacity: [0, 1],
        transform: ["translateY(20px)", "translateY(0)"],
    };

    const options = {
        duration: 300,
        easing: "ease-in-out",
        fill: "forwards",
    };

    // tab menu 切り替え関数
    const tabClick = (e) => {
        // クリックされたtab
        const targetTab = e.target;

        //クリックされたdata-buttonの値
        const targetValue = e.target.dataset.button;

        //クリックされたtabに対応するcontents
        const targetContent = document.querySelector(`[data-content="${targetValue}"]`);

        //全てのis-activeをremove
        [...tabs, ...contents].forEach((item) => item.classList.remove("is-active"));

        //クリックしたタブにis-activeをadd
        targetTab.classList.add("is-active");

        //クリックしたコンテンツにis-activeをadd
        targetContent.classList.add("is-active");
        targetContent.animate(openingKeyframes, options);
    };

    tabs.forEach((tab) => {
        tab.addEventListener("click", (e) => tabClick(e));
    });
};
