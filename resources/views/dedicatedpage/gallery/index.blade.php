<!DOCTYPE html>

<html lang="id" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Gallery - Sekolahan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
    html {
        scroll-behavior: smooth;
        scroll-padding-top: 100px;
    }

    body {
        background-color: #212529;
    }

    .gallery-grid {
        columns: 3 300px;
        column-gap: 1.5rem;
    }

    .gallery-item {
        break-inside: avoid;
        margin-bottom: 1.5rem;
    }

    .gallery-card {
        background: rgba(108, 117, 125, 0.10);
        border: 0;
        border-radius: 1rem;
        overflow: hidden;
        transition: transform 0.25s ease, background-color 0.25s ease;
    }

    .gallery-card:hover {
        transform: translateY(-4px);
        background: rgba(108, 117, 125, 0.16);
    }

    .gallery-card img {
        width: 100%;
        height: auto;
        display: block;
    }

    .gallery-content {
        padding: 1.25rem;
    }

    .gallery-title {
        font-size: 1.05rem;
    }
</style>

</head>

<body class="bg-dark text-white">

<!-- Navbar -->
<header class="container py-3 sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-opacity-75 rounded-4 px-3"
         style="backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);">

        <div class="container-fluid px-0">

            <a class="navbar-brand fw-bold d-flex align-items-center gap-2"
               href="{{ url('/') }}">
                <i class="bi bi-asterisk"></i>
                Sekolahan
            </a>

            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end"
                 id="navbarNav">

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
                        <a class="nav-link" href="{{ url('/news') }}">
                            News
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/gallery') }}">
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


<!-- Gallery Header -->
<main class="container py-5">

    <section class="text-center py-4 mb-5">

        <span class="badge rounded-pill bg-secondary bg-opacity-25 text-light border border-secondary px-3 py-2 mb-3">
            <i class="bi bi-images me-1"></i>
            School Gallery
        </span>

        <h1 class="display-4 fw-bold mb-3">
            Moments at Sekolahan
        </h1>

        <p class="text-secondary mx-auto mb-0"
           style="max-width: 650px;">
            Explore moments, activities, achievements, and memories
            from our school community.
        </p>

    </section>


    <!-- Gallery -->
    <section>

        @if ($gallery->count())
        <div class="gallery-grid">

            @foreach ($gallery as $item)

                <article class="gallery-item">
                    <div class="gallery-card">
                        <a href="{{ route('gallery.show', $item) }}">

                        @if ($item->image)
                            <img
                                src="{{ asset('storage/' . $item->image) }}"
                                alt="{{ $item->title }}"
                                loading="lazy"
                            >
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-secondary bg-opacity-25"
                                 style="height: 250px;">
                                <i class="bi bi-image fs-1 text-secondary"></i>
                            </div>
                        @endif

                        <div class="gallery-content">

                            <div class="text-secondary small mb-1">
                                {{ $item->created_at->format('F d, Y') }}
                            </div>

                            <h5 class="gallery-title fw-bold mb-2">
                                {{ $item->title }}
                            </h5>

                            @if ($item->description)
                                <p class="text-secondary small mb-0">
                                    {{ Str::limit($item->description, 140) }}
                                </p>
                            @endif

                        </div>

                    </div>
                </article>

            @endforeach

        </div>
    @else

    <div class="text-center py-5">
        <i class="bi bi-images fs-1 text-secondary"></i>

        <h5 class="fw-bold mt-3">
            No gallery items yet
        </h5>

        <p class="text-secondary small mb-0">
            Check back later for new photos and memories.
        </p>
    </div>

@endif

    </section>

</main>


<!-- Footer -->
<footer class="container py-4 border-top border-secondary">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">

        <div class="fw-bold d-flex align-items-center gap-2">
            <i class="bi bi-asterisk"></i>
            Sekolahan
        </div>

        <p class="text-secondary small mb-0">
            &copy; 2024 Sekolahan Academic Institution.
            All rights reserved.
        </p>

    </div>

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
