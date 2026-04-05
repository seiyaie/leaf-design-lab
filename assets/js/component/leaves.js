// component/leaves.js

// top-kvに表示する葉SVGの処理
export const initLeaves = () => {
    // 要素を取得
    const container = document.querySelector(".js-leaves");

    // 要素がなければ処理を中断
    if (!container) return;

    // 表示する葉の数
    const leafCount = 14;

    // サイズの最小・最大値
    const MIN_SIZE = 16;
    const MAX_SIZE = 36;

    // 葉を生成して配置
    for (let i = 0; i < leafCount; i++) {
        const leaf = document.createElement("div");
        leaf.classList.add("p-top-kv__leaf");

        // ランダム値 （サイズ・位置・回転）
        const size = Math.floor(Math.random() * (MAX_SIZE - MIN_SIZE + 1)) + MIN_SIZE;
        const top = Math.random() * 100;
        const left = Math.random() * 100;
        const delay = Math.random() * 3;
        const rot = Math.random() * 360;

        // 配置位置
        leaf.style.top = `${top}%`;
        leaf.style.left = `${left}%`;
        leaf.style.animationDelay = `${delay}s`;
        leaf.style.setProperty("--rot", `${rot}deg`);

        // SVG生成
        leaf.innerHTML = `
            <svg viewBox="0 0 24 24" width="${size}" height="${size}" fill="currentColor">
                <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z" />
                <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12" />
            </svg>
        `;

        // コンテナに追加
        container.appendChild(leaf);
    }
};
