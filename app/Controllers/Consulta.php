<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Codeigniter\HTTP\RedirectResponse;
use Codeigniter\HTTP\ResponseInterface;
use App\Models\ConsultaModel;

class Consulta extends BaseController{

    public function consultas(): string
    {
        $data['titulo'] = "consultas";
        return view('plantillas/header_view', $data).view('plantillas/navbar_view').view('contenido/consultas').view('plantillas/footer_view');
    }

    public function enviar_consulta(): RedirectResponse | ResponseInterface
    {
        print_r($_POST);
        
        $rules = [
            'titulo' => 'required',
            'correo' => 'required',
            'contenido' => 'required',
        ];

        if($this->validate($rules)){
            $consulta = new ConsultaModel();
            $consulta->save([
                'TITULO' => $this->request->getVar('titulo'),
                'CORREO' => $this->request->getVar('correo'),
                'CONTENIDO' => $this->request->getVar('contenido'),
            ]);

            session()->setFlashdata('success', 'Su consulta se envio');
            return $this->response->redirect(base_url('login'));
        }

        return redirect()->to('/');
    }


}