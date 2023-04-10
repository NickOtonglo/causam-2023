/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/style.js ***!
  \*******************************/
var navMenuToggle, navMenu, navMenuItem;
if (document.querySelector('#navMenuToggle')) {
  navMenuToggle = document.querySelector('#navMenuToggle');
  navMenuToggle.addEventListener('click', function () {
    toggleMenu();
  });
}
if (document.querySelector('#navMenu')) {
  navMenu = document.querySelector('#navMenu');
}
if (document.querySelectorAll('#navMenu li')) {
  navMenuItem = document.querySelectorAll('#navMenu li');
  navMenuItem.forEach(function (i) {
    return i.addEventListener('click', function () {
      closeMenu();
    });
  });
}
function toggleMenu() {
  if (window.getComputedStyle(navMenu).display === 'none') {
    openMenu();
  } else if (window.getComputedStyle(navMenu).display !== 'none') {
    closeMenu();
  }
}
function closeMenu() {
  navMenu.style.display = 'none';
}
function openMenu() {
  navMenu.style.display = 'unset';
}
/******/ })()
;