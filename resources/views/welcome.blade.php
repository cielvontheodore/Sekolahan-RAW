<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">

<!-- AI Chat Assistant -->
<div id="ai-chat-widget">

    <!-- Chat Button -->
    <button id="ai-chat-toggle" type="button" aria-label="Buka AI Assistant">
        <span>💬</span>
    </button>

    <!-- Chat Box -->
    <div id="ai-chat-box">

        <!-- Header -->
        <div class="ai-chat-header">
            <div class="ai-chat-title">
                <div class="ai-chat-avatar">🤖</div>

                <div>
                    <div class="ai-chat-name">Sekolahan Assistant</div>
                    <div class="ai-chat-status">
                        <span class="ai-status-dot"></span>
                        Online
                    </div>
                </div>
            </div>

            <button id="ai-chat-close" type="button" aria-label="Tutup chat">
                ×
            </button>
        </div>

        <!-- Messages -->
        <div id="ai-chat-messages">

            <div class="ai-message ai-message-bot">
                Halo! 👋<br>
                Ada yang bisa saya bantu?
            </div>

        </div>

        <!-- Input -->
        <form id="ai-chat-form">
            <input
                id="ai-chat-input"
                type="text"
                placeholder="Tulis pesan..."
                autocomplete="off"
            >

            <button type="submit" aria-label="Kirim pesan">
                ➤
            </button>
        </form>

    </div>

</div>


<style>
    #ai-chat-widget {
        position: fixed;
        right: 24px;
        bottom: 24px;
        z-index: 9999;
        font-family: inherit;
    }

    /* =========================
       Floating Button
       ========================= */

    #ai-chat-toggle {
        width: 58px;
        height: 58px;
        border: none;
        border-radius: 50%;

        background: #212529;
        color: white;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 24px;
        cursor: pointer;

        box-shadow: 0 6px 24px rgba(0, 0, 0, 0.35);

        transition:
            transform 0.2s ease,
            box-shadow 0.2s ease;
    }

    #ai-chat-toggle:hover {
        transform: scale(1.08);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.45);
    }


    /* =========================
       Chat Box
       ========================= */

    #ai-chat-box {
        position: absolute;
        right: 0;
        bottom: 72px;

        width: 360px;
        height: 520px;

        background: #121212;
        border: 1px solid #2c2c2c;
        border-radius: 16px;

        display: flex;
        flex-direction: column;

        overflow: hidden;

        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.5);

        opacity: 0;
        visibility: hidden;
        transform: translateY(15px) scale(0.97);

        transition:
            opacity 0.2s ease,
            transform 0.2s ease,
            visibility 0.2s ease;
    }

    #ai-chat-box.ai-chat-open {
        opacity: 1;
        visibility: visible;
        transform: translateY(0) scale(1);
    }


    /* =========================
       Header
       ========================= */

    .ai-chat-header {
        height: 68px;
        padding: 12px 14px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        background: #1b1b1b;
        border-bottom: 1px solid #2c2c2c;
    }

    .ai-chat-title {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .ai-chat-avatar {
        width: 40px;
        height: 40px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;
        background: #292929;

        font-size: 20px;
    }

    .ai-chat-name {
        color: #fff;
        font-size: 14px;
        font-weight: 600;
    }

    .ai-chat-status {
        margin-top: 2px;

        color: #8f8f8f;
        font-size: 11px;

        display: flex;
        align-items: center;
        gap: 5px;
    }

    .ai-status-dot {
        width: 7px;
        height: 7px;

        border-radius: 50%;
        background: #20c997;
    }

    #ai-chat-close {
        width: 32px;
        height: 32px;

        border: none;
        background: transparent;

        color: #999;
        font-size: 25px;
        line-height: 1;

        cursor: pointer;
        border-radius: 8px;

        transition: background 0.15s ease, color 0.15s ease;
    }

    #ai-chat-close:hover {
        background: #2a2a2a;
        color: white;
    }


    /* =========================
       Messages
       ========================= */

    #ai-chat-messages {
        flex: 1;

        padding: 16px;

        display: flex;
        flex-direction: column;
        gap: 10px;

        overflow-y: auto;
    }

    .ai-message {
        max-width: 80%;

        padding: 10px 13px;

        border-radius: 13px;

        font-size: 13px;
        line-height: 1.5;

        word-wrap: break-word;
    }

    .ai-message-bot {
        align-self: flex-start;

        color: #e9e9e9;
        background: #242424;

        border-bottom-left-radius: 4px;
    }

    .ai-message-user {
        align-self: flex-end;

        color: white;
        background: #343a40;

        border-bottom-right-radius: 4px;
    }


    /* =========================
       Input
       ========================= */

    #ai-chat-form {
        min-height: 62px;

        padding: 10px;

        display: flex;
        align-items: center;
        gap: 8px;

        background: #1b1b1b;
        border-top: 1px solid #2c2c2c;
    }

    #ai-chat-input {
        flex: 1;

        min-width: 0;

        height: 42px;

        padding: 0 13px;

        border: 1px solid #333;
        border-radius: 10px;

        outline: none;

        background: #242424;
        color: white;

        font-size: 13px;
    }

    #ai-chat-input::placeholder {
        color: #777;
    }

    #ai-chat-input:focus {
        border-color: #555;
    }

    #ai-chat-form button {
        width: 42px;
        height: 42px;

        flex-shrink: 0;

        border: none;
        border-radius: 10px;

        background: #343a40;
        color: white;

        font-size: 17px;

        cursor: pointer;

        transition: background 0.15s ease;
    }

    #ai-chat-form button:hover {
        background: #495057;
    }


    /* =========================
       Mobile
       ========================= */

    @media (max-width: 480px) {

        #ai-chat-widget {
            right: 14px;
            bottom: 14px;
        }

        #ai-chat-box {
            position: fixed;

            right: 10px;
            bottom: 82px;
            left: 10px;

            width: auto;
            height: min(520px, calc(100vh - 110px));
        }

        #ai-chat-toggle {
            width: 54px;
            height: 54px;
        }
    }
</style>


<script>
    const aiChatToggle = document.getElementById('ai-chat-toggle');
    const aiChatBox = document.getElementById('ai-chat-box');
    const aiChatClose = document.getElementById('ai-chat-close');
    const aiChatForm = document.getElementById('ai-chat-form');
    const aiChatInput = document.getElementById('ai-chat-input');
    const aiChatMessages = document.getElementById('ai-chat-messages');

    // Open / close chat
    aiChatToggle.addEventListener('click', () => {
        aiChatBox.classList.toggle('ai-chat-open');

        if (aiChatBox.classList.contains('ai-chat-open')) {
            aiChatInput.focus();
        }
    });

    aiChatClose.addEventListener('click', () => {
        aiChatBox.classList.remove('ai-chat-open');
    });


    // Temporary demo message
    aiChatForm.addEventListener('submit', (event) => {
        event.preventDefault();

        const message = aiChatInput.value.trim();

        if (!message) {
            return;
        }

        // Add user message
        const userMessage = document.createElement('div');

        userMessage.className = 'ai-message ai-message-user';
        userMessage.textContent = message;

        aiChatMessages.appendChild(userMessage);

        // Clear input
        aiChatInput.value = '';

        // Temporary fake response
        setTimeout(() => {
            const botMessage = document.createElement('div');

            botMessage.className = 'ai-message ai-message-bot';
            botMessage.textContent =
                'Halo! AI-nya belum disambungkan 😭';

            aiChatMessages.appendChild(botMessage);

            aiChatMessages.scrollTop = aiChatMessages.scrollHeight;
        }, 500);

        aiChatMessages.scrollTop = aiChatMessages.scrollHeight;
    });
</script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Narra - Empowering Future Leaders</title>
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
                <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="#">
                    <i class="bi bi-asterisk"></i> Sekolahan
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav gap-3">
                        <li class="nav-item"><a class="nav-link active" href="#sekolahan">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#major">Majors</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('news') }}">News</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('gallery') }}">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="container py-5" id="sekolahan">
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
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">News & Articles</h2>

    <a href="{{ route('news') }}"
       class="text-white text-decoration-none small d-flex align-items-center gap-1">
        See more
        <i class="bi bi-arrow-right"></i>
    </a>

    </div>


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
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0" id="gallery">Gallery</h2>

    <a href="{{ route('gallery') }}"
       class="text-white text-decoration-none small d-flex align-items-center gap-1">
        See more
        <i class="bi bi-arrow-right"></i>
    </a>

    </div>


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
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label text-secondary small">FULL NAME</label>
                            <input type="text" class="form-control bg-dark text-white border-secondary" placeholder="Seseorang" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-secondary small">EMAIL ADDRESS</label>
                            <input type="email" class="form-control bg-dark text-white border-secondary" placeholder="Seseorang@example.com" name="email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-secondary small">PROGRAM OF INTEREST</label>
                            <select class="form-select bg-dark text-white border-secondary" name="program">
                                <option selected>Select a program</option>
                                <option value="1">Software Engineering</option>
                                <option value="2">Network Engineering</option>
                                <option value="3">Hardware Engineering</option>
                            </select>
                        </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary small">MESSAGE</label>
                                <textarea
                                    class="form-control bg-dark text-white border-secondary"
                                    placeholder="Write your message..."
                                    name="message"
                                    rows="4"
                                ></textarea>
                            </div>

                            <div class="w-100">
                                <div class="cf-turnstile"
                                     data-sitekey="{{ config('services.turnstile.site_key') }}"
                                     data-theme="dark">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-secondary w-100 fw-bold mt-2 py-2">
                                SUBMIT APPLICATION
                            </button>
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
<script>
document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', function (e) {
        const href = this.getAttribute('href');

        if (!href || href === '#') return;

        const target = document.querySelector(href);

        if (!target) return;

        e.preventDefault();
        e.stopPropagation();

        const header = document.querySelector('header');
        const headerHeight = header ? header.offsetHeight + 15 : 0;

        const targetPosition =
            target.getBoundingClientRect().top +
            window.scrollY -
            headerHeight;

        window.scrollTo({
            top: targetPosition,
            behavior: 'smooth'
        });
    });
});
</script>
</body>
</html>
