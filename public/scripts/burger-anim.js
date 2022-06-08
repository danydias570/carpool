const burgerBtn = document.querySelector('.burgermenu');
const burgerMenu = document.querySelector('.burger-menu');

burgerBtn.addEventListener('click', ()=>{
	burgerBtn.classList.toggle('open');
    burgerMenu.classList.toggle('active');
    body.classList.toggle('stop-scrolling');
});