import { closeAllSubMenusImmediately } from "../utility/functions.js";

export const initIntersectionObserver = () => {
    const kv = document.querySelector(".js-kv");
    const header = document.querySelector(".js-header");

    const slideDownKeyframes = {
        transform: "translateY(60rem)",
    };
    const slideUpKeyframes = {
        transform: "translateY(0)",
    };

    const animationOptions = {
        duration: 100,
        easing: "linear",
        fill: "forwards",
    };

    // kvまたは、headerが存在しない場合は処理を終了
    if (!kv || !header) return;

    const handleIntersection = (entries) => {
        entries.forEach((entry) => {
            // kv がvp内に入り、かつheaderがfixedを保有している場合
            if (entry.isIntersecting && header.classList.contains("is-fixed")) {
                closeAllSubMenusImmediately();
                //header閉じるアニメーション開始
                const closeAnimation = header.animate(slideUpKeyframes, animationOptions);
                //アニメーション終了後にfixed削除
                closeAnimation.onfinish = () => {
                    header.classList.remove("is-fixed");
                };
                //kvがvp外に出た場合
            } else if (!entry.isIntersecting) {
                //headerを固定表示するためにfixed追加
                header.classList.add("is-fixed");
                //ヘッダー表示アニメーション開始
                header.animate(slideDownKeyframes, animationOptions);
                closeAllSubMenusImmediately();
            }
        });
    };

    const options = {
        threshold: 0,
    };

    const observer = new IntersectionObserver(handleIntersection, options);

    //監視対象を監視
    observer.observe(kv);
};
