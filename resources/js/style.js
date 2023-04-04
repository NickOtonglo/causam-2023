let navMenuToggle, navMenu, navMenuItem

if (document.querySelector('#navMenuToggle')) {
    navMenuToggle = document.querySelector('#navMenuToggle')
    navMenuToggle.addEventListener('click', () => {
        toggleMenu()
    })
}

if (document.querySelector('#navMenu')) {
    navMenu = document.querySelector('#navMenu')
}

if (document.querySelectorAll('#navMenu li')) {
    navMenuItem = document.querySelectorAll('#navMenu li')
    navMenuItem.forEach(i => i.addEventListener('click', () => {
        closeMenu()
    }))
}

function toggleMenu() {
    if (window.getComputedStyle(navMenu).display === 'none') {
        openMenu()
    } else if (window.getComputedStyle(navMenu).display !== 'none') {
        closeMenu()
    }
}

function closeMenu() {
    navMenu.style.display = 'none'
}

function openMenu() {
    navMenu.style.display = 'unset'
}