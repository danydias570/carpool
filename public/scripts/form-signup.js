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
    * VERIFICATION EMAIL
    */
     let emailRegExp = new RegExp(
        '^[a-zA-Z0-9.-_]+[@]{1}[a-zA-Z0-9.-_]+[.]{1}[a-z]{2,10}$'
    );
    let testEmail = emailRegExp.test(inputs['user_email'].value);

    /**
    * VERIFICATION MOT DE PASSE
    */
    let erreur = 0;
    if(inputs['user_mdp'].value.length < 8){
        erreur ++;
    }
    if(!/[A-Z]/.test(inputs['user_mdp'].value)){
        erreur ++;
    }
    if(!/[a-z]/.test(inputs['user_mdp'].value)){
        erreur ++;
    }
    if(!/[0-9]/.test(inputs['user_mdp'].value)){
        erreur ++;
    }

    /**
    * VERIFICATION PRÉNOM, NOM, CONFIRMATION MOT DE PASSE
    */
    if(inputs['confirmed_mdp'].value != inputs['user_mdp'].value 
    || !inputs['user_firstName'].value.match(/^([a-zA-Z ]+)$/)
    || !inputs['user_lastName'].value.match(/^([a-zA-Z ]+)$/)
    || erreur >= 1 || testEmail == false)
    {
        inputs['submit'].setAttribute('disabled', "");
        inputs['submit'].classList.remove('notDisabled');
    }
    if(inputs['confirmed_mdp'].value == inputs['user_mdp'].value 
    && inputs['user_firstName'].value.match(/^([a-zA-Z ]+)$/)
    && inputs['user_lastName'].value.match(/^([a-zA-Z ]+)$/)
    && erreur == 0
    && testEmail == true)
    {
        inputs['submit'].removeAttribute('disabled');
        inputs['submit'].classList.add('notDisabled');
    }
}


$(document).ready(function(){
    /**
    * VERIFICATION PRÉNOM
    */
    $('input[name="user_firstName"]').on("input", function(){
        
        if(!this.value.match(/^([a-zA-Z ]+)$/)){
            $('label[for="user_firstName"]').html('Caractères alphabétique uniquement');
        }
        if(this.value.match(/^([a-zA-Z ]+)$/)){
            $('label[for="user_firstName"]').html('');
        }
    })

    /**
    * VERIFICATION NOM
    */
    $('input[name="user_lastName"]').on("input", function(){

        if(!this.value.match(/^([a-zA-Z ]+)$/)){
            $('label[for="user_lastName"]').html('Caractères alphabétique uniquement');
        }
        if(this.value.match(/^([a-zA-Z ]+)$/)){
            $('label[for="user_lastName"]').html('');
        }
    })

    /**
    * VERIFICATION MOT DE PASSE
    */
     $('input[name="user_mdp"]').on("input", function(){
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
            $('label[for="user_mdp"]').html('Au moins 1 chiffre, 1 majuscule et 8 caractères.');
            $('label[for="user_mdp"]').addClass("error-active");
        }
        if(erreur == 0){
            $('label[for="user_mdp"]').html('Au moins 1 chiffre, 1 majuscule et 8 caractères.');
            $('label[for="user_mdp"]').removeClass("error-active");
        }
    })

    /**
    * VERIFICATION CONFIRMATION MOT DE PASSE
    */
     $('input[name="confirmed_mdp"]').on("input", function(){
        
        if(this.value != inputs['user_mdp'].value){
            $('label[for="confirmed_mdp"]').html('Les mots de passes ne correspondent pas');
        }
        if(this.value == inputs['user_mdp'].value){
            $('label[for="confirmed_mdp"]').html('');
        }
    })
})