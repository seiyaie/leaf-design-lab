
export const initAccordion = () => {
    // query selectors
    const details = document.querySelectorAll(".js-accordion-details");

    if (!details.length) return;

    details.forEach((el) => {
        const summary = el.querySelector(".js-accordion-summary");
        const content = el.querySelector(".js-accordion-content");

        if (!summary || !content) return;


        summary.addEventListener("click", (e) => {
            e.preventDefault();

            //アニメーション中の場合は処理を中断
            if (el.dataset.isAnimation === "true") {
                return;
            }

            const currentHeight = content.scrollHeight + "px";

            // openingKeyframes
        const openingKeyframes = {
          height: [0, currentHeight],
          opacity: [0, 1],
      };

      const closingKeyframes = {
          height: [currentHeight, 0],
          opacity: [1, 0],
      };

      const options = {
          duration: 300,
          easing: "linear",
          fill: "forwards",
      };

            if (el.open) {
              el.dataset.isAnimation = "true";
              const closeAnimation = content.animate(closingKeyframes, options);
              closeAnimation.onfinish = () => {
                el.removeAttribute('open');
                el.dataset.isAnimation = "false";
              };
            } else {
              el.setAttribute("open", "")
              el.dataset.isAnimation = "true";

              const openAnimation = content.animate(openingKeyframes, options);
              openAnimation.onfinish = () => {
                el.dataset.isAnimation = "false";
              };
            }
        });
    });
};
