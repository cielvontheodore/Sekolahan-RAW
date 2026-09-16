<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekolahan - Empowering Future Leaders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-dark text-white">

    <header class="container py-3">
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
            <div class="container-fluid px-0" id="sekolahan">
                <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="#">
                    <i class="bi bi-asterisk"></i> Sekolahan
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav gap-3">
                        <li class="nav-item"><a class="nav-link active" href="#sekolahan">Home</a></li>
                        <li class="nav-item"><a class="nav-link text-secondary" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link text-secondary" href="#major">Majors</a></li>
                        <li class="nav-item"><a class="nav-link text-secondary" href="#news">News</a></li>
                        <li class="nav-item"><a class="nav-link text-secondary" href="#gallery">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link text-secondary" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="container py-5">
        <div class="row align-items-center gy-4">
            <div class="col-lg-6">
                <span class="badge rounded-pill bg-secondary bg-opacity-25 text-light border border-secondary px-3 py-2 mb-3">
                    <i class="bi bi-circle-fill text-success me-1 fs-6"></i> Admission for 2024/2025 Open
                </span>
                <h1 class="display-4 fw-bold mb-3">Empowering Future Leaders for a Changing World</h1>
                <p class="text-secondary mb-4 fs-6">
                    Experience academic excellence that transcends borders. Join a diverse community of innovators and thinkers at the world's leading global educational institution.
                </p>
                <div class="d-flex gap-3">
                    <a href="#" class="btn btn-light px-4 py-2 fw-semibold">Apply Now</a>
                    <a href="#" class="btn btn-outline-secondary text-white px-4 py-2 fw-semibold">Achievements</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="rounded-4 overflow-hidden shadow">
                    <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=800&q=80" alt="Students studying" class="img-fluid w-100 object-fit-cover" style="max-height: 400px;">
                </div>
            </div>
        </div>
    </section>

    <section class="container py-4 my-4 border-top border-bottom border-secondary">
        <div class="row text-center gy-3">
            <div class="col-md-4">
                <h2 class="fw-bold mb-0 display-6">98%</h2>
                <p class="text-secondary small mb-0">Graduation Rate</p>
            </div>
            <div class="col-md-4 border-start border-end border-secondary">
                <h2 class="fw-bold mb-0 display-6">50+</h2>
                <p class="text-secondary small mb-0">Global Programs</p>
            </div>
            <div class="col-md-4">
                <h2 class="fw-bold mb-0 display-6">20:1</h2>
                <p class="text-secondary small mb-0">Student Ratio</p>
            </div>
        </div>
    </section>

    <section class="container text-center py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8" id="about">
                <h2 class="fw-bold mb-3">Shaping the Future of Learning</h2>
                <p class="text-secondary small">
                    ACADEMY is a global leader in innovative education. We empower students to navigate and thrive in a rapidly changing world through rigorous, inclusive, and forward-thinking academic programs that foster critical thinking, practical skills, and ethical leadership.
                </p>
            </div>
        </div>
    </section>

    <section class="container py-5" id="major">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Vocational Majors</h2>
            <p class="text-secondary small">Hands-on programs designed to prepare you for the real-world demands of industry-leading fields.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 bg-secondary bg-opacity-10 border-0 p-4 text-white">
                    <div class="mb-3">
                        <i class="bi bi-code-slash fs-3"></i>
                    </div>
                    <h5 class="fw-bold">Software Engineering</h5>
                    <p class="text-secondary small mb-0">Comprehensive training in modern software development methodologies, algorithms, and system design.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 bg-secondary bg-opacity-10 border-0 p-4 text-white">
                    <div class="mb-3">
                        <i class="bi bi-router fs-3"></i>
                    </div>
                    <h5 class="fw-bold">Network Engineering</h5>
                    <p class="text-secondary small mb-0">In-depth study of networks, architecture, security, protocols, and infrastructure design for enterprise systems.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 bg-secondary bg-opacity-10 border-0 p-4 text-white">
                    <div class="mb-3">
                        <i class="bi bi-cpu fs-3"></i>
                    </div>
                    <h5 class="fw-bold">Hardware Engineering</h5>
                    <p class="text-secondary small mb-0">From microcontrollers to a wide range of computer systems, design, testing, and troubleshooting hardware.</p>
                </div>
            </div>
        </div>
    </section>

<section class="container py-5" id="news">
    <h2 class="fw-bold text-center mb-4">News & Articles</h2>

    <div class="row g-4">
        @forelse ($news as $item)
            <div class="col-md-4">
                <div class="card bg-secondary bg-opacity-10 border-0 text-white overflow-hidden h-100">

                    @if ($item->image)
                        <img
                            src="{{ asset('storage/' . $item->image) }}"
                            alt="{{ $item->title }}"
                            class="w-100"
                            style="height: 220px; object-fit: cover;"
                        >
                    @else
                        <div class="bg-secondary bg-opacity-25 p-5 text-center">
                            <i class="bi bi-journal-bookmark fs-1 text-secondary"></i>
                        </div>
                    @endif

                    <div class="card-body p-4">
                        <span class="text-secondary small">
                            {{ $item->created_at->format('F d, Y') }}
                        </span>

                        <h5 class="card-title fw-bold mt-1">
                            {{ $item->title }}
                        </h5>

                        @if ($item->description)
                            <p class="card-text text-secondary small">
                                {{ Str::limit($item->description, 120) }}
                            </p>
                        @endif
                    </div>

                </div>
            </div>
        @empty

            <div class="col-12">
                <div class="text-center py-5">
                    <i class="bi bi-journal-x fs-1 text-secondary"></i>
                    <p class="text-secondary mt-3 mb-0">
                        No news available yet.
                    </p>
                </div>
            </div>

        @endforelse
    </div>
</section>

    <section class="container py-5">
    <h2 class="fw-bold text-center mb-4" id="gallery">Gallery</h2>

    <div class="row g-4">
        @forelse ($gallery as $item)
            <div class="col-md-4">
                <div class="card bg-secondary bg-opacity-10 border-0 text-white overflow-hidden h-100">

                    @if ($item->image)
                        <img
                            src="{{ asset('storage/' . $item->image) }}"
                            alt="{{ $item->title }}"
                            class="w-100"
                            style="height: 220px; object-fit: cover;"
                        >
                    @else
                        <div class="bg-secondary bg-opacity-25 p-5 text-center">
                            <i class="bi bi-image fs-1 text-secondary"></i>
                        </div>
                    @endif

                    <div class="card-body p-4">
                        <span class="text-secondary small">
                            {{ $item->created_at->format('F d, Y') }}
                        </span>

                        <h5 class="card-title fw-bold mt-1">
                            {{ $item->title }}
                        </h5>

                        @if ($item->description)
                            <p class="card-text text-secondary small">
                                {{ Str::limit($item->description, 120) }}
                            </p>
                        @endif
                    </div>

                </div>
            </div>
        @empty

            <div class="col-12">
                <div class="text-center py-5">
                    <i class="bi bi-images fs-1 text-secondary"></i>
                    <p class="text-secondary mt-3 mb-0">
                        No gallery items available yet.
                    </p>
                </div>
            </div>

        @endforelse
    </div>
</section>

    <section class="container py-5" id="contact">
        <div class="row align-items-center gy-4">
            <div class="col-lg-6">
                <h2 class="fw-bold display-6 mb-3">Start Your Academic Journey</h2>
                <p class="text-secondary small mb-4">
                    Join our community of innovators. Apply online for the upcoming academic year today.
                </p>
                <div class="d-flex gap-2 align-items-center text-secondary small">
                    <i class="bi bi-globe"></i>
                    <span>Accredited Global Institution</span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card bg-secondary bg-opacity-10 border-0 p-4">
                    <form>
                        <div class="mb-3">
                            <label class="form-label text-secondary small">FULL NAME</label>
                            <input type="text" class="form-control bg-dark text-white border-secondary" placeholder="John Doe">
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-secondary small">EMAIL ADDRESS</label>
                            <input type="email" class="form-control bg-dark text-white border-secondary" placeholder="john.doe@example.com">
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-secondary small">PROGRAM OF INTEREST</label>
                            <select class="form-select bg-dark text-white border-secondary">
                                <option selected>Select a program</option>
                                <option value="1">Software Engineering</option>
                                <option value="2">Network Engineering</option>
                                <option value="3">Hardware Engineering</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-secondary w-100 fw-bold mt-2 py-2">SUBMIT APPLICATION</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="container py-4 border-top border-secondary">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
            <div class="fw-bold d-flex align-items-center gap-2">
                <i class="bi bi-asterisk"></i> Sekolahan
            </div>
            <p class="text-secondary small mb-0">&copy; 2024 Sekolahan Academic Institution. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
