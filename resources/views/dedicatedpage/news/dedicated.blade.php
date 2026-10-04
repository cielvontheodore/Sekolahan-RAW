<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Narra - {{ $news->title }}</title>

    <!-- Google Fonts: Playfair Display + Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <!-- Cloudflare Turnstile -->
    <script
        src="https://challenges.cloudflare.com/turnstile/v0/api.js"
        async
        defer
    ></script>

    <style>
        :root {
            --bs-primary: #2563eb;
            --bs-primary-dark: #1d4ed8;

            --narra-bg: #f8fafc;
            --narra-text-dark: #0f172a;
            --narra-text-muted: #475569;
            --narra-text-subtle: #64748b;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 100px;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: var(--narra-bg);
            color: var(--narra-text-dark);
            -webkit-font-smoothing: antialiased;
        }

        /* ========================================
           NAVBAR
        ======================================== */

        .navbar {
            background-color: var(--narra-bg) !important;
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.65rem;
            color: var(--bs-primary) !important;
            letter-spacing: -0.03em;
        }

        .nav-link {
            font-weight: 500;
            font-size: 0.95rem;
            color: #334155 !important;
            padding-left: 1.25rem !important;
            padding-right: 1.25rem !important;
            transition: color 0.2s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--bs-primary) !important;
        }

        .nav-link.active {
            font-weight: 600;
        }

        /* ========================================
           BACK LINK
        ======================================== */

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;

            color: var(--bs-primary);
            font-size: 0.85rem;
            font-weight: 600;

            text-decoration: none;

            transition: opacity 0.2s ease;

            margin-bottom: 2rem;
        }

        .back-link:hover {
            opacity: 0.8;
            color: var(--bs-primary-dark);
        }

        /* ========================================
           ARTICLE
        ======================================== */

        .article-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .article-date {
            font-size: 0.825rem;
            font-weight: 600;
            color: var(--narra-text-subtle);

            display: flex;
            align-items: center;
            gap: 0.4rem;

            margin-bottom: 0.75rem;
        }

        .article-title {
            font-family: 'Playfair Display', Georgia, serif;

            font-size: 2.35rem;
            font-weight: 800;

            color: #1e293b;

            line-height: 1.22;
            letter-spacing: -0.02em;

            margin-bottom: 2.25rem;
        }

        @media (min-width: 992px) {
            .article-title {
                font-size: 2.75rem;
            }
        }

        /* ========================================
           HERO IMAGE
        ======================================== */

        .hero-img-container {
            width: 100%;

            border-radius: 1.25rem;
            overflow: hidden;

            box-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);

            margin-bottom: 2.5rem;
        }

        .hero-img-container img {
            width: 100%;
            height: auto;

            max-height: 560px;

            object-fit: cover;
            display: block;
        }

        /* ========================================
           ARTICLE BODY
        ======================================== */

        .article-body {
            max-width: 820px;
        }

        .article-body p {
            font-size: 0.95rem;
            line-height: 1.7;

            color: var(--narra-text-muted);

            margin-bottom: 1.5rem;

            letter-spacing: -0.005em;
        }

        .article-body p:last-child {
            margin-bottom: 0;
        }

        /* ========================================
           FOOTER
        ======================================== */

        .footer-divider {
            border-top: 1px solid #cbd5e1;

            margin-top: 4.5rem;
            margin-bottom: 2rem;

            opacity: 0.6;
        }

        .footer-brand {
            font-weight: 800;
            font-size: 1.4rem;

            color: var(--bs-primary);

            letter-spacing: -0.03em;
        }

        .copyright-text {
            font-size: 0.75rem;
            font-weight: 700;

            color: var(--bs-primary);

            letter-spacing: 0.05em;
        }
    </style>
</head>

<body>


    <!-- ==========================================
         NAVBAR
    =========================================== -->

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">

        <div class="container">

            <a
                class="navbar-brand"
                href="{{ url('/') }}"
            >
                Narra
            </a>

            <button
                class="navbar-toggler border-0"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div
                class="collapse navbar-collapse justify-content-end"
                id="navbarNav"
            >

                <ul class="navbar-nav">

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
                            class="nav-link active"
                            href="{{ route('news') }}"
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



    <!-- ==========================================
         MAIN ARTICLE
    =========================================== -->

    <main class="container my-3 my-md-4">

        <!-- Back -->

        <a
            href="{{ route('news') }}"
            class="back-link"
        >
            <i class="bi bi-arrow-left"></i>
            Kembali ke Berita
        </a>


        <article class="article-container">


            <!-- Date -->

            <div class="article-date">

                <i class="bi bi-calendar4"></i>

                {{ $news->created_at->format('d F Y') }}

            </div>


            <!-- Title -->

            <h1 class="article-title">
                {{ $news->title }}
            </h1>


            <!-- Image
                 Tidak ada placeholder.
                 Kalau image kosong, bagian ini tidak dirender.
            -->

            @if ($news->image)

                <div class="hero-img-container">

                    <img
                        src="{{ asset('storage/' . $news->image) }}"
                        alt="{{ $news->title }}"
                    >

                </div>

            @endif


            <!-- Description -->

            @if ($news->description)

                <div class="article-body">

                    {!! nl2br(e($news->description)) !!}

                </div>

            @endif


        </article>


        <!-- ==========================================
             FOOTER
        =========================================== -->

        <hr class="footer-divider">


        <footer
            class="d-flex flex-column flex-sm-row justify-content-between align-items-center pb-4"
        >

            <a
                href="{{ url('/') }}"
                class="footer-brand text-decoration-none"
            >
                Narra
            </a>


            <div class="copyright-text mt-3 mt-sm-0">
                &copy; {{ date('Y') }} Narra. Hak cipta dilindungi undang-undang.
            </div>

        </footer>

    </main>


    <!-- Bootstrap JS -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    ></script>

</body>

</html>
