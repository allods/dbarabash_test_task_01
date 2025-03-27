<?php
declare(strict_types=1);

namespace Controllers;

use Core;
use function password_verify;

class AuthController extends Core\AbstractController
{
    /**
     * Login action.
     *
     * @return void
     */
    public function login(): void
    {
        if ($this->isUserLoggedIn()) {
            $this->redirect('/');
        }

        $this->verifyCsrf();

        $user = $this->model('User');
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);
        $userData = $user->load();

        if ($userData && password_verify($_POST['password'], $userData['password'])) {
            $_SESSION['user_id'] = $userData['id'];
            $_SESSION['email'] = $userData['email'];
            $_SESSION['firstname'] = $userData['firstname'];
            $_SESSION['lastname'] = $userData['lastname'];

            $this->redirect('/');
        } else {
            $_SESSION['auth_error'] = "Invalid username/email or password.";
            $this->redirect('/login');
        }
    }
}
