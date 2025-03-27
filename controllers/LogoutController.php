<?php
declare(strict_types=1);

namespace Controllers;

use Core;

class LogoutController extends Core\AbstractController
{
    /**
     * Logout action.
     * 
     * @return void
     */
    public function logout(): void
    {
        if (!$this->isUserLoggedIn()) {
            $this->redirect('/');
        }

        session_unset();
        session_destroy();

        $this->redirect('/');
    }
}