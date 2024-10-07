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
}