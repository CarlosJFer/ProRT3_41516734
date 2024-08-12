<?php
namespace App\Controllers;
Use App\Models\usuario_Model;
use CodeIgniter\Controller;

class login_controller extends BaseController {

    public function index()
    {
        helper(['form', 'url']);

        $dato['titulo'] = 'Ingresar';
        echo view('front/head_view', $dato);
        echo view('front/navbar_view');
        echo view('Back/usuario/login');
        echo view('front/footer_view');
    }

    public function auth()
    {
        $session = session();
        $model = new usuario_Model();

        // Traemos los datos del formulario
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('pass');

        $data = $model->where('email', $email)->first();
        if ($data) {
            $pass = $data['pass'];
            $ba = $data['baja'];
            if ($ba == 'SI') {
                $session->setFlashdata('msg', 'Usuario dado de baja');
                return redirect()->to('login');
            }

            // Se verifican los datos ingresados para iniciar, si cumple la verificación inicia la sesión
            $verify_pass = password_verify($password, $pass);
            // password_verify determina los requisitos de configuración de la contraseña
            if ($verify_pass) {
                $ses_data = [
                    'id_usuario' => $data['id_usuario'],
                    'nombre' => $data['nombre'],
                    'apellido' => $data['apellido'],
                    'email' => $data['email'],
                    'usuario' => $data['usuario'],
                    'perfil_id' => $data['perfil_id'],
                    'logged_in' => TRUE
                ];
                // Si se cumple la verificación se inicia la sesión
                $session->set($ses_data);

                session()->setFlashdata('msg', 'Bienvenido a PixelHost');
                return redirect()->to('/panel');
                // return redirect()->to('/prueba');//paginaprincipal
            } else {
                // No pasó la validación de la contraseña
                $session->setFlashdata('msg', 'Contraseña incorrecta');
                return redirect()->to('login');
            }
        } else {
            $session->setFlashdata('msg', 'No existe ese correo electrónico o es incorrecto, por favor verifique');
            return redirect()->to('login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('principal');
    }
}



