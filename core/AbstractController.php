<?php
declare(strict_types=1);

namespace Core;

use Models;

abstract class AbstractController
{
    /**
     * Rendering of a view file.
     *
     * @param  string $view
     * @param  array  $data
     * @return void
     */
    public function view(string $view, array $data = []): void
    {
        extract($data);
        require_once __DIR__ . '/../views/' . $view . '.php';
    }

    /**
     * Returns model object.
     *
     * @param  string $model
     * @param  array  $data
     * @return mixed
     */
    public function model(string $model, array $data = []): mixed
    {
        require_once __DIR__ . '/../models/' . $model . '.php';
        $className = 'Models\\' . $model;

        return new $className($data);
    }

    /**
     * Redirects by given url.
     *
     * @param  string $url
     * @return void
     */
    public function redirect(string $url): void
    {
        header("Location: $url");
        exit();
    }

    /**
     * Returns user login status.
     *
     * @return bool
     */
    public function isUserLoggedIn(): bool
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        return isset($_SESSION['user_id']);
    }

    /**
     * Csrf token validation.
     *
     * @return void
     */
    public function verifyCsrf(): void
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // Check CSRF token
        if ($_POST['_csrf'] !== $_SESSION['csrf_token']) {
            // TODO: add exception with redirect to the error page
            die("Invalid CSRF token.");
        }
        unset($_POST['_csrf']);
    }
}
