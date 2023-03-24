const inputs = document.querySelectorAll(".input");
const button = document.querySelector(".login_button")



const handleFocus = ({target}) =>{
    const span = target.previousElementSibling;
    span.classList.add("span-active");
}

const handleFocusOut = ({target}) =>{
    if(target.value === ""){
    const span = target.previousElementSibling;
    span.classList.remove("span-active");
    }
}

const handleChange = () =>{
    const [usuario, senha] = inputs;
    
    if(usuario.value.length>1 && senha.value.length>= 8){
        
    } 
    else {
        button.setAttribute('disabled', '');
    }
}


inputs.forEach((input) => input.addEventListener('focus', handleFocus));
inputs.forEach((input) => input.addEventListener('focusout', handleFocusOut));
inputs.forEach((input) => input.addEventListener('input', handleChange));

// Esilizando atributo de validação do formulário manualmente
