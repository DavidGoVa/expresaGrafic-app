let coincide = false;
let esjci = false;
document.addEventListener('DOMContentLoaded', function() {
    let nombre = document.getElementById("nombre");
    let apa = document.getElementById("ap_paterno");
    let ama = document.getElementById("ap_materno");
    let area = document.getElementById("areaT");
    let glI = document.getElementById("global_id");
    let pass = document.getElementById("password");
    let cpass = document.getElementById("confirmarpassword");
    let boton =  document.getElementById("subir");
    let noc =  document.getElementById("divnoc");
    let mail = document.getElementById("email");
    let wmail = document.getElementById("divwmail");
    

    cpass.disabled = true;

    function pcc(){
        if(pass.value != ''){
            cc();
            cpass.disabled = false;
        }else{
            cc();
            cpass.disabled = true;
        }
        verB();
    }

    //console.log(document.getElementById("areaT").options[document.getElementById("areaT").selectedIndex].value);
    
        
    

    function wm(){
        if(mail.value.endsWith("@jci.com")){
            esjci = true;
            mail.style.boxShadow = "0 0 0 .2rem rgba(78,115,223,.25)";
            wmail.style.display = "none";
            
        }else{
            esjci = false;
            mail.style.boxShadow = "0 0 0 .2rem rgba(255, 0, 0, .65)";
            wmail.style.display = "block";
        }
        verB();
    }

    function cc(){
        if(pass.value != cpass.value){
            cpass.style.boxShadow = "0 0 0 .2rem rgba(255, 0, 0, .65)";
            noc.style.display = "block";
            coincide = false;
        }else{
            cpass.style.boxShadow = "0 0 0 .2rem rgba(78,115,223,.25)";
            noc.style.display = "none";
           coincide = true;
        }
        verB();
    }

    function verB(){

        if(nombre.value == '' || apa.value == '' || ama.value == '' || area.options[area.selectedIndex].value == "macaco" || glI.value == '' || pass.value == '' || cpass.value == '' || mail.value == '' || coincide == false || esjci ==false){
            boton.value = "Introduce Todos los Datos";
            boton.disabled = true;
        }else{
            boton.value = "Registrarme";
            document.getElementById("subir").disabled = false;
        }

    }

    verB();

    document.getElementById("nombre").oninput = verB;
   
    

    document.getElementById("ap_paterno").oninput = verB;

    document.getElementById("ap_materno").oninput = verB;

    document.getElementById("areaT").onchange = verB;

    document.getElementById("global_id").oninput = verB;

   
    document.getElementById("password").oninput = pcc;

  
    document.getElementById("confirmarpassword").oninput = cc;

    document.getElementById("email").oninput = wm;
    });

