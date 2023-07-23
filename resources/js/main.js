const headerMenuBtn = document.querySelectorAll('.toggle-menu')
const mobileMenu = document.querySelector('.header-m')
for (let i = 0; i < headerMenuBtn.length; i++) {
    headerMenuBtn[i].addEventListener('click', function() {
        toggleMobileMenu()
        // bodyScrollLock.disableBodyScroll(mobileMenu);
    })
}

function toggleMobileMenu() {
    for (let i = 0; i < headerMenuBtn.length; i++) {
        headerMenuBtn[i].classList.toggle('open')
    }
    mobileMenu.classList.toggle('active')
}
