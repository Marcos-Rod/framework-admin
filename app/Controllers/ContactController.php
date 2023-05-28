<?php

namespace App\Controllers;

use App\Functions;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(){
        $metas = [
            'title' => 'Contacto - Tu empresa',
            'description' => '',
            'slug' => 'contacto',
            'file' => 'contacto',
        ];

        return $this->view('assets.template', compact('metas'));
    }

    public function store(){
        $data = $_POST;
        $data['create_at'] = Functions::hoy();
        $data['update_at'] = Functions::hoy();

        $model = new Contact;

        $model->create($data);

        try {
            $this->send($data);
        } catch (\Throwable $th) {
            echo 'No se puede enviar el correo';
        } 

        return $this->redirect('/contacto?status=success');
    }

    public function send($data)
    {
        $data['subject'] = 'Contacto desde formulario';

        $mail = new MailController;
        $mail->destinatario = 'Tu correo para recibir los leads';
        $mail->body = '
            <table align="center" width="600">
                <tr>
                    <td style="text-align:center;background:#C0303A;padding:10px 0;border-bottom:2px solid #C0303A;">
                        <a href="tu sitio" class="logo"><img src="tu logo" alt="" id="cambioLogo" width="150"/></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>&nbsp;</p>
                        <h4 style="text-align:center;">Los datos que dejó fuerón los siguientes</h4>
                        <ul>
                            <li>Nombre: ' . $data['name'] . '</li>
                            <li>Correo: ' . $data['mail'] . '</li>
                            <li>WhatsApp: ' . $data['phone'] . '</li>
                            <li>Mensaje: ' . $data['comments'] . '</li>
                        </ul>
                        <p>&nbsp;</p>
                    </td>
                </tr>
                <tr>
                    <td style="border-top:2px solid #C0303A;padding-top:10px;">
                        <p style="text-align:center;"><a href="tu sitio">tu dominio</a></p>
                    </td>
                </tr>
            </table>
        ';

        if(!$mail->sendMail($data))
            return $this->redirect('/contacto?status=error');
        
        return $this->redirect('/contacto?status=success');
    }
}
