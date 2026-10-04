<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Akun - Admin NARRA</title>

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
            --danger-red: #ef4444;
            --danger-red-hover: #dc2626;
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

        /* =========================
           Sidebar
        ========================= */

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
            z-index: 1000;
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

        .brand-logo:hover {
            color: var(--primary-blue-hover);
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

        .nav-link-custom.active:hover {
            background-color: var(--primary-blue-hover);
            color: #ffffff;
        }

        /* =========================
           Admin Profile
        ========================= */

        .admin-profile {
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

        /* =========================
           Logout
        ========================= */

        .logout-btn {
            width: 38px;
            height: 38px;
            border: none;
            border-radius: 9px;
            background-color: #fee2e2;
            color: #ef4444;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .logout-btn:hover {
            background-color: #ef4444;
            color: #ffffff;
        }

        /* =========================
           Mobile Navbar
        ========================= */

        .mobile-navbar {
            display: none;
        }

        .mobile-navbar .brand-logo {
            margin: 0;
            padding: 0;
        }

        .navbar-toggler {
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            padding: 0.45rem 0.65rem;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.2rem rgba(43, 102, 246, 0.15);
        }

        .mobile-menu {
            background-color: #ffffff;
            border-top: 1px solid #f1f5f9;
        }

        .mobile-profile {
            border-top: 1px solid #f1f5f9;
            margin-top: 0.75rem;
            padding-top: 1rem;
        }

        /* =========================
           Main
        ========================= */

        .main-wrapper {
            margin-left: 260px;
            padding: 2.25rem 2.5rem;
            min-height: 100vh;
        }

        /* =========================
           Header
        ========================= */

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

        /* =========================
           Add Button
        ========================= */

        .btn-top-add {
            background-color: var(--primary-blue);
            color: #ffffff;
            font-weight: 600;
            padding: 0.65rem 1.35rem;
            border-radius: 0.5rem;
            border: none;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .btn-top-add:hover {
            background-color: var(--primary-blue-hover);
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(43, 102, 246, 0.25);
        }

        /* =========================
           Search
        ========================= */

        .search-container {
            position: relative;
            max-width: 380px;
            margin-bottom: 1.5rem;
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 0.95rem;
        }

        .search-input {
            width: 100%;
            padding: 0.65rem 1rem 0.65rem 2.6rem;
            background-color: #ffffff;
            border: 1px solid transparent;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            color: #334155;
            outline: none;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.03);
            transition: all 0.2s ease;
        }

        .search-input::placeholder {
            color: #94a3b8;
        }

        .search-input:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(43, 102, 246, 0.12);
        }

        /* =========================
           Table
        ========================= */

        .table-card {
            background-color: #ffffff;
            border-radius: 0.85rem;
            border: 1px solid #f1f5f9;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
            overflow: hidden;
        }

        .custom-table {
            width: 100%;
            margin: 0;
            border-collapse: collapse;
        }

        .custom-table th {
            background-color: #eff4fe;
            color: #475569;
            font-weight: 700;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            padding: 1rem 1.5rem;
            border: none;
        }

        .custom-table td {
            padding: 1.15rem 1.5rem;
            vertical-align: middle;
            border-bottom: 1px solid #f8fafc;
            font-size: 0.875rem;
        }

        .custom-table tr:last-child td {
            border-bottom: none;
        }

        .admin-name-table {
            font-weight: 700;
            color: #0f172a;
        }

        .email-text {
            color: #64748b;
        }

        /* =========================
           Role Badge
        ========================= */

        .role-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.35rem 0.7rem;
            border-radius: 0.4rem;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .role-super-admin {
            background-color: #eff4fe;
            color: var(--primary-blue);
        }

        .role-admin {
            background-color: #f1f5f9;
            color: #475569;
        }

        /* =========================
           Actions
        ========================= */

        .action-btn-group {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 1.25rem;
        }

        .action-link {
            font-weight: 600;
            font-size: 0.825rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            transition: all 0.2s ease;
            border: none;
            background: none;
            padding: 0;
        }

        .action-link-edit {
            color: var(--primary-blue);
        }

        .action-link-edit:hover {
            color: var(--primary-blue-hover);
            text-decoration: underline;
        }

        .action-link-delete {
            color: var(--danger-red);
        }

        .action-link-delete:hover {
            color: var(--danger-red-hover);
            text-decoration: underline;
        }

        /* =========================
           Empty State
        ========================= */

        .empty-state {
            padding: 4rem 1.5rem;
            text-align: center;
        }

        .empty-icon {
            width: 56px;
            height: 56px;
            background-color: #f1f5f9;
            color: var(--text-muted);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.4rem;
        }

        .empty-title {
            font-size: 1rem;
            font-weight: 800;
            margin-bottom: 0.35rem;
        }

        .empty-text {
            color: var(--text-muted);
            font-size: 0.85rem;
            margin-bottom: 1.25rem;
        }

        /* =========================
           Responsive
        ========================= */

        @media (max-width: 991.98px) {

            .sidebar {
                display: none;
            }

            .mobile-navbar {
                display: block;
                position: sticky;
                top: 0;
                z-index: 1000;
                background-color: #ffffff;
                border-bottom: 1px solid #e2e8f0;
            }

            .mobile-navbar-inner {
                padding: 1rem 1.25rem;
            }

            .mobile-menu {
                padding: 0.75rem 1.25rem 1rem;
            }

            .mobile-menu .nav-link-custom {
                margin-bottom: 0.35rem;
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

            .custom-table th,
            .custom-table td {
                padding: 1rem;
            }

        }
    </style>
</head>

<body>

<!-- =========================================
     Desktop Sidebar
========================================= -->

<aside class="sidebar">

    <div>

        <a href="{{ url('/') }}" class="brand-logo">
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

            <a href="{{ route('admin-rating.index') }}" class="nav-link-custom">
                <i class="bi bi-star"></i>
                <span>Rating</span>
            </a>

            @can('manage-admins')
                <a href="{{ route('admin-admins.index') }}" class="nav-link-custom active">
                    <i class="bi bi-gear"></i>
                    <span>Akun</span>
                </a>
            @endcan

        </nav>

    </div>


    <!-- Desktop Admin Profile -->

    <div class="admin-profile">

        <div class="d-flex align-items-center justify-content-between gap-3">

            <div class="d-flex align-items-center gap-3 flex-grow-1 overflow-hidden">

                <div class="admin-avatar">
                    <i class="bi bi-person-fill"></i>
                </div>

                <div class="overflow-hidden">

                    <div class="admin-name text-truncate">
                        {{ auth()->user()->name }}
                    </div>

                    <div class="admin-role">
                        {{ auth()->user()->role === 'super_admin' ? 'Super Admin' : 'Admin' }}
                    </div>

                </div>

            </div>

            <form
                method="POST"
                action="{{ route('logout') }}"
                class="flex-shrink-0"
            >
                @csrf

                <button
                    type="submit"
                    class="logout-btn"
                    title="Keluar"
                    aria-label="Keluar"
                >
                    <i class="bi bi-box-arrow-right"></i>
                </button>
            </form>

        </div>

    </div>

</aside>


<!-- =========================================
     Mobile Navbar
========================================= -->

<nav class="mobile-navbar navbar">

    <div class="container-fluid mobile-navbar-inner">

        <div class="d-flex align-items-center justify-content-between w-100">

            <a href="{{ url('/') }}" class="brand-logo">
                Narra
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#adminNavbar"
                aria-controls="adminNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>

    </div>


    <!-- Collapsed Menu -->

    <div class="collapse mobile-menu" id="adminNavbar">

        <nav class="nav flex-column">

            <a href="{{ route('dashboard') }}" class="nav-link-custom">
                <i class="bi bi-grid"></i>
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

            <a href="{{ route('admin-rating.index') }}" class="nav-link-custom">
                <i class="bi bi-star"></i>
                <span>Rating</span>
            </a>

            @can('manage-admins')
                <a href="{{ route('admin-admins.index') }}" class="nav-link-custom active">
                    <i class="bi bi-gear"></i>
                    <span>Akun</span>
                </a>
            @endcan

        </nav>


        <!-- Mobile Profile -->

        <div class="mobile-profile">

            <div class="d-flex align-items-center justify-content-between gap-3">

                <div class="d-flex align-items-center gap-3 flex-grow-1 overflow-hidden">

                    <div class="admin-avatar">
                        <i class="bi bi-person-fill"></i>
                    </div>

                    <div class="overflow-hidden">

                        <div class="admin-name text-truncate">
                            {{ auth()->user()->name }}
                        </div>

                        <div class="admin-role">
                            {{ auth()->user()->role === 'super_admin' ? 'Super Admin' : 'Admin' }}
                        </div>

                    </div>

                </div>

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                    class="flex-shrink-0"
                >
                    @csrf

                    <button
                        type="submit"
                        class="logout-btn"
                        title="Keluar"
                        aria-label="Keluar"
                    >
                        <i class="bi bi-box-arrow-right"></i>
                    </button>
                </form>

            </div>

        </div>

    </div>

</nav>


<!-- =========================================
     Main Content
========================================= -->

<main class="main-wrapper">

    <!-- Header -->

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

        <div>

            <h1 class="page-title">
                Kelola Akun
            </h1>

            <p class="page-subtitle m-0">
                Kelola akun administrator yang memiliki akses ke sistem NARRA.
            </p>

        </div>

        <div>

            <a
                href="{{ route('admin-admins.create') }}"
                class="btn-top-add"
            >
                <i class="bi bi-plus-lg"></i>
                <span>Tambah Admin</span>
            </a>

        </div>

    </div>


    <!-- Search -->

    <div class="search-container">

        <i class="bi bi-search search-icon"></i>

        <input
            type="text"
            id="adminSearch"
            class="search-input"
            placeholder="Cari nama, email, atau role..."
        >

    </div>


    <!-- Table -->

    <div class="table-card">

        <div class="table-responsive">

            <table class="table custom-table mb-0">

                <thead>

                    <tr>

                        <th scope="col" style="width: 25%;">
                            NAMA
                        </th>

                        <th scope="col" style="width: 30%;">
                            EMAIL
                        </th>

                        <th scope="col" style="width: 20%;">
                            ROLE
                        </th>

                        <th scope="col" style="width: 25%;" class="text-end">
                            AKSI
                        </th>

                    </tr>

                </thead>

                <tbody id="adminTable">

                    @forelse ($admin as $admins)

                        <tr class="admin-row">

                            <td>
                                <span class="admin-name-table">
                                    {{ $admins->name }}
                                </span>
                            </td>

                            <td>
                                <span class="email-text">
                                    {{ $admins->email }}
                                </span>
                            </td>

                            <td>

                                @if ($admins->role === 'super_admin')

                                    <span class="role-badge role-super-admin">
                                        Super Admin
                                    </span>

                                @else

                                    <span class="role-badge role-admin">
                                        Admin
                                    </span>

                                @endif

                            </td>

                            <td>

                                <div class="action-btn-group">

                                    <a
                                        href="{{ route('admin-admins.edit', $admins) }}"
                                        class="action-link action-link-edit"
                                    >
                                        <i class="bi bi-pencil"></i>
                                        Edit
                                    </a>

                                    @if ($admins->id !== auth()->id())

                                        <form
                                            action="{{ route('admin-admins.destroy', $admins) }}"
                                            method="POST"
                                            class="d-inline"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="action-link action-link-delete"
                                                onclick="return confirm('Yakin ingin menghapus akun admin ini?')"
                                            >
                                                <i class="bi bi-trash"></i>
                                                Hapus
                                            </button>

                                        </form>

                                    @endif

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4">

                                <div class="empty-state">

                                    <div class="empty-icon">
                                        <i class="bi bi-people"></i>
                                    </div>

                                    <div class="empty-title">
                                        Belum ada administrator
                                    </div>

                                    <p class="empty-text">
                                        Belum ada akun administrator yang tersedia.
                                    </p>

                                    <a
                                        href="{{ route('admin-admins.create') }}"
                                        class="btn-top-add"
                                    >
                                        <i class="bi bi-plus-lg"></i>
                                        <span>Tambah Admin</span>
                                    </a>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</main>


<!-- Bootstrap JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


<!-- Search -->

<script>

    document
        .getElementById('adminSearch')
        .addEventListener('input', function () {

            const search = this.value.toLowerCase().trim();

            const rows = document.querySelectorAll('.admin-row');

            rows.forEach(function (row) {

                const text = row.textContent.toLowerCase();

                row.style.display = text.includes(search)
                    ? ''
                    : 'none';

            });

        });

</script>

</body>
</html>

