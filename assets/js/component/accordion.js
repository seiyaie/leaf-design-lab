// component/accordion.js
export const initAccordion = () => {
    // 要素取得
    const items = document.querySelectorAll(".js-faq__item");

    // 要素がなければ処理を中断
    if (!items.length) return;

    // 開くアニメーション
    const openAnimation = (answer, item) => {
        gsap.fromTo(
            answer,
            { height: 0 },
            {
                height: answer.scrollHeight + "px",
                duration: 0.3,
                ease: "linear",
                onComplete: () => {
                    answer.style.height = "auto";
                    delete item.dataset.isAnimation;
                },
            }
        );
    };

    // 閉じるアニメーション
    const closeAnimation = (answer, item) => {
        gsap.fromTo(
            answer,
            { height: answer.scrollHeight + "px" },
            {
                height: 0,
                duration: 0.3,
                ease: "linear",
                onComplete: () => {
                    item.removeAttribute("open");
                    delete item.dataset.isAnimation;
                },
            }
        );
    };

    // 各アコーディオンにクリックイベントを設定
    items.forEach((item) => {
        const question = item.querySelector(".js-faq__question");
        const answer = item.querySelector(".js-faq__answer");

        // 必要な要素がなければ処理を中断
        if (!question || !answer) return;

        question.addEventListener("click", (e) => {
            e.preventDefault();

            // アニメーション中は多重実行を防ぐため中断
            if (item.dataset.isAnimation === "true") {
                return;
            }

            if (item.open) {
                // アコーディオンを閉じる処理
                item.dataset.isAnimation = "true";
                closeAnimation(answer, item);
            } else {
                // アコーディオンを開く処理
                item.setAttribute("open", "true");
                item.dataset.isAnimation = "true";
                openAnimation(answer, item);
            }
        });
    });

    // アコーディオン外クリックで閉じる
    document.addEventListener("click", (e) => {
        // クリック位置がアコーディオン内か判定
        const isInsideAccordion = [...items].some((item) => item.contains(e.target));

        if (!isInsideAccordion) {
            items.forEach((item) => {
                if (item.open && item.dataset.isAnimation !== "true") {
                    const answer = item.querySelector(".js-faq__answer");
                    item.dataset.isAnimation = "true";
                    closeAnimation(answer, item);
                }
            });
        }
    });
};
