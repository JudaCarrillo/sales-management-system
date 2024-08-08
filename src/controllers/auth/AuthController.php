<?php
require_once __DIR__ . '/../../models/maintenance/Employees.php';

class AuthController
{
    private $db;

    public function __construct()
    {
        $this->db = new Employees();
    }

    public function login($user, $password)
    {
        // Validar y sanitizar la entrada
        $user = htmlspecialchars(trim($user));
        $password = htmlspecialchars(trim($password));

        $userData = $this->db->login($user, $password);
        if ($userData) {
            // Iniciar sesión y almacenar los datos del usuario
            session_start();
            $_SESSION['user_id'] = $userData['id'];
            $_SESSION['user_name'] = $userData['name'];

            // Redirigir a la página de inicio o al dashboard
            header('Location: /home.php');
            exit();
        } 
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: /index.php');
        exit();
    }
}
