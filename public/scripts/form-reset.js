const inputs = document.forms['form'];

function isEmpty(){
    /**
    * VERIFICATION EMAIL
    */
    let emailRegExp = new RegExp(
        '^[a-zA-Z0-9.-_]+[@]{1}[a-zA-Z0-9.-_]+[.]{1}[a-z]{2,10}$'
    );
    let testEmail = emailRegExp.test(inputs['user_email'].value);

    /**
    * VERIFICATION SUBMIT
    */
     if(testEmail == false){
        inputs['submit'].setAttribute('disabled', "");
        inputs['submit'].classList.remove('notDisabled');
    }
    if(testEmail == true){
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
})