<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Admin - Narra</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --royal-blue: #2b66f6;
            --royal-blue-hover: #1e52d8;
            --input-border: rgba(255, 255, 255, 0.45);
            --input-focus-border: #ffffff;
            --text-light-subtle: rgba(255, 255, 255, 0.82);
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: var(--royal-blue);
            color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }

        /* Navbar */
        .navbar {
            background-color: transparent !important;
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.75rem;
            color: #ffffff !important;
            letter-spacing: -0.02em;
        }

        .nav-link {
            font-weight: 500;
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.9) !important;
            padding-left: 1.25rem !important;
            padding-right: 1.25rem !important;
            transition: color 0.2s ease, opacity 0.2s ease;
        }

        .nav-link:hover {
            color: #ffffff !important;
            opacity: 0.8;
        }

        /* Main Login */
        .login-container {
            width: 100%;
            max-width: 440px;
            margin: auto;
            padding: 1.5rem;
        }

        .login-header h1 {
            font-size: 1.65rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 0.5rem;
            letter-spacing: -0.01em;
        }

        .login-header p {
            font-size: 0.9rem;
            color: var(--text-light-subtle);
            font-weight: 400;
            margin-bottom: 2.25rem;
        }

        .form-label {
            font-size: 0.825rem;
            font-weight: 500;
            color: var(--text-light-subtle);
            margin-bottom: 0.5rem;
        }

        /* Input */
        .input-group-custom {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            color: #ffffff;
            font-size: 1.1rem;
            pointer-events: none;
            z-index: 5;
        }

        .form-control-custom {
            width: 100%;
            background-color: transparent;
            border: 1px solid var(--input-border);
            border-radius: 8px;
            padding: 0.75rem 1rem 0.75rem 2.75rem;
            color: #ffffff;
            font-size: 0.95rem;
            font-weight: 400;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-control-custom::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .form-control-custom:focus {
            background-color: transparent;
            border-color: var(--input-focus-border);
            color: #ffffff;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.2);
        }

        /* Remember Me */
        .remember-wrapper {
            margin-top: 1rem;
        }

        .remember-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            color: var(--text-light-subtle);
            font-size: 0.825rem;
        }

        .remember-checkbox {
            width: 16px;
            height: 16px;
            accent-color: #ffffff;
            cursor: pointer;
        }

        /* Validation Errors */
        .input-error {
            margin-top: 0.5rem;
            font-size: 0.75rem;
            color: #ffffff;
            font-weight: 500;
        }

        /* Session Status */
        .session-status {
            margin-bottom: 1rem;
            padding: 0.75rem 1rem;
            border: 1px solid rgba(255, 255, 255, 0.35);
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.08);
            color: #ffffff;
            font-size: 0.825rem;
        }

        /* Primary Button */
        .btn-submit {
            background-color: #ffffff;
            color: var(--royal-blue);
            font-weight: 700;
            font-size: 0.95rem;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            border: none;
            width: 100%;
            margin-top: 1.5rem;
            transition: background-color 0.2s ease, transform 0.1s ease, box-shadow 0.2s ease;
        }

        .btn-submit:hover {
            background-color: #f8fafc;
            color: var(--royal-blue-hover);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .btn-submit:active {
            transform: scale(0.99);
        }

        /* Footer */
        .footer-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            margin: 0;
            width: 100%;
        }

        footer {
            padding-top: 1.75rem;
            padding-bottom: 2rem;
        }

        .footer-brand {
            font-weight: 800;
            font-size: 1.5rem;
            color: #ffffff;
            text-decoration: none;
            letter-spacing: -0.02em;
        }

        .copyright-text {
            font-size: 0.75rem;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.85);
            letter-spacing: 0.06em;
        }

        @media (max-width: 576px) {
            .navbar {
                padding-top: 1.25rem;
                padding-bottom: 1.25rem;
            }

            .login-header h1 {
                font-size: 1.45rem;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Narra</a>

            <button
                class="navbar-toggler border-0 text-white"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <i class="bi bi-list fs-2"></i>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/#about') }}">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/#progrms') }}">Major</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/#news') }}">News</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('gallery') }}">Gallery</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/#rating') }}">Rating</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/#contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Login -->
    <main class="container d-flex flex-column justify-content-center flex-grow-1 my-4">
        <div class="login-container">

            <div class="login-header text-center">
                <h1>Masuk Admin</h1>
                <p>Sistem Administrasi Narra</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="session-status">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">
                        Email
                    </label>

                    <div class="input-group-custom">
                        <i class="bi bi-envelope input-icon"></i>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control-custom"
                            value="{{ old('email') }}"
                            placeholder="Masukkan email anda"
                            required
                            autofocus
                            autocomplete="username"
                        >
                    </div>

                    @if ($errors->get('email'))
                        @foreach ($errors->get('email') as $message)
                            <div class="input-error">
                                {{ $message }}
                            </div>
                        @endforeach
                    @endif
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">
                        Kata Sandi
                    </label>

                    <div class="input-group-custom">
                        <i class="bi bi-lock input-icon"></i>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control-custom"
                            placeholder="Masukkan kata sandi"
                            required
                            autocomplete="current-password"
                        >
                    </div>

                    @if ($errors->get('password'))
                        @foreach ($errors->get('password') as $message)
                            <div class="input-error">
                                {{ $message }}
                            </div>
                        @endforeach
                    @endif
                </div>


                <!-- Submit -->
                <button type="submit" class="btn btn-submit">
                    Masuk
                </button>
            </form>


        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <hr class="footer-divider mb-4">

            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center">
                <a href="{{ url('/') }}" class="footer-brand">
                    Narra
                </a>

                <div class="copyright-text mt-3 mt-sm-0">
                    &copy; {{ date('Y') }} Narra. Hak cipta dilindungi undang-undang.
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
