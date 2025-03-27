<?php
declare(strict_types=1);

namespace Controllers;

use Core;

class HomeController extends Core\AbstractController
{
    /**
     * Home page.
     * 
     * @return void
     */
    public function index(): void
    {
        $isLoggedIn = $this->isUserLoggedIn();
        $firstname = $_SESSION['firstname'] ?? '';
        $lastname = $_SESSION['lastname'] ?? '';
        $email = $_SESSION['email'] ?? '';

        $this->view('home', [
            'isLoggedIn' => $isLoggedIn,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
        ]);
    }
}