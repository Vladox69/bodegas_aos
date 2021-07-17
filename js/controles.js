const formulario = document.getElementById("formulario");
const inputs = document.querySelectorAll('#formulario input');
const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	password: /^.{4,12}$/, // 4 a 12 digitos.
}

const campos = {
    usuario : false,
    password : false
}

const validarCampo = (expresion, input, campo) =>{
    if( expresion.test(input.value) ){
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        campos[campo ] = true;
    }else{
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos[campo ] = false;
    } 
}

const validarFormulario = (e) =>{
    switch(e.target.name){
        case 'nombre':
            validarCampo(expresiones.usuario, e.target,  'usuario');
            break;
        case 'contra':
            validarCampo(expresiones.password, e.target,  'password');
            break;
    }
}

inputs.forEach( (input) =>{
    input.addEventListener( "keyup", validarFormulario);
    input.addEventListener( "blur", validarFormulario);
} );

formulario.addEventListener('submit', (e) => {
	if(campos.usuario && campos.password ){
        //formulario.setAttribute("action","http://localhost/bodegas/models/consumoServicioLogin.php");
        //formulario.reset();
	} else {
        e.preventDefault();
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
	}
});

//vista password
const eye = document.getElementById("ojo");
const contra = document.getElementById("password");
eye.addEventListener( "click", ()=>{
    if( contra.type == 'password' ){
        contra.type = 'text';
    }else{
        contra.type = 'password';
    } 
} );


