
const cantidad = document.getElementById("cant");

const expresiones = {
	cantidad:/^\d{1,5}$/ // 1 a 5 numeros.
}

const campos = {
    nd : false,
    cantP : true
}

const validar = () =>  {
    if( expresiones.cantidad.test(cantidad.value) ){
        document.getElementById("error").classList.remove("formulario__input-error-activo");
        document.getElementById("error").classList.add("formulario__input-error");
        campos[cantP] = true;
    }else{
        document.getElementById("error").classList.remove("formulario__input-error");
        document.getElementById("error").classList.add("formulario__input-error-activo");
        campos[cantP] = false;
        //console.log("jkd");
    }
    //console.log("jkd");
}
cantidad.addEventListener( "keyup", validar );

//enviar
const formulario =document.getElementById("ff");
const send =document.getElementById("enviar");
const validarCampo = (e) =>{
    if( cantidad.value === '' || cantP == false){
        e.preventDefault();
    }else{
        send.type="text";
    }
}
 
formulario.addEventListener("submit", validarCampo);

