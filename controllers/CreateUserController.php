<?php
declare(strict_types=1);

namespace Controllers;

use Core;

class CreateUserController extends Core\AbstractController
{
    /**
     * Create user action.
     * 
     * @return void
     */
    public function create(): void
    {
        if ($this->isUserLoggedIn()) {
            $this->redirect('/');
        }

        $this->verifyCsrf();

        $data = $_POST;
        $model = $this->model('User', $data);
        $_SESSION['user_register_status'] = $model->save();

        $this->redirect('/createUserResult');
    }
}