<!DOCTYPE html>

<html lang="id" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Narra - News & Articles</title>

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


<!-- News Header -->
<main class="container py-5">

    <section class="text-center py-4 mb-5">

        <span class="badge rounded-pill bg-secondary bg-opacity-25 text-light border border-secondary px-3 py-2 mb-3">
            <i class="bi bi-newspaper me-1"></i>
            School News
        </span>

        <h1 class="display-4 fw-bold mb-3">
            News & Articles
        </h1>

        <p class="text-secondary mx-auto mb-0"
           style="max-width: 650px;">
            Stay up to date with the latest news, activities,
            achievements, and announcements from Sekolahan.
        </p>

    </section>


    <!-- News -->
    <section>

        @forelse ($news as $item)

            <article class="mb-5">

                <div class="card bg-secondary bg-opacity-10 border-0 text-white overflow-hidden">
                    

                    <div class="row g-0">

                        <!-- Image -->
                        <div class="col-lg-5">

                            @if ($item->image)

                                <img
                                    src="{{ asset('storage/' . $item->image) }}"
                                    alt="{{ $item->title }}"
                                    class="w-100 h-100"
                                    style="min-height: 280px; object-fit: cover;"
                                    loading="lazy"
                                >

                            @else

                                <div class="d-flex align-items-center justify-content-center bg-secondary bg-opacity-25 h-100"
                                     style="min-height: 280px;">

                                    <i class="bi bi-journal-bookmark fs-1 text-secondary"></i>

                                </div>

                            @endif

                        </div>


                        <!-- Content -->
                        <div class="col-lg-7">

                            <div class="card-body p-4 p-lg-5">

                                <span class="text-secondary small">
                                    {{ $item->created_at->format('F d, Y') }}
                                </span>

                                <h2 class="fw-bold mt-2 mb-3">
                                    {{ $item->title }}
                                </h2>

                                @if ($item->description)

                                    <p class="text-secondary mb-4">
                                        {{ $item->description }}
                                    </p>

                                @endif

                                <a href="{{ route('news.show', $item) }}"
                                   class="text-white text-decoration-none small d-inline-flex align-items-center gap-1">
                                    Read more
                                    <i class="bi bi-arrow-right"></i>
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </article>

        @empty

            <div class="text-center py-5">

                <i class="bi bi-journal-x fs-1 text-secondary"></i>

                <h5 class="fw-bold mt-3">
                    No news available yet
                </h5>

                <p class="text-secondary small mb-0">
                    Check back later for the latest news and announcements.
                </p>

            </div>

        @endforelse

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
