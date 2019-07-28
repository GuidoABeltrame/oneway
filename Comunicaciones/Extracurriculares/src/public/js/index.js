document.getElementById('btn_enviar').addEventListener("click",function(){

  let strCorreo = document.getElementById("email").value;
  let strNombre = document.getElementById("nombreCliente").value;
  let strAlumno = document.getElementById("nombreAlumno").value;
  let strCurso = document.getElementById("cursoAlumno").value;
  let centroCheck = document.getElementById("centro_radio").checked;
  let belCheck = document.getElementById("belgrano_radio").checked;
  let barrioCheck = document.getElementById("barrio_radio").checked;
  // servicios
  let ch1 = document.getElementById("ch1").checked;
  let ch2 = document.getElementById("ch2").checked;
  let ch3 = document.getElementById("ch3").checked;
  let ch4 = document.getElementById("ch4").checked;
  let ch5 = document.getElementById("ch5").checked;
  let ch6 = document.getElementById("ch6").checked;
  let ch7 = document.getElementById("ch7").checked;
  let ch8 = document.getElementById("ch8").checked;

  let strMensaje = document.getElementById("coments").value;

  function convertirCheck(check){
    if(check == 1){
      check = "X";
    }else{
      check = "";
    };
    return check;
  }

  if(
    strCorreo != "" &&
    strNombre != "" &&
    strAlumno != "" &&
    strCurso  != ""
  ){
    ch1 = convertirCheck(ch1);
    ch2 = convertirCheck(ch2);
    ch3 = convertirCheck(ch3);
    ch4 = convertirCheck(ch4);
    ch5 = convertirCheck(ch5);
    ch6 = convertirCheck(ch6);
    ch7 = convertirCheck(ch7);
    ch8 = convertirCheck(ch8);
    centroCheck = convertirCheck(centroCheck);
    belCheck = convertirCheck(belCheck);
    barrioCheck = convertirCheck(barrioCheck);
    let datos = {
      c: strCorreo,
      n: strNombre,
      a: strAlumno,
      cu: strCurso,
      cent: centroCheck,
      belg: belCheck,
      bp: barrioCheck,
      ch1,
      ch2,
      ch3,
      ch4,
      ch5,
      ch6,
      ch7,
      ch8,
      m: strMensaje
    };
    // Le envio los datos al servidor por Axios a traves de una Promise
    axios.post('/',datos)
    .then(function(response){
      // Si mando correctamente los datos, limpio el formulario
      document.getElementById("email").value = "";
      document.getElementById("nombreCliente").value = "";
      document.getElementById("nombreAlumno").value = "";
      document.getElementById("cursoAlumno").value = "";
      document.getElementById("centro_radio").checked = 0;
      document.getElementById("barrio_radio").checked = 0;
      document.getElementById("belgrano_radio").checked = 0;
      document.getElementById("ch1").checked = 0;
      document.getElementById("ch2").checked = 0;
      document.getElementById("ch3").checked = 0;
      document.getElementById("ch4").checked = 0;
      document.getElementById("ch5").checked = 0;
      document.getElementById("ch6").checked = 0;
      document.getElementById("ch7").checked = 0;
      document.getElementById("ch8").checked = 0;
      document.getElementById("coments").value = "";
      document.getElementById("email").focus();
      window.scrollTo(0,0);
      alert("El envio fue exitoso, si tenes otro hijo podes volver a completar el formulario");
    }).catch(function(error){
      console.log(error);
    });

  }else{
    alert("Por favor rellenar todos los campos");
  }

});
