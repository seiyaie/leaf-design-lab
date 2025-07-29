import { closeSubmenusIfOpen } from "../utility/functions.js";

export const initIntersectionObserver = () => {
    const kv = document.querySelector(".js-kv");
    const header = document.querySelector(".js-header");

    // Opening Keyframe
    const slideDownKeyframes = {
        transform: ["translateY(-100%)", "translateY(0)"],
    };

    // Closing Keyframe
    const slideUpKeyframes = {
        transform: ["translateY(0)", "translateY(-100%)"],
    };

    const animationOptions = {
        duration: 100,
        easing: "linear",
    };

    // kvまたは、headerが存在しない場合は処理を終了
    if (!kv || !header) return;

    const handleIntersection = (entries) => {
        entries.forEach((entry) => {
            // kv がvp内に入り、かつheaderがfixedを保有している場合
            if (entry.isIntersecting && header.classList.contains("is-fixed")) {
                closeSubmenusIfOpen();
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
                closeSubmenusIfOpen();
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
