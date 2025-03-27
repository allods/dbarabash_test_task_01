<?php
declare(strict_types=1);

namespace Controllers;

use Core;

class CreateUserResultController extends Core\AbstractController
{
    /**
     * User registration status page.
     *
     * @return void
     */
    public function index(): void
    {
        if ($this->isUserLoggedIn()) {
            $this->redirect('/');
        }

        $registerStatus = $_SESSION['user_register_status'] ?? false;
        unset($_SESSION['user_register_status']);

        $this->view('user_register_success', ['user_created' => $registerStatus]);
    }
}
