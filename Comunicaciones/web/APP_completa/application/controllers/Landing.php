<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	public function index(){

		//print_r('hola'); die();
		$data['title'] = "AyS";
		$data['head'] = $this->load->view('landing/modules/head', $data, TRUE);

		$data['footer'] = $this->load->view('landing/modules/footer', $data, TRUE);

		$this->load->view('landing/main_view',$data);

	}

	function sendContact(){

		$response = array();

		$data = array(
			'name' => $this->input->post('name'),
			'last' => $this->input->post('last'),
			'mail' => $this->input->post('mail'),
			'tel' => $this->input->post('tel'),
			'local' => $this->input->post('local')
		);

		if( $data['name'] != "" || $data['mail'] != "" || $data['tel'] != "" ){
			//if( count($data['info']) > 0 ){
				$this->sendEmail( $data );
				$response['type'] = "success";
				$response['text'] = "Se ha enviado tu información, por favor espera y nosotros te contactaremos";
			/*}else{
				$response['type'] = "error";
				$response['text'] = "Debes seleccionar al menos una opción";
			}*/
		}else{
			$response['type'] = "error";
			$response['text'] = "Todos los datos deben de estar completos";
		}
		echo json_encode($response);

	}

	function sendEmail( $data ){
		$destinatario = "soluciones@aysalarmas.com.ar"; 
		$asunto = "Contacto AyS"; 

		$html = '<!DOCTYPE html>
            <html>
            <head lang="es-mx">
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <title>Contacto | AyS</title>
                <style>
                    /* Column Drop Layout Pattern CSS */
                    @media only screen and (max-width: 450px) {
                        td[class="column"] {
                            display: block;
                            width: 100%;
                            -moz-box-sizing: border-box;
                            -webkit-box-sizing: border-box;
                            box-sizing: border-box;
                        }
                    }
                </style>
            </head>
            <body>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="column" width="600" colspan="2" align="center" valign="top" style="padding: 10px 20px 20px 20px; font-family: arial,sans-serif; font-size: 14px; line-height: 18px; color: #000001;">
							<p>Contacto enviado desde <br> 
								<a href="http://www.golcoastrealstate.com/" style="color:rgb(79,79,79);text-decoration:none">www.aysalarmas.com.ar</a>
							</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="column" width="600" colspan="2" align="center" valign="top" style="padding: 10px 20px 20px 20px; font-family: arial,sans-serif; font-size: 14px; line-height: 18px; color: #000001;">
                            <h2 style="border: 0;">Información de contacto</h2>
                            <p style="font-size:12px">'.$data['name'].' '.$data['last'].'</p>
                            <p style="font-size:12px">'.$data['mail'].'</p>
                            <p style="font-size:12px">'.$data['tel'].'</p>
                            <p style="font-size:12px">'.$data['local'].'</p>';

		$html .= '
                        </td>
					</tr>
					<tr>
                        <td class="column" width="600" colspan="2" align="center" valign="top" style="padding: 10px 20px 20px 20px; font-family: arial,sans-serif; font-size: 14px; line-height: 18px; color: #000001;">
							<a href="'.base_url().'"><img src="'.base_url('images/ays.png').'" alt="ays"></a>
                        </td>
                    </tr>
                </table>
            </body>
            </html>
        ';

		//para el envío en formato HTML 
		$headers = "MIME-Version: 1.0\r\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

		//dirección del remitente
		$headers .= "From: Contacto AyS <soluciones@aysalarms.com.ar>\r\n";

		//direcciones que recibián copia 
		$headers .= "Cc: aysalarmassoluciones@gmail.com\r\n"; 

		mail( $destinatario, $asunto, $html, $headers );
	}

}
