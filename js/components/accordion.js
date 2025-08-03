export const initAccordion = () => {
    // query selectors
    const details = document.querySelectorAll(".js-accordion-details");

    // Opening Keyframes
    const openingKeyframes = (content) => {
        return {
            height: [0, content.scrollHeight + "px"],
            opacity: [0, 1],
        };
    };

    // Closing Keyframes
    const closingKeyframes = (content) => {
        return {
            height: [content.scrollHeight + "px", 0],
            opacity: [1, 0],
        };
    };

    // Options
    const options = {
        duration: 300,
        easing: "linear",
    };

    // 要素がない場合は処理を中断
    if (!details.length) return;

    details.forEach((el) => {
        const summary = el.querySelector(".js-accordion-summary");
        const content = el.querySelector(".js-accordion-content");

        // サマリーとコンテンツがない場合は処理を中断
        if (!summary || !content) return;

        summary.addEventListener("click", (e) => {
            e.preventDefault();

            //アニメーション中の場合は処理を中断
            if (el.dataset.isAnimation === "true") {
                return;
            }

            if (el.open) {
                // アコーディオンを閉じる処理
                el.dataset.isAnimation = "true";
                const closeAnimation = content.animate(closingKeyframes(content), options);
                closeAnimation.onfinish = () => {
                    el.removeAttribute("open");
                    el.dataset.isAnimation = "false";
                };
            } else {
                // アコーディオンを開く処理
                el.setAttribute("open", "true");
                el.dataset.isAnimation = "true";

                const openAnimation = content.animate(openingKeyframes(content), options);
                openAnimation.onfinish = () => {
                    el.dataset.isAnimation = "false";
                };
            }
        });
    });

    // アコーディオン外クリックで閉じる
    document.addEventListener("click", (e) => {
        const isInsideAccordion = [...details].some((detail) =>
            detail.contains(e.target)
        );

        if (!isInsideAccordion) {
            details.forEach((el) => {
                if (el.open && el.dataset.isAnimation !== "true") {
                    const content = el.querySelector(".js-accordion-content");
                    const closeAnimation = content.animate(closingKeyframes(content), options);
                    closeAnimation.onfinish = () => {
                        el.removeAttribute("open");
                        el.dataset.isAnimation = "false";
                    };
                }
            });
        }
    });
};
