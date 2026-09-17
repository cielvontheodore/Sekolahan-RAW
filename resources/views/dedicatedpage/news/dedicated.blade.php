<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Narra - {{ $news->title }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 100px;
        }
    </style>
</head>

<body class="bg-dark text-white">

    <header class="container py-3 sticky-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-opacity-75 rounded-4 px-3"
             style="backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);">

            <div class="container-fluid px-0">

                <a class="navbar-brand fw-bold d-flex align-items-center gap-2"
                   href="{{ url('/') }}">
                    <i class="bi bi-asterisk"></i> Sekolahan
                </a>

                <button class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarNav">

                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav gap-3">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">
                                Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/#about') }}">
                                About
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/#major') }}">
                                Majors
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('news') }}">
                                News
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('gallery') }}">
                                Gallery
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/#contact') }}">
                                Contact
                            </a>
                        </li>

                    </ul>
                </div>

            </div>
        </nav>
    </header>


    <main class="container py-5">

        <div class="mb-4">
            <a href="{{ route('news') }}"
               class="text-white text-decoration-none d-inline-flex align-items-center gap-2">

                <i class="bi bi-arrow-left"></i>
                Back to News

            </a>
        </div>


        <article class="mx-auto" style="max-width: 900px;">

            @if ($news->image)
                <div class="rounded-4 overflow-hidden mb-4">

                    <img
                        src="{{ asset('storage/' . $news->image) }}"
                        alt="{{ $news->title }}"
                        class="img-fluid w-100"
                    >

                </div>
            @endif


            <div class="mb-3">

                <span class="text-secondary small">
                    {{ $news->created_at->format('F d, Y') }}
                </span>

            </div>


            <h1 class="fw-bold display-5 mb-4">
                {{ $news->title }}
            </h1>


            @if ($news->description)

                <div class="text-secondary"
                     style="line-height: 1.8;">

                    {!! nl2br(e($news->description)) !!}

                </div>

            @endif

        </article>

    </main>


    <footer class="container py-4 border-top border-secondary">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">

            <div class="fw-bold d-flex align-items-center gap-2">
                <i class="bi bi-asterisk"></i> Sekolahan
            </div>

            <p class="text-secondary small mb-0">
                &copy; 2024 Sekolahan Academic Institution. All rights reserved.
            </p>

        </div>

    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
