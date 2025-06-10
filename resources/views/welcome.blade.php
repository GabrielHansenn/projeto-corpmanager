<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CorpManager - Bem-vindo</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

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
            --border-radius-sm: 8px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        [data-theme="dark"] {
            --primary-color: #7c3aed;
            --primary-dark: #6d28d9;
            --secondary-color: #8b5cf6;
            --accent-color: #a78bfa;
            --text-dark: #f1f5f9;
            --text-light: #cbd5e1;
            --bg-light: #1e293b;
            --white: #0f172a;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            font-size: 16px;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            min-height: 100vh;
            color: var(--text-dark);
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
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 1;
        }

        /* Header Styles */
        .header {
            padding: 20px 0;
            position: relative;
            z-index: 10;
            width: 100%;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--border-radius);
            padding: 16px 24px;
            box-shadow: var(--shadow-medium);
            flex-wrap: wrap;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            font-size: 1.5rem;
            font-weight: 700;
            margin-right: 20px;
        }

        .logo i {
            font-size: 1.75rem;
        }

        .nav-links {
            display: flex;
            gap: 16px;
            align-items: center;
            flex-wrap: wrap;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: var(--border-radius-sm);
            font-weight: 500;
            transition: var(--transition);
            border: 1px solid transparent;
            backdrop-filter: blur(10px);
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        .nav-link.primary {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.3);
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 60px 0;
            color: white;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            animation: slideUp 0.8s ease-out;
            padding: 0 20px;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero h1 {
            font-size: clamp(2rem, 5vw, 4rem);
            font-weight: 700;
            margin-bottom: 24px;
            background: linear-gradient(135deg, #ffffff 0%, #f0f9ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.1;
        }

        .hero p {
            font-size: clamp(1rem, 2vw, 1.25rem);
            margin-bottom: 40px;
            opacity: 0.9;
            line-height: 1.6;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: clamp(12px, 3vw, 16px) clamp(20px, 4vw, 32px);
            border-radius: var(--border-radius);
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            font-size: clamp(0.875rem, 1.5vw, 1rem);
            position: relative;
            overflow: hidden;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-width: 160px;
        }

        .btn-primary {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0.1) 100%);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-large);
            border-color: rgba(255, 255, 255, 0.5);
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
            box-shadow: var(--shadow-medium);
        }

        /* Features Section */
        .features {
            padding: 60px 20px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            margin: 40px 20px;
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: clamp(20px, 4vw, 40px);
            margin-top: 60px;
            width: 100%;
        }

        .feature-card {
            text-align: center;
            padding: clamp(24px, 5vw, 40px) clamp(20px, 3vw, 30px);
            background: rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            transition: var(--transition);
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-large);
            background: rgba(255, 255, 255, 0.15);
        }

        .feature-icon {
            font-size: clamp(2rem, 4vw, 3rem);
            margin-bottom: 20px;
            color: var(--accent-color);
        }

        .feature-card h3 {
            font-size: clamp(1.25rem, 2vw, 1.5rem);
            font-weight: 600;
            margin-bottom: 16px;
            color: white;
        }

        .feature-card p {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
            font-size: clamp(0.875rem, 1.5vw, 1rem);
        }

        .section-title {
            font-size: clamp(1.75rem, 4vw, 3rem);
            font-weight: 700;
            text-align: center;
            margin-bottom: 20px;
            color: white;
        }

        .section-subtitle {
            font-size: clamp(1rem, 2vw, 1.25rem);
            text-align: center;
            color: rgba(255, 255, 255, 0.8);
            max-width: 600px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 40px 20px;
            color: rgba(255, 255, 255, 0.7);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 60px;
            font-size: clamp(0.875rem, 1.5vw, 1rem);
        }

        .footer p {
            margin-bottom: 10px;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .features {
                margin: 30px 15px;
                padding: 50px 15px;
            }

            .features-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 30px;
            }
        }

        @media (max-width: 768px) {
            .nav {
                padding: 15px;
                flex-direction: column;
                gap: 15px;
            }

            .logo {
                margin-right: 0;
                margin-bottom: 10px;
            }

            .nav-links {
                width: 100%;
                justify-content: center;
                gap: 10px;
            }

            .nav-link {
                padding: 8px 16px;
                font-size: 0.9rem;
            }

            .hero {
                padding: 40px 0;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }

            .btn {
                width: 100%;
                max-width: 280px;
            }

            .features {
                padding: 40px 15px;
                margin: 20px 10px;
                border-radius: 16px;
            }

            .features-grid {
                margin-top: 40px;
                gap: 20px;
            }

            .feature-card {
                padding: 25px 20px;
            }

            .footer {
                padding: 30px 15px;
                margin-top: 40px;
            }
        }

        @media (max-width: 480px) {
            html {
                font-size: 14px;
            }

            .container {
                padding: 0 15px;
            }

            .nav {
                padding: 12px;
            }

            .logo {
                font-size: 1.3rem;
            }

            .logo i {
                font-size: 1.5rem;
            }

            .nav-links {
                flex-direction: column;
                width: 100%;
            }

            .nav-link {
                width: 100%;
                text-align: center;
                justify-content: center;
            }

            .hero {
                padding: 30px 0;
            }

            .hero-content {
                padding: 0 10px;
            }

            .features {
                padding: 30px 10px;
                margin: 15px 5px;
                border-radius: 12px;
            }

            .features-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .feature-card {
                padding: 20px 15px;
            }

            .footer {
                padding: 25px 10px;
            }
        }

        /* Animation delays for staggered effect */
        .feature-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .feature-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .feature-card:nth-child(3) {
            animation-delay: 0.3s;
        }

        .feature-card:nth-child(4) {
            animation-delay: 0.4s;
        }

        .feature-card:nth-child(5) {
            animation-delay: 0.5s;
        }

        .feature-card:nth-child(6) {
            animation-delay: 0.6s;
        }

        .feature-card {
            animation: slideUp 0.6s ease-out both;
        }

        /* Prevenção de CLS (Cumulative Layout Shift) */
        .hero h1,
        .hero p,
        .section-title,
        .section-subtitle {
            min-height: 0.5em;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <header class="header">
            @if (Route::has('login'))
                <nav class="nav">
                    <div class="logo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-gear-fill" viewBox="0 0 16 16">
                            <path
                                d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                        </svg>
                        <span>CorpManager</span>
                    </div>

                    <div class="nav-links">
                        @auth
                            <a href="{{ url('/profile') }}" class="nav-link primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                </svg> Meu Perfil
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="nav-link">
                                <i class="fas fa-sign-in-alt"></i> Entrar
                            </a>
                        @endauth
                    </div>
                </nav>
            @endif
        </header>

        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-content">
                @auth
                    <h1>Olá, {{ Auth::user()->name }}!</h1>
                @else
                    <h1>Gerencie sua empresa com eficiência</h1>
                    <p>
                        CorpManager é a solução completa para gestão empresarial.
                        Simplifique processos, aumente a produtividade e tome decisões mais inteligentes.
                    </p>
                @endauth

                <div class="hero-buttons">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary">
                            <i class="fas fa-rocket"></i> Acessar Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-secondary">
                            <i class="fas fa-sign-in-alt"></i> Fazer Login
                        </a>
                    @endauth
                </div>
            </div>
        </section>

        <!-- Features Section -->

        <section class="features">
            @auth
                <h2 class="section-title">Bem-vindo ao CorpManager</h2>
                <p class="section-subtitle">
                    Explore as funcionalidades que vão transformar a gestão da sua empresa
                </p>
            @else
                <h2 class="section-title">Por que escolher o CorpManager?</h2>
                <p class="section-subtitle">
                    Descubra as funcionalidades que vão transformar a gestão da sua empresa
                </p>

                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Relatórios Inteligentes</h3>
                        <p>
                            Dashboards interativos e relatórios em tempo real para acompanhar
                            o desempenho da sua empresa com precisão.
                        </p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Gestão Funcionários</h3>
                        <p>
                            Organize as informações e dados de seus colaboradores de maneira fácil e rápida.
                        </p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Segurança Avançada</h3>
                        <p>
                            Seus dados protegidos com criptografia de ponta e backups
                            automáticos para total tranquilidade.
                        </p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3>Acesso Mobile</h3>
                        <p>
                            Gerencie sua empresa de qualquer lugar com nossa interface
                            responsiva e aplicativo mobile.
                        </p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <h3>Automação</h3>
                        <p>
                            Automatize processos repetitivos e foque no que realmente
                            importa para o crescimento do seu negócio.
                        </p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3>Suporte 24/7</h3>
                        <p>
                            Nossa equipe está sempre disponível para ajudar você a
                            aproveitar ao máximo todas as funcionalidades.
                        </p>
                    </div>
                </div>
            @endauth
        </section>

        <!-- Footer -->
        <footer class="footer">
            <p>&copy; {{ date('Y') }} CorpManager. Todos os direitos reservados.</p>
            <p>Desenvolvido para empresas que querem crescer.
            </p>
        </footer>
    </div>
</body>

</html>
