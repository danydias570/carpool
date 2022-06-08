const body = document.querySelector('body');
const navigation = document.querySelector('.inner-header');
const animHeader = document.querySelector('.anim-header');

window.addEventListener('scroll', ()=>{
    if(window.scrollY > 30){
        navigation.classList.add('anim-header');
    } else {
        navigation.classList.remove('anim-header');
    }
});