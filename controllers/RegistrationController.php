<?php
declare(strict_types=1);

namespace Controllers;

use Core;

class RegistrationController extends Core\AbstractController
{
    /**
     * Registration page.
     * 
     * @return void
     */
    public function index(): void
    {
        if ($this->isUserLoggedIn()) {
            $this->redirect('/');
        }

        $this->view('registration');
    }
}