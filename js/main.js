"use strict";

{
  const sidebar = document.querySelector('.l-sidebar');
  const spMenu = document.querySelector('.p-sp-menu-background');

  document.querySelector('.p-header-menu').addEventListener('click', () => {
    sidebar.classList.add('show');
    spMenu.classList.add('show');
  });

  document.querySelector('.p-menu-close').addEventListener('click', () => {
    sidebar.classList.remove('show');
    spMenu.classList.remove('show');
  });

  document.addEventListener('DOMContentLoaded', function () {
    // 全てのp-box--information要素を取得
    const infoBoxes = document.querySelectorAll('.p-box--information');
    
    // 全てのp-box-contents-link要素を取得
    const linkBoxes = document.querySelectorAll('.p-box-contents-link');
    
    if (infoBoxes.length && linkBoxes.length) {
      // 各要素に対してResizeObserverを適用
      infoBoxes.forEach((infoBox, index) => {
        const linkBox = linkBoxes[index];

        if (linkBox) {
          // ResizeObserverを使用して高さを監視
          const resizeObserver = new ResizeObserver(() => {
            const infoBoxHeight = infoBox.clientHeight;
            linkBox.style.height = infoBoxHeight + 'px';
          });

          // 監視を開始
          resizeObserver.observe(infoBox);
        }
      });
    }
  });
}