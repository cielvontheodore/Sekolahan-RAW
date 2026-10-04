<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Halaman Tidak Ditemukan - Narra</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <!-- Bootstrap 5 CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>
        :root {
            --royal-blue: #2b66f6;
            --royal-blue-hover: #1e52d8;
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
            font-family:
                'Plus Jakarta Sans',
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                Roboto,
                sans-serif;

            background-color: var(--royal-blue);
            color: #ffffff;

            display: flex;
            flex-direction: column;

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

            transition:
                color 0.2s ease,
                opacity 0.2s ease;
        }

        .nav-link:hover {
            color: #ffffff !important;
            opacity: 0.8;
        }

        .navbar-toggler {
            border: none;
            color: #ffffff;
            box-shadow: none !important;
        }

        .navbar-toggler:focus {
            box-shadow: none !important;
        }

        /* 404 Content */

        .error-container {
            width: 100%;
            max-width: 650px;

            margin: auto;
            padding: 2rem 1.5rem;

            text-align: center;
        }

        .error-code {
            font-size: clamp(6rem, 20vw, 10rem);
            line-height: 0.9;

            font-weight: 800;
            letter-spacing: -0.07em;

            color: #ffffff;

            margin-bottom: 1.5rem;
        }

        .error-title {
            font-size: 1.65rem;
            font-weight: 700;

            color: #ffffff;

            margin-bottom: 0.65rem;
            letter-spacing: -0.01em;
        }

        .error-description {
            max-width: 500px;

            margin: 0 auto 2rem;

            color: var(--text-light-subtle);

            font-size: 0.95rem;
            line-height: 1.7;
            font-weight: 400;
        }

        /* Button */

        .btn-home {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;

            background-color: #ffffff;
            color: var(--royal-blue);

            font-weight: 700;
            font-size: 0.95rem;

            padding: 0.8rem 1.5rem;

            border-radius: 8px;
            border: none;

            text-decoration: none;

            transition:
                background-color 0.2s ease,
                color 0.2s ease,
                transform 0.1s ease,
                box-shadow 0.2s ease;
        }

        .btn-home:hover {
            background-color: #f8fafc;
            color: var(--royal-blue-hover);

            box-shadow:
                0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .btn-home:active {
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

        /* Mobile */

        @media (max-width: 576px) {

            .navbar {
                padding-top: 1.25rem;
                padding-bottom: 1.25rem;
            }

            .navbar-brand {
                font-size: 1.6rem;
            }

            .error-container {
                padding: 1.5rem;
            }

            .error-code {
                margin-bottom: 1.25rem;
            }

            .error-title {
                font-size: 1.45rem;
            }

            .error-description {
                font-size: 0.875rem;
            }

            .nav-link {
                padding: 0.65rem 0 !important;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->

    <nav class="navbar navbar-expand-md">

        <div class="container">

            <a
                class="navbar-brand"
                href="{{ url('/') }}"
            >
                Narra
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <i class="bi bi-list fs-2"></i>
            </button>

            <div
                class="collapse navbar-collapse justify-content-end"
                id="navbarNav"
            >

                <ul class="navbar-nav align-items-center">

                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="{{ url('/') }}"
                        >
                            Home
                        </a>

                    </li>

                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="{{ url('/#about') }}"
                        >
                            About
                        </a>

                    </li>

                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="{{ url('/#programs') }}"
                        >
                            Majors
                        </a>

                    </li>

                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="{{ url('/#news') }}"
                        >
                            News
                        </a>

                    </li>

                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="{{ route('gallery') }}"
                        >
                            Gallery
                        </a>

                    </li>

                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="{{ url('/#rating') }}"
                        >
                            Rating
                        </a>

                    </li>

                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="{{ url('/#contact') }}"
                        >
                            Contact
                        </a>

                    </li>

                </ul>

            </div>

        </div>

    </nav>


    <!-- 404 Content -->

    <main class="container d-flex flex-column justify-content-center flex-grow-1">

        <div class="error-container">

            <div class="error-code">
                404
            </div>

            <h1 class="error-title">
                Halaman Tidak Ditemukan
            </h1>

            <p class="error-description">
                Maaf, halaman yang kamu cari tidak ditemukan.
                Mungkin halaman tersebut sudah dipindahkan,
                dihapus, atau alamat yang kamu masukkan tidak benar.
            </p>

            <a
                href="{{ url('/') }}"
                class="btn-home"
            >
                <i class="bi bi-house-fill"></i>
                Kembali ke Beranda
            </a>

        </div>

    </main>


    <!-- Footer -->

    <footer>

        <div class="container">

            <hr class="footer-divider mb-4">

            <div
                class="d-flex flex-column flex-sm-row justify-content-between align-items-center"
            >

                <a
                    href="{{ url('/') }}"
                    class="footer-brand"
                >
                    Narra
                </a>

                <div class="copyright-text mt-3 mt-sm-0">
                    &copy; {{ date('Y') }} Narra.
                    Hak cipta dilindungi undang-undang.
                </div>

            </div>

        </div>

    </footer>


    <!-- Bootstrap JS -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    ></script>

</body>
</html>

