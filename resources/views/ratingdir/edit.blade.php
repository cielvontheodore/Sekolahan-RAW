<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Rating - Admin NARRA</title>

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <!-- Google Fonts -->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
    >

    <style>
        :root {
            --primary-blue: #2b66f6;
            --primary-blue-hover: #1e52d8;
            --light-bg: #f8f9fa;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont,
                "Segoe UI", Roboto, sans-serif;
            background-color: var(--light-bg);
            color: var(--text-main);
            overflow-x: hidden;
            min-height: 100vh;
        }

        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #ffffff;
            border-right: 1px solid #e2e8f0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 1.5rem 1.25rem;
            z-index: 100;
        }

        .brand-logo {
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--primary-blue);
            text-decoration: none;
            letter-spacing: -0.5px;
            display: inline-block;
            margin-bottom: 2rem;
            padding-left: 0.75rem;
        }

        .nav-link-custom {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            padding: 0.75rem 1rem;
            color: #475569;
            font-weight: 600;
            font-size: 0.925rem;
            border-radius: 0.5rem;
            text-decoration: none;
            margin-bottom: 0.35rem;
            transition: all 0.2s ease;
        }

        .nav-link-custom i {
            font-size: 1.15rem;
        }

        .nav-link-custom:hover {
            background-color: #f1f5f9;
            color: var(--primary-blue);
        }

        .nav-link-custom.active {
            background-color: var(--primary-blue);
            color: #ffffff;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding-top: 1rem;
            border-top: 1px solid #f1f5f9;
        }

        .admin-avatar {
            width: 38px;
            height: 38px;
            background-color: var(--primary-blue);
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .admin-name {
            font-weight: 700;
            font-size: 0.9rem;
            color: #0f172a;
            line-height: 1.2;
        }

        .admin-role {
            font-size: 0.75rem;
            color: #64748b;
        }

        .main-wrapper {
            margin-left: 260px;
            padding: 2.25rem 2.5rem;
            min-height: 100vh;
        }

        .page-title {
            font-weight: 800;
            font-size: 2.1rem;
            color: #0f172a;
            letter-spacing: -0.5px;
            margin-bottom: 0.25rem;
        }

        .page-subtitle {
            color: var(--text-muted);
            font-size: 0.95rem;
        }

        .form-card {
            background-color: #ffffff;
            border-radius: 1rem;
            border: 1px solid #f1f5f9;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
            overflow: hidden;
        }

        .form-card-header {
            padding: 1.5rem 1.75rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .form-card-title {
            font-size: 1.15rem;
            font-weight: 800;
            margin-bottom: 0.25rem;
        }

        .form-card-subtitle {
            color: var(--text-muted);
            font-size: 0.85rem;
            margin-bottom: 0;
        }

        .form-card-body {
            padding: 1.75rem;
        }

        .form-label {
            font-weight: 700;
            font-size: 0.875rem;
            color: #334155;
        }

        .form-control,
        .form-select {
            border: 1px solid #e2e8f0;
            border-radius: 0.6rem;
            padding: 0.7rem 0.9rem;
            font-size: 0.9rem;
            box-shadow: none;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(43, 102, 246, 0.15);
        }

        textarea.form-control {
            resize: vertical;
        }

        .btn-primary-custom {
            background-color: var(--primary-blue);
            color: #ffffff;
            font-weight: 600;
            padding: 0.65rem 1.25rem;
            border-radius: 0.5rem;
            border: none;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }

        .btn-primary-custom:hover {
            background-color: var(--primary-blue-hover);
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(43, 102, 246, 0.25);
        }

        .btn-cancel {
            background-color: #ffffff;
            color: #475569;
            font-weight: 600;
            padding: 0.65rem 1.25rem;
            border-radius: 0.5rem;
            border: 1px solid #e2e8f0;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-cancel:hover {
            background-color: #f1f5f9;
            color: #334155;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                border-right: none;
                border-bottom: 1px solid #e2e8f0;
            }

            .main-wrapper {
                margin-left: 0;
                padding: 1.5rem;
            }
        }

        @media (max-width: 575.98px) {
            .page-title {
                font-size: 1.7rem;
            }

            .form-card-body {
                padding: 1.25rem;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">

        <div>
            <a href="{{ route('dashboard') }}" class="brand-logo">
                Narra
            </a>

            <nav class="nav flex-column">

                <a href="{{ route('dashboard') }}" class="nav-link-custom">
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin-news.index') }}" class="nav-link-custom">
                    <i class="bi bi-newspaper"></i>
                    <span>News</span>
                </a>

                <a href="{{ route('admin-gallery.index') }}" class="nav-link-custom">
                    <i class="bi bi-images"></i>
                    <span>Gallery</span>
                </a>

                <a href="{{ route('admin-inbox.index') }}" class="nav-link-custom">
                    <i class="bi bi-envelope"></i>
                    <span>Inbox</span>
                </a>

                <a href="{{ route('admin-rating.index') }}" class="nav-link-custom active">
                    <i class="bi bi-star"></i>
                    <span>Rating</span>
                </a>

                @can('manage-admins')
                    <a href="{{ route('admin-admins.index') }}" class="nav-link-custom">
                        <i class="bi bi-gear"></i>
                        <span>Akun</span>
                    </a>
                @endcan

            </nav>
        </div>

        <div class="admin-profile">

            <div class="admin-avatar">
                <i class="bi bi-person-fill"></i>
            </div>

            <div>
                <div class="admin-name">
                    {{ auth()->user()->name }}
                </div>

                <div class="admin-role">
                    {{ auth()->user()->role ?? 'Admin' }}
                </div>
            </div>

        </div>

    </aside>

    <main class="main-wrapper">

        <div class="mb-4">

            <h1 class="page-title">
                Edit Rating
            </h1>

            <p class="page-subtitle m-0">
                Perbarui rating dan masukan yang tersimpan di website NARRA.
            </p>

        </div>

        <div class="form-card">

            <div class="form-card-header">

                <h2 class="form-card-title">
                    Informasi Rating
                </h2>

                <p class="form-card-subtitle">
                    Ubah informasi rating yang ingin diperbarui.
                </p>

            </div>

            <div class="form-card-body">

                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form
                    action="{{ route('admin-rating.update', $rating) }}"
                    method="POST"
                >
                    @csrf
                    @method('PUT')

                    {{-- Name --}}
                    <div class="mb-4">

                        <label for="name" class="form-label">
                            Nama
                        </label>

                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $rating->name) }}"
                            placeholder="Masukkan nama"
                        >

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Rating --}}
                    <div class="mb-4">

                        <label for="rating" class="form-label">
                            Rating
                        </label>

                        <select
                            name="rating"
                            id="rating"
                            class="form-select @error('rating') is-invalid @enderror"
                            required
                        >
                            <option value="">Pilih rating</option>

                            @for ($i = 1; $i <= 5; $i++)
                                <option
                                    value="{{ $i }}"
                                    {{ old('rating', $rating->rating) == $i ? 'selected' : '' }}
                                >
                                    {{ $i }} ⭐
                                </option>
                            @endfor

                        </select>


                        @error('rating')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Message --}}
                    <div class="mb-4">

                        <label for="message" class="form-label">
                            Pesan
                        </label>

                        <textarea
                            name="message"
                            id="message"
                            rows="6"
                            class="form-control @error('message') is-invalid @enderror"
                            placeholder="Tulis pesan atau masukan..."
                        >{{ old('message', $rating->message) }}</textarea>

                        @error('message')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Actions --}}
                    <div class="d-flex gap-2">

                        <button
                            type="submit"
                            class="btn-primary-custom"
                        >
                            <i class="bi bi-check-lg me-1"></i>
                            Simpan Perubahan
                        </button>

                        <a
                            href="{{ route('admin-rating.index') }}"
                            class="btn-cancel"
                        >
                            Batal
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </main>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    ></script>

</body>
</html>
