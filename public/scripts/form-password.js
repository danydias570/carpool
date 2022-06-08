const inputs = document.forms['form'];
const closeye = document.querySelector('#closeye');
const eye = document.querySelector('#eye');

eye.addEventListener('click', ()=>{
    inputs['newuser_mdp'].type = 'text';
    eye.style.display = 'none';
    closeye.style.display = 'block';
})

closeye.addEventListener('click', ()=>{
    inputs['newuser_mdp'].type = 'password';
    closeye.style.display = 'none';
    eye.style.display = 'block';
})

const confirmed_closeye = document.querySelector('#confirmed_closeye');
const confirmed_eye = document.querySelector('#confirmed_eye');

confirmed_eye.addEventListener('click', ()=>{
    inputs['confirmed_mdp'].type = 'text';
    confirmed_eye.style.display = 'none';
    confirmed_closeye.style.display = 'block';
});

confirmed_closeye.addEventListener('click', ()=>{
    inputs['confirmed_mdp'].type = 'password';
    confirmed_closeye.style.display = 'none';
    confirmed_eye.style.display = 'block';
});

function isEmpty(){
    /**
    * VERIFICATION MOT DE PASSE
    */
    let erreur = 0;
    if(inputs['newuser_mdp'].value.length < 8){
        erreur ++;
    }
    if(!/[A-Z]/.test(inputs['newuser_mdp'].value)){
        erreur ++;
    }
    if(!/[a-z]/.test(inputs['newuser_mdp'].value)){
        erreur ++;
    }
    if(!/[0-9]/.test(inputs['newuser_mdp'].value)){
        erreur ++;
    }

    /**
    * VERIFICATION CONFIRMATION MOT DE PASSE ET SUBMIT
    */
    if(inputs['confirmed_mdp'].value != inputs['newuser_mdp'].value || erreur >= 1){
        inputs['submit'].setAttribute('disabled', "");
        inputs['submit'].classList.remove('notDisabled');
    } 
    if(inputs['confirmed_mdp'].value == inputs['newuser_mdp'].value && erreur == 0){
        inputs['submit'].removeAttribute('disabled');
        inputs['submit'].classList.add('notDisabled');
    }
}

$(document).ready(function(){
    /**
    * VERIFICATION MOT DE PASSE
    */
     $('input[name="newuser_mdp"]').on("input", function(){
        let erreur = 0;

        if(this.value.length < 8){
            erreur ++;
        }
        if(!/[A-Z]/.test(this.value)){
            erreur ++;
        }
        if(!/[a-z]/.test(this.value)){
            erreur ++;
        }
        if(!/[0-9]/.test(this.value)){
            erreur ++;
        }
        if(erreur >= 1){
            $('label[for="newuser_mdp"]').html('Au moins 1 chiffre, 1 majuscule et 8 caractères.');
            $('label[for="newuser_mdp"]').addClass("error-active");
        }
        if(erreur == 0){
            $('label[for="newuser_mdp"]').html('Au moins 1 chiffre, 1 majuscule et 8 caractères.');
            $('label[for="newuser_mdp"]').removeClass("error-active");
        }
    })

    /**
    * VERIFICATION CONFIRMATION MOT DE PASSE
    */
     $('input[name="confirmed_mdp"]').on("input", function(){
        
        if(this.value != inputs['newuser_mdp'].value){
            $('label[for="confirmed_mdp"]').html('Les mots de passes ne correspondent pas');
        }
        if(this.value == inputs['newuser_mdp'].value){
            $('label[for="confirmed_mdp"]').html('');
        }
    })
})