<?php
declare(strict_types=1);

namespace Controllers;

use Core;

class LoginController extends Core\AbstractController
{
    /**
     * Login page.
     * 
     * @return void
     */
    public function index(): void
    {
        if ($this->isUserLoggedIn()) {
            $this->redirect('/');
        }
        $error = $_SESSION['auth_error'] ?? '';
        unset($_SESSION['auth_error']);

        $this->view('login', ['error' => $error]);
    }
}