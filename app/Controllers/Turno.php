<?php

namespace App\Controllers;

use App\Models\UsuarioModel;


/*
Logica de los usuarios y sus registros
*/

class Turno extends BaseController{

    public function turno(): string{
        $data = ['titulo' => 'Turnos'];
        return view('plantillas/header_view', $data).view('plantillas/navbar_view').view('contenido/turnos/turno').view('plantillas/footer_view');
    }

}

?>
