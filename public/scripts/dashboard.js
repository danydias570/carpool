const navigation = document.querySelector('header');
const triggerMenu = document.querySelector('.profile-picture');
const dropdownMenu = document.querySelector('.dropdown-menu');
const dropdownIcone = document.querySelector('.dropdown-icone');
const modalContainer = document.querySelector(".modal-container");
const modalTriggers = document.querySelectorAll(".modal-trigger");

window.addEventListener('scroll', () => {
    if(window.scrollY > 30){
        navigation.classList.add('anim-header');
        dropdownMenu.classList.add('anim-menu');
    } else {
        navigation.classList.remove('anim-header');
        dropdownMenu.classList.remove('anim-menu');
    }
});

triggerMenu.addEventListener('click', function(){
    dropdownMenu.classList.toggle('active');
    dropdownIcone.classList.toggle('active');
});

modalTriggers.forEach(trigger => trigger.addEventListener("click", ()=>{
  modalContainer.classList.toggle("active");
}));