const inputs = document.forms['form'];
const closeye = document.querySelector('#closeye');
const eye = document.querySelector('#eye');

eye.addEventListener('click', ()=>{
    inputs['user_mdp'].type = 'text';
    eye.style.display = 'none';
    closeye.style.display = 'block';
})

closeye.addEventListener('click', ()=>{
    inputs['user_mdp'].type = 'password';
    closeye.style.display = 'none';
    eye.style.display = 'block';
})

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
    * VERIFICATION SUBMIT
    */
    if(erreur >= 1 || testEmail == false){
        inputs['submit'].setAttribute('disabled', "");
        inputs['submit'].classList.remove('notDisabled');
    }
    if(erreur == 0 && testEmail == true){
        inputs['submit'].removeAttribute('disabled');
        inputs['submit'].classList.add('notDisabled');
    }
}


$(document).ready(function(){
    /**
    * VERIFICATION EMAIL
    */
    let emailRegExp = new RegExp(
        '^[a-zA-Z0-9.-_]+[@]{1}[a-zA-Z0-9.-_]+[.]{1}[a-z]{2,10}$'
    );

    $('input[name="user_email"]').on("input", function(){
        let testEmail = emailRegExp.test(this.value);
        if(testEmail == false){ 
            $('label[for="user_email"]').html('Veuillez saisir un email valide: exemple@email.fr');
        }
        if(testEmail){
            $('label[for="user_email"]').html('');
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
        }
        if(erreur == 0){
            $('label[for="user_mdp"]').html('');
        }
    })
})