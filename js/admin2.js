const formulario = document.getElementById("formulario");
const cantidad = document.getElementById("cant");

const expresiones = {
	nombreP: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	cantidad: /^\d{1,5}$/ // 1 a 5 numeros.
}

const campos = {
    nombre : false,
    cantP : false
}

const aux=false;

const validar = () =>  {
    if( expresiones.cantidad.test(cantidad.value) ){
        document.getElementById("error").classList.remove("formulario__input-error-activo");
        document.getElementById("error").classList.add("formulario__input-error");
        aux = true;
    }else{
        document.getElementById("error").classList.remove("formulario__input-error");
        document.getElementById("error").classList.add("formulario__input-error-activo");
        aux = false;
        //console.log("jkd");
    }
    //console.log("jkd");
}
cantidad.addEventListener( "keyup", validar );

//enviar
const send = document.getElementById("enviar");
const validarCampo = (e) =>{
    if( cantidad.value === '' || aux === false){
        
        alert("Error al enviar Datos");
        e.preventDefault();
    }else{
        send.type="text";
    }
}
 
formulario.addEventListener("submit", validarCampo);


//formualrio2
const formulario2 = document.getElementById("formulario2");
const nom = document.getElementById("nom");


const validar2 = () =>  {
    if( expresiones.nombreP.test(nom.value) ){
        document.getElementById("errorN").classList.remove("formulario__input-error-activo");
        document.getElementById("errorN").classList.add("formulario__input-error");
        aux = true;
    }else{
        document.getElementById("errorN").classList.remove("formulario__input-error");
        document.getElementById("errorN").classList.add("formulario__input-error-activo");
        aux = false;
    }
}
nom.addEventListener( "keyup", validar2 );

//enviar
const send2 = document.getElementById("enviarN");
const validarCampo2 = (e) =>{
    if( nom.value === '' || aux === false){
        alert("Error al enviar Datos");
        e.preventDefault();
    }else{
        send2.type="text";
    }
}
 
formulario2.addEventListener("submit", validarCampo2);

