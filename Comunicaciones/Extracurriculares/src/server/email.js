const nodemailer = require("nodemailer");


// Creo un objeto Email para instanciar el transporte y capturar su error
class Email{
  constructor(oConfig){
    this.createTransport = nodemailer.createTransport(oConfig);
  }
  enviarCorreo(oEmail){
    try{
      this.createTransport.sendMail(oEmail,function(error){
        if(error){
          console.log("Error al enviar el email");
          console.log(error);
        }else{
          console.log("Email enviado correctamente");
        }
      })
      }catch(x){
      console.log("Email.enviarCorreo -- Error -- "+x);
    }
  }
}

module.exports = Email;
