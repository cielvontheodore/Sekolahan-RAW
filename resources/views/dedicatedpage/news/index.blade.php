<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Narra - Berita Terbaru</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
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

    <style>
        :root {
            --bs-primary: #2563eb;
            --bs-primary-hover: #1d4ed8;

            --narra-bg: #f8fafc;
            --narra-card-bg: #ffffff;
            --narra-text-dark: #0f172a;
            --narra-text-muted: #64748b;
            --narra-text-subtle: #94a3b8;
            --narra-border: #f1f5f9;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--narra-bg);
            color: var(--narra-text-dark);
            -webkit-font-smoothing: antialiased;
        }

        /* Navbar */
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
            color: var(--narra-text-muted) !important;
            padding-left: 1.25rem !important;
            padding-right: 1.25rem !important;
            transition: color 0.2s ease;
        }

        .nav-link:hover {
            color: var(--bs-primary) !important;
        }

        .nav-link.active {
            color: var(--bs-primary) !important;
            font-weight: 600;
        }

        /* Page Header */
        .page-header {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        .category-label {
            color: var(--bs-primary);
            font-size: 0.75rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
            display: block;
        }

        .page-title {
            font-size: 2.75rem;
            font-weight: 800;
            color: var(--narra-text-dark);
            letter-spacing: -0.03em;
            line-height: 1.1;
        }

        /* News Card */
        .news-card {
            background-color: var(--narra-card-bg);
            border-radius: 1rem;
            overflow: hidden;
            border: 1px solid rgba(226, 232, 240, 0.6);
            height: 100%;
            display: flex;
            flex-direction: column;
            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease;
        }

        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px -10px rgba(15, 23, 42, 0.08);
        }

        /* Image */
        .news-img-wrapper {
            position: relative;
            width: 100%;
            padding-top: 62.5%;
            overflow: hidden;
            background-color: #e2e8f0;
        }

        .news-img-wrapper img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .news-card:hover .news-img-wrapper img {
            transform: scale(1.03);
        }

        /* Card Content */
        .news-card-body {
            padding: 1.5rem 1.25rem 1.75rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .news-date {
            font-size: 0.78rem;
            font-weight: 500;
            color: var(--narra-text-subtle);
            margin-bottom: 0.6rem;
            letter-spacing: 0.02em;
        }

        .news-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--narra-text-dark);
            line-height: 1.35;
            margin-bottom: 0.65rem;
            letter-spacing: -0.01em;
        }

        .news-excerpt {
            font-size: 0.85rem;
            color: var(--narra-text-muted);
            line-height: 1.5;
            margin-bottom: 0;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Card Link */
        .news-link {
            text-decoration: none;
            color: inherit;
            display: block;
            height: 100%;
        }

        .news-link:hover {
            color: inherit;
        }

        /* Empty State */
        .empty-state {
            padding: 5rem 1rem;
        }

        .empty-state i {
            font-size: 3rem;
            color: var(--narra-text-subtle);
        }

        /* Footer */
        .footer-divider {
            border-top: 1px solid #cbd5e1;
            margin-top: 4rem;
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
            text-transform: uppercase;
        }

        /* Mobile */
        @media (max-width: 768px) {
            .page-title {
                font-size: 2.25rem;
            }

            .navbar {
                padding-top: 1rem;
                padding-bottom: 1rem;
            }
        }
    </style>
</head>

<body>

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


    <!-- Main -->
    <main class="container mb-5">

        <!-- Page Header -->
        <header class="page-header">

            <span class="category-label">
                KABAR KAMPUS
            </span>

            <h1 class="page-title">
                Berita Terbaru
            </h1>

        </header>


        <!-- News Grid -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

            @forelse ($news as $item)

                <div class="col">

                    <a
                        href="{{ route('news.show', $item) }}"
                        class="news-link"
                    >

                        <article class="news-card">

                            <!-- Image -->
                            <div class="news-img-wrapper">

                                @if ($item->image)

                                    <img
                                        src="{{ asset('storage/' . $item->image) }}"
                                        alt="{{ $item->title }}"
                                        loading="lazy"
                                    >

                                @else

                                    <div class="w-100 h-100 position-absolute top-0 start-0 d-flex align-items-center justify-content-center">
                                        <i class="bi bi-journal-bookmark fs-1 text-secondary"></i>
                                    </div>

                                @endif

                            </div>


                            <!-- Content -->
                            <div class="news-card-body">

                                <time class="news-date">

                                    {{ $item->created_at->format('d M Y') }}

                                </time>


                                <h2 class="news-title">

                                    {{ $item->title }}

                                </h2>


                                @if ($item->description)

                                    <p class="news-excerpt">

                                        {{ $item->description }}

                                    </p>

                                @endif

                            </div>

                        </article>

                    </a>

                </div>

            @empty

                <!-- Empty -->
                <div class="col-12">

                    <div class="empty-state text-center">

                        <i class="bi bi-journal-x"></i>

                        <h5 class="fw-bold mt-3">
                            Belum Ada Berita
                        </h5>

                        <p class="text-secondary small mb-0">
                            Belum ada berita yang tersedia saat ini.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>


        <!-- Footer -->
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

                &copy; {{ date('Y') }} NARRA. ALL RIGHTS RESERVED.

            </div>

        </footer>

    </main>


    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    ></script>

</body>
</html>
