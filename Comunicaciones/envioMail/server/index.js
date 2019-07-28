// Se declara la variable para manejar el mailer
var nodemailer = require('nodemailer');

// Se genera la conexion con el servidor
var transporter = nodemailer.createTransport({
  service: 'gmail',
  auth: {
    // Indicar usuario y contraseña
    user: 'guidoagustinbeltrame@gmail.com',
    pass: 'gbeltrame12'
  }
});

// Opciones para el envio de correo
var mailOptions = {
  from: 'guidoagustinbeltrame@gmail.com',
  to: 'guidoagustinbeltrame@gmail.com',
  subject: 'Enviando un mensaje usando nodejs',
  text: 'Mensaje enviado correctamente'
}

// Se envia el correo
transporter.sendMail(mailOptions, function(error,info){
  // Valida que no haya habido error
  if(error){
    // Despliega el mensaje de error
    console.log(error);
  }else{
    // Mensaje enviado correctamente
    console.log('El mensaje ha sido enviado: '+ info.response);
  }
});
