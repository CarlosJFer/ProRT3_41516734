<?php

namespace App\Controllers;

use App\Models\usuario_Model;
use CodeIgniter\Controller;

class usuario_controller extends Controller
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function create()
    {
        $data['titulo'] = 'registro';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/registro');
        echo view('front/footer');
    }

    public function formValidation()
    {
        $rules = [
            'nombre' => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'usuario' => 'required|min_length[3]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'pass' => 'required|min_length[3]|max_length[10]'
        ];

        if (!$this->validate($rules)) {
            $data['titulo'] = 'registro';
            $data['validation'] = $this->validator;
            echo view('front/head_view', $data);
            echo view('front/navbar_view');
            echo view('back/usuario/registro', $data);
            echo view('front/footer');
        } else {
            $formModel = new usuario_Model(); // se crea la instancia del modelo

            $formModel->save([
                'nombre' => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'usuario' => $this->request->getVar('usuario'),
                'email' => $this->request->getVar('email'),
                'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT)
            ]);

            // Mensaje de éxito
            session()->setFlashdata('success', 'Usuario registrado con éxito, inicie sesión para disfrutar de nuestro servicio');
            return $this->response->redirect('login');
        }
    }
}
