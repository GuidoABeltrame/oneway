const express = require('express');
const app = express();
const path = require('path');
const email = require('./email.js');
const bodyParse = require("body-parser");
//static files
app.use(express.static(path.join(__dirname,'../public')));
app.use(bodyParse.json());
app.use(bodyParse.urlencoded({extended:true}));

//Instanciando la Clase Email
const oEmail = new email({
  "service":"gmail",
  "auth":{
    "user":"guidoagustinbeltrame@gmail.com",
    "pass":"gbeltrame12"
  }
})

// settings
app.set('port',process.env.PORT || 3000);

// middelwares

//routes
app.get('/',(req,res)=>{
  res.sendFile(path.join(__dirname,'../views/index.html'));
});
app.post('/',function(req,res,next){
  let email = {
    from:req.body.c,
    to: "guidoagustinbeltrame@gmail.com",
    subject: "Nueva Respuesta Actividades Extracurriculares",
    html:
    `
    <div>
    <h3>Cliente</h3>
    <p>Nombre: ${req.body.n}</p>
    <p>Correo: ${req.body.c}</p>
    ----------------
    <h3>Alumno</h3>
    <p>Nombre: ${req.body.a}</p>
    <p>Curso: ${req.body.cu}</p>
    ----------------
    <h3>Recorrido</h3>
    <table style="border: 1px solid black; border-collapse:collapse">
      <tr>
        <th style="text-align: center; border: 1px solid black ;">Centro</th>
        <th style="text-align: center; border: 1px solid black ;">Belgrano</th>
        <th style="text-align: center; border: 1px solid black ;">Barrio Parque</th>
      </tr>
      <tr>
        <td style="text-align: center; border: 1px solid black ;">${req.body.cent}</td>
        <td style="text-align: center; border: 1px solid black ;">${req.body.belg}</td>
        <td style="text-align: center; border: 1px solid black ;">${req.body.bp}</td>
      </tr>
    </table>
    ----------------
    <h3>Servicios</h3>
    <table style="border: 1px solid black; border-collapse:collapse">
      <tr>
        <th style="text-align: center; border: 1px solid black ;">Dia</th>
        <th style="text-align: center; border: 1px solid black ;">Desde Campus 16:30</th>
        <th style="text-align: center; border: 1px solid black ;">Desde Olivos 16:30</th>
      </tr>
      <tr>
        <td style="text-align: center; border: 1px solid black ;">Lunes</td>
        <td style="text-align: center; border: 1px solid black ;">${req.body.ch1}</td>
        <td style="text-align: center; border: 1px solid black ;">${req.body.ch2}</td>
      </tr>
      <tr>
        <td style="text-align: center; border: 1px solid black ;">Martes</td>
        <td style="text-align: center; border: 1px solid black ;">${req.body.ch3}</td>
        <td style="text-align: center; border: 1px solid black ;">${req.body.ch4}</td>
      </tr>
      <tr>
        <td style="text-align: center; border: 1px solid black ;">Miercoles</td>
        <td style="text-align: center; border: 1px solid black ;">${req.body.ch5}</td>
        <td style="text-align: center; border: 1px solid black ;">${req.body.ch6}</td>
      </tr>
      <tr>
        <td style="text-align: center; border: 1px solid black ;">Jueves</td>
        <td style="text-align: center; border: 1px solid black ;">${req.body.ch7}</td>
        <td style="text-align: center; border: 1px solid black ;">${req.body.ch8}</td>
      </tr>
    </table>
    ----------------
    <h3>Comentarios</h3>
    <p>${req.body.m}</p>
    </div>

    `
  }
  oEmail.enviarCorreo(email);
  res.send("ok");
});


//listening the server
app.listen(app.get('port'), ()=> {
  console.log('Server on port',app.get('port'));
});
