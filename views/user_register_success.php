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
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="login">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="register">Register</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Main container -->
            <div class="container mt-5">
                <!-- Check if user is successfully created -->
                <?php if ($user_created): ?>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Success!</h4>
                    <p>The user has been created successfully.</p>
                    <hr>
                    <p class="mb-0">You can now <a href="login" class="alert-link">log in</a> or <a href="/" class="alert-link">go back to the homepage</a>.</p>
                </div>
                <?php else: ?>
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Error!</h4>
                    <p>There was an issue creating the user. Please try again later.</p>
                </div>
                <?php endif; ?>
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
    </body>
</html>
