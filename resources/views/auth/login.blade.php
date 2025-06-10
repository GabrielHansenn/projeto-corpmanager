<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CorpManager - Login</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #667eea;
            --primary-dark: #5a6fd8;
            --secondary-color: #764ba2;
            --accent-color: #f093fb;
            --text-dark: #2d3748;
            --text-light: #718096;
            --bg-light: #f7fafc;
            --white: #ffffff;
            --shadow-light: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-medium: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --shadow-large: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            --border-radius: 12px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="white" opacity="0.1"/><circle cx="90" cy="40" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            pointer-events: none;
        }

        .container {
            max-width: 1000px;
            width: 100%;
            z-index: 1;
            position: relative;
        }

        .login-card {
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-large);
            overflow: hidden;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-row {
            display: flex;
            min-height: 500px;
        }

        .image-section {
            flex: 1;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .image-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400"><defs><linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" style="stop-color:rgba(255,255,255,0.1)"/><stop offset="100%" style="stop-color:rgba(255,255,255,0)"/></linearGradient></defs><circle cx="100" cy="100" r="50" fill="url(%23grad1)"/><circle cx="300" cy="300" r="80" fill="url(%23grad1)"/><circle cx="350" cy="150" r="30" fill="url(%23grad1)"/></svg>');
            opacity: 0.3;
        }

        .image-content {
            text-align: center;
            color: white;
            z-index: 1;
            padding: 40px;
        }

        .image-content i {
            font-size: 4rem;
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .image-content h2 {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .image-content p {
            font-size: 1.1rem;
            opacity: 0.9;
            line-height: 1.6;
        }

        .form-section {
            flex: 1;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-header h1 {
            color: var(--text-dark);
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .form-header p {
            color: var(--text-light);
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 24px;
            position: relative;
        }

        .toggle-password {
            font-size: 1.1rem;
            color: var(--text-light);
        }


        .form-control {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid #e2e8f0;
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: var(--transition);
            background: var(--bg-light);
            color: var(--text-dark);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            background: var(--white);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-1px);
        }

        .form-control::placeholder {
            color: var(--text-light);
        }

        .alert {
            background: #fed7d7;
            border: 1px solid #feb2b2;
            color: #c53030;
            padding: 16px;
            border-radius: var(--border-radius);
            margin-bottom: 24px;
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            75% {
                transform: translateX(5px);
            }
        }

        .alert ul {
            list-style: none;
            margin: 0;
        }

        .alert li {
            margin-bottom: 4px;
        }

        .alert li:last-child {
            margin-bottom: 0;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 32px;
        }

        .checkbox-input {
            width: 18px;
            height: 18px;
            margin-right: 12px;
            accent-color: var(--primary-color);
        }

        .checkbox-label {
            color: var(--text-light);
            font-size: 0.9rem;
            cursor: pointer;
            user-select: none;
        }

        .btn-login {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .divider {
            margin: 32px 0;
            border: none;
            height: 1px;
            background: #e2e8f0;
        }

        .back-link {
            text-align: center;
        }

        .back-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .back-link a:hover {
            color: var(--primary-dark);
            transform: translateX(-4px);
        }

        /* Responsividade */
        @media (max-width: 992px) {
            .login-row {
                flex-direction: column;
            }

            .image-section {
                min-height: 200px;
            }

            .image-content {
                padding: 30px;
            }

            .image-content h2 {
                font-size: 1.5rem;
            }

            .image-content p {
                font-size: 1rem;
            }

            .form-section {
                padding: 40px 30px;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            .form-section {
                padding: 30px 20px;
            }

            .form-header h1 {
                font-size: 1.75rem;
            }

            .image-section {
                min-height: 150px;
            }

            .image-content {
                padding: 20px;
            }

            .image-content i {
                font-size: 3rem;
            }

            .image-content h2 {
                font-size: 1.25rem;
            }
        }

        @media (max-width: 480px) {
            .form-section {
                padding: 20px 15px;
            }

            .form-control {
                padding: 14px 16px;
            }

            .btn-login {
                padding: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-card">
            <div class="login-row">
                <div class="image-section">
                    <div class="image-content">
                        <h2>CorpManager <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                                <path
                                    d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                            </svg></h2>
                        <p>Gerencie os funcionários da sua empresa com eficiência e simplicidade</p>
                    </div>
                </div>
                <div class="form-section">
                    <div class="form-header">
                        <h1>Bem-vindo de volta!</h1>
                        <p>Faça login para acessar sua conta</p>
                    </div>

                    <form action="{{ route('login.action') }}" method="POST">
                        @csrf
                        @if ($errors->any())
                            <div class="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <input name="email" type="email" class="form-control" id="exampleInputEmail"
                                aria-describedby="emailHelp" placeholder="Digite seu email" required>
                        </div>

                        <div class="form-group">
                            <input name="password" type="password" class="form-control" id="exampleInputPassword"
                                placeholder="Digite sua senha" required>
                            <span toggle="#exampleInputPassword" class="toggle-password"
                                style="position:absolute; top:50%; right:20px; transform:translateY(-50%); cursor:pointer;">
                                <i class="fa fa-eye"></i>
                            </span>
                        </div>


                        <div class="checkbox-group">
                            <input name="remember" type="checkbox" class="checkbox-input" id="customCheck">
                            <label class="checkbox-label" for="customCheck">Lembrar de mim</label>
                        </div>

                        <button type="submit" class="btn-login">
                            Entrar
                        </button>
                    </form>

                    <hr class="divider">

                    <div class="back-link">
                        <a href="{{ route('home') }}">
                            <i class="fas fa-arrow-left"></i>
                            Voltar ao início
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggle = document.querySelector('.toggle-password');
            const input = document.querySelector('#exampleInputPassword');

            toggle.addEventListener('click', function() {
                const icon = this.querySelector('i');
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                icon.classList.toggle('fa-eye');
                icon.classList.toggle('fa-eye-slash');
            });
        });
    </script>


</body>

</html>
