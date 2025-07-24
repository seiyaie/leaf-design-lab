# Webサイト：Leaf Design Lab　UI Components

## 概要

架空のデザイン会社「Leaf Design Lab」のために制作した、Web UI コンポーネントのデモサイトです。  
モダンな開発環境と Vanilla JavaScript による構成で、実務でも活用できる再利用可能な UI コンポーネントの実装に取り組みました。

本サイトは、デザイン、設計、実装まで一貫して自身で担当しました。


## URL

https://portfolio.itsseiya.com/photographer-yamada-taro/

## 使用技術


- HTML5 / CSS3（SCSS）
- JavaScript（ES Modules）
- Web Animations API
- Intersection Observer API
- Splide.js

  
## 主なコンポーネント

- **ハンバーガーメニュー**（`<dialog>`を活用した開閉制御・背景クリックやESCキー対応）
- **ドロップダウンメニュー**（ビューポート768px以下はハンバーガーメニュー内、以上はheaderに配置）
- **スライダー**（Splide.js を使用）
- **アコーディオン**（`<details>`＋Web Animations APIでアニメーション）
- **タブメニュー**（aria属性にも配慮したUI構成）
- **モーダル（ダイアログ）**（オーバーレイ付きの独自実装）

## 工夫した点

- **Web Animations API** を使用して、ハンバーガーメニューやドロップダウン、アコーディオン、モーダルなどの UI コンポーネントにスムーズなアニメーションを実装
- JavaScript を **機能単位でモジュール化** し、保守性と拡張性を考慮した設計
- **ドロップダウンメニュー・アコーディオン** を Vanilla JS + `scrollHeight` + `animate()` を組み合わせて柔軟に開閉
- **ハンバーガーメニュー** では `<dialog>` 要素を使い、キーボード操作・画面外クリック・リサイズ対応などのアクセシビリティも考慮
- **IntersectionObserver** を使って、スクロールに連動してヘッダーのアニメーションや表示制御を最適化
- **Splide.js** を導入し、レスポンシブ対応かつカスタマイズ可能なカルーセルを実装
- **Vanilla JSによるモーダル実装**：ボタンクリックでモーダル表示

---

