<?php
// Start a session to store CSRF token
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Generate a random CSRF token and store it in session
if (empty($_SESSION['csrf_token'])) {
    try {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    } catch (Exception $e) {
        // TODO: handle the exception
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home Page - Web App</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet"
                href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
                integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
                crossorigin="anonymous">
        <style>
            html, body {
                height: 100%;
                margin: 0;
            }

            .container-fluid {
                display: flex;
                flex-direction: column;
                height: 100%;
            }

            .content {
                flex-grow: 1;
            }

            .hero-section {
                background: #007bff;
                color: white;
                padding: 100px 0;
                text-align: center;
            }

            .hero-section h1 {
                font-size: 3rem;
                margin-bottom: 20px;
            }

            .btn-custom {
                background-color: #28a745;
                color: white;
                border: none;
            }

            .btn-custom:hover {
                background-color: #218838;
            }

            .form-container {
                max-width: 500px;
                margin: 50px auto;
                padding: 30px;
                background-color: #f9f9f9;
                border-radius: 8px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            }

            footer {
                background-color: #343a40;
                color: white;
                text-align: center;
                padding: 15px 0;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Web App</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="login">Login</a></li>
                            <li class="nav-item"><a class="nav-link active" href="register">Register</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Content Section -->
            <div class="content">
                <div class="hero-section">
                    <h1>Register for an Account</h1>
                    <p>Fill in the details below to create a new account.</p>
                </div>
                <div class="form-container">
                    <h4 class="mb-4">Sign Up</h4>
                    <form id="registerForm" method="post" action="createUser" novalidate>
                        <!-- csrf -->
                        <input type="hidden" name="_csrf" value="<?php echo $_SESSION['csrf_token']; ?>">
                        <!-- First Name -->
                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" name="firstname" class="form-control" id="firstname" placeholder="John" pattern="[A-Za-z]+" required>
                            <div class="invalid-feedback">Please enter your first name.</div>
                        </div>
                        <!-- Last Name -->
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Doe" pattern="[A-Za-z]+" required>
                            <div class="invalid-feedback">Please enter your last name.</div>
                        </div>
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="example@example.com" required>
                            <div class="invalid-feedback">Please enter a valid email address.</div>
                        </div>
                        <!-- Phone -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="(123) 456-7890" required>
                            <div class="invalid-feedback">Please enter a valid phone number.</div>
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" title="Password must be at least 8 characters, contain at least one letter, one number, and one special character.">
                            <div class="invalid-feedback">Please enter a password.</div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-custom btn-lg w-100">Register</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Sticky Footer -->
            <footer>
                <p>&copy; 2025 Web App. All rights reserved.</p>
            </footer>
        </div>
        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script>
            window.onload = function() {
                var form = document.getElementById("registerForm");
                form.reset();
            };

            (function () {
                'use strict';
                var form = document.getElementById('registerForm');
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false)
            })()
        </script>
    </body>
</html>
