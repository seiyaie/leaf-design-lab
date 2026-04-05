// component/header.js

export const initHeaderScrollState = () => {
    // 要素を取得
    const header = document.querySelector(".js-header");

    // 要素がなければ処理を中断
    if (!header) return;

    // スクロール位置に応じてクラスを付与・削除
    const onScroll = () => {
        header.classList.toggle("is-scrolled", window.scrollY > 20);
    };

    // 初期表示時にも状態を反映
    onScroll();

    // スクロールイベントを設定
    window.addEventListener("scroll", onScroll);
};
